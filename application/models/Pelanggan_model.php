<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		
	var $table = 'pelanggan';
	var $column_order = array('pel_id','nama','alamat','kec_id','telp','email'); //set column field database for datatable orderable
	var $column_search = array('pel_id','nama','alamat','kec_id','telp','email'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('pel_id' => 'asc'); // default order 


	
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$level = $this->session->userdata('level');
		$user_id = $this->session->userdata('username');
		if($level != 'superadmin'){ // nanti dinyalakan pada saat upload
		    $this->db->where('users_id', $this->session->userdata('user_id'));
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
		$this->db->where('pel_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	

	public function delete_by_id($id)
	{
		$q = $this->db->query("select *
			from paket
			WHERE pel_id='$id'
			");
		if($q->num_rows()>0){
		
			$hasil="";
			
		}else{
			$this->db->where('pel_id', $id);
			$hasil=$this->db->delete('pelanggan');
			
		}
		return $hasil;
	}
	
	

}
