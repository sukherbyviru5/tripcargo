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
    $this->Cell($w,0.5,$title. 'PENOLAKAN ASURANSI'  ,0,0,'R');
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
	$pdf->Image('./' . $bar,1.2,0.7,6);
	$pdf->Ln(0.5);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Helvetica','',9); //set ulang font
	$pdf->Cell(0.1,1.5,'','','DD');
	$pdf->MultiCell(18.3,0.4,'Office: Jl. Kp. Parung Serab No. 33 F Rt.5 / 3 Tirtajaya, Sukmajaya, Depok','','DD');
	$pdf->SetFont('Helvetica','',9); //set ulang font
	$pdf->Cell(0.1,2.0,'','','DD');
	$pdf->MultiCell(18.3,0.4,'Tlp. 021 27612134 - WA. 081289897359 , 08128107359, 0816887359','','DD');
	$pdf->SetDrawColor(188,188,188);
	$pdf->Line(1.0,3.0,20,3.0);
	
	$pdf->SetFont('Helvetica','B',12); //set ulang font
	$pdf->Cell(18.0,1.5,'SURAT PERNYATAAN KIRIMAN BARANG','',0,'C');
	
	$pdf->Ln(1.5);
	$pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Helvetica','',10); //set ulang font
	$pdf->Cell(0.1,1.5,'','','DD');
	$pdf->MultiCell(18.3,0.4,'Saya yang bertanda tangan di bawah ini:','','DD');
	
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,1.3,'Nama                                             : ........................................................................................','','DD'); 
	
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,0.0,'NIK / NPWP                                   : ........................................................................................','','DD');
	
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,1.3,'No. Telepone                                 : ........................................................................................','','DD');
    $pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,0.0,'No. Resi                                         :  '.$d->resi.'','','DD'); 
	$pdf->MultiCell(18.3,0.0,'','','DD');
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,1.3,'Tgl Kirim                                         :  '.date('d M Y H:i:s', strtotime($d->tglkirim)).'','','DD');
	$pdf->MultiCell(18.3,0.0,'','','DD');
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,0.0,'Nama Barang                                 :  '.$d->deskripsi.'  '.$d->catatan.' ','','DD');
	$pdf->MultiCell(18.3,0.0,'','','DD');
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,1.3,'Merek / Tipe Barang                       : ........................................................................................','','DD');
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,0.0,'Jenis Asuransi                                :            All Risk           Reguler','','DD');
		$pdf->Ln(-.3);
	$pdf->Cell(6.0,0.5,'','',0,'C') ;
	$pdf->Cell(0.5,0.5,'','LBRT',0,'C') ;
	$pdf->Cell(2,0.5,'','',0,'C') ;
	$pdf->Cell(0.5,0.5,''.$this->app_model->ceklist_harga($d->harga4),'LBRT',0,'C');
	
	    $pdf->Ln(1);
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.3,0.5,'Dengan ini kami menyatakan bahwa:','','DD');
	$pdf->Cell(0.1,0.5,'1.','','DD');
	$pdf->MultiCell(18.0,0.5,'    Nilai / harga barang yang saya kirim dengan Trip Cargo adalah sebesar Rp.'.number_format($d->harga6,0).',-',' ','DD'); 
	$pdf->Cell(0.1,0.5,'2.','','DD');
	$pdf->MultiCell(18.0,0.5,'    Saya bersedia membayar premi asuransi sebesar Rp.'.number_format($d->harga4,0).',-',' ','DD'); 
	$pdf->Cell(0.1,0.5,' ','','DD');
	$pdf->MultiCell(18.0,0.5,'    dengan cover penggantian maksimum Rp.'.number_format($d->harga6,0).',-',' ','DD');              
	$pdf->Cell(0.1,0.5,' ','','DD');
	$pdf->MultiCell(18.0,0.5,'    apabila terjadi hal-hal yang tidak diinginkan pada barang kiriman saya.','DD');
	$pdf->Cell(0.1,0.5,'3.','','DD');
	$pdf->MultiCell(18.0,0.5,'    Saya bersedia mengikuti prosedur penggantian klaim asuransi dimana dalam hal ini bersedia lamanya  ','DD');  
	$pdf->Cell(0.1,0.5,'','','DD');
	$pdf->MultiCell(18.0,0.5,'    perbaikan sesuai dengan ketersediaan spartpart dan atau barang penggantinya. ','DD');
	$pdf->Cell(0.1,0.5,'4.','','DD');
	$pdf->MultiCell(18.0,0.5,'    Apabila saya TIDAK MENGASURANSIKAN barang yang saya kirim melalui Expediai Trip Cargo ','DD');
	$pdf->Cell(0.1,0.5,'','','DD');
	$pdf->MultiCell(18.0,0.5,'    maka bila terjadi kerusakan atau kehilangan barang yang saya kirim, saya bersedia menerima uang ','DD');
	$pdf->Cell(0.1,0.5,'','','DD');
	$pdf->MultiCell(18.0,0.5,'    penggantian dari PT. INSAN CARGO DEPOK maksimum sebesar 10  (sepuluh) kali dari biaya pengiriman ','DD');
	$pdf->Cell(0.1,0.5,'','','DD'); 
	$pdf->MultiCell(18.0,0.5,'    dan atau maksimal sebesar Rp. 1.000.000,-.','DD');
	$pdf->Cell(0.1,0.5,'5.','','DD');
	$pdf->MultiCell(18.0,0.5,'    Barang yang saya kirim bukan barang-barang yang berbahaya, mudah terbakar serta barang yang bukan ','DD');
	$pdf->Cell(0.1,0.5,'','','DD');
	$pdf->MultiCell(18.0,0.5,'    merupakan melanggar hukum dan Undang-undang Negara Republik Indonesia. ','DD');
	$pdf->Cell(0.1,0.5,'','','DD');
	$pdf->MultiCell(18.0,0.5,'    Maka saya bersedia bertanggung jawab sepenuhnya dengan pihak yang berwajib dan membebaskan ','DD');
	$pdf->Cell(0.1,0.5,'','','DD');
	$pdf->MultiCell(18.0,0.5,'    Expedisi Trip Cargo dari segala tuntutan hukum pidana maupun perdata yang timbul di kemudian hari.','DD');
	$pdf->Ln(1);
	$pdf->Cell(0.1,0.0,'','','DD');
	$pdf->MultiCell(18.0,0.5,'Sekian pernyataan ini saya buat dengan sebenar-benarnya. Atas perhatian dan kerjasamanya kami ucapkan Terima Kasih','DD');
	
	$pdf->SetTextColor(0,0,0);
	$pdf->Ln(1); 
	$pdf->Cell(13.1,0.7,'','','DD');
    $pdf->Cell(4.1,0.7,''.date('d M Y H:i:s', strtotime($d->tglkirim)).'','','DD');
    $pdf->Ln(1);
    $pdf->Cell(13.1,0.7,'','','DD');
    $pdf->Cell(4.1,0.7,'     Hormat Saya ','','DD');
    $pdf->Ln(1);
    $pdf->Cell(13.1,3.0,'','','DD');
	$pdf->Cell(4.1,3.0,'    (.......................) ','','C','DD');
	
	$pdf->SetDrawColor(188,188,188);
	$pdf->Line(1.0,27.0,20,27.0);
	$pdf->SetTextColor(0,0,0);
	$pdf->Ln(2.0);
    $pdf->SetFont('Helvetica','',9); //set ulang font
	$pdf->Cell(0.1,1.5,'','','DD');
	$pdf->MultiCell(18.0,0.9,'Costumer service: 081289897359 - Email: cs@tripcargoid.com','','DD');
	//-------------------------------------------------------------------------

	
	//mulai judul center 
    //$pdf->SetY(-5);  /* setting posisi footer 3 cm dari bawah */
    $pdf->SetFont('Times','I',8); /* setting font untuk footer */
    $pdf->SetTextColor(191,0,0);
    /* setting cell untuk waktu pencetakan */
    $pdf->Cell(19.0, 1.4, 'Cetak tgl: '.date('d/m/Y H:i').'',0,'','R');

	
    /* setting cell untuk page number */
    //$pdf->Cell(9.5, 0.5, 'Page '.$pdf->PageNo().' of {nb}',0,0,'R');
    /* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
    $pdf->Output($d->resi,'I');