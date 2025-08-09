<!-- By aldiyan@kotabiru.com -->
<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li>
		<li>Dasboard Umum</li>
	</ol>
</div>


<div id="content" style="padding:25px">
	<div class="row">
		<div class="col-md-12">
			<section>
				<div class="jarviswidget" id="wid-id-15" class="button-icon jarviswidget-toggle-btn" rel="tooltip"
							title="" data-placement="bottom" style="display: block;">
					<header>
						<span class="widget-icon"> <i class="fa fa-columns"></i> </span>
						<h2>Daftar Pengiriman<span id="loading2"></span></h2>
					</header>
					<div>
						<div class="jarviswidget-editbox">
						</div>
						<div class="widget-body">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>Resi :</label>
										<input class="form-control cKeyup filter" name="cargoResi" id="cargoResi" >
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Periode :</label>
										<input type="date" class="form-control cChange filter" name="cargoPStart" id="cargoPStart">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>s/d Periode :</label>
										<input type="date" class="form-control cChange filter" name="cargoPEnd" id="cargoPEnd">
									</div>
								</div>
								<div class="col-md-2">
									<button class="btn btn-primary clearPost" style="margin-top:23px;">Reset</button>
								</div>
							</div>
						
							<table id="tCargo" class="table table-responsive table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th class="PCOnly">Tgl. Kirim</th>
										<th>Resi</th>
										<th>Pengirim</th>
										<th>Penerima</th>
										<th>Tujuan</th>
										<th>Tgl. Terima</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</section>
		</div>
		
</div>

<!-- ui-dialog -->

<script src="<?=base_url('assets/js/google/loader.js')?>"></script>

<script type="text/javascript">


$.ajax({
    type: "GET",
    url: "<?=base_url('cadmin/home/summary')?>",
    success: function (data) {
        var obj = JSON.parse(data);
        //console.log(obj);
        //const obj = "";
        for (const [key, value] of Object.entries(obj)) {
            $('#'+key).html(value);
        }
    }
});
$('#txSalesYear').on('change',function(){
    google.charts.setOnLoadCallback(salesYearStat);
});
google.charts.load("current", {
        packages: ["corechart"]
    });
google.charts.setOnLoadCallback(salesYearStat);

function salesYearStat() {
    var year = $('#txSalesYear').val();
    var jsonData = $.ajax({
        url: "<?=base_url('cadmin/home/getSalesYear');?>/" + year,
        dataType: "json",
        async: false
    }).responseText;
    var data = new google.visualization.DataTable(jsonData);
    var options = {
        title: 'Sales',
        curveType: 'function',
        legend: {
            position: 'bottom'
        },
       
        chartArea: {
            left: "10%",
            top: "10%",
            height: "70%",
            width: "100%"
        }
    };
    var chart = new google.visualization.LineChart(document.getElementById('salesYearStat'));
    chart.draw(data, options);
}
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
			
		
	if ($('[name="resi"]').val() == '') {
		alert('Data Kosong', 'Error');
		// $('#smart-form-register')[0].checkValidity();

		$('#btnSave').text('Simpan'); //change button text
		$('#btnSave').attr('disabled', false); //set button disable 
	} else {
		// ajax adding data to database

		$.ajax({
			url: url,
			type: "POST",
			data: $('#smart-form-register').serialize(),
			dataType: "JSON",
			success: function (data) {

				if (data.status) //if success close modal and reload ajax table
				{

					$('#dt_basic').DataTable().ajax.reload();
					$('#smart-form-register')[0].reset();
					save_method = "add";
					alert('Posting/Update Sukses');
				}
				$('#btnSave').text('Simpan'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 
				$('#info').html('');
				$('#tgl').fadeOut();


			},
			error: function (jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSave').text('Simpan'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 

			}
		});
	}
	
}


// DO NOT REMOVE : GLOBAL FUNCTIONS!
var table;

