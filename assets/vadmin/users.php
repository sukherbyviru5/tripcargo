<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Users</li>
	</ol>
</div>	
<div id="content">
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		
		<!-- row -->
		<div class="row">
	
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<button class="btn btn-success" onclick="add_users()"><i class="glyphicon glyphicon-plus"></i> Tambah User </button>
				<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button><br/>
				<br/>
			</div>
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
						<h2>Daftar Agen/Pengguna<span id="loading2"></span></h2>
	
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
						
						
						
						<table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="text-center">NO</th>
									<th class="text-center">USERNAME</th>
									<th class="text-center">PASSWORD</th>
									<th class="text-center">NAMA LENGKAP</th>
									<th class="text-center">LEVEL</th>
									<th class="text-center">AREA</th>
									<th class="text-center">KECAMATAN</th>
									<th style="width:80px;" class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
							</tbody>

							<tfoot>
							<tr>
								<th class="text-center">NO</th>
								<th class="text-center">USERNAME</th>
								<th class="text-center">PASSWORD</th>
								<th class="text-center">NAMA LENGKAP</th>
								<th class="text-center">LEVEL</th>
								<th class="text-center">AREA</th>
								<th class="text-center">KECAMATAN</th>
								<th class="text-center">Action</th>
							</tr>
							</tfoot>
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


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/users/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

});



function add_users()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Agen'); // Set Title to Bootstrap modal title
}

function edit_users(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('cadmin/users/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="user_id"]').val(data.user_id);
            $('[name="password"]').val('');
            $('[name="level"]').val(data.level);
            $('[name="namalengkap"]').val(data.namalengkap);
            $('[name="area"]').val(data.area);
            $('[name="kec_id"]').val(data.kec_id);
           
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Users'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('cadmin/users/ajax_add')?>";
    } else {
        url = "<?php echo site_url('cadmin/users/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_users(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('cadmin/users/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form Agen Baru</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <div class="form-body">
						<div class="form-group has-success">
							<label class="col-md-3 control-label">Username</label>
							<div class="col-md-9">
								<div class="input-group">
									<input type="hidden" name="id">
									<input class="form-control" type="text" name="user_id" maxlength="60" placeholder="Username">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								</div>
								<span class="help-block"><i class="fa fa-warning"></i> Char 30 digit</span>
							</div>
						</div>
                       
						 <div class="form-group has-success">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
									<input type="password"  name="password" placeholder="Password" class="form-control">
									<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								</div>
                            </div>
                        </div>
						 <div class="form-group has-success">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
									<input name="namalengkap" placeholder="Nama Lengkap" class="form-control" type="text">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <select name="level" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="super admin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="driver">Driver</option>
                                </select>
								<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
								</div>
                                <span class="help-block"></span>
                            </div>
                        </div>
						 <div class="form-group has-success">
                            <label class="control-label col-md-3">Kode Area</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
									<input name="area" placeholder="Kode Area" class="form-control" type="text">
									<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
									<span class="help-block"></span>
								</div>
                            </div>
                        </div>
						<div class="form-group has-success">
                            <label class="control-label col-md-3">Kode Kecamatan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="kec_id" placeholder="Kode Kecamatan" class="form-control" type="text" onkeypress="return isNumberKey(event)">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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