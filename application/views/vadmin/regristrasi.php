<style>
.box {
    display: inline-block;
    position: relative;
    width: 100%;
}

.box-dummy {
    margin-top: 32px;
    /* 4:3 aspect ratio */
}

.box-element {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    overflow:hidden;
        /* show me! */
}
.box-image{
    position:absolute;
	border: 1px solid #e3bd74;
    color: #999;
    height:32px;
    width:34px;
    padding:5px;
 
    text-align: center;
}
.box-image i{
    font-size:2rem;
    color:#e3bd74
}
.box-image img{
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:auto;
  overflow:hidden;


}

.box-file > input
{

    position:absolute;
    opacity: 0;
	height:32px;
    width:100%;
}
</style>
<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Cargo</li>
	</ol>
</div>	
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4MZKHD3L34"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4MZKHD3L34');
</script>

<!-- MAIN CONTENT -->
<div id="content">

	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1>
				<i class="fa fa-cubes fa-fw "></i> 
					DATA ENTRI
			</h1>
		</div>
		
	</div>
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		
		<!-- row -->
		<div class="row">
	
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
	
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" >
					<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
	
					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true"
					data-widget-sortable="false"
	
					-->
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Entri Cargo</h2>
	
					</header>
	
					<!-- widget div-->
					<div>
	
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
	
						</div>
						<!-- end widget edit box -->
						<!-- widget content -->
							<div class="widget-body">
		
								<div class="row">
									<form id="wizard-1"  class="form-horizontal" novalidate="novalidate" enctype="multipart/form-data">
										<div id="bootstrap-wizard-1" class="col-sm-12">
											<div class="form-bootstrapWizard">
												<ul class="bootstrapWizard form-wizard">
													<li class="active" data-target="#step1">
														<a href="#tab1" data-toggle="tab" > <span class="step">1</span> <span class="title">Data Pengirim</span> </a>
													</li>
													<li data-target="#step2">
														<a href="#tab2" data-toggle="tab" > <span class="step">2</span> <span class="title">Alamat Tujuan</span> </a>
													</li>
													<li data-target="#step3">
														<a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Paket/Cargo</span> </a>
													</li>
													<li data-target="#step4">
														<a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Simpan Formulir</span> </a>
													</li>
												</ul>
												<div class="clearfix"></div>
											</div>
											<div class="tab-content">
												<div class="tab-pane active" id="tab1">
													<br>
													<h3><strong>Step 1 </strong> - Data Pengirim</h3>
		
													<div class="step-content">
														<div class="form-group has-warning">
															<label class="col-md-2 control-label" ><b>Reg Pengirim</b></label>
														<div class="col-md-2">
																<div class="input-group">
																	<button class="button-flat-outline" name="cari" onclick="load_pengirim()"><i class="fa fa-search"></i> Cari pengirim</span>
																</div>
																</div></div>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Nama Pengirim</label>
															<div class="col-md-4">
																<input name="regkirim" id="regkirim" hidden>
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
																	<input class="form-control" placeholder="Nama Lengkap Pengirim" type="text" name="nama" id="nama" onkeyup="this.value = this.value.toUpperCase()">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
																
															</div>
															
															<div class="col-md-5">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-building fa-fw"></i></span>
																	<input class="form-control" placeholder="Dept / Perusahaan" type="text" name="dept" id="dept" onkeyup="this.value = this.value.toUpperCase()">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
															</div>
												
															
														</div>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Alamat Pengirim</label>
															<div class="col-md-9">
															    <div class="input-group">
												                    <input type="hidden" name="alamat">
												                    <textarea class="form-control" cols="20" rows="3" maxlength="150" placeholder="Alamat lengkap pengirim" name="alamat" id="alamat"></textarea>
												                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
											                    </div>
															    
																<!--div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-map-o fa-fw"></i></span>
																	<input class="form-control" placeholder="Alamat Pengirim " type="text" name="alamat" id="alamat">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div-->
																
															</div>
														</div>
														
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Provinsi</label>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
																	<select class="form-control" name="prov" id="prov">
																		<option value="" selected="selected">Pilih Provinsi</option>
																		<?php 
																		foreach($prov as $p){
																			echo"<option value=".$p->prov_id.">".$p->prov."</option>";
																		}
																		?>
																		
																	</select>
																</div>
																
															</div>
																														
															<div class="col-md-3" id="ckabupaten">
																<div class="input-group">
																	<span id="loading"></span>
																	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
																	<select class="form-control" name="kab" id="kab">
																		<option value="" selected="selected">Pilih Kabupaten
																			<!---?php
																			foreach($kokab as $kab){
																				echo"<option value=".$kab->kokab_id.">".$kab->kab."</option>";
																			}
																			?--->
																		</option>	
																	</select>
																</div>
															</div>
															
															
															<div class="col-md-3" id="ckecamatan">
																<div class="input-group">
																<span id="loading2"></span>
																	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
																	<select class="form-control" name="kec" id="kec">
																		<option value="" selected="selected">Pilih Kecamatan
																		<!---?php
																			foreach($kec as $kec){
																				echo"<option value=".$kec->kec_id.">".$kec->kec."</option>";
																			}
																			?--->
																		</option>	
																	</select>
																</div>
															</div>
															
														</div>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Telp/HP</label>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
																	<input class="form-control" placeholder="Telp/hp Pengirim" type="tel" name="telp" id="telp">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
																
															</div>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
																	<input class="form-control" placeholder="Email Pengirim" type="email" name="email" id="email" onkeyup="this.value = this.value.toLowerCase()">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
																
															</div>
														</div>
														
													</div>
													<script type="text/javascript">
													$("#prov").change(function(){
														$('#loading').html("<img src='<?php echo base_url();?>assets/img/loading.gif' />");
														var loading = $("#loading");
														var selectValues = $("#prov").val();
														if (selectValues == 0){
															var msg = "<option value=\"Pilih Kabupaten \">Pilih Kabupaten Dulu</option>";
															$('#ckabupaten').html(msg);
														}else{
															var prov = {prov:$("#prov").val()};
															// $('#kab').attr("disabled",true);
															$.ajax({
																	type: "POST",
																	url : "<?php echo site_url('cadmin/home/select_kab')?>",
																	data: prov,
																	beforeSend: function(){
																	   // $("#loaderDiv").show();
																	   loading.fadeIn();						
																	},
																	success: function(msg){
																		$('#ckabupaten').html(msg);
																		loading.fadeOut();
																	}
															});
														}
													});
													</script>
													
		
												</div>
												<div class="tab-pane" id="tab2">
													<br>
													<h3><strong>Step 2</strong> - Alamat Tujuan</h3>
													<div class="step-content">
														<div class="form-group has-warning">
															<label class="col-md-2 control-label"><b>Reg. Penerima</b></label>
															<div class="col-md-4">
																<div class="input-group">
																		
																	<button class="button-flat-outline" name="cari2" onclick="load_penerima()" ><i class="fa fa-search"></i> Cari Penerima</span>
																</div>
															</div>
															<br><br><label class="col-md-2 control-label">Nama Tujuan</label>
															<div class="col-md-4">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
																	<input class="form-control" placeholder="Nama Lengkap Penerima" type="text"  name="dept2" id="dept2" onkeyup="this.value = this.value.toUpperCase()">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
															</div>
																<div class="col-md-5">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-building fa-fw"></i></span>
																	<input class="form-control" placeholder="Dept / Bag." type="text" name="penerima" id="penerima" onkeyup="this.value = this.value.toUpperCase()">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
															</div>
															
														</div>
														
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Alamat Tujuan</label>
															<div class="col-md-9">
														        <div class="input-group">
												                    <input type="hidden" name="alamat2">
												                    <textarea class="form-control" cols="20" rows="3" maxlength="150" placeholder="Alamat lengkap tujuan" name="alamat2" id="alamat"></textarea>
												                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
											                    </div>
														    </div>
														</div>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Provinsi</label>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
																	<select class="form-control" name="prov2" id="prov2">
																		<option value="" selected="selected">Pilih Provinsi</option>
																		<?php 
																		foreach($prov as $p){
																			echo"<option value=".$p->prov_id.">".$p->prov."</option>";
																		}
																		?>
																		
																	</select>
																</div>
																
															</div>
																														
															<div class="col-md-3" id="ckabupaten2">
																<div class="input-group">
																	<span id="loading3"></span>
																	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
																	<select class="form-control" name="kab2" id="kab2">
																		<option value="" selected="selected">Pilih Kabupaten
																		</option>
																		<?php 
																		foreach($kokab as $ko){
																			echo"<option value=".$ko->kokab_id.">".$ko->kab."</option>";
																		}
																		?>																		
																	</select>
																</div>
															</div>
															
															
															<div class="col-md-3" id="ckecamatan2">
																<div class="input-group">
																<span id="loading4"></span>
																	<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
																	<select class="form-control" name="kec2" id="kec2">
																		<option value="" selected="selected">Pilih Kecamatan
																		</option>
																		<?php 
																		foreach($kecamatan as $kk){
																			echo"<option value=".$kk->kec_id.">".$kk->kec."</option>";
																		}
																		?>
																	</select>
																</div>
															</div>
															
														</div>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Telp/HP</label>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
																	<input class="form-control" placeholder="Telp/HP Tujuan" type="tel" name="telp2" id="telp2" >
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
																
															</div>
														</div>
														
														<script type="text/javascript">
													$("#prov2").change(function(){
														$('#loading3').html("<img src='<?php echo base_url();?>assets/img/loading.gif' />");
														var loading = $("#loading3");
														var selectValues = $("#prov2").val();
														if (selectValues == 0){
															var msg = "<option value=\"Pilih Kabupaten \">Pilih Kabupaten Dulu</option>";
															$('#ckabupaten2').html(msg);
														}else{
															var prov = {prov:$("#prov2").val()};
															// $('#kab').attr("disabled",true);
															$.ajax({
																	type: "POST",
																	url : "<?php echo site_url('cadmin/home/select_kab2')?>",
																	data: prov,
																	beforeSend: function(){
																	   // $("#loaderDiv").show();
																	   loading.fadeIn();						
																	},
																	success: function(msg){
																		$('#ckabupaten2').html(msg);
																		loading.fadeOut();
																	}
															});
														}
													});
													</script>
														
													</div>
												</div>
												<div class="tab-pane " id="tab3">
													<br>
													<h3><strong>Step 3</strong> - Cargo/Paket</h3>
													<div class="step-content">
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Resi / No. STT</label>
															<div class="col-md-4">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa fa-qrcode " style="color:red"></i></span>
																	<input class="form-control" placeholder="Resi (CGK9999999)" readonly type="text" name="resi" id="resi" data-mask="***99999999" data-mask-placeholder= "X" style="FONT-SIZE: x-large;" background: "top;">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
																
															</div>
														
															
														</div>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Keterangan Isi Paket</label>
															<div class="col-md-4">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-cube fa-fw"></i></span>
																	<input class="form-control" placeholder="Keterangan isi paket" type="text" name="deskripsi" id="deskripsi" onkeyup="this.value = this.value.toUpperCase()">
																	<span class="input-group-addon"><i class="fa fa-check"></i></span>
																</div>
																
															</div>
															<div class="col-md-4">
																<div class="input-group">
																    <b>SERVICE </b>
																	<input type="radio" name="layan" value="PRIORITAS">
																	PRIORITAS 
																	<input type="radio" name="layan" value="REGULER">
																	REG
																	<input type="radio" name="layan" value="CARGO">
																	CARGO
																</div>
																
															</div>
														</div>
														
									<script type="text/javascript">
								
									function isNumberKey(evt)
									{
										var charCode = (evt.which) ? evt.which : evt.keyCode;
										if (charCode != 46 && charCode > 31 
										&& (charCode < 48 || charCode > 57))
										return false;
										return true;
									}  
								
								</script>
														<div class="form-group has-warning koli-item">
															<div class="row" style="padding-left:13px; padding-right:13px">
															<label class="col-md-2 control-label">Data Barang </label>
															<div class="col-md-4">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-cube fa-fw"></i></i></span>
																	<input class="form-control first-input" placeholder="P" type="number" min="1" max="1200" name="p" id="p" style="width:152%;" onkeyup="hitung_volume();">
																	<span class="input-group-addon "><i class="fa fa-long-arrow-right fa-fw" style="display: none"></i></span>
																	<input class="form-control first-input" placeholder="L" type="number" min="1" max="250" name="l" id="l" style="width:155%;" onkeyup="hitung_volume();">
																	<span class="input-group-addon"><i class="fa fa-long-arrow-up fa-fw" style="display: none"></i></span>
																	<input class="form-control first-input" placeholder="T" type="number" min="1" max="300"name="t" id="t" style="width:155%;" onkeyup="hitung_volume();">
																	<span class="input-group-addon"><i class="fa fa-long-arrow-up fa-fw" style="display: none"></i></span>
																	<input class="form-control first-input"  placeholder="Volume" type="text" name="volx" style="width:100%;" id="vol0" onkeypress="return isNumberKey(event)" readonly>
																	<span class="input-group-addon" style="display: none"><i class="fa fa-check" style="display: none"></i></span>
																	</i></span>
																</div>
															</div>
															<div class="col-md-4 col-sm-8">
																<div class="input-group">
																	<input class="form-control first-input" placeholder="Berat" type="number" name="beratx" id="berat0" onkeyup="updateTotal()" onkeypress="return isNumberKey(event)" style="width:145%;">
																	<span class="input-group-addon">kg</span>
																	<input class="form-control first-input" placeholder="koli" type="number" id="koli0" name="koli0" onkeyup="updateTotal()" value="1" style="width:155%;" >
																	<span class="input-group-addon">Koli</span>
																	<input class="form-control first-input"  placeholder="Packing" type="text" name="note0" id="note0" onkeyup="this.value = this.value.toUpperCase()" >
																</div>
																
															</div>
															<!-- Menampilkan Foto Barang-->
															<!--div class="col-md-1 col-sm-1">
																<div class="box">
																	<div class="box-dummy" style="width: auto; height: auto;"></div>
																	<div class="box-element" style="width: 200px; height: 200px;">
																		<div class="box-image" style="width: 100px; height: auto;">
																			<div><i class="fa fa-paperclip"></i> Image </div>
																			<img id="image0box" class="first-input-image" style="width: autopx; height: autopx;"/>
																		</div>
																		<div class="box-file">
																			<input class="first-input-file" id="image0"  name="image0" data-id="0" onchange="loadFile(event)" type="file" />
																		</div>
																	</div>
																</div>
															</div-->
															
															<div class="col-md-1 ">
															
																<button type="button" name="add_koli" class="btn btn-success"  id="add_koli"><i class="fa fa-plus"></i></button>
															</div>
															</div>
															<input id="iKoli" value="1" hidden>
															
															<div id="col_koli" class="row margin-top-10" style="padding-left:13px; padding-right:14px">

															</div>
															
															
															
															
															
													
														</div>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Total (auto)</label>
															
															<div class="col-md-2">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-cube fa-fw"></i></span>
																	<input class="form-control" placeholder="Volume" type="text" name="vol" id="vol" onkeypress="return isNumberKey(event)" readonly>
																	<span class="input-group-addon">cm<sup>3</sup></span>
																</div>
															</div>
															<div class="col-md-2">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
																	<input class="form-control" placeholder="Berat (kg)" type="text" name="berat" id="berat" onkeypress="return isNumberKey(event)" readonly>
																	<span class="input-group-addon">Kg</span>
																</div>
															</div>
															<div class="col-md-2">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-cubes fa-fw"></i></span>
																	<input class="form-control" placeholder="Koli (Pcs)" type="text" name="koli" id="koli" onkeypress="return isNumberKey(event)" readonly>
																	<span class="input-group-addon">Pcs</span>
																</div>
																
															</div>
														</div>
														
														
														<div class="form-group has-warning " style="margin-top:50px;">
															<label class="col-md-2 control-label">Cek ongkir</label>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
																	<input class="form-control" placeholder="Estimasi Harga" type="number" name="harga" id="harga"  onkeypress="return isNumberKey(event)">
																	<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																</div>
															</div>
															<div class="col-md-1">
															<button type="button" id="cek_harga" name="cek_harga" class="btn btn-success" onclick="load_harga()"><i class="fa fa-money fa-fw"></i> Tarif</button>
															</div> 
															<label class="col-md-2 control-label">Diskon (%) </label>
															<div class="col-md-2">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-tag"></i></span>
																	<input class="form-control" placeholder="Diskon %" type="number" min="1" max="15" name="diskon" id="diskon" onkeypress="return isNumberKey(event)" maxlength="3">
																	<span class="input-group-addon"><i class="fa fa-persen">% </i></span>
																</div>
															</div>
														</div>
														
														<hr/>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Biaya Kirim</label>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
																	<input class="form-control" placeholder="COD (Rp)" readonly  type="number" name="harga1" id="harga1" onblur="hitung();" onkeypress="return isNumberKey(event)">
																	<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																</div>
															</div>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
																	<input class="form-control" placeholder="Biaya Kirim (Rp)" type="number" name="harga2" id="harga2" onblur="hitung();" onkeypress="return isNumberKey(event)">
																	<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																</div>
															</div>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
																	<input class="form-control" placeholder="Hari yg sama (Rp)" readonly type="number" name="harga3" id="harga3" onblur="hitung();" onkeypress="return isNumberKey(event)">
																	<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																</div>
															</div>
															
														</div>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Nilai Barang</label>
															<div class="col-md-3">
															    
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
																	<input class="form-control" placeholder="Nilai Barang di Asuransikan (Rp)" type="number" name="harga6" id="harga6" onblur="hitung();" onkeypress="return isNumberKey(event)">
																	<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																</div>
															</div>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
																	<input class="form-control" placeholder="Asuransi (Rp)" readonly type="text" name="harga4" id="harga4" onkeyup="hitung();" onkeypress="return isNumberKey(event)">
																	<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																</div>
															</div>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
																	<input class="form-control" placeholder="Paking / Vendor / Lain-lain (Rp)" type="number" name="harga5" id="harga5" onblur="hitung();" onkeypress="return isNumberKey(event)">
																	<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																</div>
															</div>
															
															
															
														</div>
														<br>
														<div class="form-group has-warning">
															<label class="col-md-2 control-label">Total Biaya </label>
															<div class="col-md-3">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-money fa-fw"></i></span>
																	<input class="form-control" placeholder="Total Biaya (Rp)" readonly type="text" name="total" id="total">
																	<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
																</div>
															</div>
														
															<div class="col-md-3">
																<div class="input-group">	<label class="col-md-1 control-label"> </label>
																    <a data-toggle="tooltip" title="metode payment">
																    <b> Bayar: &ensp;</b></a> <!--metode payment-->
																	<input type="radio" name="metode" value="Cash"> Cash&ensp;
																	<input type="radio" name="metode" value="Payment">
																	 <a data-toggle="tooltip" title="Gopay, Dana, Walet, OVO, Debit, Transfer"> TF &ensp;</a>
																	<input type="radio" name="metode" value="Kredit"> Credit &ensp;
																	 <input type="radio" readonly name="metode" value="COD">
																	 <a data-toggle="tooltip" title="Chas On Delivery"> COD</a>
																</div>
																
															</div>
															
															<div class="col-md-3">
															    <label class="col-md-2 control-label"></label>
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-sticky-note"></i></span>
																	<input class="form-control" placeholder="Catatan" type="text" name="catatan" id="Catatan tambahan" onkeyup="this.value = this.value.toUpperCase()">
																	<span class="input-group-addon"><i class="fa fa-commenting-o"></i></span>
																</div>
															</div>
														</div>
														
													</div>
												</div>
												<div class="tab-pane" id="tab4">
													<br>
													<h3><strong>Step 4</strong> - Simpan Formulir</h3>
													<br>
													<h1 class="text-center text-warning"><strong><i class="fa fa-exclamation"></i> Ditangguhkan</strong></h1>
													<h4 class="text-center">Hubungi admin untuk buka blokir</h4>
													<br>
													<div class="row">
													<div class="col-md-12"><center>
													<span class="badge inbox-badge bg-color-redLight hidden-mobile">Disabled</span>
														<!---button type="reset" name="rest" value="reset" class="btn btn-danger">
															<i class="fa fa-refresh"></i> Reset
														</button>
														<input type="hidden" name="id">
														<input type="hidden" name="simpan">
														<button type="button" id="btnSave"  onclick="save()" class="btn btn-primary">
															<i class="fa fa-floppy-o"></i> Simpan <span id="loading"></span>
														</button></center>
													</div>
												</div-->
													<br>
												</div>
		
												<div class="form-actions">
													<div class="row">
														<div class="col-sm-12">
															<ul class="pager wizard no-margin">
																<!--<li class="previous first disabled">
																<a href="javascript:void(0);" class="btn btn-lg btn-default"> First </a>
																</li>-->
																<li class="previous disabled">
																	<a href="javascript:void(0);" class="btn btn-lg btn-default"> Previous </a>
																</li>
																<!--<li class="next last">
																<a href="javascript:void(0);" class="btn btn-lg btn-primary"> Last </a>
																</li>-->
																<li class="next">
																	<a href="javascript:void(0);" class="btn btn-lg txt-color-darken"> Next </a>
																</li>
															</ul>
														</div>
													</div>
												</div>
		
											</div>
										</div>
									</form>
								</div>
		
							</div>
							<!-- end widget content -->
						
	
					</div>
					<!-- end widget div -->
					
				</div>
				<!-- end widget -->
	
				
	
			</article>
			<!-- WIDGET END -->
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
	
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false">
					<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
	
					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true"
					data-widget-sortable="false"
	
					-->
					<header>
						<span class="widget-icon"> <i class="fa fa-columns"></i> </span>
						<h2>Daftar Pengiriman <span id="loading2"></span></h2>
	
					</header>
	
					<!-- widget div-->
					<div>
	
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
	
						</div>
						<!-- end widget edit box -->
	
						<!-- widget content -->
						<div class="widget-body">
	
						
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%"  >
								<thead>			                
									<tr>
										<!-- th data-hide="phone">No</th -->
										<th data-class="phone"style="width:80px;"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i>Tanggal</th>
										<th data-class="expand"style="width:70px;"><i class="fa fa fa-barcode text-muted hidden-md hidden-sm hidden-xs" style="color:red"></i>  Resi</th>
										<th data-hide="phone"style="width:350px;" ><i class="fa fa-fw fa-umbrella text-muted hidden-md hidden-sm hidden-xs"></i>Service</th>
										<!-- <th data-hide="phone"style="width:50px;"><i class="fa fa fa-cubes text-muted hidden-md hidden-sm hidden-xs"></i> Koli</th> -->
										<!-- <th data-hide="phone"style="width:60px;"><i class="fa fa-fw fa-tachometer text-muted hidden-md hidden-sm hidden-xs"></i> Berat</th> --> 
										<!--th data-hide="phone"style="width:190px;"><i class="fa fa-fw fa-archive text-muted hidden-md hidden-sm hidden-xs"></i> Isi Barang</th-->
										<th data-hide="phone"style="max-width:580px;"><i class="fa fa-fw fa-building text-muted hidden-md hidden-sm hidden-xs"></i> Penerima</th>
										<!-- th data-hide="phone" style="width:200px;"><i class="fa fa-fw fa-map text-muted hidden-md hidden-sm hidden-xs"></i> Alamat</th--->
										<!-- th data-hide="phone"><i class="fa fa-fw fa-users text-muted hidden-md hidden-sm hidden-xs"></i> User ID</th --->
										
										<th data-hide="phone,tablet" style="width:150px"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
										
									</tr>
								</thead>
							</table>
		
	
						</div>
						<!-- end widget content -->
	
					</div>
					<!-- end widget div -->
	
				</div>
				<!-- end widget -->
	
			</article>
			<!-- WIDGET END -->
			
	
		</div>
	
		<!-- end row -->
	
	</section>
	<!-- end widget grid -->

