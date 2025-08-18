<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='L', $unit='cm', $size='A4') {
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
        $this->Ln(0.5);
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

$pdf = new Pdf();
$pdf->SetMargins(0.8, 0.6, 0.8);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLineWidth(0.02);

// Data preparation
$d = $rs[0];

// Logo
$logoPath = FCPATH . 'assets/images/logo-sancargo.png';
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, 1.0, 0.6, 4.0);
}

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
if (file_exists($barcodePath)) {
    $pdf->Image($barcodePath, 24.0, 0.6, 4.0);
}

// QR Code URL Preparation
$qrData = "https://tripcargoid.com/web/cari?k=" . $d->resi;
$qrApiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrData);

// === Header Table ===
$pdf->SetFont('Helvetica', 'B', 7);
// PERUBAHAN DI SINI: Memberi jarak lebih dari header
$pdf->SetXY(1.0, 2.8);
$pdf->Cell(7.0, 0.4, 'ASAL', 'LTR', 0, 'C');
$pdf->Cell(7.0, 0.4, 'TUJUAN', 'LTR', 0, 'C');
$pdf->Cell(7.0, 0.4, 'NO. TRANSAKSI', 'LTR', 0, 'C');
$pdf->Cell(7.0, 0.4, 'SERVICE', 'LTR', 1, 'C');

$pdf->SetX(1.0);
$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(7.0, 0.4, substr($d->resi, 0, 3), 'LBR', 0, 'C');
$pdf->Cell(7.0, 0.4, $this->app_model->find_kokab($d->kokab_id), 'LBR', 0, 'C');
$pdf->Cell(7.0, 0.4, $this->app_model->find_id_admin($d->user_id) . "-$d->id", 'LBR', 0, 'C');
$pdf->Cell(7.0, 0.4, $d->layan, 'LBR', 1, 'C');
$pdf->Ln(0.5);

// === Informasi Asal & Biaya ===
$y1 = $pdf->GetY();
$x1 = $pdf->GetX();

// Kolom Kiri: Alamat Asal
$pdf->SetFont('Helvetica', '', 6);
$asalText = $d->alamat_pel ?: 'Jl. Kp. Parung Serab No. 33 F Rt.5 / 3 Tirtajaya, Sukmajaya, Depok';
$pdf->MultiCell(7.0, 0.3, $asalText, 0, 'C');
$y_after_multicell = $pdf->GetY();
$pdf->SetX($x1);
$pdf->Cell(7.0, 0.3, "CSO. " . ($d->telp_p ?: '0881080899678') . " - tripcargo.test", 0, 1, 'C');
$h1 = $pdf->GetY() - $y1;
$pdf->Rect($x1, $y1, 7.0, $h1);

// Kolom Kanan: Detail Biaya
$pdf->SetY($y1);
$pdf->SetX($x1 + 7.0);

$pdf->SetFont('Helvetica', 'B', 6);
$pdf->Cell(7.0, 0.3, 'Jml (Colly)', 'LTR', 0, 'C');
$pdf->Cell(7.0, 0.3, 'Ukuran (Kgs / m3)', 'LTR', 0, 'C');
$pdf->Cell(7.0, 0.3, 'Biaya Kirim', 'LTR', 1, 'C');

$pdf->SetX($x1 + 7.0);
$pdf->SetFont('Helvetica', '', 6);
$pdf->Cell(7.0, 0.3, $d->koli . ' Pcs', 'LBR', 0, 'C');
$pdf->Cell(7.0, 0.3, $d->berat . ' Kg', 'LBR', 0, 'C');
$pdf->Cell(7.0, 0.3, 'Rp ' . number_format($d->harga2, 0), 'LBR', 1, 'C');
$h2 = $pdf->GetY() - $y1;

// Set Y ke posisi terendah dari kedua kolom
$pdf->SetY(max($y1 + $h1, $y1 + $h2));
$pdf->Ln(0.5);

