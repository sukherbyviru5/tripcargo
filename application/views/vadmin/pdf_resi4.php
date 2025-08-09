<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pdf extends FPDF{
function __construct($orientation='P', $unit='cm', $size='legal')
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
    $this->Cell($w,-0.1,$title. ''  ,0,0,'C');
    $this->Ln();
    // $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-2.0, $this->GetY());
    $this->Ln(-0.1);	
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
	$bar='./assets/images/logo.jpeg';
	$pdf->Image('./' . $bar,1.2,0.7,6);
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
	$pdf->Image($img, 8.0,0.7,5.6);
	
	$pdf->Cell(6.5,0.6,'','LRT',0,'C');
	$pdf->Cell(6.5,0.6,'','LRT',0,'C');
	$pdf->Cell(2.5,0.6,'ASAL','LRT',0,'C');
	$pdf->Cell(3.9,0.6,'TUJUAN','LRT',0,'C');
	$pdf->Ln();
	$pdf->Cell(6.5,0.6,'','LR',0,'C');
	$pdf->SetFont('Helvetica','B',10); //set ulang font
	$pdf->Cell(6.5,0.6,'','LR',0,'L');
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(2.5,0.6,''.substr($d->resi,0,3),'LBR',0,'C');
	$pdf->Cell(3.9,0.6,''.$this->app_model->find_kokab($d->kokab_id),'LBR',0,'C');
	$pdf->SetFont('Helvetica','',6); //set ulang font
	$pdf->Ln(0.6);
	
	//---------qrcode mulai -----------------------------------
	include "./application/libraries/qrcode/qrlib.php";
	$resi="https://www.insancargodepok.com/web/cari?k=".$d->resi;
	QRcode::png($resi,'image.png','L', 2, 1);
	$barq='image.png';
	$pdf->Image('./' . $barq, 18.3,8.7,1.8); //kiri, atas, ukuran barcode 
	//--------qrcode selesai -----------------------------------
	
	$pdf->Cell(6.5,1.1,'Office: Jl. Kedaung Tirta No. 34 Tirtajaya, Sukmajaya, Depok','LR',0,'C');
	$pdf->Cell(6.5,0.6,'','LR',0,'L');
	$pdf->Cell(2.5,0.6,'KOLI','LR',0,'C');
	$pdf->Cell(3.9,0.6,'BERAT','LR',0,'C');
	$pdf->Ln();
	$pdf->Cell(6.5,0.6,'Tlp.(021)27612134 - Www.InsanCargoDepok.com','LBR',0,'C');
	$pdf->SetFont('Helvetica','B',12); //set ulang font
	$pdf->Cell(6.5,0.6,'','LBR',0,'C');//resi nomor ditampilkan disini
	$pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->Cell(2.5,0.6,''.$d->koli.' Pcs','LBR',0,'C');
	$pdf->Cell(3.9,0.6,''.$d->berat.' Kg','LBR',0,'C');
	$pdf->SetFont('Helvetica','I',7); //set ulang font
	$pdf->Ln();
	$pdf->Cell(3.3,0.6,'REG. PENGIRIM','LR',0,'C');
	$pdf->Cell(3.2,0.6,'REG. PENERIMA','LR',0,'C');
	$pdf->Cell(7.5,0.6,'PENERIMA','L',0,'L');
	$pdf->Cell(2.9,0.6,'SERVICE','LBR',0,'L');
	$pdf->SetFont('Helvetica','B',10); //set ulang font
	$pdf->Cell(2.5,0.6,''.$d->layan,'LBR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(3.3,0.5,''.$d->regkirim,'LBR',0,'C');
	$pdf->Cell(3.2,0.5,''.$d->regterima,'LBR',0,'C');
$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(7.5,0.4,''
 .$d->penerima . " 
".$d->dept2."

".$d->alamat." 

".$this->app_model->find_kec($d->kec_id).", ".$this->app_model->find_kokab($d->kokab_id).", ".$this->app_model->find_prov($d->prov_id).",
Tlp. ". $d->telp,'LR','L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,3.6);
	$pdf->Cell(2.9,0.7,'DFOD33 / COD','LBR',0,'L');//harga tidak ditampil
	$pdf->Cell(0.5,0.7,'','LBR',0,'C');         //$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga1),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,'','LBR',0,'R');         //$pdf->Cell(2.0,0.7,''.number_format($d->harga1,0),'LBR',0,'R');
	$pdf->Ln(0.5);
	$pdf->SetFont('Helvetica','I',7); //set ulang font
	$pdf->Cell(6.5,0.5,'PENGIRIM','LR',0,'L');
	// $pdf->Cell(7.5,0.6,'--','LR',0,'L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,4.2);
	$pdf->Cell(2.9,0.7,'PAKET','LBR',0,'L');    //harga tidak ditampil
	$pdf->Cell(0.5,0.7,'','LBR',0,'C');         //$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga2),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,'','LBR',0,'R');         //$pdf->Cell(2.0,0.7,''.number_format($d->harga2,0),'LBR',0,'R');
	$pdf->Ln(0.3);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(6.5,0.5,''.$d->dept,'LR','L');
	$pdf->MultiCell(6.5,0.5,'','LR','L');
	$pdf->SetXY(7.5,4.5);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(7.5,0.5,'','L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,4.9);
	$pdf->Cell(2.9,0.7,'HARI YG SAMA','LBR',0,'L');     //harga tidak ditampil
	$pdf->Cell(0.5,0.7,'','LBR',0,'C');     	        //$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga3),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,'','LBR',0,'R');                 //$pdf->Cell(2.0,0.7,''.number_format($d->harga3,0),'LBR',0,'R');
	$pdf->Ln(0.1);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pkec=$this->app_model->find_kec_pel($d->pel_id);
	$pdf->MultiCell(6.5,0.5,''.$this->app_model->find_nama_pel($d->pel_id).',
'.$d->alamat_pel.', 
'.$this->app_model->find_kec($d->kec).", ".$this->app_model->find_kokab($d->kokab).", ".$this->app_model->find_prov($d->prov),'LR','L');
	$pdf->SetXY(1.0,6.0);
	$pdf->Cell(6.5,1.0,'','LR',0,'L');

	$pdf->SetXY(15,5.6);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(2.9,0.7,'ASURANSI','LBR',0,'L');         //harga tidak ditampil
	$pdf->Cell(0.5,0.7,'','LBR',0,'C');                 //$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga4),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,'','LBR',0,'R');                 //$pdf->Cell(2.0,0.7,''.number_format($d->harga4,0),'LBR',0,'R');
	$pdf->SetXY(15,6.3);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(2.9,0.7,'Lain-lain','LBR',0,'L');        //harga tidak ditampil
	$pdf->Cell(0.5,0.7,'','LBR',0,'C');                 //$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga5),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,'','LBR',0,'R');	//garis baru        //$pdf->Cell(2.0,0.7,''.number_format($d->harga5,0),'LBR',0,'R');	//garis baru
	$pdf->Ln();
	$pdf->Cell(6.5,0.4,'','LR',0,'L');
	$pdf->Cell(7.5,0.4,'','LR',0,'L');
	$pdf->SetFont('Helvetica','I',8); 
	$pdf->Cell(5.4,0.4,'','R',0,'L');                   //$pdf->Cell(5.4,0.4,'Diskon: '.$d->diskon.'%','R',0,'L');    //harga tidak ditampil
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Telp.'  .$this->app_model->find_telp_pel($d->pel_id),'LBR',0,'LR');
		$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(7.5,0.4,'',0,'');
    $pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->Cell(5.4,0.4,'Jumlah: ','LBR',0,'L');        //$pdf->Cell(5.4,0.4,'Jumlah    Rp '.number_format($d->totalbayar,0),'LBR',0,'R');
	//garis baru
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Catatan ','LR',0,'L');
	$pdf->Cell(12.9,0.4,'Terbilang','LTR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','i',8); //set ulang font
	if($d->p){
		$vol=$d->p.'x'.$d->l.'x'.$d->t.'(cm)';
	}else{
		$vol="";
	}
	$pdf->SetFont('Helvetica','i',9); //set ulang font
	$pdf->Cell(6.5,0.4,''.$d->catatan,'LBR',0,'L');
	$pdf->Cell(12.9,0.4,'','LBR',0,'C');           //$pdf->Cell(12.9,0.4,'#'.ucwords(strtolower($this->app_model->bilang($d->totalbayar).'rupiah')).' #','LBR',0,'C');
	
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Volume','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Pengirim','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Diterima Oleh','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Operator','LR',0,'C');
	$pdf->Cell(2.4,0.4,'','LR',0,'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(6.5,0.6,''.$vol.'','LBR',0,'C');
	$pdf->Cell(3.5,0.6,'','LR',0,'L');
	$pdf->Cell(3.5,0.6,'','LR',0,'L');
	$pdf->Cell(3.5,0.6,''.date('d M Y H:i:s', strtotime($d->tglkirim)),'LR',0,'C');
	$pdf->Cell(2.4,0.6,'','LR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(6.5,0.4,'KETERANGAN ISI','LR',0,'L');
	$pdf->Cell(3.5,0.4,'','LR',0,'L');
	if($d->p){
		$vol=$d->p.'x'.$d->l.'x'.$d->t.'cm';
	}else{
		$vol="";
	}
	$pdf->Cell(3.5,0.4,'','LR',0,'L');
	$pdf->Cell(3.5,0.4,'','LR',0,'C');
	$pdf->Cell(2.4,0.4,'','LR',0,'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.6,''.$d->deskripsi,'LRB',0,'L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(3.5,0.6,'Nama / ttd','LRB',0,'L');
	$pdf->Cell(3.5,0.6,'Nama / ttd / Cap','LRB',0,'L');
	$pdf->Cell(3.5,0.6,''.$this->app_model->find_nama_admin($d->user_id),'RLB',0,'C');
	$pdf->Cell(2.4,0.6,'','RLB',0,'C');
	$pdf->Ln(0.6);
	$pdf->SetFont('Helvetica','I',5.7); //set ulang font
	$pdf->MultiCell(19.4,0.4,' Ketentuan yang diterapkan dalam setiap pengiriman bilamana terjadi kehilangan / kekurangan atas titipan penggantinya maximal 10 kali lipat biaya pengiriman yang hilang / rusak atau maksimum Rp.1.000.000,-','LRB','L');
	
	
	$pdf->SetDrawColor(4,4,4);
	$pdf->Line(1.0,11.3,20.5,11.3);
	//-------------------------------------------------------------------------
	$pdf->SetXY(1,11.6);
	$img = base_url().'assets/barcode/'.$code.'.jpg';
	$pdf->Image($img, 8.0,11.8,5.6);
	$pdf->SetFont('Helvetica','',7); //set ulang font 
	$bar='./assets/images/logo.jpeg';
	$pdf->Image('./' . $bar,1.2,11.7,6);
	$pdf->Cell(6.5,0.6,'','LRT',0,'C');
	$pdf->Cell(6.5,0.6,'','LRT',0,'C');
	$pdf->Cell(2.5,0.6,'ASAL','LRT',0,'C');
	$pdf->Cell(3.9,0.6,'TUJUAN','LRT',0,'C');
	$pdf->Ln();
	$pdf->Cell(6.5,0.6,'','LR',0,'C');
	$pdf->SetFont('Helvetica','B',10); //set ulang font
	$pdf->Cell(6.5,0.6,'','LR',0,'L');
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(2.5,0.6,''.substr($d->resi,0,3),'LBR',0,'C');
	$pdf->Cell(3.9,0.6,''.$this->app_model->find_kokab($d->kokab_id),'LBR',0,'C');
	$pdf->SetFont('Helvetica','',6); //set ulang font
	$pdf->Ln(0.6);
	
	//---------qrcode mulai -----------------------------------
	
	$pdf->Image('./' . $barq, 18.3,19.8,1.8); //kiri, atas, ukuran barcode 
	//--------qrcode selesai -----------------------------------
	
	$pdf->Cell(6.5,1.1,'Office: Jl. Kedaung Tirta No. 34 Tirtajaya, Sukmajaya, Depok','LR',0,'C');
	$pdf->Cell(6.5,0.6,'','LR',0,'L');
	$pdf->Cell(2.5,0.6,'KOLI','LR',0,'C');
	$pdf->Cell(3.9,0.6,'BERAT','LR',0,'C');
	$pdf->Ln();
	$pdf->Cell(6.5,0.6,'Tlp.(021)27612134 - Www.InsanCargoDepok.com','LBR',0,'C');
	$pdf->SetFont('Helvetica','B',12); //set ulang font
	$pdf->Cell(6.5,0.6,'','LBR',0,'C');//resi nomor ditampilkan disini
	$pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->Cell(2.5,0.6,''.$d->koli.' Pcs','LBR',0,'C');
	$pdf->Cell(3.9,0.6,''.$d->berat.' Kg','LBR',0,'C');
	$pdf->SetFont('Helvetica','I',7); //set ulang font
	$pdf->Ln();
	$pdf->Cell(3.3,0.6,'REG. PENGIRIM','LR',0,'C');
	$pdf->Cell(3.2,0.6,'REG. PENERIMA','LR',0,'C');
	$pdf->Cell(7.5,0.6,'PENERIMA','L',0,'L');
	$pdf->Cell(2.9,0.6,'SERVICE','LBR',0,'L');
	$pdf->SetFont('Helvetica','B',10); //set ulang font
	$pdf->Cell(2.5,0.6,''.$d->layan,'LBR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(3.3,0.5,''.$d->regkirim,'LBR',0,'C');
	$pdf->Cell(3.2,0.5,''.$d->regterima,'LBR',0,'C');
	$pdf->SetFont('Helvetica','',8); //set ulang font
$pdf->MultiCell(7.5,0.4,''
 .$d->penerima . " 
".$d->dept2."

".$d->alamat." 

".$this->app_model->find_kec($d->kec_id).", ".$this->app_model->find_kokab($d->kokab_id).", ".$this->app_model->find_prov($d->prov_id).",
Tlp. ". $d->telp,'LR','L');
	
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,14.6);
	$pdf->Cell(2.9,0.7,'DFOD / COD','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga1),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga1,0),'LBR',0,'R');
	$pdf->Ln(0.5);
	$pdf->SetFont('Helvetica','I',7); //set ulang font
	$pdf->Cell(6.5,0.5,'PENGIRIM','LR',0,'L');
	// $pdf->Cell(7.5,0.6,'--','LR',0,'L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,15.3);
	$pdf->Cell(2.9,0.7,'PAKET','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga2),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga2,0),'LBR',0,'R');
	$pdf->Ln(0.3);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(6.5,0.5,''.$d->dept,'LR','L');
	$pdf->MultiCell(6.5,0.5,'','LR','L');
	$pdf->SetXY(7.5,15.5);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(7.5,0.5,'');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,16.0);
	$pdf->Cell(2.9,0.7,'HARI YG SAMA','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga3),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga3,0),'LBR',0,'R');
	$pdf->Ln(0.1);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pkec=$this->app_model->find_kec_pel($d->pel_id);
	$pdf->MultiCell(6.5,0.5,''.$this->app_model->find_nama_pel($d->pel_id).',
'.$d->alamat_pel.', 
'.$this->app_model->find_kec($d->kec).", ".$this->app_model->find_kokab($d->kokab).", ".$this->app_model->find_prov($d->prov),'LR','L');
	$pdf->SetXY(1.0,16.8);
	$pdf->Cell(6.5,2.7,'','LR',0,'L');

	$pdf->SetXY(15,16.7);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(2.9,0.7,'ASURANSI','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga4),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga4,0),'LBR',0,'R');
	$pdf->SetXY(15,17.4);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(2.9,0.7,'Lain-lain','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga5),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga5,0),'LBR',0,'R');	//garis baru
	$pdf->Ln();
	$pdf->Cell(6.5,0.4,'','LR',0,'L');
	$pdf->Cell(7.5,0.4,'','LR',0,'L');
	$pdf->SetFont('Helvetica','I',8); 
	$pdf->Cell(5.4,0.4,'Diskon: '.$d->diskon.'%','R',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Telp.'  .$this->app_model->find_telp_pel($d->pel_id),'LBR',0,'L1');
		$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(7.5,0.4,'',0,'');
    $pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->Cell(5.4,0.4,'Jumlah    Rp '.number_format($d->totalbayar,0),'LBR',0,'R');
	//garis baru
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Catatan ','LR',0,'L');
	$pdf->Cell(12.9,0.4,'Terbilang','LTR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','i',8); //set ulang font
	if($d->p){
		$vol=$d->p.'x'.$d->l.'x'.$d->t.'(cm)';
	}else{
		$vol="";
	}
	$pdf->SetFont('Helvetica','i',9); //set ulang font
	$pdf->Cell(6.5,0.4,''.$d->catatan,'LBR',0,'L');
	$pdf->Cell(12.9,0.4,'#'.ucwords(strtolower($this->app_model->bilang($d->totalbayar).'rupiah')).' #','LBR',0,'C');
	
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Volume','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Pengirim','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Diterima Oleh','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Operator','LR',0,'C');
	$pdf->Cell(2.4,0.4,'','LR',0,'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(6.5,0.6,''.$vol.'','LBR',0,'C');
	$pdf->Cell(3.5,0.6,'','LR',0,'L');
	$pdf->Cell(3.5,0.6,'','LR',0,'L');
	$pdf->Cell(3.5,0.6,''.$d->tglkirim,'LR',0,'C');
	$pdf->Cell(2.4,0.6,'','LR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(6.5,0.4,'KETERANGAN ISI','LR',0,'L');
	$pdf->Cell(3.5,0.4,'','LR',0,'L');
	if($d->p){
		$vol=$d->p.'x'.$d->l.'x'.$d->t.'cm';
	}else{
		$vol="";
	}
	$pdf->Cell(3.5,0.4,'','LR',0,'L');
	$pdf->Cell(3.5,0.4,'','LR',0,'C');
	$pdf->Cell(2.4,0.4,'','LR',0,'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.6,''.$d->deskripsi,'LRB',0,'L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(3.5,0.6,'Nama / ttd','LRB',0,'L');
	$pdf->Cell(3.5,0.6,'Nama / ttd / Cap','LRB',0,'L');
	$pdf->Cell(3.5,0.6,''.$this->app_model->find_nama_admin($d->user_id),'RLB',0,'C');
	$pdf->Cell(2.4,0.6,'','RLB',0,'C');
	$pdf->Ln(0.6);
	$pdf->SetFont('Helvetica','I',5.7); //set ulang font
	$pdf->MultiCell(19.4,0.4,' Ketentuan yang diterapkan dalam setiap pengiriman bilamana terjadi kehilangan / kekurangan atas titipan penggantinya maximal 10 kali lipat biaya pengiriman yang hilang / rusak atau maksimum Rp.1.000.000,-','LRB','L');
	
	
	$pdf->SetDrawColor(4,4,4);
	$pdf->Line(1.0,22.4,20.5,22.4);
	//-------------------------------------------------------------------------
		$pdf->SetXY(1,22.6);
	$img = base_url().'assets/barcode/'.$code.'.jpg';
	$pdf->Image($img, 8.0,22.8,5.6);
	$pdf->SetFont('Helvetica','',7); //set ulang font 
	$bar='./assets/images/logo.jpeg';
	$pdf->Image('./' . $bar,1.2,22.7,6);
	$pdf->Cell(6.5,0.6,'','LRT',0,'C');
	$pdf->Cell(6.5,0.6,'','LRT',0,'C');
	$pdf->Cell(2.5,0.6,'ASAL','LRT',0,'C');
	$pdf->Cell(3.9,0.6,'TUJUAN','LRT',0,'C');
	$pdf->Ln();
	$pdf->Cell(6.5,0.6,'','LR',0,'C');
	$pdf->SetFont('Helvetica','B',10); //set ulang font
	$pdf->Cell(6.5,0.6,'','LR',0,'L');
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(2.5,0.6,''.substr($d->resi,0,3),'LBR',0,'C');
	$pdf->Cell(3.9,0.6,''.$this->app_model->find_kokab($d->kokab_id),'LBR',0,'C');
	$pdf->SetFont('Helvetica','',6); //set ulang font
	$pdf->Ln(0.6);
	
	//---------qrcode mulai -----------------------------------
	
	$pdf->Image('./' . $barq, 18.3,30.8,1.8); //kiri, atas, ukuran barcode 
	//--------qrcode selesai -----------------------------------
	
	$pdf->Cell(6.5,1.1,'Office: Jl. Kedaung Tirta No. 34 Tirtajaya, Sukmajaya, Depok','LR',0,'C');
	$pdf->Cell(6.5,0.6,'','LR',0,'L');
	$pdf->Cell(2.5,0.6,'KOLI','LR',0,'C');
	$pdf->Cell(3.9,0.6,'BERAT','LR',0,'C');
	$pdf->Ln();
	$pdf->Cell(6.5,0.6,'Tlp.(021)27612134 - Www.InsanCargoDepok.com','LBR',0,'C');
	$pdf->SetFont('Helvetica','B',12); //set ulang font
	$pdf->Cell(6.5,0.6,'','LBR',0,'C');//resi nomor ditampilkan disini
	$pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->Cell(2.5,0.6,''.$d->koli.' Pcs','LBR',0,'C');
	$pdf->Cell(3.9,0.6,''.$d->berat.' Kg','LBR',0,'C');
	$pdf->SetFont('Helvetica','I',7); //set ulang font
	$pdf->Ln();
	$pdf->Cell(3.3,0.6,'REG. PENGIRIM','LR',0,'C');
	$pdf->Cell(3.2,0.6,'REG. PENERIMA','LR',0,'C');
	$pdf->Cell(7.5,0.6,'PENERIMA','L',0,'L');
	$pdf->Cell(2.9,0.6,'SERVICE','LBR',0,'L');
	$pdf->SetFont('Helvetica','B',10); //set ulang font
	$pdf->Cell(2.5,0.6,''.$d->layan,'LBR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(3.3,0.5,''.$d->regkirim,'LBR',0,'C');
	$pdf->Cell(3.2,0.5,''.$d->regterima,'LBR',0,'C');
	$pdf->SetFont('Helvetica','',8); //set ulang font
$pdf->MultiCell(7.5,0.4,''
 .$d->penerima . " 
".$d->dept2."

".$d->alamat." 

".$this->app_model->find_kec($d->kec_id).", ".$this->app_model->find_kokab($d->kokab_id).", ".$this->app_model->find_prov($d->prov_id).",
Tlp. ". $d->telp,'LR','L');
	
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,25.6);
	$pdf->Cell(2.9,0.7,'DFOD / COD','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga1),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga1,0),'LBR',0,'R');
	$pdf->Ln(0.5);
	$pdf->SetFont('Helvetica','I',7); //set ulang font
	$pdf->Cell(6.5,0.5,'PENGIRIM','LR',0,'L');
	// $pdf->Cell(7.5,0.6,'--','LR',0,'L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,26.3);
	$pdf->Cell(2.9,0.7,'PAKET','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga2),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga2,0),'LBR',0,'R');
	$pdf->Ln(0.3);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(6.5,0.5,''.$d->dept,'LR','L');
	$pdf->MultiCell(6.5,0.5,'','LR','L');
	$pdf->SetXY(7.5,26.5);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->MultiCell(7.5,0.5,'','L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->SetXY(15,27.0);
	$pdf->Cell(2.9,0.7,'HARI YG SAMA','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga3),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga3,0),'LBR',0,'R');
	$pdf->Ln(0.1);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pkec=$this->app_model->find_kec_pel($d->pel_id);
	$pdf->MultiCell(6.5,0.5,''.$this->app_model->find_nama_pel($d->pel_id).',
'.$d->alamat_pel.', 
'.$this->app_model->find_kec($d->kec).", ".$this->app_model->find_kokab($d->kokab).", ".$this->app_model->find_prov($d->prov),'LR','L');
	$pdf->SetXY(1.0,27.8);
	$pdf->Cell(6.5,2.7,'','LR',0,'L');

	$pdf->SetXY(15,27.7);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(2.9,0.7,'ASURANSI','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga4),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga4,0),'LBR',0,'R');
	$pdf->SetXY(15,28.4);
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(2.9,0.7,'Lain-lain','LBR',0,'L');
	$pdf->Cell(0.5,0.7,''.$this->app_model->ceklist_harga($d->harga5),'LBR',0,'C');
	$pdf->Cell(2.0,0.7,''.number_format($d->harga5,0),'LBR',0,'R');	//garis baru
	$pdf->Ln();
	$pdf->Cell(6.5,0.4,'','LR',0,'L');
	$pdf->Cell(7.5,0.4,'','LR',0,'L');
	$pdf->SetFont('Helvetica','I',8); 
	$pdf->Cell(5.4,0.4,'Diskon: '.$d->diskon.'%','R',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Telp.'  .$this->app_model->find_telp_pel($d->pel_id),'LBR',0,'L1');
		$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(7.5,0.4,'',0,'');
    $pdf->SetFont('Helvetica','B',9); //set ulang font
	$pdf->Cell(5.4,0.4,'Jumlah    Rp '.number_format($d->totalbayar,0),'LBR',0,'R');
	//garis baru
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Catatan ','LR',0,'L');
	$pdf->Cell(12.9,0.4,'Terbilang','LTR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','i',8); //set ulang font
	if($d->p){
		$vol=$d->p.'x'.$d->l.'x'.$d->t.'(cm)';
	}else{
		$vol="";
	}
	$pdf->SetFont('Helvetica','i',9); //set ulang font
	$pdf->Cell(6.5,0.4,''.$d->catatan,'LBR',0,'L');
	$pdf->Cell(12.9,0.4,'#'.ucwords(strtolower($this->app_model->bilang($d->totalbayar).'rupiah')).' #','LBR',0,'C');
	
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.4,'Volume','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Pengirim','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Diterima Oleh','LR',0,'L');
	$pdf->Cell(3.5,0.4,'Operator','LR',0,'C');
	$pdf->Cell(2.4,0.4,'','LR',0,'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(6.5,0.6,''.$vol.'','LBR',0,'C');
	$pdf->Cell(3.5,0.6,'','LR',0,'L');
	$pdf->Cell(3.5,0.6,'','LR',0,'L');
	$pdf->Cell(3.5,0.6,''.$d->tglkirim,'LR',0,'C');
	$pdf->Cell(2.4,0.6,'','LR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(6.5,0.4,'KETERANGAN ISI','LR',0,'L');
	$pdf->Cell(3.5,0.4,'','LR',0,'L');
	if($d->p){
		$vol=$d->p.'x'.$d->l.'x'.$d->t.'cm';
	}else{
		$vol="";
	}
	$pdf->Cell(3.5,0.4,'','LR',0,'L');
	$pdf->Cell(3.5,0.4,'','LR',0,'C');
	$pdf->Cell(2.4,0.4,'','LR',0,'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(6.5,0.6,''.$d->deskripsi,'LRB',0,'L');
	$pdf->SetFont('Helvetica','',8); //set ulang font
	$pdf->Cell(3.5,0.6,'Nama / ttd','LRB',0,'L');
	$pdf->Cell(3.5,0.6,'Nama / ttd / Cap','LRB',0,'L');
	$pdf->Cell(3.5,0.6,''.$this->app_model->find_nama_admin($d->user_id),'RLB',0,'C');
	$pdf->Cell(2.4,0.6,'','RLB',0,'C');
	$pdf->Ln(0.6);
	$pdf->SetFont('Helvetica','I',5.7); //set ulang font
	$pdf->MultiCell(19.4,0.4,' Ketentuan yang diterapkan dalam setiap pengiriman bilamana terjadi kehilangan / kekurangan atas titipan penggantinya maximal 10 kali lipat biaya pengiriman yang hilang / rusak atau maksimum Rp.1.000.000,-','LRB','L');
	
	
	$pdf->SetDrawColor(188,188,188);
	$pdf->Line(1.0,33.4,20.5,33.4);
	//-------------------------------------------------------------------------
	//mulai judul center 
    $pdf->SetY(-5);  /* setting posisi footer 3 cm dari bawah */
    //$pdf->SetFont('Times','',10); /* setting font untuk footer */
    /* setting cell untuk waktu pencetakan */
    //$pdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').'',0,'LR','L');

	
    /* setting cell untuk page number */
    //$pdf->Cell(9.5, 0.5, 'Page '.$pdf->PageNo().' of {nb}',0,0,'R');
    /* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
     $pdf->Output(''  .$d->resi,'I');