</div>
<!-- END MAIN CONTENT -->

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Cari Harga</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
						<div class="form-group has-success">
							<label class="col-md-1 control-label">Asal</label>
							<div class="col-md-4">
								<div class="input-group">
									<select name="asal" id="asal" class="form-control">
									<option selected disabled>Pilih Asal</option>
									<?php foreach($asal as $at){
										echo '<option value="'.$at->asal.'">'.$at->asal.'</option>';
									}?>
									</select>
									<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
								</div>
							</div>
							<label class="col-md-1 control-label">Tujuan</label>
							<div class="col-md-4">
								<div class="input-group">
									<select name="tujuan" id="tujuan" class="form-control">
									<option selected disabled>Pilih Tujuan</option>
									<?php foreach($tujuan as $aa){
    									echo '<option value="'.$aa->tujuan.'">'.$aa->tujuan.'</option>';
									}?>
									</select>
									<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
								</div>
							</div>
							<label class="col-md-2 control-label"></label>
							<div class="col-md-2">
							<button type="button" id="btnCari" onclick="cari()" class="btn btn-primary" style="margin-top: -6px;margin-left: -11px;">
	
								<i class="fa fa-money fa-fw"></i> Tarif<span id="loadtarif"></span>
							</button>
							</div>
						</div>
                        <div class="form-group has-success">
							<span id="info_harga"></span>
						</div>
					
                    </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
