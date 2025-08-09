<?php
$this->load->view("inc/head_cetak.php");
?>
<link href="<?php echo base_url().'assets/css/invoice.min.css';?>" rel="stylesheet">	
	<style>
div.a {
        text-align: right;
}
</style>
<div class="a">
	<span id="judul"></span> 
	<?php
	echo"<img src='".base_url()."assets/images/logo.jpeg' width='210' height='50px'>";
	?>

	</div>
<style="text-align: font-size: 8px; justify; text-indent: 0.1in;"><B>PAKING LIST</B> </style><br>
<style="text-align: font-size: 8px; justify; text-indent: 0.1in;"><B>Tanggal  :</B>  <?php echo $tgl1.'  s.d. '.$tgl2;  ?>  </style><br>
<style="text-align: font-size: 8px; justify; text-indent: 0.1in;"><B>User ID:</B> <?php echo"";
	$user=$this->session->userdata('username');
	$nama=$this->app_model->find_nama_admin($user);
	echo "".$nama."";?> </style><br>
<style="text-align: font-size: 8px; justify; text-indent: 0.5in;"><?php echo" <B> Area     : </B> ".$area; ?> </style>


	</table>
		<table class="table table-hover " style="width:100%; font-size: 1.0em; border:0px;">
	<thead>
		
		<tr>
			<th style="width:auto;">NO</th>
			<th style="width:auto">RESI</th>
			<th style="width:auto;">Tanggal</th>
			<th style="width:auto;text-align: left;" >Service</th>
			<th style="width:auto;text-align: left;" >PENGIRIM</th>
			<th style="width:auto;text-align: left;" >PENERIMA</th>
			<th style="width:auto;text-align: left;" >TUJUAN</th>
			<th style="width:auto;text-align: left;" >Pembayaran</th>
			<th style="width:auto;">Koli</th>
			<th style="width:auto;">Berat</th>
			<th style="width:auto;">Asuransi</th>
			<th style="width:auto;">Packaging</th>
			<th style="width:auto;">Diskon</th>
			<th style="width:auto; text-align: right;">JUMLAH</th>
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
					<td align='center'>".$no."</td>
					<td align='center'>".$k->resi."</td>
					<td align='center'>".$this->app_model->tgl_str($k->tglkirim)."</td>";
			echo"	<td align='left'>".$k->layan."</td>";
			echo"	<td align='left'>".$this->app_model->find_pel($k->pel_id)."</td>";
		    echo"	<td align='left'>".$k->penerima."</td>";
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
			<td colspan="6" align="right"><B>TOTAL</B></td>
			<td align="right">
				<?php 
				echo"<td align='Center'>".number_format($tkoli,0);
				echo"<td align='Center'>".number_format($tberat,0);
				echo"<td align='Center'>".number_format($tharga4,0);
				echo"<td align='Center'>".number_format($tharga5,0);
				echo"<td align='Center'>".number_format($tdiskon,0).'%';
				echo"<td align='right'>".number_format($tt,0);
				?>
			</td>
			
		</tr>
		<br/><br/>
	</table><br/>
<?php	
echo"<div id=ttd>";
	echo "$area, ". date("d F Y")."<br/>";
	echo"Agent<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	$user=$this->session->userdata('username');
	$nama=$this->app_model->find_nama_admin($user);
	echo "<strong><u>".$nama."</u></strong>";
	echo"</div>";
?>

<?php echo"<div id=Total>";
                echo"<td align='right'>Total Resi:&nbsp;"             .number_format($no++ - 1)."<br/>";
				echo"<td align='right'>Total Koli:&nbsp;"             .number_format($tkoli,0)."<br/>";
				echo"<td align='right'>Total Berat:&nbsp;"            .number_format($tberat,0)."<br/>";
				echo"<td align='right'>Total Asuransi:&nbsp;"         .number_format($tharga4,0)."<br/>";
				echo"<td align='right'>Total Packaing:&nbsp;"         .number_format($tharga5,0)."<br/>";
				//echo"<td align='right'>Total Biaya kirim:&nbsp;"      .number_format($tharga2,0)."<br/>";
				//echo"<td align='right'>Total Biaya DFOD/COD:&nbsp;"   .number_format($tharga1,0)."<br/>";
				//echo"<td align='right'>Total Biaya Prioritas:&nbsp;"  .number_format($tharga3,0)."<br/>";
				echo"<td align='right'>Total Diskon:&nbsp;"           .number_format($tdiskon,0).'%'."<br/>";
				echo"<strong><td align='right'>GRAND TOTAL:&nbsp;"    .number_format($tt,0)."</strong>";
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
	line-height:8px;
}
thead, th{
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