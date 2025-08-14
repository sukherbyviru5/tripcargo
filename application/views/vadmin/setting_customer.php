<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <title>APP - Trip Cargo</title>
    <meta name="description" content="App || Trip Cargo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-179642767-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-179642767-1');
    </script>

    <!-- Basic Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">

    <!-- SmartAdmin Styles -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/smartadmin-production-plugins.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/smartadmin-production.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/smartadmin-skins.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/smartadmin-rtl.min.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/your_style.css'); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css/demo.min.css'); ?>">

    <!-- Favicon and Apple Touch Icons -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon/sancargo1.png'); ?>" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url('assets/img/favicon/sancargo1.png'); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo base_url('assets/img/splash/sptouch-icon-iphone.png'); ?>">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/splash/touch-icon-ipad.png'); ?>">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/img/splash/touch-icon-iphone-retina.png'); ?>">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/img/splash/touch-icon-ipad-retina.png'); ?>">
    <link rel="apple-touch-startup-image" href="<?php echo base_url('assets/img/splash/ipad-landscape.png'); ?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
    <link rel="apple-touch-startup-image" href="<?php echo base_url('assets/img/splash/ipad-portrait.png'); ?>" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
    <link rel="apple-touch-startup-image" href="<?php echo base_url('assets/img/splash/iphone.png'); ?>" media="screen and (max-device-width: 320px)">

    <!-- iOS Web App Meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

    <!-- jQuery and jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        if (!window.jQuery) {
            document.write('<script src="<?php echo base_url('assets/js/libs/jquery-2.1.1.min.js'); ?>"></script>');
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        if (!window.jQuery.ui) {
            document.write('<script src="<?php echo base_url('assets/js/libs/jquery-ui-1.10.3.min.js'); ?>"></script>');
        }
    </script>
</head>
<body class="fixed-header fixed-ribbon fixed-navigation">
    <!-- HEADER -->
    <header id="header">
        <div id="logo-group">
            <span id="logo">
                <img src="<?php echo base_url('assets/upload/' . ($record[0]->foto ?? 'sancargo1.png')); ?>" width="28px" class="img-circle img-responsive" alt="">
            </span>
        </div>
        <div class="pull-right">
            <!-- Collapse Menu -->
            <div id="hide-menu" class="btn-header pull-right">
                <span><a href="javascript:void(0);" title="Collapse Menu" data-action="toggleMenu"><i class="fa fa-reorder"></i></a></span>
            </div>
            <!-- User Dropdown -->
            <ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-top-10 padding-bottom-5">
                <li>
                    <div class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown" aria-expanded="true">
                        <img src="<?php echo base_url('assets/upload/' . ($record[0]->foto ?? 'avatars/7.png')); ?>" width="28px" class="img-circle img-responsive" alt="<?php echo $this->session->userdata('nama_pengguna') ?? 'User'; ?>">
                        <span style="font-size: 0.7em; font-weight: bold;"><?php echo $this->session->userdata('nama_pengguna') ?? 'Guest'; ?></span>
                    </div>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="<?php echo base_url('cadmin/home/profile'); ?>" class="padding-10"><i class="fa fa-user"></i> Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0);" class="padding-10" data-action="toggleShortcut"><i class="fa fa-arrow-down"></i> Shortcut</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0);" class="padding-10" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Full Screen</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo base_url('cadmin/home/logout'); ?>" class="padding-10" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong>Logout</strong></a></li>
                    </ul>
                </li>
            </ul>
            <!-- Search Form -->
            <form action="<?php echo base_url('cadmin/home/search'); ?>" class="header-search pull-right">
                <input type="text" name="param" placeholder="No. Airway bill (AWB)" id="search-fld">
                <button type="submit"><i class="fa fa-search"></i></button>
                <a href="javascript:void(0);" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
            </form>
            <!-- Fullscreen Button -->
            <div id="fullscreen" class="btn-header transparent pull-right">
                <span><a href="javascript:void(0);" title="Full Screen" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i></a></span>
            </div>
            <!-- Voice Command -->
            <div id="speech-btn" class="btn-header transparent pull-right hidden-sm hidden-xs">
                <div>
                    <a href="javascript:void(0);" title="Voice Command" data-action="voiceCommand"><i class="fa fa-microphone"></i></a>
                    <div class="popover bottom">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <h4 class="vc-title">Voice command activated <br><small>Please speak clearly into the mic</small></h4>
                            <h4 class="vc-title-error text-center">
                                <i class="fa fa-microphone-slash"></i> Voice command failed
                                <br><small class="txt-color-red">Must <strong>"Allow"</strong> Microphone</small>
                                <br><small class="txt-color-red">Must have <strong>Internet Connection</strong></small>
                            </h4>
                            <a href="javascript:void(0);" class="btn btn-success" onclick="commands.help()">See Commands</a>
                            <a href="javascript:void(0);" class="btn bg-color-purple txt-color-white" onclick="$('#speech-btn .popover').fadeOut(50);">Close Popup</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER -->

    <!-- NAVIGATION -->
    <aside id="left-panel">
        <!-- User Info -->
        <div class="login-info">
            <span>
                <a href="<?php echo base_url('cadmin/home/profile'); ?>" title="Profile">
                    <img src="<?php echo base_url('assets/upload/' . ($this->app_model->find_foto($this->session->userdata('username')) ?: 'avatars/7.png')); ?>" alt="User" class="online">
                    <span class="menu-item-parent"><?php echo $this->app_model->find_nama_admin($this->session->userdata('username')) ?: 'Guest'; ?></span>
                </a>
            </span>
        </div>
        <!-- Navigation Menu -->
        <nav>
            <?php
            $akt = $this->uri->segment(3);
            $level = $this->session->userdata('level');
            ?>
            <ul>
                <?php if ($level == 'superadmin') { ?>
                    <!-- Home Menu -->
                    <li>
                        <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard'); ?>">
                                <a href="<?php echo base_url('cadmin/home/dashboard'); ?>" title="Dashboard">Dashboard</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'users'); ?>">
                                <a href="<?php echo base_url('cadmin/home/users'); ?>" title="Tambah Pengguna">User</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'area_kec'); ?>">
                                <a href="<?php echo base_url('cadmin/home/area_kec'); ?>" title="Area Kecamatan">Area Kecamatan</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'area_kab'); ?>">
                                <a href="<?php echo base_url('cadmin/home/area_kab'); ?>" title="Area Kabupaten">Area Kabupaten</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'area_prov'); ?>">
                                <a href="<?php echo base_url('cadmin/home/area_prov'); ?>" title="Area Provinsi">Area Provinsi</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'set_harga'); ?>">
                                <a href="<?php echo base_url('cadmin/home/set_harga'); ?>" title="Setting Harga">Setting Harga</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'contact'); ?>">
                                <a href="<?php echo base_url('cadmin/home/contact'); ?>" title="Guestbook">Guestbook</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Entri Shipment -->
                    <li>
                        <a href="#" title="Entri Shipment"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Entri Shipment</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'cargo'); ?>">
                                <a href="<?php echo base_url('cadmin/home/cargo'); ?>" title="Entry Shipment">Entry Shipment</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'pelanggan'); ?>">
                                <a href="<?php echo base_url('cadmin/home/pelanggan'); ?>" title="Pelanggan">Pelanggan</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'updatecargo'); ?>">
                                <a href="<?php echo base_url('cadmin/home/updatecargo'); ?>" title="Update Posisi Cargo">Update Posisi Cargo</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'databarang'); ?>">
                                <a href="<?php echo base_url('cadmin/home/databarang'); ?>" title="Data Barang">Data Barang</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Manifast -->
                    <li>
                        <a href="#" title="Manifast"><i class="fa fa-list-alt"></i> <span class="menu-item-parent">Manifast</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'manifast'); ?>">
                                <a href="<?php echo base_url('cadmin/home/manifast'); ?>" title="Buat Manifast">Buat Manifast</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Laporan -->
                    <li>
                        <a href="#" title="Laporan"><i class="fa fa-lg fa-fw fa-print"></i> <span class="menu-item-parent">Laporan</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'linvoice'); ?>">
                                <a href="<?php echo base_url('cadmin/laporan/linvoice'); ?>" title="Invoice">Invoice</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'lpenerimaan'); ?>">
                                <a href="<?php echo base_url('cadmin/laporan/lpenerimaan'); ?>" title="Paking List Harian">Paking List Harian</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Formulir -->
                    <li>
                        <a href="#" title="Formulir"><i class="fa fa-lg fa-fw fa-newspaper-o"></i> <span class="menu-item-parent">Formulir</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/Formulir_Manifast'); ?>" title="Formulir Manifast">Formulir Manifast</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/SURAT PEMBAYARAN VENDOR _1_.pdf'); ?>" title="Formulir Pembayaran Vendor">Formulir Pembayaran Vendor</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/Uang Jalan Oprasional.pdf'); ?>" title="Formulir Uang Jalan">Formulir Uang Jalan</a></li>
                        </ul>
                    </li>
                    <!-- Asuransi -->
                    <li>
                        <a href="#" title="Asuransi"><i class="fa fa-lg fa-fw fa-newspaper-o"></i> <span class="menu-item-parent">Asuransi</span></a>
                        <ul>
                            <li>
                                <a href="#" title="Formulir Asuransi">Formulir Asuransi</a>
                                <ul>
                                    <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/SPPA_MARINE_CARGO.doc'); ?>" title="Formulir Asuransi doc">doc</a></li>
                                    <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/SPPA_MARINE_CARGO.pdf'); ?>" title="Formulir Asuransi pdf">pdf</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- QRIS -->
                    <li>
                        <a href="#" title="QRIS"><i class="fa fa-lg fa-fw fa-qrcode"></i> <span class="menu-item-parent">QRIS</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/ID2025372662440.jpeg'); ?>" title="QRIS Trip Cargo"><img alt="QRIS logo" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20"></a></li>
                            <li><a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" title="Laporan QRIS">Laporan QRIS Trip Cargo</a></li>
                        </ul>
                    </li>
                    <!-- Tarif -->
                    <li>
                        <a href="#" title="Tarif"><i class="fa fa-money"></i> <span class="menu-item-parent">Tarif</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/tarif.pdf'); ?>" title="Daftar Tarif">Daftar Tarif</a></li>
                            <li><a target="_blank" href="https://tripcargo.test/web/Tarif_Kargo_Hemat" title="Tarif Hemat">IKLAN Tarif Hemat</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/TARIF SANCARGO-A 2025.pdf'); ?>" title="TARIF A 2025">TARIF A 2025.pdf</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/TARIF SANCARGO-B 2025.pdf'); ?>" title="TARIF B 2025">TARIF B 2025.pdf</a></li>
                        </ul>
                    </li>
                    <!-- Pajak -->
                    <li>
                        <a href="#" title="Pajak"><i class="fa fa-lg fa-fw fa-gavel"></i> <span class="menu-item-parent">Pajak</span></a>
                        <ul>
                            <li><a target="_blank" href="https://ui-login.oss.go.id/login" title="Login OSS"><img style="height: 23px; width: 60px;" alt="OSS Logo" src="https://perizinan.oss.go.id/media/logos/logo-bkpm-new/OSS%20LOGO%20NEW%202024%20ID.svg"></a></li>
                            <li><a target="_blank" href="https://djponline.pajak.go.id/account/login" title="Login DJP"><img style="height: 23px; width: 60px;" alt="DJP Logo" src="https://static.pajak.go.id/assets/media/logos/Logo DJP.png"></a></li>
                        </ul>
                    </li>
                    <!-- Search -->
                    <li>
                        <a href="#" title="Search"><i class="fa fa-search"></i> <span class="menu-item-parent">Search</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                                <a href="<?php echo base_url('cadmin/home/lacakkirim'); ?>" title="Lacak Pengiriman">Lacak Pengiriman</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Settings -->
                    <li>
                        <a href="#" title="Settings"><i class="fa fa-cog"></i> <span class="menu-item-parent">Settings</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'introduction'); ?>">
                                <a href="<?php echo base_url('cadmin/home/introduction'); ?>" title="Introduction & Visi Misi">Introduction & Visi Misi</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'customer'); ?>">
                                <a href="<?php echo base_url('cadmin/home/customer'); ?>" title="Customer">Customer</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'service'); ?>">
                                <a href="<?php echo base_url('cadmin/home/service'); ?>" title="Service">Service</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'setting_contact'); ?>">
                                <a href="<?php echo base_url('cadmin/home/setting_contact'); ?>" title="Contact">Contact</a>
                            </li>
                        </ul>
                    </li>
                <?php } elseif ($level == 'admin') { ?>
                    <!-- Home Menu -->
                    <li>
                        <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard'); ?>">
                                <a href="<?php echo base_url('cadmin/home/dashboard'); ?>" title="Dashboard">Dashboard</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'contact'); ?>">
                                <a href="<?php echo base_url('cadmin/home/contact'); ?>" title="Guestbook">Guestbook</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tarif -->
                    <li>
                        <a href="#" title="Tarif"><i class="fa fa-money"></i> <span class="menu-item-parent">Tarif</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/tarif.pdf'); ?>" title="Daftar Tarif">Daftar Tarif</a></li>
                            <li><a target="_blank" href="https://tripcargo.test/web/Tarif_Kargo_Hemat" title="Tarif Hemat">Tarif Hemat</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/TARIF SANCARGO-A 2025.pdf'); ?>" title="TARIF A 2025">TARIF A 2025.pdf</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/TARIF SANCARGO-B 2025.pdf'); ?>" title="TARIF B 2025">TARIF B 2025.pdf</a></li>
                        </ul>
                    </li>
                    <!-- Entri Shipment -->
                    <li>
                        <a href="#" title="Entri Shipment"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Entri Shipment</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'cargo'); ?>">
                                <a href="<?php echo base_url('cadmin/home/cargo'); ?>" title="Entry Shipment">Entry Shipment</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'updatecargo'); ?>">
                                <a href="<?php echo base_url('cadmin/home/updatecargo'); ?>" title="Update Posisi Cargo">Update Posisi Cargo</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'databarang'); ?>">
                                <a href="<?php echo base_url('cadmin/home/databarang'); ?>" title="Data Barang">Data Barang</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Manifast -->
                    <li>
                        <a href="#" title="Manifast"><i class="fa fa-list-alt"></i> <span class="menu-item-parent">Manifast</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'manifast'); ?>">
                                <a href="<?php echo base_url('cadmin/home/manifast'); ?>" title="Buat Manifast">Buat Manifast</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Laporan -->
                    <li>
                        <a href="#" title="Laporan"><i class="fa fa-lg fa-fw fa-print"></i> <span class="menu-item-parent">Laporan</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'lpengiriman'); ?>">
                                <a href="<?php echo base_url('cadmin/laporan/lpengiriman'); ?>" title="Status Pengiriman">Status Pengiriman</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'linvoice'); ?>">
                                <a href="<?php echo base_url('cadmin/laporan/linvoice'); ?>" title="Invoice Pelanggan">Invoice Pelanggan</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Formulir -->
                    <li>
                        <a href="#" title="Formulir"><i class="fa fa-lg fa-fw fa-newspaper-o"></i> <span class="menu-item-parent">Formulir</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/Formulir_Manifast'); ?>" title="Formulir Manifast">Formulir Manifast</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/SURAT PEMBAYARAN VENDOR _1_.pdf'); ?>" title="Formulir Pembayaran Vendor">Formulir Pembayaran Vendor</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/Uang Jalan Oprasional.pdf'); ?>" title="Formulir Uang Jalan">Formulir Uang Jalan</a></li>
                        </ul>
                    </li>
                    <!-- Asuransi -->
                    <li>
                        <a href="#" title="Asuransi"><i class="fa fa-lg fa-fw fa-newspaper-o"></i> <span class="menu-item-parent">Asuransi</span></a>
                        <ul>
                            <li>
                                <a href="#" title="Formulir Asuransi">Formulir Asuransi</a>
                                <ul>
                                    <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/SPPA_MARINE_CARGO.doc'); ?>" title="Formulir Asuransi doc">doc</a></li>
                                    <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/SPPA_MARINE_CARGO.pdf'); ?>" title="Formulir Asuransi pdf">pdf</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- Pajak -->
                    <li>
                        <a href="#" title="Pajak"><i class="fa fa-lg fa-fw fa-gavel"></i> <span class="menu-item-parent">Pajak</span></a>
                        <ul>
                            <li><a target="_blank" href="https://ui-login.oss.go.id/login" title="Login OSS"><img style="height: 23px; width: 60px;" alt="OSS Logo" src="https://perizinan.oss.go.id/media/logos/logo-bkpm-new/OSS%20LOGO%20NEW%202024%20ID.svg"></a></li>
                            <li><a target="_blank" href="https://djponline.pajak.go.id/account/login" title="Login DJP"><img style="height: 23px; width: 60px;" alt="DJP Logo" src="https://static.pajak.go.id/assets/media/logos/Logo DJP.png"></a></li>
                        </ul>
                    </li>
                    <!-- QRIS -->
                    <li>
                        <a href="#" title="QRIS"><i class="fa fa-lg fa-fw fa-qrcode"></i> <span class="menu-item-parent">QRIS</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/ID2025372662440.jpeg'); ?>" title="QRIS Trip Cargo"><img alt="QRIS logo" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20"></a></li>
                            <li><a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" title="Laporan QRIS">Laporan QRIS Trip Cargo</a></li>
                        </ul>
                    </li>
                    <!-- Member -->
                    <li>
                        <a href="#" title="Member"><i class="glyphicon glyphicon-user"></i> <span class="menu-item-parent">Member</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'users'); ?>">
                                <a href="<?php echo base_url('cadmin/home/users'); ?>" title="New User">New User</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Search -->
                    <li>
                        <a href="#" title="Search"><i class="fa fa-search"></i> <span class="menu-item-parent">Search</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                                <a href="<?php echo base_url('cadmin/home/lacakkirim'); ?>" title="Lacak Pengiriman">Lacak Pengiriman</a>
                            </li>
                        </ul>
                    </li>
                <?php } elseif ($level == 'driver') { ?>
                    <!-- Home Menu -->
                    <li>
                        <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard'); ?>">
                                <a href="<?php echo base_url('cadmin/home/dashboard'); ?>" title="Dashboard">Dashboard</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard-umum'); ?>">
                                <a href="<?php echo base_url('cadmin/home/dashboard_umum'); ?>" title="Dashboard Umum">Dashboard Umum</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tarif -->
                    <li>
                        <a href="#" title="Tarif"><i class="fa fa-money"></i> <span class="menu-item-parent">Tarif</span></a>
                        <ul>
                            <li><a target="_blank" href="https://tripcargo.test/web/Tarif_Kargo_Hemat" title="Tarif Hemat">Tarif Hemat</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/TARIF SANCARGO-A 2025.pdf'); ?>" title="TARIF A 2025">TARIF A 2025.pdf</a></li>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/TARIF SANCARGO-B 2025.pdf'); ?>" title="TARIF B 2025">TARIF B 2025.pdf</a></li>
                        </ul>
                    </li>
                    <!-- Update -->
                    <li>
                        <a href="#" title="Update"><i class="fa fa-lg fa-fw fa-paper-plane"></i> <span class="menu-item-parent">Update</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'updatecargo'); ?>">
                                <a href="<?php echo base_url('cadmin/home/updatecargo'); ?>" title="Update Posisi Cargo">Update Posisi Cargo</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Manifast -->
                    <li>
                        <a href="#" title="Manifast"><i class="fa fa-list-alt"></i> <span class="menu-item-parent">Manifast</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'manifast'); ?>">
                                <a href="<?php echo base_url('cadmin/home/manifast'); ?>" title="Buat Manifast">Buat Manifast</a>
                            </li>
                        </ul>
                    </li>
                    <!-- QRIS -->
                    <li>
                        <a href="#" title="QRIS"><i class="fa fa-lg fa-fw fa-qrcode"></i> <span class="menu-item-parent">QRIS</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/ID2025372662440.jpeg'); ?>" title="QRIS Trip Cargo"><img alt="QRIS logo" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20"></a></li>
                            <li><a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" title="Laporan QRIS">Laporan QRIS Trip Cargo</a></li>
                        </ul>
                    </li>
                    <!-- Search -->
                    <li>
                        <a href="#" title="Search"><i class="fa fa-search"></i> <span class="menu-item-parent">Search</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                                <a href="<?php echo base_url('cadmin/home/lacakkirim'); ?>" title="Lacak Pengiriman">Lacak Pengiriman</a>
                            </li>
                        </ul>
                    </li>
                <?php } elseif ($level == 'umum') { ?>
                    <!-- Home Menu -->
                    <li>
                        <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard-umum'); ?>">
                                <a href="<?php echo base_url('cadmin/home/dashboard_umum'); ?>" title="Dashboard Umum">Dashboard Umum</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Entri Shipment -->
                    <li>
                        <a href="#" title="Entri Shipment"><i class="fa fa-lg fa-fw fa-cube"></i> <span class="menu-item-parent">Entri Shipment</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'cargo'); ?>">
                                <a href="<?php echo base_url('cadmin/home/cargo'); ?>" title="Entry Shipment">Entry Shipment</a>
                            </li>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'pelanggan'); ?>">
                                <a href="<?php echo base_url('cadmin/home/pelanggan'); ?>" title="Pelanggan">Pelanggan</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Search -->
                    <li>
                        <a href="#" title="Search"><i class="fa fa-search"></i> <span class="menu-item-parent">Search</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                                <a href="<?php echo base_url('cadmin/home/lacakkirim'); ?>" title="Lacak Pengiriman">Lacak Pengiriman</a>
                            </li>
                        </ul>
                    </li>
                    <!-- Tarif -->
                    <li>
                        <a href="#" title="Tarif"><i class="fa fa-money"></i> <span class="menu-item-parent">Tarif</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/tarif.jpg'); ?>" title="Tarif Hemat">Tarif Hemat jpg</a></li>
                        </ul>
                    </li>
                    <!-- QRIS -->
                    <li>
                        <a href="#" title="QRIS"><i class="fa fa-lg fa-fw fa-qrcode"></i> <span class="menu-item-parent">QRIS</span></a>
                        <ul>
                            <li><a target="_blank" href="<?php echo base_url('assets/atropos/images/ID2025372662440.jpeg'); ?>" title="QRIS Trip Cargo">QRIS</a></li>
                            <li><a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" title="Laporan QRIS">Laporan QRIS Trip Cargo</a></li>
                        </ul>
                    </li>
                    <!-- WA -->
                    <li>
                        <a href="#" title="WA"><i class="fa fa-whatsapp"></i> <span class="menu-item-parent">WA</span></a>
                        <ul>
                            <li class="<?php echo $this->app_model->status_menu($akt, 'lpengiriman'); ?>">
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=62881080899678" title="Hubungi Admin">Hubungi Admin</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <span class="minifyme" data-action="minifyMenu"><i class="fa fa-arrow-circle-left hit"></i></span>
    </aside>
    <!-- END NAVIGATION -->

    <!-- SHORTCUT AREA -->
    <div id="shortcut">
        <ul>
            <li>
                <a href="<?php echo base_url('cadmin/home/profile'); ?>" class="jarvismetro-tile big-cubes selected bg-color-pinkDark">
                    <span class="iconbox"><i class="fa fa-user fa-4x"></i> <span>My Profile</span></span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END SHORTCUT AREA -->

    <!-- MAIN CONTENT -->
    <div id="main" role="main">
        <div id="ribbon">
            <ol class="breadcrumb">
                <li>Home</li>
                <li>Settings</li>
                <li>Customer</li>
            </ol>
        </div>
        <div id="content">
            <section id="widget-grid" class="">
                <div class="row">
                    <article class="col-sm-12 col-md-12 col-lg-12">
                        <div class="jarviswidget" id="wid-id-customer" data-widget-editbutton="false" data-widget-deletebutton="false">
                            <header>
                                <span class="widget-icon"> <i class="fa fa-users"></i> </span>
                                <h2>Daftar Customer</h2>
                                <div class="widget-toolbar">
                                    <button class="btn btn-primary" onclick="addCustomer()">
                                        <i class="fa fa-plus-circle"></i> Tambah Customer
                                    </button>
                                </div>
                            </header>
                            <div class="p-5"  style="padding: 30px !important;">
                                <div class="jarviswidget-editbox"></div>
                                <div class="widget-body no-padding">
                                    <table id="customerTable" class="table table-striped table-bordered table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th data-class="expand">No</th>
                                                <th>Nama Customer</th>
                                                <th>Logo</th>
                                                <th data-hide="phone,tablet">Aksi</th>
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
            </section>
        </div>
    <!-- END MAIN CONTENT -->

    <!-- PAGE FOOTER -->
    <div class="page-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <span class="txt-color-white">Copyright © 2025 Trip Cargo. All Rights Reserved.</span>
            </div>
        </div>
    </div>
    <!-- END PAGE FOOTER -->

