<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='P', $unit='cm', $size='A5') {
        parent::__construct($orientation, $unit, $size);
    }

    function Header() {
        global $title;
        $this->SetTextColor(100, 100, 100);
        $this->SetFont('Helvetica', 'B', 10);
        $w = $this->GetStringWidth($title) + 2; // Added padding for better centering
        $this->SetX(($this->w - $w) / 2); // Center title
        $this->Cell($w, 0.8, $title, 0, 1, 'C');
        $this->Ln(0.4); // Spacing below header
    }

    function Footer() {
        $this->SetTextColor(100, 100, 100);
        $this->SetY(-1.2);
        $this->SetFont('Helvetica', '', 8);
        $this->Cell(0, 0.4, 'Printed on: ' . date('d M Y H:i'), 0, 0, 'L');
        $this->Cell(0, 0.4, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }
}

/* Setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

$pdf = new Pdf();
$pdf->SetMargins(0.7, 0.7, 0.7); // Margin 0.7 cm untuk semua sisi
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLineWidth(0.02);

// Data preparation
$hasil = [];
foreach ($rs as $d) {
    $hasil[] = $d;
}

// Logo Perusahaan
$logoPath = FCPATH . 'assets/images/logo-sancargo.png';
if (!file_exists($logoPath)) {
    die('File logo tidak ditemukan: ' . $logoPath);
}
$pdf->Image($logoPath, 0.7, 0.7, 2.5, 1.2); // Increased logo width to 2.5 cm, kept height at 1.2 cm

// Nama Perusahaan
$pdf->SetXY(3.5, 0.7);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 0.6, 'Trip Cargo', 0, 1, 'L');

// Tagline
$pdf->SetXY(3.5, 1.2);
$pdf->SetFont('Helvetica', 'I', 8);
$pdf->Cell(0, 0.4, 'Paket Cepat, Cargo & Moving', 0, 1, 'L');
$pdf->Ln(0.5); // Added spacing below tagline

// Garis Pemisah Header
$pdf->SetDrawColor(150, 150, 150);
$pdf->SetLineWidth(0.03);
$pdf->Line(0.7, 2.1, 13.7, 2.1); // Adjusted Y position for more spacing

// Nomor Resi
$pdf->SetXY(0.7, 2.5);
$pdf->SetFont('Helvetica', 'B', 18);
$pdf->SetFillColor(245, 245, 245);
$pdf->Cell(12.3, 0.8, $d->resi, 'LTRB', 1, 'C', true);

// Barcode QR
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
$pdf->Image($qrPath, 10.7, 3.4, 2.3, 2.3);
$pdf->Ln(0.4); // Spacing below QR code

// Service
$pdf->SetXY(0.7, 3.6);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(6.0, 0.5, 'SERVICE: ' . substr($d->layan, 0, 20), 'LTRB', 1, 'C');

// Koli dan Berat
$pdf->SetXY(0.7, 4.2);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(3.0, 0.5, $d->koli . ' Koli', 'LTRB', 0, 'C');
$pdf->Cell(3.0, 0.5, $d->berat . ' Kg', 'LTRB', 1, 'C');

// Informasi Penerima
$pdf->SetXY(0.7, 4.9);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(0, 0.5, 'Penerima:', 0, 1, 'L');
$pdf->SetFont('Helvetica', '', 8);
$pdf->SetXY(0.7, 5.3);
$pdf->MultiCell(12.3, 0.4, substr($d->penerima, 0, 50), 0, 'L');
$pdf->SetXY(0.7, 5.7);
$pdf->MultiCell(12.3, 0.4, substr($d->dept2, 0, 50), 0, 'L');
$pdf->SetXY(0.7, 6.1);
$pdf->MultiCell(12.3, 0.4, substr($d->alamat, 0, 100), 0, 'L');
$pdf->SetXY(0.7, 7.3);
$pdf->Cell(0, 0.4, 'Telp: **********' . substr($d->telp, 8, 5), 0, 1, 'L');

// Pembayaran
$pdf->SetXY(10.7, 7.3);
$pdf->SetFont('Helvetica', 'I', 8);
$pdf->Cell(0, 0.4, substr($d->metode, 0, 20), 0, 1, 'R');

// Kota/Kabupaten
$pdf->SetXY(0.7, 7.9);
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(12.3, 0.6, $this->app_model->find_kokab(substr($d->kec_id, 0, 4)), 'LTRB', 1, 'C', true);

// Informasi Pengirim
if ($d->p_nama == null) {
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

$pdf->SetXY(0.7, 8.7);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(0, 0.5, 'Pengirim:', 0, 1, 'L');
$pdf->SetFont('Helvetica', '', 8);
$pdf->SetXY(0.7, 9.1);
$pdf->Cell(0, 0.4, substr($nama, 0, 50), 0, 1, 'L');
$pdf->SetXY(0.7, 9.5);
$pdf->Cell(0, 0.4, substr($dept, 0, 50), 0, 1, 'L');

// Deskripsi
$pdf->SetXY(0.7, 10.1);
$pdf->Cell(0, 0.4, 'Isi: ' . substr($d->deskripsi, 0, 70), 0, 1, 'L');

// Tanggal Kirim
$pdf->SetXY(0.7, 10.6);
$pdf->Cell(0, 0.4, date('d M Y H:i:s', strtotime($d->tglkirim)), 0, 1, 'L');

// Website
$pdf->SetXY(0.7, 11.1);
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->Cell(0, 0.5, 'tripcargo.test', 0, 1, 'C');

// Generate Barcode
$this->zend->load('Zend/Barcode');
$image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $d->resi), array())->draw();
$image_name = $d->resi . '.jpg';
$image_dir = FCPATH . 'assets/barcode/';
if (!is_dir($image_dir)) {
    mkdir($image_dir, 0777, true);
}
imagejpeg($image_resource, $image_dir . $image_name);
if (!file_exists($image_dir . $image_name)) {
    die('File barcode tidak ditemukan: ' . $image_dir . $image_name);
}
$pdf->Image($image_dir . $image_name, 3.7, 11.7, 5.5, 1.3);

// Output PDF
$pdf->Output('LEBEL:' . $d->resi . '.pdf', 'I');
?>