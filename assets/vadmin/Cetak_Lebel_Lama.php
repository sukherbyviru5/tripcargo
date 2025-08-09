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
    $this->SetFont('Helvetica','B',8);
    $w = $this->GetStringWidth($title );
    $this->SetX(($lebar -$w)/3);
    $this->Cell($w,0.1,$title. 'Www.InsanCargoDepok.com'  ,0,0,'L');
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
	
    $pdf->SetMargins(6.0,0.1,6,3); //set margin kiri, atas, kanan, bawah 1cm
    $pdf->AliasNbPages(); //fungsi page number/total page pada footer 
    $pdf->AddPage(); //fungsi buat halaman baru 
	$pdf->SetLineWidth(0.04);
	$pdf->Ln();
	foreach($rs as $d){$hasil[]=$d;} //panggil database 

	
	$pdf->SetFont('Helvetica','B',18); //set ulan$pdf->g font
	$pdf->Cell(9,11.11,''.$this->app_model->find_kokab(substr($d->kec_id,0,4)),'LBR',0,'C');
	 // Generate Barcode
   
	

	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(5,0.0,'','LR',0,'C',0);
	$pdf->Cell(4,0.0,'','LR',0,'C',0);
	$pdf->Cell(9,0.0,'','LR',0,'C',0);
	$pdf->Ln();
	
	$pdf->SetFillColor(254,252,252);
	$pdf->SetFont('Helvetica','',7); //set ulang font 
	$pdf->Cell(2.3,0.6,'KOLI','LBRT',0,'C',0);
	$pdf->Cell(2.3,0.6,'BERAT','LBRT',0,'C',0);
	$pdf->Cell(4.3,0.6,'','LRT',0,'C',0);
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',10); //set ulang font 
	$pdf->Cell(2.3,0.6,''.$d->koli.' pcs','LBR',0,'C');
	$pdf->Cell(2.3,0.6,''.$d->berat.' Kg','LBR',0,'C');
	$pdf->Cell(4.3,0.6,''.' ','L',0,'C');
	$pdf->SetFont('Helvetica','IB',10); //set ulang font
	$pdf->Ln();
	$pdf->SetFont('Helvetica','B',18); //set ulan$pdf->g font
	$pdf->Cell(9,1.11,''.$d->resi,'LR',0,'L');
	include "./application/libraries/qrcode/qrlib.php";
	QRcode::png($d->resi,'image.png',5,'L', 5, 9);
	$barq='image.png';
	$pdf->Image('./' . $barq, 12.5,0.11,2.7); //kiri, atas, ukuran barcode 

	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
$pdf->MultiCell(9.0,0.2,'TUJUAN: '.$d->penerima,'LR','L');
$pdf->MultiCell(9.0,0.3,'
'.$d->alamat.' 
'.$this->app_model->find_kec($d->kec_id).", ".$this->app_model->find_kokab($d->kokab_id).", ".$this->app_model->find_prov($d->prov_id),'LR','L');
	$pdf->Cell(2,0.5,'','LB',0,'L',0);
	$pdf->Cell(7,0.5, 'Telp.'.$d->telp,'BR',0,'L');
	
	
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->SetFillColor(254,252,252);

	$pdf->Cell(9.0,0.4,'DARI: '.'   '.$this->app_model->find_nama_pel($d->pel_id),'R',0,'R');
	$pdf->Ln();

	$pkec=$this->app_model->find_kec_pel($d->pel_id);
	$pdf->Cell(9.0,0.4,''.$d->dept.'   '.   $this->app_model->find_telp_pel($d->pel_id),'BR',0,'R');
	$pdf->Ln();
	$pdf->SetFont('Helvetica','',7); //set ulang font
	$pdf->Cell(2.0,0.5,'','L',0,'R',0);
	$pdf->Cell(7.0,0.5, '',0,'R');
	
	$pdf->Ln();
	$pdf->Cell(2.0,0.4,'','L',0,'R',0);
	
	$pdf->Cell(7.0,0.6, '',0,'R');

	$pdf->SetFont('Helvetica','',7);
	$pdf->Ln();
	$pdf->Cell(0.0,1.6,'Input: '.$d->tglkirim,'L',0,'C',0);   
	//mulai judul center 
	$pdf->Ln(1);
	$pdf->SetDrawColor(254,252,252);
	$pdf->Line(0.0,9.0,21.0,9.0);
	
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
	$pdf->Image($img, 7.8,7.8,5.9);
	
	
    
	
	//$pdf->SetY(-5);  /* setting posisi footer 3 cm dari bawah */
    //$pdf->SetFont('Times','',10); /* setting font untuk footer */
    /* setting cell untuk waktu pencetakan */
    //$pdf->Cell(9.5, 0.5, 'Printed on : '.date('d/m/Y H:i').'',0,'LR','L');

	
    /* setting cell untuk page number */
    //$pdf->Cell(9.5, 0.5, 'Page '.$pdf->PageNo().' of {nb}',0,0,'R');
    /* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
    $pdf->Output('LEBEL.pdf','I');