<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="customerModalLabel">Form Customer</h4>
                </div>
                <div class="modal-body">
                    <form id="customerForm" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="customerId">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Customer</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" id="customerName" placeholder="Masukkan nama customer" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Logo</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="logo" id="customerLogo">
                                <small class="help-block">Pilih gambar (jpg|png|gif). Kosongkan jika tidak ingin mengubah logo.</small>
                                <div id="logoPreview" class="mt-2"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" id="btnSave" onclick="saveCustomer()">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>

    <!-- JavaScript -->
    <script src="<?php echo base_url('assets/js/plugin/pace/pace.min.js'); ?>" data-pace-options='{ "restartOnRequestAfter": true }'></script>
    <script src="<?php echo base_url('assets/js/app.config.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/notification/SmartNotification.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/smartwidgets/jarvis.widget.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/sparkline/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/jquery-validate/jquery.validate.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/masked-input/jquery.maskedinput.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/select2/select2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/msie-fix/jquery.mb.browser.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/fastclick/fastclick.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/demo.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/speech/voicecommand.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/smart-chat-ui/smart.chat.ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/smart-chat-ui/smart.chat.manager.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/jquery-form/jquery-form.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/datatables/dataTables.colVis.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/datatables/dataTables.tableTools.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/datatables/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugin/datatable-responsive/datatables.responsive.min.js'); ?>"></script>

     <script>
        $(document).ready(function() {
            pageSetUp();

            // Inisialisasi DataTables
            var table = $('#customerTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "<?php echo base_url('cadmin/home/get_customers_ajax'); ?>",
                    "type": "POST"
                },
                "columns": [
                    { "data": "no", "orderable": false, "className": "text-center" },
                    { "data": "name" },
                    { "data": "logo", "className": "text-center" },
                    { "data": "action", "orderable": false, "className": "text-center" }
                ],
                "responsive": true,
                "bDestroy": true
            });
        });

        // Fungsi untuk membuka modal tambah data
        function addCustomer() {
            $('#customerForm')[0].reset();
            $('#customerId').val('');
            $('#logoPreview').html('');
            $('#customerModal').modal('show');
            $('#customerModalLabel').text('Tambah Customer Baru');
        }

        // Fungsi untuk membuka modal edit data
        function editCustomer(id) {
            $('#customerForm')[0].reset();
            $('#logoPreview').html('');
            $.ajax({
                url: "<?php echo base_url('cadmin/home/get_customer_by_id/'); ?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('#customerId').val(data.id);
                    $('#customerName').val(data.name);
                    if(data.logo) {
                        $('#logoPreview').html('<img src="<?php echo base_url('uploads/'); ?>' + data.logo + '" width="100">');
                    }
                    $('#customerModal').modal('show');
                    $('#customerModalLabel').text('Edit Customer');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error mendapatkan data dari server');
                }
            });
        }

        // Fungsi untuk menyimpan data (tambah atau edit)
        function saveCustomer() {
            var url;
            var id = $('#customerId').val();
            if(id) {
                url = "<?php echo base_url('cadmin/home/update_customer'); ?>";
            } else {
                url = "<?php echo base_url('cadmin/home/store_customer'); ?>";
            }

            var formData = new FormData($('#customerForm')[0]);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(data) {
                    if(data.status) {
                        $('#customerModal').modal('hide');
                        $('#customerTable').DataTable().ajax.reload();
                        $.smallBox({
                            title: "Sukses!",
                            content: "<i class='fa fa-check'></i> <i>" + data.message + "</i>",
                            color: "#659265",
                            iconSmall: "fa fa-check fa-2x fadeInRight animated",
                            timeout: 4000
                        });
                    } else {
                         $.smallBox({
                            title: "Error!",
                            content: "<i class='fa fa-times'></i> <i>" + data.message + "</i>",
                            color: "#C46A69",
                            iconSmall: "fa fa-times fa-2x fadeInRight animated",
                            timeout: 4000
                        });
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error saat menyimpan data');
                }
            });
        }

        // Fungsi untuk menghapus data
        function deleteCustomer(id) {
            $.SmartMessageBox({
                title: "Konfirmasi Hapus",
                content: "Apakah Anda yakin ingin menghapus data customer ini?",
                buttons: '[Tidak][Ya]'
            }, function (ButtonPressed) {
                if (ButtonPressed === "Ya") {
                    $.ajax({
                        url: "<?php echo base_url('cadmin/home/delete_customer/'); ?>" + id,
                        type: "POST",
                        dataType: "JSON",
                        success: function(data) {
                            $('#customerTable').DataTable().ajax.reload();
                            $.smallBox({
                                title: "Sukses!",
                                content: "<i class='fa fa-trash-o'></i> <i>Data berhasil dihapus.</i>",
                                color: "#659265",
                                iconSmall: "fa fa-check fa-2x fadeInRight animated",
                                timeout: 4000
                            });
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('Error menghapus data');
                        }
                    });
                }
            });
        }
    </script>
</body>
</html>