$(document).ready(function() {
    var responsiveHelper_datatable_user = undefined;	
	 var breakpointDefinition = {
		 tablet : 1024,
		 phone : 480
	 };
 
	table = $('#datatable_user').DataTable({ 
		 
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
			 "url": "<?php echo site_url('cadmin/home/user_ajax_list')?>",
			 "type": "POST"
		 },
		 "preDrawCallback" : function() {
				 // Initialize the responsive datatables helper once.
				 if (!responsiveHelper_datatable_user) {
					 responsiveHelper_datatable_user = new ResponsiveDatatablesHelper($('#datatable_user'), breakpointDefinition);
				 }
			 },
		 "rowCallback" : function(nRow) {
				 responsiveHelper_datatable_user.createExpandIcon(nRow);
			 },
			 "drawCallback" : function(oSettings) {
				 responsiveHelper_datatable_user.respond();
			 },
		 //Set column definition initialisation properties.
		 "columnDefs": [
		 { 
			 "targets": [ -1 ], //last column
			 "orderable": false, //set not orderable
		 },
		 
		 ],
 
 
	 });
	const tableCargo = $('#tCargo').DataTable({
		'ajax': {
			'url': "<?=site_url('cadmin/home/cargo_ajax_list_dashboard_umum_cargo')?>", 
			'type': "POST",
			'data': function (data) {
				data.resi = $('#cargoResi').val();
				data.dateStart = $('#cargoPStart').val();
				data.dateEnd = $('#cargoPEnd').val();
			}
		},
		'searching': false,
		'lengthChange': false,
		'processing': true,
		'serverSide': true,
		'stateSave': false,
		'paging': true,
		'ordering': true,
		'order': [['0',"desc"]],
		'info': true,
		'columnDefs': 
		[
		    {'targets': [5],'className': 'text-right'},
			{'targets': [,2,3,4],'className': 'text-left'},
		]
	});
	$('.cChange').on('change',function(){
		tableCargo.ajax.reload();
	});
	$('.cKeyup').on('keyup',function(){
		tableCargo.ajax.reload();
	});
	$('.clearPost').on('click',function(){
		$('.filter').val("");
		tableCargo.ajax.reload();
	});
	// const tableResi = $('#tResi').DataTable({
	// 	'ajax': {
	// 		'url': "<?=site_url('cadmin/home/cargo_ajax_list_dashboard_resi')?>",
	// 		'type': "POST",
	// 		'data': function (data) {}
	// 	},
	// 	'searching': false,
	// 	'lengthChange': false,
	// 	'processing': true,
	// 	'serverSide': true,
	// 	'stateSave': false,
	// 	'paging': true,
	// 	'ordering': true,
	// 	'order': [['0',"desc"]],
	// 	'info': true,
	// 	'columnDefs': [{
	// 			"targets": [],
	// 			"className": 'text-right'
	// 		},
	// 		{
	// 			'targets': [2, 3],
	// 			'className': 'text-center'
	// 		},
	// 	]
	// });
	// const tableResiPendapatan = $('#tResiPendapatan').DataTable({
	// 	'ajax': {
	// 		'url': "<?=site_url('cadmin/home/cargo_ajax_list_dashboard_pendapatan')?>",
	// 		'type': "POST",
	// 		'data': function (data) {}
	// 	},
	// 	'searching': false,
	// 	'lengthChange': false,
	// 	'processing': true,
	// 	'serverSide': true,
	// 	'stateSave': false,
	// 	'paging': true,
	// 	'ordering': true,
	// 	'order': [['0',"desc"]],
	// 	'info': true,
	// 	'columnDefs': [{
	// 			"targets": [2],
	// 			"className": 'text-right'
	// 		},
	// 		{
	// 			'targets': [],
	// 			'className': 'text-center'
	// 		}
	// 	]
	// });
	tableManifast = $('#tManifast').DataTable({
		'ajax': {
			'url': "<?=site_url('cadmin/home/manifast_ajax_list_dashboard')?>",
			'type': "POST",
			'data': function (data) {
			    
			    data.user_id = $('#user_id').val();
			}
		},
		'searching': false,
		'lengthChange': false,
		'processing': true,
		'serverSide': true,
		'stateSave': false,
		'paging': true,
		'ordering': true,
		'order': [['0',"desc"]],
		'info': true,
		'columnDefs': [{
				"targets": [],
				"className": 'text-right'
			},
			{
				'targets': [],
				'className': 'text-center'
			}
		]
	});
	$('[name="user_id"]').change(function(){
        alert("The text has been changed.");
	});
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
//---- Awal


///--- Akhir
</script>


