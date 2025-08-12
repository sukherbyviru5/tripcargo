<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model', 'web');
        $this->load->model('Services_model');
        $this->load->model('Customers_model');
        $this->load->model('Introduction_model');
        $this->load->model('Visi_misi_model');
	}

	public function index()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['services']           = $this->Services_model->get_all();
        $d['customers']          = $this->Customers_model->get_all();
		$introduction_data       = $this->Introduction_model->get_all();
        $d['introduction']       = !empty($introduction_data) ? $introduction_data[0] : null;
		$visi_data               = $this->Visi_misi_model->get_by_type('Visi');
        $d['visi']               = !empty($visi_data) ? $visi_data[0] : null;
        $d['misi']               = $this->Visi_misi_model->get_by_type('Misi');
		$d['isi'] 				= $this->load->view('main_home', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	public function tracking()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('main_tracking', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	public function cari()
	{
		$this->load->helper('url');
		$id=$_GET['k'];
		$d['id']=$id;
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('cari', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	public function cektarif()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota_asal']			= $this->web->get_kotaasal();
		$d['kota_tujuan']		= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('main_cektarif', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	/*public function contact()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('contact', $d, true);
		$this->load->view('mainweb', $d);//-----
	}
    //-----	
	/* -----------   public function profilusaha()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('profil_perusahan', $d, true);
		$this->load->view('mainweb', $d);
	}
	----------------- */
	/*--ublic function Otlet()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Otlet', $d, true);
		$this->load->view('mainweb', $d);
	}--*/
	
	public function Partnership()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Partnership', $d, true);
		$this->load->view('mainweb', $d);
	}
	/*--public function FAQ()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('FAQ', $d, true);
		$this->load->view('mainweb', $d);
	}--*/
	
	
	/*---public function Produk_dan_Layanan()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Produk_dan_Layanan', $d, true);
		$this->load->view('mainweb', $d);
	}--*/
	/*---public function Reguler()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Reguler', $d, true);
		$this->load->view('mainweb', $d);
	}---*/
	
	public function Tarif_Kargo_Hemat()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['tarif']				= $this->web->get_tarif_grouped();
		$d['isi'] 				= $this->load->view('Tarif_Kargo_Hemat', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Kubikasi()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kubikasi', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	
		public function Paket_Reguler()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Paket_Reguler', $d, true);
		$this->load->view('mainweb', $d);
	}
	    public function Syarat_dan_ketentuan_Asuransi()
	
		{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('Syarat_dan_ketentuan_Asuransi', $d, true);
		$this->load->view('mainweb', $d);
	}
	//----Dafta haarga Awal-----//
		public function Kab_Lampung()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kab_Lampung', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	public function Lampung()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Lampung', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function News()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('News', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Palembang()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Palembang', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Jambi()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Jambi', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Pekanbaru()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Pekanbaru', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Medan()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Medan', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Aceh()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Aceh', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	//----Dafta haarga akhir-----//
	
	//----PROMO Awal-----//
	
	public function Kargo_Murah_Depok_ke_Lampung()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kargo_Murah_Depok_ke_Lampung', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Kargo_Murah_Depok_ke_Palembang()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kargo_Murah_Depok_ke_Palembang', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Kargo_Murah_Depok_ke_Jambi()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kargo_Murah_Depok_ke_Jambi', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Kargo_Murah_Depok_ke_Bengkulu()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kargo_Murah_Depok_ke_Bengkulu', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Kargo_Murah_Depok_ke_Pekanbaru()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kargo_Murah_Depok_ke_Pekanbaru', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Kargo_Murah_Depok_ke_Padang()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kargo_Murah_Depok_ke_Padang', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Kargo_Murah_Depok_ke_Medan()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kargo_Murah_Depok_ke_Medan', $d, true);
		$this->load->view('mainweb', $d);
	}
	public function Kargo_Murah_Depok_ke_Aceh()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Kargo_Murah_Depok_ke_Aceh', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	//----2022 Akhir-----//
	
		public function Tarif_Udara_Reguler()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Tarif_Udara_Reguler', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	//----PROMO Akhir-----//
	
	/*--public function Cargo()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Cargo', $d, true);
		$this->load->view('mainweb', $d);
	}--*/
	
	public function Service_cargo()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Service_cargo', $d, true);
		$this->load->view('mainweb', $d);
	}
	
		public function Armada()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Armada', $d, true);
		$this->load->view('mainweb', $d);
	}
	
		
	/*--public function Trucking()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp'] = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Trucking', $d, true);
		$this->load->view('mainweb', $d);
	}--*/
	
	
	/*---public function Movers()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Moving', $d, true);
		$this->load->view('mainweb', $d);
	}----*/
	/*--public function Pakaging ()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Pakaging', $d, true);
		$this->load->view('mainweb', $d);
	}--*/
	
	/*--public function Terms()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Terms', $d, true);
		$this->load->view('mainweb', $d);
	}--*/
	
	/*--public function Privacy()
	
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Privacy', $d, true);
		$this->load->view('mainweb', $d);
	}---*/
	
	public function Pickup_order()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp']              = $this->config->item('telp_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['kota']				= $this->web->get_kotatujuan();
		$d['isi'] 				= $this->load->view('Pickup_order', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	
	public function contact_post() //fungsi create
	{
				
		if(!isset($_POST))
			show_404();
		
		if($this->web->contact_post())
			// echo json_encode(array('status'=>true));
			die('_sent_ok_'); 
		else
			echo json_encode(array('msg'=>'Gagal memasukan data'));
		
	}
	
}
