<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tujuan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    var $table = 'tujuan';
    var $column_order = array('id','nama'); 
    var $column_search = array('id','nama');
    var $order = array('id' => 'asc'); 

    private function _get_datatables_query()
    {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) 
        {
            if($_POST['search']['value']) 
            {
                if($i===0) 
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end();
            }
            $i++;
        }
        
        if(isset($_POST['order'])) 
        {
            $this->db->order_by(
                $this->column_order[$_POST['order']['0']['column']], 
                $_POST['order']['0']['dir']
            );
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
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function tujuan_add(){
        $simpan=$this->input->post('simpan',true);
        $id=$this->input->post('id',true);
        if($simpan=="add"){
            return $this->db->insert('tujuan',array(
                'id'=>$this->input->post('id',true),
                'nama'=>$this->input->post('nama',true),
            ));
        }elseif($simpan=="update"){
            $this->db->where('id', $id);
            return $this->db->update('tujuan',array(
                'nama'=>$this->input->post('nama',true),
            ));
        }
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tujuan');
    }
}
