<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pdf extends FPDF{
function __construct($orientation='P', $unit='cm', $size='A5')
  {
    parent::__construct($orientation,$unit,$size);
 }
 function Header(){   
    global $title ;
	$this->SetTextColor(128,128,128);
	$this->SetDrawColor(188,188,188);
    $lebar = $this->w;
    $this->SetFont('Helvetica','B',8);
    $w = $this->GetStringWidth($title );
    $this->SetX(($lebar -$w)/3);
    $this->Cell($w,1.1,$title. ''  ,0,0,'');
    //$this->Ln();
    // $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-2.0, $this->GetY());
    $this->Ln(0.0);	
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
	$this->Ln(1);
	//$hal = 'Page : '.$this->PageNo().'/{nb}' ;
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
	//$pdf = new FPDF('P','mm',array(95,130));
    $pdf->SetMargins(0.0,0.0,0,0); //set margin kiri, atas, kanan, bawah 1cm
    $pdf->AliasNbPages(); //fungsi page number/total page pada footer 
    $pdf->AddPage(); //fungsi buat halaman baru 
	$pdf->SetLineWidth(0.02);
	$pdf->Ln();
	foreach($rs as $d){$hasil[]=$d;} //panggil database 
	
/* Bloc Logo Lebel */	
	//$pdf->Ln();
	//$pdf->SetLineWidth(3.5,5.1,3.2);
	//$pdf->SetXY(0.0,2.6);
	//$pdf->SetFillColor(0, 0, 0); 
	//$pdf->SetFont('Helvetica','B',20); //set ulang font 
	//$pdf->Cell(14.0,-1.5,'','B',0,'C');
/* Bloc Logo Lebel */
    
    //garis 
    $pdf->SetDrawColor(188,188,188);
	$pdf->Line(1.0,3.0,20,3.0);
	
	
    $pdf->Ln(0.0);
    $pdf->SetLineWidth(0.5,0.1,3.2);
	$pdf->Cell(0.4,2.0,'','B',0,'C');
	$pdf->Cell(14.1,2.0,'','',0,'C');
	$pdf->Cell(0.4,2.0,'','B',0,'C');

	$pdf->Ln();
	$pdf->SetLineWidth(0.01,0.1,0.2);
	
	include "./application/libraries/qrcode/qrlib.php";
	QRcode::png($d->resi,'image.png',8,10, 5,1);
	$barq='image.png';
	$pdf->Image('./' . $barq, 10.2,3.3,4.7); //kiri, atas, ukuran barcode 
	
	$pdf->Ln();
	$pdf->SetXY(0.5,3.5);
	$pdf->SetFillColor(254,252,252);
	$pdf->SetFont('Helvetica','B',40); //set ulang font 
	$pdf->Cell(10.0,2.0,''.$d->resi.'','',0,'C');
	
	$pdf->Ln();
	$pdf->SetXY(0.5,5.1);
	$pdf->SetFillColor(254,252,252);
	$pdf->SetFont('Helvetica','B',20); //set ulang font 
	$pdf->Cell(10.0,1.0,'SERVICE '.$d->layan.'','LBRT',0,'C');
	//$pdf->Cell(3.9,0.9,'BERAT','LBRT',0,'C',0);

	$pdf->Ln();
	$pdf->SetXY(0.5,6.1);
	$pdf->SetFont('Helvetica','B',20); //set ulang font 
	$pdf->Cell(5.0,1.3,''.$d->koli.' pcs','LB',0,'C');
	$pdf->Cell(5.0,1.3,''.$d->berat.' Kg','LBR',0,'C');

	
	$pdf->Ln();
	$pdf->SetXY(0.0,8.0);
    $pdf->SetFont('Helvetica','',9); //set ulan$pdf->g font
	//$pdf->Cell(14.5,0.0,''.$d->resi.'',0,'LBR',0,'C',0);
	//$pdf->Cell(0.0,0.0,''.$d->layan,'',0,'C',0);
	
	$pdf->Ln();
	$pdf->SetXY(0.5,7.5);
	$pdf->SetFont('Helvetica','',16); //set ulang font
$pdf->MultiCell(13.8,0.7,'To: '.substr($d-> penerima,0,36). " 
      ".substr($d->dept2,0,36).'','0');
	
	
	$pdf->Ln();
	$pdf->SetXY(0.5,9.0);
    $pdf->SetFont('Helvetica','',16,'R','0'); //set ulang font
    $pdf->MultiCell(14.0,0.7,''.substr($d->alamat,0,150));

	
    $pdf->SetXY(0.5,11.8);
    $pdf->SetFont('Helvetica','B',16); //set ulang font
	$pdf->Cell(4.5,0.5,    '    Telp. '.$d->telp,'',0,'C',0);
	$pdf->Cell(5.0,0.5,'','',0,'',0);
	
	$pdf->Ln();
	$pdf->SetXY(10.5,12.0);
	$pdf->SetFont('Helvetica','B',16); //set ulang font
	$pdf->Cell(0.0,0.0, ''.$d->metode, '',0,'');
	
	$pdf->Ln();
	$pdf->SetXY(0.5,12.5);	
	$pdf->SetFont('Helvetica','B',24); //set ulan$pdf->g font
	$pdf->SetFillColor(254,252,252);
	$pdf->Cell(13.8,1.3,''.$this->app_model->find_kokab(substr($d->kec_id,0,4)),'BT',0,'C',0);
		
	$pdf->Ln();
	$pdf->SetXY(0.0,14.2);
	$pdf->SetFont('Helvetica','',12,''); //set ulang font
	//$pdf->SetFillColor(254,252,252);
		
	if($d->p_nama == null){
		$nama = $this->app_model->find_nama_pel($d->pel_id);
		$dept = $d->dept;
		$telp =  $this->app_model->find_telp_pel($d->pel_id);
		$alamat = $d->alamat_pel;
		$kec = $this->app_model->find_kec($d->kec);
		$kokab = $this->app_model->find_kokab($d->kokab);
		$prov = $this->app_model->find_prov($d->prov);
		$email = $d->p_email;
	}else{
		$nama = $d->p_nama;
		$dept = $d->p_dept;
		$telp = $d->p_telp;
		$alamat = $d->p_alamat;
		$kec = $this->app_model->find_kec($d->p_kec_id);
		$kokab = $this->app_model->find_kokab($d->p_kokab_id);
		$prov = $this->app_model->find_prov($d->p_prov_id);
		$email = $d->p_email;
	}
	$pdf->SetFont('Helvetica','',15); //set ulang font
	$pdf->Cell(0.0,0.0,'From:'.'   '.$nama,'',0,'C');
	
	$pdf->Ln();
	$pdf->SetXY(0.0,14.8);
	$pdf->SetFont('Helvetica','',15); //set ulang font
	$pkec=$kec;
	//$pdf->Cell(0.0,0.0,''.$dept.'    '.   $telp,'',0,'C');
	$pdf->Cell(0.0,0.0,''.$dept.'    '.   "",'',0,'C');
	$pdf->Ln();
	$pdf->SetXY(0.0,15.4);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Cell(0.0,0.0,'Isi: '.$d->deskripsi.'','',0,'C',0);
	
	$pdf->Ln();
	$pdf->SetXY(0.0,16.0);
	$pdf->SetFont('Helvetica','',15);
	$pdf->Cell(0.0,0.0,''.date('d M Y H:i:s', strtotime($d->tglkirim)),'',0,'C',0);
	
	
	$pdf->Ln();
	$pdf->SetXY(0.0,16.5);
	$pdf->SetFont('Helvetica','B',20);
	$pdf->Cell(0.0,0.0,'tripcargo.test','',0,'C',0); 
	
		// Generate Barcode
    //load library
	$pdf->Ln();
	$pdf->SetXY(0.0,0.0);
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
	$pdf->Image($img, 2.5,17.0,10.0,3); //set margin kiri, atas, kanan, bawah 1cm, yata (BARCODE)
	//--------------------------
	
	//$pdf->SetY(-5);  /* setting posisi footer 3 cm dari bawah */
    //$pdf->SetFont('Times','',10); /* setting font untuk footer */
    /* setting cell untuk waktu pencetakan */
    //$pdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').'',0,'LR','L');

	
    /* setting cell untuk page number */
    //$pdf->Cell(9.5, 0.5, 'Page '.$pdf->PageNo().' of {nb}',0,0,'R');
    /* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
    $pdf->Output('LEBEL:RESI:'.$d->resi.'.'.'pdf','I');