<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app_model','person');
		$this->load->model('users_model','users');
		// $this->load->model('Listcontent_model','content');
	}

	public function index()
	{
		$this->load->helper('url');
		// $this->load->view('person_view');
		$d['judul'] = $this->config->item('judul');
		$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['lisensi'] = $this->config->item('lisensi_app');
		// $d['record'] = $this->content->get_berkas();
		$d['isi'] = $this->load->view('join', $d, true);
		$this->load->view('mainweb', $d);
	}
	
	public function join_view()
	{
		$this->load->helper('url');
		$this->load->view('join');
	}
	public function join_us(){
		$u = $this->input->post('inputUser');
		$p = $this->input->post('inputPassword');
		$this->person->getLoginData($u,$p);
	}
	
}
