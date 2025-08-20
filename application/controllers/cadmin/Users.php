<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('users_model','users');
		$this->load->model('app_model','model');
	}
	
	public function index()
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
			$d['isi'] = $this->load->view('vadmin/users', $d, true);
			
			
			$this->load->view('vadmin/media',$d);
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Sesi login habis atau terhapuskan.</font>');
			redirect('./cadmin/home/logout/','refresh');
		}
	}
	
	public function ajax_list()
	{
		$list = $this->users->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $users) {
			$no++;
			$row = array();
			$row[] = 'Reg. ID: <a style="color: black"; title="' . $users->level . ' &#124; ' . $users->user_id . '">' . $users->id . '</a>' .
					'<br><span class="hidden-xs"> Nama: </span><a style="color: black"; title="' . $users->jabatan . ' &#124; ' . $users->performa . '">' . $users->namalengkap . '</a>' .
					'<br><a href="https://api.whatsapp.com/send?phone=' . $users->nomor_hp . '" target="_blank">' . $users->nomor_hp . '</a>' .
					'<br><div style="display: none;"><span class="hidden-xs">' .
					'<a href="tel://' . $users->nomor_hp . '" target="_blank"><i class="fa fa-phone" style="font-size:1.3em"> </i></a>&nbsp;&nbsp;&nbsp;&nbsp;' .
					'<a href="https://api.whatsapp.com/send?phone=' . $users->nomor_hp . '" target="_blank"><i class="fa fa-whatsapp" style="font-size:1.3em"> </i></a>&nbsp;&nbsp;&nbsp;&nbsp;</span></div>';
			$row[] = '<img src="https://tripcargo.test/assets/upload/' . $users->foto . '" class="img-thumbnail" alt="Cinque Terre" width="100" height="100" img-responsive title="' . $users->foto . '"><br>';
			$row[] = '<div style="width:auto;">' . $users->area . ' ' . $users->kec_id . '<br><span class="hidden-xs"><a href="https://www.google.com/maps/place/' . $users->alamat_tinggal . '" target="_blank">' . $users->alamat_tinggal . '</a></span><br><a href="https://www.google.com/maps/place/' . $this->app_model->find_kec($users->kec_id) . '" target="_blank">' . $this->app_model->find_kec($users->kec_id) . '</a></div>' .
					'<br><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users(\'' . $users->id . '\')"><i class="glyphicon glyphicon-pencil"></i></a>' .
					'<span class="hidden-xs"> <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users(\'' . $users->id . '\')"><i class="glyphicon glyphicon-trash"></i></a></span>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->users->count_all(),
						"recordsFiltered" => $this->users->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->users->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'user_id' => $this->input->post('user_id'),
				'password' => md5($this->input->post('password')),
				'level' => $this->input->post('level'),
				'namalengkap' => $this->input->post('namalengkap'),
				'area' => $this->input->post('area'),
				'kec_id' => $this->input->post('kec_id'),
				'foto' => $this->input->post('foto'),//foto
				//identitas tambahan
				'nomor_hp' => $this->input->post('nomor_hp'),
				'jabatan' => $this->input->post('jabatan'),
                'tgl_regristrasi' => $this->input->post('tgl_regristrasi'),
                'kecamatan' => $this->input->post('kecamatan'),
                'alamat_tinggal' => $this->input->post('alamat_tinggal'),
                'nomor_ktp' => $this->input->post('nomor_ktp'),
                'kontak_darurat' => $this->input->post('kontak_darurat'),
                'account_bank' => $this->input->post('account_bank'),
                'referensi_dari' => $this->input->post('referensi_dari'),
                'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
                'kendaraan' => $this->input->post('kendaraan'),
                'nomor_polisi' => $this->input->post('nomor_polisi'),
                'keterangan_tambahan' => $this->input->post('keterangan_tambahan'),
                'performa' => $this->input->post('performa'),
                'email' => $this->input->post('email'),
			);
		$insert = $this->users->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$pass=$this->input->post('password');
		if(!empty($pass)){
		$data = array(
				'user_id' => $this->input->post('user_id'),
				'password' => md5($this->input->post('password')),
				'level' => $this->input->post('level'),
				'namalengkap' => $this->input->post('namalengkap'),
				'area' => $this->input->post('area'),
				'kec_id' => $this->input->post('kec_id'),
				'foto' => $this->input->post('foto'),
				//identitas tambahan
				'nomor_hp' => $this->input->post('nomor_hp'),
				'jabatan' => $this->input->post('jabatan'),
                'tgl_regristrasi' => $this->input->post('tgl_regristrasi'),
                'kecamatan' => $this->input->post('kecamatan'),
                'alamat_tinggal' => $this->input->post('alamat_tinggal'),
                'nomor_ktp' => $this->input->post('nomor_ktp'),
                'kontak_darurat' => $this->input->post('kontak_darurat'),
                'account_bank' => $this->input->post('account_bank'),
                'referensi_dari' => $this->input->post('referensi_dari'),
                'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
                'kendaraan' => $this->input->post('kendaraan'),
                'nomor_polisi' => $this->input->post('nomor_polisi'),
                'keterangan_tambahan' => $this->input->post('keterangan_tambahan'),
                'performa' => $this->input->post('performa'),
                'email' => $this->input->post('email'),
			);
		}else{
		$data = array(
				'user_id' => $this->input->post('user_id'),
				// 'password' => md5($this->input->post('password')),
				'level' => $this->input->post('level'),
				'namalengkap' => $this->input->post('namalengkap'),
				'area' => $this->input->post('area'),
				'kec_id' => $this->input->post('kec_id'),
				'foto' => $this->input->post('foto'),
				//identitas tambahan
				'nomor_hp' => $this->input->post('nomor_hp'),
				'jabatan' => $this->input->post('jabatan'),
                'tgl_regristrasi' => $this->input->post('tgl_regristrasi'),
                'kecamatan' => $this->input->post('kecamatan'),
                'alamat_tinggal' => $this->input->post('alamat_tinggal'),
                'nomor_ktp' => $this->input->post('nomor_ktp'),
                'kontak_darurat' => $this->input->post('kontak_darurat'),
                'account_bank' => $this->input->post('account_bank'),
                'referensi_dari' => $this->input->post('referensi_dari'),
                'tempat_tanggal_lahir' => $this->input->post('tempat_tanggal_lahir'),
                'kendaraan' => $this->input->post('kendaraan'),
                'nomor_polisi' => $this->input->post('nomor_polisi'),
                'keterangan_tambahan' => $this->input->post('keterangan_tambahan'),
                'performa' => $this->input->post('performa'),
                //'email' => $this->input->post('email'),
			);
		}
		$this->users->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->users->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function getResi(){
		$this->load->model('m_db');
		$dateymd = date("Y-m-d");
		$code_area = $this->session->userdata('area'); /* code area: DPK, CGK, BDG, etc */
		
		// Replace DPK with JKT if applicable
		$code_area = $code_area == 'DPK' ? 'JKT' : $code_area;
		
		// Get count of transactions for this area code on current date
		$data = $this->m_db->get_like('paket', 'tglkirim', $dateymd, ['area' => $code_area]);
		$totaldata = count($data) + 1;
		
		// Format sequence number to 4 digits
		$urut = str_pad($totaldata, 4, '0', STR_PAD_LEFT);
		
		// Get date components
		$year = date('y'); // Last 2 digits of year
		$month = date('m'); // 2 digits month
		$day = date('d'); // 2 digits day
		
		// Construct resi number
		$resi = $code_area . $year . $month . $day . $urut;
		
		echo $resi; /* Resi format: JKT2508140001 (JKT + 2 digit year + 2 digit month + 2 digit day + 4 digit sequence) */
	}
	
	
	public function getNom(){
		$this->load->model('m_db');
		$zero = "000000";
		$data = $this->m_db->get('manifast_head');
		$totaldata = count($data)+1;
		$len = strlen($totaldata);
		$zeror = substr($zero,0,0-$len);
		$nom = "MFS".'-'.$zeror.$totaldata;
		echo $nom;
	}
}

/* End of file users.php */
/* Location: ./application/controllers/users.php */