<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model','tarif');
	}

	public function index()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('Cektarif', $d, true);
		$this->load->view('main_cektarif', $d);
	}
	
	public function Tarif()
	{
		$this->load->helper('url');
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] 			= $this->config->item('lisensi_app');
		$d['isi'] 				= $this->load->view('Cektarif', $d, true);
		$this->load->view('main_cektarif', $d);
	}

}