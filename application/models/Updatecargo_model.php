<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Updatecargo_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		
	var $table = 'lacak';
	var $column_order = array('id','tgl','ket','resi','kec_id','diterima','hp_penerima','dok','code_id'); //set column field database for datatable orderable
	var $column_search = array('id','tgl','ket','resi','kec_id','diterima','hp_penerima','dok','code_id'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id' => 'desc'); // default order 


	
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
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	//----------------------------------------------------------
	function updatecargo_add(){
		date_default_timezone_set("Asia/Jakarta");
		$kec_id	=$this->session->userdata('kec_id');
		$area	=$this->session->userdata('area');
		$ket	=$this->input->post('ket');
		$resi	=$this->input->post('resi');
		$simpan	=$this->input->post('simpan',true);
		$id=$this->input->post('id',true);
		$now = date('YmdHis');
		$filename = "";
		if($_FILES['uploadFile']){
			$upload_path = './uploads/lacak/';
			$filename = $now.'_'.$resi.'_'.$_FILES['uploadFile']['name'];		
			$config['upload_path']          = $upload_path;
			$config['allowed_types']        = 'jpg|jepg|png|pdf';
			$config['max_size']             = 10000; //$config['max_size'] = 5000;
			$config['file_name']            = $filename;
			$this->load->library('upload',$config);
			if($this->upload->do_upload('uploadFile')){
				$uploadData = $this->upload->data();
				if($uploadData['image_height'] > 500){
					$this->load->library('image_lib');
					$config_resize['image_library'] = 'gd2';	
					$config_resize['create_thumb'] = FALSE;
					$config_resize['maintain_ratio'] = TRUE;
					$config_resize['master_dim'] = 'height';
					$config_resize['quality'] = "100%";
					$config_resize['source_image'] =  $upload_path.$filename;
					$config_resize['height'] = 500;
					$config_resize['width'] = 1;
					$this->image_lib->initialize($config_resize);
					$this->image_lib->resize();
				}
			}	
		}
		if($simpan=="add"){
			if($ket=="Delivered"){
				$this->db->where('resi', $resi);
				$this->db->update('paket',array(
					'diterima'=>$this->input->post('diterima',true),
					'tglditerima'=>date("Y-m-d H:i:s"),
				));
			}
			return $this->db->insert('lacak',array(
				'resi'=>$this->input->post('resi',true),
				'catatan'=>$this->input->post('catatan',true),
				'tgl'=>date("Y-m-d H:i:s"), 
				'ket'=>$area.' '.$ket,
				'kec_id'=>$kec_id,
				'diterima'=>$this->input->post('diterima',true),
				'hp_penerima'=>$this->input->post('hp_penerima',true),
				'dok'=>$this->input->post('dok',true),
				'code_id'=>$area,
				'status'=>$ket,
				'file' => $filename
			));
		}elseif($simpan=="update"){
			$this->db->where('id', $id);
			$array_post = [
				'resi'=>$this->input->post('resi',true),
				'catatan'=>$this->input->post('catatan',true),
				'tgl'=>$this->input->post('tgl',true),
				'ket'=>$area.' '.$ket,
				'diterima'=>$this->input->post('diterima',true),
				'hp_penerima'=>$this->input->post('hp_penerima',true),
				'dok'=>$this->input->post('dok',true),
				'code_id'=>$area,
				'status'=>$ket
			];
			if($filename != ""){
				$array_post = array_merge($array_post, ['file' => $filename]);
			}
			return $this->db->update('lacak',$array_post);
		}
	}

	public function delete_by_id($id)
	{
		
		$this->db->where('id', $id);
		$hasil=$this->db->delete('lacak');
		return $hasil;	
	}
	
	

}
