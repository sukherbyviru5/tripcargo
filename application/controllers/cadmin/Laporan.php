<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('laporan_model','laporan');
		$this->load->model('Pelanggan_model','pelanggan');
		$this->load->model('set_harga_model','set_harga');
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
			$data = $this->laporan->cetak_resi(1); //
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
			$d['area'] = $this->app_model->get_area_by_paket();
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
	
	
	public function tarif()
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
			$d['asal'] = $this->app_model->asal_group();
			$d['tujuan'] = $this->app_model->tujuan_group();
			$id=$this->session->userdata('username');
			$d['record'] = $this->model->get_users($id);
			$d['isi'] = $this->load->view('vadmin/tarif', $d, true);
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	public function set_harga_ajax_list()
	{
		$is_action_enabled = $this->input->post('action');

		$list = $this->set_harga->get_datatables_filter();
		$data = array();
		$no = $this->input->post('start');

		foreach ($list as $set_harga) {
			$no++;
			$row = array();
			$row[] = '<div class="text-center">' . $no . '</div>';
			$row[] = $set_harga->asal;
			$row[] = $set_harga->tujuan;
			$row[] = $set_harga->layanan;
			$row[] = number_format($set_harga->harga, 0); // Tarif
			$row[] = $set_harga->estimasi; // ETD

			if ($is_action_enabled) {
				$row[] = '<div class="text-center">
							<button class="btn btn-success btn-xs" 
									onclick="pilihTarif(' . $set_harga->id . ', \'' . $set_harga->harga . '\', \'' . $set_harga->layanan . '\')">
								<i class="fa fa-plus"></i>
							</button>
						</div>';
			} else {
				$row[] = '-';
			}

			$data[] = $row;
		}

		$output = array(
			"draw" => $this->input->post('draw'),
			"recordsTotal" => $this->set_harga->count_all(),
			"recordsFiltered" => $this->set_harga->count_filtered(),
			"data" => $data,
		);

		// Set header ke application/json untuk memastikan output adalah JSON
		header('Content-Type: application/json');
		echo json_encode($output);
	}


	public function cetak_tarif()
	{
		$asal = $this->input->post('asal', TRUE);
		$tujuan = $this->input->post('tujuan', TRUE);
		$list = $this->set_harga->getall($asal, $tujuan);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($list));
	}

	
}

/* End of file rpjmdes.php */
/* Location: ./application/controllers/rpjmdes.php */