<!-- WRAPPER -->
<style type="text/css">
    .style1 {
        font-size: 10;
        font-family: Arial, Helvetica, sans-serif;

        div.ex1 {
            width: 400px;
            margin: auto;
            border: 3px solid #73AD21;
        }

        .style6 {
            font-weight: bold
        }

        .style7 {
            font: bold larger;
            font-size: x-large;
            color: #000033;
        }
</style>

<div id="wrapper">

    <!-- PAGE TITLE -->
    <section id="Reguler" class="container" style="text-align:center; margin-top:-50px">
        <br>
        <div class="style1">
            <div align="Left">
                <h1 style="margin-top: 40px;"></h1>
                <div align="Left" style="margin-top: 20px;">
                    <!-- breadcrumb --->
                    <hr style="margin-top: -15px;">
                    <nav style="margin-top: 20px;" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="https://tripcargo.test/">Home</a></li>
                            <li class="breadcrumb-item"><a href="https://tripcargo.test/Produk_dan_Layanan">Layanan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="">Tarif Cargo Hemat</li>
                        </ol>
                    </nav>
                    <hr style="margin-top: 1px;">
                </div>
                <!-- breadcrumb akhir--->



                <style>
                    table,
                    th,
                    td {
                        border: 1px solid black;
                        border-collapse: collapse;
                        padding-left: 5px;
                        padding-right: 5px;
                        max-width: 100%;
                    }

                    kiri {
                        \
 padding-left: 5px;
                        padding-right: 5px;
                        max-width: 33%;
                    }

                    tengah {
                        \
 padding-left: 5px;
                        padding-right: 5px;
                        max-width: 33%;
                    }

                    kanan {
                        \
 padding-left: 5px;
                        padding-right: 5px;
                        max-width: 33%;
                    }

                    .responsive {
                        width: 100%;
                        max-width: 400px;
                        height: auto;
                    }
                </style>
                <!link html>
                    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                    <!and link html>

                        <div class="w3-subcontainer" style="margin-top: -20px;">
                            <h2 style="margin-top: -20px;">TARIF CARGO VIA DARAT</h2>
                        </div>
                        <!-- tabel--->
                        <div class="w3-row" style="margin-top: 30px;">

                            <?php
                            if (!empty($tarif) && is_array($tarif)) {
                              foreach ($tarif as $nama_asal => $daftar_rute) {
                          ?>

                            <div class="w3-third w3-subcontainer">
                                <table class="w3-table-all w3-card-2" style="width:98%; margin-bottom: 20px;">

                                    <thead>
                                        <tr class="w3-teal">
                                            <th colspan="3">
                                                <b>DARI <?php echo strtoupper(htmlspecialchars($nama_asal)); ?></b>
                                            </th>
                                        </tr>
                                        <tr class="w3-light-grey">
                                            <th>Tujuan</th>
                                            <th class="w3-right-align">Harga (Rp)</th>
                                            <th>Estimasi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                     <?php foreach ($daftar_rute as $rute) { ?>
                                        <tr <?php echo $rute['promo'] ? 'style="background-color: #fff8dc;"' : ''; ?>>
                                            <td><?php echo htmlspecialchars($rute['tujuan']); ?></td>
                                            <td class="w3-right-align">
                                                <?php echo number_format($rute['harga'], 0, ',', '.'); ?>
                                            </td>
                                            <td style="position: relative;">
                                                <?php echo htmlspecialchars($rute['estimasi']); ?>
                                                <?php if ($rute['promo']) : ?>
                                                    <span style="position: absolute; top: 50%; right: -0.2px; transform: translateY(-50%); color: gold; font-size: 14px;">
                                                        &#9733;
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>

                                </table>
                            </div>

                            <?php
                              } 

                          } else {
                              echo "<div class='w3-panel w3-yellow'><p>Data tarif tidak tersedia.</p></div>";
                          }
                          ?>
                        </div>

            </div>
        </div>
</div>
<div class="container">
    <hr>
    <p style="margin-top: -10px;"><b>Syarat dan ketentuan berlaku: </b></p>
    <p style="margin-top: -20px;">Dikirim dari Depok atau Jakarta.</p>
    <p style="margin-top: -20px;">Daftar tarif pengiriman cargo via darat dan laut.</p>
    <p style="margin-top: -20px;">Estimasi waktu pengiriman berlaku dari jadwal pemberangkatan kapal berangkat.</p>
    <p style="margin-top: -20px;">Gratis biaya pickup barang untuk area sekitar Depok, Jakarta, Bogor, Tanggerang,
        Bekasi.</p>
    <p style="margin-top: -20px;">Tarif dapat berubah berlaku untuk area tujuan tingkat dua atau area kabupaten atau
        hubungi team marketing kami langsung.</p>
    <p style="margin-top: -20px;">Untuk minimal berat barang khusus area kota-kota wilayah Sumatera dan Jawa minimum 30
        kg,
        kecuali kepulauan (riau kepualuan, Bangka belitung) serta wilayah area kota Inonesia bagian Timur (minim 100
        kg).</p>
    <p style="margin-top: -20px;">Dapatkan penawaran harga hemat dengan hubungi langsung team marketing kami.</p>
    <p style="margin-top: -20px;">Jadwal pemberangkatan dapat berubah-ubah atau hubungi kami langsung.</p>
</div>

<!--wa/cs/081289897359--->
<!--script src="https://static.elfsight.com/platform/platform.js" async></script>
        <div class="elfsight-app-9e69b6c7-515f-4e23-8c9a-7246a7d4bb67" data-elfsight-app-lazy></div-->
<!---cso--->

<div>
    <!-- render the button and direct it to wa.me -->
    <a href="https://wa.me/62881080899678?text=Halo! Trip Cargo" class="floating" target="_blank">
        <i class="fa fa-whatsapp" style="margin-top: 12px;"></i>
    </a>
    <!-- add your custom CSS -->
    <style>
        body {
            font-family: sans-serif;
        }

        /* Add WA floating button CSS */
        .floating {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 2.6em;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }
    </style>

    <br>
</div>
