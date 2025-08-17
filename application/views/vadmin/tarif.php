<div id="ribbon">
    <ol class="breadcrumb">
        <li>Home</li>
        <li>Laporan Tarif</li>
    </ol>
</div>
<div id="content">
    <section id="widget-grid" class="">
        <div class="row">
            <article class="col-sm-12 col-md-12 col-lg-4">
                <div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                        <h2>Cetak Tarif</h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox"></div>
                        <div class="widget-body">
                            <form id="smart-form-register" class="form-horizontal">
                                <fieldset>
                                    <legend>Filter Laporan</legend>
                                    <div class="form-group has-success">
                                        <label class="col-md-4 control-label">Asal</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="hidden" name="id">
                                                <select class="form-control" name="asal">
                                                    <option value="">-- Pilih Asal --</option>
                                                    <?php foreach ($asal as $asal): ?>
                                                    <option value="<?= htmlspecialchars($asal) ?>">
                                                        <?= htmlspecialchars($asal) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-map-marker"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label class="col-md-4 control-label">Tujuan</label>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <input type="hidden" name="id">
                                                <select class="form-control" name="tujuan">
                                                    <option value="">-- Pilih Tujuan --</option>
                                                    <?php foreach ($tujuan as $row): ?>
                                                    <option value="<?= htmlspecialchars($row) ?>">
                                                        <?= htmlspecialchars($row) ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span class="input-group-addon"><i
                                                        class="glyphicon glyphicon-map-marker"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <input type="hidden" name="simpan">
                                            <button type="button" id="btnCari" onclick="cari()" class="btn btn-info">
                                                <i class="fa fa-search"></i> Cari
                                            </button>
                                            <button type="button" onclick="printTable()" class="btn btn-danger">
                                                <i class="fa fa-file-pdf-o"></i> Cetak PDF
                                            </button>
                                            <button type="button" onclick="exportToExcel()" class="btn btn-success">
                                                <i class="fa fa-file-excel-o"></i> Cetak Excel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </article>

            <article class="col-sm-12 col-md-12 col-lg-8">
                <div class="jarviswidget" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-columns"></i> </span>
                        <h2>List Tarif<span id="loading2"></span></h2>
                    </header>
                    <div>
                        <div class="jarviswidget-editbox"></div>
                        <div class="widget-body">
                            <table id="table" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:30px;">No</th>
                                        <th>Asal</th>
                                        <th>Tujuan</th>
                                        <th>Layanan</th>
                                        <th>Tarif</th>
                                        <th>Estimasi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
