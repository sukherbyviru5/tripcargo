	
	<span id="judul">&nbsp;LAPORAN PENGIRIMAN CARGO</span>
	
	<table style="width:auto; border:0px; text-align: center">
		
			<td>&nbsp;Laporan pereode per tanggal </td>
			
			<td>: <?php echo $tgl1.' s.d.'.$tgl2;
				?>
		
	</table>
	
		<style>
		
div.a {
        text-align: center;
}
</style>
	<br/>
	<div>
	<table class="table table-hover " >
	<thead>
		
		<tr>
			<th style="width:50px; " >NO</th>
			<th style="width:Auto;" >RESI</th>
			<th style="width:Auto;" >TANGGAL</th>
			<th style="width:auto;text-align: left;" >SERVICE</th>
			<th style="width:auto;text-align: left;" >PENGIRIM</th>
			<th style="width:auto;text-align: left;" >PENERIMA</th>
			<th style="width:auto;text-align: left;" >KOTA TUJUAN</th>
		    <th style="width:auto;text-align: left;" >Koli</th>
			<th style="width:auto;text-align: left;" >Berat</th>
			<th >STATUS</th>
		</tr>
		
	</thead>
	
		<?php
		$no=1;
		$masuk=0;
		$keluar=0;
		$tkoli=0;
		$tberat=0;
	
		foreach($rs as $k){
		    if($k->p_nama == null){
				$nama_pengirim = $this->app_model->find_nama_pel($k->pel_id);
		
			}else{
				$nama_pengirim = $k->p_nama;
		
			}
			echo"<tr>
					<td align='center'>".$no."</td>
					<td align='center'>".$k->resi."</td>
					<td align='center'>".date('d M Y H:i', strtotime($k->tglkirim))."</td>";
			echo"	<td align='left'>".$k->layan."</td>";
		    echo"	<td align='left'>".$nama_pengirim."</td>";
		    echo"	<td align='left'>".$k->penerima."</td>";
			echo"	<td align='left'>".$this->app_model->find_kokab(substr($k->kec_id,0,4))." </td>";
			echo"	<td align='left'>".$k->koli."</td>";
			echo"	<td align='left'>".$k->berat."</td>";
			echo"	<td align='left'>".$this->app_model->find_status_paket($k->resi)."</td>";
			
			
			echo"</tr>";
			$no++;
			
		}
		
		?>
		
		<tr style="height:3px;">
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