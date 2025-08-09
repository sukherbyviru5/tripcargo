<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kec_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		
	var $table = 'kec';
	var $column_order = array('kec_id','kec','kokab_id','pos'); //set column field database for datatable orderable
	var $column_search = array('kec_id','kec','kokab_id','pos'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('kec_id' => 'asc'); // default order 


	
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
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
		$this->db->where('kec_id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	//----------------------------------------------------------
	function area_kec_add(){
		$simpan=$this->input->post('simpan',true);
		$id=$this->input->post('id',true);
		if($simpan=="add"){
			return $this->db->insert('kec',array(
				'kec_id'=>$this->input->post('kec_id',true),
				'kec'=>$this->input->post('kec',true),
				'pos'=>$this->input->post('pos',true),
				'kokab_id'=>$this->input->post('kec_id',true)
			));
		}elseif($simpan=="update"){
			$this->db->where('kec_id', $id);
			return $this->db->update('kec',array(
				//'kec_id'=>$this->input->post('kec_id',true),
				'kec'=>$this->input->post('kec',true),
				'pos'=>$this->input->post('pos',true),
				'kokab_id'=>$this->input->post('id',true)
			));
		}
	}

	public function delete_by_id($id)
	{
		$q = $this->db->query("select *
			from tran
			WHERE kec_id='$id'
			");
		if($q->num_rows()>0){
		
			$hasil="";
			
		}else{
			$this->db->where('kec_id', $id);
			$hasil=$this->db->delete('kec');
			
		}
		return $hasil;
	}
	
	

}
