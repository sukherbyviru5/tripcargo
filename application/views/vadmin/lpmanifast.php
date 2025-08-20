<!-- Google tag (gtag.js) -->
<!--script async src="https://www.googletagmanager.com/gtag/js?id=G-4MZKHD3L34"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4MZKHD3L34');
</script-->

<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Cetak Manifest</li>
	</ol>
</div>	
<div id="content">
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		
		<!-- row -->
		<div class="row">
	
		
			<!-- WIDGET END -->
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
	
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
						<h2>Daftar Manifest <span id="loading2"></span></h2>
	
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
	
						
						<table id="table" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone" style="width:10px;">No</th>
										<th data-class="phone" style="width:auto;"><i class="fa fa-fw fa-list-alt text-muted hidden-md hidden-sm hidden-xs"></i> Manifest</th>
										<th data-class="phone"style="width:auto;"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Driver</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> HP Driver</th>
										<th data-class="phone" style="width:auto;"><i class="fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-info text-muted hidden-md hidden-sm hidden-xs"></i> Remark</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> User_Id</th>
										<th data-hide="phone,tablet" style="width:90px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
										
									</tr>
								</thead>
							</table>
		
	
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

<!-- ui-dialog -->
<div id="dialog_simple" title="Dialog Simple Title">
	<p>
		Apakah anda yakin akan menghapus data ini?
	</p>
</div>
<style>
.modal-dialog{
  max-width: 100%;

}
</style>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Pengguna</h3>
            </div>
            <div class="modal-dialog modal-md">
                <form action="#" id="form" class="responsive">
                    <input type="hidden" value="" name="id"> 
                    <div class="modal-body form">
						<!-- tampilkan table resi -->
						<table id="table-resi" class="table table-striped table-bordered table-hover">
							<thead>			                
								<tr>
									<th data-hide="phone" style="width:30px;">No</th>
									<th data-hide="expand sorting_1 "><i style="width:130px;" class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal</th>
									<th data-class="phone" ><i style="width:auto;" class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i> Resi</th>
									<th data-class="phone" ><i style="width:60px;" class="fa fa-user fa-lg  text-muted hidden-md hidden-sm hidden-xs"></i> Penerima</th>
									<th data-hide="phone" ><i style="width:auto;" class="fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan</th>
									<th data-class="phone,tablet" style="width:40px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
								</tr>
							</thead>
						</table>
						<!-- end tampilkan table resi -->
						<br><br><br>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!
	// add barang via barcode 
	$("#resi").keyup(function(e){
		if (e.which==13) { // 13 is the code for return
			var table 	= $('#table-temp').DataTable();
			$('#load').html("<img src='<?php echo base_url()."assets/img/loading.gif";?>' />");
			var loading = $("#load");
			// var resi =$('#resi').val();
			var kode = {resi:$("#resi").val()};
			$.ajax({
				type: "POST",
				url : "<?php echo base_url().'cadmin/home/manifast_add_temp_barcode';?>",
				data: kode,
				beforeSend: function(){
				   // $("#loaderDiv").show();
				   loading.fadeIn();						
				},
				
				success: function(status)
				{
					$('#resi').val('');
					loading.fadeOut();
					loading.hide();
					table.ajax.reload();
					
					data_json = JSON.stringify(status, replacer);
					function replacer(json_key, json_value) {
					  if (json_key == 'pesan') {
						 json_value = json_value.toUpperCase();
					  }
					  // alert(json_value);
					  var obj = JSON.parse(json_value);
					  document.getElementById("demo").innerHTML = obj.pesan ;//+ ", " + obj.status;
					}
				},
				error: function (xhr, status, msg) {
					alert('Status: ' + status + "\n" + msg);
				}
			});
		   $("#namabar").focus();
		}else {
			// Do whatever you like
		}
		e.preventDefault();
	});
	
	var save_method; //for save method string
	save_method="add";
	$('#dialog_simple').dialog({
			autoOpen : false,
	});
	
	function add_resi()
	
	{
		save_method = 'add';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#modal_form').modal('show'); // show bootstrap modal
		$('.modal-title').text('Pencairan Resi'); // Set Title to Bootstrap modal title
	}
	function cetak(id){
		window.open("<?php echo base_url();?>cadmin/laporan/cetak_manifast/"+id);
	}
	function tambah_resi(id){
		
		var resi	=id;
		$('#modal_form').modal('hide');
		var data 	= {resi:resi};
		var table 	= $('#table-temp').DataTable();
		$('#loadadd').html("<img src='<?php echo base_url()."assets/img/loading.gif";?>' />");
		var loading = $("#loadadd");
		// alert('sukses'+id);
		$.ajax({
				type: "POST",
				url : "<?php echo base_url().'cadmin/home/manifast_add_temp';?>",
				data: data,
				beforeSend: function(){
				   // $("#loaderDiv").show();
				   loading.fadeIn();						
				},
				success: function(msg){
					// alert('Info: '+msg);
					table.ajax.reload();
					loading.fadeOut();
					loading.hide();
					// $('#smart-form-temp')[0].reset();
				}
		});
	}
	

	function hapus(id) {
	
			$('#dialog_simple').dialog({
			autoOpen : false,
			width : 300,
			resizable : false,
			modal : true,
			title : "Hapus Data",
			buttons : [{
				html : "<i class='fa fa-trash-o'></i>&nbsp; Ya, Benar",
				"class" : "btn btn-danger",
				click : function() {
					$(this).dialog("close");
					
					var kode = {id:id};
					var table = $('#table').DataTable();
					$('#loading2').html("<img src='<?php echo base_url().'assets/';?>img/loading.gif' />");
					var loading = $("#loading2");
					// alert('sukses'+id);
					$.ajax({
							type: "POST",
							url : "<?php echo base_url().'cadmin/home/manifast_hapus';?>/"+id,
							data: kode,
							// dataType: "JSON",
							beforeSend: function(){
							   // $("#loaderDiv").show();
							   loading.fadeIn();						
							},
							success: function(status){
								alert(status);
								table.ajax.reload();
								loading.fadeOut();
								loading.hide();
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error hapus data');
								loading.fadeOut();
								loading.hide();
							}
					});
					//--------------------
				}
			}, {
				html : "<i class='fa fa-times'></i>&nbsp; Batal",
				"class" : "btn btn-default",
				click : function() {
					$(this).dialog("close");
				}
			}]
		});
		
		$('#dialog_simple').dialog('open');
			return false;
			
	}
	function hapus_temp(id) {
	
			$('#dialog_simple').dialog({
			autoOpen : false,
			width :300,
			resizable : false,
			modal : true,
			title : "Hapus Data",
			buttons : [{
				html : "<i class='fa fa-trash-o'></i>&nbsp; Ya, Benar",
				"class" : "btn btn-danger",
				click : function() {
					$(this).dialog("close");
					
					var kode = {id:id};
					var table = $('#table-temp').DataTable();
					$('#loadadd').html("<img src='<?php echo base_url().'assets/';?>img/loading.gif' />");
					var loading = $("#loadadd");
					// alert('sukses'+id);
					$.ajax({
							type: "POST",
							url : "<?php echo base_url().'cadmin/home/manifast_temp_hapus';?>/"+id,
							data: kode,
							// dataType: "JSON",
							beforeSend: function(){
							   // $("#loaderDiv").show();
							   loading.fadeIn();						
							},
							success: function(status){
								alert(status);
								table.ajax.reload();
								loading.fadeOut();
								loading.hide();
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error hapus data');
								loading.fadeOut();
								loading.hide();
							}
					});
					//--------------------
				}
			}, {
				html : "<i class='fa fa-times'></i>&nbsp; Batal",
				"class" : "btn btn-default",
				click : function() {
					$(this).dialog("close");
				}
			}]
		});
		
		$('#dialog_simple').dialog('open');
			return false;
			
	}

	/*
	* DIALOG SIMPLE
	*/

	// Dialog click
	$('#dialog_link').click(function() {
		$('#dialog_simple').dialog('open');
		return false;
		

	});
			
	function reload_table()
	{
		var table = $('#table').dataTable();
		table.ajax.reload();
	}
	
	
	function save()
	{
		$('#btnSave').text('Menyimpan...'); //change button text
		$('#btnSave').attr('disabled',true); //set button disable 
		
		if(save_method=="add"){
			$('[name="simpan"]').val('add');
		}else{
			$('[name="simpan"]').val('update');
		}
		var url;
	   
			url = "<?php echo base_url().'cadmin/home/manifast_add';?>";
			
		
	if($('[name="tgl"]').val()=='' || $('[name="driver"]').val()=='' || $('[name="tujuan"]').val()==''){
			alert('Data Kosong','Error');
			// $('#smart-form-register')[0].checkValidity();
			
			$('#btnSave').text('Simpan'); //change button text
			$('#btnSave').attr('disabled',false); //set button disable 
		}else{
		// ajax adding data to database

			$.ajax({
				url : url,
				type: "POST",
				data: $('#smart-form-register').serialize(),
				dataType: "JSON",
				success: function(data)
				{

					if(data.status) //if success close modal and reload ajax table
					{
						
						$('#table').DataTable().ajax.reload();
						$('#table-temp').DataTable().ajax.reload();
						$('#smart-form-register')[0].reset();
						save_method="add";
						alert('Posting/Update Sukses');
					}
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 

				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 

				}
			});
		}
	}
	
