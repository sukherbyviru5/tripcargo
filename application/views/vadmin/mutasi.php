	<!-- MAIN CONTENT -->
	<div id="content">

		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-medkit fa-fw "></i> 
						Kedokteran
					<span>> 
						Mutasi Obat
					</span>
				</h1>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-8">
				<h1 class="page-title txt-color-blueDark">
						<a href="#" data-toggle="modal" data-target="#obatModal" class="btn btn-success btn-lg pull-right header-btn hidden-mobile">
						<i class="fa fa-circle-arrow-up fa-lg"></i> <i class="icon-append fa fa-plus"></i>
						Tambah Mutasi
					</a>
				</h1>
			</div>
		</div>
		
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
							<h2>Mutasi Obat</h2>
		
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
								<table id="dt_obat" class="table table-striped table-bordered table-hover" width="100%">
									<thead>			                
										<tr>
											<th data-hide="phone" style="width:30px;">No</th>
											<th data-class="expand" style="width:150px;"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal </th>
											<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Obat </th>
											<th data-hide="mutasi" style="width:150px;"><i class="fa fa-fw fa-refresh text-muted hidden-md hidden-sm hidden-xs"></i> Mutasi</th>
											<th data-hide="satuan" style="width:150px;"><i class="fa fa-fw fa-cube text-muted hidden-md hidden-sm hidden-xs"></i> satuan</th>
											
											<th data-hide="phone,tablet" style="width:70px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi <span id="loading2"></span></th>
											
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
	<!-- END MAIN CONTENT -->


<!-- temp MODAL PLACE HOLDER -->
<div class="modal fade" id="obatModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" >
	<div class="modal-dialog" style="width:300px;">
		<!-- ui-dialog -->
<div id="dialog_simple" title="Dialog Simple Title">
	<p>
		Apakah anda yakin akan menghapus data ini?</i>
	</p>
</div>

		<div class="modal-content" >
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			&times;
		</button>
		<h4 class="modal-title"><img src="<?php echo base_url().'assets/img/logo.png';?>" width="150" alt="SmartAdmin">
		</h4>
	</div>
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
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
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Mutasi Obat</h2>

				</header>

				<!-- widget div-->
				<div>

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>

					<!-- widget content -->
					<div class="widget-body no-padding">
						<form class="smart-form" id="smart-form-register" >
						<fieldset>	
								<section>
									Pilih Obat<input type="hidden" name="id">
										<label class="select"> <i class="icon-append fa fa-caret-square-o-down"></i>
											<select name="obat_id">
												
												<option value="0" selected="" disabled="">Pilih Obat</option>
													<?php foreach($obat as $c){
														echo"<option value='".$c->id."'>".$c->obat."</option>";
													}
													?>
											</select><i></i> 
										</label>
								</section>
								<section>
									Tanggal Mutasi
									<label class="input"> <i class="icon-append fa fa-calendar"></i>
									<input type="text" name="tgl" placeholder="Tanggal Mutasi" class="datepicker" data-dateformat='dd-mm-yy'>
									</label>
								</section>
								<section>
									Mutasi Obat
									<label class="input"> <i class="icon-append fa fa-cube"></i> 
										<input type="text" name="mutasi" placeholder="Mutasi Obat" maxlength="15" onkeypress="return isNumber(event)">
										<b class="tooltip tooltip-bottom-right">Mutasi Obat, jika keluar (-xx)</b> </label>
								</section>
								<script type="text/javascript">     
								function isNumber(evt) {
										evt = (evt) ? evt : window.event;
										var charCode = (evt.which) ? evt.which : evt.keyCode;
										if ( (charCode > 31 && charCode < 48) || charCode > 57) {
											return false;
										}
										return true;
									}
								</script>
								<footer>
				
									<button type="button" class="btn btn-danger btn-lg pull-right" data-dismiss="modal">
										<i class="fa fa-times"></i> Cancel
									</button>
									<input type="hidden" name="simpan">
									<button type="button" id="btnSave"  onclick="save()" class="btn btn-primary">
										<i class="fa fa-save"></i> Simpan
									</button>

								</footer>
						</fieldset>
						</form>
					</div>
					<!-- end widget content -->

				</div>
			</div>
		</div>
		</article>
	</div>
	</div>
</div>
<!-- END tempMODAL -->	

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

	
	var save_method; //for save method string
	save_method="add";
	$('#dialog_simple').dialog({
			autoOpen : false,
	});
	
	
	function edit(id)
	{
		save_method = 'update';
		$('#smart-form-register')[0].reset(); // reset form on modals
		// $('.form-group').removeClass('has-error'); // clear error class
		// $('.help-block').empty(); // clear error string

		//Ajax Load data from ajax
		$.ajax({
			url : "<?php echo base_url().'cadmin/home/mutasi_obat_edit';?>/"+id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{

				$('[name="id"]').val(data.id);
				$('[name="obat_id"]').val(data.obat_id);
				$('[name="tgl"]').val(data.tgl);
				$('[name="mutasi"]').val(data.mutasi);
		
				
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
					var table = $('#dt_obat').DataTable();
					$('#loading2').html("<img src='<?php echo base_url().'assets/';?>img/loading.gif' />");
					var loading = $("#loading2");
					// alert('sukses'+id);
					$.ajax({
							type: "POST",
							url : "<?php echo base_url().'cadmin/home/mutasi_obat_hapus';?>/"+id,
							data: kode,
							beforeSend: function(){
							   loading.fadeIn();						
							},
							success: function(msg){
								alert(msg);
								table.ajax.reload();
								loading.fadeOut();
								loading.hide();
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error hapus data');
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
		var table = $('#dt_obat').DataTable();
		table.ajax.reload();
	}
	
	
	function save()
	{
		$('#btnSave').text('Posting...'); //change button text
		$('#btnSave').attr('disabled',true); //set button disable 
		
		if(save_method=="add"){
			$('[name="simpan"]').val('add');
		}else{
			$('[name="simpan"]').val('update');
		}
		var url;
	   
			url = "<?php echo base_url().'cadmin/home/mutasi_obat_add';?>";
			
		
		if($('[name="obat_id"]').val()==''){
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
						
						$('#dt_obat').DataTable().ajax.reload();
						$('#smart-form-register')[0].reset();
						save_method="add";
						alert('Posting/Update Sukses');
						$('#obatModal').modal('hide');
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

$(document).ready(function() {
	
	/* // DOM Position key index //
		
	l - Length changing (dropdown)
	f - Filtering input (search)
	t - The Table! (datatable)
	i - Information (records)
	p - Pagination (paging)
	r - pRocessing 
	< and > - div elements
	<"#id" and > - div with an id
	<"class" and > - div with a class
	<"#id.class" and > - div with an id and class
	
	Also see: http://legacy.datatables.net/usage/features
	*/	

	/* BASIC ;*/
		var responsiveHelper_dt_obat = undefined;
		
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_obat').DataTable({
			// "ajax": "ajax/array.txt",
			dataType: 'json',
			"ajax": "<?php echo base_url().'cadmin/home/mutasi_obat_list';?>",
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
			"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_obat) {
					responsiveHelper_dt_obat = new ResponsiveDatatablesHelper($('#dt_obat'), breakpointDefinition);
				}
			},
			"rowCallback" : function(nRow) {
				responsiveHelper_dt_obat.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_obat.respond();
			}
		});

	/* END BASIC */
	

	
	/* END TABLETOOLS */

})

</script>

