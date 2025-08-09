<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Partnership extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model','partnership');
	}

	public function index()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('Partnership', $d, true);
		$this->load->view('main_partnership', $d);
	}
	
	public function Partnership()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('Partnership', $d, true);
		$this->load->view('main_partnership', $d);
	}

}
