<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='P', $unit='cm', $size='A4') { // UBAH DISINI: 'L' menjadi 'P' untuk Potret
        parent::__construct($orientation, $unit, $size);
    }

    // Helper function to calculate number of lines (Tidak ada perubahan di sini)
    function NbLines($w, $txt) {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                } else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else
                $i++;
        }
        return $nl;
    }

    function Header() {
        global $title;
        $this->SetTextColor(100, 100, 100);
        $this->SetFont('Helvetica', 'B', 9);
        $w = $this->GetStringWidth($title . ' Surat Tanda Terima Barang (e-STT)') + 2;
        $this->SetX(($this->w - $w) / 2);
        $this->Cell($w, 0.4, $title . ' Surat Tanda Terima Barang (e-STT)', 0, 1, 'C');
        $this->Ln(0.2);
    }

    function Footer() {
        $this->SetTextColor(100, 100, 100);
        $this->SetY(-1.0);
        $this->SetFont('Helvetica', '', 6);
        $this->Cell(0, 0.3, 'Cetak (e-STT): ' . date('d/m/Y H:i'), 0, 0, 'L');
        $this->Cell(0, 0.3, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }
}

/* Setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

$pdf = new Pdf('P'); 
$pdf->SetMargins(0.8, 0.6, 0.8);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLineWidth(0.02);

// Data preparation
$d = $rs[0];

$available_width = 19.4;


// Logo
$logoPath = FCPATH . 'assets/images/logo-sancargo.png';
if (!file_exists($logoPath)) {
    die('File logo tidak ditemukan: ' . $logoPath);
}
$pdf->Image($logoPath, 1, 0.8, 5);

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
$pdf->Image($barcodePath, 14.5, 0.8, 4);

// QR Code
$qrData = "https://tripcargo.test/web/cari?k=" . $d->resi;
$qrApiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrData);
$pdf->Image($qrApiUrl, 18.5, 0.8, 1.5, 0, 'PNG');
$pdf->Ln(0.8); // Maintain spacing below for consistency


// === Add $d->alamat_pel Above ASAL Box ===
$pdf->SetFont('Helvetica', '', 6);
$pdf->SetXY(1.0, 2.5);
$pdf->MultiCell($available_width, 0.3, $alamat_pertama ?: 'No address provided', 0, 'L');
$pdf->Ln(0.2);

// === Header Table ===
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->SetXY(1.0, 3.0);
$colWidth1 = $available_width / 4;
$pdf->Cell($colWidth1, 0.4, 'ASAL', 'LTR', 0, 'C');
$pdf->Cell($colWidth1, 0.4, 'TUJUAN', 'LTR', 0, 'C');
$pdf->Cell($colWidth1, 0.4, 'NO. TRANSAKSI', 'LTR', 0, 'C');
$pdf->Cell($colWidth1, 0.4, 'SERVICE', 'LTR', 1, 'C');

$pdf->SetX(1.0);
$pdf->SetFont('Helvetica', '', 7);
// UBAH DISINI: Gunakan lebar kolom yang sudah disesuaikan
$pdf->Cell($colWidth1, 0.4, substr($d->resi, 0, 3), 'LBR', 0, 'C');
$pdf->Cell($colWidth1, 0.4, $this->app_model->find_kokab($d->kokab_id), 'LBR', 0, 'C');
$pdf->Cell($colWidth1, 0.4, $this->app_model->find_id_admin($d->user_id) . "-$d->id", 'LBR', 0, 'C');
$pdf->Cell($colWidth1, 0.4, $d->layan, 'LBR', 1, 'C');
$pdf->Ln(0.2);


// === Informasi Asal & Biaya (Struktur diubah menjadi vertikal agar muat) ===
$y_start_info = $pdf->GetY();

// // Alamat Asal (lebar penuh)
// $pdf->SetFont('Helvetica', '', 6);
// $asalText = $alamat_pertama ?: 'Jl. Kp. Parung Serab No. 33 F Rt.5 / 3 Tirtajaya, Sukmajaya, Depok';
// $pdf->MultiCell($available_width, 0.3, $asalText, 'LTR', 'C');
// $pdf->Cell($available_width, 0.3, "CSO. " . ($d->telp_p ?: '0881080899678') . " - tripcargo.test", 'LBR', 1, 'C');

// Detail Biaya (di bawahnya, lebar penuh)
$pdf->SetFont('Helvetica', 'B', 6);
$fullWidth = 19.0; // Assuming A4 with 1 cm margins (21 cm - 2 cm = 19 cm)
$colWidth2 = $fullWidth / 3; // Divide into three equal columns (~6.33 cm each)
$pdf->Cell($colWidth2, 0.3, 'Jml (Colly)', 'TLBR', 0, 'C');
$pdf->Cell($colWidth2, 0.3, 'Ukuran (Kgs / m3)', 'TLBR', 0, 'C');
$pdf->Cell($colWidth2, 0.3, 'Biaya Kirim', 'TLBR', 1, 'C');

$pdf->SetFont('Helvetica', '', 6);
$pdf->Cell($colWidth2, 0.3, $d->koli . ' Pcs', 'TLBR', 0, 'C');
$pdf->Cell($colWidth2, 0.3, $d->berat . ' Kg', 'TLBR', 0, 'C');
$pdf->Cell($colWidth2, 0.3, 'Rp ' . number_format($d->harga2, 0), 'TLBR', 1, 'C');
$pdf->Ln(0.2);

// ===================================================================
// KODE LENGKAP - SOLUSI FINAL (PERBAIKAN POSISI KOLOM KANAN)
// ===================================================================

// 1. Persiapan Data (Tidak ada perubahan)
// -------------------------------------------------------------------
$penerima = $d->penerima . "\n" . $d->dept2 . "\n" . $d->alamat . "\n" .
    $this->app_model->find_kec($d->kec_id) . ", " . $this->app_model->find_kokab($d->kokab_id) . ", " .
    $this->app_model->find_prov($d->prov_id) . "\nTlp. " . $d->telp;

if ($d->p_nama == null) {
    // ... (logika if-else Anda untuk menentukan $pengirim tetap sama)
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


// 2. Logika Pencetakan PDF (Dengan perbaikan posisi kursor)
// -------------------------------------------------------------------
$pageWidth = $pdf->GetPageWidth() - $pdf->GetX() * 2;
$halfWidth = $pageWidth / 2;
$headerHeight = 0.5;
$lineHeight = 0.4;

// Simpan posisi awal sebelum mencetak apapun
$startX = $pdf->GetX();
$startY = $pdf->GetY();

// --- CETAK SEMUA TEKS TANPA BINGKAI (BORDER = 0) ---

// Kolom 1: Teks Penerima
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell($halfWidth, $headerHeight, 'PENERIMA:', 0, 0, 'L');
$pdf->Ln(); // Di sini Ln() aman karena kita memang ingin ke margin kiri
$pdf->SetFont('Helvetica', '', 8);
$pdf->MultiCell($halfWidth, $lineHeight, $penerima, 0, 'L');
$yPenerima = $pdf->GetY(); // Catat posisi Y setelah teks penerima

// Pindah kursor ke atas lagi untuk mulai kolom kedua
$pdf->SetXY($startX + $halfWidth, $startY);

// Kolom 2: Teks Pengirim
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell($halfWidth, $headerHeight, 'PENGIRIM:', 0, 0, 'L');

// == PERBAIKAN KUNCI ADA DI SINI ==
// PENTING: Jangan gunakan Ln() karena akan mereset posisi X ke kiri.
// Atur posisi Y secara manual di bawah header 'PENGIRIM:'.
$pdf->SetXY($startX + $halfWidth, $startY + $headerHeight);
// ===================================

$pdf->SetFont('Helvetica', '', 8);
$pdf->MultiCell($halfWidth, $lineHeight, $pengirim, 0, 'L');
$yPengirim = $pdf->GetY(); // Catat posisi Y setelah teks pengirim

// --- UKUR TINGGI MAKSIMUM DAN GAMBAR KOTAKNYA ---

// Tentukan tinggi total yang dibutuhkan dari posisi Y paling bawah
$finalY = max($yPenerima, $yPengirim);
$boxHeight = $finalY - $startY;

// Gambar kotak (Rect) untuk Penerima
$pdf->Rect($startX, $startY, $halfWidth, $boxHeight);

// Gambar kotak (Rect) untuk Pengirim
$pdf->Rect($startX + $halfWidth, $startY, $halfWidth, $boxHeight);

// Setel posisi kursor ke bawah kotak yang paling tinggi untuk elemen selanjutnya
$pdf->SetY($finalY);

// Beri sedikit spasi setelah blok ini
$pdf->Ln(0.2);

// ===================================================================
// AKHIR KODE
// ===================================================================

// 1. Persiapan Data (Tidak ada perubahan)
// -------------------------------------------------------------------
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

// 2. Logika Pencetakan PDF (Dengan perbaikan posisi kursor dan pengirim sebagai tabel)
// -------------------------------------------------------------------
$pageWidth = $pdf->GetPageWidth() - $pdf->GetX() * 2;
$halfWidth = $pageWidth / 2;
$headerHeight = 0.5;
$lineHeight = 0.4;

// Simpan posisi awal sebelum mencetak apapun
$startX = $pdf->GetX();
$startY = $pdf->GetY();

// --- CETAK SEMUA TEKS TANPA BINGKAI (BORDER = 0) ---

$catatan = $d->catatan ? $d->catatan : 'Tidak ada catatan';
$deskripsi = $d->deskripsi ? $d->deskripsi : 'Tidak ada deskripsi';

// Kolom 1: Teks Penerima
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell($halfWidth, $headerHeight, 'CATATAN:', 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 8);
$pdf->MultiCell($halfWidth, $lineHeight, $catatan, 0, 'L');
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell($halfWidth, $headerHeight, 'DESKRIPSI:', 0, 0, 'L');
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 8);
$pdf->MultiCell($halfWidth, $lineHeight, $deskripsi, 0, 'L');
$yPenerima = $pdf->GetY(); // Catat posisi Y setelah teks penerima

// Pindah kursor ke atas lagi untuk mulai kolom kedua
$pdf->SetXY($startX + $halfWidth, $startY);

// Kolom 2: Tabel Pengirim
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell($halfWidth, $headerHeight, 'PENGIRIM:', 0, 0, 'L');
$pdf->SetXY($startX + $halfWidth, $startY + $headerHeight);

// Tabel Biaya
$pdf->SetFont('Helvetica', '', 8);
$col1Width = $halfWidth * 0.6; // 60% untuk label
$col2Width = $halfWidth * 0.4; // 40% untuk nilai
$rowHeight = $lineHeight;

// Simpan posisi X awal untuk memastikan kesejajaran
$startXTable = $pdf->GetX();

// Cetak tabel secara manual satu per satu
// Baris 1: Biaya Penerus
$pdf->SetX($startXTable); // Atur posisi X ke awal
$pdf->Cell($col1Width, $rowHeight, 'Biaya Penerus', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->harga1, 0) , 0, 0, 'R');
$pdf->Ln();

// Baris 2: Biaya Tambahan
$pdf->SetX($startXTable); // Atur posisi X ke awal
$pdf->Cell($col1Width, $rowHeight, 'Biaya Tambahan', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->harga3, 0), 0, 0, 'R');
$pdf->Ln();

// Baris 3: Asuransi
$pdf->SetX($startXTable); // Atur posisi X ke awal
$pdf->Cell($col1Width, $rowHeight, 'Asuransi', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->harga4, 0), 0, 0, 'R');
$pdf->Ln();

// Baris 4: Packaging
$pdf->SetX($startXTable); // Atur posisi X ke awal
$pdf->Cell($col1Width, $rowHeight, 'Packaging', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->harga5, 0), 0, 0, 'R');
$pdf->Ln();

// Baris 5: Diskon
$pdf->SetX($startXTable); // Atur posisi X ke awal
$pdf->Cell($col1Width, $rowHeight, 'Diskon', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, $d->diskon. '%', 0, 0, 'R');
$pdf->Ln();

// Baris 6: Jumlah
$pdf->SetX($startXTable); // Atur posisi X ke awal
$pdf->Cell($col1Width, $rowHeight, 'Jumlah', 0, 0, 'L');
$pdf->Cell($col2Width, $rowHeight, 'Rp '. number_format($d->totalbayar, 0), 0, 0, 'R');
$pdf->Ln();

$yPengirim = $pdf->GetY(); // Catat posisi Y setelah tabel pengirim
// --- UKUR TINGGI MAKSIMUM DAN GAMBAR KOTAKNYA ---

// Tentukan tinggi total yang dibutuhkan dari posisi Y paling bawah
$finalY = max($yPenerima, $yPengirim);
$boxHeight = $finalY - $startY;

// Gambar kotak (Rect) untuk Penerima
$pdf->Rect($startX, $startY, $halfWidth, $boxHeight);

// Gambar kotak (Rect) untuk Pengirim
$pdf->Rect($startX + $halfWidth, $startY, $halfWidth, $boxHeight);

// Setel posisi kursor ke bawah kotak yang paling tinggi untuk elemen selanjutnya
$pdf->SetY($finalY);

// Beri sedikit spasi setelah blok ini
$pdf->Ln(0.2);

// === Volume dan Terbilang ===
// Volume dan Terbilang
$vol = ($d->p) ? $d->p . 'x' . $d->l . 'x' . $d->t . '(cm)' : '';
$pdf->Cell(9.5, 0.5, 'VOLUME: ' . $vol, 'TLBR', 0, 'L');
$pdf->Cell(9.5, 0.5, 'TERBILANG: ' . ucwords(strtolower($this->app_model->bilang($d->totalbayar) . ' rupiah')), 'TLBR', 1, 'L');
$pdf->Ln(0.2);


// === Tanda Tangan ===
$pdf->SetFont('Helvetica', 'B', 7);
$colWidth4 = $available_width / 3; // UBAH DISINI: Lebar dibagi 3
$pdf->Cell($colWidth4, 0.4, 'Pengirim', 1, 0, 'C');
$pdf->Cell($colWidth4, 0.4, 'Diterima Oleh', 1, 0, 'C');
$pdf->Cell($colWidth4, 0.4, 'Operator', 1, 1, 'C');

$pdf->SetFont('Helvetica', '', 6);
$pdf->Cell($colWidth4, 2.0, '', 'LBR', 0, 'C'); // UBAH DISINI
$pdf->Cell($colWidth4, 2.0, '', 'LBR', 0, 'C'); // UBAH DISINI
$pdf->Cell($colWidth4, 2.0, '', 'LBR', 1, 'C'); // UBAH DISINI

// Menempatkan teks di bagian bawah cell TTD
$y_ttd = $pdf->GetY();
$pdf->SetY($y_ttd - 0.5);
$pdf->Cell($colWidth4, 0.4, 'Nama / TTD', 0, 0, 'C'); // UBAH DISINI
$pdf->Cell($colWidth4, 0.4, 'Nama / TTD / Cap / Tlp', 0, 0, 'C'); // UBAH DISINI
$pdf->Cell($colWidth4, 0.4, $this->app_model->find_nama_admin($d->user_id), 0, 1, 'C'); // UBAH DISINI


$pdf->Output($d->resi . '.pdf', 'I');
?>