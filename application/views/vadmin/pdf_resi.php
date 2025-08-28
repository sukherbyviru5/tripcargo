<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends FPDF {
    function __construct($orientation='P', $unit='cm', $size='A4') {
        parent::__construct($orientation, $unit, $size);
    }

    function Header() {
        global $title;
        $this->SetTextColor(100, 100, 100);
        $this->SetFont('Helvetica', 'B', 10);
        $w = $this->GetStringWidth($title . 'Surat Tanda Terima Barang (e-STT)') + 2; // Added padding for better centering
        $this->SetX(($this->w - $w) / 2);
        $this->Cell($w, 0.5, $title . 'Surat Tanda Terima Barang (e-STT)', 0, 1, 'C');
        $this->Ln(0.8); // Increased spacing below header from 0.5 to 0.8
    }

    function Footer() {
        $this->SetTextColor(100, 100, 100);
        $this->SetY(-1.2);
        $this->SetFont('Helvetica', '', 8);
        $this->Cell(0, 0.4, 'Cetak (e-STT): ' . date('d/m/Y H:i'), 0, 0, 'L');
        $this->Cell(0, 0.4, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }
}

$available_width = 19.4;

/* Setting zona waktu */
date_default_timezone_set('Asia/Jakarta');

$pdf = new Pdf();
$pdf->SetMargins(1.0, 0.8, 1.0); // Margin kiri, atas, kanan
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
$pdf->Image($logoPath, 1.2, 0.8, 5);

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
$qrData = "https://tripcargoid.com/web/cari?k=" . $d->resi;
$qrApiUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qrData);
$pdf->Image($qrApiUrl, 18.5, 0.8, 1.5, 0, 'PNG');
$pdf->Ln(0.8); // Maintain spacing below for consistency


// === Add $d->alamat_pel Above ASAL Box ===
$pdf->SetFont('Helvetica', '', 6);
$pdf->SetXY(1.0, 2.5);
$pdf->MultiCell($available_width, 0.3, $alamat_pertama ?: 'No address provided', 0, 'L');
$pdf->Ln(0.2);

// Header Table
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->SetXY(1.0, 3.0); // Adjusted Y position for extra spacing below header
$pdf->Cell(6.5, 0.5, 'ASAL', 'LTR', 0, 'C');
$pdf->Cell(6.5, 0.5, 'TUJUAN', 'LTR', 0, 'C');
$pdf->Cell(3.0, 0.5, 'NO. TRANSAKSI', 'LTR', 0, 'C');
$pdf->Cell(3.0, 0.5, 'SERVICE', 'LTR', 0, 'C');
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(6.5, 0.5, substr($d->resi, 0, 3), 'LBR', 0, 'C');
$pdf->Cell(6.5, 0.5, $this->app_model->find_kokab($d->kokab_id), 'LBR', 0, 'C');
$pdf->Cell(3.0, 0.5, $this->app_model->find_id_admin($d->user_id) . "-$d->id", 'LBR', 0, 'C');
$pdf->Cell(3.0, 0.5, $d->layan, 'LBR', 0, 'C');
$pdf->Ln(0.5);

// Informasi Asal
$pdf->SetFont('Helvetica', '', 7);
$asalText = $d->alamat_pel;
$asalTextWidth = $pdf->GetStringWidth($asalText);
if ($asalTextWidth > 6.3) { // Check if text exceeds cell width
    $asalText = substr($asalText, 0, 40) . '...'; // Truncate to fit within 6.3cm
}
$pdf->Cell(6.5, 0.4, $asalText, 'LTR', 0, 'C');
$pdf->Cell(6.5, 0.4, 'Jml (Colly)', 'LTR', 0, 'C');
$pdf->Cell(3.0, 0.4, 'Ukuran (Kgs / m3)', 'LTR', 0, 'C');
$pdf->Cell(3.0, 0.4, 'Biaya Kirim', 'LTR', 0, 'C');
$pdf->Ln();
$pdf->Cell(6.5, 0.4, "CSO. $d->telp_p - tripcargo.test", 'LBR', 0, 'C');
$pdf->Cell(6.5, 0.4, $d->koli . ' Pcs', 'LBR', 0, 'C');
$pdf->Cell(3.0, 0.4, $d->berat . ' Kg', 'LBR', 0, 'C');
$pdf->Cell(3.0, 0.4, 'Rp ' . number_format($d->harga2, 0), 'LBR', 0, 'C');
$pdf->Ln(0.5);

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
$pdf->Ln(0.5);

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
$pdf->Ln(0.5);

// Assuming A4 page width (210 mm) with default margins (e.g., 10 mm left + 10 mm right), usable width is ~190 mm
// Convert mm to cm for FPDF (1 cm = 10 mm), so full width is approximately 19 cm

// Volume dan Terbilang
$vol = ($d->p) ? $d->p . 'x' . $d->l . 'x' . $d->t . '(cm)' : '';
$pdf->Cell(9.5, 0.5, 'VOLUME: ' . $vol, 'TLBR', 0, 'L');
$pdf->Cell(9.5, 0.5, 'TERBILANG: ' . ucwords(strtolower($this->app_model->bilang($d->totalbayar) . ' rupiah')), 'TLBR', 1, 'L');
$pdf->Ln(0.5);

// Tanda Tangan
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->Cell(6.33, 0.5, 'Pengirim', 'LTR', 0, 'C'); // Divide 19 cm by 3 for equal columns (~6.33 cm each)
$pdf->Cell(6.33, 0.5, 'Diterima Oleh', 'LTR', 0, 'C');
$pdf->Cell(6.34, 0.5, 'Operator', 'LTR', 0, 'C'); // Slightly larger to account for rounding
$pdf->Ln();
$pdf->SetFont('Helvetica', '', 8);
$pdf->Cell(6.33, 0.5, 'Nama / TTD', 'LBR', 0, 'C');
$pdf->Cell(6.33, 0.5, 'Nama / TTD / Cap / Tlp', 'LBR', 0, 'C');
$pdf->Cell(6.34, 0.5, $this->app_model->find_nama_admin($d->user_id), 'LBR', 0, 'C');
$pdf->Ln(0.5);

