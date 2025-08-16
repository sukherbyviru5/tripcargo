<div id="ribbon">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Users</li>
    </ol>
</div>
<div id="content">
    <section id="widget-grid" class="">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <button class="btn btn-success" onclick="add_users()"><i class="glyphicon glyphicon-plus"></i> Tambah User</button>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br><br>
            </div>
        </div>
        <article class="col-sm-12 col-md-12 col-lg-12">
            <div class="jarviswidget" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false">
                <header>
                    <span class="widget-icon"> <i class="fa fa-columns"></i> </span>
                    <h2>Daftar User Id<span id="loading2"></span></h2>
                </header>
                <div>
                    <div class="jarviswidget-editbox">
                    </div>
                    <div class="widget-body">
                        <table id="table" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">USERNAME</th>
                                    <th class="text-center">FOTO</th>
                                    <th class="text-center">AREA</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">USERNAME</th>
                                    <th class="text-center">FOTO</th>
                                    <th class="text-center">AREA</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <br>
            </div>
        </article>
    </section>
</div>

<script type="text/javascript">
    var save_method;
    var table;

    $(document).ready(function() {
        table = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('cadmin/users/ajax_list'); ?>",
                "type": "POST"
            },
            "columnDefs": [{
                "targets": [-1],
                "orderable": false,
            }],
        });

        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });
    });

    function add_users() {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('New Users');
    }

    function edit_users(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $.ajax({
            url: "<?php echo site_url('cadmin/users/ajax_edit/'); ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('[name="id"]').val(data.id);
                $('[name="user_id"]').val(data.user_id);
                $('[name="password"]').val('');
                $('[name="level"]').val(data.level);
                $('[name="namalengkap"]').val(data.namalengkap);
                $('[name="area"]').val(data.area);
                $('[name="kec_id"]').val(data.kec_id);
                $('[name="foto"]').val(data.foto);
                $('[name="nomor_hp"]').val(data.nomor_hp);
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
                $('#modal_form').modal('show');
                $('.modal-title').text('Edit Users');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function save() {
        $('#btnSave').text('saving...');
        $('#btnSave').attr('disabled', true);
        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('cadmin/users/ajax_add'); ?>";
        } else {
            url = "<?php echo site_url('cadmin/users/ajax_update'); ?>";
        }
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                if (data.status) {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled', false);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled', false);
            }
        });
    }

    function delete_users(id) {
        if (confirm('Are you sure delete this data?')) {
            $.ajax({
                url: "<?php echo site_url('cadmin/users/ajax_delete'); ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        }
    }

    function showHide() {
        var inputan = document.getElementById("password");
        if (inputan.type === "password") {
            inputan.type = "text";
        } else {
            inputan.type = "password";
        }
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Form User Baru</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id" />
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
                                        <input type="password" id="password" maxlength="15" name="password" placeholder="Password" class="form-control">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="form-group has-success">
                            <label class="control-label col-md-3">Nama Lengkap</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="input-group">
                                    <input name="namalengkap" maxlength="30" placeholder="Nama Lengkap" class="form-control" type="text" onkeyup="this.value = this.value.toUpperCase()">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <span class="hidden-xs">
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">Level</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="input-group">
                                        <select name="level" class="form-control">
                                            <option value="">--Select--</option>
                                            <option value="super admin">Super Admin</option>
                                            <option value="admin">Admin Pusat</option>
                                            <option value="admin2">Admin Area/Cabang</option>
                                            <option value="driver">Driver</option>
                                            <option value="umum">umum</option>
                                        </select>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3" title="Kode Area (3 Digit huruf capital)">Kode Area &#33;</label>
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
                        <span class="hidden-xs">
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">foto</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="input-group">
                                        <input name="foto" value="foto.png" placeholder="foto selfie" class="form-control" type="text">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                        <span class="help-block"></span>
                                    </div>
                                    <p style="font-style: italic;font-size: 0.7em;">foto.(192 x 192 pixels) Png, JPG, GIF (Contoh: ID4-SANTOSO)</p>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label col-md-3">jabatan</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="input-group">
                                        <select name="jabatan" class="form-control">
                                            <option value="-"> - </option>
                                            <option value="Manager Area"> Manager Area </option>
                                            <option value="Asisten Manager"> Asisten Manager </option>
                                            <option value="Admin"> Admin </option>
                                            <option value="Asisten Admin"> Asisten Admin </option>
                                            <option value="Marketing Executive"> Marketing Executive </option>
                                            <option value="Marketing"> Marketing </option>
                                            <option value="Staf Conter"> Staf Conter </option>
                                            <option value="Mitra"> Mitra </option>
                                            <option value="Deriver"> Driver </option>
                                            <option value="Staf Leadership"> Staf Leadership </option>
                                            <option value="Kurir Inbon"> Kurir Inbon </option>
                                            <option value="Kurir Outbon"> Kurir Outbon </option>
                                            <option value="Kurir"> Kurir </option>
                                            <option value="Kurir Vendor"> Kurir Vendor</option>
                                            <option value="Kurir Maggang"> Kurir Maggang</option>
                                            <option value="Kurir Trening"> Kurir Trening</option>
                                            <option value="Kurir Pickup"> Kurir Pickup</option>
                                            <option value="Quality Control"> Quality Control</option>
                                            <option value="Staf Loading"> Staf Loading</option>
                                            <option value="Helper"> Helper</option>
                                            <option value="Helper"> Helper 2</option>
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
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>