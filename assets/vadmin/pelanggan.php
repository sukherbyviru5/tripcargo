<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Pelanggan</li>
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
						<h2>Daftar Pelanggan <span id="loading2"></span></h2>
	
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
										<th data-class="expand"><i class="fa fa-building-o text-muted hidden-md hidden-sm hidden-xs"></i>  Dept</th>
										<th data-hide="phone"><i class="fa fa-user fa-lg text-muted hidden-md hidden-sm hidden-xs"></i>  Nama</th>
										<th data-hide="phone"><i class="fa fa-fw fa-tags text-muted hidden-md hidden-sm hidden-xs"></i> Alamat</th>
										<th data-hide="phone" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Kec/Kokab</th>
										<th data-hide="phone" ><i class="fa fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Telp/Email</th>
										<th data-hide="phone" ><i class="fa fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> Email</th>
										
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
							url : "<?php echo base_url().'cadmin/home/pelanggan_hapus';?>/"+id,
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
            "url": "<?php echo site_url('cadmin/home/pelanggan_ajax_list')?>",
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
