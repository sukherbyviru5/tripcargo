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
											<button type="button" style="margin-top: 3px;" id="ScanQrCode"
                                                                            onclick="openScanner()" class="btn btn-info">Scan QR</button>
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

 <!-- Bootstrap Modal for QR Scanner -->
<div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="qrModalLabel">Scan QR Code</h4>
            </div>
            <div class="modal-body">
                <div id="qr-reader"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>
<style>
    .modal-body {
        text-align: center;
    }
    #qr-reader {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }
</style>

 <script>
    let html5QrCode; 

	function openScanner() {
		$('#qrModal').modal('show');

		if (!html5QrCode) {
			html5QrCode = new Html5Qrcode("qr-reader");
		}

		const config = { fps: 10, qrbox: { width: 250, height: 250 } };

		$('#qrModal').off('shown.bs.modal').on('shown.bs.modal', function () {
			html5QrCode.start(
				{ facingMode: "environment" },
				config,
				(decodedText, decodedResult) => {
					$('#resi').val(decodedText);

					$('#tgl').fadeOut();
					$('#loading').html("&emsp; &emsp;<img src='<?php echo base_url();?>assets/img/loading.gif' />");
					var loading = $("#loading");

					if (decodedText.trim() === "") {
						var msg = "&emsp; &emsp;<b>Resi tidak ditemukan</b>";  
						$('#info').html(msg);
					} else {
						$.ajax({
							type: "POST",
							url : "<?php echo site_url('cadmin/home/lacak_resi')?>",
							data: { resi: decodedText },
							beforeSend: function(){
								loading.fadeIn();						
							},
							success: function(msg){
								$('#info').html(msg);
								loading.fadeOut();
							}
						});
					}

					html5QrCode.stop().then(() => {
						$('#qrModal').modal('hide');
					}).catch(err => {
						console.error("Error stopping scanner: ", err);
					});
				},
				(errorMessage) => {
					console.warn("QR Scan Error: ", errorMessage);
				}
			).catch(err => {
				console.error("Error starting scanner: ", err);
			});
		});

		$('#qrModal').off('hidden.bs.modal').on('hidden.bs.modal', function () {
			if (html5QrCode) {
				html5QrCode.stop().catch(err => {
					console.error("Error stopping scanner: ", err);
				});
			}
		});
	}

</script>
