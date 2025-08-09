<?php
$this->load->view("inc/head_cetak.php");
?>
<link href="<?php echo base_url().'assets/css/invoice.min.css';?>" rel="stylesheet">	
	<span id="judul">MANIFAST &nbsp;</span><br/></br/></br/>
	<?php foreach($head as $h){$hasil=$h;} ?>
	<?php
	echo "<div id='kanan'>";
	echo" <i>".$judul."</i><br/>";
	echo" <i class='judul2'>".$nama_perusahaan."</i><br/>";
	echo" <i>".$alamat_perusahaan."</i><br/>";
	echo" <i>".$telp_perusahaan."</i><br/>";
	echo"</div>";
	echo"<div id='kanan2'>";
	echo"<img src='".base_url()."assets/images/logo-sancargo.png' width='210' height='50px'>";
	echo"</div>";
	?>
	<br/>
	<br/>
	
	
	<br/>
	
	<?php
echo"<table width='100%' class='table table-hover'>";
echo"<tr>
		
		<td>";
echo"<div id=Tgl>";

		echo "Tgl. ".$this->app_model->tgl_str($h->tgl);
echo"</div>";
echo"<div id=Tujuan>";

	echo "Tujuan: $h->tujuan<br/>";
echo"</div>";
echo"<div id=Nom>";
	
	echo "$h->nom";
echo"</div>";
echo"</td></tr>";
echo"</table>";
?>
<style>
table{
	border-color:#ccc #ccc #ccc #ccc;
	border-top:#ccc;
}
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
		float:right;
}
.judul2{
	font-size: 20px; 
		text-shadow: 0px 0px 0px #00000;
		-webkit-text-fill-color: #00000;
		-webkit-text-stroke: 2px #00000;
		padding-top:2px;
}
#Tgl{
	text-align:center;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
	width:200px;
	border:0px solid;
}
#Tujuan{
	text-align:center;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
	width:200px;
	border:0px solid;
}
#Nom{
	text-align:center;
	font-family:"Trebuchet MS";
	font-size:23px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
	width:200px;
	border:0px solid;
}
#ttd{
	text-align:center;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
	width:200px;
	border:0px solid;
}
#kanan{
	text-align:Right;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
}
#kanan2{
	text-align:Right;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:left;
	padding-right:10px;
	padding-bottom:10px;
}
#kotak{
	text-align:left;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	height:130px;
	width:300px;
	padding-right:10px;
	padding-bottom:10px;
	border:0px solid;
	
}
</style>

	<br/>
	<br/>
	
	<table class='table table-striped table-bordered table-hover'>
	<thead>
		
		<tr>
			<th style="width:50px;" >NO</th>
			<th style="text-align: left;">RESI</th>
			<th style="text-align: left;">TANGGAL</th>
			<th style="text-align: left;">SERVICE</th>
			<th style="text-align: left;">TUJUAN</th>
			<th style="text-align: left;">PEMBAYARAN</th> 
			<th style=" width:160px; text-align: left;">BAYAR TUJUAN / DFOD</th>
			<!--- <th style="text-align: left;">ASURANSI</th> --->
			<!--- <th style="text-align: left;">PAKING</th> --->
			<th style="text-align: left;">KOLI</th>
			<th style="text-align: left;">BERAT</th>
		</tr>
		
	</thead>
	
		<?php
		$no=1;
		$tkoli=0;
		$tberat=0;
		$tharga1=0;
		$tharga4=0;
		$tharga5=0;
		foreach($rs as $k){
			echo"<tr>
					<td align='center'>".$no."</td>
					<td>".$k->resi."</td>
					<td>".$this->app_model->tgl_str($k->tglkirim)."</td>";
			echo"	<td>".$k->layan."</td>";
			echo"	<td>".$this->app_model->find_kokab(substr($k->kec_id,0,4))."</td>";
			echo"	<td>".$k->metode."</td>"; 
			echo"	<td>".$k->harga1."</td>";
			//-- echo"	<td>".$k->harga4."</td>"; ---
			//-- echo"	<td>".$k->harga5."</td>"; ---
			echo"	<td>".$k->koli."</td>";
			echo"	<td>".$k->berat." Kg</td>";
			echo"</tr>";
			
			$no++;
			$tharga1=$tharga1+$k->harga1;
			$tharga4=$tharga4+$k->harga4;
			$tharga5=$tharga5+$k->harga5;
			$tkoli=$tkoli+$k->koli;
			$tberat=$tberat+$k->berat;
			
		}
		
		?>
		
		<tr style="height:1px;">
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><strong>Jumlah</strong></td>
			<td><?php echo number_format($tharga1,0);?></td>
			<!--- <td><?php echo number_format($tharga4,0);?></td> --->
			<!---<td><?php echo number_format($tharga5,0);?></td> --->
			<td><?php echo number_format($tkoli,0);?></td>
			<td><?php echo number_format($tberat,0);?>	&nbsp;Kg</td>
			
		</tr>
		<tr style="height:1px;">
			<td ></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			
			
		</tr>
	</table>
<?php
echo"<table width='100%' class='table table-hover'>";
echo"<tr>
		
		<td>";
echo"<div id=ttd>";
	echo "Dibuat<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	$user=$this->session->userdata('username');
	if($h->creator != ""){
		$nama = $h->creator;
	}else{
	    $nama = "_________________";
	}
	echo "<strong>".$nama."</strong>";
echo"</div>";
echo"<div id=ttd>";
	echo "Driver / Kurir<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo "<strong>".$h->driver."</strong>";
	echo"<br/>";
	echo "".$h->tlpdriver."";
echo"</div>";
echo"<div id=ttd>";
	echo "Diterima<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"( &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;)";
echo"</div>";
echo"<div id=ttd>";
	echo"";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
echo"</div>";


echo"</td></tr>";
echo"</table>";
?>
<style>
table{
	border-color:#ccc #ccc #ccc #ccc;
	border-top:#ccc;
}
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
		float:right;
}
.judul2{
	font-size: 20px; 
		text-shadow: 0px 0px 0px #00000;
		-webkit-text-fill-color: #00000;
		-webkit-text-stroke: 2px #00000;
		padding-top:2px;
}
#ttd{
	text-align:center;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
	width:200px;
	border:0px solid;
}
#kanan{
	text-align:Right;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
}
#kanan2{
	text-align:Right;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:left;
	padding-right:10px;
	padding-bottom:10px;
}
#kotak{
	text-align:left;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	height:130px;
	width:300px;
	padding-right:10px;
	padding-bottom:10px;
	border:0px solid;
	
}
</style>