function cari(){
	$('#loadtarif').html("<img src='<?php echo base_url();?>assets/img/loading.gif' />");
	var loading = $("#loadtarif");
	var selectValues = $("#tujuan").val();
	if (selectValues == 0){
		var msg = "tujuan tidak ditemukan";
		$('#info_harga').html(msg);
	}else{
		var kode = {asal:$("#asal").val(),tujuan:$("#tujuan").val(),vol:$("#vol").val(),berat:$("#berat").val()};
		// $('#kab').attr("disabled",true);
		$.ajax({
				type: "POST",
				url : "<?php echo site_url('cadmin/home/lacak_tujuan_tarif')?>",
				data: kode,
				beforeSend: function(){
				   // $("#loaderDiv").show();
				   loading.fadeIn();						
				},
				success: function(msg){
					$('#info_harga').html(msg);
					loading.fadeOut();
				}
		});
	}
}
</script>
	
<!-- ui-dialog -->
<div id="dialog_simple" title="Dialog Simple Title">
	<p>
		Apakah anda yakin akan menghapus data ini?
	</p>
</div>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_pengirim" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Cari Pengirim</h3>
            </div>
            <div class="modal-body form" style="margin-bottom: 50px;">
                <form action="#" id="form" class="form-horizontal">
                        <!--table id="datatable_pengirim" class="table table-striped table-bordered table-hover" width="100%"--->
                        <table id="datatable_pengirim" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
						<thead>			                
							<tr>
								<th data-hide="phone"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i></th>
								<th data-class="expand"><i class="fa fa-fw fa-tags text-muted hidden-md hidden-sm hidden-xs"></i> Nama Pengirim</th>
								<th data-class="phone" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i>Bept / Bag</th>
								<th data-hide="phone"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i> Alamat</th>
								<th data-hide="phone" ><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i> Kota/Kab</th>
								<th data-hide="phone,tablet" style="width:50px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i>Act</th>
								
							</tr>
						</thead>
					</table>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form_penerima" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Cari Pengirim</h3>
            </div>
            <div class="modal-body form" style="margin-bottom: 50px;">
                <form action="#" id="form" class="form-horizontal">
                    <!--table id="datatable_penerima" class="table table-striped table-bordered table-hover" width="100%"--->
                        <table id="datatable_penerima" class="table table-striped table-bordered table-hover dataTable no-footer has-columns-hidden" width="100%" role="grid" aria-describedby="dt_basic_info" style="width: 100%;">
						<thead>			                
							<tr>
								<th data-hide="phone"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i></th>
								<th data-class="expand" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i>Nama Penerima</th>
								<th data-class="phone" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i>Dept / Bag</th>
								<th data-hide="phone" ><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i> Alamat</th>
								<th data-hide="phone" ><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i> Kota/Kab</th>
								<th data-hide="phone" ><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i> Tlp</th>
								<th data-hide="phone,tablet" style="width:50px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i>Act</th>
							</tr>
						</thead>
					</table>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- Bootstrap modal -->
