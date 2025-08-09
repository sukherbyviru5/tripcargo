<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function cetak_manifast() 
	{
		$id = urldecode($this->uri->segment(4)  ?? '');
		$level=$this->session->userdata('level');
		$area=$this->session->userdata('area');
		if($level=="superadmin"){
		$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.penerima, a.kec_id, a.diterima, a.koli,a.berat,a.totalbayar, a.alamat
			from paket as a 
			inner join manifast_detail as b 
			on b.resi=a.resi 
			inner join manifast_head as c 
			on b.id_h=c.id 
			where c.id='$id' 
			order by a.tglkirim asc")->result();
		}else{
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.penerima, a.kec_id, a.diterima, a.koli,a.berat,a.totalbayar,a.alamat
			from paket as a
			inner join lacak as b 
			on a.resi=b.resi
			inner join manifast_detail as c 
			on c.resi=a.resi 
			inner join manifast_head as d 
			on c.id_h=d.id 
			where c.id='$id'
			and left(b.resi,3)='$area'
			order by a.tglkirim asc")->result();
		}
		$qh=$this->db->query("select * from manifast_head where id='$id'")->result();
		$d['rs'] 				= $q;
		$d['head']=$qh;
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] 	= $this->config->item('telp_perusahaan');
		$d['lisensi']			= $this->config->item('lisensi_app');

		$this->load->view('vadmin/cetak_manifast', $d);
	}
	public function cetak_pengiriman() 
	{
		$id = urldecode($this->uri->segment(4)  ?? '');
		$pel_id	=$this->input->post('pel_id',true);
		$pengirim	=$this->input->post('nama_pel',true);
		$tgla	=$this->input->post('tgl1',true);
		$tglb	=$this->input->post('tgl2',true);
		$tgl1	=$this->app_model->tgl_sql($tgla);
		$tgl2	=$this->app_model->tgl_sql($tglb);
		$level 	=$this->session->userdata('level');
		$area 	=$this->session->userdata('area');
		if($level=="superadmin"){
		$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.layan, a.penerima, a.kec_id, a.koli,	a.berat, a.diterima, a.totalbayar
			from paket as a
			inner join pelanggan as c 
			on a.pel_id=c.pel_id
			where a.tglkirim between '$tgl1' and '$tgl2'
			and c.nama like '%".$pengirim."%'
			order by a.tglkirim asc")->result();
		}else{
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.layan, a.penerima, a.kec_id, a.koli,	a.berat, a.diterima, a.totalbayar
			from paket as a
			inner join lacak as b 
			on a.resi=b.resi
			inner join pelanggan as c 
			on a.pel_id=c.pel_id
			where a.tglkirim between '$tgl1' and '$tgl2'
			and left(b.resi,3)='$area'
			and c.nama like '%".$pengirim."%'
			order by a.tglkirim asc")->result();
		}
						
		$d['rs'] 				= $q;
		$d['judul'] 			= $this->config->item('judul');
		$d['alamat']	 		= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] 	= $this->config->item('telp_perusahaan');
		$d['lisensi']			= $this->config->item('lisensi_app');
		$d['tgl1']				= $tgla;
		$d['tgl2']				= $tglb;
		$d['area']				= $area;
		$this->load->view('vadmin/cetak_pengiriman', $d);
	}
	//------>edit Santoso awal----//
	public function cetak_invoice() 
	{
		$id = urldecode($this->uri->segment(4)  ?? '');
		$pel_id	=$this->input->post('pel_id',true);
		$pengirim	=$this->input->post('nama_pel',true);
		$tgla	=$this->input->post('tgl1',true);
		$tglb	=$this->input->post('tgl2',true);
		$tgl1	=$this->app_model->tgl_sql($tgla);
		$tgl2	=$this->app_model->tgl_sql($tglb);
		$level 	=$this->session->userdata('level');
		$area 	=$this->session->userdata('area');
		if($level=="superadmin"){
		$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.penerima, a.kec_id, a.layan,	a.koli,	a.berat, a.harga3, a.harga4, a.harga5, a.harga6, a.diskon, a.diterima, a.totalbayar
			from paket as a
			inner join pelanggan as c 
			on a.pel_id=c.pel_id
			where a.tglkirim between '$tgl1' and '$tgl2'
			and c.nama like '%".$pengirim."%'
			order by a.tglkirim asc")->result();
		}else{
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.penerima, a.kec_id, a.layan,	a.koli,	a.berat, a.harga3, a.harga4, a.harga5, a.harga6, a.diskon, a.diterima, a.totalbayar
			from paket as a
			inner join lacak as b 
			on a.resi=b.resi
			inner join pelanggan as c 
			on a.pel_id=c.pel_id
			where a.tglkirim between '$tgl1' and '$tgl2'
			and left(b.resi,3)='$area'
			and c.nama like '%".$pengirim."%'
			order by a.tglkirim asc")->result();
		}
						
		$d['rs'] 				= $q;
		$d['judul'] 			= $this->config->item('judul');
		$d['alamat']	 		= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] 	= $this->config->item('telp_perusahaan');
		$d['lisensi']			= $this->config->item('lisensi_app');
		$d['tgl1']				= $tgla;
		$d['tgl2']				= $tglb;
		$d['area']				= $area;
		$this->load->view('vadmin/cetak_invoice', $d);
	}
	//----->edit Santoso Akhir------//
	public function cetak_penerimaan() 
	{
		$id = urldecode($this->uri->segment(4)  ?? '');
		$tgla	=$this->input->post('tgl1',true);
		$tglb	=$this->input->post('tgl2',true);
		$tgl1	=$this->app_model->tgl_sql($tgla);
		$tgl2	=$this->app_model->tgl_sql($tglb);
		$level 	=$this->session->userdata('level');
		$area 	=$this->session->userdata('area');
		if($level=="superadmin"){
		$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.penerima, a.dept2, a.kec_id, a.layan,	a.koli,	a.berat, a.harga3, a.harga4, a.harga5, a.harga6, a.diskon, a.diterima, a.totalbayar
			from paket as a
			where a.tglkirim between '$tgl1' and '$tgl2'
			order by a.tglkirim asc")->result();
		}else{
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.penerima, a.dept2, a.kec_id, a.layan,	a.koli,	a.berat, a.harga3, a.harga4, a.harga5, a.harga6, a.diskon, a.diterima, a.totalbayar 
			from paket as a
			inner join lacak as b 
			on a.resi=b.resi
			where a.tglkirim between '$tgl1' and '$tgl2'
			and left(b.resi,3)='$area'
			order by a.tglkirim asc")->result();
		}
						
		$d['rs'] 				= $q;
		$d['judul'] 			= $this->config->item('judul');
		$d['alamat']	 		= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] 	= $this->config->item('telp_perusahaan');
		$d['lisensi']			= $this->config->item('lisensi_app');
		$d['tgl1']				= $tgla;
		$d['tgl2']				= $tglb;
		$d['area']				= $area;
		$this->load->view('vadmin/cetak_penerimaan', $d);
	}
	
	public function cetak_resi($f) 
	{
		$id = urldecode($this->uri->segment(4)  ?? '');		
		$q = $this->db->query("SELECT 
			b.nama,
			b.alamat as alamat_pel,
			b.kec_id as kec,
			b.kokab_id as kokab,
			b.prov_id as prov,
			b.telp as telp_p,
			b.dept,
			a.pel_id,
			a.resi,
			a.deskripsi,
			a.ukuran,
			a.berat,
			a.vol,
			a.p,
			a.l,
			a.t,
			a.koli,
			a.harga1,
			a.harga2,
			a.harga3,
			a.harga4,
			a.harga5,
			a.harga6,
			a.diskon,
			a.totalbayar,
			a.penerima,
			    a.dept2,
			a.alamat,
			a.kec_id,
			a.kokab_id,
			a.prov_id,
			a.regkirim,
			a.regterima,
			a.telp,
			a.catatan,
			a.tglditerima,
			a.user_id,
			a.tglkirim
			
			
			from paket as a 
			inner join pelanggan as b 
			on a.pel_id=b.pel_id
			where a.id='$id'")->result();
						
		$d['rs'] = $q;
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] 	= $this->config->item('telp_perusahaan');
		$d['lisensi']			= $this->config->item('lisensi_app');
		if($f==1){
		$this->load->view('vadmin/pdf_resi', $d);
		}else{
		$this->load->view('vadmin/pdf_resi2', $d);
		}
		
	}
	public function cetak_resi3($f) //toso
	{
		$id = urldecode($this->uri->segment(4)  ?? '');		
		$q = $this->db->query("SELECT 
			b.nama,
			b.alamat as alamat_pel,
			b.kec_id as kec,
			b.kokab_id as kokab,
			b.prov_id as prov,
			b.telp as telp_p,
			b.dept,
			a.pel_id,
			a.resi,
			a.deskripsi,
			a.ukuran,
			a.berat,
			a.vol,
			a.p,
			a.l,
			a.t,
			a.koli,
			a.harga1,
			a.harga2,
			a.harga3,
			a.harga4,
			a.harga5,
			a.harga6,
			a.diskon,
			a.totalbayar,
			a.penerima,
			    a.dept2,
			a.alamat,
			a.kec_id,
			a.kokab_id,
			a.prov_id,
			a.regkirim,
			a.regterima,
			a.telp,
			a.catatan,
			a.tglditerima,
			a.user_id,
			a.tglkirim
			
			
			from paket as a 
			inner join pelanggan as b 
			on a.pel_id=b.pel_id
			where a.id='$id'")->result();
						
		$d['rs'] = $q;
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] 	= $this->config->item('telp_perusahaan');
		$d['lisensi']			= $this->config->item('lisensi_app');
		if($f==1){
		$this->load->view('vadmin/pdf_resi3', $d); //toso
		}
		
	}
	public function cetak_label() 
	{
		$id = urldecode($this->uri->segment(4)  ?? '');		
		$q = $this->db->query("SELECT 
			b.nama,
			b.alamat as alamat_pel,
			b.kec_id as kec,
			b.kokab_id as kokab,
			b.prov_id as prov,
			b.telp as telp_p,
			a.pel_id,
			b.dept,
			a.resi,
			a.deskripsi,
			a.ukuran,
			a.berat,
			a.vol,
			a.koli,
			a.harga1,
			a.harga2,
			a.harga3,
			a.harga4,
			a.harga5,
			a.harga6,
			a.totalbayar,
			a.penerima,
			    a.dept2,
			a.alamat,
			a.kec_id,
			a.kokab_id,
			a.prov_id,
			a.regkirim,
			a.regterima,
			a.telp,
			a.catatan,
			a.tglditerima,
			a.user_id,
			a.tglkirim
			
			
			from paket as a 
			inner join pelanggan as b 
			on a.pel_id=b.pel_id
			where a.id='$id'")->result();
						
		$d['rs'] = $q;
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] 	= $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] 	= $this->config->item('telp_perusahaan');
		$d['lisensi']			= $this->config->item('lisensi_app');

	
		$this->load->view('vadmin/cetak_label', $d);
		
	}
	
	
	
}
