<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ekspedisi_Depok_Bandar_Lampung_Siap_Jemput_Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model','ekspedisi');
	}

	public function index()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('Ekspedisi-depok-ke-lampung', $d, true);
		$this->load->view('main_depok_bandar_lampung_siap_jemput_barang.php', $d);
	}
	
	public function ekspedisi()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('Ekspedisi-depok-ke-lampung', $d, true);
		$this->load->view('main_depok_bandar_lampung_siap_jemput_barang.php', $d);
	}

}
