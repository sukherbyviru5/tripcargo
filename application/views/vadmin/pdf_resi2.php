<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='P', $unit='cm', $size='A4') {
        parent::__construct($orientation, $unit, $size);
    }

    // Helper function to calculate number of lines
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
        $this->SetFont('Helvetica', 'B', 10);
        $w = $this->GetStringWidth($title . ' Surat Tanda Terima Barang (e-STT)') + 2;
        $this->SetX(($this->w - $w) / 2);
        $this->Cell($w, 0.5, $title . ' Surat Tanda Terima Barang (e-STT)', 0, 1, 'C');
        $this->Ln(0.6);
    }

    function Footer() {
        $this->SetTextColor(100, 100, 100);
        $this->SetY(-1.0);
        $this->SetFont('Helvetica', '', 7);
        $this->Cell(0, 0.3, 'Cetak (e-STT): ' . date('d/m/Y H:i'), 0, 0, 'L');
        $this->Cell(0, 0.3, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }
}

/* Setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

$pdf = new Pdf();
$pdf->SetMargins(1.0, 0.8, 1.0);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetLineWidth(0.01);

// Data preparation
$d = $rs[0];

// Logo
$logoPath = FCPATH . 'assets/images/logo-sancargo.png';
if (file_exists($logoPath)) {
    $pdf->Image($logoPath, 1.2, 0.8, 4.5);
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
    $pdf->Image($barcodePath, 14.5, 0.8, 4.5);
}

// QR Code URL Preparation (Gambar akan dicetak nanti)
$qrData = "https://tripcargoid.com/web/cari?k=" . $d->resi;
$qrApiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrData);

// Header Table
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->SetXY(1.0, 2.8);
$pdf->Cell(5.0, 0.5, 'ASAL', 'LTR', 0, 'C');
$pdf->Cell(5.0, 0.5, 'TUJUAN', 'LTR', 0, 'C');
$pdf->Cell(4.0, 0.5, 'NO. TRANSAKSI', 'LTR', 0, 'C');
$pdf->Cell(4.0, 0.5, 'SERVICE', 'LTR', 1, 'C'); // Use 1 for Ln

$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(5.0, 0.5, substr($d->resi, 0, 3), 'LBR', 0, 'C');
$pdf->Cell(5.0, 0.5, $this->app_model->find_kokab($d->kokab_id), 'LBR', 0, 'C');
$pdf->Cell(4.0, 0.5, $this->app_model->find_id_admin($d->user_id) . "-$d->id", 'LBR', 0, 'C');
$pdf->Cell(4.0, 0.5, $d->layan, 'LBR', 1, 'C'); // Use 1 for Ln
$pdf->Ln(0.4);

// Informasi Asal (Improved Layout)
$pdf->SetFont('Helvetica', '', 7);
$asalText = $d->alamat_pel ?: 'Jl. Kp. Parung Serab No. 33 F Rt.5 / 3 Tirtajaya, Sukmajaya, Depok';
$y1 = $pdf->GetY();
$pdf->MultiCell(5.0, 0.4, $asalText, 'LTR', 'C');
$pdf->SetXY(1.0, $pdf->GetY());
$pdf->Cell(5.0, 0.4, "CSO. " . ($d->telp_p ?: '0881080899678') . " - tripcargo.test", 'LBR', 1, 'C');

$pdf->SetXY(6.0, $y1); // Align to the top of the multicell
$pdf->Cell(5.0, 0.4, 'Jml (Colly)', 'LTR', 0, 'C');
$pdf->Cell(4.0, 0.4, 'Ukuran (Kgs / m3)', 'LTR', 0, 'C');
$pdf->Cell(4.0, 0.4, 'Biaya Kirim', 'LTR', 1, 'C');

$pdf->SetX(6.0);
$pdf->Cell(5.0, 0.4, $d->koli . ' Pcs', 'LBR', 0, 'C');
$pdf->Cell(4.0, 0.4, $d->berat . ' Kg', 'LBR', 0, 'C');
$pdf->Cell(4.0, 0.4, 'Rp ' . number_format($d->harga2, 0), 'LBR', 1, 'C');
$pdf->Ln(0.4);

// Informasi Penerima dan Pengirim (FIXED)
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(9.5, 0.5, 'PENERIMA:', 'LTR', 0, 'L');
$pdf->Cell(9.5, 0.5, 'PENGIRIM:', 'LTR', 1, 'L');

$pdf->SetFont('Helvetica', '', 7);
$lineHeight = 0.4; // Define consistent line height

$penerima = $d->penerima . "\n" . ($d->dept2 ?: '-') . "\n" . $d->alamat . "\n" .
    $this->app_model->find_kec($d->kec_id) . ", " . $this->app_model->find_kokab($d->kokab_id) . ", " .
    $this->app_model->find_prov($d->prov_id) . "\nTlp. " . ($d->telp ?: '-');

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
$pengirim = $nama . "\n" . ($dept ?: '-') . "\n" . $alamat . "\n" . $kec . ", " . $kokab . ", " . $prov . "\nTlp. " . ($telp ?: '-');

// Calculate max height needed
$nb_penerima = $pdf->NbLines(9.5, $penerima);
$nb_pengirim = $pdf->NbLines(9.5, $pengirim);
$maxLines = max($nb_penerima, $nb_pengirim);
$cellHeight = $maxLines * $lineHeight;

// Store current position
$x = $pdf->GetX();
$y = $pdf->GetY();

// Draw MultiCells with calculated height
$pdf->MultiCell(9.5, $lineHeight, $penerima, 'LBR', 'L');
$pdf->SetXY($x + 9.5, $y); // Move to the start of the next column
$pdf->MultiCell(9.5, $lineHeight, $pengirim, 'LBR', 'L');

// Ensure the borders are the same height
$pdf->Rect($x, $y, 9.5, $cellHeight);
$pdf->Rect($x + 9.5, $y, 9.5, $cellHeight);

// Move cursor to the bottom of the tallest cell
$pdf->SetY($y + $cellHeight);
$pdf->Ln(0.4);

// ========= BLOK MODIFIKASI DIMULAI DI SINI =========

// Biaya Tambahan dan QR Code
$y_biaya = $pdf->GetY();

// 1. GAMBAR QR CODE DI SISI KIRI
// Posisi X = 1.2 (sedikit dari margin kiri), Posisi Y = $y_biaya, Ukuran = 2.5 x 2.5 cm
$pdf->Image($qrApiUrl, 1.2, $y_biaya, 2.5, 2.5, 'PNG');

// 2. GAMBAR TABEL BIAYA DI SISI KANAN
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->SetX(10.5); // Pindah ke kolom kanan
$pdf->Cell(3.0, 0.4, 'Biaya Penerus', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.4, $this->app_model->ceklist_harga($d->harga1), 'TR', 0, 'C');
$pdf->Cell(4.5, 0.4, 'Rp ' . number_format($d->harga1, 0), 'TR', 1, 'R');
$pdf->SetX(10.5);
$pdf->Cell(3.0, 0.4, 'Biaya Tambahan', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.4, $this->app_model->ceklist_harga($d->harga3), 'TR', 0, 'C');
$pdf->Cell(4.5, 0.4, 'Rp ' . number_format($d->harga3, 0), 'TR', 1, 'R');
$pdf->SetX(10.5);
$pdf->Cell(3.0, 0.4, 'Asuransi', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.4, $this->app_model->ceklist_harga($d->harga4), 'TR', 0, 'C');
$pdf->Cell(4.5, 0.4, 'Rp ' . number_format($d->harga4, 0), 'TR', 1, 'R');
$pdf->SetX(10.5);
$pdf->Cell(3.0, 0.4, 'Packaging', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.4, $this->app_model->ceklist_harga($d->harga5), 'TR', 0, 'C');
$pdf->Cell(4.5, 0.4, 'Rp ' . number_format($d->harga5, 0), 'TR', 1, 'R');
$pdf->SetX(10.5);
$pdf->Cell(3.0, 0.4, 'Diskon', 'LTR', 0, 'L');
$pdf->Cell(1.0, 0.4, $this->app_model->ceklist_harga($d->diskon), 'TR', 0, 'C');
$pdf->Cell(4.5, 0.4, $d->diskon . '%', 'TR', 1, 'R');
$pdf->SetX(10.5);
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(4.0, 0.5, 'Jumlah', 'LTBR', 0, 'L');
$pdf->Cell(4.5, 0.5, 'Rp ' . number_format($d->totalbayar, 0), 'TBR', 1, 'R');

// 3. PINDAHKAN KURSOR KE BAWAH BLOK INI
// Pindah ke posisi Y awal + tinggi elemen (2.5 cm) + sedikit spasi (0.2 cm)
$pdf->SetY($y_biaya + 2.7);
$pdf->Ln(0.1);

// ========= BLOK MODIFIKASI SELESAI =========


// Catatan dan Deskripsi (FIXED)
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(9.5, 0.5, 'CATATAN:', 'LTR', 0, 'L');
$pdf->Cell(9.5, 0.5, 'DESKRIPSI:', 'LTR', 1, 'L');

$pdf->SetFont('Helvetica', '', 7);
$catatan = $d->catatan ?: 'Tidak ada catatan';
$deskripsi = $d->deskripsi ?: 'Tidak ada deskripsi';

// Calculate max height needed
$nb_catatan = $pdf->NbLines(9.5, $catatan);
$nb_deskripsi = $pdf->NbLines(9.5, $deskripsi);
$maxLines = max($nb_catatan, $nb_deskripsi);
$cellHeight = $maxLines * $lineHeight;

// Store current position
$x = $pdf->GetX();
$y = $pdf->GetY();

// Draw MultiCells
$pdf->MultiCell(9.5, $lineHeight, $catatan, 0, 'L');
$pdf->SetXY($x + 9.5, $y);
$pdf->MultiCell(9.5, $lineHeight, $deskripsi, 0, 'L');

// Draw borders to match height
$pdf->Rect($x, $y, 9.5, $cellHeight);
$pdf->Rect($x + 9.5, $y, 9.5, $cellHeight);

// Move cursor to the bottom
$pdf->SetY($y + $cellHeight);
$pdf->Ln(0.4);

// Volume dan Terbilang
$vol = ($d->p && $d->l && $d->t) ? $d->p . 'x' . $d->l . 'x' . $d->t . ' (cm)' : '-';
$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(9.5, 0.5, 'VOLUME: ' . $vol, 'LBR', 0, 'L');
$pdf->Cell(9.5, 0.5, 'TERBILANG: ' . ucwords(strtolower($this->app_model->bilang($d->totalbayar) . ' rupiah')), 'LBR', 1, 'L');
$pdf->Ln(0.4);

// Tanda Tangan
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(6.3, 0.5, 'Pengirim', 'LTR', 0, 'C');
$pdf->Cell(6.4, 0.5, 'Diterima Oleh', 'LTR', 0, 'C');
$pdf->Cell(6.3, 0.5, 'Operator', 'LTR', 1, 'C');

$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(6.3, 2, 'Nama / TTD', 'LBR', 0, 'C'); // Increased height for signature
$pdf->Cell(6.4, 2, 'Nama / TTD / Cap / Tlp', 'LBR', 0, 'C'); // Increased height for signature
$pdf->Cell(6.3, 2, $this->app_model->find_nama_admin($d->user_id), 'LBR', 1, 'C');

$pdf->Output($d->resi . '.pdf', 'I');
?>