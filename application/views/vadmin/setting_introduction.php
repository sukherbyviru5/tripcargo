<div id="ribbon">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Settings</li>
        <li>Introduction & Visi Misi</li>
    </ol>
</div>
<!-- END RIBBON -->

<!-- CONTENT -->
<div id="content">
    <section id="widget-grid" class="">
        <div class="row">
            <!-- promo Widget -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"><i class="fa fa-edit"></i></span>
                        <h2>Edit promo</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox"></div>
                        <div class="widget-body">
                            <form id="form-promo" class="form-horizontal">
                                <fieldset>
                                    <legend>Promo</legend>

                                    <!-- Input Nama Promo -->
                                    <div class="form-group has-success">
                                        <label class="col-md-2 control-label">Promo Name</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="<?php echo isset($promo->id) ? $promo->id : ''; ?>">
                                                <input type="text" class="form-control" placeholder="Promo Name"
                                                    name="name" maxlength="255" value="<?php echo isset($promo->name) ? $promo->name : ''; ?>">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-edit"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Dropdown Status -->
                                    <div class="form-group has-success">
                                        <label class="col-md-2 control-label">Status</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="status">
                                                <option value="active" <?php echo isset($promo->status) && $promo->status === 'active' ? 'selected' : ''; ?>>
                                                    Active
                                                </option>
                                                <option value="inactive" <?php echo isset($promo->status) && $promo->status === 'inactive' ? 'selected' : ''; ?>>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group has-success">
                                        <label class="col-md-2 control-label">Tarif</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <a type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modalPilihTarif">
                                                    <i class="fa fa-plus"></i> Pilih Tarif
                                                </a>
                                                <hr>
                                                <input type="hidden" name="tarif_id" id="selected_tarifs"
                                                    value='<?php echo isset($promo->tarif_id) ? $promo->tarif_id : '[]'; ?>'>
                                                <div id="selected_tarifs_display" class="m-2 p-1 "></div>
                                            </div>
                                        </div>
                                    </div>


                                </fieldset>

                                <!-- Tombol Simpan -->
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary" onclick="savePromo()">
                                                <i class="fa fa-floppy-o"></i> Simpan <span id="loading"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Introduction Widget -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"><i class="fa fa-edit"></i></span>
                        <h2>Edit Introduction</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox"></div>
                        <div class="widget-body">
                            <form id="form-introduction" class="form-horizontal">
                                <fieldset>
                                    <legend>Introduction</legend>
                                    <div class="form-group has-success">
                                        <label class="col-md-2 control-label">Description</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="<?php echo isset($introduction[0]['id']) ? $introduction[0]['id'] : ''; ?>">
                                                <textarea class="form-control" placeholder="Introduction Description" name="description" rows="4"
                                                    maxlength="1000"><?php echo isset($introduction[0]['description']) ? $introduction[0]['description'] : ''; ?></textarea>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-edit"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary" onclick="saveIntroduction()">
                                                <i class="fa fa-floppy-o"></i> Simpan <span id="loading"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
            <!-- Visi Misi Widget -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"><i class="fa fa-edit"></i></span>
                        <h2>Edit Visi Misi</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox"></div>
                        <div class="widget-body">
                            <?php if (!empty($visi_misi)): ?>
                            <?php foreach ($visi_misi as $vm): ?>
                            <form id="form-visi-misi-<?php echo $vm['id']; ?>" class="form-horizontal">
                                <fieldset>
                                    <legend><?php echo $vm['type']; ?></legend>
                                    <div class="form-group has-success">
                                        <label class="col-md-2 control-label">Title</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="hidden" name="id" value="<?php echo $vm['id']; ?>">
                                                <input class="form-control" placeholder="Title" type="text"
                                                    name="title" value="<?php echo $vm['title']; ?>" maxlength="255">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-edit"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label class="col-md-2 control-label">Description</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Description" name="description" rows="4" maxlength="1000"><?php echo $vm['description']; ?></textarea>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-edit"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label class="col-md-2 control-label">Icon</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input class="form-control"
                                                    placeholder="Font Awesome Icon (e.g., fas fa-eye)" type="text"
                                                    name="icon" value="<?php echo $vm['icon']; ?>" maxlength="100">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-picture"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label class="col-md-2 control-label">Type</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="type"
                                                    value="<?php echo $vm['type']; ?>" readonly>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-lock"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary"
                                                onclick="saveVisiMisi(<?php echo $vm['id']; ?>)">
                                                <i class="fa fa-floppy-o"></i> Simpan <span
                                                    id="loading-<?php echo $vm['id']; ?>"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <p>No Visi Misi data available.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>