<script type="text/javascript">
// var loadFile = function(event) {
//     let id = event.target.id;
//     let output = id+"box"
//     var reader = new FileReader();
//     reader.onload = function(){
//       var outputEl = document.getElementById(output);
//       outputEl.src = reader.result;
//     };
//     reader.readAsDataURL(event.target.files[0]);
//   };
var loadFile = function(event) {
	//let maxsize = 2048; //Kb
	let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
	//let maxsizebyte = maxsize*1024;
	let size = event.target.files[0].size;
	let fileInput = event.target.files[0].name;
    let id = event.target.id;
    let output = id+"box"
    var error = false;
    var message; 
    if(!allowedExtensions.exec(fileInput)){
        error = true;
        message = "Extension yang diperbolehkan hanya jpg/jpeg/png/gif";
    }
    // if(maxsizebyte < size){
    //     error = true;
    //     message = "Ukuran file terlalu besar";
    // }
    if(error == true){
        alert(message);
    }else{
        var reader = new FileReader();
	    reader.onload = function(){
	      var outputEl = document.getElementById(output);
	      outputEl.src = reader.result;
	    };
	    reader.readAsDataURL(event.target.files[0]);
    }
  };
  const Item = ({id,p,l,t,vol,berat,kolix,note}) => `
        <div class="koli-item" id="koli-item-${id}">
			<label class="col-md-2 control-label" ></label>
			<div class="col-md-4" >
				<div class="input-group">
					
					<input class="form-control" placeholder="P" readonly type="number" name="ps[]" id="p${id}" value="${p}" style="width:150%;" onkeyup="hitung_volumex(${id});" required>
					<span class="input-group-addon"><i class="fa fa-long-arrow-right fa-fw" style="display: none"></i></span>
					<input class="form-control" placeholder="L" readonly type="number" name="ls[]" id="l${id}" value="${l}" style="width:150%;" onkeyup="hitung_volumex(${id});" required>
					<span class="input-group-addon"><i class="fa fa-long-arrow-up fa-fw" style="display: none"></i></span>
					<input class="form-control" placeholder="T" readonly type="number" name="ts[]" id="t${id}" value="${t}" style="width:150%;" onkeyup="hitung_volumex(${id});" required>
				    <span class="input-group-addon"><i class="fa fa-long-arrow-up fa-fw" style="display: none"></i></span>
				    <input class="form-control iVol"  placeholder="Volume" readonly readonly type="number" name="vols[]" id="vol${id}" value="${vol}" style="width:100%;">
				
				</div>
			</div>
			<div class="col-md-4 col-sm-8">
				<div class="input-group">
					<input class="form-control iBerat" readonly placeholder="Berat" type="number" name="berats[]" id="berat${id}" value="${berat}" onkeyup="updateTotal()" onkeypress="return isNumberKey(event)" style="width:125%;" required>
					<span class="input-group-addon"></span>
					<input class="form-control iKoli" readonly placeholder="koli"  type="number" onkeyup="updateTotal()" name="kolis[]" value="${kolix}" style="width:125%;" >
					<span class="input-group-addon"></span>
					<input class="form-control "  placeholder="Packing" readonly type="text" name="notes[]" id="note${id}" value="${note}" >
				</div>
				
			</div>
			<!menampilkan foto Barang-->
			<!--div class="col-md-1">
				<div class="box">
					<div class="box-dummy"></div>
					<div class="box-element">
						<div class="box-image">
							
							<img id="image${id}box" />
						</div>
						<div class="box-file">
							
						</div>
					</div>
				</div>
			</div-->
			<div class="col-md-1" id="colx${id}">
				<button type="button" id="del_koli_${id}" name="cek_harga" class="btn btn-danger" onclick="del_koli(${id})"><i class="fa fa-close"></i></button>
			</div>
		</div>
  			  `;
  			  
