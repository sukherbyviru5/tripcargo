<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pdf extends FPDF{
function __construct($orientation='P', $unit='cm', $size='legal')
  {
    parent::__construct($orientation,$unit,$size);
 }
 function Header(){   
    global $title ;
	//$this->SetTextColor(128,128,128);
	//$this->SetDrawColor(188,188,188);
    //$lebar = $this->w;
    //$this->SetFont('Helvetica','I',8);
    //$w = $this->GetStringWidth($title );
    //$this->SetX(($lebar -$w)/2);
    //$this->Cell($w,0.0,$title. 'Formulir data pickup barang'  ,0,0,'R');
    //$this->Ln();
    // $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-2.0, $this->GetY());
    //$this->Ln(0.0);	
 } 
 
  function Footer() {               
	//$this->SetTextColor(128,128,128);
	//$this->SetDrawColor(188,188,188);
	//$this->Line(1.0,29.0,20,29.0);
	//$this->SetY(-1.5);   
	//$lebar = $this->w;   
	//$this->SetFont('Helvetica','',8);           
	// $this->line($this->GetX(), $this->GetY(), $this->GetX()+$lebar-2, $this->GetY());
	//$this->SetY(-1.5);
	//$this->SetX(0);       
	//$this->Ln(0.1);
	//$hal = 'Page : '.$this->PageNo().'/{nb}' ;
	//$this->Cell($this->GetStringWidth($hal ),1.0,$hal );   
	// $datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
	//$tanggal  = 'Printed at '.date('d-m-Y  h:i-a').' ';
	// $this->Cell($lebar-$this->GetStringWidth($hal )-$this->GetStringWidth($tanggal)-2.0);   
	// $this->Cell($this->GetStringWidth($tanggal),1.0,$tanggal );
	//$pdf->SetTextColor(103, 58, 183);// warna pada font
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
	$pdf->Image('./' . $bar,1.2,1.0,6);
	
	$pdf->Ln(0.5);
	$pdf->SetTextColor(0,0,0);	
	$pdf->SetFont('Helvetica','B',12); //set ulang font
	$pdf->MultiCell(32,0.0,'PT. INSAN CARGO DEPOK','','C');
	$pdf->SetFont('Helvetica','i',7); //set ulang font
	$pdf->MultiCell(27.5,0.7,'Jl. Parung Serab No. 33 F Rt. 05 Rw. 03, Tirtajaya, Sukmajaya, Depok Jawa Barat - 16412','','C');
	$pdf->MultiCell(31.6,0.0,'Tlp. 0881080899678 -0812 810 7359 - 0816 88 7359','','C');
	$pdf->MultiCell(35.1,0.5,'tripcargo.test','','C');
	
	$pdf->SetLineWidth(0.01);
	$pdf->SetDrawColor(220, 20, 60); 
	$pdf->Line(1.0,2.5,20,2.5);//garis heder mirah
	$pdf->SetLineWidth(0.05);
	$pdf->SetDrawColor(0, 0, 255);
	$pdf->Line(1.0,2.6,20,2.6);//garis heder biru
	
	$pdf->SetLineWidth(0.05);
	$pdf->SetDrawColor(0, 0, 255);
	$pdf->Line(1.0,11.0,20,11.0);//garis heder biru
	
		$pdf->SetLineWidth(0.05);
	$pdf->SetDrawColor(0, 0, 255);
	$pdf->Line(1.0,22.0,20,22.0);//garis heder biru
	
		$pdf->SetLineWidth(0.05);
	$pdf->SetDrawColor(0, 0, 255);
	$pdf->Line(1.0,33.0,20,33.0);//garis heder biru
	
	
	//-------------------------------------------------------------------------

	
	//mulai judul center 
    //$pdf->SetY(-5);  /* setting posisi footer 3 cm dari bawah */
    $pdf->SetFont('Times','I',8); /* setting font untuk footer */
    $pdf->SetTextColor(191,0,0);
    /* setting cell untuk waktu pencetakan */
    //$pdf->Cell(19.0, 0.1, 'Cetak (e-STT) : '.date('d/m/Y H:i').'',0,'LR','R');//

	
    /* setting cell untuk page number */
    //$pdf->Cell(9.5, 0.5, 'Page '.$pdf->PageNo().' of {nb}',0,0,'R');
    /* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
    $pdf->Output($d->resi,'I');
    
    
    
    
    
    
    