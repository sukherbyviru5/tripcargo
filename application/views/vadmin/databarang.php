<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Barang</li>
	</ol>
</div>	
<!-- MAIN CONTENT -->
<div id="content">
	<!-- widget grid -->
	<section id="widget-grid" class="">
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
						<h2>Data Barang <span id="loading2"></span></h2>
	
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
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%" >
								<thead>			                
									<tr>
									    <th data-class="phone"style="width:10%;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Resi</th>
										<th data-hide="phone,tablet"style="width:10%;">Foto</th>
										<th data-class="phone"style="width:auto;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Isi Barang</th>
										<th data-hide="phone"style="width:auto;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Panjang</th>
										<th data-hide="phone"style="width:auto;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Lebar</th>
										<th data-hide="phone"style="width:auto;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Tinggi</th>
										<th data-hide="phone"style="width:auto;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Berat</th>
										<th data-class="phone,tablet"style="width:auto;" ><i class="fa fa-fw fa-tag text-muted hidden-md hidden-sm hidden-xs"></i> Koli</th>
									</tr>
								</thead>
						</table>
						</div>
					</div>
					<!-- end widget div -->
					
			</article>
			<!-- WIDGET END -->
	        
	</section>
	<!-- end widget grid -->
    <div>&nbsp;</div>
</div>
<!-- END MAIN CONTENT -->
<!--div class="modal fade" id="modImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Barang</h4>
      </div>
      <div class="modal-body">
            <img id="imageModal" src="" style="width:100%; height:auto">
      </div>
    </div>
  </div>
</div-->

<script>
$('#modImage').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var title = button.data('title') 
  var src = button.data('url')
  var modal = $(this)
  modal.find('.modal-title').html(title)
  modal.find('#imageModal').attr('src',src)
})
</script>
<script type="text/javascript">
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
        "order": [[ 1, "desc" ]],

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/databarang_ajax')?>",
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
            "orderable": true, //set not orderable
        },	
        ],
        "order": [[ 1, "desc" ]],
    });
});

</script>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo base_url();?>assets/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url();?>assets/js/plugin/fuelux/wizard/wizard.min.js"></script>
 