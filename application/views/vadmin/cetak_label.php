<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='P', $unit='cm', $size=array(6, 7.8)) { 
        parent::__construct($orientation, $unit, $size);
    }

    function Header() {
        global $title;
        $this->SetTextColor(100, 100, 100);
        $this->SetFont('Helvetica', 'B', 6.4);
        $w = $this->GetStringWidth($title) + 0.8;
        $this->SetX(($this->w - $w) / 2);
        $this->Cell($w, 0.32, $title, 0, 1, 'C');
        $this->Ln(0.16);
    }

    function Footer() {
        // Empty footer to remove "Printed on: [date] Page [number]/{nb}"
    }
}

/* Setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

// Mulai output buffering
ob_start();

$pdf = new Pdf();
$pdf->SetMargins(0.4, 0.3, 0.4);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLineWidth(0.012);

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

$pdf->Image($logoPath, 0.4, 0.3, 1.5, 0.5); // Scaled down logo size

// Nama Perusahaan
$pdf->SetXY(2.0, 0.3);
$pdf->SetFont('Arial', 'B', 9.6);
$pdf->Cell(0, 0.32, 'Trip Cargo', 0, 1, 'L');

// Tagline
$pdf->SetXY(2.0, 0.6);
$pdf->SetFont('Helvetica', 'I', 3.5);
$pdf->Cell(0, 0.24, 'Paket Cepat, Cargo & Moving', 0, 1, 'L');
$pdf->Ln(0.16);

// Garis Pemisah Header
$pdf->SetDrawColor(150, 150, 150);
$pdf->SetLineWidth(0.016);
$pdf->Line(0.4, 0.8, 5.6, 0.8);

// Nomor Resi
$pdf->SetXY(0.4, 0.96);
$pdf->SetFont('Helvetica', 'B', 11.2);
$pdf->SetFillColor(245, 245, 245);
$pdf->Cell(5.2, 0.48, $d->resi, 'LTRB', 1, 'C', true);

// Barcode
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
$pdf->Image($image_dir . $image_name, 4.0, 0.3, 1.5, 0.45); // Scaled down barcode size

// Barcode QR
require_once FCPATH . 'application/libraries/qrcode/qrlib.php';
$qrPath = FCPATH . 'assets/barcode/' . $d->resi . '.png';
$dataToEncode = urlencode($d->resi);
$apiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=60x60&data=" . $dataToEncode; // Smaller QR size

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

$pdf->Image($qrPath, 4.2, 1.52, 1.2, 1.2); // Scaled down QR size

// Service
$pdf->SetXY(0.4, 1.52);
$pdf->SetFont('Helvetica', 'B', 6.4);
$pdf->Cell(3.6, 0.32, 'SERVICE: ' . substr($d->layan ?? '', 0, 15), 'LTRB', 1, 'C');

// Koli dan Berat
$pdf->SetXY(0.4, 1.92);
$pdf->SetFont('Helvetica', 'B', 6.4);
$pdf->Cell(1.8, 0.32, ($d->koli ?? 0) . ' Koli', 'LTRB', 0, 'C');
$pdf->Cell(1.8, 0.32, ($d->berat ?? 0) . ' Kg', 'LTRB', 1, 'C');

// Informasi Penerima
$pdf->SetXY(0.4, 2.32);
$pdf->SetFont('Helvetica', 'B', 6.4);
$pdf->Cell(0, 0.24, 'Penerima:', 0, 1, 'L');
$pdf->SetFont('Helvetica', '', 4.8);
$pdf->SetXY(0.4, 2.56);
$pdf->MultiCell(3.6, 0.24, substr($d->penerima ?? '', 0, 30), 0, 'L');
$pdf->SetXY(0.4, 2.8);
$pdf->MultiCell(3.6, 0.24, substr($d->dept2 ?? '', 0, 30), 0, 'L');
$pdf->SetXY(0.4, 3.04);
$pdf->MultiCell(3.6, 0.24, substr($d->alamat ?? '', 0, 60), 0, 'L');
$pdf->SetXY(0.4, 3.44);
$pdf->Cell(0, 0.24, 'Telp: **********' . substr($d->telp ?? '', 8, 5), 0, 1, 'L');

// Pembayaran
$pdf->SetXY(4.0, 3.44);
$pdf->SetFont('Helvetica', 'I', 4.8);
$pdf->Cell(1.2, 0.24, substr($d->metode ?? '', 0, 15), 0, 1, 'R');

// Kota/Kabupaten
$pdf->SetXY(0.4, 3.76);
$pdf->SetFont('Helvetica', 'B', 7.2);
$pdf->Cell(5.2, 0.4, $this->app_model->find_kokab(substr($d->kec_id ?? '0000', 0, 4)), 'LTRB', 1, 'C', true);

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

$pdf->SetXY(0.4, 4.24);
$pdf->SetFont('Helvetica', 'B', 6.4);
$pdf->Cell(0, 0.24, 'Pengirim:', 0, 1, 'L');
$pdf->SetFont('Helvetica', '', 4.8);
$pdf->SetXY(0.4, 4.48);
$pdf->MultiCell(3.6, 0.32, substr($nama, 0, 30), 0, 'L');
$pdf->SetXY(0.4, 4.64);
$pdf->MultiCell(3.6, 0.32, substr($dept, 0, 30), 0, 'L');

// Deskripsi
$pdf->SetXY(0.4, 4.8);
$pdf->Cell(0, 0.32, 'Isi: ' . substr($d->deskripsi ?? '', 0, 40), 0, 1, 'L');

// Tanggal Kirim
$pdf->SetXY(0.4, 4.96);
$pdf->Cell(0, 0.4, date('d M Y H:i:s', strtotime($d->tglkirim ?? 'now')), 0, 1, 'L');

// Bersihkan output buffer sebelum mengeluarkan PDF
ob_end_clean();

// Output PDF
$pdf->Output('LEBEL_' . $d->resi . '.pdf', 'I');
?>