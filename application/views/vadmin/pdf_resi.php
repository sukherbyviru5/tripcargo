<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='P', $unit='cm', $size=array(8, 24)) { 
        parent::__construct($orientation, $unit, $size);
    }

    function Header() {
        global $title;
        $this->SetTextColor(100, 100, 100);
        $this->SetFont('Helvetica', 'B', 4);
        $w = $this->GetStringWidth($title . 'Surat Tanda Terima Barang (e-STT)') + 0.4;
        $this->SetX(2.3);
        $this->Cell($w, 0.4, $title . 'Surat Tanda Terima Barang (e-STT)', 0, 1, 'C');
        $this->Ln(0.5);
    }

    function Footer() {
        $this->SetTextColor(100, 100, 100);
        $this->SetY(-0.8);
        $this->SetFont('Helvetica', '', 6);
        $this->Cell(0, 0.3, 'Cetak (e-STT): ' . date('d/m/Y H:i'), 0, 0, 'L');
        $this->Cell(0, 0.3, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }
}

$available_width = 7.6;
date_default_timezone_set('Asia/Jakarta');

$pdf = new Pdf();
$pdf->SetMargins(0.2, 0.5, 0.2);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLineWidth(0.01);

// Data preparation
$hasil = [];
foreach ($rs as $d) {
    $hasil[] = $d;
}

// Logo
$logoPath = FCPATH . 'assets/images/logo-sancargo.png';
if (!file_exists($logoPath)) {
    die('File logo tidak ditemukan: ' . $logoPath);
}
$pdf->Image($logoPath, 0.4, 0.5, 2);

// Barcode
require_once APPPATH . 'libraries/Zend/Barcode.php';
$code = $d->resi;
$image_resource = Zend_Barcode::factory('code128', 'image', array('text' => $code), array())->draw();
$image_name = $code . '.jpg';
$image_dir = FCPATH . 'assets/barcode/';
if (!is_dir($image_dir)) {
    mkdir($image_dir, 0777, true);
}
imagejpeg($image_resource, $image_dir . $image_name);
$barcodePath = $image_dir . $image_name;
if (!file_exists($barcodePath)) {
    die('File barcode tidak ditemukan: ' . $barcodePath);
}
$pdf->Image($barcodePath, 5, 0.5, 2);

// QR Code
$qrData = "https://tripcargoid.com/web/cari?k=" . $d->resi;
$qrApiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=80x80&data=" . urlencode($qrData);
$pdf->Image($qrApiUrl, 7.0, 0.5, 0.8, 0, 'PNG');
$pdf->Ln(0.5);

// Alamat Pelanggan
$pdf->SetFont('Helvetica', '', 4);
$pdf->SetXY(0.2, 1.5);
$pdf->MultiCell($available_width, 0.2, $alamat_pertama ?: 'No address provided', 0, 'L');
$pdf->Ln(0.2);

// Header Table
$pdf->SetFont('Helvetica', 'B', 5);
$pdf->SetXY(0.2, 2.0);
$pdf->Cell(2.4, 0.3, 'ASAL', 'LTR', 0, 'C');
$pdf->Cell(2.4, 0.3, 'TUJUAN', 'LTR', 0, 'C');
$pdf->Cell(1.4, 0.3, 'NO. TRANS', 'LTR', 0, 'C');
$pdf->Cell(1.4, 0.3, 'SERVICE', 'LTR', 0, 'C');
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 4);
$pdf->Cell(2.4, 0.3, $d->area ?? substr($d->resi, 0, 3), 'LBR', 0, 'C');
$pdf->Cell(2.4, 0.3, $this->app_model->find_kokab($d->kokab_id), 'LBR', 0, 'C');
$pdf->Cell(1.4, 0.3, $this->app_model->find_id_admin($d->user_id) . "-$d->id", 'LBR', 0, 'C');
$pdf->Cell(1.4, 0.3, $d->layan, 'LBR', 0, 'C');
$pdf->Ln(0.3);

// Informasi Asal
$pdf->SetFont('Helvetica', '', 3.4);
$asalText = $d->alamat_pel;
$fixedWidth = 2.4;
$col2Width = 2.4;
$col3Width = 1.4; 
$col4Width = 1.4; 