// $('#add_koli').on('click',function(){
// 	var koli = $('#iKoli').val();
// 	$('#col_koli').append([{id:koli}].map(Item).join(''));
// 	if(koli > 1){
// 		var delkoli = koli-1;
		
// 	}
// 	koli++;
// 	$('#iKoli').val(koli);
// 	updateTotal();
// });
updateTotal();
$('#add_koli').on('click',function(){
	var koli = $('#iKoli').val();
	var p = $('#p').val();	
	var l = $('#l').val();
	var t = $('#t').val();
	var vol = $('#vol0').val();
	var berat = $('#berat0').val();
	var kolix = $('#koli0').val();
	var note = $('#note0').val();
	$('#col_koli').append([{id:koli,p,l,t,vol,berat,kolix,note}].map(Item).join(''));
	$("#image"+koli).prop("files",$("#image0").prop("files"));
	$("#image"+koli+"box").prop('src',$('#image0box').prop("src"));
	if(koli > 1){
		var delkoli = koli-1;
		
	}
	koli++;
	$('#iKoli').val(koli);
	//updateTotal();
	//updateBerat();
	refreshProduct();
});

function del_edit(id){
	
	$('#koli-item-del'+id).remove();
	$('#col_koli').append('<input name="del_item[]" value="'+id+'" hidden>');
	updateTotal();
	updateBerat();
}

