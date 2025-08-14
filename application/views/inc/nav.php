		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as is --> 
					
					<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
						<?php 
						$user=$this->session->userdata('username');
						$foto=$this->app_model->find_foto($user);
				        if($foto==''){
							$url=base_url()."assets/img/avatars/7.png";
						}else{
							$url=base_url()."assets/upload/".$foto;
						}
						?>
						<img span class="hidden-xs" src="<?php echo $url;?>" alt="me" class="online" /> 
						
						<a href="<?php echo base_url().'cadmin/home/';?>profile" title="Profile"><span class="menu-item-parent"><?php 
							echo $this->app_model->find_nama_admin($user);
							?></span></a>
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			<nav>
				<!-- NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional hre="" links. See documentation for details.
				-->
				<!-- NAVIGATION : This navigation is also responsive

			To make this navigation dynamic please make sure to link the node
			(the reference to the nav > ul) after page load. Or the navigation
			will not initialize.
			-->
			
			<nav>
				<!-- NOTE: Notice the gaps after each icon usage <i></i>..
				Please note that these links work a bit different than
				traditional hre="" links. See documentation for details.
				-->
				<?php 
				$akt=$this->uri->segment(3);
				$level=$this->session->userdata('level');
				?>
				<ul>
					<?php if($level=="superadmin"){?>
					
					<li>
						<a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
						<ul>
							<li class="<?php echo $this->app_model->status_menu($akt,'dashboard');?>" >
								<a href="<?php echo base_url().'cadmin/';?>home/dashboard" title="Dashboard"><span class="menu-item-parent">Dashboard</span></a>
							</li>
							<!--li class="<?php echo $this->app_model->status_menu($akt,'profile');?>">
								<a href="<?php echo base_url().'cadmin/home/';?>profile" title="Profile"><span class="menu-item-parent">Profile</span></a>
							</li-->
							<li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt,'users');?>">
								<a href="<?php echo base_url().'cadmin/home/';?>users" title="Tambah Pengguna"><span class="menu-item-parent">User</span></a>
							</li>
							<li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt,'area_kec');?>">
								<a href="<?php echo base_url().'cadmin/home/';?>area_kec" title="Area Kecamatan"><span class="menu-item-parent">Area Kecamatan</span></a>
							</li>
							<li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt,'area_kab');?>">
								<a href="<?php echo base_url().'cadmin/home/';?>area_kab" title="Area Kabupaten"><span class="menu-item-parent">Area Kabupaten</span></a>
							</li>
							<li span class="hidden-xs" class="<?php echo $this->app_model->status_menu($akt,'area_prov');?>">
								<a href="<?php echo base_url().'cadmin/home/';?>area_prov" title="Area Provinsi"><span class="menu-item-parent">Area Provinsi</span></a>
							</li>
							<li class="<?php echo $this->app_model->status_menu($akt,'set_harga');?>">
								<a href="<?php echo base_url().'cadmin/home/';?>set_harga" title="Setting Harga"><span class="menu-item-parent">Setting Harga</span></a>
							</li>
							<li class="<?php echo $this->app_model->status_menu($akt,'contact');?>">
								<a href="<?php echo base_url().'cadmin/home/';?>contact" title="Guestbook"><span class="menu-item-parent">Guestbook</span></a>
							</li>
						</ul>	
					</li>
					<li><a href="#" title="Entri shipment" ><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Entri shipment</span></a>
						<ul>
							<li class="<?php echo $this->app_model->status_menu($akt,'cargo');?>">
							    <a href="<?php echo base_url().'cadmin/home/';?>cargo" title="Entry Shipment"><span class="menu-item-parent">Entry Shipment</span></a>
							</li>
							<li class="<?php echo $this->app_model->status_menu($akt,'pelanggan');?>">
							    <a href="<?php echo base_url().'cadmin/home/';?>pelanggan" title="Pelanggan"><span class="menu-item-parent">Pelanggan</span></a>
							</li>
							<li class="<?php echo $this->app_model->status_menu($akt,'updatecargo');?>">
							    <a href="<?php echo base_url().'cadmin/home/';?>updatecargo" title="Update Posisi"><span class="menu-item-parent">Update Posisi Cargo</span></a>
							</li>
							<!--li class="<?php echo $this->app_model->status_menu($akt,'lacakkirim');?>">
							    <a href="<?php echo base_url().'cadmin/home/';?>lacakkirim" title="Lacak Pengiriman"><span class="menu-item-parent">Lacak Pengiriman</span></a>
							</li-->
                            <li class="<?php echo $this->app_model->status_menu($akt,'databarang');?>">
                                <a href="<?php echo base_url().'cadmin/home/';?>databarang" title="Data Barang (isi, berat, volume)"><span class="menu-item-parent">Data Barang</span></a>
                            </li>
						</ul>
					</li>
						<li><a href="#" title="Manifast" ><i class="fa fa-list-alt"></i><span class="menu-item-parent">Manifast </span></a>
						<ul>
						   <li class="<?php echo $this->app_model->status_menu($akt,'manifast');?>">
						       <a href="<?php echo base_url().'cadmin/home/';?>manifast" title="Manifast"><span class="menu-item-parent">Buat Manifast</span></a>
						   </li>
						</ul>
					    
					<li span class="hidden-xs"><a href="#" title="Laporan" >
						<i class="fa fa-lg fa-fw fa-print"></i>
						<span class="menu-item-parent">Laporan </span>	</a>
						<ul>
							<!---li class="<?php echo $this->app_model->status_menu($akt,'lpengiriman');?>">
							    <a href="<?php echo base_url().'cadmin/laporan/';?>lpengiriman" title="Laporan Pengiriman per resi">Pengiriman </a>
							</li--->
							<li class="<?php echo $this->app_model->status_menu($akt,'lpengiriman');?>">
							    <a href="<?php echo base_url().'cadmin/laporan/';?>linvoice" title="Invoice">Invoice </a>
							</li>
							<li class="<?php echo $this->app_model->status_menu($akt,'lpenerimaan');?>">
							    <a href="<?php echo base_url().'cadmin/laporan/';?>lpenerimaan" title="Laporan Penerimaan">Paking List Harian </a>
							</li>
						</ul>
					</li>
					
					
					<li span class="hidden-xs"><a title="Formulir" >
						<i class="fa fa-lg fa-fw  fa-newspaper-o" aria-hidden="true"></i>
						<span class="menu-item-parent">Formulir </span></a>
						<ul>
						  <!--li>
						      <a target="_blank" href=" <?php echo base_url();?>assets/atropos/images/FORMULIR_PICKUP_BARANG" alt="" title="Formulir Pickup Barang">Formulir Pickup Barang </a>
						  </li-->
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/Formulir_Manifast" alt="" title="Formulir Manifast">Formulir Manifast </a>
						  </li>
    						  <li>
    						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/SURAT PEMBAYARAN VENDOR _1_.pdf" alt="" title="Formulir Pembayaran Vendor">Formulir Pembayaran Vendor</a>
    						  </li>
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/Uang Jalan Oprasional.pdf" alt="" title="Formulir Uang Jalan">Formulir Uang Jalan </a>
						  </li>
						  <!--li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/RESI MANUAL SANCARGO.pdf" alt="" title="Resi Manual">Resi Manual </a>
						  </li-->
						</ul>
					<li span class="hidden-xs"><a title="Formulir Asuransi" >
						<i class="fa fa-lg fa-fw  fa-newspaper-o" aria-hidden="true"></i>
						<span class="menu-item-parent">Asuransi </span></a>
						<ul>
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/SPPA_MARINE_CARGO.pdf" alt="" title="Formulir Asuransi">Formulir Asuransi </a>
						  </li>
						</ul>	
					</li>
					
					<li span class="hidden-xs"><a title="Qris" >
						<i class="fa fa-lg fa-fw  fa-qrcode" aria-hidden="true"></i>
						<span class="menu-item-parent">QRIS </span></a>
						<ul>
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/ID2025372662440.jpeg" alt="" title="Qiris Trip Cargo"><img alt="Berkas:QRIS logo.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/576px-QRIS_logo.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/350px-QRIS_logo.svg.png 2x" data-file-width="auto" data-file-height="32"> </a>
						  </li>
						 <li>
						      <a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" alt="" title="Laporan Qiris">Laporan Qris Trip Cargo </a>
						  </li>
						</ul>	
					</li>
					
					<li><a href="#" title="Tarif" >
						<i class="fa fa-money" aria-hidden="true"></i>
						<span class="menu-item-parent">Tarif </span></a>
						
						<ul>
						    <li class="hidden-xs">
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/tarif.pdf" alt="" title="tarif.pdf">Daftar Tarif  </a>
						    </li>
						    <li class="hidden-xs">
						      <a target="_blank" href="https://tripcargoid.com/web/Tarif_Kargo_Hemat" alt="" title="tarif hemat">IKLAN Tarif Hemat </a>
						    </li>
						    <!--li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/tarif.jpg" alt="" title="tarif hemat">Tarif Hemat jpg </a>
						    </li-->
						    <li class="hidden-xs">
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/TARIF SANCARGO-A 2025.pdf" alt="" title="tarif hemat">TARIF A 2025.pdf </a>
						    </li>
						    <li class="hidden-xs">
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/TARIF SANCARGO-B 2025.pdf" alt="" title="tarif hemat">TARIF B 2025.pdf </a>
						    </li>
							<!--li class="">
							  <a id="cek_harga"; name="cek_harga"; onclick="load_harga()"> Cek Harga </a>
							</li-->
						</ul>
					</li>
					
					<li span class="hidden-xs"><a title=" Lapor Pajak" >
					    <i class="fa fa-lg fa-fw  fa fa-gavel" aria-hidden="true"></i>
						<span class="menu-item-parent">Pajak </span></a>
						<ul>
						  <li>
						      <a target="_blank" href="https://ui-login.oss.go.id/login" alt="" title="Login OSS"><img style="height: 23px" width="60" alt="Logo" src="https://perizinan.oss.go.id/media/logos/logo-bkpm-new/OSS%20LOGO%20NEW%202024%20ID.svg"> </a>
						  </li>
						  <li>
						      <a target="_blank" href="https://djponline.pajak.go.id/account/login" alt="" title="Login DJP"><img style="height: 23px" width="60" alt="Logo" src="https://static.pajak.go.id/assets/media/logos/Logo DJP.png"> </a>
						  </li>
						</ul>	
					</li>
					
					<li><a href="#" title=" Lacak Pengiriman" >
						<i class="fa fa-search"></i>
						<span class="menu-item-parent">Search </span>	</a>
						<ul>
						    <li class="<?php echo $this->app_model->status_menu($akt,'lacakkirim');?>"><a href="<?php echo base_url().'cadmin/home/';?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman </a></li>
						    </li>
						</ul>    
					</li>

					<li>
						<a href="#" title="Settings">
							<i class="fa fa-cog"></i>
							<span class="menu-item-parent">Settings</span>
						</a>
						<ul>
							<li class="<?php echo $this->app_model->status_menu($akt, 'introduction'); ?>">
								<a href="<?php echo base_url('cadmin/home/introduction'); ?>" title="Introduction & Visi Misi">
									Introduction & Visi Misi
								</a>
							</li>
							<li class="<?php echo $this->app_model->status_menu($akt, 'customer'); ?>">
								<a href="<?php echo base_url('cadmin/home/customer'); ?>" title="Customer">
									Customer
								</a>
							</li>
							<li class="<?php echo $this->app_model->status_menu($akt, 'service'); ?>">
								<a href="<?php echo base_url('cadmin/home/service'); ?>" title="Service">
									Service
								</a>
							</li>
							 <li class="<?php echo $this->app_model->status_menu($akt, 'setting_contact'); ?>">
                                <a href="<?php echo base_url('cadmin/home/setting_contact'); ?>" title="Contact">Contact</a>
                            </li>
						</ul>
					</li>
				<!---admin-->				
					
					
				<?php }elseif($level=="admin"){ ?>
					<li>
						<a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
						<ul>
							<li class="<?php echo $this->app_model->status_menu($akt,'dashboard');?>" >
								<a href="<?php echo base_url().'cadmin/';?>home/Dashboard" title="Dashboard"><span class="menu-item-parent">Dashboard</span></a>
							</li>
							
							<!--li class="<!--?php echo $this->app_model->status_menu($akt,'dashboard-umum');?>" >
								<a href="<!--?php echo base_url().'cadmin/';?>home/dashboard_umum" title="Dashboard"><span class="menu-item-parent">Dashboard Umum</span></a> 
							</li-->
							
							<li class="<?php echo $this->app_model->status_menu($akt,'contact');?>">
								<a href="<?php echo base_url().'cadmin/home/';?>contact" title="Guestbook"><span class="menu-item-parent">Guestbook</span></a>
							</li>
						</ul>	
					</li>
					<li><a href="#" title="Tarif" >
						<i class="fa fa-money" aria-hidden="true"></i>
						<span class="menu-item-parent">Tarif </span></a>
						
						<ul>
						    <li class="hidden-xs">
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/tarif.pdf" alt="" title="tarif.pdf">Tarif  </a>
						    </li>
						    <li class="hidden-xs">
						      <a target="_blank" href="https://tripcargoid.com/web/Tarif_Kargo_Hemat" alt="" title="tarif hemat">Tarif Hemat </a>
						    </li>
						    <!--li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/tarif.jpg" alt="" title="tarif hemat">Tarif Hemat jpg </a>
						    </li-->
						    <li class="hidden-xs">
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/TARIF SANCARGO-A 2025.pdf" alt="" title="tarif hemat">TARIF A 2025.pdf </a>
						    </li>
						    <li class="hidden-xs">
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/TARIF SANCARGO-B 2025.pdf" alt="" title="tarif hemat">TARIF B 2025.pdf </a>
						    </li>
							<!--li class="">
							  <a id="cek_harga"; name="cek_harga"; onclick="load_harga()"> Cek Harga </a>
							</li-->
						</ul>
					</li>
					<li><a href="#" title="Entri shipment" >
						<i class="fa fa-lg fa-fw fa-cube"></i>
						<span class="menu-item-parent">Entri shipment </span></a>
						<ul>
							<li class="<?php echo $this->app_model->status_menu($akt,'cargo');?>"><a href="<?php echo base_url().'cadmin/home/';?>cargo" title="Entry Shipment">Entry Shipment </a></li>
							<li class="<?php echo $this->app_model->status_menu($akt,'updatecargo');?>"><a href="<?php echo base_url().'cadmin/home/';?>updatecargo" title="Update Posisi Cargo">Update Posisi Cargo </a></li>
							<!--li class="<?php echo $this->app_model->status_menu($akt,'lacakkirim');?>"><a href="<?php echo base_url().'cadmin/home/';?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman </a></li-->
						    <li class="<?php echo $this->app_model->status_menu($akt,'databarang');?>"><a href="<?php echo base_url().'cadmin/home/';?>databarang" title="Lacak Data Barang"> Data Barang </a></li>
						</ul>
					</li>
					</li>
						<li><a href="#" title="List" >
						<i class="fa fa-list-alt"></i>
						<span class="menu-item-parent">Manifast </span>	</a>
						<ul>
						   <li class="<?php echo $this->app_model->status_menu($akt,'manifast');?>"><a href="<?php echo base_url().'cadmin/home/';?>manifast" title="Manifast">Buat Manifast </a></li>
						</ul>
					</li>
					<!---li><a href="#" title="Keuangan" >
						<i class="fa fa-money"></i>
						<span class="menu-item-parent">Saldo </span></a>
						<ul>
						<li class=" ">    
						   <li class><a>Dalam proses </a></li>
					</li>
						</ul---> 
					<li span class="hidden-xs"><a href="#" title="Laporan" >
						<i class="fa fa-lg fa-fw fa-print"></i>
						<span class="menu-item-parent">Laporan </span>	</a>
						<ul>
							<li span class="hidden-xs"="<?php echo $this->app_model->status_menu($akt,'lpengiriman');?>"><a href="<?php echo base_url().'cadmin/laporan/';?>lpengiriman" title="Status Pengiriman">Status Pengiriman </a></li>
							<li span class="hidden-xs"="<?php echo $this->app_model->status_menu($akt,'linvoice');?>"><a href="<?php echo base_url().'cadmin/laporan/';?>linvoice" title="Invoice Pelanggan">Invoice Pelanggan</a></li>
							<!--li class="<?php echo $this->app_model->status_menu($akt,'lpenerimaan');?>"><a href="<?php echo base_url().'cadmin/laporan/';?>lpenerimaan" title="Penerimaan">Paking List Harian </a></li-->
						</ul>
					</li>    
					<!--li><a href="#" title="WA" >
						<i class="fa fa-whatsapp" aria-hidden="true"></i>
						<span class="menu-item-parent">WA </span>	</a>
						<ul>
							<li>
							        <a target="" title="">Admin </a>
							    <ul>
							        <li>
							            <a target="_blank" href="https://api.whatsapp.com/send?phone=6285219511414" title="Admin">085219511414</a>
							        </li>
							        <li>
							            <a target="_blank" href="https://api.whatsapp.com/send?phone=62816887359" title="Admin">0816887359 </a>
							        </li>
							    </ul>
							
							</li>
							<li>
							        <a target="" title="">Marketing </a>
							    <ul>
							        <li>
							            <a target="_blank" href="https://api.whatsapp.com/send?phone=628128107359" title="Marketing">08128107359</a>
							        </li>
							    </ul>
							
							</li>
							<li>
							        <a target="" title="">CSO </a>
							    <ul>
							        <li>
							            <a target="_blank" href="https://api.whatsapp.com/send?phone=62881080899678" title="CSO">081289897359</a>
							        </li>
							    </ul>
							
							</li>
							
							<li>
							    <div>
							        <a target="" title="">SAP</a>
							    </div>
							    <ul>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=62881080899678" title="Pelabuhan Tanjung Priuk">SAP / Ahmad fouzi </a></li>
						        	<li><a target="_blank" href="https://api.whatsapp.com/send?phone=6282252664988" title="+62 822-5266-4988">SAP MAKASSAR <br> Andi Trian</a></li>
							    </ul>
							</li>
							
							<li>
							    <div>
							        <a target="" title="">APM</a>
							    </div>
							    <ul>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6287889233683" title="+62 878-8923-3683">Apm Lampung <br> Intan Angelina Sunardi </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6285718293144" title="+62 857-1829-3144">APM Bogor <br> Rudianto </a></li>
							    </ul>
							</li>
							
							<li>
							    <div>
							        <a target="" title="">NIR</a>
							    </div>
							    <ul>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6289643431569" title="+62 896-4343-1569">NIR <br>Nisa Admin   </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=62811576711" title="+62 811-576-711">Pak Supri <br> PT Nir Sukses Transportindo </a></li>
							    </ul>
							</li>
							
							<li>
							    <div>
							        <a target="" title="">ACC</a>
							    </div>
							    <ul>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281211332161" title="+62 812-1133-2161">ACC LOGISTIC SAID NAUM </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6282171904130" title="+62 821-7190-4130">ACC MEDAN / Niki</a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281268427242" title="+62 812-6842-7242">Vendor ACC Padang ~ Nasrul Fuad  </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281363430585" title="+62 813-6343-0585">Acc Bukittinggi </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281211332161" title="+62 812-1133-2161">ACC Pekanbaru </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6282219491211" title="+62 822-1949-1211">ACC LOGISTIC PEKANBARU </a></li>
							        
							    </ul>
							</li>
							
							<li>
							    <div>
							        <a target="" title="">AR Karyati</a>
							    </div>
							    <ul>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=628567071118" title="+62 856-7071-118">Karyati JKT <br> ADMIN Karyati Daan Mogot </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6287878767685" title="+62 878-7876-7685">Karyati SBY <br> CEK RESI & ONGKIR </a></li>
							    </ul>
							</li>
							<li>
							    <div>
							        <a target="" title="">KIB</a>
							    </div>
							    <ul>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=628113192215" title="+62 811-3192-215">KIB PSN² <br> senen2 </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6282220360941" title="+62 822-2036-0941">KIB JOGJA <br>  </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281132240918" title="+62 811-3224-0918">KIB SERANG <br>  </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6283874521552" title="+62 838-7452-1552">Kib Pandeglang <br> Obay </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=62082138973716" title="+62 082138973716">KIB SBY <br>  </a></li>
							    </ul>
							</li>
							<li>
							    <div>
							        <a target="" title="">YME</a>
							    </div>
							    <ul>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6285321210808" title="+6285321210808">YME Pangkal Pinang <br> Setri </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281385128280" title="+62 081385128280">SPE JKT <br> Saiku Putra Express </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6282183504254" title="+62 082183504254">SPE Pangkal Pinang <br> Saiku Putra Express </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281949112363" title="+62 081949112363">SPE Tanjung Pandan <br> Saiku Putra Express </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281385329797" title="+62 081385329797">SPE Palembang <br> Saiku Putra Express </a></li>
							    </ul>
							</li>
							<li>
							    <div>
							        <a target="" title="">SCM</a>
							    </div>
							    <ul>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6282284371450" title="+62 822-8437-1450">Solusi Cargo Mandiri-SCM Tanah Abang </a></li>
							        <li><a target="_blank" href="https://api.whatsapp.com/send?phone=6282294402504" title="+62 822-9440-2504">SCM Jambi Perwakilan SCM Jambi </a></li>
							    </ul>
							</li>
							<!--- Custamer--->
							<!--li><a target="" href="" title="Kurir Pickup">- </a></li>
							<li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281226694820" title="+62 812-2669-4820">Doni Putra Ramadhan </a></li>
							<li><a target="_blank" href="https://api.whatsapp.com/send?phone=6281213676211" title="+62 812-1367-6211">Pak Suyarto </a></li>
							<li><a target="_blank" href="https://api.whatsapp.com/send?phone=6287785555593" title="+62 877-8555-5593">Wisnu Cemical Cemikal <br> Wisnu Riadi</a></li-->
						<!--/ul>
					</li-->
					<li span class="hidden-xs"><a title="Formulir" >
						<i class="fa fa-lg fa-fw  fa-newspaper-o" aria-hidden="true"></i>
						<span class="menu-item-parent">Formulir </span></a>
						<ul>
						  <!--li>
						      <a target="_blank" href=" <?php echo base_url();?>assets/atropos/images/FORMULIR_PICKUP_BARANG" alt="" title="Formulir Pickup Barang">Formulir Pickup Barang </a>
						  </li-->
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/Formulir_Manifast" alt="" title="Formulir Manifast">Formulir Manifast </a>
						  </li>
						  <li>
    						  <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/SURAT PEMBAYARAN VENDOR _1_.pdf" alt="" title="Formulir Pembayaran Vendor">Formulir Pembayaran Vendor</a>
    					  </li>
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/Uang Jalan Oprasional.pdf" alt="" title="Formulir Uang Jalan">Formulir Uang Jalan </a>
						  </li>
						  <!--li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/Kop Surat Sancargo.docx" alt="" title="Formulir Kop Surat">Kop Surat Trip Cargo </a>
						  </li-->
						  <!--li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/DAFTAR KOTA BESAR DI INDONESIA DAN KODE.pdf" alt="" title="Kode Daerah kota-kota besar">KODE DAERAH </a>
						  </li-->
						</ul>
					<li span class="hidden-xs"><a title="Formulir Asuransi" >
						<i class="fa fa-lg fa-fw  fa-newspaper-o" aria-hidden="true"></i>
						<span class="menu-item-parent">Asuransi </span></a>
						<ul>
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/SPPA_MARINE_CARGO.doc" alt="" title="Formulir Asuransi">Formulir Asuransi </a>
        						  <ul>
        						        <li>
        						            <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/SPPA_MARINE_CARGO.doc" alt="" title="Formulir Asuransi doc">doc </a>
        						        </li>
        						        <li>
        						            <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/SPPA_MARINE_CARGO.pdf" alt="" title="Formulir Asuransi pdf">pdf </a>
        						        </li>
        						  </ul>
						  </li>
						  <!--li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/Penolakan Asuransi.pdf" alt="" title="Formulir Penolakan Asuransi">Formulir Penolakan Asuransi </a>
						  </li-->
						</ul>
						
					<li span class="hidden-xs"><a title=" Lapor Pajak" >
					    <i class="fa fa-lg fa-fw  fa fa-gavel" aria-hidden="true"></i>
						<span class="menu-item-parent">Pajak </span></a>
						<ul>
						  <li>
						      <a target="_blank" href="https://ui-login.oss.go.id/login" alt="" title="Login OSS"><img style="height: 23px" width="60" alt="Logo" src="https://perizinan.oss.go.id/media/logos/logo-bkpm-new/OSS%20LOGO%20NEW%202024%20ID.svg"> </a>
						  </li>
						  <li>
						      <a target="_blank" href="https://djponline.pajak.go.id/account/login" alt="" title="Login DJP"><img style="height: 23px" width="60" alt="Logo" src="https://static.pajak.go.id/assets/media/logos/Logo DJP.png"> </a>
						  </li>
						</ul>	
					</li>
					
					<li span class=" "><a title="Qiris" >
						<i class="fa fa-lg fa-fw  fa-qrcode" aria-hidden="true"></i>
						<span class="menu-item-parent">QIRIS </span></a>
						<ul>
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/ID2025372662440.jpeg" alt="" title="Qiris Trip Cargo"><img alt="Berkas:QRIS logo.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/576px-QRIS_logo.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/350px-QRIS_logo.svg.png 2x" data-file-width="auto" data-file-height="32"> </a>
						  </li>
						 <li>
						      <a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" alt="" title="Laporan Qiris">Laporan Qiris Trip Cargo </a>
						  </li>
						</ul>	
					</li>
						
					<li class="hidden-xs"><a href="#" title="DATAR MEMBER" >
					    <i class="glyphicon glyphicon-user"></i>
						<span class="menu-item-parent">Member </span></a>
						<ul>
							<!--Penambahan user --->
							<li span class="<?php echo $this->app_model->status_menu($akt,'users');?>">
							    
								<a href="<?php echo base_url().'cadmin/home/';?>users" title="Tambah Pengguna"><span class="menu-item-parent">New User</span></a>
							</li>
						</ul>
					</li>
					
					<li><a href="#" title=" Lacak Pengiriman" >
						<i class="fa fa-search"></i>
						<span class="menu-item-parent">Search </span>	</a>
						<ul>
						    <li class="<?php echo $this->app_model->status_menu($akt,'lacakkirim');?>"><a href="<?php echo base_url().'cadmin/home/';?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman </a></li>
						    </li>
						</ul>    
					</li>	
						
	
		<!---driver--->
					
					<?php }if($level=="driver"){ ?>
					<li><a href="#"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
						<ul>
						    <li class="<?php echo $this->app_model->status_menu($akt,'dashboard');?>" >
								<a href="<?php echo base_url().'cadmin/';?>home/dashboard" title="Dashboard"><span class="menu-item-parent">Dashboard</span></a>
							</li>
						    <!---tess--->
						    
						    <li class="<?php echo $this->app_model->status_menu($akt,'dashboard-umum');?>" >
								<a href="<?php echo base_url().'cadmin/';?>home/dashboard_umum" title="Dashboard"><span class="menu-item-parent">Dashboard Umum</span></a> 
							</li>
						</ul>	
					</li>
					<li><a href="#" title="Tarif" >
						<i class="fa fa-money" aria-hidden="true"></i>
						<span class="menu-item-parent">Tarif </span></a>
						
						<ul>
						    <!--li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/tarif.pdf" alt="" title="tarif.pdf">Tarif  </a>
						    </li-->
						    <li>
						      <a target="_blank" href="https://tripcargoid.com/web/Tarif_Kargo_Hemat" alt="" title="tarif hemat">Tarif Hemat </a>
						    </li>
						    <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/TARIF SANCARGO-A 2025.pdf" alt="" title="tarif hemat">TARIF A 2025.pdf </a>
						    </li>
						    <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/TARIF SANCARGO-B 2025.pdf" alt="" title="tarif hemat">TARIF B 2025.pdf </a>
						    </li>
							<!--li class="">
							  <a id="cek_harga"; name="cek_harga"; onclick="load_harga()"> Cek Harga </a>
							</li-->
						</ul>
					</li>
					<li><a href="#" title="Cargo" >
						<i class="fa fa-lg fa fa-paper-plane"></i>
						<span class="menu-item-parent">Update </span>	</a>
						<ul>
						    <li class="<?php echo $this->app_model->status_menu($akt,'updatecargo');?>"><a href="<?php echo base_url().'cadmin/home/';?>updatecargo" title="Update Posisi Cargo">Update Posisi Cargo </a></li>
						</ul>
					</li>
					<li><a href="#" title=" Buat Manifast" >
						<i class="fa fa-list-alt"></i>
						<span class="menu-item-parent">Manifast </span>	</a>
						<ul>
						    <li class="<?php echo $this->app_model->status_menu($akt,'manifast');?>"><a href="<?php echo base_url().'cadmin/home/';?>manifast" title="Manifast">Buat Manifast </a>
						    </li>
						</ul>    
					</li>
					
					<li span class=" "><a title="Qiris" >
						<i class="fa fa-lg fa-fw  fa-qrcode" aria-hidden="true"></i>
						<span class="menu-item-parent">QIRIS </span></a>
						<ul>
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/ID2025372662440.jpeg" alt="" title="Qiris Trip Cargo"><img alt="Berkas:QRIS logo.svg" src="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/150px-QRIS_logo.svg.png" decoding="async" width="auto" height="20" srcset="//upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/576px-QRIS_logo.svg.png 1.5x, //upload.wikimedia.org/wikipedia/commons/thumb/e/e1/QRIS_logo.svg/350px-QRIS_logo.svg.png 2x" data-file-width="auto" data-file-height="32"> </a>
						  </li>
						 <li>
						      <a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" alt="" title="Laporan Qiris">Laporan Qiris Trip Cargo </a>
						  </li>
						</ul>	
					</li>
					
					<li><a href="#" title=" Lacak Pengiriman" >
						<i class="fa fa-search"></i>
						<span class="menu-item-parent">Search </span>	</a>
						<ul>
						    <li class="<?php echo $this->app_model->status_menu($akt,'lacakkirim');?>"><a href="<?php echo base_url().'cadmin/home/';?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman </a></li>
						    </li>
						</ul>    
					</li>
					
	<!---umum--->				
					
					<?php }elseif($level=="umum"){ ?>
					<li>
						<a href="#" title="Dashboard"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Home</span></a>
						<ul>
							<li class="<?php echo $this->app_model->status_menu($akt,'dashboard-umum');?>" >
								<a href="<?php echo base_url().'cadmin/';?>home/dashboard_umum" title="Dashboard Umum"><span class="menu-item-parent">Dashboard Umum</span></a>
							</li>
						</ul>	
					</li>
					<li><a href="#" title="Data Entri Pengiriman" ><i class="fa fa-lg fa-fw fa-cube"></i><span class="menu-item-parent">Entry Shipment</span></a>
						<ul>
							<li class="<?php echo $this->app_model->status_menu($akt,'cargo');?>">
							    <a href="<?php echo base_url().'cadmin/home/';?>cargo" title="Isi data pengiriman"><span class="menu-item-parent">Entry Shipment</span></a>
							</li>
							<li class="<?php echo $this->app_model->status_menu($akt,'pelanggan');?>">
							    <a href="<?php echo base_url().'cadmin/home/';?>pelanggan" title="Pelanggan"><span class="menu-item-parent">Pelanggan</span></a>
							</li>
                            <!--li class="<?php echo $this->app_model->status_menu($akt,'databarang');?>">
                                <a href="<?php echo base_url().'cadmin/home/';?>databarang" title="Lacak Data Barang"><span class="menu-item-parent">Data Barang</span></a>
                            </li-->
						</ul>
					</li>
					<li>
						<ul>
						   <li class="<?php echo $this->app_model->status_menu($akt,'lacakkirim');?>"><a href="<?php echo base_url().'cadmin/home/';?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman </a></li>
						</ul>
					</li>
					
					<li><a href="#" title="Tarif" >
						<i class="fa fa-money" aria-hidden="true"></i>
						<span class="menu-item-parent">Tarif </span></a>
						
						<ul>
						    <!--li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/tarif.pdf" alt="" title="tarif.pdf">Tarif  </a>
						    </li-->
						    <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/tarif.jpg" alt="" title="tarif hemat">Tarif Hemat jpg </a>
						    </li>
						    <!--li>
						      <a target="_blank" href="https://tripcargoid.com/web/Tarif_Kargo_Hemat" alt="" title="tarif hemat">Tarif Hemat </a>
						    </li>
						    <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/TARIF SANCARGO-A 2025.pdf" alt="" title="tarif hemat">TARIF A 2025.pdf </a>
						    </li>
						    <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/TARIF SANCARGO-B 2025.pdf" alt="" title="tarif hemat">TARIF B 2025.pdf </a>
						    </li-->
							<!--li class="">
							  <a id="cek_harga"; name="cek_harga"; onclick="load_harga()"> Cek Harga </a>
							</li-->
						</ul>
					</li>
					
					<li span class="hidden-xs"><a title="Qris" >
						<i class="fa fa-lg fa-fw  fa-qrcode" aria-hidden="true"></i>
						<span class="menu-item-parent">QRIS </span></a>
						<ul>
						  <li>
						      <a target="_blank" href="<?php echo base_url();?>assets/atropos/images/ID2025372662440.jpeg" alt="" title="Qris Trip Cargo">QRIS </a>
						  </li>
						  <li>
						      <a target="_blank" href="https://qr.klikbca.com/QRMerchantService/v2.10/home?mid=002804257" alt="" title="Laporan Qiris">Laporan Qris Trip Cargo </a>
						  </li>
						</ul>
					
					<li><a href="#" title="WA" >
						<i class="fa fa-whatsapp" aria-hidden="true"></i>
						<span class="menu-item-parent">WA </span>	</a>
						<ul>
							<li class="<?php echo $this->app_model->status_menu($akt,'lpengiriman');?>"><a target="_blank" href="https://api.whatsapp.com/send?phone=62881080899678" title="Hubungi Admin">Hubungi Admin </a></li>
							<!--li class="<?php echo $this->app_model->status_menu($akt,'linvoice');?>"><a target="_blank" href="https://api.whatsapp.com/send?phone=62816887359" title="Manager Area">Manager </a></li-->
							<!--li class="<?php echo $this->app_model->status_menu($akt,'lpenerimaan');?>"><a target="_blank" href="https://api.whatsapp.com/send?phone=62881080899678" title="Kurir Pickup">Kurir Pickup </a></li-->
						</ul>
					</li>
					
					<li><a href="#" title=" Lacak Pengiriman" >
						<i class="fa fa-search"></i>
						<span class="menu-item-parent">Search </span>	</a>
						<ul>
						    <li class="<?php echo $this->app_model->status_menu($akt,'lacakkirim');?>"><a href="<?php echo base_url().'cadmin/home/';?>lacakkirim" title="Lacak Pengiriman">Lacak Pengiriman </a></li>
						    </li>
						</ul>    
					</li>
					<?php } ?>
				</ul>
			</nav>
			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>

		</aside>
		<!-- END NAVIGATION -->