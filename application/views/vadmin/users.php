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
		    
		<!-- Daftar User Baru -->    
		<!--div class="row">
		    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
              <div class="btn-group" role="group">
                <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="glyphicon glyphicon-plus"></i>  
                  Daftar
                </button>
                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <div class="modal-body form">
                		<form action="<?php echo base_url('login/login')?>" method="post" id="login-form" class="smart-form client-form" style=" z-index: 1;">
                		<fieldset>
                    	<?php echo $this->session->flashdata('result_login'); ?>
                    	<section>
                    	<label class="label">User ID</label>
                    		<label class="input"> <i class="icon-append fa fa-user"></i>
                    			<input id="inputUser" name="inputUser">
                    		<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Silahkan masukan ID</b></label>
                    	</section>
                    
                    		<section>
                    		<label class="label">Password</label>
                    		<label class="input"> <i class="icon-append fa fa-lock"></i>
                    		    <input type="password" id="inputPassword" name="inputPassword">
                    			<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Silahkan masukan password</b> </label>
                    	<!-- membuat form checkbox dengan perintah menjalankan function showHide() saat diklik -->	
                            <!--section>
                            <label class="label"></label> <div class="input-group">
                            	<input type="checkbox" onclick="showHide()"> Tampilkan Password 
                        </div>
                        </section>
                            <script type="text/javascript">
                                function showHide() {
                                var inputan = document.getElementById("inputPassword");
                                if (inputan.type === "password") {
                                    inputan.type = "text";
                                } else {
                                    inputan.type = "password";
                                     }
                                    } 
                             </script>
                    		<!-- membuat form Forgot password? -->
                    		<!--div class="note">
                    		<a href="<?php echo base_url();?>forgotpassword.php">Forgot password?</a> 
                    		</div--> 
                    		<!--/section>
                    		</fieldset>
                						
                    	<footer>
                    	<div>
                    						    <!--a href="https://tripcargoid.com/login" data-toggle="dropdown"> lupa kata sandi</a>
                    						    <br>
                    						    <a id="" href="https://tripcargoid.com/login" data-toggle="dropdown"><span class="hidden-xs"> Regristrasi</span></a-->
                    							<!--a class="btn btn-link" href="https://api.whatsapp.com/send/?phone=62881080899678&text=Terima+kasih+telah+menghubungi+Trip Cargo+%28jasa+pengiriman+24+Jam%29%2C+anda+lupa+kata+sandi+atau+Password+atau+user+id+ketik+nomor+hanpone+anda%3F+&type=phone_number&app_absent=0" role="button">Forgot password?</a>
                    							<button type="submit" class="btn btn-primary" onclick="submit">Sign In</button>
                    							<!--button type="reset" class="btn btn-default"  onclick="reset">Daftar</button-->
                    							<!--/div>
                    							<br><br>
                    						</footer>
                					</form>
                    </div>
                </div>
            </div>
        </div>
        
        
		    <!-- Tambah User -->
		    <!--span class="hidden-xs">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<button class="btn btn-success" onclick="add_users()"><i class="glyphicon glyphicon-plus"></i> Tambah User </button>
				<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button><br/>
				
				<br/>
			</div>
			</span-->
			<br>
			&nbsp;
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
						<h2>Daftar User Id<span id="loading2"></span></h2>
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
    								    <th class="text-center">USERNAME</th>
    								    <th class="text-center">FOTO</th>
    									<!--th class="text-center">ID</th>
    									<th class="text-center">USERNAME</th>
    									<th class="text-center">PASSWORD</th>
    									<th class="text-center">NAMA LENGKAP</th>
    									<th class="text-center">LEVEL</th>
    									<th class="text-center">AREA</th>
    									<th class="text-center">KECAMATAN</th--->
    									<!--th style="width:180px;" class="text-center">AREA</th-->
    									<th  class="text-center">AREA</th>
    								</tr>
    							</thead>
    							<tbody>
    							</tbody>
    
    							<tfoot>
    							<tr>
    							    <th class="text-center">USERNAMA</th>
    							    <th  class="text-center">FOTO</th>
    									<!--th class="text-center">ID</th>
    									<th class="text-center">USERNAME</th>
    									<th class="text-center">PASSWORD</th>
    									<th class="text-center">NAMA LENGKAP</th>
    									<th class="text-center">LEVEL</th>
    									<th class="text-center">AREA</th>
    									<th class="text-center">KECAMATAN</th-->
    									<!--th style="width:180px;" class="text-center">AREA Action</th-->
    									<th class="text-center">AREA</th>
    							</tr>
    							</tfoot>
    						</table>
						</div>
						<!-- end widget content -->
					</div>
					<br>
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
    $('.modal-title').text('New Users'); // Set Title to Bootstrap modal title
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
            $('[name="foto"]').val(data.foto);
            //penambahan identitas
            $('[name="nomor_hp"]').val(data.nomor_hp);//penambahan nomor_hp
            $('[name="jabatan"]').val(data.jabatan);
            $('[name="tgl_regristrasi"]').val(data.tgl_regristrasi);
            $('[name="kecamatan"]').val(data.kecamatan);
            $('[name="alamat_tinggal"]').val(data.alamat_tinggal);
            $('[name="nomor_ktp"]').val(data.nomor_ktp);
            $('[name="kontak_darurat"]').val(data.kontak_darurat);
            $('[name="account_bank"]').val(data.account_bank);
            $('[name="referensi_dari"]').val(data.referensi_dari);
            $('[name="tempat_tanggal_lahir"]').val(data.tempat_tanggal_lahir);
            $('[name="kendaraan"]').val(data.kendaraan);
            $('[name="nomor_polisi"]').val(data.nomor_polisi);
            $('[name="keterangan_tambahan"]').val(data.keterangan_tambahan);
            $('[name="performa"]').val(data.performa);
            $('[name="email"]').val(data.email);
           
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
                <h3 class="modal-title">Form User Baru</h3>
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
									<input class="form-control" maxlength="20" type="text" name="user_id" placeholder="Username">
									<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								</div>
								<span class="help-block"><i class="fa fa-warning"></i> Char 30 digit</span>
							</div>
						</div>
                       <div class="form-group has-success">
						 <div class="box-form">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
									<input type="password" id="password" maxlength="6" name="password" placeholder="Password" class="form-control">
									<span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
								</div>
                            </div>
                         </div>   
                        </div>
                        
                        
                        <!--div class="box-form">
                          <label>Password</label> 
                          <!-- membuat form password dengan id "passwordKu" -->
                          <!--input type="password" id="passwordKu" placeholder="Masukkan username .." value="pwdmalasngoding">
                        </div-->
                        
                        <!-- membuat form checkbox dengan perintah menjalankan function showHide() saat diklik -->
                        <div class="form-group has-success">
						 <div class="box-form">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
									<input type="checkbox" onclick="showHide()"> Tampilkan Password 
								</div>
                            </div>
                         </div>   
                        </div>
                        
                        <script type="text/javascript">
                        function showHide() {
                          var inputan = document.getElementById("password");
                          if (inputan.type === "password") {
                            inputan.type = "text";
                                } else {
                            inputan.type = "password";
                                }
                            } 
                        </script>
                        
						 <div class="form-group has-success">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
									<input name="namalengkap" maxlength="30" placeholder="Nama Lengkap" class="form-control" type="text" onkeyup="this.value = this.value.toUpperCase()">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								</div>
                            </div>
                        </div>
                        <span class="hidden-xs"><!---di isi oleh petugas--->
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">Level</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <select name="level" class="form-control">
                                    <option value="">--Select--</option>
                                    <option value="super admin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="driver">Driver</option>
                                    <option value="umum">umum</option>
                                </select>
								<span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
								</div>
                                <span class="help-block"></span>
                            </div>
                        </div>
						 <div class="form-group has-success">
                            <label class="control-label col-md-3"  title="Kode Area (3 Digit huruf capital)">Kode Area &#33;</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
									<input name="area" maxlength="3" placeholder="Kode Area (3 Digit)" class="form-control" type="text" onkeyup="this.value = this.value.toUpperCase()">
									<span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
									<span class="help-block"></span>
								</div>
                            </div>
                        </div>
						<div class="form-group has-success">
                            <label class="control-label col-md-3" title="6 digit nomor kode administrasi kecamatan">Kode Kecamatan &#33;</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="kec_id" maxlength="6" placeholder="6 digit nomor" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        </span>
                        <br>
                       <div class="form-group has-success">
                            <label class="control-label col-md-3">Nomor_hp (WA)</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="nomor_hp" maxlength="16" placeholder="nomor wa" class="form-control" type="tel">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <!---identitas pendukung--->
                        
                        <!---penambahan--->
                        <span class="hidden-xs">
                        
                         <!--div>foto selfie</div-->
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">foto</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="foto" value="foto.png" placeholder="foto selfie" class="form-control" type="foto">
                                <!--button onclick="window.location.href='https://example.com'">Upload</button-->
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
								<p style="font-style: italic;font-size: 0.7em;">foto.(192 x 192 pixels) Png, JPG, GIF   (Contoh: ID4-SANTOSO)</p>
								<!---
								<a style="background-color: grend" ;="" href="https://api.whatsapp.com/send?phone=62881080899678" target="_blank" class="btn btn-info btn-circle">
										<i class="fa fa-whatsapp" style="font-size:16px"> </i></a> ISI KETERANGAN (No. USER ID & NAMA)  --->
                            </div>
                        </div>
                        <span class="hidden-xs">
                            
                         <!--div>identitas tambahan</div-->
                        <!--div class="form-group has-success">
                            <label class="control-label col-md-3">nomor_hp</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="nomor_hp" placeholder="nomor_hp" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div-->
                        <!--div class="form-group has-success">
                            <label class="control-label col-md-3">jabatan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="jabatan" placeholder="jabatan" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div-->
                        
                         <div class="form-group has-success">
                            <label class="control-label col-md-3">jabatan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <select name="jabatan" class="form-control">
                                    <option value="-"> - </option> <!-- ?/day--Jam Kerja 9 Jam --- 1 bulan fuul-->
                                    <!--option value="Chief Executive Officer (CEO)"> Chief Executive Officer (CEO) </option> <!-- ?/day--Jam Kerja 9 Jam --- 1 bulan fuul-->
                                    <option value="Manager Area"> Manager Area </option> <!-- 250.000/day--Jam Kerja 9 Jam --- 1 bulan fuul-->
                                    <option value="Asisten Manager"> Asisten Manager </option> <!-- 200.000/day--Jam Kerja 9 Jam --- 1 bulan fuul-->
                                    <option value="Admin"> Admin </option> <!-- 200.000/day--Jam Kerja 9 Jam --- 1 bulan fuul-->
                                    <option value="Asisten Admin"> Asisten Admin </option> <!-- 150.000/day--Jam Kerja 9 Jam --- 1 bulan fuul-->
                                    <option value="Marketing Executive"> Marketing Executive  </option> <!-- 150.000/day--Jam Kerja 9 Jam --- 1 bulan fuul-->
                                    <option value="Marketing"> Marketing </option> <!-- 130.000/day--Jam Kerja 9 Jam --- 1 bulan fuul-->
                                    <option value="Staf Conter"> Staf Conter </option> <!-- 150.000/day--Jam Kerja 8 Jam --- 26 hari kerja-->
                                    <option value="Mitra"> Mitra </option> <!-- 150.000/day--Jam Kerja Partime --- Partime-->
                                    <option value="Deriver"> Driver </option> <!-- 150.000/day--Jam 12 (Oprasianal) --- Fuul Day-->
                                    <option value="Staf Leadership"> Staf Leadership </option> <!-- 150.000/day--Jam 8 (1 sift) --- 1 sift-->
                                    <option value="Kurir Inbon"> Kurir Inbon </option> <!-- 150.000/day--Jam 8 (1 sift) --- 1 sift-->
                                    <option value="Kurir Outbon"> Kurir Outbon </option> <!-- 150.000/day--Jam 8 (1 sift) --- 1 sift-->
                                    <option value="Kurir"> Kurir </option> <!-- 150.000/day--Jam 8 (1 sift) --- Full Day-->
                                    <option value="Kurir Vendor"> Kurir Vendor</option> <!-- Negosiasi /day--Opsional --- Full Day-->
                                    <option value="Kurir Maggang"> Kurir Maggang</option> <!-- 130.000/day--Jam 8 (1 sift) --- Full Day-->
                                    <option value="Kurir Trening"> Kurir Trening</option> <!-- 140.000/day--Jam 8 (1 sift) --- Full Day-->
                                    <option value="Kurir Pickup"> Kurir Pickup</option> <!-- 150.000/day--Jam 8 (1 sift) --- Full Day-->
                                    <option value="Quality Control"> Quality Control</option> <!-- 150.000/day--Jam 8 (1 sift) --- Full Day-->
                                    <option value="Staf Loading"> Staf Loading</option> <!-- 150.000/day--Jam 8 (1 sift) --- Full Day-->
                                    <option value="Helper"> Helper</option> <!-- 150.000/day--Jam 8 (1 sift) --- Full Day-->
                                    <option value="Helper"> Helper 2</option> <!-- 150.000/day--Jam 8 (1 sift) --- Full Day-->
                                    
                                </select>
								<span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
								</div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        
                        <div class="form-group has-success">
                            <label class="control-label col-md-3" title="Tanggal diterima kerja">tgl_regristrasi</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="tgl_regristrasi" placeholder="tgl_regristrasi" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3" title="Nama Kecamatan Penempaten Kerja">kecamatan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="kecamatan" placeholder="kecamatan" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">alamat_tinggal</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="alamat_tinggal" placeholder="alamat_tinggal" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">nomor_ktp</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="nomor_ktp" placeholder="nomor_ktp" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">kontak_darurat</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="kontak_darurat" placeholder="kontak_darurat" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3" title="BANK BCA, BANK MANDIRI">account_bank</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="account_bank" placeholder="account_bank" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3" title="mengetahui informasi dari referensi siapa?">referensi_dari</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="referensi_dari" placeholder="referensi_dari" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">tempat_tanggal_lahir</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="tempat_tanggal_lahir" placeholder="tempat_tanggal_lahir" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">kendaraan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="kendaraan" placeholder="kendaraan" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">nomor_polisi</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="nomor_polisi" placeholder="nomor_polisi" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">keterangan_tambahan</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="keterangan_tambahan" placeholder="keterangan_tambahan" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">performa</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <select name="performa" class="form-control">
                                    <option value="Bagus"> Bagus </option>
                                    <option value="Cukup"> Cukup </option>
                                    <option value="Sedang"> Sedang </option>
                                    <option value="Buruk"> Buruk </option>
                                    <option value="Beklist"> Beclist </option>
                                </select>
								<span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
								</div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">email</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
								<div class="input-group">
                                <input name="email" placeholder="email" class="form-control" type="text">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
								<span class="help-block"></span>
								</div>
                            </div>
                        </div>
                        </span>
                        <!---akhir--->
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