<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manifast_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	var $table = 'manifast_head';
	var $column_order = array('id','tgl','driver','tujuan','sortir','remake','nom','tlpdriver'); //set column field database for datatable orderable
	var $column_search = array('id','tgl','driver','tujuan','sortir','remake','nom','tlpdriver'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc');

 
	private function _get_datatables_query($start_date = null, $end_date = null, $area = null)
    {
        $this->db->from($this->table);

        // Apply date filter
        if (!empty($start_date) && !empty($end_date)) {
            $this->db->where('tgl >=', $start_date);
            $this->db->where('tgl <=', $end_date);
        }

        // Apply user_id filter (if provided)
        if (isset($_POST['user_id']) && $_POST['user_id'] > 0) {
            $this->db->where('users_id', $_POST['user_id']);
        }

		 
		if (!empty($area)) {
			$this->db->where('area', $area);
		}

        // Handle search
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
                $i++;
            }
        }

        // Handle ordering
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($start_date = null, $end_date = null, $area = null)
	{
		$this->_get_datatables_query($start_date, $end_date);
		if ($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		$result = $query->result();
		$filtered_result = []; // Array to store valid rows

		foreach ($result as $row) {
			$details = $this->db->get_where('manifast_detail', ['id_h' => $row->id])->result();
			$valid_details = [];
			$is_valid_row = true;

			foreach ($details as $detail) {
				$paket = $this->db->get_where('paket', ['resi' => $detail->resi])->row();

				if (!$paket) {
					log_message('error', 'Resi ' . $detail->resi . ' tidak ditemukan di tabel paket. Melewati row.');
					$is_valid_row = false; 
					break;
				}

				if (!empty($area) && $paket->area !== $area) {
					log_message('error', 'Resi ' . $detail->resi . ' area tidak sesuai. Paket area: ' . $paket->area . ' | Request area: ' . $area);
					$is_valid_row = false; 
					break; 
				}

				$detail->area_paket = $paket->area;
				$valid_details[] = $detail; 
			}

			if ($is_valid_row && !empty($valid_details)) {
				$row->detail = $valid_details;
				$filtered_result[] = $row;
				log_message('debug', 'Header ID: ' . $row->id . ' | Detail valid: ' . json_encode($row->detail));
			} else {
				log_message('debug', 'Header ID: ' . $row->id . ' | Row skipped due to invalid or no valid details.');
			}
		}

		log_message('debug', 'Datatables Result: ' . json_encode($filtered_result));

		return $filtered_result;
	}

    public function count_filtered($start_date = null, $end_date = null, $area = null)
    {
        $this->_get_datatables_query($start_date, $end_date);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function getNomManifast(){
		$this->load->model('m_db');
		$zero = "000000";
		$data = $this->m_db->get('manifast_head');
		$totaldata = count($data)+1;
		$len = strlen($totaldata);
		$zeror = substr($zero,0,0-$len);
		$date = date('md');
		$nom = "MFS".'-'.$zeror.$totaldata;
		return $nom;
	}
	function manifast_add(){
		$simpan=$this->input->post('simpan',true);
		$user_id=$this->session->userdata('username');
		if($simpan=="add"){
			$nomor_manifest = $this->getNomManifast();
			$this->db->insert('manifast_head',array(
				'tgl'=>$this->app_model->tgl_sql($this->input->post('tgl',true)),
				'driver'=>$this->input->post('driver',true),
				'tujuan'=>$this->input->post('tujuan',true),
                'nom'=>$nomor_manifest,
				'tlpdriver'=>$this->input->post('tlpdriver',true),
				'sortir'=>$this->input->post('sortir',true), // radio blm masuk sql
				'remake'=>$this->input->post('remake',true),
				'creator' => $this->session->userdata('nama_pengguna'),
				'users_id' => $this->session->userdata('user_id'),
			));
		    $id_manifast_head = $this->db->insert_id();
		//entri ke detail manifast 
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan
		$q = $this->db->query("select * from manifast_temp
			where user_id='$user_id'");
			if($q->num_rows()>0){
				foreach($q->result() as $k){
					$resi = $k->resi;
					$penerima = $k->penerima;
					$tujuan = $k->tujuan;
					//posting ke database
					$this->db->insert('manifast_detail',array(
						'resi'=>$resi,
						'id_h'=>$this->app_model->find_manifast_id()
					));
					$this->db->insert('lacak',array(
						'ket'=>substr($resi,0,3).' On Proses',
						'resi'=>$resi,
						'tgl' =>date('Y-m-d H:i:s'),
						'catatan'=>'Paket sedang dalam proses',
						'manifast_id' => $id_manifast_head
					));
				
				}
			}else{
				return 0;
			}

			$this->load->model('Log_model');
       		$this->Log_model->log_manifest('input', $nomor_manifest);
		}
		$hasil= $this->db->empty_table('manifast_temp');
		return $hasil;
	}


	public function delete_by_id($id)
	{
		$q = $this->db->query("SELECT * FROM tran WHERE LEFT(kec_id,4)='$id'");
		if ($q->num_rows() > 0) {
			$hasil = "";
		} else {
			$manifest = $this->db->get_where('manifast_head', array('id' => $id))->row();

			if ($manifest) {
				$nomor_manifest = $manifest->nom;

				$this->db->where('id', $id);
				$hasil = $this->db->delete('manifast_head');

				if ($hasil) {
					$this->load->model('Log_model');
					$this->Log_model->log_manifest('hapus', $nomor_manifest);
				}
			} else {
				$hasil = false;
			}
		}

		return $hasil;
	}

	


}