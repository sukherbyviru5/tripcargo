<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');	
		$this->load->model('app_model','model');
		$this->load->model('prov_model','prov');
		$this->load->model('kab_model','kab');
		$this->load->model('kec_model','kec');
		$this->load->model('contact_model','contact');
		$this->load->model('cargo_model','cargo');
		$this->load->model('barang_model','databarang');
		$this->load->model('set_harga_model','set_harga');
		$this->load->model('pelanggan_model','pelanggan');
		$this->load->model('updatecargo_model','updatecargo');
		$this->load->model('manifast_model','manifast');
		$this->load->model('manifast_temp_model','manifast_temp');
		$this->load->model('Introduction_model');
        $this->load->model('Visi_misi_model');
        $this->load->model('Services_model');
        $this->load->model('Customers_model');
        $this->load->model('Setting_contact_model');
		$this->load->library('session');
	}
	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			
			$sesi=$this->session->userdata('session_id');
			$d['sesi'] = $this->model->get_ci_sesi($sesi);
			$d['isi'] = $this->load->view('vadmin/dashboard-new', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function page_403()
	{
		
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
				
			$this->load->view('vadmin/page_403',$d);
		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		//header('location:'.base_url());
		redirect('','refresh');
	}
	public function dashboard()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/dashboard-new', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function dashboard_umum()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/dashboard-umum', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	
	//----edit 04/07/24
	public function regristrasi()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/regristrasi', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	//----edit 04/07/24 close
	public function profile()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/profile', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function contact()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/contact', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function contact_ajax_list()
	{
		$list = $this->contact->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $contact) {
			$no++;
			$row = array();
			$row[] = $contact->tanggal2;
			$row[] = $contact->nama;
			$row[] = $contact->subjek;
			$row[] = $contact->email;
			$row[] = $contact->komentar;
			$row[] = $contact->telp;
			$level=$this->session->userdata('level');
			if($level=='superadmin'){
			//add html for action
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$contact->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  </div>';
				}else{
					$row[]='<div class="text-center">
							<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
							</div>';
				}
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->contact->count_all(),
						"recordsFiltered" => $this->contact->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function contact_hapus($id)
	{
		
		if($this->contact->delete_by_id($id))
			echo 'Sukses dihapus';
		else
			echo 'Gagal dihapus';
		
	}
	
	public function user_ajax_list()
	{
		$this->load->model('Users_model','users');
		$list = $this->users->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $users) {
			$no++;
			$row = array();
			$row[] = $users->namalengkap;
			$row[] = $users->user_id;
			$row[] = $users->area;
			$row[] = $users->level;
			$row[] = $users->foto;
			
			$row[] = $users->nomor_hp;
			$row[] = $users->jabatan;
            $row[] = $users->tgl_regristrasi;
            $row[] = $users->kecamatan;
            $row[] = $users->alamat_tinggal;
            $row[] = $users->nomor_ktp;
            $row[] = $users->kontak_darurat;
            $row[] = $users->account_bank;
            $row[] = $users->referensi_dari;
            $row[] = $users->tempat_tanggal_lahir;
            $row[] = $users->kendaraan;
            $row[] = $users->nomor_polisi;
            $row[] = $users->keterangan_tambahan;
            $row[] = $users->performa;
            $row[] = $users->email;
			//add html for action
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Pilih" onclick="pilih_user(
						'."'".$users->id."'".',
						'."'".$users->namalengkap."'".',
						'."'".$users->user_id."'".',
						'."'".$users->area."'".',
						'."'".$users->level."'".'
						'."'".$users->foto."'".'
						
						'."'".$users->nomor_hp."'".'
						'."'".$users->jabatan."'".'
                        '."'".$users->tgl_regristrasi."'".'
                        '."'".$users->kecamatan."'".'
                        '."'".$users->alamat_tinggal."'".'
                        '."'".$users->nomor_ktp."'".'
                        '."'".$users->kontak_darurat."'".'
                        '."'".$users->account_bank."'".'
                        '."'".$users->referensi_dari."'".'
                        '."'".$users->tempat_tanggal_lahir."'".'
                        '."'".$users->kendaraan."'".'
                        '."'".$users->nomor_polisi."'".'
                        '."'".$users->keterangan_tambahan."'".'
                        '."'".$users->performa."'".'
                        '."'".$users->email."'".'
						)"><i class="glyphicon glyphicon-plus"></i></a>
				  </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->users->count_all(),
						"recordsFiltered" 	=> $this->users->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function area_kab()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/area_kab', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function area_kab_ajax_list()
	{
		
		$list = $this->kab->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kab) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $kab->kokab_id;
			$row[] = $kab->kab;
			$row[] = $this->app_model->find_prov($kab->prov_id);
			
			//add html for action
			$level = $this->session->userdata('level');
			if($level=='superadmin'){
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$kab->kokab_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$kab->kokab_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  </div>';
			}else{
				$row[] = '<div class="text-center">
						<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
				  </div>';
			}
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kab->count_all(),
						"recordsFiltered" => $this->kab->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function area_kab_edit($id)
	{
		$data = $this->kab->get_by_id($id);
		echo json_encode($data);
	}
	public function area_kab_add() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		
		if(!isset($_POST))
			show_404();
		
		if($this->kab->area_kab_add())
			echo json_encode(array('status'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	public function area_kab_hapus($id)
	{
		
		if($this->kab->delete_by_id($id))
			echo 'Sukses dihapus';
		else
			echo 'Gagal dihapus';
		
	}
	//---Tarif Awal-----------------------------------------------------
	public function Tarif()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['prov']= $this->model->get_prov();
			$d['kokab']= $this->model->get_kokab();
			$d['kec']= $this->model->get_kec();
			$d['asal']=$this->model->get_kotaasal();
			$d['tujuan']=$this->model->get_kotatujuan();
			$d['kecamatan']= $this->model->get_kec();
			$d['layanan']= $this->model->get_layanan();
			$d['isi'] = $this->load->view('vadmin/Tarif', $d, true);
			
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
		//---Tarif akhir-----------------------------------------------------
	public function area_kec()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/area_kec', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function area_kec_add() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		//================================
		if(!isset($_POST))
			show_404();
		
		if($this->kec->area_kec_add())
			echo json_encode(array('status'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		//============================
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	public function area_kec_list()  
	{
		echo $this->model->area_kec_list(); //
	}
	public function area_kec_ajax_list()
	{
		$list = $this->kec->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kec) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $kec->kec_id;
			$row[] = $kec->kec;
			$row[] = $this->app_model->find_kokab($kec->kokab_id);
			$row[] = $kec->pos;
			//add html for action
			$level = $this->session->userdata('level');
			if($level=='superadmin'){
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$kec->kec_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$kec->kec_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  </div>';
			}else{
				$row[] = '<div class="text-center">
						<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
				  </div>';
			}
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kec->count_all(),
						"recordsFiltered" => $this->kec->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function area_kec_list_modal()  
	{
		echo $this->model->area_kec_list_modal(); //
	}
	public function area_kec_edit($id)
	{
		$data = $this->kec->get_by_id($id);
		echo json_encode($data);
	}
	public function area_kec_hapus($id)
	{
		
		if($this->kec->delete_by_id($id))
			echo 'Sukses dihapus';
		else
			echo 'Gagal dihapus';
		
	}
	
	public function area_prov()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/area_prov', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function area_prov_ajax_list()
	{
		$list = $this->prov->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $prov) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $prov->prov_id;
			$row[] = $prov->prov;
			//add html for action
			$level = $this->session->userdata('level');
			if($level=='superadmin'){
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$prov->prov_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$prov->prov_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  </div>';
			}else{
				$row[] = '<div class="text-center">
						<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
				  </div>';
			}
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->prov->count_all(),
						"recordsFiltered" 	=> $this->prov->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function area_prov_add() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		if(!isset($_POST))
			show_404();
		
		if($this->prov->area_prov_add())
			echo json_encode(array('status'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	public function area_prov_edit($id)
	{
		$data = $this->prov->get_by_id($id);
		echo json_encode($data);
	}
	//------------------------------------------------------------------
	public function set_harga()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/set_harga', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function set_harga_ajax_list()
	{
		$list = $this->set_harga->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $set_harga) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $set_harga->asal;
			$row[] = $set_harga->tujuan;
			$row[] = $set_harga->layanan;
			$row[] = number_format($set_harga->harga,0);//Tarif
			$row[] = $set_harga->estimasi; //ETD
			
			//add html for action
			$level = $this->session->userdata('level');
			if($level=='superadmin'){
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$set_harga->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$set_harga->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  </div>';
			}else{
				$row[] = '<div class="text-center">
						<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
				  </div>';
			}
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->set_harga->count_all(),
						"recordsFiltered" 	=> $this->set_harga->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function set_harga_add() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		if(!isset($_POST))
			show_404();
		
		if($this->set_harga->set_harga_add())
			echo json_encode(array('status'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	public function set_harga_edit($id)
	{
		$data = $this->set_harga->get_by_id($id);
		echo json_encode($data);
	}
	public function set_harga_hapus($id)
	{
		
		if($this->set_harga->delete_by_id($id))
			echo 'Sukses dihapus';
		else
			echo 'Gagal dihapus';
		
	}
	
		//-----------------------------Data Barang----
	public function databarang()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['prov']= $this->model->get_prov();
			$d['kokab']= $this->model->get_kokab();
			$d['kec']= $this->model->get_kec();
			$d['asal']=$this->model->get_kotaasal();
			$d['tujuan']=$this->model->get_kotatujuan();
			$d['kecamatan']= $this->model->get_kec();
			$d['layanan']= $this->model->get_layanan();
			$d['isi'] = $this->load->view('vadmin/databarang', $d, true);
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}

	
	public function databarang_ajax()
	{
		$list = $this->databarang->get_datatables();
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $databarang) {
			if($databarang->image != ""){
				$image = '<img src="'.base_url('uploads/barang/'.$databarang->image).'"  style="max-width:200px; height:auto" data-toggle="modal" data-url="'.base_url('uploads/barang/'.$databarang->image).'" data-title="'.$databarang->resi.'" data-target="#modImage">';
			}else{
				$image = "";
			}
			$no++;
			$row = array();
			$row[] = $databarang->resi;
			$row[] = $image;
			$row[] = $databarang->notes;
			$row[] = $databarang->p; 
			$row[] = $databarang->l;
			$row[] = $databarang->t;
			$row[] = $databarang->berat;
			$row[] = $databarang->koli;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->databarang->count_all(),
						"recordsFiltered" 	=> $this->databarang->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	//-----------------------------cargo-------------------------------------
	public function cargo()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['prov']= $this->model->get_prov();
			$d['kokab']= $this->model->get_kokab();
			$d['kec']= $this->model->get_kec();
			$d['asal']=$this->model->get_kotaasal();
			$d['tujuan']=$this->model->get_kotatujuan();
			$d['kecamatan']= $this->model->get_kec();
			$d['layanan']= $this->model->get_layanan();
			$d['isi'] = $this->load->view('vadmin/cargo', $d, true);
			
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function cargo_ajax_list()
	{
		$list = $this->cargo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cargo) {
			$no++;
			$row = array();
			//$row[] = $no;
			//$row[] = $no.'<a class="btn btn-sm btn-link" href="javascript:void(0)" title="Edit" onclick="edit('."'".$cargo->id."'".')"></a>';
			$row[] = date('d M Y H:i:s', strtotime($cargo->tglkirim));
			//$row[] = $cargo->tglkirim;
			$row[] = '<b>'.$cargo->resi.'</b>';
			$row[] = $cargo->layan.'&ensp;
			Qty: <b>'.number_format($cargo->koli,0,'',',').'</b>' .' Koli &ensp;'  . 'Wight: <b>'.number_format($cargo->berat,0,'',',').'</b>'.' kg'.
			'<br>'
			.'<b>(</b>'.number_format($cargo->harga2,0,'',',').' - '.number_format($cargo->diskon,0,'',',').'%<b>)</b>'.'&ensp;  +  &ensp;'.number_format($cargo->harga4,0,'',',').'&ensp; +  &ensp;'.number_format($cargo->harga5,0,'',',').'</b>'
			. '&ensp; = <b>'.'Rp. '.number_format($cargo->totalbayar,0,'',',').'</b>'.'<br>'.$cargo->deskripsi.' '.$cargo->catatan;
			//$row[] =number_format($cargo->totalbayar,0,'',',')
			
			// $row[] = $cargo->koli;
			// $row[] = $cargo->berat;
			//$row[] = $cargo->deskripsi;
			$row[] = $cargo->penerima.'&ensp;  <b>'.$cargo->dept2.'</b> <br>'.$cargo->alamat.','.'<b> &ensp;'.$this->app_model->find_kec($cargo->kec_id).'</b>, <b>'.$this->app_model->find_kokab($cargo->kokab_id).'</b>';
			//$row[] = $cargo->alamat.' <br> <b>'.$this->app_model->find_kec($cargo->kec_id).'</b>, <b>'.$this->app_model->find_kokab($cargo->kokab_id).'</b>';
			// $row[] = $cargo->user_id;
			//<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
			//add html for action
			//<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Formulir" onclick="foorm_terima_barang('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-tasks"></i></a>
			//<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Formulir" onclick="foorm_terima_barang('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-tasks"></i></a>
			$level = $this->session->userdata('level');
			if($level=='superadmin'){
			$row[] = '<div class="text-center">
				    <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Label" onclick="cetak_label('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
				    
				    <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Resi Full" onclick="cetak('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
				    
				    <a class="btn btn-sm btn-default" href="javascript:void(0)" title="Resi (F4/3)" onclick="cetak2('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
				<!--<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Penolakan Asuransi" onclick="penolakan_asuransi('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-print"></i></a> --->
					<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$cargo->id."'".')" ><i class="glyphicon glyphicon-pencil"></i></a>
				<!--<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Download pdf" onclick="cetak('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-cloud-download"></i></a> --->
					<div style="display:none">
				<!--<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-trash"></i></a> --->
					</div>
					</div>';
			}else{
				$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Label" onclick="cetak_label('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
					
					<!---div style="display:none"--->
					<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Resi Full (Defull)" onclick="cetak('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
					<!---/div--->
					
					<a class="btn btn-sm btn-default" href="javascript:void(0)" title="Resi (F4/3)" onclick="cetak2('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
					<div style="display:none">
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Penolakan Asuransi" onclick="penolakan_asuransi('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
					</div>
					<!---div style="display:none"-->
					<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit('."'".$cargo->id."'".')" ><i class="glyphicon glyphicon-pencil"></i></a>
					<!--/div-->
					</div>';
			}
			$data[] = $row;
		}
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->cargo->count_all(),
						"recordsFiltered" 	=> $this->cargo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function resi_ajax_list()
	{
		$list = $this->cargo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cargo) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $cargo->tglkirim;
			$row[] = $cargo->resi;
			$row[] = $cargo->penerima;
			$row[] = $this->app_model->find_kokab(substr($cargo->kec_id,0,4));
			
			//add html for action
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Tambah Resi" onclick="tambah_resi('."'".$cargo->id."'".')"><i class="glyphicon glyphicon-plus"></i> Add </a>
				  </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->cargo->count_all(),
						"recordsFiltered" 	=> $this->cargo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function cargo_add() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		if(!isset($_POST))
			show_404();
		
		if($return = $this->cargo->cargo_add())
			echo json_encode(array('status'=>true, 'return'=>$return));
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	public function cargo_edit($id)
	{
		$cargo = $this->cargo->get_by_id($id);
		$data['data'] = $cargo;
		$barang = $this->databarang->get_by_resi($cargo->resi);
		$c_barang= "";
		foreach($barang as $row){
				$c_barang .= '
					<div class="koli-item" id="koli-item-del'.$row['id'].'">
						<label class="col-md-2 control-label" ></label>
						<div class="col-md-3" >
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-long-arrow-down fa-fw"></i></span>
								<input class="form-control" placeholder="P" type="text" name="p_edit'.$row['id'].'" id="p_edit'.$row['id'].'" value="'.$row['p'].'" style="width:100%;" onkeyup="hitung_volume_edit('.$row['id'].');" required readonly>
								<span class="input-group-addon"><i class="fa fa-long-arrow-right fa-fw"></i></span>
								<input class="form-control" placeholder="L" type="text" name="l_edit'.$row['id'].'"  id="l_edit'.$row['id'].'" value="'.$row['l'].'" style="width:100%;" onkeyup="hitung_volume_edit('.$row['id'].');" required readonly>
								<span class="input-group-addon"><i class="fa fa-long-arrow-up fa-fw"></i></span>
								<input class="form-control" placeholder="T" type="text" name="t_edit'.$row['id'].'" id="t_edit'.$row['id'].'" value="'.$row['t'].'" style="width:100%;" onkeyup="hitung_volume_edit('.$row['id'].');" required readonly>
								<span class="input-group-addon"><i class="fa fa-check"></i></span>
							</div>
						</div>
						<div class="col-md-5 col-sm-10">
							<div class="input-group">
								<input class="form-control iVol"  placeholder="Volume" readonly type="text" name="volx" value="'.(($row['p']*$row['l']*$row['t'])/4000).'">
								<span class="input-group-addon">cm<sup>3</sup></span>
			
								
								<input class="form-control iBerat" placeholder="Berat" type="text" name="beratsx"  value="'.$row['berat'].'" onkeyup="updateBerat()" onkeypress="return isNumberKey(event)" required readonly>
								<span class="input-group-addon">kg</span>
								
								<input class="form-control iKoli" placeholder="koli" readonly type="number" name="kolisx" value="'.$row['koli'].'"  >
								<span class="input-group-addon">koli</span>
								<input class="form-control "  placeholder="Note" type="text" name="notesx" value="'.$row['notes'].'" readonly >
							</div>
							
						</div>
						<div class="col-md-1">
							<div class="box">
								<div class="box-dummy"></div>
								<div class="box-element">
									<div class="box-image">
										<div><i class="fa fa-image"></i> Image </div>
										<img id="imagex" src="'.base_url('uploads/barang/'.$row['image']).'"/>
									</div>
									<div class="box-file">
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-1" id="colx${id}">
							<button type="button" name="cek_harga" class="btn btn-danger" onclick="del_edit('.$row['id'].')"><i class="fa fa-close"></i></button>
						</div>
					</div>
				';
			
		}
		
		
		
		$data['barang'] = $c_barang;
		echo json_encode($data);
	}
	public function cargo_hapus($id)
	{
		
		if($this->cargo->delete_by_id($id))
			echo 'Sukses dihapus';
		else
			echo 'Gagal dihapus';
		
	}
	//-----------------------------pelanggan-------------------------------------
	public function pelanggan()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/pelanggan', $d, true);
			
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	
	public function pelanggan_ajax_list()
	{
		$list = $this->pelanggan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pelanggan) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $pelanggan->dept;
			$row[] = $pelanggan->nama;
			$row[] = $pelanggan->alamat;
			$row[] = $this->app_model->find_kec($pelanggan->kec_id).', '.$this->app_model->find_kokab(substr($pelanggan->kec_id,0,4));
			$row[] = $pelanggan->telp;
			$row[] = $pelanggan->email;
				$level=$this->session->userdata('level');
			if($level=='superadmin'){
			//add html for action
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$pelanggan->pel_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  </div>';
				 } else{
					$row[]='<div class="text-center">
							<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
							</div>';
				}
				  
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->pelanggan->count_all(),
						"recordsFiltered" 	=> $this->pelanggan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function pelanggan_ajax_list_2()
	{
		$list = $this->pelanggan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pelanggan) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $pelanggan->dept;
			$row[] = $pelanggan->nama;
			$row[] = $pelanggan->alamat;
			$row[] = $this->app_model->find_kokab($pelanggan->kokab_id);		
			//add html for action
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Pilih" onclick="pilih_pengirim(
						'."'".$pelanggan->pel_id."'".',
						'."'".$pelanggan->nama."'".',
						'."'".$pelanggan->dept."'".',
						'."'".$pelanggan->alamat."'".',
						'."'".$pelanggan->prov_id."'".',
						'."'".$pelanggan->kokab_id."'".',
						'."'".$pelanggan->kec_id."'".',
						'."'".$pelanggan->telp."'".',
						'."'".$pelanggan->email."'".',
						)"><i class="glyphicon glyphicon-plus"></i></a>
				  </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->pelanggan->count_all(),
						"recordsFiltered" 	=> $this->pelanggan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function cargo_ajax_list_2()
	{
		$list = $this->cargo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cargo) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $cargo->penerima;
			$row[] = $cargo->dept2;
			$row[] = $cargo->alamat;
			$row[] = $this->app_model->find_kokab($cargo->kokab_id);
			$row[] = $cargo->telp;
			//add html for action
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Pilih" onclick="pilih_penerima(
						'."'".$cargo->id."'".',
						'."'".$cargo->penerima."'".',
						'."'".$cargo->alamat."'".',
						'."'".$cargo->prov_id."'".',
						'."'".$cargo->kokab_id."'".',
						'."'".$cargo->kec_id."'".',
						'."'".$cargo->telp."'".',
						'."'".$cargo->dept2."'".',
						)"><i class="glyphicon glyphicon-plus"></i></a>
				  </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->cargo->count_all(),
						"recordsFiltered" 	=> $this->cargo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	//-----------------update cargo -------------------------------------------
	public function updatecargo()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/updatecargo', $d, true);
			
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function updatecargo_ajax_list()
	{
		$list = $this->updatecargo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $updatecargo) {
			$fileIcon = "";
			if($updatecargo->file !=""){
				$filename = $updatecargo->file;
				$temp = explode('.',$filename);
				$ext = end($temp);
				$fileIcon = '<button class="btn btn-success" data-toggle="modal"  data-target="#modDok" data-title="'.$updatecargo->resi.'" data-ext="'.$ext.'" data-url="'.base_url('uploads/lacak/'.$filename).'"><i class="fa fa-image"></i></button>';
			}
			$no++;
			$row = array();
			//$fileIcon = '<button class="btn btn-success" data-toggle="modal"  data-target="#modDok" data-title="'.$updatecargo->resi.'" data-ext="'.$ext.'" data-url="'.base_url('uploads/lacak/'.$filename).'"><i class="fa fa-image"></i></button>';
			
			//--- $row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = '<b>'.$updatecargo->resi.'</b>'. '<br/>'.$updatecargo->tgl;
			//$row[] = date('d M Y H:i:s', strtotime($updatecargo->tgl));
			//$row[] = $updatecargo->tgl;
			$row[] = $updatecargo->ket;
			//ow[] = $updatecargo->code_id;
			$row[] = $this->app_model->find_kokab(substr($updatecargo->kec_id,0,4));
			$row[] = $updatecargo->catatan. '  '. $fileIcon;
			$row[] = $updatecargo->diterima.
			'<br/>'.$updatecargo->hp_penerima;
			//$row[] = $this->app_model->find_kokab(substr($updatecargo->kec_id,0,4));
			$level=$this->session->userdata('level');
			if($level=='superadmin'){
			//add html for action
			//<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
			$row[] = '<div class="text-center";view="dsible">
					<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit('."'".$updatecargo->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$updatecargo->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  </div>';
			} else{
					$row[]='<div class="text-center">
					<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>

							</div>';
				}

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->updatecargo->count_all(),
						"recordsFiltered" 	=> $this->updatecargo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function updatecargo_add() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		if(!isset($_POST))
			show_404();
		
		if($this->updatecargo->updatecargo_add())
			echo json_encode(array('status'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	public function updatecargo_edit($id)
	{
		$data = $this->updatecargo->get_by_id($id);
		echo json_encode($data);
	}
	public function updatecargo_hapus($id)
	{
		
		if($this->updatecargo->delete_by_id($id))
			echo 'Sukses dihapus';
		else
			echo 'Gagal dihapus';
		
	}
	//------------------users----------------------------------------------------
	public function users()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/users', $d, true);
			
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function lacakkirim()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/lacakkirim', $d, true);
			
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function search()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['resi']= $_GET['param'];
			$d['record_resi']=$this->model->getresi($_GET['param']);
			$d['isi'] = $this->load->view('vadmin/search', $d, true);
			
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	//-------------------------Manifast--------------------------------
	public function manifast()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/manifast', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function manifast_ajax_list()
	{   
		$level= $this->session->userdata('level');
		$list = $this->manifast->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $manifast) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $manifast->nom;
			$row[] = date('d M Y', strtotime($manifast->tgl));
			$row[] = $manifast->driver;
			$row[] = $manifast->tlpdriver;
			$row[] = $manifast->tujuan;
			$row[] = $manifast->remake .' '. $manifast->sortir; //creator //users_id // ditambahkan tgl 12 des 24
			$row[] = ''.$manifast->creator.' ['.$manifast->users_id.']'; //creator //users_id // ditambahkan tgl 28 non 24
			//add html for action
			$level=$this->session->userdata('level');
			if($level=="driver" ||$level=="umum"){
			//add html for action
			//<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
			$row[]='<div class="text-center">
					<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
							</div>';
			} else{
			    $row[] = '<div class="text-center";view="dsible">
			        <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Cetak" onclick="cetak('."'".$manifast->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
				  </div>';
					
				}
				  
			$data[] = $row;
		}
			
			
			
			//if($level=="superadmin" ||$level=="admin" || $level=="driver" ||$level=="umum"){
				//$row[] = '<div class="text-center">
					//<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Cetak" onclick="cetak('."'".$manifast->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
				  //</div>';
			//}else{
			//$row[] = '<div class="text-center">
					//<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Cetak" onclick="cetak('."'".$manifast->id."'".')"><i class="glyphicon glyphicon-print"></i></a>
					//<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$manifast->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  //</div>';
		//	$row[]='<div class="text-center">
				//	<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
				//	</div>';
				  
		//	}
		//	$data[] = $row;
			
			
			
	//	}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->manifast->count_all(),
						"recordsFiltered" 	=> $this->manifast->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	
	public function manifast_add_temp_barcode() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		if(!isset($_POST))
			show_404();
		
		if($this->manifast_temp->temp_add_barcode())
			echo json_encode(array('status'=>true,'pesan'=>'<div class="alert alert-success fade in">
				<i class="fa-fw fa fa-check"></i>
				<strong>Success</strong> Resi berhasil ditemukan.
			</div>'));
		else
			echo json_encode(array('status'=>false,'pesan'=>'<div class="alert alert-warning fade in">
			<button class="close" data-dismiss="alert">
				×
			</button>
			<i class="fa-fw fa fa-warning"></i>
			<strong>Warning</strong> Resi tidak ditemukan</div>'));
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	
	public function manifast_add_temp() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		if(!isset($_POST))
			show_404();
		
		if($this->manifast_temp->temp_add())
			echo json_encode(array('status'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	public function manifast_temp_ajax_list()
	{
		$list = $this->manifast_temp->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $manifast_temp) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">'.$no.'</div>';
			$row[] = $manifast_temp->resi;
			$row[] = $manifast_temp->tgl_kirim;
			$row[] = $manifast_temp->penerima;
			$row[] = $manifast_temp->tujuan;
			$row[] = $manifast_temp->koli;
			$row[] = $manifast_temp->berat;
			//add html for action
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_temp('."'".$manifast_temp->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>
				  </div>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->manifast_temp->count_all(),
						"recordsFiltered" 	=> $this->manifast_temp->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function manifast_temp_hapus($id)
	{
		if($this->manifast_temp->delete_by_id($id))
			echo 'Sukses dihapus';
		else
			echo 'Gagal dihapus';	
	}
	public function manifast_hapus($id)
	{
		if($this->manifast->delete_by_id($id))
			echo 'Sukses dihapus';
		else
			echo 'Gagal dihapus';	
	}
	public function manifast_add() //fungsi create
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		
		if(!empty($cek)){
		if(!isset($_POST))
			show_404();
		
		if($this->manifast->manifast_add())
			echo json_encode(array('status'=>true));
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		}else{
				redirect('/cadmin/home/logout/','refresh');
		}
	}
	//------------------------Ahkir Manifast-------------------------------
	function cari_resi(){
		if('IS_AJAX') {
		$d['paket'] = $this->model->GetCariResi();		
		$this->load->view('vadmin/info_resi',$d); 
		}
	}
	function lacak_resi(){
		if('IS_AJAX') {
		$d['paket'] = $this->model->GetLacakResi();		
		$this->load->view('vadmin/lacak_resi',$d); 
		}
	}
	function lacak_tujuan(){
		if('IS_AJAX') {
		$asal	= $this->input->post('asal',true);
		$tujuan = $this->input->post('tujuan',true);
		$d['paket'] = $this->model->GetLacakTujuan($asal,$tujuan);	
		$d['berat'] = $this->input->post('berat',true);
		$d['p'] = $this->input->post('p',true);
		$d['l'] = $this->input->post('l',true);
		$d['t'] = $this->input->post('t',true);
		$this->load->view('vadmin/cek_tarif',$d); 
		}
	}
	function lacak_tujuan_tarif(){
		if('IS_AJAX') {
		$d['asal'] =$this->input->post('asal',true);
		$d['tujuan'] =$this->input->post('tujuan',true);
		$asal	= $this->input->post('asal',true);
		$tujuan = $this->input->post('tujuan',true);
		$d['paket'] = $this->model->GetLacakTujuan($asal,$tujuan);	
		$d['berat'] = $this->input->post('berat',true);
		$d['vol'] = $this->input->post('vol',true);
		$d['p'] = $this->input->post('p',true);
		$d['l'] = $this->input->post('l',true);
		$d['t'] = $this->input->post('t',true);
		$this->load->view('vadmin/cek_tarif_pilih',$d); 
		}
	}
	function select_kab(){
		if('IS_AJAX') {
		$d['kab'] = $this->model->getKabList();		
		$this->load->view('vadmin/dropdown_kab',$d); 
		}
	}
	function select_kec(){
		if('IS_AJAX') {
		$d['kec'] = $this->model->getKecList();		
		$this->load->view('vadmin/dropdown_kec',$d); 
		}
	}
	function select_kab2(){
		if('IS_AJAX') {
		$d['kab'] = $this->model->getKabList();		
		$this->load->view('vadmin/dropdown_kab2',$d); 
		}
	}
	function select_kec2(){
		if('IS_AJAX') {
		$d['kec'] = $this->model->getKecList();		
		$this->load->view('vadmin/dropdown_kec2',$d); 
		}
	}	
	
	public function testa(){
		$d['judul'] = $this->config->item('judul');
		$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] = $this->config->item('lisensi_app');
		$d['isi'] = $this->load->view('vadmin/test');
		$this->load->view('vadmin/media',$d); 
	}
	public function test()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/test', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	
	public function testUpload(){
		echo $_FILES["secondFile"]["name"];
	}
	public function testpost(){
		$post['post'] = $this->input->post();
		$post['images'] = $_FILES['images'][0];
		echo json_encode($post);
	}
	public function sync_cargo(){
		$this->cargo->sync_data_cargo();
	}
	public function sync_pelanggan(){
		$this->cargo->sync_data_pelanggan();
	}	
	public function getSalesYear($year){
		if($year == date('Y')){
			$thisMonth = date('m');
		}else{
			$thisMonth = '12';
		}
		$rows = array();
		$table = array();
		$table['cols'] = [['label' => 'Month', 'type' => 'string'],['label' => 'Total', 'type' => 'number'],['type'=>'string','p'=>['role'=>'style']]];
		if($this->session->userdata('level') == "superadmin"){
			$users_id = "";
		}else if($this->session->userdata('level') == 'driver'){
			$users_id = $this->session->userdata('user_id');
		}
		else if($this->session->userdata('level') == 'umum'){
			$users_id = $this->session->userdata('user_id');
		}else{
			$users_id = "0";
		}
		for($i=0;$i<$thisMonth;$i++){
			$month = sprintf("%02d",$i+1);
			$total = $this->cargo->getSum($year.'-'.$month,$users_id);
			$sub_array = array();
			$sub_array[] =  array(
				 "v" => $this->monthArraySort($month)
				);
			$sub_array[] =  array(
				 "v" =>(int)$total
				);
				$sub_array[] = array(
					"v" => ' stroke-color: green'
				);
			$rows[] =  array(
				"c" => $sub_array
			   );
		}
		$table['rows'] = $rows;
		$jsonTable = json_encode($table);
		echo $jsonTable;
	}
	public function summary(){
		if($this->session->userdata('level') == "superadmin"){
			$users_id = "";
		}else if($this->session->userdata('level') == 'driver'){
			$users_id = $this->session->userdata('user_id');
		}
		else if($this->session->userdata('level') == 'umum'){
			$users_id = $this->session->userdata('user_id');
		}else{
			$users_id = "0";
		}
		$todayYear = date('Y');//santoso
		$todayMonth = date('Y-m');
		$todayDay = date('Y-m-d');

		$return['iResiToday'] = (int)$this->cargo->getCount($todayDay,$users_id);
		$return['iResiMonth'] = (int)$this->cargo->getCount($todayMonth,$users_id);
		$return['iResiYear'] = (int)$this->cargo->getCount($todayYear);//santoso
		$return['iSalesToday'] = "". number_format((int)$this->cargo->getSum($todayDay,$users_id),0,'',','); //Rp. dibuang
		$return['iSalesMonth'] =  "". number_format((int)$this->cargo->getSum($todayMonth,$users_id),0,'',','); //Rp. dibuang
		$return['iSalesYear'] =  " " . number_format((int)$this->cargo->getSum ($todayYear),0,'',',');// santoso 
		//$return['iSalesYear'] = number_format(substr((int)$this->cargo->getSum ($todayYear),0,6),0,'',',').' JT';
		echo json_encode($return);
	}	
	///---santoso 15/9/24
	public function cargo_ajax_list_dashboard_umum_cargo(){
		$list = $this->cargo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cargo) {
			$no++;
			
			if($cargo->p_nama == null){
				$dept = $this->model->find_dept_pel($cargo->pel_id);
				$nama = $this->model->find_nama_pel($cargo->pel_id);
			}else{
				$nama = $cargo->p_nama;
				$dept = $cargo->p_dept;
			}
			
			$row = array();
			$row[] = date('d-m-y', strtotime($cargo->tglkirim));
			$row[] = $cargo->resi;
			$row[] = substr($nama,0,10).'...';
			$row[] = substr($cargo->penerima,0,10).'...';
			$row[] = $this->app_model->find_kokab(substr($cargo->kec_id,0,4));
			$row[] = ($cargo->tglditerima != "")?date('d M Y', strtotime($cargo->tglditerima)):'<span class="badge badge-warning">belum diterima</span>';
			$row[] = number_format($cargo->totalbayar,0,'',',');
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->cargo->count_all(),
						"recordsFiltered" 	=> $this->cargo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
    }
	
	public function cargo_ajax_list_dashboard_cargo(){
		$list = $this->cargo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cargo) {
			$no++;
			
			if($cargo->p_nama == null){
				$dept = $this->model->find_dept_pel($cargo->pel_id);
				$nama = $this->model->find_nama_pel($cargo->pel_id);
			}else{
				$nama = $cargo->p_nama;
				$dept = $cargo->p_dept;
			}
			
			$row = array();
			$row[] = date('d-m-y', strtotime($cargo->tglkirim));
			$row[] = $cargo->resi;
			$row[] = substr($nama,0,16).' - <b>'.substr($dept,0,16).'</b>';
			$row[] = substr($cargo->penerima,0,16).' - <b>'.substr($cargo->dept2,0,16).'</b>';
			$row[] = $this->app_model->find_kokab(substr($cargo->kec_id,0,4));
			$row[] = ($cargo->tglditerima != "")?date('d M Y', strtotime($cargo->tglditerima)):'<span class="badge badge-warning">belum diterima</span>';
			$row[] = number_format($cargo->totalbayar,0,'',',');
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->cargo->count_all(),
						"recordsFiltered" 	=> $this->cargo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
    }
    
	public function cargo_ajax_list_dashboard_resi(){
		$list = $this->cargo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cargo) {
			$no++;
			$row = array();
			$row[] = date('d M Y', strtotime($cargo->tglkirim));
			$row[] = $cargo->resi;
			$row[] = $cargo->penerima.' - <b>'.$cargo->dept2.'</b>';
			$row[] = $cargo->user_id;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->cargo->count_all(),
						"recordsFiltered" 	=> $this->cargo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
    }
    
	public function cargo_ajax_list_dashboard_pendapatan(){
		$list = $this->cargo->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cargo) {
			$no++;
			$row = array();
			$row[] = $cargo->tglkirim;
			$row[] = $cargo->resi;
			$row[] = number_format($cargo->totalbayar,0,'',',');
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->cargo->count_all(),
						"recordsFiltered" 	=> $this->cargo->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
    }
    public function manifast_ajax_list_dashboard()
	{   
		$level= $this->session->userdata('level');
		$list = $this->manifast->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $manifast) {
			$no++;
			$row = array();
			$row[] = date('d M Y', strtotime($manifast->tgl));
			$row[] = $manifast->nom;
			$row[] = $manifast->driver.' &#124; '.$manifast->tlpdriver.'';
			$row[] = $manifast->tujuan;
			$row[] = '<div class="text-center">
					<a class="btn btn-sm btn-link" link href="javascript:void(0)" title="List" onclick="cetak('."'".$manifast->id."'".')"><i class="fa fa-list-ol"></i></a>
				  </div>';
			
			$data[] = $row;
			
			
			
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" 		=> $this->manifast->count_all(),
						"recordsFiltered" 	=> $this->manifast->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function count(){
		$result = $this->cargo->getCountMonth('2021-01');
		echo $result;
	}
	function monthArraySort($month){
		$month_array = array(
							 "01"=>"Jan",
							 "02"=>"Feb",
							 "03"=>"Mar",
							 "04"=>"Apr",
							 "05"=>"Mei",
							 "06"=>"Jun",
							 "07"=>"Jul",
							 "08"=>"Ags",
							 "09"=>"Sep",
							 "10"=>"Okt",
							 "11"=>"Nov",
							 "12"=>"Des");
		return $month_array[$month];
	}

	// introduction

	// Halaman Setting Introduction (termasuk Visi Misi)
    public function introduction()
    {
        $data['introduction'] = $this->Introduction_model->get_all();
        $data['visi_misi'] = $this->Visi_misi_model->get_all();
		$data['promo'] = $this->model->first_promo_is_active();
        
        $this->load->view('vadmin/setting_introduction', $data);
    }

    // Update: Memperbarui data introduction (hanya update, tidak ada store)
    public function update_introduction($id)
    {
        $data = [
            'description' => $this->input->post('description')
        ];

        if ($this->Introduction_model->update($id, $data)) {
            $response = [
                'status' => 'success',
                'message' => 'Introduction updated successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to update introduction'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Update: Memperbarui data visi_misi (hanya update, tidak ada create/delete)
    public function update_visi_misi($id)
    {
        $data = [
            'type' => $this->input->post('type'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'icon' => $this->input->post('icon')
        ];

        if ($this->Visi_misi_model->update($id, $data)) {
            $response = [
                'status' => 'success',
                'message' => 'Visi/Misi updated successfully'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Failed to update visi/misi'
            ];
        }

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Ubah fungsi ini untuk memuat view yang baru
    public function customer()
    {
        $this->load->view('vadmin/setting_customer'); 
    }

    public function get_customers_ajax()
    {
        $this->load->model('Customers_model');
        $list = $this->Customers_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customer) {
            $no++;
            $row = array();
            $row['no'] = $no;
            $row['name'] = $customer->name;

            if($customer->logo && file_exists('./uploads/' . $customer->logo)) {
                $row['logo'] = '<img src="'.base_url('uploads/'.$customer->logo).'" class="img-responsive" style="max-height: 50px;"/>';
            } else {
                $row['logo'] = '(No Logo)';
            }

            $row['action'] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="editCustomer('.$customer->id.')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                              <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteCustomer('.$customer->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Customers_model->count_all(),
            "recordsFiltered" => $this->Customers_model->count_filtered(),
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    
    // Endpoint untuk mengambil data customer by ID
    public function get_customer_by_id($id)
    {
        $data = $this->Customers_model->get_by_id($id);
        echo json_encode($data);
    }

    // Menyimpan data customer baru dengan UPLOAD
    public function store_customer()
    {
        $data = ['name' => $this->input->post('name')];
        $response = array('status' => false, 'message' => 'Gagal membuat customer.');

        if (!empty($_FILES['logo']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 2048; 
            $config['encrypt_name']  = TRUE;
			$this->load->library('upload', $config);

            $this->upload->initialize($config);

            if ($this->upload->do_upload('logo')) {
                $upload_data = $this->upload->data();
                $data['logo'] = $upload_data['file_name'];
            } else {
                $response['message'] = $this->upload->display_errors('', '');
                echo json_encode($response);
                return;
            }
        }

        if ($this->Customers_model->create($data)) {
            $response = ['status' => true, 'message' => 'Customer berhasil dibuat!'];
        }

        echo json_encode($response);
    }

    public function update_customer()
	{
		$id = $this->input->post('id');
		$data = ['name' => $this->input->post('name')];
		$response = array('status' => false, 'message' => 'Gagal memperbarui customer.');

		if (!empty($_FILES['logo']['name'])) {
			// Hapus file lama
			$old_customer = $this->Customers_model->get_by_id($id);
			if ($old_customer->logo && file_exists('./uploads/' . $old_customer->logo)) {
				unlink('./uploads/' . $old_customer->logo);
			}

			// Upload file baru
			$config['upload_path']   = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']      = 2048; 
			$config['encrypt_name']  = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('logo')) {
				$upload_data = $this->upload->data();
				$data['logo'] = $upload_data['file_name'];
			} else {
				$response['message'] = $this->upload->display_errors('', '');
				echo json_encode($response);
				return;
			}
		}

		if ($this->Customers_model->update($id, $data)) {
			$response = ['status' => true, 'message' => 'Customer berhasil diperbarui!'];
		}

		echo json_encode($response);
	}

    
    // Menghapus data customer
    public function delete_customer($id)
    {
        $customer = $this->Customers_model->get_by_id($id);
        if ($customer->logo && file_exists('./uploads/' . $customer->logo)) {
            unlink('./uploads/' . $customer->logo);
        }

        $this->Customers_model->delete($id);
        echo json_encode(array("status" => TRUE));
    }

    public function service()
    {
        // Memuat view untuk halaman service
        $this->load->view('vadmin/setting_service');
    }

    // Endpoint AJAX untuk DataTables Service
    public function get_services_ajax()
    {
        $this->load->model('Services_model');
        $list = $this->Services_model->get_datatables();
        $data = array();
        $no = isset($_POST['start']) ? $_POST['start'] : 0;
        foreach ($list as $service) {
            $no++;
            $row = array();
            $row['no'] = $no;
            $row['title'] = $service->title;
            $row['description'] = $service->description;

            // Menampilkan ikon Font Awesome
            $row['icon'] = '<i class="fa ' . htmlspecialchars($service->icon, ENT_QUOTES, 'UTF-8') . ' fa-2x"></i>';

            // Tombol Aksi
            $row['action'] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="editService('.$service->id.')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                              <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="deleteService('.$service->id.')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            
            $data[] = $row;
        }

        $output = array(
            "draw" => isset($_POST['draw']) ? $_POST['draw'] : 0,
            "recordsTotal" => $this->Services_model->count_all(),
            "recordsFiltered" => $this->Services_model->count_filtered(),
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    
    // Endpoint untuk mengambil data service by ID
    public function get_service_by_id($id)
    {
        $this->load->model('Services_model');
        $data = $this->Services_model->get_by_id($id);
        echo json_encode($data);
    }

    // Menyimpan data service baru
    public function store_service()
    {
        $this->load->model('Services_model');
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'icon' => $this->input->post('icon')
        ];

        if ($this->Services_model->create($data)) {
            $response = ['status' => true, 'message' => 'Service berhasil dibuat!'];
        } else {
            $response = ['status' => false, 'message' => 'Gagal membuat service.'];
        }
        echo json_encode($response);
    }

    // Memperbarui data service
    public function update_service()
    {
        $this->load->model('Services_model');
        $id = $this->input->post('id');
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'icon' => $this->input->post('icon')
        ];
        
        if ($this->Services_model->update($id, $data)) {
            $response = ['status' => true, 'message' => 'Service berhasil diperbarui!'];
        } else {
            $response = ['status' => false, 'message' => 'Gagal memperbarui service.'];
        }
        echo json_encode($response);
    }
    
    // Menghapus data service
    public function delete_service($id)
    {
        $this->load->model('Services_model');
        if ($this->Services_model->delete($id)) {
            echo json_encode(["status" => TRUE]);
        } else {
            echo json_encode(["status" => FALSE]);
        }
    }


	#contack
	public function setting_contact()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$d['judul'] = $this->config->item('judul');
			$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
			$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
			$d['lisensi'] = $this->config->item('lisensi_app');
			
			$d['jam_now'] = $this->app_model->Jam_Now(); 
			$d['hari_now'] = $this->app_model->Hari_Bulan_Indo(); 
			$d['tgl_now'] = $this->app_model->tgl_now_indo();
			$id=$this->session->userdata('username');
			
			$sesi=$this->session->userdata('session_id');
			$d['sesi'] = $this->model->get_ci_sesi($sesi);
			$d['record'] = $this->model->get_users($id);
			$d['contact'] = $this->Setting_contact_model->get_all();
			$d['isi'] = $this->load->view('vadmin/setting_contact', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}

	public function setting_contact_update($id)
	{
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			echo json_encode(['status' => false, 'message' => 'Sesi login habis.']);
			return;
		}

		$data = [
			'alamat'    => $this->input->post('alamat', TRUE),
			'jam_kerja' => $this->input->post('jam_kerja', TRUE),
			'maps_link' => $this->input->post('maps_link', TRUE),
			'no_hp'     => $this->input->post('no_hp', TRUE),
			'email'     => $this->input->post('email', TRUE)
		];

		if ($this->Setting_contact_model->update($id, $data)) {
			echo json_encode(['status' => true, 'message' => 'Data contact berhasil diperbarui.']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal memperbarui data.']);
		}
	}

	public function update_promo($id)
    {
        // Contoh data update
        $data_update = [
            'name'   => $this->input->post('name', TRUE),
            'status' => $this->input->post('status', TRUE)
        ];

        if ($this->app_model->update_promo($id, $data_update)) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil diperbarui.']);
        } else {
			echo json_encode(['status' => true, 'message' => 'Gagal update promo.']);
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/hone.php */