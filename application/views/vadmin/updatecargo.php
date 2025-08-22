<!-- RIBBON -->

<style>
.box {
    display: inline-block;
    position: relative;
    width: 100%;
}

.box-dummy {
    margin-top: 15px;
    /* 4:3 aspect ratio */
}

.box-element {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    overflow:hidden;
        /* show me! */
}
.box-image{
    position:absolute;
    color: #999;
    height:25px;
    width:25px;
    padding:2px;
    border: 3px;
 
    text-align: center;
}
.box-image i{
    font-size:2rem;
    color:#468847
}
.box-image img{
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:auto;
  overflow:hidden;
  box-sizing:border-box;


}

.box-file > input
{

    position:absolute;
    opacity: 0;
	height:25px;
    width:100%;
}
</style>
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Update Status Pengiriman Barang</li>
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
						<h2><b>Update Status</b></h2>
	
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
	
							<form id="smart-form-register" class="form-horizontal" enctype="multipart/form-data">
								
								<fieldset>
									<legend>Update Status Pengiriman Barang</legend>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Nomor Resi</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<!-- <input class="form-control" type="text" placeholder="XXX-9999999" name="resi" id="resi" data-mask="***-9999999" data-mask-placeholder= "X"> --->
												<input class="form-control" type="text" name="resi" id="resi" data-mask-placeholder="X" onkeyup="this.value = this.value.toUpperCase()">
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
												<textarea class="form-control" cols="20" rows="5" maxlength="500" name="catatan" id="catatan" ></textarea>
												<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
											</div>
										</div>
									</div>	
									
									<div class="form-group has-success">
										<label class="col-md-4 control-label"><b>Update</b> pengiriman</label>
										<div class="col-md-8">
											<div class="input-group">
											    <input type="radio" name="ket" value="Proses">
											  <b> Proses </b>  
												<input type="radio" name="ket" value="On Delivery">
												On Delivery  
												<input type="radio" name="ket" value="Delivered">
											  <b> Delivered </b>  
											  <br>
												<input type="radio" name="ket" value="Resend">
												<font color="red"> Resend</font>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Diterima Oleh</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="text" placeholder="Diterima oleh" name="diterima" onkeyup="this.value = this.value.toUpperCase()">
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">No HP Penerima</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="tel" placeholder="Telp Penerima" name="hp_penerima" onkeypress="return isNumberKey(event)">
												<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
											</div>
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Lampiran</label>
										<div class="col-md-8">
											<div class="input-group">
												<input class="form-control" readonly id="fileUpload">
									            <span class="input-group-addon">				
												<div class="box" style="width:20px;">
													<div class="box-dummy"></div>
													<div class="box-element">
														<div class="box-image">
															<span class="glyphicon glyphicon-paperclip"></span></i>
															<img id="image0box" class="first-input-image"/>
														</div>
														<div class="box-file">
															<input class="first-input-file" id="uploadFile" name="uploadFile" type="file"/>
														</div>
													</div>
												</div>
										        </span>
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
					$('#loading').html("&emsp; &emsp;<img src='<?php echo base_url();?>assets/img/loading.gif' />");
					var loading = $("#loading");
					var selectValues = $("#resi").val();
					if (selectValues == 0){
						var msg = "&emsp; &emsp;<b>Resi tidak ditemukan</b>";  
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
										<th data-class="phone" style="width:150px;"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i>Resi</th>
								<!--	<th data-hide="phone" style="width:70px;"><i class="fa fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tgl</th> ---->
								        <th data-hide="expand"  style="width:80px;"><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
								<!--    <th data-hide="phone"  style="width:50px;"><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Code</th>  ---->
										<th data-hide="phone"  style="width:auto;"><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Posisi</th>
										<th data-hide="phone" style="width:auto;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Catatan</th>
										<th data-class="phone" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Diterima</th>
								<!--	<th data-hide="phone" ><i class="fa fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Lokasi</th> ---->
										<th data-hide="phone,tablet" style="width:auto;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
										
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
<div class="modal fade" id="modDok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Barang</h4>
      </div>
      <div class="modal-body">
            <div id="image_preview_dok"></div>
            <br>
            <a id="download_link" href="" download="" class="btn btn-primary">Download File</a>
      </div>
    </div>
  </div>
</div>
<script>
	$('#modDok').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) 
	  var title = button.data('title') 
	  var src = button.data('url')
	  var ext = button.data('ext')
	  var modal = $(this)
	  modal.find('.modal-title').html(title)
	  if(ext != 'pdf'){
	    modal.find('#image_preview_dok').html('<img src="'+src+'" style="width:100%; height:auto;">')
	  }
	  modal.find('#download_link').attr('href',src);
	})
</script>
<script type="text/javascript">
	$('#uploadFile').bind('change', function(){
		var maxsize = 10000; //kilobytes
		
		var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.pdf)$/i;
		var size = this.files[0].size;
		var fileInput = this.files[0].name;
		var ext = fileInput.substring(fileInput.lastIndexOf('.')+1, fileInput.length) || fileInput
		var maxsizebyte = maxsize*1024;
		var error = false;
		var message = "";
		if(!allowedExtensions.exec(fileInput)){
			error = true;
			message = "Extension yang diperbolehkan hanya jpg/jpeg/png/gif/pdf";
		}
		if(maxsizebyte < size){
			document.getElementById('uploadFile').value = "";
			error = true;
			message = 'Gambar tidak boleh lebih besar dari '+maxsize+' Kb';
		}
		if(error == true){
			alert(message);
		}else{
			document.getElementById('fileUpload').value = fileInput;	
		}
	});
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
				$('[name="dok"]').val(data.dok);
				$('[name="id"]').val(data.id);
				$('[name="code_id"]').val(data.code_id);
				$('#tgl').fadeIn();
				$('[name="tgl"]').val(data.tgl);
				var str = data.ket;
				var ket=str.substring(4,20);
				$('input:radio[name=ket]').val([ket]);
				$('#fileUpload').val(data.file);
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
			var form = $('#smart-form-register');
			var formData = new FormData(form[0]);
			
			$.ajax({
				url : url,
				type: "POST",
				data: formData,
				dataType: "JSON",
				processData: false,
				contentType: false,
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
<script>
$("form").on("change", ".file-upload-field", function(){ 
    $(this).parent(".file-upload-wrapper").attr("data-text",         $(this).val().replace(/.*(\/|\\)/, '') );
});
</script>