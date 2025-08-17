<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_harga_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		
	var $table = 'tarif';
	var $column_order = array('id','asal','tujuan','layanan','harga','estimasi'); //set column field database for datatable orderable
	var $column_search = array('id','asal','tujuan','layanan','harga','estimasi'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'asc'); // default order 


	
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) 
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

	private function _get_datatables_query_filter()
    {
        $this->db->from('tarif');

        $asal = isset($_POST['asal']) && !empty($_POST['asal']) ? $this->db->escape_str($_POST['asal']) : null;
    	$tujuan = isset($_POST['tujuan']) && !empty($_POST['tujuan']) ? $this->db->escape_str($_POST['tujuan']) : null;	

        if (!empty($asal)) {
            $this->db->where('asal', $asal);
        }
        if (!empty($tujuan)) {
            $this->db->where('tujuan', $tujuan);
        }

        // DataTables search functionality
        $i = 0;
        foreach ($this->column_search as $item) // Loop column
        {
            if ($this->input->post('search')['value']) 
            {
                if ($i === 0) // First loop
                {
                    $this->db->group_start(); // Open bracket for OR clause
                    $this->db->like($item, $this->input->post('search')['value']);
                }
                else
                {
                    $this->db->or_like($item, $this->input->post('search')['value']);
                }

                if (count($this->column_search) - 1 == $i) // Last loop
                    $this->db->group_end(); // Close bracket
            }
            $i++;
        }

        // DataTables order functionality
        if (isset($_POST['order'])) // Order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if (isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

	function get_datatables_filter()
	{
		$this->_get_datatables_query_filter();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered_filter()
	{
		$this->_get_datatables_query_filter();
		$query = $this->db->get();
		return $query->num_rows();
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

	public function getall($asal = null, $tujuan = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		
		if (!empty($asal)) {
			$this->db->where('asal', $asal);
		}
		if (!empty($tujuan)) {
			$this->db->where('tujuan', $tujuan);
		}
		
		$query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	function set_harga_add(){
		$simpan=$this->input->post('simpan',true);
		$id=$this->input->post('id',true);
		if($simpan=="add"){
			return $this->db->insert('tarif',array(
				'tujuan'=>$this->input->post('tujuan',true),
				'asal'=>$this->input->post('asal',true),
				'harga'=>$this->input->post('harga',true),
				'estimasi'=>$this->input->post('estimasi',true),
				'layanan'=>$this->input->post('layanan',true)
			));
		}elseif($simpan=="update"){
			$this->db->where('id', $id);
			return $this->db->update('tarif',array(
				'tujuan'=>$this->input->post('tujuan',true),
				'asal'=>$this->input->post('asal',true),
				'harga'=>$this->input->post('harga',true),
				'estimasi'=>$this->input->post('estimasi',true),
				'layanan'=>$this->input->post('layanan',true)
			));
		}
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$hasil=$this->db->delete('tarif');
		return $hasil;
	}
	
	

}
