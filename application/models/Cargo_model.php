<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		
	var $table = 'paket';
	var $column_order = array('tglkirim','resi','deskripsi','ukuran','penerima','dept2','telp','alamat','user_id',null); //set column field database for datatable orderable
	var $column_search = array('tglkirim','resi','penerima','dept2','telp','alamat','berat','koli','deskripsi','p_nama','p_telp','p_dept','p_alamat','p_kec_id','p_kokab_id','p_prov_id','metode','harga2','harga5','harga6','totalbayar','catatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('tglkirim' => 'asc'); // default order 


	
	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$level = $this->session->userdata('level');
		$user_id = $this->session->userdata('username');
		if($level != 'superadmin'){
			$this->db->where('user_id', $user_id);
		}
		if(isset($_POST['resi']) && $_POST['resi'] != ""){
			$this->db->like('resi',$_POST['resi']);
		}
		if(isset($_POST['dateStart']) && $_POST['dateStart'] != ""){
			if($_POST['dateEnd'] == "" && $_POST['dateStart'] != ""){
				$this->db->like('tglkirim', $_POST['dateStart']);
			}else{
				$this->db->where('tglkirim >=',$_POST['dateStart']. ' 00:00:00');
				$this->db->where('tglkirim <=',$_POST['dateEnd'].' 23:59:00');
			}
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
				}else{
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
		// $this->db->select('*');
		// $this->db->from($this->table);
		// $this->db->where('id',$id);
		// $query = $this->db->get();
		$this->db->select('a.*,b.*, b.telp as hp, a.telp as telp,  
		b.prov_id, b.kokab_id, b.kec_id, b.dept,
		a.kokab_id as kab, 
		a.prov_id as prov,
		a.kec_id as kec,
		a.alamat as alamat2, b.alamat as alamat1, left(b.kec_id,2) as prov2 ');    
		$this->db->from('paket as a ');
		$this->db->join('pelanggan as b', 'a.pel_id = b.pel_id');
		$this->db->where('a.id',$id);
		$query = $this->db->get();
		return $query->row();
		
	}

	function cargo_add() {
        $simpan = $this->input->post('simpan', true);
        $id = $this->input->post('resi', true);
        $regkirim = $this->input->post('regkirim', true);
        date_default_timezone_set("Asia/Jakarta");
        $return = "";
        
        if ($simpan == "add") {
            $pelanggan_data = array(
                'nama' => $this->input->post('nama', true),
                'dept' => $this->input->post('dept', true),
                'alamat' => $this->input->post('alamat', true),
                'kec_id' => $this->input->post('kec', true),
                'kokab_id' => $this->input->post('kab', true),
                'prov_id' => $this->input->post('prov', true),
                'telp' => $this->input->post('telp', true),
                'email' => $this->input->post('email', true),
                'user_id' => $this->session->userdata('username'),
                'users_id' => $this->session->userdata('user_id')
            );
            
            $pel = $this->app_model->cek_pelanggan($regkirim);
            if ($pel > 0) {
                log_message('debug', 'Pelanggan exists for regkirim: ' . $regkirim . ', skipping update');
            } else {
                log_message('debug', 'Inserting pelanggan: ' . json_encode($pelanggan_data));
                $this->db->insert('pelanggan', $pelanggan_data); 
            }

            $ps = $this->input->post('ps');
            $ls = $this->input->post('ls');
            $ts = $this->input->post('ts');
            $vols = $this->input->post('vols');
            $berats = $this->input->post('berats');
            $kolis = $this->input->post('kolis');
            $notes = $this->input->post('notes');
            if ($ps) {
                foreach ($ps as $key => $row) {
                    $filename = "";
                    $upload_path = './Uploads/barang/'; 
                    if (!empty($_FILES['images']['name'][$key])) {
                        $now = date('YmdHis');
                        $_FILES['file']['name'] = $_FILES['images']['name'][$key];
                        $_FILES['file']['type'] = $_FILES['images']['type'][$key];
                        $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
                        $_FILES['file']['error'] = $_FILES['images']['error'][$key];
                        $_FILES['file']['size'] = $_FILES['images']['size'][$key];
                        $config['upload_path'] = $upload_path; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $now . '-' . $_FILES['images']['name'][$key];
                        $return = $now . '-' . $_FILES['images']['name'][$key];
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('file')) {
                            $uploadData = $this->upload->data();
                            $filename = $now . '-' . $_FILES['images']['name'][$key];
                            if ($uploadData['image_height'] > 500) {
                                $this->load->library('image_lib');
                                $config_resize['image_library'] = 'gd2';	
                                $config_resize['create_thumb'] = FALSE;
                                $config_resize['maintain_ratio'] = TRUE;
                                $config_resize['master_dim'] = 'height';
                                $config_resize['quality'] = "100%";
                                $config_resize['source_image'] = $upload_path . $filename;
                                $config_resize['height'] = 500;
                                $config_resize['width'] = 1;
                                $this->image_lib->initialize($config_resize);
                                $this->image_lib->resize();
                            }
                        } else {
                            log_message('error', 'Failed to upload image for barang: ' . $this->upload->display_errors());
                        }
                    }
                    
                    $barang_data = array(
                        'resi' => $id,
                        'notes' => $notes[$key],
                        'p' => $ps[$key],
                        'l' => $ls[$key],
                        't' => $ts[$key],
                        'berat' => $berats[$key],
                        'koli' => $kolis[$key],
                        'image' => $filename
                    );
                    log_message('debug', 'Inserting barang: ' . json_encode($barang_data));
                    $this->db->insert('barang', $barang_data);
                    $id_barang = $this->db->insert_id();
                }	
            }

            $totalbayar = str_replace('.', '', $this->input->post('total', true));
            $harga = str_replace('.', '', $this->input->post('total_tarif', true));
            $diskon = str_replace('.', '', $this->input->post('diskon', true));
            $harga1 = $this->input->post('harga1', true) ? str_replace('.', '', $this->input->post('harga1', true)) : null;
            $harga2 = $this->input->post('harga2', true) ? str_replace('.', '', $this->input->post('harga2', true)) : null;
            $harga3 = $this->input->post('harga3', true) ? str_replace('.', '', $this->input->post('harga3', true)) : null;
            $harga4 = $this->input->post('harga4', true) ? str_replace('.', '', $this->input->post('harga4', true)) : null;
            $harga5 = $this->input->post('harga5', true) ? str_replace('.', '', $this->input->post('harga5', true)) : null;
            $harga6 = $this->input->post('harga6', true) ? str_replace('.', '', $this->input->post('harga6', true)) : null;

            // entri ke tujuan pengiriman
            $paket_data = array(
                'resi' => $this->input->post('resi', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'vol' => $this->input->post('vol', true),
                'p' => $this->input->post('p', true),
                'l' => $this->input->post('l', true),
                't' => $this->input->post('t', true),
                'berat' => $this->input->post('berat', true),
                'koli' => $this->input->post('koli', true),
                'totalbayar' => (int)$totalbayar,
                'p_nama' => $this->input->post('nama', true),
                'p_dept' => $this->input->post('dept', true),
                'p_alamat' => $this->input->post('alamat', true),
                'p_kec_id' => $this->input->post('kec', true),
                'p_kokab_id' => $this->input->post('kab', true),
                'p_prov_id' => $this->input->post('prov', true),
                'p_telp' => $this->input->post('telp', true),
                'p_email' => $this->input->post('email', true),
                'penerima' => $this->input->post('penerima', true),
                'dept2' => $this->input->post('dept2', true),
                'pel_id' => $this->app_model->getID_Pel(),
                'alamat' => $this->input->post('alamat2', true),
                'kec_id' => $this->input->post('kec2', true),
                'kokab_id' => $this->input->post('kab2', true),
                'prov_id' => $this->input->post('prov2', true),
                'telp' => $this->input->post('telp2', true),
                'regkirim' => $this->input->post('regkirim', true),
                'regterima' => $this->input->post('regterima', true),
                'harga' => (int)$harga,
                'diskon' => (int)$diskon,
                'harga1' => $harga1 ? (int)$harga1 : null,
                'harga2' => $harga2 ? (int)$harga2 : null,
                'harga3' => $harga3 ? (int)$harga3 : null,
                'harga4' => $harga4 ? (int)$harga4 : null,
                'harga5' => $harga5 ? (int)$harga5 : null,
                'harga6' => $harga6 ? (int)$harga6 : null,
                'layan' => $this->input->post('layan', true),
                'metode' => $this->input->post('metode', true),
                'catatan' => $this->input->post('catatan', true),
                'user_id' => $this->session->userdata('username'),
                'tglkirim' => date("Y-m-d H:i:s")
            );
            log_message('debug', 'Inserting paket: ' . json_encode($paket_data));
            return $this->db->insert('paket', $paket_data);
        } elseif ($simpan == "update") {
            $id = $this->input->post('id', true);
            $kec = $this->input->post('kec', true);
            $kec2 = $this->input->post('kec2', true);
            $pel_id = $this->app_model->find_pel_id($id);
            if ($kec) {
                $kec = $this->input->post('kec', true);
            } else {
                $kec = $this->app_model->find_kec1_paket($pel_id);
            }
            if ($kec2) {
                $kec2 = $this->input->post('kec2', true);
            } else {
                $kec2 = $this->app_model->find_kec2_paket($id);
            }

            $del_item = $this->input->post('del_item');
            if ($del_item) {
                foreach ($del_item as $key => $row) {
                    log_message('debug', 'Deleting barang with id: ' . $del_item[$key]);
                    $this->db->delete('barang', array('id' => $del_item[$key])); 
                }	
            }

            $ps = $this->input->post('ps');
            $ls = $this->input->post('ls');
            $ts = $this->input->post('ts');
            $vols = $this->input->post('vols');
            $berats = $this->input->post('berats');
            $kolis = $this->input->post('kolis');
            $notes = $this->input->post('notes');
            if ($ps) {
                foreach ($ps as $key => $row) {
                    $filename = "";
                    $upload_path = './Uploads/barang/'; 
                    if (!empty($_FILES['images']['name'][$key])) {
                        $now = date('YmdHis');
                        $_FILES['file']['name'] = $_FILES['images']['name'][$key];
                        $_FILES['file']['type'] = $_FILES['images']['type'][$key];
                        $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$key];
                        $_FILES['file']['error'] = $_FILES['images']['error'][$key];
                        $_FILES['file']['size'] = $_FILES['images']['size'][$key];
                        $config['upload_path'] = $upload_path; 
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        $config['file_name'] = $now . '-' . $_FILES['images']['name'][$key];
                        $return = $now . '-' . $_FILES['images']['name'][$key];
                        $this->load->library('upload', $config);
                        $this->upload->initialize($config);
                        if ($this->upload->do_upload('file')) {
                            $uploadData = $this->upload->data();
                            $filename = $now . '-' . $_FILES['images']['name'][$key];
                            if ($uploadData['image_height'] > 500) {
                                $this->load->library('image_lib');
                                $config_resize['image_library'] = 'gd2';	
                                $config_resize['create_thumb'] = FALSE;
                                $config_resize['maintain_ratio'] = TRUE;
                                $config_resize['master_dim'] = 'height';
                                $config_resize['quality'] = "100%";
                                $config_resize['source_image'] = $upload_path . $filename;
                                $config_resize['height'] = 500;
                                $config_resize['width'] = 1;
                                $this->image_lib->initialize($config_resize);
                                $this->image_lib->resize();
                            }
                        } else {
                            log_message('error', 'Failed to upload image for barang: ' . $this->upload->display_errors());
                        }
                    }
                    
                    $barang_data = array(
                        'resi' => $this->input->post('resi', true),
                        'notes' => $notes[$key],
                        'p' => $ps[$key],
                        'l' => $ls[$key],
                        't' => $ts[$key],
                        'berat' => $berats[$key],
                        'koli' => $kolis[$key],
                        'image' => $filename
                    );
                    log_message('debug', 'Inserting barang (update mode): ' . json_encode($barang_data));
                    $this->db->insert('barang', $barang_data);
                    $id_barang = $this->db->insert_id();
                }	
            }

            $totalbayar = str_replace('.', '', $this->input->post('total', true));
            $harga = str_replace('.', '', $this->input->post('harga', true));
            $diskon = str_replace('.', '', $this->input->post('diskon', true));
            $harga1 = $this->input->post('harga1', true) ? str_replace('.', '', $this->input->post('harga1', true)) : null;
            $harga2 = $this->input->post('harga2', true) ? str_replace('.', '', $this->input->post('harga2', true)) : null;
            $harga3 = $this->input->post('harga3', true) ? str_replace('.', '', $this->input->post('harga3', true)) : null;
            $harga4 = $this->input->post('harga4', true) ? str_replace('.', '', $this->input->post('harga4', true)) : null;
            $harga5 = $this->input->post('harga5', true) ? str_replace('.', '', $this->input->post('harga5', true)) : null;
            $harga6 = $this->input->post('harga6', true) ? str_replace('.', '', $this->input->post('harga6', true)) : null;

            $paket_data = array(
                'resi' => $this->input->post('resi', true),
                'deskripsi' => $this->input->post('deskripsi', true),
                'vol' => $this->input->post('vol', true),
                'p' => $this->input->post('p', true),
                'l' => $this->input->post('l', true),
                't' => $this->input->post('t', true),
                'berat' => $this->input->post('berat', true),
                'koli' => $this->input->post('koli', true),
                'totalbayar' => (int)$totalbayar,
                'p_nama' => $this->input->post('nama', true),
                'p_dept' => $this->input->post('dept', true),
                'p_alamat' => $this->input->post('alamat', true),
                'p_kec_id' => $this->input->post('kec', true),
                'p_kokab_id' => $this->input->post('kab', true),
                'p_prov_id' => $this->input->post('prov', true),
                'p_telp' => $this->input->post('telp', true),
                'p_email' => $this->input->post('email', true),
                'penerima' => $this->input->post('penerima', true),
                'dept2' => $this->input->post('dept2', true),
                'alamat' => $this->input->post('alamat2', true),
                'kec_id' => $kec2,
                'kokab_id' => $this->input->post('kab2', true),
                'prov_id' => $this->input->post('prov2', true),
                'telp' => $this->input->post('telp2', true),
                'regkirim' => $this->input->post('regkirim', true),
                'regterima' => $this->input->post('regterima', true),
                'harga' => (int)$harga,
                'diskon' => (int)$diskon,
                'harga1' => $harga1 ? (int)$harga1 : null,
                'harga2' => $harga2 ? (int)$harga2 : null,
                'harga3' => $harga3 ? (int)$harga3 : null,
                'harga4' => $harga4 ? (int)$harga4 : null,
                'harga5' => $harga5 ? (int)$harga5 : null,
                'harga6' => $harga6 ? (int)$harga6 : null,
                'layan' => $this->input->post('layan', true),
                'metode' => $this->input->post('metode', true),
                'catatan' => $this->input->post('catatan', true)
            );
            log_message('debug', 'Updating paket with id: ' . $id . ', data: ' . json_encode($paket_data));
            $this->db->where('id', $id);
            return $this->db->update('paket', $paket_data);
        }
        return $return;
    }
	
	public function upload_barang(){
		$data = [];
		$count = count($_FILES['images']['name']);
		for($i=0; $i<$count; $i++){
			if(!empty($_FILES['images']['name'][$i])){
				$_FILES['file']['name'] = $_FILES['images']['name'][$i];
				$_FILES['file']['type'] = $_FILES['images']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['images']['error'][$i];
				$_FILES['file']['size'] = $_FILES['images']['size'][$i];
				$config['upload_path'] = 'uploads/'; 
				$config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';
				$config['max_size'] = '5000';
				$config['file_name'] = $_FILES['images']['name'][$i];
				
				$this->load->library('upload',$config);
				if($this->upload->do_upload('file')){
					$uploadData = $this->upload->Data();
					$filename = $uploadData['file_name'];
					$data['totalFiles'][] = $filename;
				}
			}		
			
		}
	}	

	public function delete_by_id($id)
	{
		
		//hapus pelanggan 
		$pel_id=$this->app_model->find_pel_id($id);
		
		$this->db->where('pel_id', $pel_id);
		$hasil=$this->db->delete('pelanggan');
		
		$this->db->where('id', $id);
		$hasil=$this->db->delete('paket');
			
		return $hasil;
	}
		
			function sync_data_cargo(){
		$this->db->select('paket.*, users.id as m_users_id');
		$this->db->from('paket');
		$this->db->join('users','users.user_id = paket.user_id','left');
		$this->db->where('paket.users_id',0);
		$query = $this->db->get();
		$paket = $query->result_array();
		foreach($paket as $row){
			$this->db->where('id',$row['id']);
			$this->db->update('paket',array(
				'users_id'=>$row['m_users_id'],
			));
		}
	}
	function sync_data_pelanggan(){
		$this->db->select('pelanggan.*, users.id as m_users_id');
		$this->db->from('pelanggan');
		$this->db->join('users','users.user_id = pelanggan.user_id','left');
		$this->db->where('pelanggan.users_id',0);
		$query = $this->db->get();
		$paket = $query->result_array();
		foreach($paket as $row){
			$this->db->where('pel_id',$row['pel_id']);
			$this->db->update('pelanggan',array(
				'users_id'=>$row['m_users_id'],
			));
		}
	}	
	function getSum($period,$users_id=""){
		if($users_id == ""){
			$this->db->select("(SELECT SUM(paket.totalbayar) FROM paket WHERE paket.tglkirim LIKE '%".$period."%') AS total", FALSE);
		}else{
			$this->db->select("(SELECT SUM(paket.totalbayar) FROM paket WHERE paket.tglkirim LIKE '%".$period."%' AND users_id='".$users_id."') AS total", FALSE);
		}
		//$this->db->where('paket.users_id',$users_id);
		$query = $this->db->get('paket');
		$result = $query->row_array();	
		return $result['total'];
	}
	

	
	function getCount($period,$users_id=""){
		$this->db->like('tglkirim',$period);
		if($users_id != ""){
			$this->db->where('users_id',$users_id);
		}
		$query = $this->db->get('paket');
		return $query->num_rows();
	}
	
	

}