// === Informasi Penerima dan Pengirim ===
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(14.0, 0.4, 'PENERIMA:', 'LTR', 0, 'L');
$pdf->Cell(14.0, 0.4, 'PENGIRIM:', 'LTR', 1, 'L');

$pdf->SetFont('Helvetica', '', 6);
$lineHeight = 0.35;

// Siapkan data teks
$penerima = $d->penerima . "\n" . ($d->dept2 ?: '-') . "\n" . $d->alamat . "\n" .
    $this->app_model->find_kec($d->kec_id) . ", " . $this->app_model->find_kokab($d->kokab_id) . ", " .
    $this->app_model->find_prov($d->prov_id) . "\nTlp. " . ($d->telp ?: '-');

if ($d->p_nama == null) {
    $nama = $this->app_model->find_nama_pel($d->pel_id); $dept = $this->app_model->find_dept_pel($d->pel_id); $telp = $this->app_model->find_telp_pel($d->pel_id); $alamat = $d->alamat_pel; $kec = $this->app_model->find_kec($d->kec); $kokab = $this->app_model->find_kokab($d->kokab); $prov = $this->app_model->find_prov($d->prov);
} else {
    $nama = $d->p_nama; $dept = $d->p_dept; $telp = $d->p_telp; $alamat = $d->p_alamat; $kec = $this->app_model->find_kec($d->p_kec_id); $kokab = $this->app_model->find_kokab($d->p_kokab_id); $prov = $this->app_model->find_prov($d->p_prov_id);
}
$pengirim = $nama . "\n" . ($dept ?: '-') . "\n" . $alamat . "\n" . $kec . ", " . $kokab . ", " . $prov . "\nTlp. " . ($telp ?: '-');

// Hitung tinggi yang dibutuhkan
$nb_penerima = $pdf->NbLines(13.5, $penerima);
$nb_pengirim = $pdf->NbLines(13.5, $pengirim);
$maxLines = max($nb_penerima, $nb_pengirim);
$cellHeight = $maxLines * $lineHeight + 0.2;

// Simpan posisi awal
$x = $pdf->GetX();
$y = $pdf->GetY();

// Tulis teks tanpa border
$pdf->MultiCell(14.0, $lineHeight, $penerima, 0, 'L');
$pdf->SetXY($x + 14.0, $y);
$pdf->MultiCell(14.0, $lineHeight, $pengirim, 0, 'L');

// Gambar border luar dan garis tengah
$pdf->Rect($x, $y - 0.4, 28.0, $cellHeight + 0.4);
$pdf->Line($x + 14.0, $y - 0.4, $x + 14.0, $y + $cellHeight);

$pdf->SetY($y + $cellHeight);
$pdf->Ln(0.5);

// === Biaya Tambahan dan QR Code ===
$y_biaya = $pdf->GetY();
$pdf->Image($qrApiUrl, 1.0, $y_biaya, 2.5, 2.5, 'PNG');

$pdf->SetFont('Helvetica', 'B', 6);
$pdf->SetX(15.0);
$pdf->Cell(4.0, 0.35, 'Biaya Penerus', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.35, $this->app_model->ceklist_harga($d->harga1), 'TR', 0, 'C');
$pdf->Cell(4.0, 0.35, 'Rp ' . number_format($d->harga1, 0), 'TR', 1, 'R');
$pdf->SetX(15.0);
$pdf->Cell(4.0, 0.35, 'Biaya Tambahan', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.35, $this->app_model->ceklist_harga($d->harga3), 'TR', 0, 'C');
$pdf->Cell(4.0, 0.35, 'Rp ' . number_format($d->harga3, 0), 'TR', 1, 'R');
$pdf->SetX(15.0);
$pdf->Cell(4.0, 0.35, 'Asuransi', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.35, $this->app_model->ceklist_harga($d->harga4), 'TR', 0, 'C');
$pdf->Cell(4.0, 0.35, 'Rp ' . number_format($d->harga4, 0), 'TR', 1, 'R');
$pdf->SetX(15.0);
$pdf->Cell(4.0, 0.35, 'Packaging', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.35, $this->app_model->ceklist_harga($d->harga5), 'TR', 0, 'C');
$pdf->Cell(4.0, 0.35, 'Rp ' . number_format($d->harga5, 0), 'TR', 1, 'R');
$pdf->SetX(15.0);
$pdf->Cell(4.0, 0.35, 'Diskon', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.35, $this->app_model->ceklist_harga($d->diskon), 'TR', 0, 'C');
$pdf->Cell(4.0, 0.35, $d->diskon . '%', 'TR', 1, 'R');
$pdf->SetX(15.0);
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(5.0, 0.4, 'Jumlah', 'LTBR', 0, 'L');
$pdf->Cell(4.0, 0.4, 'Rp ' . number_format($d->totalbayar, 0), 'TBR', 1, 'R');

