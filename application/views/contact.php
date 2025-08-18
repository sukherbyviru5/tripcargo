<!-- WRAPPER -->
<div id="wrapper">

	<!-- PAGE TITLE -->
	<header id="page-title" class="nopadding">
		<div id="a"></div>
		<script type="text/javascript">
			var $googlemap_latitude = -6.40786881,
				$googlemap_longitude = 106.82278557,
				$googlemap_zoom = 15; // Zoom disesuaikan ke nilai yang lebih masuk akal (91 terlalu besar)
		</script>
	</header>

	<section id="contact" class="container">
		<div class="row">
			<!-- FORM -->
			<div class="col-md-8">
				<h1><strong>Hubungi kami</strong></h1>
				<div class="PCOnly">	
					<p class="text-left" style="margin-top: -20px; font-size: 1.2em; line-height: 25px">
						Punya pertanyaan atau ingin melaporkan masalah pada produk atau layanan? Kami siap membantu Anda, Bantuan & Dukungan.
					</p>
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

				<form id="contactForm" class="white-row" action="<?php echo base_url();?>web/contact_post" method="post">
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
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Subjek *</label>
								<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="contact_subject" id="contact_subject">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<label>Message</label>
								<textarea maxlength="500" data-msg-required="Please enter your message." rows="10" class="form-control" name="contact_message" id="contact_message"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input id="contact_submit" type="submit" value="Send Message" class="btn btn-primary btn-lg" data-loading-text="Loading...">
						</div>
					</div>
				</form>
			</div>
			<!-- /FORM -->

			<div class="PCOnlys">
				<div class="col-xs-12 col-md-4">
					<h2>Kunjungi kami</h2>
					<?php $maps_links = isset($contact[0]['maps_link']) ? json_decode($contact[0]['maps_link'], true) : ['']; ?>
					<?php foreach ($maps_links as $i => $link): ?>
						<?php if (!empty(trim($link))): ?>
							<p>
								<strong style="margin: 0 0 0 2px;">Maps <?= $i+1 ?></strong>
								<iframe class="responsive-iframe" src="<?= $link ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
							</p>
						<?php endif; ?>
					<?php endforeach; ?>
					<div class="divider half-margins">
						<i class="fa fa-star"></i>
					</div>
					<p class="text-left" style="margin-top: -20px; font-size: 1.2em; line-height: 25px">
						<span class="block"><strong><i class="fa fa-map-marker"></i> Alamat:<br></strong> 
						<?php
							$alamat = isset($contact[0]['alamat']) ? json_decode($contact[0]['alamat'], true) : [''];
							if (!is_array($alamat)) {
								$alamat = [''];
							}
							foreach ($alamat as $i => $no) {
								echo '<span>' . htmlspecialchars(trim($no)) . '</span>';
								if ($i < count($alamat) - 1) {
									echo ' - ';
								}
							}
						?>
						</span><br>
						<span class="block"><strong><i class="fa fa-clock-o"></i> Jam Kerja:</strong></span>
						<span class="block"><?= $contact[0]['jam_kerja'] ?></span>
					</p>
					<div class="divider half-margins">
						<i class="fa fa-star"></i>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<style>
.widget-body {
	color: #333;
}
.form-control {
	border: 1px solid #333;
}
.white-row {
	padding: 0;
}
.responsive-iframe {
	width: 100%;
	height: 200px;
	border-radius: 3px;
}
@media (max-width: 767px) {
	#gmap {
		height: 200px;
		margin-top: -20px;
	}
	.PCOnlys {
		margin-top: 20px;
	}
	.responsive-iframe {
		width: 100%;
		height: 150px; 
	}
	.pull-right {
		float: left !important;
		margin-bottom: 10px;
		text-align: left;
	}
	.col-md-8, .col-md-4 {
		width: 100%;
	}
}
</style>