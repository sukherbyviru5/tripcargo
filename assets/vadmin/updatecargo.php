<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Update Posisi Cargo</li>
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
						<h2>Resi Pengiriman</h2>
	
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
									<legend>Update Posisi Cargo</legend>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Nomor Resi</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<!-- <input class="form-control" type="text" placeholder="XXX-9999999" name="resi" id="resi" data-mask="***-9999999" data-mask-placeholder= "X"> --->
												<input class="form-control" type="text" placeholder="XXX-9999999" name="resi" id="resi" data-mask-placeholder= "X">
												<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
											</div>
											<div class="input-group" id="tgl">
												<input class="form-control" type="text"  name="tgl" data-mask="9999-99-99 99:99:99" data-mask-placeholder= "_" >
												<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										
										<span id="loading"></span>
										<div id="info"></div>
										
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Catatan</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<textarea class="form-control" cols="20" rows="2" name="catatan" id="catatan" ></textarea>
												<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
											</div>
										</div>
									</div>	
									
									<div class="form-group has-success">
										<label class="col-md-2 control-label"></label>
										<div class="col-md-10">
											<div class="input-group">
											    <input type="radio" name="ket" value="Proses">
											    Proses
												<input type="radio" name="ket" value="On Delivery">
												On Delivery
												<input type="radio" name="ket" value="Delivered">
												Delivered
												<input type="radio" name="ket" value="Resend">
												Resend
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Diterima Oleh</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="text" placeholder="Diterima oleh" name="diterima">
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">No HP Penerima</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="text" placeholder="Telp Penerima" name="hp_penerima" onkeypress="return isNumberKey(event)">
												<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
											</div>
										</div>
									</div>	
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
								</fieldset>
<script type="text/javascript">
$("#resi").blur(function(){
	$('#tgl').fadeOut();
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
				url : "<?php echo site_url('cadmin/home/cari_resi')?>",
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
											<button type="reset" name="rest" value="reset" class="btn btn-danger">
												<i class="fa fa-refresh"></i> Reset
											</button>
											<input type="hidden" name="simpan">
											<button type="button" id="btnSave"  onclick="save()" class="btn btn-primary">
												<i class="fa fa-paper-plane"></i> Update Posisi <span id="loading"></span>
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
						<h2>Riwayat Posisi Cargo <span id="loading2"></span></h2>
	
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
	
						
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<!--- <th data-hide="phone" style="width:30px;">No</th>---->
										<th data-class="expand" style="width:150px;"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i>Resi</th>
								<!--	<th data-hide="phone" style="width:70px;"><i class="fa fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tgl</th> ---->
										<th data-hide="expand"  style="width:180px;"><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
										<th data-hide="phone" style="width:auto;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Ket/Catan</th>
										<th data-hide="phone" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Diterima</th>
								<!--	<th data-hide="phone" ><i class="fa fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Lokasi</th> ---->
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
	// START AND FINISH DATE
	$('#startdate').datepicker({
		dateFormat : 'yy-mm-dd',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		onSelect : function(selectedDate) {
			$('#finishdate').datepicker('option', 'minDate', selectedDate);
		}
	});
	
	var save_method; //for save method string
	save_method="add";
	$('#dialog_simple').dialog({
			autoOpen : false,
	});
	$('#tgl').fadeOut();
	
	function edit(id)
	{
		// save_method = 'update';
		$('#smart-form-register')[0].reset(); // reset form on modals
		// $('.form-group').removeClass('has-error'); // clear error class
		// $('.help-block').empty(); // clear error string

		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo base_url().'cadmin/home/updatecargo_edit';?>/"+id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{

				$('[name="resi"]').val(data.resi);
				$('[name="diterima"]').val(data.diterima);
				$('[name="hp_penerima"]').val(data.hp_penerima);
				$('[name="id"]').val(data.id);
				$('#tgl').fadeIn();
				$('[name="tgl"]').val(data.tgl);
				var str = data.ket;
				var ket=str.substring(4,20);
				$('input:radio[name=ket]').val([ket]);
				$('[name="catatan"]').val(data.catatan);
				// $('[name="resi"]').attr('readonly', 'readonly');
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
					var table = $('#dt_basic').DataTable();
					$('#loading').html("<img src='<?php echo base_url().'assets/';?>img/loading.gif' />");
					var loading = $("#loading2");
					// alert('sukses'+id);
					$.ajax({
							type: "POST",
							url : "<?php echo base_url().'cadmin/home/updatecargo_hapus';?>/"+id,
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
								$('#tgl').fadeOut();
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error hapus data');
								loading.fadeOut();
								loading.hide();
								$('#tgl').fadeOut();
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
		var table = $('#dt_basic').dataTable();
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
	   
			url = "<?php echo base_url().'cadmin/home/updatecargo_add';?>";
			
		
	if($('[name="resi"]').val()=='' ){
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
						
						$('#dt_basic').DataTable().ajax.reload();
						$('#smart-form-register')[0].reset();
						save_method="add";
						alert('Posting/Update Sukses');
					}
					$('#btnSave').text('Simpan'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 
					$('#info').html('');
					$('#tgl').fadeOut();
					

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
    table = $('#dt_basic').DataTable({ 
		 
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
            "url": "<?php echo site_url('cadmin/home/updatecargo_ajax_list')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
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
