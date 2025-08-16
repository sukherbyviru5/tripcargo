<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('laporan_model','laporan');
		$this->load->model('Pelanggan_model','pelanggan');
		$this->load->model('Kab_model','area');
		$this->load->model('app_model','model');
		$this->load->library('fpdf'); // Load library	
		$this->load->library('zend');
	}
	public function cetak_label()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->cetak_label(); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
		
	}
	
	public function foorm_terima_barang()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->foorm_terima_barang(); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
		
	}
	public function cetak_resi()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->cetak_resi(1); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function cetak_resi2()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->cetak_resi(2); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function cetak_penolakan_asuransi() //toso
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->cetak_penolakan_asuransi(1); //toso
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function lpengiriman()
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
			$d['isi'] = $this->load->view('vadmin/view_pengiriman', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function cetak_pengiriman()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->cetak_pengiriman(); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function lpenerimaan()
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
			$d['isi'] = $this->load->view('vadmin/view_penerimaan', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function lmanifast_area()
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
			$d['isi'] = $this->load->view('vadmin/lpmanifast', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}

	public function cetak_penerimaan()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->cetak_penerimaan(); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	//-------> Diedit Santoso awal------
	public function linvoice()
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
			$d['pelanggan'] = $this->pelanggan->get_all();
			$d['area'] = $this->area->get_all();
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/view_invoice', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function cetak_invoice()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->cetak_invoice(); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	//-------> Diedit Santoso ahkir------
	
	public function lmanifast()
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
			$d['isi'] = $this->load->view('vadmin/view_manifast', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function cetak_manifast()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->cetak_manifast(); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
	}
		
	public function export_pemeriksaan()
	{
		$cek = $this->session->userdata('logged_in');
		$level = $this->session->userdata('level');
		if(!empty($cek)){ //semua aktor bisa
			$this->laporan->export_pemeriksaan(); //
		}else{
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	
	
	

	
}

/* End of file rpjmdes.php */
/* Location: ./application/controllers/rpjmdes.php */