<!-- END CONTENT -->
<!-- END MAIN CONTENT -->

<!-- END PAGE FOOTER -->

<!-- UI Dialog -->
<div id="dialog_simple" title="Konfirmasi Simpan">
    <p>Apakah Anda yakin akan menyimpan perubahan ini?</p>
</div>


<div class="modal fade" id="modalPilihTarif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Pilih Tarif Pengiriman</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <article class="col-sm-12 col-md-12 col-lg-12">
                        <div class="jarviswidget" id="wid-id-10" data-widget-colorbutton="false"
                            data-widget-editbutton="false">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-columns"></i> </span>
                                <h2>List Tarif</h2>
                            </header>
                            <div>
                                <div class="widget-body no-padding">
                                    <table id="table" class="table table-striped table-bordered table-hover"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width:30px;">No</th>
                                                <th>Asal</th>
                                                <th>Tujuan</th>
                                                <th>Layanan</th>
                                                <th>Tarif</th>
                                                <th>Estimasi</th>
                                                <th style="width:50px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>




<script>
    let selectedTarifs = [];

    function initSelectedTarifs() {
        const selectedTarifsInput = $('#selected_tarifs').val();
        if (selectedTarifsInput) {
            selectedTarifs = JSON.parse(selectedTarifsInput);
            displaySelectedTarifs();
        }
    }

    function displaySelectedTarifs() {
        $('#selected_tarifs_display').empty();
        const tarifData = <?php echo json_encode($tarif); ?>;
        selectedTarifs.forEach(id => {
            const tarif = tarifData.find(item => item.id === id.toString());
            if (tarif) {
                const formattedHarga = parseInt(tarif.harga).toLocaleString('id-ID');
                const tarifElement = `
                <span class="badge badge-primary m-2 p-2" data-id="${id}" style="cursor: pointer;">
                    ${tarif.layanan} - Rp ${formattedHarga}
                    <i class="fa fa-times ml-1 remove-tarif" data-id="${id}"></i>
                </span>
            `;
                $('#selected_tarifs_display').append(tarifElement);
            }
        });
    }

    function pilihTarif(id, harga, layanan) {
        if (!selectedTarifs.includes(id)) {
            selectedTarifs.push(id);
            $('#selected_tarifs').val(JSON.stringify(selectedTarifs));
            displaySelectedTarifs(); 
        }
    }

    // Fungsi untuk menghapus tarif
    function hapusTarif(id) {
        selectedTarifs = selectedTarifs.filter(tarifId => tarifId !== id);
        $('#selected_tarifs').val(JSON.stringify(selectedTarifs));
        displaySelectedTarifs(); 
    }

    $(document).on('click', '.remove-tarif', function() {
        const id = $(this).data('id');
        hapusTarif(id);
    });

    $(document).ready(function() {
        initSelectedTarifs();
    });
</script>

