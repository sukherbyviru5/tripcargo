
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-4MZKHD3L34"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4MZKHD3L34');
</script>

<!-- WRAPPER -->

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
.ui-helper-hidden-accessible-col-sm-12 {
	border: 0;
	clip: rect(0 0 0 0);
	height: 1px;
	margin: -1px;
	overflow: hidden;
	padding: 0;
	position: absolute !important;
	width:100% !important;
}
  .custom-combobox-col-sm-12 {
    position: relative;
    display: inline-block;
    width:100% !important;
  }
  .custom-combobox-toggle {
    position: absolute ;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
    width:30px;
    border:1px solid #3c763d;
    content: "^";
	color: #3c763d;
    background-color: #dff0d8;
    border-color: #3c763d;
    display: none;
  }
  .custom-combobox-toggle i {
	font-size:20px;
	padding:6px;
  }
  .custom-combobox-input {
    font-size: large;  
    background: #ffffff00;  
    margin: center;
    padding: 5px 10px;
	width:90%;
	border:2px solid #ccc !important;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    text-align: left;
    max-width: 90%;

  }
  .ui-draggable, .ui-droppable {
	background-position: top;
  }
  .ui-widget-content a {
    background: #ffffff00;  
    color: #333333;
    padding:5px;
    max-width: 90%;
  }
    .ui-autocomplete{
    overflow-y: hidden;
    max-height:210px;
    width: 210px;
  }
  .divider .fa {
	color: #bbb;
	background: #ffffff; /* same as background color */
	text-align: center;
	display: inline-block;
	height: 50px; line-height: 50px;
	text-align: center;
	width: 50px;
	font-size: 20px;

	position: absolute;
	top: -25px; left: 50%;
	margin: 0 auto 0 -25px;

}
table,
.note-editor .note-editable {
	background-color:#ffffff00;
	border-collapse: initial;
	
}

thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
  </style>
<div id="wrapper">
	
	<!-- WELCOME -->
	<section class="container">
<!--div class='PCOnly'--->	    
		<h1 class="text-center" style="margin-top: 10px;">
			<strong>CEK TARIF</strong> 
		</h1>
		<div class="divider" style="margin-top: 0px;"><!-- divider -->
			<i class="fa fa-star"></i>
		<!--/div--->
</div>
<div class='PCOnly'>
<p class="text-center" style="margin-top: -20px;">Cek tarif atau ongkos kirim dengan masukan kota asal dan kota tujuan di Trip Cargo untuk mengetahui biaya perkilogramnya.</p>
</div>
		<!-- row -->
		<div class="row">
	
			<!-- NEW WIDGET START -->
			<article class="col-sm-6 col-md-12 col-lg-6">
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="true" data-widget-editbutton="false">
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
					<!--div class='PCOnly'>
	                </div-->
					<!-- widget div-->
					<div>
	
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
						</div>
						<!-- end widget edit box -->
	
						<!-- widget content -->
					
						<div class="widget-body">
							<form id="smart-form-register" class="form-horizontal" >
								<!--
								<fieldset>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Kota Asal</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<div class="input-group">
											<select name="asal" id="asal" class="form-control">
												<option value=''>Pilih Kota Asal</option>
												<!--?php foreach($kota_asal as $k){
													echo"<option value='".$k->asal."'>".$k->asal."</option>";
												}
												?>
											</select>
											<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
											</div>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Kota Tujuan</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<div class="input-group">
											<select name="tujuan" id="tujuan" class="form-control">
												<option value=''>Pilih Kota Tujuan</option>
												<!--?php foreach($kota_tujuan as $k){
													echo"<option value='".$k->tujuan."'>".$k->tujuan."</option>";
												}
												?>
											</select>
											<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
											</div>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group has-success">
							</fieldset>
							-->
							<form id="smart-form-register" class="form-horizontal">
								<fieldset style=" margin-top: 40px;">
									<div class="form-group">
										<label class="col-md-3 control-label"><b>Kota Asal</b></label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<select name="asal" id="asal" class=" cb-box" >
												<option value='' ></option>
												<?php foreach($kota_asal as $k){
													echo"<option value='".$k->asal."'>".$k->asal."</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group ui-widget">
										<label class="col-md-3 control-label"><b>Kota Tujuan</b></label>
										<div class="col-md-8 col-sm-8 col-xs-12" style="font-size: large;">
											<select name="tujuan" id="tujuan" class="cb-box" style="font-size: large;" >
												<option value='' style="font-size: large;"></option>
												<?php foreach($kota_tujuan as $k){
												    echo"col-md-8 col-sm-8 col-xs-12";
													echo"<option value='".$k->tujuan."'>".$k->tujuan."</option>";
												}
												?>
											</select>
										</div>
									</div>
							    </fieldset>
						    </form>	
							
<script type="text/javascript">
function cari(){
	$('#loading').html("<img src='<?php echo base_url();?>assets/img/loading.gif' />");
	var loading = $("#loading");
	var selectValues = $("#tujuan").val();
	if (selectValues == 0){
		var msg = "&emsp;&emsp;Tujuan tidak ditemukan";
		$('#info').html(msg);
	}else{
		var kode = {asal:$("#asal").val(),tujuan:$("#tujuan").val()};
		// $('#kab').attr("disabled",true);
		$.ajax({
				type: "POST",
				url : "<?php echo site_url('cadmin/home/lacak_tujuan')?>",
				data: kode,
				beforeSend: function(){
				   // $("#loaderDiv").show();
				   loading.fadeIn();						
				},
				success: function(msg){
					$('#info').html(msg);
					loading.fadeOut();
				}
		});
	}
}
</script>													
								<div class="form-actions1">
									<div class="row">
										<label class="col-md-3 control-label"></label>
										<div class="col-md-4">
											<button type="button" id="btnCari"  onclick="cari()" class="btn btn-primary">
												<i class="fa fa-search"></i>Cek Tarif<span id="loading"></span>
											</button>
										<!--<button type="reset" name="rest" value="reset" class="btn btn-danger">
												<i class="fa fa-refresh"></i> Reset
											</button> -->
										</div>
									</div>
								</div>
							</form>
						</div>
						<!-- end widget content -->
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
	
				
	
			</article>
			<!-- WIDGET END -->
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-5">
	
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false" >
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
				
	
					</header><h3><br> </h3>
	
					<!-- widget div-->
					<div>
						<!-- widget content -->
						<div class="row justify-content-sm-center">
						<div class="widget-body">
								<div id="info" style="margin-top: -50px; max-height: 156px; max-lines: 3; overflow: hidden;"></div></div>
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

		<!-- separator -->

	</section>
	<!-- /WELCOME -->
	
</div>
<!-- /WRAPPER -->
<style>
    @media (max-width: 479px) {
    .widget-body{margin-top:-50px;}
    }
</style>