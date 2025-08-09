<!DOCTYPE html>
<html lang="en-us" id="extr-page" class="animated fadeInDown" style="background: #f4f4f4 !important;">
<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title> login ǀ Trip Cargo </title>
		<meta name="description" content="">
		<meta name="author" content="">

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
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon/favicon.ico" type="image/x-icon">  <!--?php echo base_url();?>assets/images/sancargo.png" type="image/x-icon"-->
		<link rel="icon" href="<?php echo base_url();?>assets/img/favicon/sancargo.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

		<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
		<link rel="apple-touch-icon" href="<?php echo base_url();?>assets/img/splash/sptouch-icon-iphone.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/splash/touch-icon-ipad.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/img/splash/touch-icon-iphone-retina.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/img/splash/touch-icon-ipad-retina.png"> <!-- oke-->

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
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!--possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<div class="col-11 col-sm-10 col-md-4">
<header id="header">
	<!--span id="logo"><img src="<?php echo base_url();?>assets/img/Logo Sancargo oke.png" alt="Trip Cargo"></span-->
</header>
</div>

    <h1></h1>
	<!-- MAIN CONTENT -->
	<div class="container">
			<div class="col-11 col-sm-10 col-md-4" style="margin-top: 50px;">
			    <span id="logo"><img src="https://tripcargo.test/assets/img/Logo Sancargo oke.png" alt="Trip Cargo" style="
                    width: 300px;">
                    <br>
                    </span>
				<div class="well no-padding">
					<form action="<?php echo base_url('login/login')?>" method="post" id="login-form" class="smart-form client-form" style=" z-index: 1;">
						<header>
						<b>Please Sign In</b>
						<h5 class="about-heading">Welcome 
						<span class="style5">
                        <label id="lblWelcomeTo"> to Trip Cargo Information Gateway</label>
                        </span>
                        </h5>
						</header>
    						<fieldset>
    							<?php echo $this->session->flashdata('result_login'); ?>
    							<section>
    								<label class="label">User Name</label>
    								<label class="input"> <i class="icon-append fa fa-user"></i>
    									<input id="inputUser" name="inputUser">
    									<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> User Name</b></label>
    							</section>
    
    							<section>
    								<label class="label">Password</label>
    								<label class="input"> <i class="icon-append fa fa-lock"></i>
    									<input type="password" id="inputPassword" name="inputPassword">
    									<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Password</b> </label>
    									<!-- membuat form checkbox dengan perintah menjalankan function showHide() saat diklik -->	
            							<section>
            								<label class="label"></label> <div class="input-group">
            									<input type="checkbox" onclick="showHide()"> Remember me on this device 
            								</div>
            							</section>
                                        <script type="text/javascript">
                                        function showHide() {
                                          var inputan = document.getElementById("inputPassword");
                                          if (inputan.type === "password") {
                                            inputan.type = "text";
                                                } else {
                                            inputan.type = "password";
                                                }
                                            } 
                                        </script>
    							</section>
    						</fieldset>
						
    						<footer>
    						    <div>
    						    <!--a href="https://tripcargo.test/login" data-toggle="dropdown"> lupa kata sandi</a>
    						    <br>
    						    <a id="" href="https://tripcargo.test/login" data-toggle="dropdown"><span class="hidden-xs"> Regristrasi</span></a-->
    							<a class="btn btn-link" href="https://api.whatsapp.com/send/?phone=6281289897359&text=anda+lupa+kata+sandi+atau+password+(+ketik+user+id+)+&+nomor+hanpone+%3F+&type=phone_number&app_absent=0" role="button">Forgot password?</a>
    							<button type="submit" class="btn btn-primary" onclick="submit">Sign In</button>
    							<!--button type="reset" class="btn btn-default"  onclick="reset">Daftar</button-->
    							</div>
    							<br><br>
    						</footer>
					</form>
				</div>
			</div>
    

    
    

