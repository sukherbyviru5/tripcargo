<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='P', $unit='cm', $size=array(14.8, 21)) { // Half A4: 14.8 cm x 21 cm
        parent::__construct($orientation, $unit, $size);
    }

    function Header() {
        global $title;
        $this->SetTextColor(100, 100, 100);
        $this->SetFont('Helvetica', 'B', 12);
        $w = $this->GetStringWidth($title) + 2;
        $this->SetX(($this->w - $w) / 2);
        $this->Cell($w, 0.7, $title, 0, 1, 'C');
        $this->Ln(0.3);
    }

    function Footer() {
        $this->SetTextColor(100, 100, 100);
        $this->SetY(-1.0);
        $this->SetFont('Helvetica', '', 9);
        $this->Cell(0, 0.4, 'Printed on: ' . date('d M Y H:i'), 0, 0, 'L');
        $this->Cell(0, 0.4, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }
}

/* Setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

// Mulai output buffering
ob_start();

$pdf = new Pdf();
$pdf->SetMargins(0.7, 0.5, 0.7);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLineWidth(0.02);

// Data preparation
$hasil = [];
if (empty($rs) || !isset($rs[0])) {
    log_message('error', 'Data $rs kosong atau tidak valid');
    $pdf->Output('LEBEL_error.pdf', 'I');
    exit;
}
foreach ($rs as $d) {
    $hasil[] = $d;
}
$d = $hasil[0];

if (empty($d->resi) || !is_string($d->resi)) {
    log_message('error', 'Nomor resi tidak valid: ' . var_export($d->resi, true));
    $pdf->Output('LEBEL_error.pdf', 'I');
    exit;
}

// Logo Perusahaan
$logoPath = FCPATH . 'assets/images/logo-sancargo.png';
if (!file_exists($logoPath)) {
    log_message('error', 'File logo tidak ditemukan: ' . $logoPath);
    $pdf->Output('LEBEL_error.pdf', 'I');
    exit;
}

$pdf->Image($logoPath, 0.7, 0.5, 2.0, 1.0); // Reduced logo size

// Nama Perusahaan
$pdf->SetXY(3.0, 0.5); // Adjusted X to account for smaller logo
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0, 0.6, 'Trip Cargo', 0, 1, 'L');

// Tagline
$pdf->SetXY(3.0, 1.0);
$pdf->SetFont('Helvetica', 'I', 9);
$pdf->Cell(0, 0.4, 'Paket Cepat, Cargo & Moving', 0, 1, 'L');
$pdf->Ln(0.3);

// Garis Pemisah Header
$pdf->SetDrawColor(150, 150, 150);
$pdf->SetLineWidth(0.03);
$pdf->Line(0.7, 1.6, 14.1, 1.6);

// Nomor Resi
$pdf->SetXY(0.7, 2.0);
$pdf->SetFont('Helvetica', 'B', 20);
$pdf->SetFillColor(245, 245, 245);
$pdf->Cell(12.7, 0.9, $d->resi, 'LTRB', 1, 'C', true);

// Barcode QR
require_once FCPATH . 'application/libraries/qrcode/qrlib.php';
$qrPath = FCPATH . 'assets/barcode/' . $d->resi . '.png';
$dataToEncode = urlencode($d->resi);
$apiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=120x120&data=" . $dataToEncode; // Reduced QR image size

$qrImageData = @file_get_contents($apiUrl);
if ($qrImageData !== false) {
    file_put_contents($qrPath, $qrImageData);
} else {
    log_message('error', 'Gagal mengakses API QR Code: ' . $apiUrl);
    $pdf->Output('LEBEL_error.pdf', 'I');
    exit;
}

if (!file_exists($qrPath)) {
    log_message('error', 'File QR code gagal disimpan ke path: ' . $qrPath);
    $pdf->Output('LEBEL_error.pdf', 'I');
    exit;
}

$pdf->Image($qrPath, 11.6, 3.0, 2.0, 2.0); // Reduced QR size, adjusted X position
$pdf->Ln(0.3);

// Service
$pdf->SetXY(0.7, 3.2);
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->Cell(6.5, 0.6, 'SERVICE: ' . substr($d->layan ?? '', 0, 20), 'LTRB', 1, 'C');

// Koli dan Berat
$pdf->SetXY(0.7, 3.9);
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->Cell(3.2, 0.6, ($d->koli ?? 0) . ' Koli', 'LTRB', 0, 'C');
$pdf->Cell(3.2, 0.6, ($d->berat ?? 0) . ' Kg', 'LTRB', 1, 'C');

// Informasi Penerima
$pdf->SetXY(0.7, 4.6);
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->Cell(0, 0.5, 'Penerima:', 0, 1, 'L');
$pdf->SetFont('Helvetica', '', 9);
$pdf->SetXY(0.7, 5.0);
$pdf->MultiCell(12.7, 0.4, substr($d->penerima ?? '', 0, 50), 0, 'L');
$pdf->SetXY(0.7, 5.4);
$pdf->MultiCell(12.7, 0.4, substr($d->dept2 ?? '', 0, 50), 0, 'L');
$pdf->SetXY(0.7, 5.8);
$pdf->MultiCell(12.7, 0.4, substr($d->alamat ?? '', 0, 100), 0, 'L');
$pdf->SetXY(0.7, 6.8);
$pdf->Cell(0, 0.4, 'Telp: **********' . substr($d->telp ?? '', 8, 5), 0, 1, 'L');

// Pembayaran
$pdf->SetXY(11.6, 6.8); // Adjusted X for new QR position
$pdf->SetFont('Helvetica', 'I', 9);
$pdf->Cell(0, 0.4, substr($d->metode ?? '', 0, 20), 0, 1, 'R');

// Kota/Kabupaten
$pdf->SetXY(0.7, 7.4);
$pdf->SetFont('Helvetica', 'B', 13);
$pdf->Cell(12.7, 0.7, $this->app_model->find_kokab(substr($d->kec_id ?? '0000', 0, 4)), 'LTRB', 1, 'C', true);

// Informasi Pengirim
if ($d->p_nama == null) {
    $nama = $this->app_model->find_nama_pel($d->pel_id ?? '');
    $dept = $d->dept ?? '';
    $telp = $this->app_model->find_telp_pel($d->pel_id ?? '');
    $alamat = $d->alamat_pel ?? '';
    $kec = $this->app_model->find_kec($d->kec ?? '');
    $kokab = $this->app_model->find_kokab($d->kokab ?? '');
    $prov = $this->app_model->find_prov($d->prov ?? '');
    $email = $d->p_email ?? '';
} else {
    $nama = $d->p_nama ?? '';
    $dept = $d->p_dept ?? '';
    $telp = $d->p_telp ?? '';
    $alamat = $d->p_alamat ?? '';
    $kec = $this->app_model->find_kec($d->p_kec_id ?? '');
    $kokab = $this->app_model->find_kokab($d->p_kokab_id ?? '');
    $prov = $this->app_model->find_prov($d->p_prov_id ?? '');
    $email = $d->p_email ?? '';
}

$pdf->SetXY(0.7, 8.2);
$pdf->SetFont('Helvetica', 'B', 11);
$pdf->Cell(0, 0.5, 'Pengirim:', 0, 1, 'L');
$pdf->SetFont('Helvetica', '', 9);
$pdf->SetXY(0.7, 8.6);
$pdf->Cell(0, 0.4, substr($nama, 0, 50), 0, 1, 'L');
$pdf->SetXY(0.7, 9.0);
$pdf->Cell(0, 0.4, substr($dept, 0, 50), 0, 1, 'L');

// Deskripsi
$pdf->SetXY(0.7, 9.5);
$pdf->Cell(0, 0.4, 'Isi: ' . substr($d->deskripsi ?? '', 0, 70), 0, 1, 'L');

// Tanggal Kirim
$pdf->SetXY(0.7, 9.9);
$pdf->Cell(0, 0.4, date('d M Y H:i:s', strtotime($d->tglkirim ?? 'now')), 0, 1, 'L');

// Website
$pdf->SetXY(0.7, 10.3);
$pdf->SetFont('Helvetica', 'B', 12);

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
    log_message('error', 'File barcode tidak ditemukan: ' . $image_dir . $image_name);
    $pdf->Output('LEBEL_error.pdf', 'I');
    exit;
}
$pdf->Image($image_dir . $image_name, 4.1, 10.8, 5.0, 1.2); // Reduced barcode size, adjusted X position

// Bersihkan output buffer sebelum mengeluarkan PDF
ob_end_clean();

// Output PDF
$pdf->Output('LEBEL:' . $d->resi . '.pdf', 'I');
?>