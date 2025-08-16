<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('zend');
	}
	
	public function getAllData($table)
	{
		return $this->db->get($table);
	}
	
	public function getAllDataLimited($table,$limit,$offset)
	{
		return $this->db->get($table, $limit, $offset);
	}
	
	public function getSelectedDataLimited($table,$data,$limit,$offset)
	{
		return $this->db->get_where($table, $data, $limit, $offset);
	}	
	//select table
	
	
	public function getSelectedData($table,$data)
	{
		return $this->db->get_where($table, $data);
	}
	//update table
	function updateData($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
	
	function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	//Query manual
	function manualQuery($q)
	{
		return $this->db->query($q);
	}
	
	//Konversi tanggal------------------------------
	public function tgl_sql($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_sql2($date){
		$exp = explode('/',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[0].'-'.$exp[1];
		}
		return $date;
	}
	public function tgl_str($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
		}
		return $date;
	}
	public function tgl_str2($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'/'.$exp[1].'/'.$exp[0];
		}
		return $date;
	}
	public function tgl_str3($date){
		$exp = explode('-',$date);
		if(count($exp) == 3) {
			$date = $exp[2].'.'.$exp[1].'.'.substr($exp[0],2,2);
		}
		return $date;
	}
	
	
	/* Tanggal dan Jam */
	public function Jam_Now(){
		date_default_timezone_set("Asia/Jakarta");
   		$jam = date("H:i:s"); 
   		
		return $jam;
		//echo "$jam WIB";
	}
	
	public function Hari_Bulan_Indo(){
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum"."'"."at","Sabtu");
		$hari = date("w");
		$hari_ini = $seminggu[$hari];
		
		return $hari_ini;
	}
	
	public function cari_hari($tgl_lahir)
	{
		$query="SELECT datediff('$tgl_lahir', CURDATE()) as selisih";
		$hasil=mysql_query($query);
	
		$data=mysql_fetch_array($hasil);
		$selisih=$data['selisih'];
		$x=mktime(0,0,0, date("m"),date("d")+$selisih,date("Y"));
		$namahari=date("w",$x);
		
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum\'at","Sabtu");
		//$hari = date("w");
		$hari_ini = $seminggu[$namahari];
		
		return $hari_ini;
		
	}
	public function tgl_now_indo(){
			date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
			$tgl = date("Y m d");
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}
	public function tgl_indo($tgl){
			date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
			//$tgl = date("Y m d");
			$tanggal = substr($tgl,8,2);
			$bulan = $this->app_model->getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}
	function buangspasi($teks){
		$teks= trim($teks);
		while( strpos($teks, '%') ){
		$hasil= str_replace('%', '', $teks);
		}
		return $teks;
	}
	
	public function getBulan($bln){
		switch ($bln){
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	} 
	public function getLoginData($usr,$psw)
	{
		// $link=mysqli_connect();
		// include'./application/models/inc.php';
		$u = addslashes(trim($usr));
		$p = addslashes(trim(md5($psw)));
		// $u=mysqli_real_escape_string($link, $usr);
		// $u =mysqli_real_escape_string($db,$usr);
		// $p = md5(mysqli_real_escape_string($link,$psw));

		$q_cek_login = $this->db->get_where('users', array('user_id' => $u, 'password' => $p));
		//$q_cek_login = $this->db->get_where('users', array('user_id' => 'varanka'));
		
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
				foreach($q_cek_login->result() as $qad){
					if($qad->level=="super admin"){
						$sess_data['logged_in'] = 'yesGetMeLogin';
						$sess_data['username'] = $qad->user_id;
						$sess_data['user_id'] = $qad->id;
						$sess_data['nama_pengguna'] = $qad->namalengkap;
						$sess_data['kec_id'] = $qad->kec_id;
						$sess_data['area'] = $qad->area;
						$sess_data['level'] = 'superadmin';
						$sess_data['menu_user'] = true;
						$sess_data['logdate'] = date("Y-m-d H:i:s");
						$this->session->set_userdata($sess_data);
						header('location:'.base_url().'cadmin/home/dashboard');
						//$this->load->cont('content');	
					}elseif($qad->level=="admin"){
						$sess_data['logged_in'] = 'yesGetMeLogin';
						$sess_data['username'] = $qad->user_id;
						$sess_data['user_id'] = $qad->id;
						$sess_data['nama_pengguna'] = $qad->namalengkap;
						$sess_data['kec_id'] = $qad->kec_id;
						$sess_data['area'] = $qad->area;
						$sess_data['level'] = 'superadmin';
						$sess_data['menu_user'] = false;
						$sess_data['logdate'] = date("Y-m-d H:i:s");
						$this->session->set_userdata($sess_data);
						header('location:'.base_url().'cadmin/home/dashboard');
						//$this->load->cont('content');	
					}elseif($qad->level=="admin2"){
						$sess_data['logged_in'] = 'yesGetMeLogin';
						$sess_data['username'] = $qad->user_id;
						$sess_data['user_id'] = $qad->id;
						$sess_data['nama_pengguna'] = $qad->namalengkap;
						$sess_data['kec_id'] = $qad->kec_id;
						$sess_data['area'] = $qad->area;
						$sess_data['level'] = 'admin2';
						$sess_data['logdate'] = date("Y-m-d H:i:s");
						$this->session->set_userdata($sess_data);
						header('location:'.base_url().'cadmin/home/dashboard');
						//$this->load->cont('content');	
					}elseif($qad->level=="driver"){
						$sess_data['logged_in'] = 'yesGetMeLogin';
						$sess_data['username'] = $qad->user_id;
						$sess_data['user_id'] = $qad->id;
						$sess_data['nama_pengguna'] = $qad->namalengkap;
						$sess_data['kec_id'] = $qad->kec_id;
						$sess_data['area'] = $qad->area;
						$sess_data['level'] = 'driver';
						$sess_data['logdate'] = date("Y-m-d H:i:s");
						$this->session->set_userdata($sess_data);
						header('location:'.base_url().'cadmin/home/dashboard');
						//$this->load->cont('content');	
					}elseif($qad->level=="umum"){
						$sess_data['logged_in'] = 'yesGetMeLogin';
						$sess_data['username'] = $qad->user_id;
						$sess_data['user_id'] = $qad->id;
						$sess_data['nama_pengguna'] = $qad->namalengkap;
						$sess_data['kec_id'] = $qad->kec_id;
						$sess_data['area'] = $qad->area;
						$sess_data['level'] = 'umum';
						$sess_data['logdate'] = date("Y-m-d H:i:s");
						$this->session->set_userdata($sess_data);
						header('location:'.base_url().'cadmin/home/dashboard');
						//$this->load->cont('content');
				    }
				}
			}
		}else{
			$this->session->set_flashdata('result_login', '<font color="red">Username atau Password yang anda masukkan salah.</font>');
				//header('location:'.base_url());
				redirect('/login','refresh');
		}
		
	}
	/*fungsi terbilang*/
	public function bilang($x) {
		$x = abs($x);
		$angka = array("", "satu", "dua", "tiga", "empat", "lima",
		"enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$result = "";
		if ($x <12) {
			$result = " ". $angka[$x];
		} else if ($x <20) {
			$result = $this->app_model->bilang($x - 10). " belas";
		} else if ($x <100) {
			$result = $this->app_model->bilang($x/10)." puluh". $this->app_model->bilang($x % 10);
		} else if ($x <200) {
			$result = " seratus" . $this->app_model->bilang($x - 100);
		} else if ($x <1000) {
			$result = $this->app_model->bilang($x/100) . " ratus" . $this->app_model->bilang($x % 100);
		} else if ($x <2000) {
			$result = " seribu" . $this->app_model->bilang($x - 1000);
		} else if ($x <1000000) {
			$result = $this->app_model->bilang($x/1000) . " ribu" . $this->app_model->bilang($x % 1000);
		} else if ($x <1000000000) {
			$result = $this->app_model->bilang($x/1000000) . " juta" . $this->app_model->bilang($x % 1000000);
		} else if ($x <1000000000000) {
			$result = $this->app_model->bilang($x/1000000000) . " milyar" . $this->app_model->bilang(fmod($x,1000000000));
		} else if ($x <1000000000000000) {
			$result = $this->app_model->bilang($x/1000000000000) . " trilyun" . $this->app_model->bilang(fmod($x,1000000000000));
		}      
			return $result;
	}
	public function terbilang($x, $style=4) {
		if($x<0) {
			$hasil = "minus ". trim($this->app_model->bilang($x));
		} else {
			$hasil = trim($this->app_model->bilang($x));
		}      
		switch ($style) {
			case 1:
				$hasil = strtoupper($hasil);
				break;
			case 2:
				$hasil = strtolower($hasil);
				break;
			case 3:
				$hasil = ucwords($hasil);
				break;
			default:
				$hasil = ucfirst($hasil);
				break;
		}      
		return $hasil;
	}
	
	
public function money_format($format, $number)
{
    $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'.
              '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/';
    if (setlocale(LC_MONETARY, 0) == 'C') {
        setlocale(LC_MONETARY, '');
    }
    $locale = localeconv();
    preg_match_all($regex, $format, $matches, PREG_SET_ORDER);
    foreach ($matches as $fmatch) {
        $value = floatval($number);
        $flags = array(
            'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ?
                           $match[1] : ' ',
            'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0,
            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ?
                           $match[0] : '+',
            'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0,
            'isleft'    => preg_match('/\-/', $fmatch[1]) > 0
        );
        $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0;
        $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0;
        $right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits'];
        $conversion = $fmatch[5];

        $positive = true;
        if ($value < 0) {
            $positive = false;
            $value  *= -1;
        }
        $letter = $positive ? 'p' : 'n';

        $prefix = $suffix = $cprefix = $csuffix = $signal = '';

        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign'];
        switch (true) {
            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+':
                $prefix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+':
                $suffix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+':
                $cprefix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+':
                $csuffix = $signal;
                break;
            case $flags['usesignal'] == '(':
            case $locale["{$letter}_sign_posn"] == 0:
                $prefix = '(';
                $suffix = ')';
                break;
        }
        if (!$flags['nosimbol']) {
            $currency = $cprefix .
                        ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) .
                        $csuffix;
        } else {
            $currency = 'Rp';
        }
        $space  = $locale["{$letter}_sep_by_space"] ? ' ' : '';

        $value = number_format($value, $right, $locale['mon_decimal_point'],
                 $flags['nogroup'] ? '' : $locale['mon_thousands_sep']);
        $value = @explode($locale['mon_decimal_point'], $value);

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]);
        if ($left > 0 && $left > $n) {
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0];
        }
        $value = implode($locale['mon_decimal_point'], $value);
        if ($locale["{$letter}_cs_precedes"]) {
            $value = $prefix . $currency . $space . $value . $suffix;
        } else {
            $value = $prefix . $value . $space . $currency . $suffix;
        }
        if ($width > 0) {
            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ?
                     STR_PAD_RIGHT : STR_PAD_LEFT);
        }

        $format = str_replace($fmatch[0], $value, $format);
    }
    return $format;
}
	
	
	
	public function status_menu($id,$menu)
	{
		if($id==$menu){
			$hasil="active";
		}else{
			$hasil="";
		}
		return $hasil;
	}
	public function getID_Pel(){
		$q = $this->db->query("select max(pel_id) as idz
			from pelanggan
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->idz;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_kec1_paket($id){
		$q = $this->db->query("select kec_id from pelanggan
			where pel_id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->kec_id;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function cek_pelanggan($id){
		$q = $this->db->query("select pel_id from pelanggan
			where pel_id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->pel_id;
			}
		}else{
			$hasil = "0";
		}
		return $hasil;
	}
	public function find_kec2_paket($id){
		$q = $this->db->query("select kec_id from paket
			where id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->kec_id;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_pel_id($id){
		$q = $this->db->query("select pel_id from paket
			where id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->pel_id;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}

	public function find_alamat_pel($id){
		$q = $this->db->query("select alamat from pelanggan
			where pel_id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->alamat;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
		public function find_dept2_pel($id){
		$q = $this->db->query("select dept2 from pelanggan
			where pel_id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->dept2;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_telp_pel($id){
		$q = $this->db->query("select telp from pelanggan
			where pel_id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->telp;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_kec_pel($id){
		$q = $this->db->query("select kec_id from pelanggan
			where pel_id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->kec_id;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_prov($id){
		$q = $this->db->query("select *
			from prov
			WHERE prov_id='$id'
			ORDER BY prov_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->prov;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_kec($id){
		$q = $this->db->query("select *
			from kec
			WHERE kec_id='$id'
			ORDER BY kec_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->kec;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_manifast_id(){
		$q = $this->db->query("select max(id) as ID
			from manifast_head
			ORDER BY id desc LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->ID;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function find_kokab($id){
		$q = $this->db->query("select *
			from kokab
			WHERE kokab_id='$id'
			ORDER BY kokab_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->kab;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_satuan_obat($id){
		$q = $this->db->query("select *
			from obat
			WHERE id='$id'
			ORDER BY id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->satuan;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function find_kedaluarsa_obat($id){
		$q = $this->db->query("select *
			from obat
			WHERE id='$id'
			ORDER BY id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $this->app_model->tgl_str($k->kedaluarsa);
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function find_jenis_obat($id){
		$q = $this->db->query("select *
			from obat
			WHERE id='$id'
			ORDER BY id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->jenis;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function find_nama_admin($id){
		$q = $this->db->query("select *
			from users
			WHERE user_id='$id'
			ORDER BY user_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->namalengkap;
			}
		}else{
			$hasil = "_______________________";
		}
		return $hasil;
	}
	public function find_kec_id_admin($id){
		$q = $this->db->query("select *
			from users
			WHERE user_id='$id'
			ORDER BY user_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->kec_id;
			}
		}else{
			$hasil = "";
		}
		return $hasil;
	}
	public function find_area_admin($id){
		$q = $this->db->query("select *
			from users
			WHERE user_id='$id'
			ORDER BY user_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->area;
			}
		}else{
			$hasil = "";
		}
		return $hasil;
	}
	public function find_user_id_admin($id){
		$q = $this->db->query("select *
			from users
			WHERE user_id='$id'
			ORDER BY user_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->user_id;
			}
		}else{
			$hasil = "";
		}
		return $hasil;
	}
	public function find_id_admin($id){
		$q = $this->db->query("select *
			from users
			WHERE user_id='$id'
			ORDER BY user_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->id;
			}
		}else{
			$hasil = "";
		}
		return $hasil;
	}
	public function ceklist_harga($id){
		if($id>0){
			$hasil="x";
		}else{
			$hasil="";
		}
		return $hasil;
	}
	public function find_foto($id){
		$q = $this->db->query("select *
			from users
			WHERE user_id='$id'
			ORDER BY user_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->foto;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function find_nama($id){
		$q = $this->db->query("select *
			from mahasiswa
			WHERE nim='$id'
			ORDER BY nim ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->nama;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function find_dept_pel($id){
	
		$q = $this->db->query("select *
		from pelanggan
		WHERE pel_id='$id'
		ORDER BY pel_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->dept;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function find_nama_pel($id){
		$q = $this->db->query("select *
			from pelanggan
			WHERE pel_id='$id'
			ORDER BY pel_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->nama;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function stok_awal_obat($id,$tgl){
		$tglen=$this->app_model->tgl_sql($tgl);
		$q = $this->db->query("SELECT SUM(mutasi) as stok from adjust_obat
		where obat_id='$id' and tgl<'$tglen'
		group by obat_id");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->stok;
			}
		}else{
			$hasil = 0;
		}
		return $hasil;
	}
	public function find_status_paket($id){
		$q = $this->db->query("select *
			from lacak
			WHERE resi='$id'
			ORDER BY tgl DESC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = substr($k->ket,4,20);
			}
		}else{
			$hasil = "On Proses";
		}
		return $hasil;
	}
	public function find_pel($id){
		$q = $this->db->query("select *
			from pelanggan
			WHERE pel_id='$id'
			ORDER BY pel_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->nama;
			}
		}else{
			$hasil = "";
		}
		return $hasil;
	}
	
	public function find_pengirim($id){
		$q = $this->db->query("select *
			from paket_pengirim
			WHERE id='$id'
			ORDER BY id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->nama;
			}
		}else{
			$hasil = "";
		}
		return $hasil;
	}
	public function find_dept_pengirim($id){
		$q = $this->db->query("select *
			from paket_pengirim
			WHERE id='$id'
			ORDER BY id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->dept;
			}
		}else{
			$hasil = "";
		}
		return $hasil;
	}
	
	public function find_kec_pengirim($id){
		$q = $this->db->query("select kec_id from paket_pengirim
			where id='$id'
			LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->kec_id;
			}
		}else{
			$hasil = "-";
		}
		return $hasil;
	}
	public function find_dept($id){
		$q = $this->db->query("select *
			from pelanggan
			WHERE pel_id='$id'
			ORDER BY pel_id ASC LIMIT 1");
		if($q->num_rows()>0){
			foreach($q->result() as $k){
				$hasil = $k->dept;
			}
		}else{
			$hasil = "";
		}
		return $hasil;
	}
	function getresi($id){
        
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->LIKE('resi',$id);
        $this->db->order_by('resi','ASC');
        $query = $this->db->get();
        return $query;
    }
	function GetCariResi(){
        $resi = $this->input->post('resi');
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->LIKE('resi',$resi);
        $this->db->order_by('resi','ASC');
        $query = $this->db->get();
        return $query;
    }
	function GetLacakResi(){
        $resi = $this->input->post('resi');
        $this->db->select('*');
        $this->db->from('paket');
        $this->db->where('resi',$resi);
        $this->db->order_by('resi','ASC');
        $query = $this->db->get();
        return $query;
    }
	function GetLacakTujuan($asal,$tujuan){
        // $tujuan = $this->input->post('tujuan');
        // $asal = $this->input->post('asal');
        $this->db->select('*');
        $this->db->from('tarif');
        $this->db->where(array('tujuan'=>$tujuan,'asal'=>$asal));
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        return $query;
    }
	public function get_users($id)
	{
		$this->db->limit(1);
		$this->db->from('users');
		$this->db->where('user_id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_prov()
	{
		$this->db->select('*');
		$this->db->from('prov');
		$this->db->order_by('prov_id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_kokab()
	{
		$this->db->select('*');
		$this->db->from('kokab');
		$this->db->order_by('kokab_id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_kec()
	{
		$this->db->select('*');
		$this->db->from('kec');
		$this->db->order_by('kec_id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_layanan()
	{
		$this->db->select('*');
		$this->db->from('layanan');
		$this->db->order_by('id','asc');
		$query = $this->db->get();
		return $query->result();
	}
	function getKabList(){
        $prov = $this->input->post('prov');
        $this->db->select('*');
        $this->db->from('kokab');
        $this->db->where('prov_id',$prov);
        $this->db->order_by('kab','ASC');
        $query = $this->db->get();
        return $query->result();
    }
	function getKecList(){
        $kab = $this->input->post('kab');
        $this->db->select('*');
        $this->db->from('kec');
        $this->db->where('kokab_id',$kab);
        $this->db->order_by('kec','ASC');
        $query = $this->db->get();
        return $query->result();
    }
	function get_kotatujuan(){
        $tujuan = $this->input->post('tujuan');
        $this->db->distinct();
	    $this->db->select('tujuan');
        $this->db->from('tarif');
        $this->db->like('tujuan',$tujuan ?? '');
        // $this->db->order_by('id','ASC');
        $query = $this->db->get();
        return $query->result();
    }
	function get_kotaasal(){
		$tujuan = $this->input->post('asal');
		$this->db->distinct();
		$this->db->select('asal');
		$this->db->from('tarif');
		$this->db->like('tujuan', $tujuan ?? '');
		// $this->db->order_by('id', 'ASC'); 
		$query = $this->db->get();
		return $query->result();
	}

	function get_tarif($limit = null)
	{
		$this->db->select('*'); 
		$this->db->from('tarif');
		$this->db->order_by('RAND()');
		if ($limit !== null) {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function first_promo()
	{
		$this->db->select('*');
		$this->db->from('promo');
		$this->db->where('status', 'active');
		$this->db->limit(1); 
		$query = $this->db->get();
		return $query->row();
	}

	function first_promo_is_active()
	{
		$this->db->select('*');
		$this->db->from('promo');
		$this->db->limit(1); 
		$query = $this->db->get();
		return $query->row();
	}

	public function update_promo($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('promo', $data);
    }

	function get_tarif_grouped()
	{
		$query = $this->db->order_by('asal', 'ASC')
                      ->order_by('id', 'ASC')
                      ->get('tarif');

		$result = $query->result_array();

		$tarif = [];
		foreach ($result as $row) {
			$tarif[$row['asal']][$row['id']] = [
				'harga'    => $row['harga'],
				'tujuan'   => $row['tujuan'],
				'asal'     => $row['asal'],
				'estimasi' => $row['estimasi'],
				'layanan'  => $row['layanan']
			];
		}

		return $tarif;
	}

	

	function area_kec_list(){
	
		$q=$this->db->query("SELECT * from kec order by kec_id desc");
		$arr = array();
		$no=1;
		foreach($q->result() as $k){
			$temp = array(
				"<div style='text-align:center;'>".$no."</div>",
				$k->kec_id,
				$k->kec,
				$this->app_model->find_kokab($k->kokab_id),
				$k->pos,
				"<a class='btn btn-sm btn-success' href='javascript:void(0)' title='Edit' onclick='edit(".'"'.$k->kec_id.'"'.")'><i class='fa fa-pencil'></i></a>
				<a class='btn btn-sm btn-danger' href='javascript:void(0)' title='Hapus' onclick='hapus(".'"'.$k->kec_id.'"'.")' data-action='hapus'><i class='fa fa-times'></i></a>",
			);
		   $no++;
			array_push($arr, $temp);
		}
		$data = json_encode($arr,JSON_UNESCAPED_UNICODE);
		return  "{\"data\":" . $data . "}";
	}
	function pasien_list_modal(){
	
		$q=$this->db->query("SELECT * from pasien order by id desc");
		$arr = array();
		$no=1;
		foreach($q->result() as $k){
			$temp = array(
				"<div style='text-align:center;'>".$no."</div>",
				$k->nama,
				"<div style='text-align:center;'>".$k->usia."</div>",
				$k->alamat,
				"<a class='btn btn-sm btn-success' href='javascript:void(0)' title='Pilih Pasien' onclick='pilih_pasien(".'"'.$k->id.'"'.",".'"'.$k->nama.'"'.")'><i class='fa fa-plus'></i> Pilih</a>",
			);
		   $no++;
			array_push($arr, $temp);
		}
		$data = json_encode($arr,JSON_UNESCAPED_UNICODE);
		return  "{\"data\":" . $data . "}";
	}
	public function area_kec_get($id)
	{
		$this->db->from('kec');
		$this->db->where('kec_id',$id);
		$query = $this->db->get();

		return $query->row();
	}
	
	//----------------end pasien -----------------------------------
	
	public function get_ci_sesi($id)
	{
		$this->db->select('*');
		$this->db->from('ci_sessions');
		$this->db->where('session_id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function contact_post(){
		date_default_timezone_set('Asia/Jakarta');	
		return $this->db->insert('guestbook',array(
			'nama'=>$this->input->post('contact_name',true),
			'subjek'=>$this->input->post('contact_subject',true),
			'email'=>$this->input->post('contact_email',true),
			'komentar'=>$this->input->post('contact_message',true),
			'telp'=>$this->input->post('contact_phone',true),
			'tanggal'=>date("Y-m-d h:i:s")
		));
		
	}
	
	
}
	
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */