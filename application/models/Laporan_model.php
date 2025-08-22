<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Setting_contact_model');
		
	}
	public function cetak_manifast() 
	{
		$id = urldecode($this->uri->segment(4)  ?? '');
		$level=$this->session->userdata('level');
		$area=$this->session->userdata('area');
		if($level=="superadmin"){
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.layan, a.metode, a.harga1, a.harga4, a.harga5, a.penerima, a.kec_id, a.diterima, a.koli,a.berat,a.totalbayar, a.alamat
			from paket as a 
			inner join manifast_detail as b 
			on b.resi=a.resi 
			inner join manifast_head as c 
			on b.id_h=c.id 
			where c.id='$id' 
			order by a.tglkirim asc")->result();
		}else{
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.layan, a.metode, a.harga1, a.harga4, a.harga5, a.penerima, a.kec_id, a.diterima, a.koli,a.berat,a.totalbayar, a.alamat
			from paket as a 
			inner join manifast_detail as b 
			on b.resi=a.resi 
			inner join manifast_head as c 
			on b.id_h=c.id 
			where c.id='$id' 
			group by a.resi
			order by a.tglkirim asc")->result(); //and left(b.resi,3)='$area'
		}
		$d['rs'] 				= $q;
		$qh=$this->db->query("select * from manifast_head where id='$id'")->result();
		
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
		$user	=$this->input->post('user_id',true);
		$tgla	=$this->input->post('tgl1',true);
		$tglb	=$this->input->post('tgl2',true);
		$tgl1	=$this->app_model->tgl_sql($tgla);
		$tgl2	=$this->app_model->tgl_sql($tglb);
		$level 	=$this->session->userdata('level');
		$area 	=$this->session->userdata('area');
		if($level=="superadmin" || $level=="admin"){
			if($user != ""){
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.*
				from paket as a
				where a.users_id='$user'
				and a.tglkirim between '$tgl1' and '$tgl2' 
				-- and where a.users_id='102'
				group by a.resi
				order by a.tglkirim asc")->result();
			}else{
				$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.*
				from paket as a
				where a.tglkirim between '$tgl1' and '$tgl2' 
				-- and where a.users_id='102'
				group by a.resi
				order by a.tglkirim asc")->result();
			}
		}else{

			
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.*
			from paket as a
			inner join lacak as b 
			on a.resi=b.resi
			where a.tglkirim between '$tgl1' and '$tgl2'
			and left(b.resi,3)='$area' 
			and a.users_id='$user' 
			group by a.resi
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
	//------>edit Aldiyan@kotabiru.com-2020-12-10----//
    public function cetak_invoice() 
	{
		$pengirim	=$this->input->post('pengirim',true);
		$tujuan	=$this->input->post('tujuan',true);
		$payment_type	=$this->input->post('payment_type',true);
		$id = urldecode($this->uri->segment(4)  ?? '');
		$user	=$this->input->post('user_id',true);
		$tgla	=$this->input->post('tgl1',true);
		$tglb	=$this->input->post('tgl2',true);
		$tgl1	=$this->app_model->tgl_sql($tgla);
		$tgl2	=$this->app_model->tgl_sql($tglb);
		$level 	=$this->session->userdata('level');
		$area 	=$this->session->userdata('area');
		$user_id 	=$this->session->userdata('user_id');
		if($level=="superadmin" || $level == "admin"){
			if($user != ""){
				$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d')  as tglkirim, a.* 
					from paket as a
					where a.users_id='$user'
					and a.tglkirim between '$tgl1' and '$tgl2'
					group by a.resi
					order by a.tglkirim asc")->result();
				
			}else{
				$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d')  as tglkirim, a.* 
				from paket as a
				where a.tglkirim between '$tgl1' and '$tgl2'
				group by a.resi
				order by a.tglkirim asc")->result();
			}
		}else{
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d')  as tglkirim, a.* 
			from paket as a
			inner join lacak as b 
			on a.resi=b.resi
			inner join pelanggan as c 
			on a.pel_id=c.pel_id
			where a.tglkirim between '$tgl1' and '$tgl2'
			and left(b.resi,3)='$area'
			and c.nama like '%".$pengirim."%'
			group by a.resi
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
		$d['pengirim']				= $pengirim;
		$d['payment_type']				= $payment_type;
		$d['tujuan']				= $tujuan;
		$d['contact']		 = $this->Setting_contact_model->get_all();
		$d['user_id']			= $user_id;

		if (!empty($d['contact']) && isset($d['contact'][0]['alamat'])) {
			$alamat_array = json_decode($d['contact'][0]['alamat'], true);
			$d['alamat_pertama'] = !empty($alamat_array) ? $alamat_array[0] : ''; 
		} else {
			$d['alamat_pertama'] = ''; 
		}
				
		$this->load->view('vadmin/cetak_invoice', $d);
	}
	//----->edit santoso akhir----//
	public function cetak_penerimaan() 
	{
		$id = urldecode($this->uri->segment(4) ?? '');
		$tgla	=$this->input->post('tgl1',true);
		$tglb	=$this->input->post('tgl2',true);
		$tgl1	=$this->app_model->tgl_sql($tgla);
		$tgl2	=$this->app_model->tgl_sql($tglb);
		$level 	=$this->session->userdata('level');
		$area 	=$this->session->userdata('area');
		if($level=="superadmin"){
		$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.layan, a.metode, a.penerima, a.kec_id, a.layan,	a.koli,	a.berat, a.harga3, a.harga4, a.harga5, a.harga6, a.diskon, a.diterima, a.totalbayar
			from paket as a
			where a.tglkirim between '$tgl1' and '$tgl2'
			group by a.resi 
			order by a.tglkirim asc")->result();
		}else{
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.pel_id, a.resi, a.layan, a.metode, a.penerima, a.kec_id, a.layan,	a.koli,	a.berat, a.harga3, a.harga4, a.harga5, a.harga6, a.diskon, a.diterima, a.totalbayar 
			from paket as a
			inner join lacak as b 
			on a.resi=b.resi
			where a.tglkirim between '$tgl1' and '$tgl2'
			and left(b.resi,3)='$area'
			group by a.resi 
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
		$id = urldecode($this->uri->segment(4) ?? '');        
		$q = $this->db->query("SELECT 
			b.nama,
			b.alamat as alamat_pel,
			b.kec_id as kec,
			b.kokab_id as kokab,
			b.prov_id as prov,
			b.telp as telp_p,
			b.dept,
			a.* 
			from paket as a 
			inner join pelanggan as b 
			on a.pel_id=b.pel_id
			where a.id='$id'")->result();
						
		$d['rs'] = $q;
		$d['judul'] = $this->config->item('judul');
		$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] = $this->config->item('telp_perusahaan');
		$d['lisensi'] = $this->config->item('lisensi_app');
		$d['contact'] = $this->Setting_contact_model->get_all();

		if (!empty($d['contact']) && isset($d['contact'][0]['alamat'])) {
			$alamat_array = json_decode($d['contact'][0]['alamat'], true);
			$d['alamat_pertama'] = !empty($alamat_array) ? $alamat_array[0] : ''; 
		} else {
			$d['alamat_pertama'] = ''; 
		}

		if ($f == 1) {
			$this->load->view('vadmin/pdf_resi', $d);
		} else {
			$this->load->view('vadmin/pdf_resi2', $d);
		}
	}
	
	public function cetak_penolakan_asuransi($f) //toso
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
			a.* 
			
			
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
		$this->load->view('vadmin/pdf_penolakan_asuransi', $d);//toso
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
			a.*
			
			
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
	
		public function foorm_terima_barang() //dibuat santoso
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
			a.*
			
			
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
	
		$this->load->view('vadmin/foorm_terima_barang', $d); //dibuat santoso
		
	}
	
	
	
}