<script type="text/javascript">
    function reload_table() {
        var table = $('#table').dataTable();
        table.ajax.reload();
    }

    var table;
    $(document).ready(function() {
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
    });

    function cari() {
        table.ajax.reload();
    }

    function formatRupiah(angka) {
        if (!angka) angka = 0; 
        return 'Rp ' + parseInt(angka, 10)
            .toLocaleString('id-ID', { minimumFractionDigits: 0 });
    }

    function printTable() {
        $.ajax({
            url: "<?php echo site_url('cadmin/laporan/cetak_tarif'); ?>",
            type: "POST",
            data: {
                asal: $('select[name="asal"]').val(),
                tujuan: $('select[name="tujuan"]').val()
            },
            success: function(response) {
                console.log('AJAX Response:', response);
                var data = response || [];
                if (data.length === 0) {
                    alert('Tidak ada data untuk dicetak ke PDF.');
                    return;
                }

                var tableHtml = `
                    <table class="table table-striped table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th style="width:30px;">No</th>
                                <th>Asal</th>
                                <th>Tujuan</th>
                                <th>Layanan</th>
                                <th>Tarif</th>
                                <th>Estimasi</th>
                            </tr>
                        </thead>
                        <tbody>
                `;
                data.forEach((row, index) => {
                    tableHtml += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${row.asal || ''}</td>
                            <td>${row.tujuan || ''}</td>
                            <td>${row.layanan || ''}</td>
                            <td>${formatRupiah(row.harga)}</td>
                            <td>${row.estimasi || ''}</td>
                        </tr>
                    `;
                });
                tableHtml += '</tbody></table>';

                var asal = $('select[name="asal"]').val() || 'Semua';
                var tujuan = $('select[name="tujuan"]').val() || 'Semua';
                var printWindow = window.open('', '_blank');
                printWindow.document.write(`
                    <html>
                    <head>
                        <title>Cetak Tarif</title>
                        <style>
                            body {
                                font-family: Arial, Helvetica, sans-serif;
                                color: #333;
                            }
                            .container {
                                width: 100%;
                                max-width: 1000px;
                                margin: 0 auto;
                            }
                            .header {
                                text-align: center;
                                margin-bottom: 20px;
                            }
                            .header h1 {
                                margin: 0;
                                font-size: 24px;
                                color: #000;
                            }
                            .header p {
                                margin: 5px 0;
                                font-size: 14px;
                                color: #555;
                            }
                            table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                                font-size: 12px;
                            }
                            th, td {
                                border: 1px solid #999;
                                padding: 8px;
                                text-align: left;
                            }
                            th {
                                background-color: #e0e0e0;
                                font-weight: bold;
                            }
                            .table-striped tbody tr:nth-child(odd) {
                                background-color: #f9f9f9;
                            }
                            .footer {
                                position: fixed;
                                bottom: 20px;
                                width: 100%;
                                text-align: center;
                                font-size: 12px;
                                color: #777;
                            }
                            @media print {
                                .footer {
                                    position: fixed;
                                    bottom: 0;
                                }
                                table {
                                    font-size: 10px;
                                }
                                th, td {
                                    padding: 6px;
                                }
                            }
                            @media screen and (max-width: 600px) {
                                table {
                                    font-size: 10px;
                                }
                                th, td {
                                    padding: 5px;
                                }
                            }
                        </style>
                    </head>
                    <body>
                        <div class="container">
                            <div class="header">
                                <h1>Cetak Tarif</h1>
                                <p>Asal: ${asal} | Tujuan: ${tujuan}</p>
                                <p>Tanggal Cetak: ${new Date().toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' })}</p>
                            </div>
                            ${tableHtml}
                        </div>
                    </body>
                    </html>
                `);
                printWindow.document.close();
                printWindow.print();
                printWindow.onafterprint = function() {
                    printWindow.close();
                };
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', xhr.responseText);
                alert('Gagal mengambil data untuk PDF.');
            }
        });
    }

    function exportToExcel() {
        $.ajax({
            url: "<?php echo site_url('cadmin/laporan/cetak_tarif'); ?>",
            type: "POST",
            data: {
                asal: $('select[name="asal"]').val(),
                tujuan: $('select[name="tujuan"]').val()
            },
            success: function(response) {
                console.log('AJAX Response:', response);
                var data = response || [];
                if (data.length === 0) {
                    alert('Tidak ada data untuk diekspor ke Excel.');
                    return;
                }

                var excelData = data.map((row, index) => ({
                    No: index + 1,
                    Asal: row.asal || '',
                    Tujuan: row.tujuan || '',
                    Layanan: row.layanan || '',
                    Tarif: row.harga ? row.harga.toString().replace(/,/g, '') : '0',
                    Estimasi: row.estimasi || ''
                }));

                var wb = XLSX.utils.book_new();
                var ws = XLSX.utils.json_to_sheet(excelData, {
                    header: ["No", "Asal", "Tujuan", "Layanan", "Tarif", "Estimasi"],
                    skipHeader: false
                });

                ws['!cols'] = [{
                        wch: 5
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 15
                    },
                    {
                        wch: 20
                    },
                    {
                        wch: 15
                    }
                ];

                XLSX.utils.book_append_sheet(wb, ws, "Laporan Tarif");
                XLSX.writeFile(wb, `Laporan_Tarif_${new Date().toLocaleDateString('id-ID').replace(/\//g, '-')}.xlsx`);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', xhr.responseText);
                alert('Gagal mengambil data untuk Excel.');
            }
        });
    }
</script>