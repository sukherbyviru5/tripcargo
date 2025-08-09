<table class="table table-hover " style="width:100%; font-size: 0.9em; border:0px;">
<div style="{text-align: right;font-size: 0.9em; border:0px;}"> 
<span id="judul" style="width:100%" font-size: "0.9em" border:"0px">&nbsp;INVOICE</span><br/></div>
<div style="{text-align: right;font-size: 0.9em; border:0px;}"> 
	&nbsp;&nbsp;<b>INSAN CARGO DEPOK</b><br/>
	&nbsp;&nbsp;Jl. Kedaung Tirta No. 34 Tirtajaya, Sukamajaya, Depok<br/>
	&nbsp;&nbsp;Tlp. 021 27612134<br/></div>
	<style>
div.a {
        text-align: right;
}
</style>
<div class="a" style="
    margin-top: -40px;
    margin-left: -75px;
">
	<span id="judul"></span> 
	<?php
	echo"<img src='".base_url()."assets/images/logo.jpeg' width:5% width='210' height='50px'>";
	?>

	</div>
	
	<tr>
			<td>&nbsp;&nbsp;Periode tgl: </td>
			<td> <?php echo $tgl1.' s.d.'.$tgl2;
				?>
			</td>
			
		</tr>

	<table class="table table-hover " style="width:100%; font-size: 0.9em; border:0px; margin-left: -15px;">
	<thead>
		
		<tr>
			<th style="width:20px;font-size: 0.9em; border:0px;" >NO</th>
			<th style="width:auto;font-size: 0.9em; border:0px;" >RESI</th>
			<th style="width:auto;font-size: 0.9em; border:0px;" >TANGGAL</th>
			<th style="width:auto;text-align: left;font-size: 0.9em; border:0px;" >SERVICE</th>
			<th style="width:autopx;text-align: left;font-size: 0.9em; border:0px;" >PENERIMA</th>
			<th style="width:auto;text-align: left;font-size: 0.9em; border:0px;" >KOTA TUJUAN</th>
			<th style="width:auto;text-align: left;font-size: 0.9em; border:0px;" >Pembayaran</th>
			<th style="width:Auto;font-size: 0.9em; border:0px;">Koli</th>
			<th style="width:Auto;font-size: 0.9em; border:0px;">Berat</th>
			<th style="width:Auto;font-size: 0.9em; border:0px;">Asuransi</th>
			<th style="width:Auto;font-size: 0.9em; border:0px;">Packaging</th>
			<th style="width:Auto;font-size: 0.9em; border:0px;">Ongkir</th>
			<th style="width:Auto;font-size: 0.9em; border:0px;">DFOD/COD</th>
			<th style="width:Auto;font-size: 0.9em; border:0px;">Prioritas</th>
			<th style="width:Auto;font-size: 0.9em; border:0px;">Diskon</th>
			<th style="width:Auto; text-align: right;font-size: 0.9em; border:0px;">JUMLAH </th>
		</tr>
		
	</thead>
	
		<?php
		$no=1;
		$tt=0;
		$tkoli=0;
		$tberat=0;
		$tharga4=0;
		$tharga5=0;
		$tharga2=0;
		$tharga1=0;
		$tharga3=0;
		$tdiskon=0;
		foreach($rs as $k){
			echo"<tr>
					<td align='center'>".$no."</td>
					<td align='center'>".$k->resi."</td>
					<td align='center'>".$this->app_model->tgl_str($k->tglkirim)."</td>";
			echo"	<td align='left'>".$k->layan."</td>";
			echo"	<td align='left'>".$k->penerima."</td>";
			echo"	<td align='left'>".$this->app_model->find_kokab(substr($k->kec_id,0,4))." </td>";
			echo"	<td align='left'>".$k->metode."</td>";
			echo"	<td align='center'>".number_format($k->koli,0)."</td>";
			echo"	<td align='center'>".number_format($k->berat,0)."</td>";
			echo"	<td align='center'>".number_format($k->harga4,0)."</td>";
			echo"	<td align='center'>".number_format($k->harga5,0)."</td>";
			echo"	<td align='center'>".number_format($k->harga2,0)."</td>";
			echo"	<td align='center'>".number_format($k->harga1,0)."</td>";
			echo"	<td align='center'>".number_format($k->harga3,0)."</td>";
			echo"	<td align='center'>".number_format($k->diskon,0)." %</td>";
			echo"	<td align='right'>".number_format($k->totalbayar,0)."</td>";
			echo"</tr>";
			
			$no++;
			$tkoli=$tkoli+$k->koli;
			$tberat=$tberat+$k->berat;
			$tharga4=$tharga4+$k->harga4;
			$tharga5=$tharga5+$k->harga5;
			$tharga2=$tharga2+$k->harga2;
			$tharga1=$tharga1+$k->harga1;
			$tharga3=$tharga3+$k->harga3;
			$tdiskon=$tdiskon+$k->diskon;
			$tt=$tt+$k->totalbayar;
			
	
		}
		
		?>
		
		<tr style="height:8px;">
			<td ></td>
			<td colspan="5" align="right"><B>TOTAL</B></td>
			<td align="right"><B>
				<?php 
				echo"<td align='Center'>".number_format($tkoli,0);
				echo"<td align='Center'>".number_format($tberat,0);
				echo"<td align='Center'>";
				echo"<td align='Center'>";
				echo"<td align='Center'>";
				echo"<td align='Center'>";
				echo"<td align='Center'>";
				echo"<td align='Center'>";
				echo"<td align='right'>".number_format($tt,0);
				?></B>
			</td>
			
		</tr>
		<br/><br/>
	</table><br/>
