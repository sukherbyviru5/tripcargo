		<!-- WRAPPER -->
		<div id="wrapper">

			<!-- PAGE TITLE -->
			<header id="page-title" class="nopadding">
				<div id="a"><!-- google maps --></div>
				<script type="text/javascript">
					var	$googlemap_latitude 	= -6.40786881,
						$googlemap_longitude	= 106.82278557,
						$googlemap_zoom			= 91;
				</script>
			</header>
		
			<section id="contact" class="container">
				<div class="row">
					<!-- FORM -->
					<div class="col-md-8">
						<h1><strong>Hubungi kami</strong></h1>
					<div class='PCOnly'>	
					<p class="text-left" style="margin-top: -20px; font-size: 1.2em; line-height:25px">
					    Punya pertanyaan atau ingin melaporkan masalah pada produk atau layanan? Kami siap membantu Anda, Bantuan & Dukungan.<p>
					</div>
						<!-- SENT OK -->
						<div id="_sent_ok_" class="alert alert-success fade in fsize16 hide">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Thank You!</strong> Your message successfully sent!
						</div>
						<!-- SENT FAILED -->
						<div id="_sent_required_" class="alert alert-danger fade in fsize16 hide">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Failed!</strong> Please complete all mandatory (*) fields!
						</div>
						<!-- /SENT FAILED -->

						<form id="contactForm" class="white-row" action="<?php echo base_url();?>web/contact_post" method="post" >
							<div class="row">
								<div class="form-group">
									<div class="col-md-5">
										<label>Nama Lengkap *</label>
										<input type="text" value="" data-msg-required="Please enter your name." maxlength="30" class="form-control" name="contact_name" id="contact_name">
									</div>
									<div class="col-md-7">
										<label>Alamat E-mail *</label>
										<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="contact_email" id="contact_email">
									</div>
									<!--div class="col-md-4">
										<label>telp *</label>
										<input type="tel" value="" data-msg-required="Please enter your telp telp." data-msg-email="Please enter a telp." maxlength="14" class="form-control" name="contact_telp" id="contact_telp">
									</div-->
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Subjek *</label>
										<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="contact_subject" id="contact_subject" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Message</i></label>
										<textarea maxlength="500" data-msg-required="Please enter your message." rows="10" class="form-control" name="contact_message" id="contact_message"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<span class="pull-right"><!-- captcha -->
										<label class="block text-right fsize11">Masukan Code *</label>
										<img alt=" " rel="nofollow,noindex" width="70" height="30" src="<?php echo base_url();?>assets/php/captcha.php?bgcolor=ffffff&amp;txtcolor=000000">
										<input type="text" name="contact_captcha" id="contact_captcha" value=" " data-msg-required="Please enter the captcha." maxlength="5" style="width:"100"; margin-left:"10";" >
									</span>
									<input id="contact_submit" type="submit"  value="Send Message"  class="btn btn-primary btn-lg" data-loading-text="Loading..."  onClick="document.location.reload(true)">
								</div>
							</div>
						</form>
					
					</div>
					<!-- /FORM -->

                <div class='PCOnly'>
					<div class="col-md-4">
						<h2>Kunjungi kami</h2>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.8552503460223!2d106.8249012!3d-6.412638599999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb3649da6d21%3A0x8efd0dfce3d18a1!2sSANCARGO!5e0!3m2!1sid!2sid!4v1750049908632!5m2!1sid!2sid" width="340" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						<div class="divider half-margins"><!-- divider -->
							<i class="fa fa-star"></i>
						</div>
						<p class="text-left" style="margin-top: -20px; font-size: 1.2em; line-height:25px">
							<span class="block"><strong><i class="fa fa-map-marker"></i> Alamat:<br></strong> <?php echo $alamat_perusahaan;?></span>
							<span class="block"><strong><i class="fa fa fa-clock-o"></i> Jam Kerja:</strong></span>
							<span class="block">Senin - Sabtu: 07:00-17:00 WIB</span>
						</p>
						<div class="divider half-margins"><!-- divider -->
							<i class="fa fa-star"></i>
						</div>
					</div>
                </div>
			</div>
			</section>
		</div>
		
		<style>
		.widget-body{color:#333}
		    .form-control{border:1px solid #333}
		    .white-row{padding:0;}
		        @media (max-width: 479px) {
		            #gmap{height:200px;margin-top:-20px;}
		    .pull-right{float:left!important;margin-bottom:10px;text-align:left;}
		        }
		</style>