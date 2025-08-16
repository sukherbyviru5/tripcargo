<?php
// Log the start of the view rendering
log_message('info', 'Rendering laporan_invoice_view');

// Initialize variables for totals
$no = 1;
$tkoli = 0;
$tberat = 0;
$tharga4 = 0; // Nilai asuransi
$tharga5 = 0; // Bayar asuransi
$tharga2 = 0; // Ongkir
$tharga1 = 0; // COD
$tharga3 = 0; // Hari yang sama
$tdiskon = 0;
$tt = 0;

// Initialize filtered row count
$filtered_rows = 0;
?>

<div id="judul"></div>
<br>
<br>
<br>
<br>
<div style="display: flex; justify-content: space-between; align-items: flex-start;">
    <div id="perusahaan" style="max-width: 60%;">
        <p>
            <b>Trip Cargo</b><br>
            <?php echo $contact[0]['alamat']; ?><br>
            Tlp. <?php echo $contact[0]['no_hp']; ?><br>
            https://tripcargoid.com
        </p>
    </div>
    <div style="text-align: right;">
        <img src="<?php echo base_url(); ?>assets/images/logo-sancargo.png" width="210" height="50px">
    </div>
</div>

<style>
    div.a {
        text-align: left;
    }
</style>
<br>
<br>
<br>
<br>
<div span id="judul2"><STRONG>Laporan Pengiriman Paket</STRONG></span></div>

<hr style="margin-top: 25px";>
<div span id="pereode">
    <span id="judul"></span>
    <td>Periode tgl: &ensp;&ensp; </td>
    <td><?php echo $tgl1 . '&ensp;  s/d &ensp;  ' . $tgl2; ?></td>
	<br> <br>
