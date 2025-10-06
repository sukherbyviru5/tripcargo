<?php
$this->load->view("inc/head_cetak.php");
?>
<link href="<?php echo base_url().'assets/css/invoice.min.css';?>" rel="stylesheet">    
<span id="judul">MANIFEST &nbsp;</span><br/><br/><br/>
<?php 
// Use the first header from $rs for the header section
$head = !empty($rs) ? $rs[0] : new stdClass(); 
?>
<?php
echo "<div id='kanan'>";
echo "<i>".$judul."</i><br/>";
echo "<i class='judul2'>".$nama_perusahaan."</i><br/>";
echo "<i>".$alamat_perusahaan."</i><br/>";
echo "<i>".$telp_perusahaan."</i><br/>";
echo "</div>";
echo "<div id='kanan2'>";
echo "<img src='".base_url()."assets/images/logo-sancargo.png' width='210' height='50px'>";
echo "</div>";
?>
<br/><br/><br/>

<?php
echo "<table width='100%' class='table table-hover'>";
echo "<tr><td>";
echo "<div id='Tgl'>";

if (!empty($start_date) && !empty($end_date)) {
    echo "Tgl. " . $this->app_model->tgl_str($start_date) . " / " . $this->app_model->tgl_str($end_date);
} elseif (!empty($start_date)) {
    echo "Tgl. " . $this->app_model->tgl_str($start_date);
} elseif (!empty($end_date)) {
    echo "Tgl. " . $this->app_model->tgl_str($end_date);
} else {
    echo "Tgl. Semua";
}

echo "</div>";
echo "<div id='Nom'>";
echo ($area ?? '');
echo "</div>";
echo "</td></tr>";
echo "</table>";
?>

<style>
table {
    border-color: #ccc #ccc #ccc #ccc;
    border-top: #ccc;
}
td p {
    line-height: 8px;
}
thead, th {
    text-align: center;
    vertical-align: middle;
}
#judul {
    font-size: 26px; 
    text-shadow: 4px 4px 4px #ccc;
    -webkit-text-fill-color: #232323;
    -webkit-text-stroke: 2px purple;
    padding-top: 2px;
    float: right;
}
.judul2 {
    font-size: 20px; 
    text-shadow: 0px 0px 0px #00000;
    -webkit-text-fill-color: #00000;
    -webkit-text-stroke: 2px #00000;
    padding-top: 2px;
}
#Tgl, #Tujuan, #Nom, #ttd {
    text-align: center;
    font-family: "Trebuchet MS";
    font-size: 13px;
    float: right;
    padding-right: 10px;
    padding-bottom: 10px;
    width: 200px;
    border: 0px solid;
}
#kanan {
    text-align: right;
    font-family: "Trebuchet MS";
    font-size: 13px;
    float: right;
    padding-right: 10px;
    padding-bottom: 10px;
}
#kanan2 {
    text-align: right;
    font-family: "Trebuchet MS";
    font-size: 13px;
    float: left;
    padding-right: 10px;
    padding-bottom: 10px;
}
#kotak {
    text-align: left;
    font-family: "Trebuchet MS";
    font-size: 13px;
    float: right;
    height: 130px;
    width: 300px;
    padding-right: 10px;
    padding-bottom: 10px;
    border: 0px solid;
}
</style>

<br/><br/>

<table class='table table-striped table-bordered table-hover'>
<thead>
    <tr>
        <th style="width:50px;">NO</th>
        <th>TANGGAL</th>
        <th>NO MANIFAST</th>
        <th>DRIVER</th>
        <th>TLP DRIVER</th>
        <th>TUJUAN</th>
        <th>REMAKE</th>
        <th>SORTIR</th>
        <th>RESI</th>
        <th>AREA</th>
        <th>BERAT</th>
        <th>KOLI</th>
    </tr>
</thead>
<tbody>
<?php
$no = 1;
foreach ($rs as $k) {
    foreach ($k->detail as $detail) {
        echo "<tr>";
        echo "<td align='center'>".$no."</td>";
        echo "<td>".$this->app_model->tgl_str($k->tgl ?? '')."</td>";
        echo "<td>".$k->nom."</td>";
        echo "<td>".$k->driver."</td>";
        echo "<td>".$k->tlpdriver."</td>";
        echo "<td>".$k->tujuan."</td>";
        echo "<td>".$k->remake."</td>";
        echo "<td>".$k->sortir."</td>";
        echo "<td>".$detail->resi."</td>";
        echo "<td>".$detail->area_paket."</td>";
        echo "<td>".$detail->berat."</td>";
        echo "<td>".$detail->koli."</td>";
        echo "</tr>";
        $no++;
    }
}
?>
</tbody>
</table>

<script>
    window.print()
</script>