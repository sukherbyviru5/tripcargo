<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Setting Harga</li>
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
						<h2>Setting Harga</h2>
	
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
									<legend>Jarak Pengiriman</legend>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Asal</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="text" name="asal" maxlength="50">
												<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Tujuan</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="text" name="tujuan" maxlength="50">
												<span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Layanan</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<select  class="form-control"  name="layanan">
													<option value="PROMO SPESIAL">SPECIAL PRICE</option>
													<option value="Cargo (100 kg)">Cargo (100 Kg) </option>
													<option value="Cargo (50 kg)">Cargo (50 Kg) </option>
													<option value="Cargo (30 kg)">Cargo (30 Kg) </option>
													<option value="Cargo (10 kg)">Cargo (10 Kg) </option>
													<option value="Cargo">Cargo</option>
													<option value="Reguler">Reguler</option>
													<option value="Motor">Motor </option>
													<option value="Motor Besar">Motor Besar </option>
													<option value="Priority">Priority</option>
												</select>
												<span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Harga Cargo</label>
										<div class="col-md-8">
											<div class="input-group">
												<input class="form-control" type="text" name="harga" maxlength="15" onkeypress="return isNumberKey(event)">
												<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Estimasi (Waktu)</label>
										<div class="col-md-8">
											<div class="input-group">
												<input class="form-control" type="text" name="estimasi" maxlength="20">
												<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
											</div>
										</div>
									</div>
								</fieldset>
								<script type="text/javascript">
								
									function isNumberKey(evt)
									{
										var charCode = (evt.which) ? evt.which : evt.keyCode;
										if (charCode != 46 && charCode > 31 
										&& (charCode < 48 || charCode > 57))
										return false;
										return true;
									}  
								
								</script>
		
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
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
						<h2>List harga tujuan<span id="loading2"></span></h2>
	
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
										<th data-class="expand"><i class="fa fa fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Asal</th>
										<th data-class="expand" ><i class="fa fa fa-map text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan</th>
										<th data-hide="phone" ><i class="fa fa fa-tags text-muted hidden-md hidden-sm hidden-xs"></i> Layanan</th>
										<th data-class="expand" ><i class="fa fa-fw fa-money text-muted hidden-md hidden-sm hidden-xs"></i> Tarif</th>
										<th data-hide="phone" ><i class="fa fa fa-clock-o text-muted hidden-md hidden-sm hidden-xs"></i> Estimasi</th>
										<th data-hide="phone,tablet" style="width:80px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
										
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

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

	
	var save_method; //for save method string
	save_method="add";
	$('#dialog_simple').dialog({
			autoOpen : false,
	});
	
	
	function edit(id)
	{
		// save_method = 'update';
		$('#smart-form-register')[0].reset(); // reset form on modals
		// $('.form-group').removeClass('has-error'); // clear error class
		// $('.help-block').empty(); // clear error string

		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo base_url().'cadmin/home/set_harga_edit';?>/"+id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{

				$('[name="id"]').val(data.id);
				$('[name="tujuan"]').val(data.tujuan);
				$('[name="waktu"]').val(data.waktu);
				$('[name="harga"]').val(data.harga);
				$('[name="asal"]').val(data.asal);
				$('[name="layanan"]').val(data.layanan);
				$('[name="estimasi"]').val(data.estimasi);
				
				// $('[name="id"').attr('disabled',true);			
				$('[name="simpan"]').val('update');
				$('[name="simpan"]').text('Update'); 
				$('#btnSave').text('Update');
				save_method="update";
				// $('.modal-title').text('Edit Dosen'); // Set title to Bootstrap modal title

			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});
	}

	function hapus(id) {
	
			$('#dialog_simple').dialog({
			autoOpen : false,
			width : 400,
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
							url : "<?php echo base_url().'cadmin/home/set_harga_hapus';?>/"+id,
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
	   
			url = "<?php echo base_url().'cadmin/home/set_harga_add';?>";
			
		
	if($('[name="prov_id"]').val()=='' || $('[name="kab"]').val()==''){
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
						$('#smart-form-register')[0].reset();
						save_method="add";
						alert('Posting/Update Sukses');
					}
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 
					$('[name="prov_id"').attr('disabled',false);	

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
            "url": "<?php echo site_url('cadmin/home/set_harga_ajax_list')?>",
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
});
</script>