<?php echo"<div id=Total>";
                echo"<td align='right'>Total Resi:&nbsp;"             .number_format($no++ - 1)."<br/>";
				echo"<td align='right'>Total Koli:&nbsp;"             .number_format($tkoli,0)."<br/>";
				echo"<td align='right'>Total Berat:&nbsp;"            .number_format($tberat,0)."<br/>";
				echo"<td align='right'>Total Asuransi:&nbsp;"         .number_format($tharga4,0)."<br/>";
				echo"<td align='right'>Total Packaing:&nbsp;"         .number_format($tharga5,0)."<br/>";
				echo"<td align='right'>Total Biaya kirim:&nbsp;"      .number_format($tharga2,0)."<br/>";
				echo"<td align='right'>Total Biaya DFOD/COD:&nbsp;"   .number_format($tharga1,0)."<br/>";
				echo"<td align='right'>Total Biaya Prioritas:&nbsp;"  .number_format($tharga3,0)."<br/>";
				echo"<td align='right'>Total Diskon:&nbsp;"           .number_format($tdiskon,0).'%'."<br/>";
				echo"<strong><td align='right'>GRAND TOTAL:&nbsp;"    .number_format($tt,0)."</strong>";
				echo"</div>";
				?>	
	
<?php	
echo"<div id=ttd>";
	echo "$area, ".date("d F Y")."<br/>";
	echo"Admin<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	$user=$this->session->userdata('username');
	$nama=$this->app_model->find_nama_admin($user);
	echo "<strong><u>".$nama."</u></strong>";
	echo"</div>";
?>

<?php	

echo"<div id=Bank>";
    echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
		echo"";
	
echo"</div>";
?>

<?php	
echo"<div id=ttd>";
    echo"<b>Account Bank:</b><br/>";
	echo"Bank Mandiri : 124 000 6497 359<br/>";
	echo"Bank BCA     : 128 017 2649<br/>";
	echo"an. Fitriati<br/>";
	echo"<br/>";
	echo"";
echo"</div> "; 
?>
<style>
<style>
td p{
	line-height:8px;
}
thead, th{
	text-align:center;
	vertical-align: middle;
}
#judul{
    margin-left: 500px;
    text-align:center;
	font-size: 18px; 
		text-shadow: 0px 0px 0px #000000;
		-webkit-text-fill-color: #232323;
		-webkit-text-stroke: 0px purple;
		padding-top:2px;
}
#ttd{
    margin-left: 60px;
	text-align:center;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
}
#Bank{
    margin-left: 60px;
	text-align:Left;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
}
#Total{
    margin-left: 50px;
	text-align:left;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
}
</style>