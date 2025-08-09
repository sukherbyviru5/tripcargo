<!-- WRAPPER -->
<div id="wrapper">
	<br/>
	<br/>
	<!-- WELCOME -->
	<section class="container">
<div class='PCOnly'>	    
		<h1 class="text-center">
			<strong>CEK ONGKIR</strong> 
		</h1>
	
		<div class="divider" style="margin-top: -20px;"><!-- divider -->
			<i class="fa fa-star"></i>
		</div>
</div>

		<!-- row -->
		<div class="row">
	
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-6">
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
					<div class='PCOnly'>
	                </div>
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
								
								<fieldset>
									
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Kota Asal</label>
										<div class="col-md-8 col-sm-8 col-xs-12">
											<div class="input-group">
											<select name="asal" id="asal" class="form-control">
												<option value=''>Pilih Kota Asal</option>
												<?php foreach($kota_asal as $k){
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
												<?php foreach($kota_tujuan as $k){
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
							
							
<script type="text/javascript">
function cari(){
	$('#loading').html("<img src='<?php echo base_url();?>assets/img/loading.gif' />");
	var loading = $("#loading");
	var selectValues = $("#tujuan").val();
	if (selectValues == 0){
		var msg = "Tujuan tidak ditemukan";
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
										<div class="col-md-91">
											<button type="button" id="btnCari"  onclick="cari()" class="btn btn-primary">
												<i class="fa fa-search"></i>Cek Tarif<span id="loading"></span>
											</button>
											<button type="reset" name="rest" value="reset" class="btn btn-danger">
												<i class="fa fa-refresh"></i> Reset
											</button>
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
					<header style='display:none'>
						<h2>CEK ONGKIR <span id="loading2"></span></h2>
	
					</header><h3><br/> </h3>
	
					<!-- widget div-->
					<div>
						<!-- widget content -->
						<div class="row justify-content-sm-center">
						<div class="widget-body">
								<div id="info" style=" margin-top: -60px;"></div></div>
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