<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Slider</li>
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
						<h2>Set Slider</h2>
	
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
									<legend>Slider</legend>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Image</label>
										<div class="col-md-8">
											<div class="input-group">
												<input type="hidden" name="id">
												<input class="form-control" type="file" name="image" accept="image/*">
												<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
											</div>
											<small class="text-muted">Maksimal ukuran file 2 MB dan landscape</small>
        									<img id="preview" style="max-width:150px;display:none;">
										</div>
									</div>
									<div class="form-group has-success">
										<label class="col-md-4 control-label">Info Singkat</label>
										<div class="col-md-8">
											<div class="input-group">
												<input class="form-control" type="text" name="info" placeholder="Enter slider info">
												<span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
											</div>
											 <small class="text-muted">Boleh dikosongkan</small>
										</div>
									</div>
								</fieldset>

								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
											<button type="reset" name="reset" value="reset" class="btn btn-danger">
												<i class="fa fa-refresh"></i> Reset
											</button>
											<input type="hidden" name="simpan">
											<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">
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
						<h2>Daftar Slider (Hero) <span id="loading2"></span></h2>
	
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
										<th data-class="phone" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Image</th>
										<th data-class="phone" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Text</th>
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

var save_method; //for save method string
save_method = "add";
$('#dialog_simple').dialog({
    autoOpen : false,
});

function edit(id)
{

    $.ajax({
        url : "<?php echo base_url().'cadmin/home/slider_edit';?>/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="info"]').val(data.info);

            // tampilkan preview image lama
            if(data.image){
                $('#preview').attr('src', "<?php echo base_url(''); ?>"+data.image).show();
            }

            $('[name="simpan"]').val('update');
            $('#btnSave').text('Update');
            save_method = "update";
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
                
                var table = $('#table').DataTable();
                var loading = $("#loading2");
                $('#loading2').html("<img src='<?php echo base_url().'assets/';?>img/loading.gif' />");
                
                $.ajax({
                    type: "POST",
                    url : "<?php echo base_url().'cadmin/home/slider_hapus';?>/"+id,
                    beforeSend: function(){
                       loading.fadeIn();						
                    },
                    success: function(status){
                        alert(status);
                        table.ajax.reload();
                        loading.fadeOut();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error hapus data');
                        loading.fadeOut();
                    }
                });
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

function reload_table()
{
    var table = $('#table').dataTable();
    table.ajax.reload();
}

function save()
{
    $('#btnSave').text('Menyimpan...');
    $('#btnSave').attr('disabled',true);

    if(save_method=="add"){
        $('[name="simpan"]').val('add');
    }else{
        $('[name="simpan"]').val('update');
    }

    var url = "<?php echo base_url().'cadmin/home/slider_add';?>";

    // pakai FormData untuk handle file
    var formData = new FormData($('#smart-form-register')[0]);

    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            if(data.status){
				$('#table').DataTable().ajax.reload();
				$('#smart-form-register').trigger("reset");
				$('input[name="image"]').val('');
				$('input[name="info"]').val('');
				$('input[name="id"]').val('');
				$('#preview').attr('src', '').hide();
				save_method = "add";
				alert('Posting/Update Sukses');
			} else {
				 alert('Gagal: ' + data.msg);
			}

            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled',false); 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('Simpan');
            $('#btnSave').attr('disabled',false);
        }
    });
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
            "url": "<?php echo site_url('cadmin/home/slider_ajax_list')?>",
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