function refreshProduct(){
	$('.first-input').val("");
	$('.first-input-image').prop('src', "");
	$('.first-input-file').prop('files',"");
}

$('#harga').on('',function(){
	$('#harga2').val($(this).val());
});

function del_koli(x){
	$('#koli-item-'+x).remove();
 
}

function updateTotal(){
	const arrayKoli = [];
	var keyKoli = 0;
	const arrayVol = [];
	var keyVol = 0;
	var valueVol;
	const arrayBerat = [];
	var keyBerat = 0;
	var valueBerat;
	var varKoli1 = 0;
	if($('#koli0').val() != ""){
		varKoli1 =  parseInt($('#koli0').val());
	}
		arrayKoli[keyKoli] = varKoli1;
		keyKoli++;
	
	$('.iKoli').each(function(){
		arrayKoli[keyKoli] = parseFloat(this.value);
		keyKoli++;
 	});
 	
	if($('#vol0').val() != ""){
		arrayVol[keyVol] = parseFloat($('#vol0').val());
	}else{
		arrayVol[keyVol] = 0;
	}
	keyVol++;
	
	$('.iVol').each(function(){
		valueVol = 0;
		if(this.value != ''){
			valueVol = parseFloat(this.value);
		}
		arrayVol[keyVol] = valueVol;
		keyVol++;
	});
	
	
	if($('#berat0').val() != ""){
		arrayBerat[keyBerat] = parseFloat($('#berat0').val());
	}else{
		arrayBerat[keyBerat] = 0;
	}
	keyBerat++;
	$('.iBerat').each(function(){
		valueBerat = 0;
		if(this.value != ''){
			valueBerat = parseFloat(this.value);
		}
		arrayBerat[keyBerat] = valueBerat;
		keyBerat++;
	});	
	var totalVolume = 0; var totalBerat = 0; var totalKoli = 0;
	for(var key in arrayBerat){
		totalVolume += (arrayVol[key]*arrayKoli[key]);
		totalBerat += (arrayBerat[key]*arrayKoli[key]);
		totalKoli += arrayKoli[key];
	}
	$('#koli').val(totalKoli);
	$('#vol').val(totalVolume);
	$('#berat').val(totalBerat);
}

function updateBerat(){
	var berat = 0;
	$('.iBerat').each(function(){
		if(this.value != ''){
			berat += parseFloat(this.value);
		}
	});	
	$('#berat').val(berat);
}

function hitung_volume(){
		var p = $('#p').val();
		var l = $('#l').val();
		var t = $('#t').val();
		if(p == ""){p=1};
		if(l == ""){l=1};
		if(t == ""){t=1};
		var vol=parseInt(p)*parseInt(l)*parseInt(t)/4000;
		$('[name="volx"]').val(vol);
		updateTotal();
	}
function hitung_volumex(x){
	var p = $('#p'+x).val();
	var l = $('#l'+x).val();
	var t = $('#t'+x).val();
	if(p == ""){p=0};
	if(l == ""){l=0};
	if(t == ""){t=0};
	var vol=parseInt(p)*parseInt(l)*parseInt(t)/4000;
	$('#vol'+x).val(vol);
	updateTotal();
}
function hitung_volume_edit(x){
	var p = $('#p_edit'+x).val();
	var l = $('#l_edit'+x).val();
	var t = $('#t_edit'+x).val();
	if(p == ""){p=0};
	if(l == ""){l=0};
	if(t == ""){t=0};
	var vol=parseInt(p)*parseInt(l)*parseInt(t)/4000;
	$('#vol_edit'+x).val(vol);
	updateTotal();
}
function load_pengirim()
{   
    //$('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_pengirim').modal('show'); // show bootstrap modal
    $('.modal-title').text('Cari Pengirim'); // Set Title to Bootstrap modal title
}
function pilih_pengirim(id,nama,dept,alamat,prov,kab,kec,telp,email)
{
	// ajax delete data to database
	$('[name="regkirim"]').val(id);
	$('[name="nama"]').val(nama);
	$('[name="dept"]').val(dept);
	$('[name="alamat"]').val(alamat);
	$('[name="prov"]').val(prov);
	$('[name="kab"]').val(kab);
	$('[name="kec"]').val(kec);
	$('[name="telp"]').val(telp);
	$('[name="email"]').val(email);
	$('#modal_form_pengirim').modal('hide');
}	
function load_penerima()
{   
    //$('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_penerima').modal('show'); // show bootstrap modal
    $('.modal-title').text('Cari Penerima'); // Set Title to Bootstrap modal title
}
function pilih_penerima(id,nama,alamat,prov,kab,kec,telp,dept2,)
{
	// ajax delete data to database
	$('[name="regterima"]').val(id);
	$('[name="penerima"]').val(nama);
	$('[name="dept2"]').val(dept2);
	$('[name="alamat2"]').val(alamat);
	$('[name="prov2"]').val(prov);
	$('[name="kab2"]').val(kab);
	$('[name="kec2"]').val(kec);
	$('[name="telp2"]').val(telp);
	$('#modal_form_penerima').modal('hide');
	
}
		function hitung(){
			var harga1 = $('[name="harga1"]').val();
			var harga2 = $('[name="harga2"]').val();
			var harga3 = $('[name="harga3"]').val();
			var harga4 = $('[name="harga4"]').val();
			var harga5 = $('[name="harga5"]').val();
			var harga6 = $('[name="harga6"]').val();
			var diskon = $('[name="diskon"]').val();
			if(harga1==''){ harga1=0;}
			if(harga2==''){ harga2=0;}
			if(harga3==''){ harga3=0;}
			if(harga4==''){ harga4=0;}
			if(harga5==''){ harga5=0;}
			if(harga6==''){ harga6=0;}
			if(diskon==''){ diskon=0;}
			
			var disc=(parseInt(harga6)*0.004);
			if (parseInt(harga6)==0){
				var disc=(parseInt(harga6)*0.004+35000);
			}else{
				var disc=(parseInt(harga6)*0.004+35000);
			}
				
			if(harga6!="" || harga6!=0){
				$('[name="harga4"]').val(disc);
			}else{
				$('[name="harga4"]').val('0');
			}
			var c =  parseInt(harga1)+parseInt(harga2)+parseInt(harga3)
			var d = c-(parseInt(diskon)/100*c)+parseInt(harga4)+parseInt(harga5);;
			$('[name="total"]').val(d);
				
		}

	
