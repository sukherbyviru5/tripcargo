<!-- Google tag (gtag.js) -->
<!--script async src="https://www.googletagmanager.com/gtag/js?id=G-4MZKHD3L34"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-4MZKHD3L34');
</script-->

<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Cetak Manifest</li>
	</ol>
</div>	
<div id="content">
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		
		<!-- row -->
		<div class="row">
	
		
			<!-- WIDGET END -->
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
						<h2>Daftar Manifest <span id="loading2"></span></h2>
	
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
	
						<!-- Filter -->
						<div class="row mb-3">
							<div class="col-md-3">
								<label for="filter_tanggal">Tanggal Awal</label>
								<input type="date" name="tgl1" id="filter_tanggal" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="filter_tanggal">Tanggal Akhir</label>
								<input type="date" name="tgl2" id="filter_tanggal" class="form-control">
							</div>
							<div class="col-md-3">
								<label for="filter_asal">Asal</label>
								<select class="form-control" name="area" id="filter_area" required>
									<option value="" selected="selected">Pilih Area
										<?php
											foreach ($area as $kode) {
												echo '<option value=' . $kode->kode . '>' . $kode->kode . '</option>';
											}
										?>
									</option>
								</select>
							</div>
							<div class="col-md-12 d-flex align-items-end">
								<div>
									<br> 
								</div>
								<button type="button" id="btnFilter" class="btn btn-primary w-100">
									<i class="fa fa-filter"></i> Filter
								</button>
								<button type="button" id="btnCetak" class="btn btn-info w-100">
									<i class="fa fa-print"></i> Cetak PDF
								</button>
								<button type="button" id="btnCetakExcel" class="btn btn-success w-100">
									<i class="fa fa-print"></i> Cetak Excel
								</button>
							</div>
						</div>
						
						<table id="table" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone" style="width:10px;">No</th>
										<th data-class="phone" style="width:auto;"><i class="fa fa-fw fa-list-alt text-muted hidden-md hidden-sm hidden-xs"></i> Manifest</th>
										<th data-class="phone"style="width:auto;"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Driver</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i> HP Driver</th>
										<th data-class="phone" style="width:auto;"><i class="fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-info text-muted hidden-md hidden-sm hidden-xs"></i> Remark</th>
										<th data-hide="phone" style="width:auto;"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> User_Id</th>
										<th data-hide="phone,tablet" style="width:90px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
										
									</tr>
								</thead>
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

<style>
.modal-dialog{
  max-width: 100%;

}
</style>
<script src="https://cdn.jsdelivr.net/npm/exceljs/dist/exceljs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<script type="text/javascript">

	
	function cetak(id){
		window.open("<?php echo base_url();?>cadmin/laporan/cetak_manifast/"+id);
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
		var table = $('#table').dataTable();
		table.ajax.reload();
	}
	
	
</script>

<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!
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
            url: "<?php echo site_url('cadmin/home/manifast_ajax_list')?>",
            type: "POST",
            data: function(d) {
                d.tgl1 = $('[name="tgl1"]').val();
                d.tgl2 = $('[name="tgl2"]').val();
                d.area = $('[name="area"]').val();
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
            {
                targets: [-1], 
                orderable: false
            }
        ]
    });

    // Filter button click event
    $('#btnFilter').click(function() {
        table.ajax.reload(); 
    });

    $('#btnCetak').click(function() {
		var tgl1 = $('[name="tgl1"]').val();
		var tgl2 = $('[name="tgl2"]').val();
		var area = $('[name="area"]').val();

		var url = '/cadmin/laporan/cetak_pdf_manifast/?tgl1=' + tgl1 + '&tgl2=' + tgl2 + '&area=' + area;

		window.location.href = url;
	});

    $('#btnCetakExcel').click(async function() {
		const tgl1 = $('[name="tgl1"]').val();
		const tgl2 = $('[name="tgl2"]').val();
		const area = $('[name="area"]').val();

		const url = `/cadmin/laporan/cetak_pdf_manifast?json=true&tgl1=${tgl1}&tgl2=${tgl2}&area=${area}`;

		try {
			const response = await fetch(url);
			const data = await response.json();

			if (!data.rs || data.rs.length === 0) {
				alert('Tidak ada data untuk diekspor!');
				return;
			}

			// Buat workbook baru
			const workbook = new ExcelJS.Workbook();
			const sheet = workbook.addWorksheet('Laporan Manifast');

			// Header tabel
			sheet.addRow(['No', 'Tanggal', 'Driver', 'Tujuan', 'No Manifast', 'Resi', 'Area Paket']);
			const headerRow = sheet.getRow(1);
			headerRow.font = { bold: true };
			headerRow.eachCell(cell => {
				cell.fill = { type: 'pattern', pattern: 'solid', fgColor: { argb: 'FFCCE5FF' } };
				cell.border = {
					top: { style: 'thin' },
					left: { style: 'thin' },
					bottom: { style: 'thin' },
					right: { style: 'thin' }
				};
			});

			let no = 1;
			data.rs.forEach(row => {
				row.detail.forEach(detail => {
					sheet.addRow([
						no++,
						row.tgl,
						row.driver,
						row.tujuan,
						row.nom,
						detail.resi,
						detail.area_paket
					]);
				});
			});

			sheet.columns.forEach(col => {
				let max = 10;
				col.eachCell({ includeEmpty: true }, cell => {
					max = Math.max(max, cell.value ? cell.value.toString().length : 0);
				});
				col.width = max + 2;
			});

			const buffer = await workbook.xlsx.writeBuffer();
			saveAs(new Blob([buffer]), `Laporan_Manifast_${new Date().toISOString().slice(0,10)}.xlsx`);
		} catch (err) {
			console.error(err);
			alert('Gagal membuat file Excel!');
		}
	});
});
</script>
