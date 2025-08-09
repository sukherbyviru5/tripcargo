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
	$this->Ln(0);
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
	
    $pdf->SetMargins(0.0,1.0,6,3); //set margin kiri, atas, kanan, bawah 1cm
    $pdf->AliasNbPages(); //fungsi page number/total page pada footer 
    $pdf->AddPage(); //fungsi buat halaman baru 
	$pdf->SetLineWidth(0.02);
	$pdf->Ln();
	foreach($rs as $d){$hasil[]=$d;} //panggil database 

	
	$pdf->SetFont('Helvetica','B',15); //set ulan$pdf->g font
	$pdf->Cell(9,11.15,''.$this->app_model->find_kokab(substr($d->kec_id,0,4)),'',0,'C');
	 // Generate Barcode
	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(5,0.0,'','',0,'C',0);

	
	$pdf->Ln();
	$pdf->SetXY(0.8,2.4);
	$pdf->SetFillColor(254,252,252);
	$pdf->SetFont('Helvetica','',7); //set ulang font 
	$pdf->Cell(1.5,0.6,'KOLI','',0,'C',0);
	$pdf->Cell(3.5,0.6,'BERAT / VOL','',0,'C',0);

	$pdf->Ln();
	$pdf->SetXY(0.8,3.0);
	$pdf->SetFont('Helvetica','B',10); //set ulang font 
	$pdf->Cell(1.5,0.6,''.$d->koli.'','',0,'C');
	$pdf->Cell(3.5,0.6,''.$d->berat.' Kg'.'    '.  $d->vol.'','',0,'C');
	$pdf->SetXY(15,3.6);
	
	$pdf->Ln();
	$pdf->SetXY(0.5,3.6);
	$pdf->SetFont('Helvetica','B',24); //set ulan$pdf->g font
	$pdf->Cell(9,1.11,''.$d->resi,'',0,'');
	include "./application/libraries/qrcode/qrlib.php";
	QRcode::png($d->resi,'image.png',8,10, 3, 9);
	$barq='image.png';
	$pdf->Image('./' . $barq, 6.2,2.11,2.7); //kiri, atas, ukuran barcode 

	$pdf->Ln();
	$pdf->SetXY(0.5,4.6);
	$pdf->SetFont('Helvetica','B',8); //set ulang font
$pdf->MultiCell(9.0,0.4,'To: '.$d->penerima . " 
".$d->dept2,'','');
	$pdf->Ln();
	$pdf->SetXY(0.5,5.1);
$pdf->SetFont('Helvetica','',8); //set ulang font
$pdf->MultiCell(8.5,0.3,'
'.$d->alamat.' 
'.$this->app_model->find_kec($d->kec_id).", ".$this->app_model->find_kokab($d->kokab_id).", ".$this->app_model->find_prov($d->prov_id),'','');
    $pdf->SetXY(0.4,6.3);
	$pdf->Cell(3.5,0.5,    '    Telp.'.$d->telp,'B',0,'',0);
	$pdf->Cell(5,0.5,'','B',0,'',0);
	$pdf->SetXY(7.2,6.3);
	$pdf->SetFont('Helvetica','B',8); //set ulang font
	$pdf->Cell(1.5,0.5, ''.$d->metode, '',0,'');
	
	
	$pdf->Ln();
	$pdf->SetXY(0.2,6.8);
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->SetFillColor(254,252,252);

	$pdf->Cell(6.5,0.4,'DARI: '.'   '.$this->app_model->find_nama_pel($d->pel_id),'',0,'C');
	$pdf->Ln();
	$pdf->SetXY(0.4,7.1);
	$pkec=$this->app_model->find_kec_pel($d->pel_id);
	$pdf->Cell(8.5,0.4,''.$d->dept.'    '.   $this->app_model->find_telp_pel($d->pel_id),'B',0,'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7);
	$pdf->Cell(0.0,6.5,'Input: '.$d->tglkirim,'',0,'C',0);
	$pdf->Ln();
	$pdf->SetFont('Helvetica','B',10);
	$pdf->Cell(0.0,-3.5,'Www.InsanCargoDepok.com','',0,'C',0); 
	
	$pdf->SetXY(0.0,13.9);
	$pdf->SetFont('Helvetica','',7);
	$pdf->Cell(0.0,-4.3,'Isi: '.$d->deskripsi.'','',0,'C',0);
	$pdf->Ln();
	$pdf->SetFont('Helvetica','B',12);
	$pdf->Cell(0.0,3.1,'Service: '.$d->layan,'',0,'C',0);
	
	//--------------------------
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
	$pdf->Image($img, 1.6,8.4,5.7);
	
	
    
	
	//$pdf->SetY(-5);  /* setting posisi footer 3 cm dari bawah */
    //$pdf->SetFont('Times','',10); /* setting font untuk footer */
    /* setting cell untuk waktu pencetakan */
    //$pdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').'',0,'LR','L');

	
    /* setting cell untuk page number */
    //$pdf->Cell(9.5, 0.5, 'Page '.$pdf->PageNo().' of {nb}',0,0,'R');
    /* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
    $pdf->Output('LEBEL.pdf','I');