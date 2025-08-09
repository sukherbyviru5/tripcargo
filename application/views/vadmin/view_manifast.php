<link href="<?php echo base_url().'assets/css/invoice.min.css';?>" rel="stylesheet">	
<div id="content">
	<!-- row -->
	<div class="row">
		<!-- MODAL PLACE HOLDER -->
		<div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" >
			<div class="modal-dialog" style="width:550px;">
				<div class="modal-content" ></div>
			</div>
		</div>
		<!-- END MODAL -->
		<!-- Button trigger modal -->
		<div class="widget-body no-padding">
		<div class="widget-body-toolbar">

				<div class="col-sm-7">
						
					<!-- widget content -->
						
						<div id="smart-form-register" class="smart-form" novalidate="novalidate">
								<section class="col-sm-3">
								<label>Pilih berdasarkan</label>
								</section>
								<section class="col-sm-3">
									<label class="input"> <i class="icon-append fa fa-barcode"></i>
									<input type="text" name="resi" placeholder="Nomor Resi" class="form-control" placeholder="XXX99999999" name="resi" id="resi" data-mask="***-9999999" data-mask-placeholder= "X">
									</label>
								</section>
								<section class="col-sm-3">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="tgl1" placeholder="Mulai" class="datepicker" data-dateformat='dd-mm-yy'>
									</label>
								</section>
								<section class="col-sm-3">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="tgl2" placeholder="s.d. tgl" class="datepicker" data-dateformat='dd-mm-yy'>
									</label>
								</section>
								
						</div>
					<!-- end widget content -->
				</div>

				<div class="col-sm-5 text-align-left">
					<div class="btn-group">
						<a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="cari()" title="Tampilkan Stok"> <i class="fa fa-external-link"></i> Tampilkan <span id="loading"></span></a>
					</div>
					<div class="btn-group">
						<a href="javascript:void(0)" class="btn btn-sm btn-info" onclick="cetak()" title="Cetak ke Printer"> <i class="fa fa-print"></i> Cetak</a>
					</div>
					

				</div>

		

		</div>
		</div>
		
	
</div>

<!-- end row -->
<!-- widget grid -->
<section id="widget-grid" class="">
<!-- row -->
<div class="row">

	<!-- a blank row to get started -->
	
		


	<!-- a blank row to get started -->
	<!-- NEW COL START -->
		<article class="col-sm-12 col-md-12 col-lg-12">
			
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
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
					<span class="widget-icon"> <i class="fa fa-list"></i> </span>
					<h2>Laporan Manifast</h2>				
					
				</header>

				<!-- widget div-->
				<div>
					
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
						
					</div>
					<!-- end widget edit box -->
					
					<!-- widget content -->
					<div class="table-wrapper-scroll-y my-custom-scrollbar">
						
							
							<div id="info"></div>
						
					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>
			<!-- end widget -->
			
	
		</article>
		<!-- END COL -->
		
</div>
</section>
<style>
.my-custom-scrollbar {
position: relative;
height: 400px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<!-- end row -->
</div>

<script type="text/javascript">
function cari() {
	$('#loading').html("<img src='<?php echo base_url()."assets/img/loading.gif";?>' />");
	var tampilkan = $("#info");
	var loading = $("#loading");
	tampilkan.hide();
	
	var resi 	= $('[name="resi"]').val();
	var tgl1 	= $('[name="tgl1"]').val();
	var tgl2 	= $('[name="tgl2"]').val();

	
	if(tgl1 == "" && tgl2=="" ){
	   var error = true;
	   alert("Maaf, Field masih kosong");
	   loading.fadeOut();
	   return (false);
	   
	 }
	var id = {tgl1:tgl1,tgl2:tgl2,resi:resi};
	$.ajax({
			type: "POST",
			url : "<?php echo base_url().'cadmin/laporan/cetak_manifast';?>",
			data: id,
			beforeSend: function(){
			   // $("#loaderDiv").show();
			   loading.fadeIn();						
			},
			success: function(msg){
				// $('#info').html(msg);
				  loading.fadeOut();
				  tampilkan.html(msg);
				  loading.hide();
				  tampilkan.fadeIn(1000);
			}
	});
}
// run pagefunction

function cetak(){
	// Do print the page
	if (typeof(window.print) != 'undefined') {
		window.print();
	}
}

</script>  