<script>
    $(document).ready(function() {
        pageSetUp();

        function reload_table() {
            var table = $('#table').dataTable();
            table.ajax.reload();
        }

        var table;
        var responsiveHelper_dt_basic = undefined;
        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };
        table = $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel',
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }, 'print'
            ],
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "<?php echo site_url('cadmin/laporan/set_harga_ajax_list'); ?>",
                "type": "POST",
                "data": function(d) {
                    d.asal = $('select[name="asal"]').val();
                    d.tujuan = $('select[name="tujuan"]').val();
                    d.action = true;
                }
            },
            "preDrawCallback": function() {
                if (!responsiveHelper_dt_basic) {
                    responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table'),
                        breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_dt_basic.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_dt_basic.respond();
            },
            "columnDefs": [{
                "targets": [-1],
                "orderable": false,
            }],
        });

        function cari() {
            table.ajax.reload();
        }

        // Initialize jQuery UI Dialog
        $('#dialog_simple').dialog({
            autoOpen: false,
            width: 300,
            resizable: false,
            modal: true,
            title: "Konfirmasi Simpan",
            buttons: [{
                html: "<i class='fa fa-floppy-o'></i>&nbsp; Ya, Simpan",
                "class": "btn btn-primary",
                click: function() {
                    $(this).dialog("close");
                    if (window.currentFormType === 'promo') {
                        savePromo();
                    } else if (window.currentFormType === 'introduction') {
                        saveIntroduction();
                    } else if (window.currentFormType === 'visi_misi') {
                        saveVisiMisi(window.currentFormId);
                    }
                }
            }, {
                html: "<i class='fa fa-times'></i>&nbsp; Batal",
                "class": "btn btn-default",
                click: function() {
                    $(this).dialog("close");
                }
            }]
        });

        // Save Promo
        function savePromo() {
            var form = $('#form-promo');
            var id = form.find('input[name="id"]').val();
            var url = "<?php echo base_url('cadmin/home/update_promo/'); ?>" + id;

            var loading = $('#loading');

            loading.html("<img src='<?php echo base_url('assets/img/loading.gif'); ?>' />");
            $.ajax({
                url: url,
                type: "POST",
                data: form.serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    loading.fadeIn();
                },
                success: function(data) {
                    if (data.status) {
                        alert('Promo updated successfully');
                    } else {
                        alert('Error: ' + data.message);
                    }
                    loading.fadeOut();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error updating promo');
                    loading.fadeOut();
                }
            });
        }

        // Save Introduction
        function saveIntroduction() {
            var form = $('#form-introduction');
            var id = form.find('input[name="id"]').val();
            var url = "<?php echo base_url('cadmin/home/update_introduction/'); ?>" + id;

            var loading = $('#loading');

            loading.html("<img src='<?php echo base_url('assets/img/loading.gif'); ?>' />");
            $.ajax({
                url: url,
                type: "POST",
                data: form.serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    loading.fadeIn();
                },
                success: function(data) {
                    if (data.status) {
                        alert('Introduction updated successfully');
                    } else {
                        alert('Error: ' + data.message);
                    }
                    loading.fadeOut();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error updating introduction');
                    loading.fadeOut();
                }
            });
        }

        // Save Visi Misi
        function saveVisiMisi(id) {
            var form = $('#form-visi-misi-' + id);
            var url = "<?php echo base_url('cadmin/home/update_visi_misi/'); ?>" + id;
            var loading = $('#loading-' + id);

            loading.html("<img src='<?php echo base_url('assets/img/loading.gif'); ?>' />");
            $.ajax({
                url: url,
                type: "POST",
                data: form.serialize(),
                dataType: "JSON",
                beforeSend: function() {
                    loading.fadeIn();
                },
                success: function(data) {
                    if (data.status) {
                        alert('Visi/Misi updated successfully');
                    } else {
                        alert('Error: ' + data.message);
                    }
                    loading.fadeOut();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error updating visi/misi');
                    loading.fadeOut();
                }
            });
        }

        // Bind Save Buttons
        $('#form-promo button').click(function() {
            $('#dialog_simple').dialog('open');
            window.currentFormType = 'promo';
        });

        $('#form-introduction button').click(function() {
            $('#dialog_simple').dialog('open');
            window.currentFormType = 'introduction';
        });

        <?php foreach ($visi_misi as $vm): ?>
        $('#form-visi-misi-<?php echo $vm['id']; ?> button').click(function() {
            $('#dialog_simple').dialog('open');
            window.currentFormType = 'visi_misi';
            window.currentFormId = <?php echo $vm['id']; ?>;
        });
        <?php endforeach; ?>
    });
</script>
