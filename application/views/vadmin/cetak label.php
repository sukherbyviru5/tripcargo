<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='P', $unit='cm', $size='A5') {
        parent::__construct($orientation, $unit, $size);
    }

    function Header() {   
        global $title;
        $this->SetTextColor(128, 128, 128);
        $this->SetDrawColor(188, 188, 188);
        $lebar = $this->w;
        $this->SetFont('Helvetica', 'B', 8);
        $w = $this->GetStringWidth($title);
        $this->SetX(($lebar - $w) / 3);
        $this->Cell($w, 1.1, $title . '', 0, 0, '');
        $this->Ln(0.0);	
    } 

    function Footer() {               
        $this->SetTextColor(128, 128, 128);
        $this->SetDrawColor(188, 188, 188);
        $this->SetY(-1.5);   
        $lebar = $this->w;   
        $this->SetFont('Helvetica', '', 8);           
        $this->SetY(-1.5);
        $this->SetX(0);       
        $this->Ln(1);
    } 	
}

/* setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

$pdf = new PDF();
$pdf->SetMargins(0.0, 0.0, 0, 0); //set margin kiri, atas, kanan, bawah 1cm
$pdf->AliasNbPages(); //fungsi page number/total page pada footer 
$pdf->AddPage(); //fungsi buat halaman baru 
$pdf->SetLineWidth(0.02);
$pdf->Ln();

foreach($rs as $d) {
    $hasil[] = $d;
} //panggil database 

//logo perusahaan
$pdf->SetFont('Helvetica', '', 7); //set ulang font 
$bar = './assets/images/Sancargo-black.png';
$pdf->Image('./' . $bar, 1.2, 0.3, 1.3, 1.3); //set margin kiri, atas, kanan, bawah 1cm

//Trip Cargo
$pdf->Ln(0.0); // service
$pdf->SetXY(2.8, 1.1);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 25); //set ulang font 
$pdf->Cell(11.0, -0.7, 'Trip Cargo', 0, 'C');

//Paket Cepat, Cargo & Moving
$pdf->Ln(0.0); // service
$pdf->SetXY(3.0, 1.8);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('Helvetica', 'i', 10); //set ulang font 
$pdf->Cell(11.0, -0.8, 'Paket Cepat, Cargo & Moving', 0, 'C');

//garis horison
$pdf->SetDrawColor(0, 0, 0);
$pdf->Ln(0.0, 0.0);
$pdf->SetLineWidth(0.1, 0.1, -0.2);
$pdf->Cell(0.4, 0.0, '', '', 0, 'C');
$pdf->Cell(8.6, 0.0, '', 'B', 0, 'C');
$pdf->Cell(0.4, 0.0, '', '', 0, 'C');

$pdf->SetDrawColor(0, 0, 0);
$pdf->Ln(0.0); // AWB resi
$pdf->SetXY(0.5, 2.1);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('Helvetica', 'B', 22); //set ulang font 
$pdf->Cell(6.2, 0.8, '' . $d->resi . '', '', 0, 'C');

//barcode QR
$qrPath = FCPATH . 'assets/barcode/' . $d->resi . '.png';
// Check if QR code file exists; if not, fetch from QRServer API
if (!file_exists($qrPath)) {
    // Ensure the barcode directory exists
    $barcodeDir = FCPATH . 'assets/barcode/';
    if (!is_dir($barcodeDir)) {
        mkdir($barcodeDir, 0777, true);
    }
    // Fetch QR code from QRServer API
    $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($d->resi);
    $qrContent = @file_get_contents($qrUrl);
    if ($qrContent === false) {
        die('Failed to fetch QR code from QRServer API for resi: ' . $d->resi);
    }
    // Save QR code to file
    if (!file_put_contents($qrPath, $qrContent)) {
        die('Failed to save QR code at: ' . $qrPath);
    }
}
// Verify the file exists after attempting to fetch
if (!file_exists($qrPath)) {
    die('QR code file not found after fetching: ' . $qrPath);
}
$pdf->Image($qrPath, 6.6, 1.9, 2.7); //kiri, atas, ukuran barcode 

$pdf->Ln(0.0); // service
$pdf->SetXY(0.5, 2.9);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('Helvetica', 'B', 12); //set ulang font 
$pdf->Cell(6.2, 0.6, 'SERVICE ' . $d->layan . '', 'LBRT', 0, 'C');

$pdf->Ln(0.0); // koli
$pdf->SetXY(0.5, 3.5);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('Helvetica', 'B', 12); //set ulang font 
$pdf->Cell(3.2, 0.7, '' . $d->koli . '  Koli', 'LBRT', 0, 'C');

$pdf->Ln(0.0); // berat
$pdf->SetXY(3.7, 3.5);
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('Helvetica', 'B', 12); //set ulang font 
$pdf->Cell(3.0, 0.7, '' . $d->berat . '  Kg', 'LBRT', 0, 'C');

$pdf->Ln(); // Pengirim Nama
$pdf->SetXY(0.5, 4.3);
$pdf->SetFont('Helvetica', '', 10); //set ulang font
$pdf->MultiCell(8.5, 0.3, 'Penerima:', '0');
$pdf->Ln(); // Pengirim Nama
$pdf->SetXY(0.5, 4.7);
$pdf->SetFont('Helvetica', '', 10); //set ulang font
$pdf->MultiCell(8.5, 0.3, substr($d->penerima, 0, 35), '', '0');
$pdf->Ln(); // Pengirim Departemen
$pdf->SetXY(0.5, 5.1);
$pdf->SetFont('Helvetica', '', 10); //set ulang font
$pdf->MultiCell(8.5, 0.3, '' . substr($d->dept2, 0, 35), '', '0'); 
$pdf->Ln();
$pdf->SetXY(0.5, 5.4);
$pdf->SetFont('Helvetica', '', 10); //set ulang font
$pdf->MultiCell(8.5, 0.4, '' . substr($d->alamat, 0, 140), '', 'L');

$pdf->SetXY(0.5, 7.0);
$pdf->SetFont('Helvetica', 'B', 10); //set ulang font
$pdf->Cell(5, 0.5, 'Telp. **********' . substr($d->telp, 0, 4), '', 0, 'j', 0);

$pdf->Ln(); // pembayaran
$pdf->SetXY(5.5, 7.0);
$pdf->SetFont('Helvetica', 'i', 10); //set ulang font
$pdf->Cell(3.5, 0.5, '' . $d->metode, '', 0, 'R', 0);

$pdf->Ln();
$pdf->SetXY(0.5, 7.5);	
$pdf->SetFont('Helvetica', 'B', 18); //set ulang font
$pdf->SetFillColor(254, 252, 252);
$pdf->Cell(8.5, 0.9, '' . $this->app_model->find_kokab(substr($d->kec_id, 0, 4)), 'BT', 0, 'C', 0);

$pdf->Ln();
$pdf->SetXY(0.5, 8.7);
$pdf->SetFont('Helvetica', '', 10, ''); //set ulang font

if($d->p_nama == null) {
    $nama = $this->app_model->find_nama_pel($d->pel_id);
    $dept = $d->dept;
    $telp = $this->app_model->find_telp_pel($d->pel_id);
    $alamat = $d->alamat_pel;
    $kec = $this->app_model->find_kec($d->kec);
    $kokab = $this->app_model->find_kokab($d->kokab);
    $prov = $this->app_model->find_prov($d->prov);
    $email = $d->p_email;
} else {
    $nama = $d->p_nama;
    $dept = $d->p_dept;
    $telp = $d->p_telp;
    $alamat = $d->p_alamat;
    $kec = $this->app_model->find_kec($d->p_kec_id);
    $kokab = $this->app_model->find_kokab($d->p_kokab_id);
    $prov = $this->app_model->find_prov($d->p_prov_id);
    $email = $d->p_email;
}

$pdf->Ln();
$pdf->SetXY(0.5, 8.4);
$pdf->SetFont('Helvetica', '', 10); //set ulang font
$pdf->Cell(8.5, 0.5, 'Pengirim: ' . '' . substr($nama, 0, 20) . '******', '', 0, 'C');

$pdf->Ln();
$pdf->SetXY(0.5, 8.8);
$pdf->SetFont('Helvetica', '', 10); //set ulang font
$pdf->Cell(8.5, 0.5, '' . substr($dept, 0, 20) . '******', '', 0, 'C');

$pdf->Ln();
$pdf->SetXY(0.5, 9.2);
$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(8.5, 0.5, 'Isi: ' . $d->deskripsi . '', '', 0, 'C', 0);

$pdf->Ln();
$pdf->SetXY(0.5, 9.6);
$pdf->SetFont('Helvetica', '', 10);
$pdf->Cell(8.5, 0.5, '' . date('d M Y H:i:s', strtotime($d->tglkirim)), '', 0, 'C', 0);

$pdf->Ln();
$pdf->SetXY(0.5, 10.1);
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(8.5, 0.4, 'tripcargo.test', '', 0, 'C', 0); 

// Generate Barcode
$code = $d->resi;
$this->zend->load('Zend/Barcode');
$image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $code), array())->draw();
$image_name = $code . '.jpg';
$image_dir = './assets/barcode/'; // penyimpanan file barcode
imagejpeg($image_resource, $image_dir . $image_name); 
$img = base_url() . 'assets/barcode/' . $code . '.jpg';
$pdf->Image($img, 1.9, 10.7, 5.7, 1.9); //set margin kiri, atas, kanan, bawah 1cm, yata (BARCODE)

$pdf->Output('LEBEL:' . $d->resi . '.' . 'pdf', 'I');
?>