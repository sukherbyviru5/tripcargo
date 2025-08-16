<?php 
    $level = $this->session->userdata('level');
?>
<link href="<?php echo base_url() . 'assets/css/invoice.min.css'; ?>" rel="stylesheet">
<div id="content">
    <!-- row -->
    <!--div class="row">
  <!-- MODAL PLACE HOLDER -->
    <!--div class="modal fade" id="remoteModal" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true" >
   <div class="modal-dialog" style="width:550px;">
    <div class="modal-content" ></div>
   </div>
  </div>
  <!-- END MODAL -->
    <!-- Button trigger modal -->
    <div class="widget-body no-padding">
        <div class="widget-body-toolbar">
            <!-- widget content -->
            
            <!-- end widget content -->
        </div>
    </div>
	<div class="card" style="width: 100%; height: auto;">
    <div class="col-sm-6">
        <div id="smart-form-register" class="smart-form" novalidate="novalidate">
          
            <section class="col-sm-6">
                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                    <input type="text" name="tgl1" placeholder="Mulai" class="datepicker" data-dateformat="dd-mm-yy">
                </label>
            </section>
            <section class="col-sm-6">
                <label class="input"> <i class="icon-append fa fa-calendar"></i>
                    <input type="text" name="tgl2" placeholder="s.d. tgl" class="datepicker" data-dateformat="dd-mm-yy">
                </label>
            </section>
           <section class="col-sm-6">
				<label>Pengirim/Pelanggan</label>
				<label class="select">
					<select name="pengirim" class="form-control">
						<option value="">Berdasarkan pelanggan</option>
						<?php foreach ($pelanggan as $row): ?>
							<option value="<?= $row->nama; ?>"><?= $row->nama; ?></option>
						<?php endforeach; ?>
					</select>
				</label>
			</section>

           <?php if ($level != 'admin2'): ?>
                <section class="col-sm-6">
                    <label>Area</label>
                    <label class="select">
                        <select name="tujuan" class="select">
                            <option value="">- Pilih Area -</option>
                            <?php foreach ($area as $row): ?>
                                <option value="<?= $row->kab; ?>"><?= $row->kab; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </section>
            <?php endif; ?>
            
            <section class="col-sm-6">
                <label>jenis pembayaran</label>
                <label class="select">
                    <select name="payment_type">
                        <option value="">Pilih Jenis Pembayaran</option>
                        <option value="Cash">Cash</option>
                        <option value="Payment">Payment</option>
                    </select>
                </label>
            </section>
        </div>
    </div>
    <div class="col-sm-6 text-align-left">
        <div class="btn-group">
            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="cari()" title="Tampilkan Stok">
                <i class="fa fa-external-link"></i> Tampilkan <span id="loading"></span>
            </a>
        </div>
        <div class="btn-group">
            <a href="javascript:void(0)" class="btn btn-sm btn-info" onclick="cetak()" title="Cetak ke Printer">
                <i class="fa fa-print"></i> Cetak Pdf
            </a>
        </div>
        <div class="btn-group">
            <a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="cetakExcel()" title="">
                <i class="fa-solid fa-file-csv"></i> Cetak Excel
            </a>
        </div>
    </div>
</div>

<style>
.card {
    padding: 15px;
    margin-bottom: 20px;
}
.smart-form section {
    margin-bottom: 15px;
}
.smart-form label {
    font-weight: bold;
}
.smart-form .input, .smart-form .select {
    position: relative;
}
.smart-form .input i, .smart-form .select i {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
}
.smart-form input, .smart-form select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.btn-group {
    margin-right: 10px;
}
.btn {
    padding: 6px 12px;
    font-size: 14px;
}
.text-align-left {
    text-align: left;
}
</style>
</div>
<!-- end row -->

