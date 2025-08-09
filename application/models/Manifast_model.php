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
	var $order = array('id' => 'desc'); // default order



	private function _get_datatables_query()
	{

		$this->db->from($this->table);
		if(isset($_POST['user_id']) && $_POST['user_id'] > 0){
		    $this->db->where('users_id',$_POST['user_id']);
		}
		$i = 0;
		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
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
			$this->db->insert('manifast_head',array(
				'tgl'=>$this->app_model->tgl_sql($this->input->post('tgl',true)),
				'driver'=>$this->input->post('driver',true),
				'tujuan'=>$this->input->post('tujuan',true),
                'nom'=>$this->getNomManifast(),
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
		}
		$hasil= $this->db->empty_table('manifast_temp');
		return $hasil;
	}


	public function delete_by_id($id)
	{
		$q = $this->db->query("select *
			from tran
			WHERE LEFT(kec_id,4)='$id'
			");
		if($q->num_rows()>0){
		
			$hasil="";
			
		}else{
			$this->db->where('id', $id);
			$hasil=$this->db->delete('manifast_head');
			
		}
		return $hasil;
	}
	


}