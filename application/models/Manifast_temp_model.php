<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manifast_temp_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		
	var $table = 'manifast_temp';
	var $column_order = array('id','resi','tujuan','penerima','tgl_kirim','koli','berat','user_id'); //set column field database for datatable orderable
	var $column_search = array('id','resi','tujuan','penerima','tgl_kirim','koli','berat','user_id'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'asc'); // default order 


	
	private function _get_datatables_query()
	{
		
		$userid=$this->session->userdata('username');
		$this->db->from($this->table);
		$this->db->where('user_id',$userid);
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
	function temp_add_barcode(){
		//cari resi dari id 
		$id=$this->input->post('resi',true);
		$q = $this->db->query("select * from paket
			where resi='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$resi 		= $k->resi;
				$penerima 	= $k->penerima;
				$tujuan 	= $k->alamat;
				$tgl_kirim 	= $k->tglkirim;
				$koli		= $k->koli;
				$berat 		= $k->berat;
			}
			return $this->db->insert('manifast_temp',array(
				'resi'		=>$resi,
				'penerima'	=>$penerima,
				'tujuan'	=>$tujuan,
				'tgl_kirim'	=>$tgl_kirim,
				'koli'		=>$koli,
				'berat'		=>$berat,
				'user_id'	=>$this->session->userdata('username')
				));
		}else{
			return 0;
		}
		
	}
	function temp_add(){
		//cari resi dari id 
		$id=$this->input->post('resi',true);
		$q = $this->db->query("select * from paket
			where id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$resi 		= $k->resi;
				$penerima 	= $k->penerima;
				$tujuan 	= $k->alamat;
				$tgl_kirim 	= $k->tglkirim;
				$koli		= $k->koli;
				$berat 		= $k->berat;
			}
		}else{
			$hasil = "-";
		}
		return $this->db->insert('manifast_temp',array(
			'resi'		=>$resi,
			'penerima'	=>$penerima,
			'tujuan'	=>$tujuan,
			'tgl_kirim'	=>$tgl_kirim,
			'koli'		=>$koli,
			'berat'		=>$berat,
			'user_id'	=>$this->session->userdata('username')
		));
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$hasil=$this->db->delete('manifast_temp');
		return $hasil;
	}
	
	

}