</script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!
var table;

$(document).ready(function() {

    //datatables
    var responsiveHelper_dt_basic = undefined;
    var responsiveHelper_dt_basic2 = undefined;
    var responsiveHelper_dt_basic3 = undefined;
		
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};
		
	table = $('#table').DataTable({ 
		 
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
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/manifast_ajax_list')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table'), breakpointDefinition);
				}
			},
		"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			},
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
    });
	
	table = $('#table-resi').DataTable({ 
		 
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
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/resi_ajax_list')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic2) {
					responsiveHelper_dt_basic2 = new ResponsiveDatatablesHelper($('#table-resi'), breakpointDefinition);
				}
			},
		"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic2.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic2.respond();
			},
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": true, //set not orderable
			 "order": [[ 1, "asc" ]]
        },
        ],
    });
	table = $('#table-temp').DataTable({ 
		 
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
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/manifast_temp_ajax_list')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic3) {
					responsiveHelper_dt_basic3 = new ResponsiveDatatablesHelper($('#table-temp'), breakpointDefinition);
				}
			},
		"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic3.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic3.respond();
			},
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": true, //set not orderable
			 "order": [[ 1, "asc" ]]
        },
        ],
    });
	
	$('#resi').focus();
	$.ajax({
        url: "<?php echo base_url('cadmin/users/getNom'); ?>",
        success: function (data) {
            $('#txNom').val(data);
        }
    });
	
});
</script>