</div>
<table id="info_table" style="font-size:0.9em" class="table table-hover table-responsive-sm table-condensed">
    <thead>
        <tr style="background-color: #00FF00;">
            <th style="width:auto; text-align: center; font-size: 0.9em">NO</th>
            <th style="width:auto; font-size: 0.9em">RESI</th>
            <th style="width:8%; font-size: 0.9em">Tgl</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">SERVICE</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">PENGIRIM</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">KOTA TUJUAN</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">Payment</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">Koli</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">Berat</th>
            <th style="width:auto; text-align: center; font-size: 0.9em">Ongkir</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">Asuransi</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">Packing</th>
            <th style="width:auto; text-align: left; font-size: 0.9em">Diskon</th>
            <th style="text-align: right; font-size: 0.9em">JUMLAH</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rs as $k): ?>
        <?php
                // Get pengirim name
                $nama_pengirim = $k->p_nama ?: $this->app_model->find_nama_pel($k->pel_id);
                $nama_pengirim_display = substr($nama_pengirim, 0, 20) . (strlen($nama_pengirim) > 20 ? '...' : '');

                // Get kota tujuan
                $kota_tujuan = $this->app_model->find_kokab(substr($k->kec_id, 0, 4));

                // Apply filters
                $show_row = true;
                if ($pengirim && $nama_pengirim != $pengirim) {
                    $show_row = false;
                }
                if ($tujuan && $kota_tujuan != $tujuan) {
                    $show_row = false;
                }
                if ($payment_type && $k->metode != $payment_type) {
                    $show_row = false;
                }

                // Log filtering decision
                log_message('debug', 'Row resi=' . $k->resi . 
                           ', pengirim=' . $nama_pengirim . 
                           ', tujuan=' . $kota_tujuan . 
                           ', payment_type=' . $k->metode . 
                           ', show_row=' . ($show_row ? 'true' : 'false'));

                // Output row if it passes filters
                if ($show_row):
                    $filtered_rows++;
                ?>
        <tr>
            <td align="center" style="font-size:0.9em;"><?php echo $no; ?></td>
            <td align="center" style="font-size:0.9em;"><?php echo $k->resi; ?></td>
            <td align="center" style="font-size:0.9em;"><?php echo date('d M y', strtotime($k->tglkirim)); ?></td>
            <td align="left" style="font-size:0.9em;"><?php echo $k->layan; ?></td>
            <td align="left" style="font-size:0.9em;"><?php echo $nama_pengirim_display; ?></td>
            <td align="left" style="font-size:0.9em;"><?php echo $kota_tujuan; ?></td>
            <td align="left" style="font-size:0.9em;"><?php echo $k->metode; ?></td>
            <td align="center" style="font-size:0.9em;"><?php echo number_format($k->koli, 0); ?></td>
            <td align="center" style="font-size:0.9em;"><?php echo number_format($k->berat, 0); ?></td>
            <td align="center" style="font-size:0.9em;"><?php echo number_format($k->harga2, 0); ?></td>
            <td align="center" style="font-size:0.9em;"><?php echo number_format($k->harga4, 0); ?></td>
            <td align="center" style="font-size:0.9em;"><?php echo number_format($k->harga5, 0); ?></td>
            <td align="center" style="font-size:0.9em;"><?php echo number_format($k->diskon, 0); ?> %</td>
            <td align="right" style="font-size:0.9em;"><?php echo number_format($k->totalbayar, 0); ?></td>
        </tr>
        <?php
        // Update totals
        $tkoli += $k->koli;
        $tberat += $k->berat;
        $tharga4 += $k->harga4; // Nilai asuransi
        $tharga5 += $k->harga5; // Bayar asuransi
        $tharga2 += $k->harga2; // Ongkir
        $tharga1 += $k->harga1; // COD
        $tharga3 += $k->harga3; // Hari yang sama
        $tdiskon += $k->diskon;
        $tt += $k->totalbayar;
        $no++;
        ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php
        // Log the number of filtered rows
        log_message('info', 'Filtered ' . $filtered_rows . ' rows for display');
        ?>
        <!-- Total row -->
        <?php if ($filtered_rows > 0): ?>
        <tr style="font-weight:bold;">
            <td colspan="7" align="right">TOTAL:</td>
            <td align="center"><?php echo number_format($tkoli, 0); ?></td>
            <td align="center"><?php echo number_format($tberat, 0); ?></td>
            <td align="center"><?php echo number_format($tharga2, 0); ?></td>
            <td align="center"><?php echo number_format($tharga4, 0); ?></td>
            <td align="center"><?php echo number_format($tharga5, 0); ?></td>
            <td align="center"><?php echo number_format($tdiskon, 0); ?> %</td>
            <td align="right"><?php echo number_format($tt, 0); ?></td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<br />

<style>
    td p {
        line-height: 8px;
    }

    thead,
    th {
        text-align: center;
        vertical-align: middle;
    }

    #judul {
        margin-top: -20px;
        text-align: center;
        font-size: 1.0em;
        text-shadow: 0px 0px 0px #000000;
        -webkit-text-fill-color: #232323;
        -webkit-text-stroke: 0px purple;
        padding-top: 2px;
    }

    #judul2 {
        text-align: center;
        margin-top: -40px;
        font-size: 1.8em;
    }

    #perusahaan {
        margin-top: -50px;
        text-align: left;
        font-size: 1.0em;
    }

    #logo {
        text-align: left;
        margin-top: 1px;
        width=100%;
        height=100%;
    }

    #pereode {
        text-align: left;
        font-size: 1.0em;
        margin-top: -5px;
    }

    #ttd {
        text-align: center;
        font-family: "Trebuchet MS";
        font-size: 13px;
        float: right;
        padding-right: 10px;
        padding-bottom: 10px;
    }

    #Bank {
        margin-left: 260px;
        text-align: Left;
        font-family: "Trebuchet MS";
        font-size: 13px;
        float: right;
        padding-right: 10px;
        padding-bottom: 10px;
    }
</style>
