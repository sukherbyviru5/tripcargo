	<table style="width:auto; font-size: 9px; border:0px; text-align: center">
	<span id="judul">&nbsp;LAPORAN PENGIRIMAN INSAN CARGO DEPOK</span>
	
	<table style="width:auto; font-size: 9px; border:0px; text-align: center">
		
			<td>&nbsp;Laporan pereode per tanggal </td>
			
			<td>: <?php echo $tgl1.' s.d.'.$tgl2;
				?>
		
	</table>
	
		<style>
div.a {
        text-align: right;
}
</style>
<div class="a" style="
    margin-top: -40px; 
" >
	<span id="judul"></span> 
	<?php
	echo"<img src='".base_url()."assets/images/logo.jpeg' width='auto' height='50px';>";
	?>

	</div>
	<br/>
	<div>
	<table class="table-striped " style="width:100%; font-size: 1.0em; border:0px;">
	<thead>
		
		<tr>
			<th style="width:30px; " >NO</th>
			<th style="width:auto;" >RESI</th>
			<th style="width:auto;" >TANGGAL</th>
			<th style="width:auto;text-align: left;" >SERVICE</th>
			<th style="width:auto;text-align: left;" >PENGIRIM</th>
			<th style="width:auto;text-align: left;" >PENERIMA</th>
			<th style="width:auto;text-align: left;" >TUJUAN</th>
		    <th style="width:auto;text-align: left;" >Koli</th>
			<th style="width:auto;text-align: left;" >Berat</th>
			<th style="width:auto;text-align: left;" >STATUS</th>
		</tr>
		
	</thead>
	
		<?php
		$no=1;
		$masuk=0;
		$keluar=0;
		$tkoli=0;
		$tberat=0;
	
		foreach($rs as $k){
			echo"<tr>
					<td align='center'>".$no."</td>
					<td align='center'>".$k->resi."</td>
					<td align='center'>".$this->app_model->tgl_str($k->tglkirim)."</td>";
			echo"	<td align='left'>".$k->layan."</td>";
		    echo"	<td align='left'>".$this->app_model->find_pel($k->pel_id)."</td>";
		    echo"	<td align='left'>".$k->penerima."</td>";
			echo"	<td align='left'>".$this->app_model->find_kokab(substr($k->kec_id,0,4))." </td>";
			echo"	<td align='left'>".$k->koli."</td>";
			echo"	<td align='left'>".$k->berat."</td>";
			echo"	<td align='left'>".$this->app_model->find_status_paket($k->resi)."</td>";
			
			
			echo"</tr>";
			$no++;
			
		}
		
		?>
		
		<tr style="height:2px;">
			<td ></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table></div>

<style>
td p{
	line-height:8px;
}
thead, th{
	text-align:center;
	vertical-align: middle;
}
#judul{
	font-size: 13px; 
	padding-top:2px;
}
#ttd{
	text-align:center;
	font-size:13px;
	float:right;
	padding-right:40px;
	padding-bottom:10px;
}
</style>