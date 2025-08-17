<div id="ribbon">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Settings</li>
        <li>Contact</li>
    </ol>
</div>

<div id="content">
    <section id="widget-grid">
        <div class="row">
            <article class="col-sm-12 col-md-12 col-lg-12">
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"><i class="fa fa-edit"></i></span>
                        <h2>Edit Contact</h2>
                    </header>
                    <div>
                        <div class="widget-body">
                            <form id="form-contact" class="form-horizontal">
                                <fieldset>
                                    <legend>Informasi Kontak</legend>

                                    <input type="hidden" name="id" value="<?= $contact[0]['id'] ?>">

                                    <!-- Alamat (Multiple Locations) -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Alamat</label>
                                        <div class="col-md-8">
                                            <div id="location-list">
                                                <?php 
                                                $locations = isset($contact[0]['alamat']) ? json_decode($contact[0]['alamat'], true) : [''];
                                                foreach ($locations as $index => $location): ?>
                                                    <div class="input-group location-group" style="margin-bottom: 10px;">
                                                        <input type="text" class="form-control" placeholder="Masukkan alamat (misal: Bandung)" 
                                                               name="alamat[]" value="<?= htmlspecialchars($location) ?>">
                                                        <span class="input-group-addon">
                                                            <i class="glyphicon glyphicon-map-marker"></i>
                                                        </span>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-danger btn-remove-location">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <button type="button" class="btn btn-success btn-add-location">
                                                <i class="fa fa-plus"></i> Tambah Alamat
                                            </button>
                                        </div>
                                    </div>

                                      <!-- Link Google Maps -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Link Google Maps</label>
                                        <div class="col-md-8">
                                            <div id="maps-list">
                                                <?php 
                                                $maps = isset($contact[0]['maps_link']) ? json_decode($contact[0]['maps_link'], true) : [''];
                                                foreach ($maps as $index => $map): ?>
                                                    <div class="input-group map-group" style="margin-bottom: 10px;">
                                                        <textarea class="form-control" placeholder="https://goo.gl/maps/..." 
                                                         name="maps_link[]" rows="5" maxlength="2000"><?= htmlspecialchars($map) ?></textarea>
                                                         <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-globe"></i></span>
                                                        <span class="input-group-btn">
                                                            <button type="button" class="btn btn-danger btn-remove-maps">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <button type="button" class="btn btn-success btn-add-maps">
                                                <i class="fa fa-plus"></i> Tambah Maps
                                            </button>
                                            
                                        </div>
                                    </div>
                                    
                                    <!-- Jam Kerja -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Jam Kerja</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input class="form-control" placeholder="Senin - Sabtu: 07:00-17:00 WIB"
                                                       type="text" name="jam_kerja"
                                                       value="<?= $contact[0]['jam_kerja'] ?>" maxlength="255">
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-time"></i></span>
                                            </div>
                                        </div>
                                    </div>

                                  

                                    <!-- Nomor HP -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Nomor HP</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="0812xxxxxxx"
                                                       name="no_hp" value="<?= $contact[0]['no_hp'] ?>" maxlength="300"
                                                       required>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-earphone"></i></span>
                                            </div>
                                            <small class="text-muted">Jika ingin banyak nomor, pisahkan dengan koma.</small>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="email" class="form-control"
                                                       placeholder="contoh@email.com" name="email"
                                                       value="<?= $contact[0]['email'] ?>" maxlength="255" required>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-envelope"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-primary" id="btn-save-contact">
                                                <i class="fa fa-floppy-o"></i> Simpan <span id="loading-contact"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>

<!-- Dialog konfirmasi -->
<div id="dialog_contact" style="display:none;">
    <p>Apakah Anda yakin ingin menyimpan perubahan pada contact?</p>
</div>

<script>
    $(document).ready(function() {
        pageSetUp();

        // Add new location input field
        $('.btn-add-location').click(function() {
            var newLocationField = `
                <div class="input-group location-group" style="margin-bottom: 10px;">
                    <input type="text" class="form-control" placeholder="Masukkan alamat (misal: Bandung)" 
                           name="alamat[]">
                    <span class="input-group-addon">
                        <i class="glyphicon glyphicon-map-marker"></i>
                    </span>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-danger btn-remove-location">
                            <i class="fa fa-trash"></i>
                        </button>
                    </span>
                </div>`;
            $('#location-list').append(newLocationField);
        });

        // Remove location input field
        $(document).on('click', '.btn-remove-location', function() {
            if ($('.location-group').length > 1) {
                $(this).closest('.location-group').remove();
            } else {
                alert('Minimal satu alamat harus tetap ada.');
            }
        });

        $('.btn-add-maps').click(function() {
            var newmapsField = `
            <div class="input-group maps-group" style="margin-bottom: 10px;">
                <textarea class="form-control" placeholder="https://goo.gl/maps/..." 
                    name="maps_link[]" rows="5" maxlength="2000"></textarea>
                    <span class="input-group-addon"><i
                class="glyphicon glyphicon-globe"></i></span>
                <span class="input-group-btn">
                    <button type="button" class="btn btn-danger btn-remove-maps">
                        <i class="fa fa-trash"></i>
                    </button>
                </span>
            </div>
            
            `;
            $('#maps-list').append(newmapsField);
        });

        // Remove maps input field
        $(document).on('click', '.btn-remove-maps', function() {
            if ($('.maps-group').length > 1) {
                $(this).closest('.maps-group').remove();
            } else {
                alert('Minimal satu alamat harus tetap ada.');
            }
        });

        // Dialog konfirmasi
        $('#dialog_contact').dialog({
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
                    saveContact();
                }
            }, {
                html: "<i class='fa fa-times'></i>&nbsp; Batal",
                "class": "btn btn-default",
                click: function() {
                    $(this).dialog("close");
                }
            }]
        });

        // Klik tombol simpan → buka dialog
        $('#btn-save-contact').click(function() {
            $('#dialog_contact').dialog('open');
        });

        // Fungsi simpan AJAX
        function saveContact() {
            var form = $('#form-contact');
            var id = form.find('input[name="id"]').val();
            var url = "<?= base_url('cadmin/home/setting_contact_update/') ?>" + id;
            var loading = $('#loading-contact');

            loading.html("<img src='<?= base_url('assets/img/loading.gif') ?>' />");
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
                        alert('Contact berhasil diperbarui');
                    } else {
                        alert('Error: ' + data.message);
                    }
                    loading.fadeOut();
                },
                error: function() {
                    alert('Terjadi kesalahan saat memperbarui contact');
                    loading.fadeOut();
                }
            });
        }
    });
</script>