<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
     function __construct($orientation='P', $unit='cm', $size=array(8, 10)) { 
        parent::__construct($orientation, $unit, $size);
    }

    function Header() {
        global $title;
        $this->SetTextColor(100, 100, 100);
        $this->SetFont('Helvetica', 'B', 8);
        $w = $this->GetStringWidth($title) + 1;
        $this->SetX(($this->w - $w) / 2);
        $this->Cell($w, 0.4, $title, 0, 1, 'C');
        $this->Ln(0.2);
    }

    function Footer() {
        $this->SetTextColor(100, 100, 100);
        $this->SetY(-0.6);
        $this->SetFont('Helvetica', '', 6);
        $this->Cell(0, 0.3, 'Printed on: ' . date('d M Y H:i'), 0, 0, 'L');
        $this->Cell(0, 0.3, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
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
$pdf->SetLineWidth(0.015);

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

$pdf->Image($logoPath, 0.4, 0.3, 2.0, 0.7); // Scaled logo size

// Nama Perusahaan
$pdf->SetXY(2.5, 0.3);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 0.4, 'Trip Cargo', 0, 1, 'L');

// Tagline
$pdf->SetXY(2.5, 0.7);
$pdf->SetFont('Helvetica', 'I', 6);
$pdf->Cell(0, 0.3, 'Paket Cepat, Cargo & Moving', 0, 1, 'L');
$pdf->Ln(0.2);

// Garis Pemisah Header
$pdf->SetDrawColor(150, 150, 150);
$pdf->SetLineWidth(0.02);
$pdf->Line(0.4, 1.0, 7.6, 1.0);

// Nomor Resi
$pdf->SetXY(0.4, 1.2);
$pdf->SetFont('Helvetica', 'B', 14);
$pdf->SetFillColor(245, 245, 245);
$pdf->Cell(7.2, 0.6, $d->resi, 'LTRB', 1, 'C', true);

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
$pdf->Image($image_dir . $image_name, 5.5, 0.3, 2.0, 0.6); // Smaller barcode at top-right

// Barcode QR
require_once FCPATH . 'application/libraries/qrcode/qrlib.php';
$qrPath = FCPATH . 'assets/barcode/' . $d->resi . '.png';
$dataToEncode = urlencode($d->resi);
$apiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=" . $dataToEncode; // Smaller QR size

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

$pdf->Image($qrPath, 5.5, 1.9, 1.5, 1.5); // Smaller QR size, positioned below barcode

// Service
$pdf->SetXY(0.4, 1.9);
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(4.5, 0.4, 'SERVICE: ' . substr($d->layan ?? '', 0, 15), 'LTRB', 1, 'C');

// Koli dan Berat
$pdf->SetXY(0.4, 2.4);
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(2.2, 0.4, ($d->koli ?? 0) . ' Koli', 'LTRB', 0, 'C');
$pdf->Cell(2.2, 0.4, ($d->berat ?? 0) . ' Kg', 'LTRB', 1, 'C');

// Informasi Penerima
$pdf->SetXY(0.4, 2.9);
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(0, 0.3, 'Penerima:', 0, 1, 'L');
$pdf->SetFont('Helvetica', '', 6);
$pdf->SetXY(0.4, 3.2);
$pdf->MultiCell(4.5, 0.3, substr($d->penerima ?? '', 0, 30), 0, 'L');
$pdf->SetXY(0.4, 3.5);
$pdf->MultiCell(4.5, 0.3, substr($d->dept2 ?? '', 0, 30), 0, 'L');
$pdf->SetXY(0.4, 3.8);
$pdf->MultiCell(4.5, 0.3, substr($d->alamat ?? '', 0, 60), 0, 'L');
$pdf->SetXY(0.4, 4.3);
$pdf->Cell(0, 0.3, 'Telp: **********' . substr($d->telp ?? '', 8, 5), 0, 1, 'L');

// Pembayaran
$pdf->SetXY(5.5, 4.3);
$pdf->SetFont('Helvetica', 'I', 6);
$pdf->Cell(1.5, 0.3, substr($d->metode ?? '', 0, 15), 0, 1, 'R');

// Kota/Kabupaten
$pdf->SetXY(0.4, 4.7);
$pdf->SetFont('Helvetica', 'B', 9);
$pdf->Cell(7.2, 0.5, $this->app_model->find_kokab(substr($d->kec_id ?? '0000', 0, 4)), 'LTRB', 1, 'C', true);

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

$pdf->SetXY(0.4, 5.3);
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(0, 0.3, 'Pengirim:', 0, 1, 'L');
$pdf->SetFont('Helvetica', '', 6);
$pdf->SetXY(0.4, 5.6);
$pdf->MultiCell(4.5, 0.4, substr($nama, 0, 30), 0, 'L');
$pdf->SetXY(0.4, 5.8);
$pdf->MultiCell(4.5, 0.4, substr($dept, 0, 30), 0, 'L');

// Deskripsi
$pdf->SetXY(0.4, 6);
$pdf->Cell(0, 0.4, 'Isi: ' . substr($d->deskripsi ?? '', 0, 40), 0, 1, 'L');

// Tanggal Kirim
$pdf->SetXY(0.4, 6.2);
$pdf->Cell(0, 0.5, date('d M Y H:i:s', strtotime($d->tglkirim ?? 'now')), 0, 1, 'L');

// Bersihkan output buffer sebelum mengeluarkan PDF
ob_end_clean();

// Output PDF
$pdf->Output('LEBEL:' . $d->resi . '.pdf', 'I');
?>