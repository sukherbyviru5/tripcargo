<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Setting_contact_model');
		
	}
	
	public function cetak_pdf_manifast() 
	{
		$start_date = $this->input->get('tgl1');
		$end_date   = $this->input->get('tgl2');
		$area       = $this->input->get('area');

		// Query header dari tabel utama
		$this->db->from('manifast_head');

		if (!empty($start_date) && !empty($end_date)) {
			$this->db->where('tgl >=', $start_date);
			$this->db->where('tgl <=', $end_date);
		}

		$query = $this->db->get();
		$result = $query->result();

		$filtered_result = [];

		foreach ($result as $row) {
			$details = $this->db->get_where('manifast_detail', ['id_h' => $row->id])->result();
			$valid_details = [];
			$is_valid_row = true;

			foreach ($details as $detail) {
				$paket = $this->db->get_where('paket', ['resi' => $detail->resi])->row();

				if (!$paket) {
					$is_valid_row = false;
					break;
				}

				if (!empty($area) && $paket->area !== $area) {
					$is_valid_row = false;
					break;
				}

				$detail->area_paket = $paket->area;
				$valid_details[] = $detail;
			}

			if ($is_valid_row && !empty($valid_details)) {
				$row->detail = $valid_details;
				$filtered_result[] = $row;
			}
		}

		$d['rs'] 				= $filtered_result;
		$d['start_date'] 		= $start_date ?? 'semua';
		$d['end_date'] 			= $end_date ?? 'semua';
		$d['area'] 				= $area ?? '-';
		$d['judul'] 			= $this->config->item('judul');
		$d['nama_perusahaan'] = $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] 	= $this->config->item('telp_perusahaan');
		$d['lisensi']			= $this->config->item('lisensi_app');

		$this->load->view('vadmin/cetak_pdf_manifast', $d);

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
		$pengirim = $this->input->post('pengirim', true);
		$tujuan = $this->input->post('tujuan', true);
		$payment_type = $this->input->post('payment_type', true);
		$id = urldecode($this->uri->segment(4) ?? '');
		$user = $this->input->post('user_id', true);
		$tgla = $this->input->post('tgl1', true);
		$tglb = $this->input->post('tgl2', true);
		$tgl1 = $this->app_model->tgl_sql($tgla);
		$tgl2 = $this->app_model->tgl_sql($tglb);
		$level = $this->session->userdata('level');
		$area = $this->session->userdata('area');
		$user_id = $this->session->userdata('user_id');

		if ($level == "superadmin" || $level == "admin") {
			if ($user != "") {
				$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.* 
					from paket as a
					where a.users_id='$user'
					and DATE(a.tglkirim) >= '$tgl1'
					and DATE(a.tglkirim) <= '$tgl2'
					group by a.resi
					order by a.tglkirim asc")->result();
			} else {
				$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.* 
					from paket as a
					where DATE(a.tglkirim) >= '$tgl1'
					and DATE(a.tglkirim) <= '$tgl2'
					group by a.resi
					order by a.tglkirim asc")->result();
			}
		} else {
			$q = $this->db->query("SELECT DATE_FORMAT(a.tglkirim, '%Y-%m-%d') as tglkirim, a.* 
				from paket as a
				inner join lacak as b 
				on a.resi = b.resi
				inner join pelanggan as c 
				on a.pel_id = c.pel_id
				where DATE(a.tglkirim) >= '$tgl1'
				and DATE(a.tglkirim) <= '$tgl2'
				and left(b.resi, 3) = '$area'
				and c.nama like '%$pengirim%'
				group by a.resi
				order by a.tglkirim asc")->result();
		}
		
		$d['rs'] = $q;
		$d['judul'] = $this->config->item('judul');
		$d['alamat'] = $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan'] = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan'] = $this->config->item('telp_perusahaan');
		$d['lisensi'] = $this->config->item('lisensi_app');
		$d['tgl1'] = $tgla;
		$d['tgl2'] = $tglb;
		$d['area'] = $area;
		$d['pengirim'] = $pengirim;
		$d['payment_type'] = $payment_type;
		$d['tujuan'] = $tujuan;
		$d['contact'] = $this->Setting_contact_model->get_all();
		$d['user_id'] = $user_id;

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
	
	
	
	public function cetak_pdf_log() 
	{
		$start_date = $this->input->get('tgl1');
		$end_date   = $this->input->get('tgl2');
		$type       = $this->input->get('type');

		// Query ke tabel log_activity
		$this->db->from('log');

		if (!empty($start_date) && !empty($end_date)) {
			$this->db->where('DATE(tanggal) >=', $start_date);
			$this->db->where('DATE(tanggal) <=', $end_date);
		}

		if (!empty($type)) {
			$this->db->where('type', $type);
		}

		$this->db->order_by('tanggal', 'DESC');
		$query = $this->db->get();
		$result = $query->result();

		// Data untuk view PDF
		$d['rs']                 = $result;
		$d['start_date']         = $start_date ?? 'semua';
		$d['end_date']           = $end_date ?? 'semua';
		$d['type']               = $type ?? '-';
		$d['judul']              = $this->config->item('judul');
		$d['nama_perusahaan']    = $this->config->item('nama_perusahaan');
		$d['alamat_perusahaan']  = $this->config->item('alamat_perusahaan');
		$d['telp_perusahaan']    = $this->config->item('telp_perusahaan');
		$d['lisensi']            = $this->config->item('lisensi_app');

		// Load view khusus PDF
		$this->load->view('vadmin/cetak_pdf_log', $d);
	}

}
