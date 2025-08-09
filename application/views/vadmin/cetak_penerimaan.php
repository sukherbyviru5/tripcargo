<?php
$this->load->view("inc/head_cetak.php");
?>
<link href="<?php echo base_url().'assets/css/invoice.min.css';?>" rel="stylesheet">	
	<style>
div.a {
        text-align: center;
}
</style>
<div class="a">
	<span id="judul"></span> 
	<!---?php
	echo"<img src='".base_url()."assets/images/logo.jpeg' width='210' height='50px'>";
	?--->
	<br>
	<b>PT. INSAN CARGO DEPOK</b>
	<br> 
	tripcargo.test

	</div>
	
<div style="text-align: justify; text-indent: 0.5in;"><B>PAKING LIST HARIAN</B> </div>
<div style="text-align: justify; text-indent: 0.5in;"><B>Tanggal  :</B>  <?php echo $tgl1.'  s.d. '.$tgl2;  ?>  </div>
<div style="text-align: justify; text-indent: 0.5in;"><B>User Name:</B> <?php echo"";
	$user=$this->session->userdata('username');
	$nama=$this->app_model->find_nama_admin($user);
	echo "".$nama."";?> </div> 
<div style="text-align: justify; text-indent: 0.5in;"><?php echo" <B> Area     : </B> ".$area; ?> </div>


	</table>
		<table class="table table-hover  table-responsive-sm  table-condensed">
		<table class="table table-hover  table-responsive-sm  table-condensed">
	<thead>
		
		<tr>
			<th style="width:50px;text-align: left; " >NO</th>
			<th style="width:auto;text-align: left;" >RESI</th>
			<th style="width:auto;text-align: left;" >TGL</th>
			<th style="width:auto;text-align: left;" >SERVICE</th>
			<th style="width:auto;text-align: left;" >KOTA TUJUAN</th>
			<th style="width:auto;text-align: left;" >Bayar</th>
			<th  >Koli</th>
			<th  >Berat</th>
			<th  >Asuransi</th>
			<th  >Packing</th>
			<th  >Diskon</th>
			<th style="text-align: right;">JML</th>
		</tr>
		
	</thead>
	
		<?php
		$no=1;
		$tt=0;
		$tkoli=0;
		$tberat=0;
		$tharga4=0;
		$tharga5=0;
		$tdiskon=0;
		foreach($rs as $k){
			echo"<tr>
					<td align='left'>".$no."</td>
					<td align='left'>".$k->resi."</td>
					<td align='left'>".$this->app_model->tgl_str($k->tglkirim)."</td>";
			echo"	<td align='left'>".$k->layan."</td>";
			echo"	<td align='left'>".$this->app_model->find_kokab(substr($k->kec_id,0,4))." </td>";
			echo"	<td align='left'>".$k->metode."</td>";
			echo"	<td align='center'>".number_format($k->koli,0)."</td>";
			echo"	<td align='center'>".number_format($k->berat,0)."</td>";
			echo"	<td align='center'>".number_format($k->harga4,0)."</td>";
			echo"	<td align='center'>".number_format($k->harga5,0)."</td>";
			echo"	<td align='center'>".number_format($k->diskon,0)."</td>";
			echo"	<td align='right'>".number_format($k->totalbayar,0)."</td>";
			echo"</tr>";
			
			$no++;
			$tkoli=$tkoli+$k->koli;
			$tberat=$tberat+$k->berat;
			$tharga4=$tharga4+$k->harga4;
			$tharga5=$tharga5+$k->harga5;
			$tdiskon=$tdiskon+$k->diskon;
			$tt=$tt+$k->totalbayar;
			
	
		}
		
		?>
		
		<tr style="height:8px;">
			<td ></td>
			<td colspan="4" align="right"><B>TOTAL</B></td>
			<td align="right">
				<?php 
				echo"<td align='Center'>".number_format($tkoli,0);
				echo"<td align='Center'>".number_format($tberat,0);
				echo"<td align='Center'>".number_format($tharga4,0);
				echo"<td align='Center'>".number_format($tharga5,0);
				echo"<td align='Center'>".number_format($tdiskon,0);
				echo"<td align='right'>".number_format($tt,0);
				?>
			</td>
			
		</tr>
		<br/><br/>
	</table><br/>
<?php	
echo"<div id=ttd>";
	echo "$area, ". date("d F Y")."<br/>";
	echo"Hormat Kami<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	$user=$this->session->userdata('username');
	$nama=$this->app_model->find_nama_admin($user);
	echo "<strong><u>".$nama."</u></strong>";
	echo"</div>";
?>

<?php	
/*
echo"<div id=ttd>";
    echo"<br/>";
	echo"Colektor<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
		echo"________________________";
	
echo"</div>";
?>

<?php	
echo"<div id=ttd>";
    echo"<br/>";
	echo"Cashier<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"________________________";
	
echo"</div> "; */
?>
<style>
td p{
	line-height:8px; font-size: 9px;
}
thead, th{
    font-size: 9px
	text-align:center;
	vertical-align: middle;
}
#judul{
	font-size: 26px; 
		text-shadow: 4px 4px 4px #ccc;
		-webkit-text-fill-color: #232323;
		-webkit-text-stroke: 2px purple;
		padding-top:2px;
}
#ttd{
	text-align:center;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
}
</style>