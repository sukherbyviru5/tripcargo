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

                                    <!-- Alamat -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Alamat</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="Masukkan alamat lengkap" name="alamat" rows="4" maxlength="1000"><?= isset($contact[0]['alamat']) ? $contact[0]['alamat'] : '' ?></textarea>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-map-marker"></i></span>
                                            </div>
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

                                    <!-- Link Google Maps -->
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Link Google Maps</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <textarea class="form-control" placeholder="https://goo.gl/maps/..." name="maps_link" rows="5" maxlength="2000"><?= $contact[0]['maps_link'] ?></textarea>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-globe"></i></span>
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
                                            <small class="text-muted">Jika ingin banyak nomor, pisahkan dengan
                                                koma.</small>
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
