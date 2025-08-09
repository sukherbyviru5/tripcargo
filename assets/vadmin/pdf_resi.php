<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pdf extends FPDF{
function __construct($orientation='P', $unit='cm', $size='A4')
  {
    parent::__construct($orientation,$unit,$size);
 }
 function Header(){   
    global $title ;
	$this->SetTextColor(128,128,128);
	$this->SetDrawColor(188,188,188);
    $lebar = $this->w;
    $this->SetFont('Helvetica','I',8);
    $w = $this->GetStringWidth($title );
    $this->SetX(($lebar -$w)/2);
    $this->Cell($w,0.5,$title. 'Cetak Surat Tanda Terima Barang (STT)'  ,0,0,'R');
    $this->Ln();
    // $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-2.0, $this->GetY());
    $this->Ln(0.3);	
 } 
  function Footer() {               
	$this->SetTextColor(128,128,128);
	$this->SetDrawColor(188,188,188);
	$this->SetY(-1.5);   
	$lebar = $this->w;   
	$this->SetFont('Helvetica','',8);           
	// $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-2, $this->GetY());
	$this->SetY(-1.5);
	$this->SetX(0);       
	$this->Ln(0.1);
	$hal = 'Page : '.$this->PageNo().'/{nb}' ;
	// $this->Cell($this->GetStringWidth($hal ),1.0,$hal );   
	// $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
	// $tanggal  = 'Printed at '.date('d-m-Y  h:i-a').' ';
	// $this->Cell($lebar-$this->GetStringWidth($hal )-$this->GetStringWidth($tanggal)-2.0);   
	// $this->Cell($this->GetStringWidth($tanggal),1.0,$tanggal );   
  } 	
}
 /* setting zona waktu */
    date_default_timezone_set('Asia/Jakarta');
    
	$pdf = new PDF();
	
    $pdf->SetMargins(1.0,0.8,1,1); //set margin kiri, atas, kanan, bawah 1cm
    $pdf->AliasNbPages(); //fungsi page number/total page pada footer 
    $pdf->AddPage(); //fungsi buat halaman baru 
	$pdf->SetLineWidth(0.01);
	$pdf->Ln(0);
	foreach($rs as $d){$hasil[]=$d;} //panggil database 

	
	$pdf->SetFont('Helvetica','',7); //set ulang font 
	$bar='./assets/images/logo-sancargo.png';
	$pdf->Image('./' . $bar,1.2,1.6,6);
	 // Generate Barcode
	 
    //load library
	$code=$d->resi;
	$this->zend->load('Zend/Barcode');
	//generate barcode
	//Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
	// $img = base_url().'barcode?bcd='.$code.'';
	$image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$code), array())->draw();
    $image_name     = $code.'.jpg';
    $image_dir      = './assets/barcode/'; // penyimpanan file barcode
    imagejpeg($image_resource, $image_dir.$image_name); 
		
	$img = base_url().'assets/barcode/'.$code.'.jpg';
	$pdf->Image($img, 8.0,1.8,5.6);
	
	$pdf->Cell(6.5,0.6,'','LRT',0,'C');
	$pdf->Cell(6.5,0.6,'','LRT',0,'C');
	$pdf->Cell(2.5,0.6,'ASAL','LRT',0,'C');
	$pdf->Cell(3.5,0.6,'TUJUAN','LRT',0,'C');
	$pdf->Ln();
	$pdf->Cell(6.5,0.6,'','LR',0,'C');
	$pdf->SetFont('Helvetica','B',10); //set ulang font
	$pdf->Cell(6.5,0.6,'','LR',0,'L');
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(2.5,0.6,''.substr($d->resi,0,3),'LBR',0,'C');
	$pdf->Cell(3.5,0.6,''.$this->app_model->find_kokab($d->kokab_id),'LBR',0,'C');
	$pdf->SetFont('Helvetica','',6); //set ulang font
	$pdf->Ln(0.6);
	
	//---------qrcode mulai -----------------------------------
	include "./application/libraries/qrcode/qrlib.php";
	$resi="https://www.insancargodepok.com/web/cari?k=".$d->resi;
	QRcode::png($resi,'image.png','L', 2, 1);
	$barq='image.png';
	$pdf->Image('./' . $barq, 18.1,10.2,1.8); //kiri, atas, ukuran barcode 
	//--------qrcode selesai -----------------------------------
		$pdf->SetFont('Helvetica','',6); //set ulang font
	$pdf->Cell(6.5,1.1,'Kawasan ruko 1000, Jl. Taman Palem Lestari No.18 Blok V, Cengkareng Barat, Kec. Cengkareng, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11730','LR',0,'C');
	$pdf->Cell(6.5,0.6,'                                       ','LR',0,'L');
	$pdf->Cell(2.5,0.6,'KOLI','LR',0,'C');
	$pdf->Cell(3.5,0.6,'BERAT / VOLUME','LR',0,'C');
	$pdf->Ln();
		$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(6.5,0.6,'Tlp.(021) 27612134 - Www.InsanCargoDepok.com','LBR',0,'C');
	$pdf->SetFont('Helvetica','B',12); //set ulang font
	$pdf->Cell(6.5,0.6,'','LBR',0,'C');//resi nomor ditampilkan disini
	$pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->Cell(2.5,0.6,''.$d->koli.' Pcs','LBR',0,'C');
	$pdf->Cell(3.5,0.6,''.$d->berat.' Kg'.'    '.  $d->vol.'','LBR',0,'C');
	$pdf->SetFont('Helvetica','I',7); //set ulang font
	$pdf->Ln();
	$pdf->Cell(3.3,0.6,'REG. PENGIRIM','LR',0,'C');
	$pdf->Cell(3.2,0.6,'REG. PENERIMA','LR',0,'C');
	$pdf->Cell(7.5,0.6,'PENERIMA','LR',0,'L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(2.5,0.6,'SERVICE','LBR',0,'L');
		$pdf->SetFont('Helvetica','B',10); //set ulang font
	$pdf->Cell(2.5,0.6,''.$d->layan,'LBR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(3.3,0.5,''.$d->regkirim,'LBR',0,'C');
	$pdf->Cell(3.2,0.5,''.$d->regterima,'LBR',0,'C');
	    $pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(7.5,0.5,''.$d->penerima. "	
".$d->dept2. " 
".$d->alamat. " 
".$this->app_model->find_kec($d->kec_id).", ".$this->app_model->find_kokab($d->kokab_id).", ".$this->app_model->find_prov($d->prov_id), 'LR','L');
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->SetXY(15,4.6);
	$pdf->Cell(2.5,0.7,'DFOD / COD','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga1),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga1,0),'LBR',0,'R');
	$pdf->Ln(0.5);
	$pdf->SetFont('Helvetica','I',7); //set ulang font
	$pdf->Cell(6.5,0.5,'PENGIRIM','LR',0,'L');
	// $pdf->Cell(7.5,0.6,'--','LR',0,'L');
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->SetXY(15,5.3);
	$pdf->Cell(2.5,0.7,'Biaya Kirim','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga2),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga2,0),'LBR',0,'R');
	$pdf->Ln(0.3);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(6.5,0.4,''.$this->app_model->find_nama_pel($d->pel_id).'
'.$d->dept.' 
'.$d->alamat_pel.'
'.$this->app_model->find_kec($d->kec).", ".$this->app_model->find_kokab($d->kokab).", ".$this->app_model->find_prov($d->prov),'LR','L');
	$pdf->MultiCell(6.5,0.5,'','LR','L');
	$pdf->SetXY(7.5,6.0);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(7.5,0.4,'','LR','L');
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->SetXY(15,6.0);
	$pdf->Cell(2.5,0.7,'Biaya Kirim EXPRES','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga3),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga3,0),'LBR',0,'R');
	$pdf->Ln(0.5);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	//$pkec=$this->app_model->find_kec_pel($d->pel_id);
	$pdf->MultiCell(6.5,0.5,'','LR','L');
	$pdf->SetXY(1.0,7.4);
	$pdf->Cell(6.5,0.7,'','LR',0,'L');
	$pdf->SetXY(7.5,7.4);
	$pdf->Cell(7.5,0.7,'','LR',0,'L');
	$pdf->SetXY(15,6.7);
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(2.5,0.7,'Biaya Asuransi','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga4),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga4,0),'LBR',0,'R');
	$pdf->SetXY(15,7.3);
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(2.5,0.7,'Biaya Packaging','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga5),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga5,0),'LBR',0,'R');	//garis baru
	$pdf->Ln();
	    $pdf->SetFont('Helvetica','',8); //set ulang font
	    $pdf->Cell(6.5,1.4,'Telp.  '.$this->app_model->find_telp_pel($d->pel_id),'LR',0,'L');
	$pdf->SetFont('Helvetica','B',16); //set ulang font
		$pdf->SetFont('Helvetica','',8); //set ulang font
	    $pdf->Cell(7.5,1.4,'Telp.  '.$d->telp,'LR',0,'L');
	$pdf->SetFont('Helvetica','',7); 
	$pdf->Cell(2.5,0.7,'Diskon','LBR',0,'L');
	    $pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->diskon),'LBR',0,'C');
	    $pdf->Cell(2.0,0.7,''.$d->diskon.'%','LBR',0,'R');	//garis baru
	    	$pdf->Cell(6.5,1.1,'','LR',0,'L');
	    		$pdf->Cell(6.5,1.1,'','LR',0,'L');
	    
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'','LBR',0,'L');
		$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(7.5,0.4,'','LBR',0,'L');
	$pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->Cell(5.0,0.4,'JUMLAH    Rp '.number_format($d->totalbayar,0),'LBR',0,'R');
	//garis baru
	//$pdf->Ln();
	//$pdf->SetFont('Helvetica','',8); //set ulang font
	//$pdf->Cell(6.5,0.4,'Catatan ','LR',0,'L');
	//$pdf->Cell(12.5,0.4,'Terbilang'.$d->metode.'','LTR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	if($d->p){
		$vol=$d->p.'x'.$d->l.'x'.$d->t.'(cm)';
	}else{
		$vol="";
	}
	    $pdf->SetTextColor(153,0,0);
	    $pdf->SetFont('Helvetica','B',7); //set ulang font
	    $pdf->Cell(6.5,0.6,'ISI PAKET TIDAK DIPERIKSA DAN TIDAK DIKETAHUI ','BL',0,'L');
	$pdf->SetTextColor(0,0,0);    
	$pdf->SetFont('Helvetica','I',8); 
	$pdf->Cell(12.5,0.6,'#'.ucwords(strtolower($this->app_model->bilang($d->totalbayar).'rupiah')).'#','LBR',0,'C');
	
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(6.5,0.4,'KETERANGAN ISI','LR',0,'C');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(3.5,0.4,'Pengirim','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Diterima Oleh','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Operator','LR',0,'C');
	$pdf->Cell(2.0,0.4,'','LR',0,'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	 $pdf->SetFont('Helvetica','',8); //set ulang font
        $pdf->Cell(6.5,0.6,''.$d->catatan,'LR',0,'C'); 
	$pdf->Cell(3.5,0.6,'','LR',0,'L');
	$pdf->Cell(3.5,0.6,'','LR',0,'L');
	$pdf->Cell(3.5,0.6,''.$d->tglkirim,'LR',0,'C');
	$pdf->Cell(2.0,0.6,'','LR',0,'L');
	$pdf->Ln();
	    $pdf->SetFont('Helvetica','',8); //set ulang font
        $pdf->Cell(6.5,0.6,''.$d->deskripsi,'LR',0,'C');  
	$pdf->Cell(3.5,0.4,'','LR',0,'L');
	$pdf->Cell(3.5,0.4,'','LR',0,'L');
	$pdf->Cell(3.5,0.4,'','LR',0,'C');
	$pdf->Cell(2.0,0.4,'','LR',0,'C');
	$pdf->Ln();
	    $pdf->SetFont('Helvetica','',8); //set ulang font
	    $pdf->Cell(6.5,0.6,'','LB',0,'C');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(3.5,0.6,'Nama / ttd','LRB',0,'L');
	$pdf->Cell(3.5,0.6,'Nama / ttd / Cap / tlp','LRB',0,'L');
	$pdf->Cell(3.5,0.6,''.$this->app_model->find_nama_admin($d->user_id),'RLB',0,'C');
	$pdf->Cell(2.0,0.6,'','RLB',0,'C');
	$pdf->Ln(0.6);
	$pdf->SetFont('Helvetica','I',5.7); //set ulang font
	$pdf->MultiCell(19,0.4,' Ketentuan yang diterapkan dalam setiap pengiriman bilamana terjadi kehilangan / kekurangan atas titipan penggantinya maximal 10 kali lipat biaya pengiriman yang hilang / rusak atau maksimum Rp.1.000.000,-','LRB','L');
	
	
	$pdf->SetDrawColor(188,188,188);
	$pdf->Line(1.0,13.0,20,13.0);
	
		$pdf->Ln(0.5);
		$pdf->SetTextColor(153,0,0);	
	$pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->MultiCell(19,0.7,' SYARAT DAN PERATURAN PENGIRIMAN BARANG','LRB','C');
	$pdf->SetTextColor(0,0,0);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	    $pdf->Cell(0.5,0.4,'1.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Titipan dianggap Sah bilamana pengirim sudah menanda-tangani dan menerima lembaran / bukti Surat Tanda Terima (STT).','RB','J');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	    $pdf->Cell(0.5,0.8,'2.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Apabila dalam kurun waktu 24 jam setelah (STT) ini dibuat tidak ada pembatalan maka dengan sendirinya dianggap pengirim telah mensetujui syarat-syarat / pedoman pengiriman yang dikeluarkan oleh perusahaan kami.','RB','DD');
	    $pdf->Cell(0.5,0.4,'3.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'System pengiriman Via Darat, Laut dan Udara (door to door).','RB','DD');
		$pdf->Cell(0.5,0.8,'4.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Pengirim maupun penerima bersama-sama bertanggung jawab terhadap semua biaya pengiriman sesuai perhitungan menurut tarif yang dikeluarkan perusahaan kami, dan bilamana tidak terpenuhi maka perusahaan berhak mengadakan penahaan.','RB','DD');
	    $pdf->Cell(0.5,0.8,'5.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Isi Barang Tidak diperiksa, pengirim wajib nengasuransikan barang kirimannya terlebih dahulu. Bilamana terjadi kehilangan / kerusakan terhadap barang kiriman, perusahaan hanya mengganti rugi sesuai aturan pengiriman (Poin No. 16).','RB','DD');
	    $pdf->Cell(0.5,0.8,'6.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Keselamatan barang kiriman akibat pengepakan yang tidak sempurna atau faktor cuaca sehingga menimbulkan kerugian karna isi kiriman menjadi rusak basah dan hilang, sepenuhnya menjadi resiko pengirim dan penerima.','RB','DD');
    	$pdf->Cell(0.5,1.2,'7.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Barang -barang yang bersifat Pecah belah dan mudah retak seperti kaca / gelas, kramik, monitor / TV, Radio / Electronic, Fiber glass, bibit tanaman / tumbuh-tumbuhan, binatang hidup serta sejumlah spart-part mesin maupun kendaraan, jika terjadi kerusakan / kematian spenuhnya menjadi tanggung jawab pengirim / penerima.','RB','DD');
	    $pdf->Cell(0.5,0.8,'8.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Dilarang Keras mengirim barang-barang terlarang oleh Pemerintah seperti Narkoba / obat2 terlarang, bahan peledak, Cairan/kimia yang dapat mebahayakan kelesamatan umum (Dangerous Goods) dan barang-barang berharga.','RB','DD');
	    $pdf->Cell(0.5,0.4,'9.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Perusahaan melarang keras dan tidak menerima barang-barang kiriman yang bersifat cairan apapun via pesawat.','RB','DD');
	    $pdf->Cell(0.5,0.8,'10.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Perusahan tidak memberikan ganti rugi terhadap kiriman cairan dan kaca via kapal laut, apabila terjadi kebocoran / tumpah dan pecah / retak sepenuhnya menjadi resiko pengirim dan penerima.','RB','DD');
	    $pdf->Cell(0.5,0.8,'11.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Barang Cairan harus dipetikan dan apabila terjadi kebocoran / tumpah sehingga menyebabkan kerusakan / kerugian terhadap pihak ke tiga, maka pengirim berkewajiban untuk menyelesaikan secara baik.','RB','DD');
	    $pdf->Cell(0.5,0.8,'12.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Perusahaan Bertanggung jawab terhadap barang kiriman selama belum diserahkan kepada pihak penerima, terkecuali karna sesuatu hal yang menyebabkan kiriman ditahan oleh pihak berwajib, maka pengirim / penerima wajib nyenyelesaikan sendiri.','RB','DD');
	    $pdf->Cell(0.5,0.8,'13.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Perusahaan tidak menjamin ketepan waktu pengiriman atau penyerahan yang dikehendaki pengirim dan tidak menggantikan ganti rugi terhadap keterlambatan pengiriman.','RB','DD');
	    $pdf->Cell(0.5,0.8,'14.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Perusahaan tidak memberi ganti rugi terhadap kerusakan / kehilangan akibat Bencana alam, huru-hara dan Force Majeure. Perusahaan akan mengganti rugi terhadap ketentuan-ketentuan yang berlaku.','RB','DD');
	    $pdf->Cell(0.5,0.8,'15.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Pengajuan Claim secara tertulis selambat-lambatnya dalam kurun waktu 1 (satu) bulan setelah tanggal pengiriman yang tertera pada surat Tanda Terima (STT), dengan dilampirkan bukti-bukti yang diperlukan dan surat berita acara atau rekomendasi dari kantor cabang / perwkilan setempat.','RB','DD');
	    $pdf->Cell(0.5,0.8,'16.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Ganti Rugi terhadap kehilangan barang kiriman secara total (lost Total) adalah 10 (sepuluh) kali biaya pengiriman yeng tertera dalam (STT) dan tidak bersifat Faktur / nota pembelian atau maxsimal 1.000.000,- (satu Juta).','RB','DD');
	    $pdf->Cell(0.5,0.4,'17.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Pengajuan Claim setelah lebih dari 1 (satu) bulan dari tanggal pengiriman yang tertera di (STT) dianggap kedaluwarsa. ','RB','DD');
	    $pdf->Cell(0.5,0.4,'18.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Jadwal dan Waktu pemberangkatan armada / kapal / pesawat sewaktu-waktu dapat berubah tanpa pemberitahuan terlebih dahulu. ','RB','DD');
	$pdf->Cell(0.5,0.4,'19.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Penghitungan berdasarkan Berat, Volume, Surecharge dan kubikasi sesuai dengan keadan barang kiriman. ','RB','DD');
	$pdf->Cell(0.5,0.4,'20.','LB',0,'');
	$pdf->MultiCell(18.5,0.4,'Tulis Nomor Tlp yang jelas dan alamat untuk mempercepat pengantaran. ','RB','DD');
	//-------------------------------------------------------------------------
	
	//mulai judul center 
    $pdf->SetY(1);  /* setting posisi footer 3 cm dari bawah */
    //$pdf->SetFont('Times','',10); /* setting font untuk footer */
    /* setting cell untuk waktu pencetakan */
    $pdf->SetFont('Helvetica','I',6); //set ulang font
    $pdf->Cell(15.5, 23.6, 'Cetak Tanggal: : '.date('d/m/Y H:i').'',0,'LR','L');

	
    /* setting cell untuk page number */
    //$pdf->Cell(9.5, 0.5, 'Page '.$pdf->PageNo().' of {nb}',0,0,'R');
    /* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
    $pdf->Output(''  .$d->resi,'I');