	<!-- MAIN CONTENT -->
	<div id="content">

		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark">
					<i class="fa fa-medkit fa-fw "></i> 
						Kedokteran
					<span>> 
						Pasien
					</span>
				</h1>
			</div>
			
		</div>
		
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
							<h2>Biodata Singkat Pasien</h2>
		
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
										<legend>Biodata Pasien</legend>
										<div class="form-group">
											<label class="col-md-4 control-label">No BPJS</label>
											<div class="col-md-8">
												<input class="form-control" placeholder="Nomor Kartu BPJS" type="text" name="nobpjs">
												<input type="hidden" name="id">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label">Nama Pasien</label>
											<div class="col-md-8">
												<input class="form-control" placeholder="Nama Pasien" type="text" name="nama">
												<input type="hidden" name="id">
											</div>
										</div>
										
									
										<div class="form-group">
											<label class="col-md-4 control-label">Usia</label>
											<div class="col-md-8">
												<input class="form-control" placeholder="Usia Pasien" type="text" name="usia">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-4 control-label">Alamat</label>
											<div class="col-md-8">
												<textarea class="form-control" placeholder="Alamat" rows="2" name="alamat"></textarea>
											</div>
										</div>
									
									
									</fieldset>
									
									
		
								
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
							<h2>Daftar Pasien <span id="loading2"></span></h2>
		
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
											<th data-hide="phone" style="width:30px;">No</th>
											<th data-class="expand"><i class="fa fa-fw fa-barcode text-muted hidden-md hidden-sm hidden-xs"></i>BPJS</th>
											<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama</th>
											<th data-hide="phone" style="width:50px;"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Usia</th>
											<th><i class="fa fa-fw fa-map text-muted hidden-md hidden-sm hidden-xs"></i>Alamat</th>
											<th data-hide="phone,tablet" style="width:70px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
											
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
			url : "<?php echo base_url().'cadmin/home/pasien_edit';?>/"+id,
			type: "GET",
			dataType: "JSON",
			success: function(data)
			{

				$('[name="id"]').val(data.id);
				$('[name="nama"]').val(data.nama);
				$('[name="usia"]').val(data.usia);
				$('[name="nobpjs"]').val(data.nobpjs);
				$('[name="alamat"]').val(data.alamat);
				
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
					$('#loading2').html("<img src='<?php echo base_url().'assets/';?>img/loading.gif' />");
					var loading = $("#loading2");
					// alert('sukses'+id);
					$.ajax({
							type: "POST",
							url : "<?php echo base_url().'cadmin/home/pasien_hapus';?>/"+id,
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
	   
			url = "<?php echo base_url().'cadmin/home/pasien_add';?>";
			
		
	if($('[name="nama"]').val()=='' || $('[name="usia"]').val()==''||$('[name="alamat"]').val()==''){
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
		var responsiveHelper_dt_basic = undefined;
		
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};

		$('#dt_basic').DataTable({
			// "ajax": "ajax/array.txt",
			dataType: 'json',
			"ajax": "<?php echo base_url().'cadmin/home/pasien_list';?>",
			"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
				"t"+
				"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
			"autoWidth" : true,
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
			}
		});

	/* END BASIC */
	

	
	/* END TABLETOOLS */

})

</script>

