
<!--text/x-generic main_tracking.php ( HTML document, ASCII text )-->
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
	top: 25px; left: 50%;
	margin: 0 auto 0 25px;

}
table,
.note-editor .note-editable {
	background-color:#ffffff00;
}


</style>








<!---TANGGAL WAKTU PROMOSI-->
 



<html lang="en-us" id="extr-page" class="animated fadeInDown" style="background-color: #F2F2F2;">
<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> Cekresi ǀ Trip Cargo 
		</title>
		<meta name="description" content="Layanan cek resi untuk mengetahui status dan posisi paket anda dengan mudah secara real-time">
		<meta name="author" content="Delivery Fater">

		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Basic Styles -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/css/font-awesome.min.css">

		<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/css/smartadmin-skins.min.css">

		<!-- SmartAdmin RTL Support is under construction-->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/css/smartadmin-rtl.min.css">

		<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update. -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/css/your_style.css"> 

		


		<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url();?>assets/css/demo.min.css">

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/images/sancargo.png" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url();?>assets/img/favicon/sancargo.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?php echo base_url();?>assets/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/img/splash/touch-icon-ipad-retina.png">

		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<!-- Startup image for web apps -->
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
		<link rel="apple-touch-startup-image" href="<?php echo base_url();?>assets/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo base_url().'assets'; ?>/js/libs/jquery-2.1.1.min.js"><\/script>');
			}
		</script>

		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo base_url().'assets'; ?>/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script>


	</head>
<body>




<div id="wrapper">
	<!-- WELCOME -->
	<div class='PCOnly'>	
	<section class="subcontainer">
		<h1 class="text-center">
			<strong>CEK RESI</strong> 
		</h1>
		</div>
	<section class="container">
		
		<div class='PCOnly'>
		<p class="text-center" style="margin-top:0px;">Layanan cek resi untuk mengetahui status dan posisi paket anda dengan mudah secara real-time</p>
        </div>


		<!-- row -->
		<div class="row">
		    
			<!-- NEW WIDGET START -->
			<article class="col-sm-6 col-md-8 col-lg-4">
				<!-- Widget ID (each widget will need unique ID)-->
				
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
	                <header style="color: #fafafa; border: 0px solid #fafafa; background: #F2F2F2;">
						<span id="loading2"></span>
	
					</header>
					<!-- widget div-->
					<div style="border: 0px solid #F2F2F2; background: #F2F2F2;">
					   
	
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
	
						</div>
						<!-- end widget edit box -->
	
						<!-- widget content -->
						<div class="widget-body" style="background: #F2F2F2;" class="text-center">
							<form id="smart-form-register" class="form-horizontal" style="margin-top: 20px; color: black; border: 0px solid #fafafa; background: #F2F2F2;" >
								<fieldset>
									<div class="form-group has-success">
										<div class="col-md-8"style="margin-top: 20px;">
											
												<input type="hidden" name="id">
												<input class="form-control" type="text" placeholder="XXX99999999" name="resi" id="resi" data-mask="***99999999" data-mask-placeholder= "X">
											
										</div>
										<br>
										<div class="col-md-2">
										</div>
										<div class="col-md-2">
											
											    <button type="button" id="btnCari"  onclick="cari()" class="btn btn-primary"  >
												<i class="fa fa-search"></i> Cari <span id="loading"></span>
											</button>
												
										</div>
									</div>
									<p class="text-left"> Silahkan masukkan nomor resi, kemudian klik cari</p>
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
					
	
						<!-- widget edit box -->
					
							<!-- This area used as dropdown edit box -->
	
						
						<!-- end widget edit box -->
	
						<!-- widget content -->
						
							<div id="info" style="border: 0px solid #F2F2F2;background: #F2F2F2;"></div>
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
        </div>


     </div>
    
				  
		
