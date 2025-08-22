<aside id="left-panel">
    <div class="login-info">
        <span>
            <a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
                <?php 
                $user = $this->session->userdata('username');
                $foto = $this->app_model->find_foto($user);
                if ($foto == '') {
                    $url = base_url() . "assets/img/avatars/7.png";
                } else {
                    $url = base_url() . "assets/upload/" . $foto;
                }
                ?>
                <img span class="hidden-xs" src="<?php echo $url; ?>" alt="me" class="online" /> 
                <a href="<?php echo base_url() . 'cadmin/home/'; ?>profile" title="Profile"><span class="menu-item-parent"><?php 
                    echo $this->app_model->find_nama_admin($user);
                ?></span></a>
            </a> 
        </span>
    </div>
    <nav>
        <?php 
        $akt = $this->uri->segment(3);
        $level = $this->session->userdata('level');
        $menu_user = $this->session->userdata('menu_user');
        ?>
        <ul>
            <?php if ($level == "superadmin") { ?>
                <li>
                    <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/'; ?>home/dashboard" title="Dashboard"><span class="menu-item-parent">Dashboard</span></a>
                        </li>
                       	<?php if ($this->session->userdata('menu_user')): ?>
							<li class="hidden-xs <?php echo $this->app_model->status_menu($akt, 'users'); ?>">
								<a href="<?php echo base_url('cadmin/home/users'); ?>" title="Tambah Pengguna">
									<span class="menu-item-parent">User</span>
								</a>
							</li>
						<?php endif; ?>
                        <li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt, 'area_kec'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>area_kec" title="Area Kecamatan"><span class="menu-item-parent">Area Kecamatan</span></a>
                        </li>
                        <li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt, 'area_kab'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>area_kab" title="Area Kabupaten"><span class="menu-item-parent">Area Kabupaten</span></a>
                        </li>
                        <li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt, 'area_prov'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>area_prov" title="Area Provinsi"><span class="menu-item-parent">Area Provinsi</span></a>
                        </li>
                        <li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt, 'asal'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>asal" title="Asal"><span class="menu-item-parent">Asal</span></a>
                        </li>
                        <li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt, 'tujuan'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>tujuan" title="Tujuan"><span class="menu-item-parent">Tujuan</span></a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'set_harga'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>set_harga" title="Setting Harga"><span class="menu-item-parent">Setting Harga</span></a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'contact'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>contact" title="Guestbook"><span class="menu-item-parent">Guestbook</span></a>
                        </li>
                    </ul>    
                </li>
                <li>
                    <a href="#" title="Entry Shipment"><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Entry Shipment</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'cargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>cargo" title="Entry Shipment"><span class="menu-item-parent">Entry Shipment</span></a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'pelanggan'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>pelanggan" title="Pelanggan"><span class="menu-item-parent">Pelanggan</span></a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'updatecargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>updatecargo" title="Update Posisi"><span class="menu-item-parent">Update Posisi Cargo</span></a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'databarang'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>databarang" title="Data Barang (isi, berat, volume)"><span class="menu-item-parent">Data Barang</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="manifast"><i class="fa fa-list-alt"></i><span class="menu-item-parent">Manifest</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'manifast'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>manifast" title="manifast"><span class="menu-item-parent">Buat Manifest</span></a>
                        </li>
                    </ul>
                </li>
                <li span class="hidden-xs">
                    <a href="#" title="Laporan"><i class="fa fa-lg fa-fw fa-print"></i><span class="menu-item-parent">Laporan</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'linvoice'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/laporan/'; ?>linvoice" title="Invoice">Invoice</a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lpenerimaan'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/laporan/'; ?>lpenerimaan" title="Laporan Penerimaan">Packing List Harian</a>
                        </li>
                    </ul>
                </li>
                <li span class="hidden-xs">
                    <a title="Formulir"><i class="fa fa-lg fa-fw fa-newspaper-o" aria-hidden="true"></i><span class="menu-item-parent">Formulir</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/Formulir_manifast" alt="" title="Formulir manifast">Formulir manifast</a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/SURAT PEMBAYARAN VENDOR _1_.pdf" alt="" title="Formulir Pembayaran Vendor">Formulir Pembayaran Vendor</a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/Uang Jalan Oprasional.pdf" alt="" title="Formulir Uang Jalan">Formulir Uang Jalan</a>
                        </li>
                    </ul>
                </li>
                <li span class="hidden-xs">
                    <a title="Formulir Asuransi"><i class="fa fa-lg fa-fw fa-newspaper-o" aria-hidden="true"></i><span class="menu-item-parent">Asuransi</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/SPPA_MARINE_CARGO.pdf" alt="" title="Formulir Asuransi">Formulir Asuransi</a>
                        </li>
                    </ul>    
                </li>
                <li span class="hidden-xs">
                    <a title="QRIS"><i class="fa fa-lg fa-fw fa-qrcode" aria-hidden="true"></i><span class="menu-item-parent">QRIS</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/ID2025372662440.jpeg" alt="" title="Qris Trip Cargo"><img alt="Berkas:QRIS logo.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/576px-QRIS_logo.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/350px-QRIS_logo.svg.png 2x" data-file-width="auto" data-file-height="32"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" alt="" title="Laporan Qiris">Laporan Qris Trip Cargo</a>
                        </li>
                    </ul>    
                </li>
                <li>
                    <a href="#" title="Tarif"><i class="fa fa-money" aria-hidden="true"></i><span class="menu-item-parent">Tarif</span></a>
                    <ul>
                        <li class="hidden-xs">
                            <a  href="<?php echo base_url() . 'cadmin/laporan/'; ?>tarif" alt="" title="tarif.pdf">Cetak Tarif</a>
                        </li>
                    </ul>
                </li>
                <li span class="hidden-xs">
                    <a title="Pajak"><i class="fa fa-lg fa-fw fa-gavel" aria-hidden="true"></i><span class="menu-item-parent">Pajak</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="https://ui-login.oss.go.id/login" alt="" title="Login OSS"><img style="height: 23px" width="60" alt="Logo" src="https://perizinan.oss.go.id/media/logos/logo-bkpm-new/OSS%20LOGO%20NEW%202024%20ID.svg"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://djponline.pajak.go.id/account/login" alt="" title="Login DJP"><img style="height: 23px" width="60" alt="Logo" src="https://static.pajak.go.id/assets/media/logos/Logo DJP.png"></a>
                        </li>
                    </ul>    
                </li>
                <li>
                    <a href="#" title="Lacak Pengiriman"><i class="fa fa-search"></i><span class="menu-item-parent">Search</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman</a>
                        </li>
                    </ul>    
                </li>
                <li>
                    <a href="#" title="Settings"><i class="fa fa-cog"></i><span class="menu-item-parent">Settings</span></a>
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
            <?php } elseif ($level == "admin") { ?>
                <li>
                    <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/'; ?>home/Dashboard" title="Dashboard"><span class="menu-item-parent">Dashboard</span></a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'contact'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>contact" title="Guestbook"><span class="menu-item-parent">Guestbook</span></a>
                        </li>
                    </ul>    
                </li>
                <li>
                    <a href="#" title="Tarif"><i class="fa fa-money" aria-hidden="true"></i><span class="menu-item-parent">Tarif</span></a>
                    <ul>
                        <li class="hidden-xs">
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/tarif.pdf" alt="" title="tarif.pdf">Tarif</a>
                        </li>
                        <li class="hidden-xs">
                            <a target="_blank" href="https://tripcargoid.com/web/Tarif_Kargo_Hemat" alt="" title="tarif hemat">Tarif Hemat</a>
                        </li>
                        <li class="hidden-xs">
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/TARIF SANCARGO-A 2025.pdf" alt="" title="tarif hemat">TARIF A 2025.pdf</a>
                        </li>
                        <li class="hidden-xs">
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/TARIF SANCARGO-B 2025.pdf" alt="" title="tarif hemat">TARIF B 2025.pdf</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Entry Shipment"><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Entry Shipment</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'cargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>cargo" title="Entry Shipment">Entry Shipment</a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'updatecargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>updatecargo" title="Update Posisi Cargo">Update Posisi Cargo</a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'databarang'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>databarang" title="Lacak Data Barang">Data Barang</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="manifast"><i class="fa fa-list-alt"></i><span class="menu-item-parent">Manifest</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'manifast'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>manifast" title="manifast">Buat Manifest</a>
                        </li>
                    </ul>
                </li>
                <li span class="hidden-xs">
                    <a href="#" title="Laporan"><i class="fa fa-lg fa-fw fa-print"></i><span class="menu-item-parent">Laporan</span></a>
                    <ul>
                        <li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt, 'lpengiriman'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/laporan/'; ?>lpengiriman" title="Status Pengiriman">Status Pengiriman</a>
                        </li>
                        <li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt, 'linvoice'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/laporan/'; ?>linvoice" title="Invoice Pelanggan">Invoice Pelanggan</a>
                        </li>
                    </ul>
                </li>    
                <li span class="hidden-xs">
                    <a title="Formulir"><i class="fa fa-lg fa-fw fa-newspaper-o" aria-hidden="true"></i><span class="menu-item-parent">Formulir</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/Formulir_manifast" alt="" title="Formulir manifast">Formulir manifast</a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/SURAT PEMBAYARAN VENDOR _1_.pdf" alt="" title="Formulir Pembayaran Vendor">Formulir Pembayaran Vendor</a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/Uang Jalan Oprasional.pdf" alt="" title="Formulir Uang Jalan">Formulir Uang Jalan</a>
                        </li>
                    </ul>
                </li>
                <li span class="hidden-xs">
                    <a title="Formulir Asuransi"><i class="fa fa-lg fa-fw fa-newspaper-o" aria-hidden="true"></i><span class="menu-item-parent">Asuransi</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/SPPA_MARINE_CARGO.doc" alt="" title="Formulir Asuransi">Formulir Asuransi</a>
                            <ul>
                                <li>
                                    <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/SPPA_MARINE_CARGO.doc" alt="" title="Formulir Asuransi doc">doc</a>
                                </li>
                                <li>
                                    <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/SPPA_MARINE_CARGO.pdf" alt="" title="Formulir Asuransi pdf">pdf</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li span class="hidden-xs">
                    <a title="Pajak"><i class="fa fa-lg fa-fw fa-gavel" aria-hidden="true"></i><span class="menu-item-parent">Pajak</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="https://ui-login.oss.go.id/login" alt="" title="Login OSS"><img style="height: 23px" width="60" alt="Logo" src="https://perizinan.oss.go.id/media/logos/logo-bkpm-new/OSS%20LOGO%20NEW%202024%20ID.svg"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://djponline.pajak.go.id/account/login" alt="" title="Login DJP"><img style="height: 23px" width="60" alt="Logo" src="https://static.pajak.go.id/assets/media/logos/Logo DJP.png"></a>
                        </li>
                    </ul>    
                </li>
                <li span class="hidden-xs">
                    <a title="QRIS"><i class="fa fa-lg fa-fw fa-qrcode" aria-hidden="true"></i><span class="menu-item-parent">QRIS</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/ID2025372662440.jpeg" alt="" title="Qris Trip Cargo"><img alt="Berkas:QRIS logo.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/576px-QRIS_logo.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/350px-QRIS_logo.svg.png 2x" data-file-width="auto" data-file-height="32"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" alt="" title="Laporan Qiris">Laporan Qris Trip Cargo</a>
                        </li>
                    </ul>    
                </li>
                <li class="hidden-xs">
                    <a href="#" title="Member"><i class="glyphicon glyphicon-user"></i><span class="menu-item-parent">Member</span></a>
                    <ul>
                        <li span class="<?php echo $this->app_model->status_menu($akt, 'users'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>users" title="Tambah Pengguna"><span class="menu-item-parent">New User</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Lacak Pengiriman"><i class="fa fa-search"></i><span class="menu-item-parent">Search</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman</a>
                        </li>
                    </ul>    
                </li>    
            <?php } elseif ($level == "admin2") { ?>
                <li>
                    <a href="#" title="Home"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Home</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'set_harga'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>set_harga" title="List Harga/Tarif Pengiriman">List Harga/Tarif Pengiriman</a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'contact'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>contact" title="Guestbook">Guestbook</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Entry Shipment"><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Entry Shipment</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'cargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>cargo" title="Input Transaksi Pengiriman">Input Transaksi Pengiriman</a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'updatecargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>updatecargo" title="Input Posisi Kiriman">Input Posisi Kiriman</a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'pelanggan'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>pelanggan" title="List Pelanggan">List Pelanggan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="manifast"><i class="fa fa-list-alt"></i><span class="menu-item-parent">Manifest</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'manifast'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>manifast" title="Input Manifest">Input Manifest</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Laporan"><i class="fa fa-lg fa-fw fa-print"></i><span class="menu-item-parent">Laporan</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'linvoice'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/laporan/'; ?>linvoice" title="Laporan Pengiriman">Laporan Pengiriman</a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lpenerimaan'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/laporan/'; ?>lpenerimaan" title="Laporan Packing List">Laporan Packing List</a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lmanifast_area'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/laporan/'; ?>lmanifast_area" title="Laporan manifast">Laporan manifast</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Lacak Pengiriman"><i class="fa fa-search"></i><span class="menu-item-parent">Search</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman</a>
                        </li>
                    </ul>
                </li>
            <?php } elseif ($level == "driver") { ?>
                <li>
                    <a href="#"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Home</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/'; ?>home/dashboard" title="Dashboard"><span class="menu-item-parent">Dashboard</span></a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard-umum'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/'; ?>home/dashboard_umum" title="Dashboard"><span class="menu-item-parent">Dashboard Umum</span></a>
                        </li>
                    </ul>    
                </li>
                <li>
                    <a href="#" title="Tarif"><i class="fa fa-money" aria-hidden="true"></i><span class="menu-item-parent">Tarif</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="https://tripcargoid.com/web/Tarif_Kargo_Hemat" alt="" title="tarif hemat">Tarif Hemat</a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/TARIF SANCARGO-A 2025.pdf" alt="" title="tarif hemat">TARIF A 2025.pdf</a>
                        </li>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/TARIF SANCARGO-B 2025.pdf" alt="" title="tarif hemat">TARIF B 2025.pdf</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Cargo"><i class="fa fa-lg fa fa-paper-plane"></i><span class="menu-item-parent">Update</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'updatecargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>updatecargo" title="Update Posisi Cargo">Update Posisi Cargo</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="manifast"><i class="fa fa-list-alt"></i><span class="menu-item-parent">Manifest</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'manifast'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>manifast" title="manifast">Buat Manifest</a>
                        </li>
                    </ul>    
                </li>
                <li span class="hidden-xs">
                    <a title="QRIS"><i class="fa fa-lg fa-fw fa-qrcode" aria-hidden="true"></i><span class="menu-item-parent">QRIS</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/ID2025372662440.jpeg" alt="" title="Qris Trip Cargo"><img alt="Berkas:QRIS logo.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/576px-QRIS_logo.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/350px-QRIS_logo.svg.png 2x" data-file-width="auto" data-file-height="32"></a>
                        </li>
                        <li>
                            <a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" alt="" title="Laporan Qiris">Laporan Qris Trip Cargo</a>
                        </li>
                    </ul>    
                </li>
                <li>
                    <a href="#" title="Lacak Pengiriman"><i class="fa fa-search"></i><span class="menu-item-parent">Search</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman</a>
                        </li>
                    </ul>    
                </li>
            <?php } elseif ($level == "umum") { ?>
                
                <li>
                    <a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i><span class="menu-item-parent">Home</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'dashboard-umum'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/'; ?>home/dashboard_umum" title="Dashboard Umum"><span class="menu-item-parent">Dashboard Umum</span></a>
                        </li>
                    </ul>    
                </li>
                <!-- <li>
                    <a href="#" title="Entry Shipment"><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Entry Shipment</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'cargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>cargo" title="Isi Data Pengiriman"><span class="menu-item-parent">Entry Shipment</span></a>
                        </li>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'pelanggan'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>pelanggan" title="Pelanggan"><span class="menu-item-parent">Pelanggan</span></a>
                        </li>
                    </ul>
                </li> -->
                    <li>
                    <a href="#" title="Cargo"><i class="fa fa-lg fa fa-paper-plane"></i><span class="menu-item-parent">Update</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'updatecargo'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>updatecargo" title="Update Posisi Cargo">Update Posisi Cargo</a>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="Tarif"><i class="fa fa-money" aria-hidden="true"></i><span class="menu-item-parent">Tarif</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/tarif.jpg" alt="" title="tarif hemat">Tarif Hemat jpg</a>
                        </li>
                    </ul>
                </li>
                <li span class="hidden-xs">
                    <a title="QRIS"><i class="fa fa-lg fa-fw fa-qrcode" aria-hidden="true"></i><span class="menu-item-parent">QRIS</span></a>
                    <ul>
                        <li>
                            <a target="_blank" href="<?php echo base_url(); ?>assets/atropos/images/ID2025372662440.jpeg" alt="" title="Qris Trip Cargo">QRIS</a>
                        </li>
                        <li>
                            <a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" alt="" title="Laporan Qiris">Laporan Qris Trip Cargo</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="WA"><i class="fa fa-whatsapp" aria-hidden="true"></i><span class="menu-item-parent">WA</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lpengiriman'); ?>">
                            <a target="_blank" href="https://api.whatsapp.com/send?phone=62881080899678" title="Hubungi Admin">Hubungi Admin</a>
                        </li>
                    </ul>
                </li> -->
                <li>
                    <a href="#" title="Lacak Pengiriman"><i class="fa fa-search"></i><span class="menu-item-parent">Search</span></a>
                    <ul>
                        <li class="<?php echo $this->app_model->status_menu($akt, 'lacakkirim'); ?>">
                            <a href="<?php echo base_url() . 'cadmin/home/'; ?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman</a>
                        </li>
                    </ul>    
                </li>
                
            <?php } ?>
        </ul>
    </nav>
    <span class="minifyme" data-action="minifyMenu"><i class="fa fa-arrow-circle-left hit"></i></span>
</aside>