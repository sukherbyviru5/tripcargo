<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Moving_service extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model','moving');
	}

	public function index()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('moving_service', $d, true);
		$this->load->view('main_moving_service', $d);
	}
	
	public function moving_service()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('moving_service', $d, true);
		$this->load->view('main_moving_service', $d);
	}

}
