<link href="<?php echo base_url().'assets/css/invoice.min.css';?>" rel="stylesheet">	
<div id="content">
	<!-- row -->
	<!--div class="row">
		<!-- MODAL PLACE HOLDER -->
		<!--div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" >
			<div class="modal-dialog" style="width:550px;">
				<div class="modal-content" ></div>
			</div>
		</div>
		<!-- END MODAL -->
		<!-- Button trigger modal -->
		<div class="widget-body no-padding">
		    <div class="widget-body-toolbar">
                        <!-- widget content -->    
				        <div class="col-sm-6">
						    <div id="smart-form-register" class="smart-form" novalidate="novalidate">
								<section class="col-sm-4">
								<label>Pilih berdasarkan pereode tanggal</label>
								</section>
								<section class="col-sm-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="tgl1" placeholder="Mulai" class="datepicker" data-dateformat='dd-mm-yy'>
									</label>
								</section>
								<section class="col-sm-4">
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="tgl2" placeholder="s.d. tgl" class="datepicker" data-dateformat='dd-mm-yy'>
									</label>
								</section>
								<!---section class="col-sm-3">
									<label class="input"> <i class="icon-append fa fa-users"></i>
									<input type="hidden" name="pel_id">
									<input type="text" name="nama_pel" placeholder="Nama / Dept / Kota" >
									</label>
									</label>
								</section-->
						    </div>
				        </div>
        				<div class="col-sm-6 text-align-left">
        					<!---div class="btn-group">
        						<a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="load_pengirim()" title="Cari Pengirim"> <i class="fa fa-search"></i> Cari </a>
        					</div--->
        					<div class="btn-group">
        						<a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="cari()" title="Tampilkan Stok"> <i class="fa fa-external-link"></i> Tampilkan <span id="loading"></span></a>
        					</div>
        					<div class="btn-group">
        						<a href="javascript:void(0)" class="btn btn-sm btn-info" onclick="cetak()" title="Cetak ke Printer"> <i class="fa fa-print"></i> Cetak</a>
        					</div>
        				</div>
                <!-- end widget content -->
		    </div>
		</div>
    </div>
<!-- end row -->

	<!-- NEW COL START -->
<div>	
		<article class="col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget" id="wid-id-12" data-widget-editbutton="false" data-widget-custombutton="false"  >
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
					<h2>Laporan Pengiriman Paket</h2>
				</header>

				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->
						<!-- widget content -->
					<div class="container-fluid">
							<div id="info">
							</div>
					</div>
					<br>
					<!-- end widget content -->
				</div>
				<br>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- END COL -->
		
</div>
</div>


</section>
<style>
.my-custom-scrollbar {
position: relative;
height: 100%;
overflow: auto;
}
.table-wrapper-scroll-y {
display: none;
}
</style>
<!-- end row -->
</div>
<!-- Bootstrap modal -->
<!--div class="modal fade" id="modal_form_pengirim" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Cari Pengirim</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <table id="datatable_pengirim" class="table table-striped table-bordered table-hover" max-width="100%" width="100%">
						<thead>			                
							<tr>
								<th data-hide="phone" style="width:5%;">No.</th>
								<th data-class="phone">Dept / Bag</th>
								<th data-class="expand" >Nama</th>
								<th data-hide="phone" >Alamat</th>
								<th data-hide="phone" >Kota/Kab</th>
								<th data-hide="phone,tablet" style="width:8%;">Act</th>
								
							</tr>
						</thead>
					</table>
                </form>
            </div>
            <br>
        </div><!-- /.modal-content -->
    <!--/div--><!-- /.modal-dialog -->
<!--/div--><!-- /.modal -->

<!-- Bootstrap modal -->
<script type="text/javascript">
function load_pengirim()
{   
    //$('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form_pengirim').modal('show'); // show bootstrap modal
    $('.modal-title').text('Cari Pengirim'); // Set Title to Bootstrap modal title
}
function pilih_pengirim(id,nama)
{
	// ajax delete data to database
	$('[name="pel_id"]').val(id);
	$('[name="nama_pel"]').val(nama);

	$('#modal_form_pengirim').modal('hide');
}
function cari() {
	$('#loading').html("<img src='<?php echo base_url()."assets/img/loading.gif";?>' />");
	var tampilkan = $("#info");
	var loading = $("#loading");
	tampilkan.hide();
	
	var tgl1 	= $('[name="tgl1"]').val();
	var tgl2 	= $('[name="tgl2"]').val();
	var pel_id 	= $('[name="pel_id"]').val();
	var nama_pel 	= $('[name="nama_pel"]').val();

	
	if(tgl1 == "" && tgl2=="" ){
	   var error = true;
	   alert("Maaf, Field masih kosong");
	   loading.fadeOut();
	   return (false);
	   
	 }
	var id = {tgl1:tgl1,tgl2:tgl2, pel_id:pel_id, nama_pel:nama_pel};
	$.ajax({
			type: "POST",
			url : "<?php echo base_url().'cadmin/laporan/cetak_invoice';?>",
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

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!
var table;

$(document).ready(function() {

    //datatables
	 var responsiveHelper_datatable_pengirim = undefined;
	 
		
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};
    
    table = $('#datatable_pengirim').DataTable({ 
		 
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 
			{
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'A4'
            },'print'
		],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[ 1, "desc" ]],

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/pelanggan_ajax_list_2')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_datatable_pengirim) {
					responsiveHelper_datatable_pengirim = new ResponsiveDatatablesHelper($('#datatable_pengirim'), breakpointDefinition);
				}
			},
		"rowCallback" : function(nRow) {
				responsiveHelper_datatable_pengirim.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_datatable_pengirim.respond();
			},
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
		
        ],


    });
    
});

</script>