$pdf->SetY($y_biaya + 2.8);

// === Catatan dan Deskripsi ===
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(14.0, 0.4, 'CATATAN:', 'LTR', 0, 'L');
$pdf->Cell(14.0, 0.4, 'DESKRIPSI:', 'LTR', 1, 'L');

$pdf->SetFont('Helvetica', '', 6);
$catatan = $d->catatan ?: 'Tidak ada catatan';
$deskripsi = $d->deskripsi ?: 'Tidak ada deskripsi';

// Hitung tinggi yang dibutuhkan
$nb_catatan = $pdf->NbLines(13.5, $catatan);
$nb_deskripsi = $pdf->NbLines(13.5, $deskripsi);
$maxLines = max($nb_catatan, $nb_deskripsi, 1);
$cellHeight = $maxLines * $lineHeight + 0.2;

// Simpan posisi awal
$x = $pdf->GetX();
$y = $pdf->GetY();

// Tulis teks tanpa border
$pdf->MultiCell(14.0, $lineHeight, $catatan, 0, 'L');
$pdf->SetXY($x + 14.0, $y);
$pdf->MultiCell(14.0, $lineHeight, $deskripsi, 0, 'L');

// Gambar border luar dan garis tengah
$pdf->Rect($x, $y - 0.4, 28.0, $cellHeight + 0.4);
$pdf->Line($x + 14.0, $y - 0.4, $x + 14.0, $y + $cellHeight);

$pdf->SetY($y + $cellHeight);
$pdf->Ln(0.5);

// === Volume dan Terbilang ===
$vol = ($d->p && $d->l && $d->t) ? $d->p . 'x' . $d->l . 'x' . $d->t . ' (cm)' : '-';
$pdf->SetFont('Helvetica', '', 6);
$pdf->Cell(14.0, 0.4, 'VOLUME: ' . $vol, 1, 0, 'L');
$pdf->Cell(14.0, 0.4, 'TERBILANG: ' . ucwords(strtolower($this->app_model->bilang($d->totalbayar) . ' rupiah')), 1, 1, 'L');
$pdf->Ln(0.5);

// === Tanda Tangan ===
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(9.3, 0.4, 'Pengirim', 1, 0, 'C');
$pdf->Cell(9.3, 0.4, 'Diterima Oleh', 1, 0, 'C');
$pdf->Cell(9.4, 0.4, 'Operator', 1, 1, 'C');

$pdf->SetFont('Helvetica', '', 6);
$pdf->Cell(9.3, 2.0, '', 'LBR', 0, 'C');
$pdf->Cell(9.3, 2.0, '', 'LBR', 0, 'C');
$pdf->Cell(9.4, 2.0, '', 'LBR', 1, 'C');

// Menempatkan teks di bagian bawah cell TTD
$y_ttd = $pdf->GetY();
$pdf->SetY($y_ttd - 0.5);
$pdf->Cell(9.3, 0.4, 'Nama / TTD', 0, 0, 'C');
$pdf->Cell(9.3, 0.4, 'Nama / TTD / Cap / Tlp', 0, 0, 'C');
$pdf->Cell(9.4, 0.4, $this->app_model->find_nama_admin($d->user_id), 0, 1, 'C');


$pdf->Output($d->resi . '.pdf', 'I');
?>