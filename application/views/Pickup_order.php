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
		
			<section id="contact" class="container" style="margin-top: -2em;">
				<div class="row">
					<!-- FORM -->
					<div class="col-md-8">
						<h1> <strong>Pickup Barang Sekarang !</strong> <strong><em></em></strong></h1>
						<!-- 
							if you want to use your own contact script, remove .hide class
						-->

						<!-- SENT OK -->
						<div id="_sent_ok_" class="alert alert-success fade in fsize16 hide">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Thank You!</strong> Your message successfully sent!
						</div>
						<!-- /SENT OK -->

						<!-- SENT FAILED -->
						<div id="_sent_required_" class="alert alert-danger fade in fsize16 hide">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Failed!</strong> Please complete all mandatory (*) fields!
						</div>
						<!-- /SENT FAILED -->

						<form id="contactForm" class="white-row" action="<?php echo base_url();?>web/contact_post" method="post" >
							<div class="row">
								<div class="form-group">
									<div class="col-md-10">
										<label>Nama*</label>
										<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="contact_name" id="contact_name">
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="form-group">
									<div class="col-md-10">
										<label>HP / WA*</label>
										<input type="email" value="" data-msg-required="Please enter your email address." text-type="tel" data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="contact_email" id="contact_email">
								    </div>
							    </div>
							</div>    
							<div class="row">
								<div class="form-group">
									<div class="col-md-10">
										<label>Barang Apa yang di pickup (Ket)*</label>
										<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="contact_subject" id="contact_subject" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-10">
										<label>Alamat Pickup*</label>
										<textarea maxlength="5000" data-msg-required="Please enter your message." maxlength="100" class="form-control" name="contact_message" id="contact_message"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-10">
									<input id="contact_submit" type="submit"  value="PICKUP"  class="btn btn-primary btn-lg" data-loading-text="Loading..."  onClick="document.location.reload(true)">
								</div>
							</div>
						</form>
					
					</div>
					<!-- /FORM -->

<div class='PCOnly'>
					<!-- INFO -->
					<div class="col-md-4">

						<h2>Syarat dan ketentuan Pickup</h2>
						<div> <b>Syarat dan ketentuan umum pengiriman barang</b>
						<br>
Pengirim wajib mengemas barang kirimannya dengan baik untuk melindungi isi barang kirimannya selama pengiriman.<br>
Pengirim wajib memberitahukan dengan jelas dan benar isi dan nilai barang kiriman.<br>
Keterangan yang tidak benar mengenai hal tersebut sepenuhnya menjadi tanggungjawab pengirim.<br>
Pengirim menjamin bahwa barang yang diserahkan kepada kami untuk dikirim adalah pemilik yang sah dan berhak atas kiriman tersebut.<br>
Pengirim wajib mencantumkan informasi data Pengirim dan data Penerima pada kemasan kiriman dengan lengkap dan benar serta bisa dibaca dengan jelas<br></div>
						</p>

						<div class="divider half-margins"><!-- divider -->
							<i class="fa fa-star"></i>
						</div>

						<p>
							<span class="block"><strong><i class="fa fa fa-clock-o"></i> Jam opasional Pickup:</strong></span>
							<span class="block">Senin - Sabtu: 07:00-21:00 WIB</span>
						</p>

						<div class="divider half-margins"><!-- divider -->
							<i class="fa fa-star"></i>
						</div>

					
					</div>
					<!-- /INFO -->
</div>

				</div>

			</section>

		</div>
		<!-- /WRAPPER -->
		
		<style>
		.widget-body{color:#333}
		    .form-control{border:1px solid #333}
		    .white-row{padding:0;}
		        @media (max-width: 479px) {
		            #gmap{height:200px;margin-top:-20px;}
		    .pull-right{float:left!important;margin-bottom:10px;text-align:left;}
		        }
		 .btn-primary {
    background-color: #106209 !important;
}       
		</style>
		
		