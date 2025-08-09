	<span sytle="font-size:14px;"><b>REKAPITULASI PEMERIKSAAN DOKTER AGUNG</b></span><br/>
	<i>Dari Tanggal <?php echo $tgl1;?> s.d tanggal <?php echo $tgl2;?></i><br/><br/>
	<table class="table table-hover" border="1px">
	<thead>
		<tr>
			<th style="width:30px;" bgcolor="#D3D3D3">No</th>
			<th style="width:90px;" bgcolor="#D3D3D3">Tanggal</th>
			<th bgcolor="#D3D3D3">Nama Pasien</th>
			<th style="width:50px;" bgcolor="#D3D3D3">Usia</th>
			<th bgcolor="#D3D3D3">Alamat</th>
			<th bgcolor="#D3D3D3">Keluhan</th>
			<th bgcolor="#D3D3D3">Fisik</th>
			<th bgcolor="#D3D3D3">Diagnosis</th>
			<th>Terapi</th>
			<th bgcolor="#D3D3D3">Keterangan</th>
			
		  </tr>
	</thead>
	
		<?php
		$no=1;
		$jual=0;
		$jlaba=0;
		$jdok=0;
		$total=0;
		$thp=0;
		if($jenis=="All"){
			$qjenis="";
			$ajenis="";
		}elseif($jenis=="Resep"){
			$qjenis="and b.jenis='$jenis'";
			$ajenis="and a.jenis='$jenis'";
		}elseif($jenis=="Biasa"){
			$qjenis="and b.jenis='$jenis'";
			$ajenis="and a.jenis='$jenis'";
		}
		foreach($rs as $k){
			echo"<tr>
					<td valign='top'>".$no."</td>
					<td valign='top'>".$this->app_model->tgl_str($k->tgl)."</td>
					<td valign='top'>".ucwords(strtolower($k->nama))."<br/>
						'".$k->nobpjs."
					</td>
					<td valign='top'>".$k->usia."</td>
					<td valign='top'>".ucwords(strtolower($k->alamat))."</td>";
					$text1=$k->keluhan;
					$text=str_ireplace('<p>','',$text1);
					$text=str_ireplace('</p>','<br/>',$text);
					$keluhan=str_ireplace('<br>','',$text);
				echo"<td valign='top'>".ucwords(strtolower($keluhan))."</td>";
					$text1=$k->fisik;
					$text=str_ireplace('<p>','',$text1);
					$text=str_ireplace('</p>','<br/>',$text);
					$fisik=str_ireplace('<br>','',$text);
				echo"<td valign='top'>".ucwords(strtolower($fisik))."</td>";
					$text1=$k->diagnosa;
					$text=str_ireplace('<p>','',$text1);
					$text=str_ireplace('</p>','<br/>',$text);
					$diagnosa=str_ireplace('<br>','',$text);
				echo"<td valign='top'>".ucwords(strtolower($diagnosa))."</td>";
				echo"<td>";
				//buka table pemeriksaan detail 
					$pm_id=$k->id;
					$qu=$this->db->query("select a.obat_id, a.signa, a.qty, b.obat from pemeriksaan_detail as a 
					inner join obat as b 
					on a.obat_id=b.id 
					where a.pm_id='$pm_id'
					$qjenis 
					order by a.id asc");
					foreach($qu->result() as $c){
						echo"".$this->app_model->find_obat($c->obat_id)."<br/>";
					}
				echo"</td>";
				echo"<td valign='top'>
						Alergi Obat: ".ucwords(strtolower($k->alergi_obat))."; 
						Lab/Rontgen: ".ucwords(strtolower($k->lab))."; 
						Rujukan/Spesialis: ".ucwords(strtolower($k->rujukan))."<br/> 
						Rumah Sakit: ".ucwords(strtolower($k->rs))."; 
						Alasan Rujukan: ".ucwords(strtolower($k->alasan_rujuk))."; 
				</td>";
				
			echo"</tr>";
			$no++;
		}
		
		
		?>
		
	</table>
<br/><br/>
	<?php
	
echo"<div id=ttd>";
	echo "Nagrak, ".date("d F Y")."<br/>";
	echo"Hormat Kami <br/>";
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
		letter-spacing: 2px;
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