	<span id="judul">KARTU STOK OBAT APOTEK AGUNG</span><br/>
	<i>Jl. Siliwangi No. 5 RT. 02/01 Kec. Nagrak Sukabumi</i><br/>
	
	<table style="width:500px; border:0px;">
		<tr>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		<tr>
			<td>Nama Obat </td><td>: <b><?php echo $this->app_model->find_obat($id);?></b></td>
			<td>Jenis Obat </td><td>: <?php echo $this->app_model->find_jenis_obat($id);?></td>
		</tr>
		<tr>
			<td>Satuan </td><td>: <?php echo $this->app_model->find_satuan_obat($id);?></td>
			<td>Kedaluarsa </td><td>: <?php echo $this->app_model->find_kedaluarsa_obat($id);?></td>
		</tr>
		<tr>
			<td>Tanggal </td><td>: <?php echo $tgl1.' s.d.'.$tgl2;?></td>
		</tr>
	</table>
	<br/>
	
	<table class="table table-hover" style="width:570px;">
	<thead>
		
		<tr>
			<th style="width:90px;" rowspan="2">TANGGAL</th>
			<th style="width:90px;" colspan="2"><span style="text-align:center;">JUMLAH OBAT</span></th>
			<th >SISA</th>
			<th style="width:90px;" rowspan="2">PARAF</th>
		</tr>
		<tr>
			<th>Masuk</th>
			<th>Keluar</th>
			<th align='center'><?php $stok=$this->app_model->stok_awal_obat($id,$tgl1); echo $stok?></th>
		</tr>
	</thead>
	
		<?php
		$no=1;
		$sisa=0;
		$jm=0;
		$jk=0;
		$saldo=0;
		foreach($rs as $k){
			echo"<tr>
					<td>".$this->app_model->tgl_str($k->tgl)."</td>";
			echo"	<td align='center'>".number_format($k->masuk,0)."</td>";
			echo"	<td align='center'>".number_format($k->keluar*-1,0)."</td>";
				$masuk=$k->masuk;
				$keluar=$k->keluar;
				$sisa=$masuk+$keluar;
				$saldo=$saldo+$sisa;
			echo"	<td align='center'>".number_format($saldo+$stok,0)."</td>";
			echo"<td></td>";		
			echo"</tr>";
			$no++;
			$jm=$jm+$k->masuk;
			$jk=$jk+$k->keluar;
			$masuk=0;
			$keluar=0;
		}
		echo"<tr>
				<td><b>JUMLAH</b></td>
				<td align='center'><b>".number_format($jm,0)."</b></td>
				<td align='center'><b>".number_format($jk*-1,0)."</b></td>
				<td align='center'></td>
				<td></td>
			</tr>";
		echo"<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>";	
		?>
		
		
	</table>
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
		letter-spacing: 1px;
}

</style>