<!-- WRAPPER -->
		<div id="wrapper">

			<!-- PAGE TITLE -->
			<section id="contact" class="container">
				<div class="row">
					<!-- FORM -->
					<div class="col-md-8">
						<h1 style="margin-top: 20px;"><strong>Bergabung jadi khusus member corporate</strong></h1>
					<div class='PCOnly'>	
					<p class="text-left" style="margin-top: -20px; font-size: 1.2em; line-height:25px">
					    Untuk para pelanggan corporate yang ingin pembayaran lebih fleksibel (atau tempo) silahkan isi form berikut ini<p>
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
									<div class="col-md-6">
										<label>Nama Perusahaan <a>*</a></label>
										<input type="text" value="" data-msg-required="Please enter your name." maxlength="30" class="form-control" name="contact_name" id="contact_name">
									</div>
									<div class="col-md-6">
										<label>E-mail <a>*</a></label>
										<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="contact_email" id="contact_email">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label>PIC <a>*</a></label>
										<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="contact_subject" id="contact_subject" >
									</div>
									<div class="col-md-6">
										<label>telp <a>*</a></label>
										<input type="tel" value="" data-msg-required="Please enter your telp telp." data-msg-email="Please enter a telp." maxlength="14" class="form-control" name="contact_telp" id="contact_telp">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Alamat Kantor <a>*</a></i></label>
										<textarea maxlength="300" data-msg-required="Please enter your message." rows="3" class="form-control" name="contact_message" id="contact_message"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<!---span class="pull-right"><!-- captcha -->
										<!---label class="block text-right fsize11">Masukan Code <a>*</a></label>
										<img alt=" " rel="nofollow,noindex" width="70" height="30" src="<?php echo base_url();?>assets/php/captcha.php?bgcolor=ffffff&amp;txtcolor=000000">
										<input type="text" name="contact_captcha" id="contact_captcha" value=" " data-msg-required="Please enter the captcha." maxlength="5" style="width:"100"; margin-left:"10";" >
									</span--->
									<input id="contact_submit" type="submit"  value="Send Message"  class="btn btn-primary btn-lg" data-loading-text="Loading..."  onClick="document.location.reload(true)">
								</div>
							</div>
						</form>
					
					</div>
					<!-- /FORM -->

                <div class='PCOnly'>
					<div class="col-md-4" style="margin-top: 20px;">
					    <img style="border:1px solid #cd9393" src="<?php echo base_url();?>assets/img/KERJASAMA.jpg" width="350" height="auto"/>
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