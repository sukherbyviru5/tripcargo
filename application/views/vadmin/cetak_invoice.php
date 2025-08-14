<div id="judul"></div>
<br>
<br>
<br>
<br>
<div style="display: flex; justify-content: space-between; align-items: flex-start;">
    <div id="perusahaan" style="max-width: 60%;">
        <p>
            <b>Trip Cargo</b><br>
            <?php echo $contact[0]['alamat']; ?><br>
            Tlp. <?php echo $contact[0]['no_hp']; ?><br>
            https://tripcargoid.com
        </p>
    </div>
    <div style="text-align: right;">
        <img src="<?php echo base_url(); ?>assets/images/logo-sancargo.png" width="210" height="50px">
    </div>
</div>

	<style>
    div.a {text-align: left;}
    </style>
	<br>
	<br>
	<br>
	<br>
<div span id="judul2"><STRONG>Laporan Pengiriman Paket</STRONG></span></div>    
    
    <hr style="margin-top: 25px";>
<div span id="pereode">
	<span id="judul"></span> 
	<td>Periode tgl:   &ensp;&ensp;   </td>
	<td><?php echo $tgl1.'&ensp;  s/d &ensp;  '.$tgl2;?></td>
</div>
	    <table style="font-size:0.9em" class="table table-hover  table-responsive-sm  table-condensed">
	    <thead>
    		<tr>
    			<th style="width:auto; align='center'; text-align: center; font-size: 0.9em" >NO</th>
    			<th style="width:auto; font-size: 0.9em" >RESI</th>
    			<th style="width:8%; font-size: 0.9em" >Tgl</th>
    			<th style="width:auto;text-align: left; font-size: 0.9em" >SERVICE</th>
    			<th style="width:auto;text-align: left; font-size: 0.9em" >PENGIRIM</th>
    			<th style="width:auto;text-align: left; font-size: 0.9em" >KOTA TUJUAN</th>
    			<th style="width:auto;text-align: left; font-size: 0.9em" >Payment</th>
    			<th style="width:auto;text-align: left; font-size: 0.9em" >Koli</th>
    			<th style="width:auto;text-align: left; font-size: 0.9em" >Berat</th>
    			<th style="width:auto;text-align: center; font-size: 0.9em" >Ongkir</th>
    			<th style="width:auto;text-align: left; font-size: 0.9em" >Asuransi</th>
    			<th style="width:auto;text-align: left; font-size: 0.9em" >Packing</th> 
    			<!--- <th style="width:auto;text-align: left; font-size: 0.9em" >Ongkir</th> --->
    			<!--- <th style="width:auto;text-align: left; font-size: 0.9em" >DFOD</th> --->
    			<!--- <th style="width:auto;text-align: left; font-size: 0.9em" >Prioritas</th> --->
    			<th style="width:auto;text-align: left; font-size: 0.9em" >Diskon</th>
    			<th style="text-align: right; font-size: 0.9em" >JUMLAH </th>
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
		    if($k->p_nama == null){
				$nama_pengirim = $this->app_model->find_nama_pel($k->pel_id);
			}else{
				$nama_pengirim = $k->p_nama;
			}
			echo"<tr>";
			echo"   <td align='center'; text-align: center; font-size='0.8em'; >".$no."</td>";
			echo"	<td align='center'; font-size='0.8em'; >".$k->resi."</td>";
	        echo"   <td align='center'; font-size='0.8em'; >".date('d M y ', strtotime($k->tglkirim))."</td>";
			echo"	<td align='left'; font-size='0.8em'; >".$k->layan."</td>";
			echo"	<td align='left'; font-size='0.8em'; >".$nama_pengirim = substr($nama_pengirim,0,20).'...'."</td>";
			echo"	<td align='left'; font-size='0.8em'; >".$this->app_model->find_kokab(substr($k->kec_id,0,4))." </td>";
			echo"	<td align='left'; font-size='0.8em'; >".$k->metode."</td>";
			echo"	<td align='center'; font-size='0.8em'; >".number_format($k->koli,0)."</td>";
			echo"	<td align='center'; font-size='0.8em'; >".number_format($k->berat,0)."</td>";
			echo"	<td align='center'; font-size='0.8em'; >".number_format($k->harga2,0)."</td>";
			echo"	<td align='center'; font-size='0.8em'; >".number_format($k->harga4,0)."</td>";
			echo"	<td align='center'; font-size='0.8em'; >".number_format($k->harga5,0)."</td>";
			//echo"	<td align='center'; font-size='0.8em'; >".number_format($k->harga2,0)."</td>";
			//echo"	<td align='center'; font-size='0.8em'; >".number_format($k->harga1,0)."</td>";
			//echo"	<td align='center'; font-size='0.8em'; >".number_format($k->harga3,0)."</td>";
			echo"	<td align='center'; font-size='0.8em'; >".number_format($k->diskon,0)." %</td>";
			echo"	<td align='right';  font-size='0.8em'; >".number_format($k->totalbayar,0)."</td>";
			echo"</tr>";
			
			$no++;
			$tkoli=$tkoli+$k->koli;
			$tberat=$tberat+$k->berat;
			$tharga4=$tharga4+$k->harga4;//nilai asuransi
			$tharga5=$tharga5+$k->harga5;//bayar asuransi
			$tharga2=$tharga2+$k->harga2;//ongkir
			$tharga1=$tharga1+$k->harga1;//COD
			$tharga3=$tharga3+$k->harga3;//hari yg sama
			$tdiskon=$tdiskon+$k->diskon;
			$tt=$tt+$k->totalbayar;
		}
		?>
		
		<tr>
			<td ></td>
			<td colspan="11" align="right"><B>TOTAL:</B></td>
			<td align="right">
				<?php 
				echo"<td align='Center'";// font-size='0.8em'> <b>".number_format($tkoli,0).'</b>';//$tkoli
				echo"<td align='Center'";// font-size='0.8em'> <b>".number_format($tberat,0).'</b>';//$tberat
				echo"<td align='Center'";// font-size='0.8em'> <b>".number_format($tharga2,0).'</b>';//harga2
				echo"<td align='Center'";// font-size='0.8em'> <b>".number_format($tharga4,0).'</b>';//harga4
				echo"<td align='Center'";// font-size='0.8em'> <b>".number_format($tharga5,0).'</b>';//harga3
				//echo"<td align='Center'>";
				//echo"<td align='Center'>";
				//echo"<td align='Center'>";
				echo"<td align='Center'"; //font-size='0.8em'> <b>".number_format($tdiskon,0).'</b>';//diskon
				echo"<td align='right'; font-size='0.9em'> <b>". number_format($tt, 0).'</b>';?>
			</td>
		</tr>
		<br/><br/>
	</table><br/>

<style>
td p{
	line-height:8px;
}
thead, th{
	text-align:center;
	vertical-align: middle;
}
#judul{
     margin-top: -20px;
    text-align:center;
	font-size: 1.0em; 
		text-shadow: 0px 0px 0px #000000;
		-webkit-text-fill-color: #232323;
		-webkit-text-stroke: 0px purple;
		padding-top:2px;
}
#judul2{
    text-align:center;
    margin-top: -40px;
	font-size: 1.8em; 
}
#perusahaan{
    margin-top: -50px;
    text-align:left;
	font-size: 1.0em; 
}
#logo{
    text-align:left;
    margin-top: 1px;
    width= 100%;
    height= 100%;
}
#pereode{
    text-align:left;
	font-size: 1.0em;
	margin-top: -5px;
}
#ttd{
	text-align:center;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
}
#Bank{
    margin-left: 260px;
	text-align:Left;
	font-family:"Trebuchet MS";
	font-size:13px;
	float:right;
	padding-right:10px;
	padding-bottom:10px;
}
</style>