$lineHeight = 0.2; 
$textWidth = $pdf->GetStringWidth($asalText);
$numLines = max(1, ceil(($textWidth + 0.3) / $fixedWidth)); 
$asalTextHeight = $numLines * $lineHeight;
$y = $pdf->GetY();
$pdf->MultiCell($fixedWidth, $lineHeight, $asalText, 'LTR', 'C');
$pdf->SetXY(2.6, $y);

$pdf->Cell($col2Width, $asalTextHeight, 'Jml (Colly)', 'LTR', 0, 'C');
$pdf->Cell($col3Width, $asalTextHeight, 'Ukuran', 'LTR', 0, 'C');
$pdf->Cell($col4Width, $asalTextHeight, 'Biaya Kirim', 'LTR', 0, 'C');
$pdf->Ln($asalTextHeight); 

$y = $pdf->GetY();
$pdf->Cell(2.4, 0.4, "CSO. $d->telp_p - tripcargo.test", 'LBR', 0, 'C');
$pdf->Cell(2.4, 0.4, $d->koli . ' Pcs', 'LBR', 0, 'C');
$pdf->Cell($col3Width, 0.4, $d->berat . ' Kg', 'LBR', 0, 'C');
$pdf->Cell($col4Width, 0.4, 'Rp ' . number_format($d->harga2, 0), 'LBR', 0, 'C');
$pdf->Ln(0.6);

// Penerima dan Pengirim
$pageWidth = $pdf->GetPageWidth() - $pdf->GetX() * 2;
$halfWidth = $pageWidth / 2;
$headerHeight = 0.4;
$lineHeight = 0.3;

$startX = $pdf->GetX();
$startY = $pdf->GetY();

$penerima = $d->penerima . "\n" . $d->dept2 . "\n" . $d->alamat . "\n" .
    $this->app_model->find_kec($d->kec_id) . ", " . $this->app_model->find_kokab($d->kokab_id) . ", " .
    $this->app_model->find_prov($d->prov_id) . "\nTlp. " . $d->telp;

if ($d->p_nama == null) {
    $nama = $this->app_model->find_nama_pel($d->pel_id);
    $dept = $this->app_model->find_dept_pel($d->pel_id);
    $telp = $this->app_model->find_telp_pel($d->pel_id);
    $alamat = $d->alamat_pel;
    $kec = $this->app_model->find_kec($d->kec);
    $kokab = $this->app_model->find_kokab($d->kokab);
    $prov = $this->app_model->find_prov($d->prov);
} else {
    $nama = $d->p_nama;
    $dept = $d->p_dept;
    $telp = $d->p_telp;
    $alamat = $d->p_alamat;
    $kec = $this->app_model->find_kec($d->p_kec_id);
    $kokab = $this->app_model->find_kokab($d->p_kokab_id);
    $prov = $this->app_model->find_prov($d->p_prov_id);
}
$pengirim = $nama . "\n" . $dept . "\n" . $alamat . "\n" . $kec . ", " . $kokab . ", " . $prov . "\nTlp. " . $telp;

// Kolom Penerima
$pdf->SetFont('Helvetica', 'B', 5);
$pdf->Cell($halfWidth, $headerHeight, 'PENERIMA:', 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 5);
$pdf->MultiCell($halfWidth, $lineHeight, $penerima, 0, 'L');
$yPenerima = $pdf->GetY();

// Kolom Pengirim
$pdf->SetXY($startX + $halfWidth, $startY);
$pdf->SetFont('Helvetica', 'B', 5);
$pdf->Cell($halfWidth, $headerHeight, 'PENGIRIM:', 0, 0, 'L');
$pdf->SetXY($startX + $halfWidth, $startY + $headerHeight);
$pdf->SetFont('Helvetica', '', 5);
$pdf->MultiCell($halfWidth, $lineHeight, $pengirim, 0, 'L');
$yPengirim = $pdf->GetY();

$finalY = max($yPenerima, $yPengirim);
$boxHeight = $finalY - $startY;
$pdf->Rect($startX, $startY, $halfWidth, $boxHeight);
$pdf->Rect($startX + $halfWidth, $startY, $halfWidth, $boxHeight);
$pdf->SetY($finalY);
$pdf->Ln(0.2);

