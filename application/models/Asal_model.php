<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asal_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    var $table = 'asal';
    var $column_order = array('id','nama', 'kode'); // kolom untuk order
    var $column_search = array('id','nama', 'kode'); // kolom untuk search
    var $order = array('id' => 'asc'); // default order 

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

    public function get_by_nama($nama)
    {
        $this->db->from($this->table);
        $this->db->where('nama',$nama);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_by_kode($kode)
    {
        $this->db->from($this->table);
        $this->db->where('kode',$kode);
        $query = $this->db->get();
        return $query->row();
    }

    public function getall($area = null)
    {
        $this->db->from($this->table);

        if (!empty($area)) {
            $this->db->group_start()
                    ->where('nama', $area)
                    ->or_where('kode', $area)
                    ->group_end();
        }

        $this->db->order_by('kode', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }



    function asal_add(){
        $simpan=$this->input->post('simpan',true);
        $id=$this->input->post('id',true);
        if($simpan=="add"){
            return $this->db->insert('asal',array(
                'nama'=>$this->input->post('nama',true),
                'kode'=>$this->input->post('kode',true),
            ));
        }elseif($simpan=="update"){
            $this->db->where('id', $id);
            return $this->db->update('asal',array(
                'nama'=>$this->input->post('nama',true),
                'kode'=>$this->input->post('kode',true),
            ));
        }
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('asal');
    }
}
