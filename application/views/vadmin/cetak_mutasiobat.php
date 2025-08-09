	<span id="judul">LAPORAN MUTASI OBAT APOTEK AGUNG</span><br/>
	<i>Jl. Siliwangi No. 5 RT. 02/01 Kec. Nagrak Sukabumi</i><br/>
	
	<table style="width:320px; border:0px;">
		<tr>
			<td>&nbsp;</td>
			<td></td>
		</tr>
	
		<tr>
			<td>Tanggal </td><td>: <?php echo $tgl1.' s.d.'.$tgl2;?></td>
		</tr>
	</table>
	<br/>
	
	<table class="table table-hover">
	<thead>
		
		<tr>
			<th style="width:50px;" >NO</th>
			<th style="width:100px;" >TANGGAL</th>
			<th  >NAMA OBAT</th>
			<th  >JENIS OBAT</th>
			<th style="width:200px;" >MASUK</th>
			<th style="width:200px;" >KELUAR</th>
		</tr>
		
	</thead>
	
		<?php
		$no=1;
		$masuk=0;
		$keluar=0;
		foreach($rs as $k){
			echo"<tr>
					<td align='center'>".$no."</td>
					<td>".$this->app_model->tgl_str($k->tgl)."</td>";
			echo"	<td>".$this->app_model->find_obat($k->obat_id)."</td>";
			echo"	<td>".$this->app_model->find_jenis_obat($k->obat_id)."</td>";
			echo"	<td align='right'>".number_format($k->masuk,0)." ".$this->app_model->find_satuan_obat($k->obat_id)."</td>";
			echo"	<td align='right'>".number_format($k->keluar*-1,0)." ".$this->app_model->find_satuan_obat($k->obat_id)."</td>";
			
			echo"</tr>";
			$no++;
			$masuk=$masuk+$k->masuk;
			$keluar=$keluar+$k->keluar;
		}
		
		?>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td><b>JUMLAH </b></td>
			<td align="right"><b><?php echo number_format($masuk,0);?></b></td>
			<td align="right"><b><?php echo number_format($keluar*-1,0);?></b></td>
		</tr>
		<tr style="height:3px;">
			<td ></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
<?php	
echo"<div id=ttd>";
	echo "Nagrak, ".date("d F Y")."<br/>";
	echo"Pemilik Apotek <br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"dr. Agung";
	
	
echo"</div>";
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