// Catatan dan Tabel Biaya
$catatan = $d->catatan ? $d->catatan : 'Tidak ada catatan';
$deskripsi = $d->deskripsi ? $d->deskripsi : 'Tidak ada deskripsi';
$startY = $pdf->GetY();
$pdf->SetFont('Helvetica', 'B', 5);
$pdf->Cell($halfWidth, $headerHeight, 'CATATAN:', 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 5);
$pdf->MultiCell($halfWidth, $lineHeight, $catatan, 0, 'L');
$pdf->SetFont('Helvetica', 'B', 5);
$pdf->Cell($halfWidth, $headerHeight, 'DESKRIPSI:', 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 5);
$pdf->MultiCell($halfWidth, $lineHeight, $deskripsi, 0, 'L');
$yPenerima = $pdf->GetY();

$pdf->SetXY($startX + $halfWidth, $startY);
$pdf->SetFont('Helvetica', 'B', 5);
$pdf->Cell($halfWidth, $headerHeight, 'BIAYA:', 0, 0, 'L');
$pdf->SetXY($startX + $halfWidth, $startY + $headerHeight);
$pdf->SetFont('Helvetica', '', 5);
$col1Width = $halfWidth * 0.6;
$col2Width = $halfWidth * 0.4;
$rowHeight = $lineHeight;
$startXTable = $pdf->GetX();
$pdf->SetX($startXTable);
$pdf->Cell($col1Width, $rowHeight, 'Biaya Penerus', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->harga1, 0), 0, 0, 'R');
$pdf->Ln();
$pdf->SetX($startXTable);
$pdf->Cell($col1Width, $rowHeight, 'Biaya Tambahan', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->harga3, 0), 0, 0, 'R');
$pdf->Ln();
$pdf->SetX($startXTable);
$pdf->Cell($col1Width, $rowHeight, 'Asuransi', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->harga4, 0), 0, 0, 'R');
$pdf->Ln();
$pdf->SetX($startXTable);
$pdf->Cell($col1Width, $rowHeight, 'Packaging', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->harga5, 0), 0, 0, 'R');
$pdf->Ln();
$pdf->SetX($startXTable);
$pdf->Cell($col1Width, $rowHeight, 'Diskon', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, $d->diskon. '%', 0, 0, 'R');
$pdf->Ln();
$pdf->SetX($startXTable);
$pdf->Cell($col1Width, $rowHeight, 'Jumlah', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->totalbayar, 0), 0, 0, 'R');
$pdf->Ln();
$yPengirim = $pdf->GetY();

$finalY = max($yPenerima, $yPengirim);
$boxHeight = $finalY - $startY;
$pdf->Rect($startX, $startY, $halfWidth, $boxHeight);
$pdf->Rect($startX + $halfWidth, $startY, $halfWidth, $boxHeight);
$pdf->SetY($finalY);
$pdf->Ln(0.2);

// Volume dan Terbilang
$pdf->SetFont('Helvetica', '', 4);
$vol = ($d->p) ? $d->p . 'x' . $d->l . 'x' . $d->t . '(cm)' : '';
$terbilangText = 'TERBILANG: ' . ucwords(strtolower($this->app_model->bilang($d->totalbayar) . ' rupiah'));
$colWidth = 3.8; 
$lineHeight = 0.3; 

$textWidth = $pdf->GetStringWidth($terbilangText);
$numLines = max(1, ceil(($textWidth + 0.1) / $colWidth));
$terbilangHeight = $numLines * $lineHeight;

$y = $pdf->GetY();
$pdf->Cell($colWidth, $terbilangHeight, 'VOLUME: ' . $vol, 'TLBR', 0, 'L');
$pdf->SetXY(4, $y);
$pdf->MultiCell($colWidth, $lineHeight, $terbilangText, 'TLBR', 'L');
$pdf->Ln(0.2); 

