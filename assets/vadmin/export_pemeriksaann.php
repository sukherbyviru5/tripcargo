<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
$tgl=$this->uri->segment(5);
header("Content-Disposition: attachment; filename=Pemeriksaan_".$tgl.".xls");
// Tambahkan table
include 'exc_export_pemeriksaann.php';
?>