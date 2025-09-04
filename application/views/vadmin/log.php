<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Log Activity</li>
	</ol>
</div>	

<div id="content">
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget" id="wid-id-10" data-widget-colorbutton="false" data-widget-editbutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-list"></i> </span>
						<h2>Daftar Log Activity <span id="loading2"></span></h2>
					</header>

					<div>
						<div class="widget-body">
							
							<!-- Filter -->
							<div class="row mb-3">
								<div class="col-md-3">
									<label for="filter_tgl1">Tanggal Awal</label>
									<input type="date" name="tgl1" id="filter_tgl1" class="form-control">
								</div>
								<div class="col-md-3">
									<label for="filter_tgl2">Tanggal Akhir</label>
									<input type="date" name="tgl2" id="filter_tgl2" class="form-control">
								</div>
								<div class="col-md-3">
									<label for="filter_type">Type</label>
									<select class="form-control" name="type" id="filter_type">
										<option value="">-- Semua Type --</option>
										<option value="TARIF">TARIF</option>
										<option value="RESI">RESI</option>
										<option value="MANIFEST">MANIFEST</option>
									</select>
								</div>
								<div class="col-md-12 d-flex align-items-end">
									<div><br></div>
									<button type="button" id="btnFilter" class="btn btn-success w-100">
										<i class="fa fa-filter"></i> Filter
									</button>
									<button type="button" id="btnCetak" class="btn btn-info w-100">
										<i class="fa fa-print"></i> Cetak PDF
									</button>
								</div>
							</div>

							<table id="table" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th style="width:10px;">No</th>
										<th style="width:auto;">Tanggal</th>
										<th style="width:auto;">Type</th>
										<th style="width:auto;">Catatan</th>
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

<style>
.modal-dialog{
  max-width: 100%;
}
</style>

<script type="text/javascript">
$(document).ready(function() {
    var responsiveHelper_dt_basic = undefined;
    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

    var table = $('#table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel',
            {
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'A4'
            }, 'print'
        ],
        processing: true,
        serverSide: true,
        order: [],
        ajax: {
            url: "<?php echo site_url('cadmin/home/log_ajax_list')?>",
            type: "POST",
            data: function(d) {
                d.tgl1 = $('[name="tgl1"]').val();
                d.tgl2 = $('[name="tgl2"]').val();
                d.type = $('[name="type"]').val();
            }
        },
        preDrawCallback: function() {
            if (!responsiveHelper_dt_basic) {
                responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table'), breakpointDefinition);
            }
        },
        rowCallback: function(nRow) {
            responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        drawCallback: function(oSettings) {
            responsiveHelper_dt_basic.respond();
        },
        columnDefs: [
            { targets: [], orderable: false }
        ]
    });

    // Filter button
    $('#btnFilter').click(function() {
        table.ajax.reload(); 
    });

    // Cetak PDF
    $('#btnCetak').click(function() {
        var tgl1 = $('[name="tgl1"]').val();
        var tgl2 = $('[name="tgl2"]').val();
        var type = $('[name="type"]').val();

        var url = '/cadmin/laporan/cetak_pdf_log/?tgl1=' + tgl1 + '&tgl2=' + tgl2 + '&type=' + type;
        window.location.href = url;
    });
});
</script>