// Syarat dan Ketentuan
$pdf->SetDrawColor(150, 150, 150);
$pdf->Line(1.0, $pdf->GetY(), 20.0, $pdf->GetY());
$pdf->Ln(0.3);
$pdf->SetFont('Helvetica', 'B', 8);
$pdf->SetTextColor(191, 0, 0);
$pdf->Cell(0, 0.5, 'SYARAT DAN PERATURAN PENGIRIMAN BARANG', 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Helvetica', '', 7);
$terms = [
    "Titipan dianggap sah bilamana pengirim sudah menandatangani dan menerima lembaran/bukti Surat Tanda Terima (STT) atau (e-STT).",
    "Apabila dalam kurun waktu 24 jam setelah (STT) ini dibuat tidak ada pembatalan maka dengan sendirinya dianggap pengirim telah menyetujui syarat-syarat/pedoman pengiriman yang dikeluarkan oleh perusahaan kami.",
    "Sistem pengiriman via darat, laut, dan udara (door to door).",
    "Pengirim maupun penerima bersama-sama bertanggung jawab terhadap semua biaya pengiriman sesuai perhitungan menurut tarif yang dikeluarkan perusahaan kami, dan bilamana tidak terpenuhi maka perusahaan berhak mengadakan penahanan.",
    "Isi barang tidak diperiksa, pengirim wajib mengasuransikan barang kirimannya terlebih dahulu. Bilamana terjadi kehilangan/kerusakan terhadap barang kiriman, perusahaan hanya mengganti rugi sesuai aturan pengiriman (Poin No. 16).",
    "Keselamatan barang kiriman akibat pengepakan yang tidak sempurna atau faktor cuaca sehingga menimbulkan kerusakan karena isi kiriman menjadi rusak, basah, dan hilang, sepenuhnya menjadi risiko pengirim dan penerima.",
    "Barang-barang yang bersifat pecah belah dan mudah retak seperti kaca, gelas, keramik, monitor, TV, radio, barang elektronik, fiberglass, bibit tanaman, tumbuh-tumbuhan, binatang hidup serta sejumlah spare-part mesin maupun kendaraan, jika terjadi kerusakan/kematian sepenuhnya menjadi tanggung jawab pengirim/penerima.",
    "Dilarang keras mengirim barang-barang terlarang oleh Pemerintah seperti narkoba/obat-obatan terlarang, bahan peledak, cairan/kimia yang dapat membahayakan keselamatan umum (Dangerous Goods) dan barang-barang berharga.",
    "Perusahaan melarang keras dan tidak menerima barang-barang kiriman yang bersifat cairan apapun via pesawat.",
    "Perusahaan tidak memberikan ganti rugi terhadap kiriman cairan dan kaca (via kapal laut), apabila terjadi kebocoran/tumpah dan pecah/retak sepenuhnya menjadi risiko pengirim dan penerima.",
    "Barang cairan harus dipetikan dan apabila terjadi kebocoran/tumpah sehingga menyebabkan kerusakan/kerugian terhadap pihak ketiga, maka pengirim berkewajiban untuk menyelesaikan secara baik.",
    "Perusahaan bertanggung jawab terhadap barang kiriman selama belum diserahkan kepada pihak penerima, terkecuali karena sesuatu hal yang menyebabkan kiriman ditahan oleh pihak berwajib, maka pengirim/penerima wajib menyelesaikan sendiri.",
    "Perusahaan tidak menjamin ketepatan waktu pengiriman atau penyerahan yang dikehendaki pengirim dan tidak menggantikan ganti rugi terhadap keterlambatan pengiriman.",
    "Perusahaan tidak memberi ganti rugi terhadap kerusakan/kehilangan akibat bencana alam, huru-hara, dan force majeure. Perusahaan akan mengganti rugi terhadap ketentuan-ketentuan yang berlaku.",
    "Pengajuan klaim secara tertulis selambat-lambatnya dalam kurun waktu 1 (satu) bulan setelah tanggal pengiriman yang tertera pada Surat Tanda Terima (STT), dengan dilampirkan bukti-bukti yang diperlukan dan surat berita acara atau rekomendasi dari kantor cabang/perwakilan setempat.",
    "Ganti rugi terhadap kehilangan barang kiriman secara total (lost total) adalah 10 (sepuluh) kali biaya pengiriman yang tertera dalam (STT) dan tidak bersifat faktur/nota pembelian atau maksimal 1.000.000,- (Satu Juta Rupiah).",
    "Pengajuan klaim setelah lebih dari 1 (satu) bulan dari tanggal pengiriman yang tertera di (STT) dianggap kedaluwarsa.",
    "Jadwal dan waktu pemberangkatan armada/kapal/pesawat sewaktu-waktu dapat berubah tanpa pemberitahuan terlebih dahulu.",
    "Penghitungan berdasarkan berat, volume, surcharge, dan kubikasi sesuai dengan keadaan barang kiriman.",
    "Tulis nomor telepon dan alamat yang jelas untuk mempercepat pengantaran."
];
foreach ($terms as $i => $term) {
    $pdf->Cell(0.7, 0.4, ($i + 1) . '.', '', 0, 'L');
    $pdf->MultiCell(18.3, 0.4, $term, '', 'L');
}

$pdf->Output($d->resi . '.pdf', 'I');
?>