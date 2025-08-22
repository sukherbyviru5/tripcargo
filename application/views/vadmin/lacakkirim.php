<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Lacak Pengiriman</li>
	</ol>
</div>	
<div id="content">
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		
		<!-- row -->
		<div class="row">
	
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-4">
	
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
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
						<h2>Lacak Resi Pengiriman</h2>
	
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
	
							<form id="smart-form-register" class="form-horizontal" >
								
								<fieldset>
									<legend>Lacak Pengiriman</legend>
									<div class="form-group has-success">
										<label class="col-md-4 control-label"> Nomor Resi: </label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="text" placeholder="XXX99999999" name="resi" id="resi"  data-mask-placeholder= "X">
												<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										
										<span id="loading"></span>
										
										
									</div>
									
								</fieldset>
<script type="text/javascript">
$("#resi").blur(function(){
	$('#loading').html("<img src='<?php echo base_url();?>assets/img/loading.gif' />");
	var loading = $("#loading");
	var selectValues = $("#resi").val();
	if (selectValues == 0){
		var msg = "Resi tidak ditemukan";
		$('#info').html(msg);
	}else{
		var resi = {resi:$("#resi").val()};
		// $('#kab').attr("disabled",true);
		$.ajax({
				type: "POST",
				url : "<?php echo site_url('cadmin/home/lacak_resi')?>",
				data: resi,
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
});
</script>
																				
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
											Silahkam masukan nomor resi
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
			<article class="col-sm-12 col-md-12 col-lg-8">
	
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
						<h2>Lacak Pengiriman <span id="loading2"></span></h2>
	
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
								<div id="info"></div>
		
	
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
