
Cek resi untuk mengetahui status dan posisi paket anda
<!--text/x-generic main_tracking.php ( HTML document, ASCII text )-->
<!-- WRAPPER -->
<div id="wrapper">
	<!-- WELCOME --><div class='PCOnly'>	
	<section class="subcontainer">
		<h1 class="text-center" style="margin-top: 10px;">
			<strong>CEK RESI</strong> 
		</h1>
		</div>
	<section class="container"style="margin-top: -0px;">
<div class='PCOnly'>	
		<div class="divider" style="margin-top: -20px;"><!-- divider -->
			<i class="fa fa-star"></i>
		</div>
		<div class='PCOnly'>
		<p class="text-center" style="margin-top: -20px;">Layanan cek resi untuk mengetahui status dan posisi paket anda dengan mudah secara real-time</p>
        </div>
</div>


		<!-- row -->
		<div class="row">
			<!-- NEW WIDGET START -->
			<article class="col-sm-6 col-md-8 col-lg-4">
	
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
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="text" placeholder="XXX99999999" name="resi" id="resi" data-mask="***99999999" data-mask-placeholder= "X" 
												style="
                                                    border-radius: 6px;
                                                    border-top-left-radius: 6px;
                                                    border-top-right-radius: 6px;
                                                    border-bottom-right-radius: 6px;
                                                    border-bottom-left-radius: 6px;
                                                    border-color: #ccc;
                                                    font-size: 16px;    
                                                    color: #000000;
                                                ">
												<!--span class="input-group-addon button type="button" id="btnCari"  onclick="cari()" class="btn btn-primary" "><i class="fa fa-search"></i> Cari <span id="loading"></span-->
											</div>
										<div class="text-center" style="margin-top: 0px; font-size: small;font-family: sans-serif;"> Silahkan masukkan nomor resi, kemudian klik cari
		                                </div>
										</div>
									</div>
								</fieldset>
							</form>
					    </div>
					    
                                <script type="text/javascript">
                                function cari(){
                                	$('#loading').html("<img src='<?php echo base_url();?>assets/img/loading.gif' />");
                                	var loading = $("#loading");
                                	var selectValues = $("#resi").val();
                                	if (selectValues == 0){
                                		var msg = " Nomor Resi tidak ditemukan.";
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
                                }
                                </script>
																				
								<div class="form-actions">
									<div class="row">
										<div class="col-md-8">
											<button type="button" id="btnCari"  onclick="cari()" class="btn btn-primary"  >
												<i class="fa fa-search"></i> Cari <span id="loading"></span>
											</button>
											<!--button type="reset" name="rest" value="reset" class="btn btn-danger">
												<i class="fa fa-refresh"></i> Reset
											</button--->
										</div>
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
						<h2><span id="loading2"></span></h2>
	
					</header>
	
					<!-- widget div-->
					<div>
	
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
	
						</div>
						<!-- end widget edit box -->
	
						<!-- widget content -->
						<div class="widget-body" style="margin-top: -28px;">
							<div id="info" 
								style="
                                padding: 1px;
                                text-align: left;
                                margin: auto;
                                display: table; 
                                margin-top: -30px; 
                                max-height: 10%; 
                                max-width: 100%; 
                                border: 0px solid #4CAF50; 
                                overflow: clip; 
                                display: flow-root; ">
							</div>
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
.input-group{width:40%!important;max-width:100%;float:center;margin:0 auto;}
.form-action{width:50%;max-width:100%;float:center;margin:0 auto;padding:0 0 0 20%}
.col-md-8 {width: 100%;float:center;margin:0 0 0%; text-align: center;}
    @media (max-width: 720px) {
        .widget-body{margin-top:-20px}
    .input-group{width:90%!important;max-width:100%;float:center;}
    .form-action{width:90%;max-width:100%;float:center;margin:0 auto;padding:0}
    .col-md-8 {width: 100%;float:center;margin:0 0%;text-align: center;}
    
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
}


</style>