</script>
<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

	
	var save_method; //for save method string
	save_method="add";
	
function pilih_tarif(id)
{
	// ajax delete data to database
	$('[name="harga"]').val(id);
	$('#modal_form').modal('hide');
	
}

function load_harga()
{   
    //$('#form')[0].reset(); // reset form on modals
	$('#info_harga').html('');
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Cari Harga'); // Set Title to Bootstrap modal title
}

	$('#dialog_simple').dialog({
			autoOpen : false,
	});
	
	function foorm_terima_barang(id){
		window.open("<?php echo base_url();?>cadmin/laporan/foorm_terima_barang/"+id);	// foorm di buat santoso untuk tampilan cetak
	}
	function cetak_label(id){
		window.open("<?php echo base_url();?>cadmin/laporan/cetak_label/"+id);	
	}
	function cetak(id){
		window.open("<?php echo base_url();?>cadmin/laporan/cetak_resi/"+id);	
	}
	function cetak2(id){
		window.open("<?php echo base_url();?>cadmin/laporan/cetak_resi2/"+id);	
	}
	
	function edit(id)
	{
		// save_method = 'update';
		$('#wizard-1')[0].reset(); // reset form on modals
		// $('.form-group').removeClass('has-error'); // clear error class
		// $('.help-block').empty(); // clear error string
		$('#col_koli').empty();
		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo base_url().'cadmin/home/cargo_edit';?>/"+id,
			type: "GET",
			dataType: "JSON",
			success: function(dt)
			{
				
				var data = dt.data;
				//console.log(dt.barang);		
				$('#col_koli').append(dt.barang);
				$('[name="id"]').val(data.id);
				$('[name="resi"]').val(data.resi);
				
				if(data.p_nama == null){
					$('[name="nama"]').val(data.nama);
					$('[name="dept"]').val(data.dept);
					$('[name="email"]').val(data.email);
					$('[name="alamat"]').val(data.alamat1);
					$('[name="telp"]').val(data.hp);
					$('[name="prov"]').val(data.prov_id);
					$('[name="kab"]').val(data.kokab_id);
					$('[name="kec"]').val(data.kec_id);
				}else{
					$('[name="nama"]').val(data.p_nama);
					$('[name="dept"]').val(data.p_dept);
					$('[name="email"]').val(data.p_email);
					$('[name="alamat"]').val(data.p_alamat);
					$('[name="telp"]').val(data.p_telp);
					$('[name="prov"]').val(data.p_prov_id);
					$('[name="kab"]').val(data.p_kokab_id);
					$('[name="kec"]').val(data.p_kec_id);
				}
				
				
						//$('[name="kec"]').attr('disabled',true);
				//$('[name="kec2"]').attr('disabled',true);
				//$('[name="kab"]').attr('disabled',true);
				//$('[name="kab2"]').attr('disabled',true);
				
				$('[name="prov2"]').val(data.prov);
				$('[name="kab2"]').val(data.kab);
				$('[name="kec2"]').val(data.kec);
				
				$('[name="penerima"]').val(data.penerima);
				$('[name="dept2"]').val(data.dept2);
				$('[name="alamat2"]').val(data.alamat2);
				$('[name="telp2"]').val(data.telp);
				$('[name="regkirim"]').val(data.regkirim);
				$('[name="regterima"]').val(data.regterima);
				$('[name="deskripsi"]').val(data.deskripsi);
				$('[name="ukuran"]').val(data.ukuran);
				$('[name="berat"]').val(data.berat);
				$('[name="koli"]').val(data.koli);
				$('[name="vol"]').val(data.vol);
				$('[name="harga"]').val(data.harga);
				$('[name="p"]').val("");
				$('[name="l"]').val("");
				$('[name="t"]').val("");
				$('[name="diskon"]').val(data.diskon);
				
				$('[name="harga1"]').val(data.harga1);
				$('[name="harga2"]').val(data.harga2);
				$('[name="harga3"]').val(data.harga3);
				$('[name="harga4"]').val(data.harga4);
				$('[name="harga5"]').val(data.harga5);
				$('[name="harga6"]').val(data.harga6);
				$('[name="total"]').val(data.totalbayar);
				$('[name="catatan"]').val(data.catatan);
				$('input:radio[name=layan]').val([data.layan]);
				$('input:radio[name=metode]').val([data.metode]);
			
				$('[name="simpan"]').val('update');
				$('[name="simpan"]').text('Update'); 
				$('#btnSave').text('Update');
				save_method="update";
				// $('.modal-title').text('Edit Dosen'); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}

	
		
	function hapus(id) {
	
			$('#dialog_simple').dialog({
			autoOpen : false,
			width : 400,
			resizable : false,
			modal : true,
			title : "Hapus Data",
			buttons : [{
				html : "<i class='fa fa-trash-o'></i>&nbsp; Ya, Benar",
				"class" : "btn btn-danger",
				click : function() {
					$(this).dialog("close");
					
					var kode = {id:id};
					var table = $('#dt_basic').DataTable();
					$('#loading2').html("<img src='<?php echo base_url().'assets/';?>img/loading.gif' />");
					var loading = $("#loading2");
					// alert('sukses'+id);
					$.ajax({
							type: "POST",
							url : "<?php echo base_url().'cadmin/home/cargo_hapus';?>/"+id,
							data: kode,
							// dataType: "JSON",
							beforeSend: function(){
							   // $("#loaderDiv").show();
							   loading.fadeIn();						
							},
							success: function(status){
								alert(status);
								table.ajax.reload();
								loading.fadeOut();
								loading.hide();
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error hapus data');
								loading.fadeOut();
								loading.hide();
							}
					});
					//--------------------
				}
			}, {
				html : "<i class='fa fa-times'></i>&nbsp; Batal",
				"class" : "btn btn-default",
				click : function() {
					$(this).dialog("close");
				}
			}]
		});
		
		$('#dialog_simple').dialog('open');
			return false;
			
	}
	
	/*
	* DIALOG SIMPLE
	*/

	// Dialog click
	$('#dialog_link').click(function() {
		$('#dialog_simple').dialog('open');
		return false;

	});
			
	function reload_table()
	{
		var table = $('#dt_basic').dataTable();
		table.ajax.reload();
	}
	
	
	function save()
	{
		$('#btnSave').text('Menyimpan...'); //change button text
		$('#btnSave').attr('disabled',true); //set button disable 
		
		if(save_method=="add"){
			$('[name="simpan"]').val('add');
		}else{
			$('[name="simpan"]').val('update');
		}
		var url;
	   
			url = "<?php echo base_url().'cadmin/home/cargo_add';?>";
			
		
		if($('[name="nama"]').val()=='' ){
			alert('Data Kosong','Error');
			// $('#smart-form-register')[0].checkValidity();
			
			$('#btnSave').text('Simpan'); //change button text
			$('#btnSave').attr('disabled',false); //set button disable 
		}else{
		// ajax adding data to database
			var form = $('#wizard-1');
			var formData = new FormData(form[0]);

			$.ajax({
				url : url,
				type: "POST",
				data: formData,
				dataType: "JSON",
				processData: false,
				contentType: false,
				success: function(data)
				{

					if(data.status) //if success close modal and reload ajax table
					{
						
						$('#dt_basic').DataTable().ajax.reload();
						$('#wizard-1')[0].reset();
						$('#form')[0].reset(); // reset form on modals
						save_method="add";
						alert('Posting/Update Sukses');
					}
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 

				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
					console.log(textStatus);
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 

				}
			});
		}
	}
	
</script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!
var table;

$(document).ready(function() {

    //datatables
	 var responsiveHelper_dt_basic = undefined;
	 var responsiveHelper_datatable_pengirim = undefined;
	 var responsiveHelper_datatable_penerima = undefined;
		
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};
    table = $('#dt_basic').DataTable({ 
		 
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 
			{
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'A4'
            },'print'
		],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[ 1, "desc" ]],

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/cargo_ajax_list')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
				}
			},
		"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			},
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": true, //set not orderable
        },	
        ],
        "order": [[ 1, "desc" ]],
    });
    table = $('#datatable_pengirim').DataTable({ 
		 
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 
			{
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'A4'
            },'print'
		],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[ 1, "desc" ]],

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/pelanggan_ajax_list_2')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_pengirim) {
					responsiveHelper_datatable_pengirim = new ResponsiveDatatablesHelper($('#datatable_pengirim'), breakpointDefinition);
				}
			},
		"rowCallback" : function(nRow) {
				responsiveHelper_datatable_pengirim.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_pengirim.respond();
			},
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
		
        ],


    });
    table = $('#datatable_penerima').DataTable({ 
		 
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 
			{
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'A4'
            },'print'
		],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[ 1, "desc" ]],

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/cargo_ajax_list_2')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_penerima) {
					responsiveHelper_datatable_penerima = new ResponsiveDatatablesHelper($('#datatable_penerima'), breakpointDefinition);
				}
			},
		"rowCallback" : function(nRow) {
				responsiveHelper_datatable_penerima.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_penerima.respond();
			},
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
		
        ],
    });
});