<!-- NEW COL START -->
<div>
    <article class="col-sm-12 col-md-12 col-lg-12">
        <!-- Widget ID (each widget will need unique ID)-->
        <div class="jarviswidget" id="wid-id-12" data-widget-editbutton="false" data-widget-custombutton="false">
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
                <span class="widget-icon"> <i class="fa fa-list"></i> </span>
                <h2>Laporan Pengiriman Paket</h2>
            </header>

            <!-- widget div-->
            <div>
                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->
                </div>
                <!-- end widget edit box -->
                <!-- widget content -->
                <div class="container-fluid">
                    <div id="info">
                    </div>
                </div>
                <br>
                <!-- end widget content -->
            </div>
            <br>
            <!-- end widget div -->
        </div>
        <!-- end widget -->
    </article>
    <!-- END COL -->

</div>
</div>


</section>
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 100%;
        overflow: auto;
    }

    .table-wrapper-scroll-y {
        display: none;
    }
</style>
<!-- end row -->
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<!-- Bootstrap modal -->
<script type="text/javascript">
    function load_pengirim() {
        //$('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form_pengirim').modal('show'); // show bootstrap modal
        $('.modal-title').text('Cari Pengirim'); // Set Title to Bootstrap modal title
    }

    function pilih_pengirim(id, nama) {
        // ajax delete data to database
        $('[name="pengirim"]').val(id);
        $('[name="nama_pel"]').val(nama);

        $('#modal_form_pengirim').modal('hide');
    }

    function cari() {
        $('#loading').html("<img src='<?php echo base_url() . 'assets/img/loading.gif'; ?>' />");
        var tampilkan = $("#info");
        var loading = $("#loading");
        tampilkan.hide();

        var tgl1 = $('[name="tgl1"]').val();
        var tgl2 = $('[name="tgl2"]').val();
        var pengirim = $('[name="pengirim"]').val();
        var tujuan = $('[name="tujuan"]').val();
        var payment_type = $('[name="payment_type"]').val();


        if (tgl1 == "" && tgl2 == "") {
            var error = true;
            alert("Maaf, Field masih kosong");
            loading.fadeOut();
            return (false);

        }
        var id = {
            tgl1: tgl1,
            tgl2: tgl2,
            pengirim: pengirim,
            tujuan: tujuan,
            payment_type: payment_type,
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() . 'cadmin/laporan/cetak_invoice'; ?>",
            data: id,
            beforeSend: function() {
                // $("#loaderDiv").show();
                loading.fadeIn();
            },
            success: function(msg) {
                // $('#info').html(msg);
                loading.fadeOut();
                tampilkan.html(msg);
                loading.hide();
                tampilkan.fadeIn(1000);
            }
        });
    }
    // run pagefunction

    function cetak() {
        // Do print the page
        if (typeof(window.print) != 'undefined') {
            window.print();
        }
    }


    function cetakExcel() {
        // Get the table from the #info div
        const table = document.querySelector('#info table');
        if (!table) {
            alert('No table data found to export.');
            return;
        }

        // Initialize arrays to store data
        const headers = [];
        const tableData = [];

        // Extract headers
        const headerRow = table.querySelector('thead tr');
        headerRow.querySelectorAll('th').forEach(th => {
            headers.push(th.textContent.trim());
        });

        // Extract table rows
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const rowData = [];
            row.querySelectorAll('td').forEach((td, index) => {
                if (index < headers.length) {
                    rowData.push(td.textContent.trim());
                }
            });
            if (rowData.length > 1) {
                tableData.push(rowData);
            }
        });

        // Use provided system date for print date
        const formattedDate = '16-08-2025';

        // Company info with only title and print date
        const companyInfo = [
            ['Laporan Pengiriman Paket'],
            [`Tanggal Cetak: ${formattedDate}`],
            ['']
        ];

        // Create a new workbook and worksheet
        const wb = XLSX.utils.book_new();
        const ws = XLSX.utils.aoa_to_sheet(companyInfo);

        // Merge cells for company info (A1:M1 for title, A2:M2 for print date)
        ws['!merges'] = [{
                s: {
                    r: 0,
                    c: 0
                },
                e: {
                    r: 0,
                    c: 12
                }
            }, // Merge A1:M1 (Report Title)
            {
                s: {
                    r: 1,
                    c: 0
                },
                e: {
                    r: 1,
                    c: 12
                }
            } // Merge A2:M2 (Print Date)
        ];

        // Center-align company info
        companyInfo.forEach((_, idx) => {
            if (ws[`A${idx + 1}`]) {
                ws[`A${idx + 1}`].s = {
                    alignment: {
                        horizontal: 'center',
                        vertical: 'center'
                    },
                    font: {
                        bold: idx === 0
                    }
                }; // Bold title only
            }
        });

        // Add headers starting from row 4 (compact layout)
        XLSX.utils.sheet_add_aoa(ws, [headers], {
            origin: 'A4'
        });

        // Apply green background to headers
        headers.forEach((_, idx) => {
            const cellRef = XLSX.utils.encode_cell({
                r: 3,
                c: idx
            });
            if (!ws[cellRef]) ws[cellRef] = {
                v: headers[idx]
            };
            ws[cellRef].s = {
                fill: {
                    fgColor: {
                        rgb: '00FF00'
                    }
                }, // Green background
                font: {
                    bold: true
                },
                alignment: {
                    horizontal: 'center',
                    vertical: 'center'
                }
            };
        });

        // Add table data starting from row 5
        XLSX.utils.sheet_add_aoa(ws, tableData, {
            origin: 'A5'
        });

        // Find the total row (last row with "TOTAL" in it)
        const totalRow = tableData.find(row => row.includes('TOTAL:'));
        if (totalRow) {
            const totalRowIndex = tableData.indexOf(totalRow) + 4; // Adjust for header row
            // Merge L and M columns for the TOTAL value
            ws['!merges'].push({
                s: {
                    r: totalRowIndex,
                    c: 11
                },
                e: {
                    r: totalRowIndex,
                    c: 12
                }
            });
            // Right-align and bold the total value
            const totalCellRef = XLSX.utils.encode_cell({
                r: totalRowIndex,
                c: 11
            });
            if (ws[totalCellRef]) {
                ws[totalCellRef].s = {
                    font: {
                        bold: true
                    },
                    alignment: {
                        horizontal: 'right'
                    }
                };
            }
        }

        // Adjust column widths for better readability
        const colWidths = headers.map(() => ({
            wch: 15
        }));
        ws['!cols'] = colWidths;

        // Append worksheet to workbook
        XLSX.utils.book_append_sheet(wb, ws, 'Laporan Pengiriman');

        // Generate file name with print date
        const fileName = `Laporan_Pengiriman_Paket_tgl_cetak_${formattedDate}.xlsx`;

        // Generate and download the Excel file
        XLSX.writeFile(wb, fileName);
    }
</script>

<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    var table;

    $(document).ready(function() {

        //datatables
        var responsiveHelper_datatable_pengirim = undefined;



        var breakpointDefinition = {
            tablet: 1024,
            phone: 480
        };

        table = $('#datatable_pengirim').DataTable({

            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel',
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'A4'
                }, 'print'
            ],
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [
                [1, "desc"]
            ],

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('cadmin/home/pelanggan_ajax_list_2'); ?>",
                "type": "POST"
            },
            "preDrawCallback": function() {
                // Initialize the responsive datatables helper once.
                if (!responsiveHelper_datatable_pengirim) {
                    responsiveHelper_datatable_pengirim = new ResponsiveDatatablesHelper($(
                        '#datatable_pengirim'), breakpointDefinition);
                }
            },
            "rowCallback": function(nRow) {
                responsiveHelper_datatable_pengirim.createExpandIcon(nRow);
            },
            "drawCallback": function(oSettings) {
                responsiveHelper_datatable_pengirim.respond();
            },
            //Set column definition initialisation properties.
            "columnDefs": [{
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },

            ],


        });

    });
</script>
