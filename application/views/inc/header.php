<!DOCTYPE html>
<html lang="en-us" >
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179642767-1"></script>
        <script>
         window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-179642767-1');
        </script>

		<title> APP - Trip Cargo </title>
		<meta name="description" content="App || Trip Cargo">
	    <meta property="og:url" content="">
	    <meta property="og:url" content="">
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
		<link rel="shortcut icon" href="<?php echo base_url();?>assets/img/favicon/sancargo1.png" type="image/x-icon">
		<link rel="icon" href="<?php echo base_url();?>assets/img/favicon/sancargo1.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

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
	<body >

		<!-- POSSIBLE CLASSES: minified, fixed-ribbon, fixed-header, fixed-width
			 You can also add different skin classes such as "smart-skin-1", "smart-skin-2" etc...-->
		
				<!-- HEADER -->
				<header id="header">
					<div id="logo-group">

						<!-- PLACE YOUR LOGO HERE -->
						<!--img src="https://tripcargo.test/assets/upload/<?php foreach($record  as $row){?><?php echo $row->foto;?><?php }?> " width="165px" class="img-circle img-responsive" -->
						<!--span id="logo" style="width: 27px;"> <img src="https://tripcargo.test/assets/upload/<?php foreach($record  as $row){?><?php echo $row->foto;?><?php }?>" width="5px" class="img-circle img-responsive" alt="<?php foreach($record  as $row){?><?php echo $row->namalengkap;?><?php }?>"> </span-->
						<!-- END LOGO PLACEHOLDER -->

						<!-- Note: The activity badge color changes when clicked and resets the number to 0
						Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
						<!--span id="activity" class="activity-dropdown"> <i class="fa fa-user"></i> <b class="badge"> 0 </b> </span-->

						<!-- AJAX-DROPDOWN : control this dropdown height, look and feel from the LESS variable file -->
						<!--div class="ajax-dropdown">

							<!-- the ID links are fetched via AJAX to the ajax container "ajax-notifications" -->
							<!--div class="btn-group btn-group-justified" data-toggle="buttons">
								<label class="btn btn-default">
									<input type="radio" name="activity" id="<?php echo base_url(); ?>/ajax/notify/mail.php">
									Msgs (0) </label>
								<label class="btn btn-default">
									<input type="radio" name="activity" id="<?php echo base_url(); ?>/ajax/notify/notifications.php">
									notify (0) </label>
								<label class="btn btn-default">
									<input type="radio" name="activity" id="<?php echo base_url(); ?>/ajax/notify/tasks.php">
									Tasks (0) </label>
							</div-->

							<!-- notification content -->
							<!--div class="ajax-notifications custom-scroll">

								<div class="alert alert-transparent">
									<h4>Click a button to show messages here</h4>
									This blank page message helps protect your privacy, or you can show the first message here automatically.
								</div>

								<i class="fa fa-lock fa-4x fa-border"></i>

							</div-->
							<!-- end notification content -->

							<!-- footer: refresh area -->
							<!--span> Last updated on: 12/12/2013 9:43AM
								<button type="button" data-loading-text="<i class='fa fa-refresh fa-spin'></i> Loading..." class="btn btn-xs btn-default pull-right">
									<i class="fa fa-refresh"></i>
								</button> </span-->
							<!-- end footer -->

						</div>
						<!-- END AJAX-DROPDOWN -->
					</div>
                    
					<!-- projects dropdown -->
					<div class="project-context hidden-xs">   
					</div>
					<!-- end projects dropdown -->


					<!-- pulled right: nav area -->
					<div class="pull-right">
                        
						<!-- collapse menu button -->
						<div id="hide-menu" class="btn-header pull-right">
							<span> <a href="javascript:void(0);" title="Collapse Menu" data-action="toggleMenu"><i class="fa fa-reorder"></i></a> </span>
						</div>
						<!-- end collapse menu -->

						<!-- #MOBILE -->
						<!-- Top menu profile link : this shows only when top menu is active -->
						
						<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-top-10 padding-bottom-5">
							<li class="">
								<!--a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"-->
								<div href="#"  class="dropdown-toggle no-margin userdropdown " data-toggle="dropdown" aria-expanded="true" style="font-size: 0.7em;font-weight: bold;">  
								    <!--img src="<?php echo base_url();?>assets/img/avatars/5.png" alt="John Doe" class="online" /-->
									<!--img src="<?php echo base_url();?>/assets/images/avatar_2x.png" alt=" " class="online" /-->
									<img src="https://tripcargo.test/assets/upload/<?php foreach($record  as $row){?><?php echo $row->foto;?><?php }?>" width="28px" class="img-circle img-responsive" alt="<?php foreach($record  as $row){?><?php echo $row->namalengkap;?><?php }?>">
									<!--?=$this->session->userdata('nama_pengguna')?-->
									<!--br-->
									<!--?=$this->session->userdata('user_id')?> | <!--?=$this->session->userdata('area')?-->
								</div>
								<ul class="dropdown-menu pull-right">
								    <!--li>
										<a href="<?php echo base_url(); ?>cadmin/home/profile" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u> P</u>rofile: ID<?=$this->session->userdata('user_id')?> | <?=$this->session->userdata('level')?></a>
									</li-->
									<!--li class="divider"></li-->
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0"><i class="fa fa-cog"></i> Setting</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="<?php echo base_url(); ?>cadmin/home/profile" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>rofile</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> <u>S</u>hortcut</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full <u>S</u>creen</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="<?php echo base_url().'cadmin/home/logout';?>" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>L</u>ogout</strong></a>
									</li>
								</ul>
							</li>
							<!--li style="vertical-align: sub;" class=" font-semll font-md"><!--?=$this->session->userdata('nama_pengguna')?> | <!--?=$this->session->userdata('user_id')?> | <!--?=$this->session->userdata('area')?></li-->
						</ul>

						<!-- logout button -->
						<div id="logout" class="btn-header transparent pull-right">
							<span> <a href="<?php echo base_url(); ?>cadmin/home/logout" title="Sign Out" data-action="userLogout" data-logout-msg="You can improve your security further after logging out by closing this opened browser"><i class="fa fa-sign-out"></i></a> </span>
						</div>
						<!-- end logout button -->

						<!-- search mobile button (this is hidden till mobile view port) -->
						<div id="search-mobile" class="btn-header transparent pull-right">
							<span> <a href="javascript:void(0)" title="Search"><i class="fa fa-search"></i></a> </span>
						</div>
						<!-- end search mobile button -->

						<!-- input: search field -->
						<form action="<?php echo base_url(); ?>cadmin/home/search" class="header-search pull-right">
							<input type="text" name="param" placeholder="No. Airway bill (AWB)" id="search-fld">
							<button type="submit">
								<i class="fa fa-search"></i>
							</button>
							<a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
						</form>
						<!-- end input: search field -->

						<!-- fullscreen button -->
						<div id="fullscreen" class="btn-header transparent pull-right">
							<span> <a href="javascript:void(0);" title="Full Screen" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i></a> </span>
						</div>
						<!-- end fullscreen button -->
						
						<!-- #Voice Command: Start Speech -->
						<div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
							<div> 
								<a href="javascript:void(0)" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a> 
								<div class="popover bottom"><div class="arrow"></div>
									<div class="popover-content">
										<h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
										<h4 class="vc-title-error text-center">
											<i class="fa fa-microphone-slash"></i> Voice command failed
											<br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
											<br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
										</h4>
										<a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a> 
										<a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a> 
									</div>
								</div>
							</div>
						</div>
						<!-- end voice command -->
						
						<!-- multiple lang dropdown : find all flags in the flags page -->
											
						<!---ul class="header-dropdown-list hidden-xs">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
									<img src="<?php echo base_url();?>assets/img/blank.gif" class="flag flag-id" alt="Indonesia"> <span> Indonesia (ID) </span> <i class="fa fa-angle-down"></i> </a>
								<ul class="dropdown-menu pull-right">
									<li class="active">
										<a href="javascript:void(0);"><img src="<?php echo base_url();?>assets/img/blank.gif" class="flag flag-id" alt="Indonesia"> Indonesia (ID)</a>
									</li>
															
								</ul>
							</li>
						</ul--->
						
						<!-- end multiple lang -->

					</div>
					<!-- end pulled right: nav area -->

				</header>
				<!-- END HEADER -->

				<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
				Note: These tiles are completely responsive,
				you can add as many as you like
				-->
				<div id="shortcut">
					<ul>
						
						<li>
							<a href="<?php echo base_url(); ?>cadmin/home/profile" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
						</li>
					</ul>
				</div>
				<!-- END SHORTCUT AREA -->

		