</script>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo base_url();?>assets/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugin/fuelux/wizard/wizard.min.js"></script>
<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!
$(document).ready(function() {
	
	pageSetUp();

	//Bootstrap Wizard Validations

	  var $validator = $("#wizard-1").validate({
		
		rules: {
		  nama: {
			required: true,
		  },
		  alamat: {
			required: true
		  },
		  prov: {
			required: true
		  },
		  kab: {
			required: true
		  },
		 
		  telp: {
			required: true,
			minlength: 5
		  },
		  penerima: {
			required: true,
		  },
		  dept2: {
			required: true,
		  },
		  regkirim: {
			required: true,
		  },
		  regterima: {
			required: true,
		  },
		  alamat2: {
			required: true
		  },
		  prov2: {
			required: true
		  },
		  kab2: {
			required: true
		  },
		  
		  telp2: {
			required: true,
			minlength: 5
		  },
		  
    	   deskripsi: {
			required: true
		  },
		   ukuran: {
			required: true
		  },
		   harga1: {
			required: false
		  },
		   harga2: {
			required: false
		  },
		   harga3: {
			required: false
		  },
		   harga4: {
			required: false
		  },
		   harga5: {
			required: false
		  },
		   total: {
			required: false
		  },
		  berat: {
			required: false
		  },
		  koli: {
			required: false
		  },
		},
		
		messages: {
		  nama: "Nama Pengirim Wajib Disi",
		  alamat: "Alamat wajib diisi",		  
		},
		
		highlight: function (element) {
		  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function (element) {
		  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function (error, element) {
		  if (element.parent('.input-group').length) {
			error.insertAfter(element.parent());
		  } else {
			error.insertAfter(element);
		  }
		}
	  });
	  
	  $('#bootstrap-wizard-1').bootstrapWizard({
		'tabClass': 'form-wizard',
		'onNext': function (tab, navigation, index) {
		  var $valid = $("#wizard-1").valid();
		  if (!$valid) {
			$validator.focusInvalid();
			return false;
		  } else {
			$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).addClass(
			  'complete');
			$('#bootstrap-wizard-1').find('.form-wizard').children('li').eq(index - 1).find('.step')
			.html('<i class="fa fa-check"></i>');
		  }
		}
	  });
	  

	// fuelux wizard
	  var wizard = $('.wizard').wizard();
	  
	  wizard.on('finished', function (e, data) {
		//$("#fuelux-wizard").submit();
		//console.log("submitted!");
		$.smallBox({
		  title: "Congratulations! Your form was submitted",
		  content: "<i class='fa fa-clock-o'></i> <i>1 seconds ago...</i>",
		  color: "#5F895F",
		  iconSmall: "fa fa-check bounce animated",
		  timeout: 4000
		});
		
	  });

    	  $.ajax({
                url: "<?php echo base_url('cadmin/users/getResi'); ?>",
                success: function (data) {
                    $('#resi').val(data);
                }
            });
})

</script>