// Tanda Tangan
$pdf->SetFont('Helvetica', 'B', 5);
$pdf->Cell(2.53, 0.4, 'Pengirim', 'LTR', 0, 'C');
$pdf->Cell(2.53, 0.4, 'Diterima Oleh', 'LTR', 0, 'C');
$pdf->Cell(2.54, 0.4, 'Operator', 'LTR', 0, 'C');
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 5);
$pdf->Cell(2.53, 0.4, '', 'LBR', 0, 'C');
$pdf->Cell(2.53, 0.4, '', 'LBR', 0, 'C');
$pdf->Cell(2.54, 0.4, $this->app_model->find_nama_admin($d->user_id), 'LBR', 0, 'C');
$pdf->Ln(0.4);

// Syarat dan Ketentuan
$pdf->SetDrawColor(150, 150, 150);
$pdf->Line(0.2, $pdf->GetY(), 7.8, $pdf->GetY());
$pdf->Ln(0.3);
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->SetTextColor(191, 0, 0);
$pdf->Cell(0, 0.4, 'SYARAT DAN KETENTUAN PENGIRIMAN', 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Helvetica', '', 5);
$terms = [
    "1. Umum\n" .
    "a. Pengirim wajib memberitahukan isi dan nilai barang saat penyerahan, serta memberi kuasa kepada Trip Cargo untuk memeriksa bila diperlukan.\n" .
    "b. Pengirim/penerima bertanggung jawab penuh atas biaya pengiriman. Jika tidak dipenuhi, perusahaan berhak menahan barang.\n" .
    "c. Trip Cargo berhak menolak barang yang dilarang, berbahaya, atau melanggar hukum.",
    "2. Tanggung Jawab & Risiko\n" .
    "a. Kerusakan akibat packing tidak sempurna, cuaca, pecah belah, elektronik, tanaman, hewan hidup, atau spare part menjadi tanggung jawab pengirim/penerima.\n" .
    "b. Barang cairan, kaca, dan sejenisnya tidak diganti rugi bila rusak/bocor. Jika menimbulkan kerugian pihak ketiga, pengirim wajib menyelesaikan.\n" .
    "c. Trip Cargo tidak mengganti rugi kerusakan/kehilangan akibat bencana alam, huru-hara, Force Majeure, atau keterlambatan transportasi.\n" .
    "d. Barang tertentu (logam mulia, perhiasan, cek, surat berharga, dll.) tidak diterima walaupun diasuransikan.",
    "3. Asuransi & Ganti Rugi\n" .
    "a. Pengirim wajib menanggung premi asuransi jika menginginkan perlindungan.\n" .
    "b. Klaim ganti rugi hanya dapat diajukan oleh pengirim, selambatnya 1 bulan sejak tanggal resi, dengan bukti lengkap.\n" .
    "c. Maksimal ganti rugi: 10x biaya kirim atau Rp1.000.000 (mana yang lebih kecil).\n" .
    "d. Barang yang membusuk (makanan) atau cacat kemasan tidak mendapat ganti rugi.",
    "4. Pembayaran\n" .
    "a. Biaya pengiriman dibayar saat penyerahan barang, bukti resi sebagai tanda pelunasan.\n" .
    "b. Pembatalan pengiriman dikenakan potongan 20% atau min. Rp75.000.",
    "5. Layanan & Tarif\n" .
    "a. Jenis Layanan: Priority (lebih cepat, udara > 90 kg), Reguler (udara, darat & laut), Cargo (darat & laut).\n" .
    "b. Perhitungan Tarif: Darat & Laut: (P x L x T)/4000; Udara: (P x L x T)/6000; Minimum 30 kg per resi (darat & laut).\n" .
    "c. Barang > 150 kg dikenakan biaya alat bantu.\n" .
    "d. Harga belum termasuk PPN, asuransi, dan packing.\n" .
    "e. Jadwal keberangkatan armada dapat berubah tanpa pemberitahuan.",
    "6. Ketentuan Tambahan\n" .
    "a. Nomor telepon & alamat penerima harus jelas untuk mempercepat pengiriman.\n" .
    "b. Barang dapat diperiksa oleh pihak berwenang bila diperlukan.\n" .
    "c. Panjang barang > 5 meter harus dikonfirmasi terlebih dahulu."
];
foreach ($terms as $i => $term) {
    $pdf->MultiCell($available_width, 0.3, $term, '', 'L');
}

$pdf->Output($d->resi . '.pdf', 'I');
?>