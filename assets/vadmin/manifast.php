<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Buat Manifest</li>
	</ol>
</div>	
<div id="content">
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		
		<!-- row -->
		<div class="row">
	
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
	
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
						<h2>Buat Manifest (dalam proses pengerjaan)</h2>
	
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
									<legend>Manifest</legend>
									<div class="form-group has-success col-md-12">
										<label class="col-md-2 control-label">Tanggal</label>
										<div class="col-md-3">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="datepicker form-control"placeholder="Tanggal Dikirim" type="text" name="tgl" maxlength="50" data-dateformat="dd-mm-yy">
												<span class="input-group-addon"><i class="glyphicon glyphicon-calendar" ></i></span>
											</div>
										</div>
										<label class="col-md-2 control-label">No Manifest</label>
										<div class="col-md-3">
											<div class="input-group">
												<input class="form-control" placeholder="No Manifest (MFS 000000)" type="text" name="nom" id="txNom"  maxlength="10">
												<span class="input-group-addon"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></span>
											</div>
										</div>
									<br/><br/>
										<label class="col-md-2 control-label">Driver</label>
										<div class="col-md-2">
											<div class="input-group">
												<input class="form-control" placeholder="Driver / Helper" type="text" name="driver" maxlength="20">
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></i></span>
											</div>
										</div>
										<div class="col-md-2">
											<div class="input-group">
												<input class="form-control" placeholder="HP / WA Driver" type="text" name="tlpdriver" maxlength="14">
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success col-md-12">
										<label class="col-md-2 control-label">Tujuan</label>
										<div class="col-md-4">
											<div class="input-group">
												<input class="form-control" placeholder="Gudang / Cab / gateway" type="text" name="tujuan" maxlength="20">
												<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
											</div>
										</div>
									</div>
								</fieldset>
								<br/><br/>
								<fieldset>
									<div class="form-group has-success col-md-12">
										<label class="col-md-2 control-label">INPUT NO. RESI</label>
										<div class="col-md-2">
											<div class="input-group">
												<button type="button" id="btnForm"  onclick="add_resi()" class="btn btn-primary">
												<i class="fa fa-plus"></i> Tambah Resi <span id="loadadd"></span>
											</button>
											</div>
										</div>
									
										<div class="col-md-2">
											<div class="input-group">
												<input class="form-control" placeholder="Masuk Resi, Enter" type="text" name="resi" maxlength="20" id="resi">
												<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i>  </span>
											</div>
										</div>
										<div class="col-md-3">
											<div class="input-group">
												<span id="load"></span>
												<span id="demo"></span>
											</div>
										</div>
									</div>
								</fieldset>
								<table id="table-temp" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone" style="width:30px;">No</th>
										<th data-hide="expand"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i> Resi</th>
										<th data-hide="phone" ><i class="fa fa-calendar fa-lg text-muted hidden-md hidden-sm hidden-xs"></i> Tgl Kirim</th>
										<th data-hide="phone" ><i class="fa fa-user fa-lg text-muted hidden-md hidden-sm hidden-xs"></i> Penerima</th>
										<th data-hide="phone" ><i class="fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Alamat</th>
										<th data-class="phone" ><i class="fa fa-tag fa-lg text-muted hidden-md hidden-sm hidden-xs"></i> Koli</th>
										<th data-hide="phone" ><i class="fa fa-tag fa-lg text-muted hidden-md hidden-sm hidden-xs"></i> Berat</th>
										<th data-class="phone,tablet" style="width:80px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
										
									</tr>
								</thead>
							</table>
		                
		                        <br>
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
										    <div class="col-md-2">
										    <br>	<br>    
											<button type="reset" name="rest" value="reset" class="btn btn-danger">
												<i class="fa fa-refresh"></i> Reset
											</button>
											
											<input type="hidden" name="simpan">
											<button type="button" id="btnSave"  onclick="save()" class="btn btn-primary">
												<i class="fa fa-paper-plane"></i> Simpan <span id="loading"></span>
											</button>
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
						<h2>Daftar Pengiriman <span id="loading2"></span></h2>
	
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
										<th data-hide="phone" style="width:30px;">No</th>
										<th data-hide="expand" style="width:auto;"></i> No Manifest</th>
										<th data-class="phone"style="width:auto;"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-car text-muted hidden-md hidden-sm hidden-xs"></i> Driver</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-phone fa-fw text-muted hidden-md hidden-sm hidden-xs"></i> HP Driver</th>
										<th data-hide="expand" style="width:auto;"><i class="fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan</th>
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
  width: 750px;
}
</style>
<!-- Bootstrap modal -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog" style="max-width: 95%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Pengguna</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal" style="max-width: fit-content;">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
						<!-- tampilkan table resi -->
						<table id="table-resi" class="table table-striped table-bordered table-hover"  style="max-width: fit-content;" >
							<thead>			                
								<tr>
									<th data-hide="phone" style="width:auto;">No</th>
									<th data-class="phone" style="width:auto;"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal</th>
									<th data-class="phone" style="width:auto;"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i> Resi</th>
									<th data-hide="phone" style="width:auto;"><i class="fa fa-user fa-lg  text-muted hidden-md hidden-sm hidden-xs"></i> Penerima</th>
									<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan</th>
									<th data-class="phone,tablet" style="width:auto;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
								</tr>
							</thead>
						</table>
						<!-- end tampilkan table resi -->
						
                    </div>
                </form>
           <br><br>
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
