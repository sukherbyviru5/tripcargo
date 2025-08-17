<?php 
    $level = $this->session->userdata('level');
?>
        <!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Setting Harga</li>
	</ol>
</div>	
<div id="content">
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
	
		
		<!-- row -->
		<div class="row">
	
         <?php if ($level != 'admin2'): ?>
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-4">
	
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
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
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2>Setting Harga</h2>
	
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
                           
                                <form id="smart-form-register" class="form-horizontal" >
                                    
                                    <fieldset>
                                        <legend>Jarak Pengiriman</legend>
                                        <div class="form-group has-success">
                                            <label class="col-md-4 control-label">Asal</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="hidden" name="id">
                                                    <!--input class="form-control" type="text" name="asal" maxlength="50"-->
                                                    <select  class="form-control"  name="asal">
                                                        <!--Peroritas utama--->
                                                        <option value="Jakarta, Jakarta"> Jakarta, Jakarta</option>
                                                    </select>
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="col-md-4 control-label">Tujuan</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <!--input class="form-control" type="text" name="tujuan" maxlength="50"-->
                                                    <input type="hidden" name="id">
                                                    <select  class="form-control"  name="tujuan">
                                                    <!--Tujuan Utama: Area Sumatera-->
                                                        <option value="Banda Aceh, Aceh"> Kota Banda Aceh, Aceh</option>
                                                        <option value="Medan, Sumatera Utara"> Kota Medan, Sumatera Utara</option>
                                                        <option value="Pekanbaru, Riau"> Kota Pekanbaru, Riau</option>
                                                        <option value="Batam, Kep. Riau"> Kota Batam, Kep. Riau</option>
                                                        <option value="Dumai, Riau"> Kota Dumai, Riau</option>
                                                        <option value="Tanjungpinang, Kep. Riau"> Kota Tanjungpinang, Kep. Riau </option>
                                                        <option value="Padang, Sumatera Barat"> Kota Padang, Sumatera Barat</option>
                                                        <option value="Jambi, Jambi"> Kota Jambi, Jambi</option>
                                                        <option value="Palembang, Sumatera Selatan"> Kota Palembang, Sumatera Selatan</option>
                                                        <option value="Pangkalpinang, Bangka Belitung"> Kota Pangkalpinang, Bangka Belitung</option>
                                                        <option value="Tanjung Pandan, Belitung"> Tanjung Pandan, Belitung</option>
                                                        <option value="Bengkulu, Bengkulu"> Kota Bengkulu, Bengkulu</option>
                                                        <option value="Bandar Lampung, Lampung"> Kota Bandar Lampung, Lampung</option>
                                                        <option value="	"> </option>
                                                        
                                                    <!--Tujuan Utama: Jawa-->
                                                        <option value="Cilegon, Banten"> Kota Cilegon,	Banten</option>
                                                        <option value="Serang, Banten"> Kota Serang, Banten</option>
                                                        <option value="Tangerang, Banten">	Kota Tangerang,	Banten</option>
                                                        <option value="	"> </option>
                                                        
                                                        <option value="Tangerang Selatan, Banten">	Kota Tangerang Selatan,	Banten</option>
                                                        <option value="Jakarta, Jakarta"> Kota Jakarta, Jakarta</option>
                                                        <option value="Depok, Jawa Barat"> Kota Depok, Jawa Barat</option>
                                                        <option value="Bekasi, Jawa Barat"> Kota Bekasi, Jawa Barat</option>
                                                        <option value="	"> </option>
                                                        
                                                        <option value="Bogor, Jawa Barat"> Kota Bogor, Jawa Barat</option>
                                                        <option value="Sukabumi, Jawa Barat"> Kota Sukabumi, Jawa Barat</option>
                                                        <option value="	"> </option>
                                                        
                                                        <option value="Purwakarta, Jawa Barat"> Purwakarta, Jawa Barat</option>
                                                        <option value="Cikarang, Jawa Barat"> Cikarang, Jawa Barat</option>
                                                        <option value="Cimahi, Jawa Barat"> Kota Cimahi, Jawa Barat</option>
                                                        <option value="Bandung, Jawa Barat"> Kota Bandung, Jawa Barat</option>
                                                        <option value="Tasikmalaya, Jawa Barat"> Kota Tasikmalaya, Jawa Barat</option>
                                                        <option value="Banjar, Jawa Barat"> Kota Banjar, Jawa Barat</option>
                                                        <option value="	"> </option>
                                                        
                                                        <option value="Cikarang, Jawa Barat"> Cikarang, Jawa Barat</option>
                                                        <option value="Cirebon, Jawa Barat"> Kota Cirebon, Jawa Barat</option>
                                                        <option value="	"> </option>
                                                        
                                                        <option value="Tegal, Jawa Tengah"> Kota Tegal, Jawa Tengah</option>
                                                        <option value="Pekalongan, Jawa Tengah"> Kota Pekalongan, Jawa Tengah</option>
                                                        <option value="Semarang, Jawa Tengah"> Kota Semarang, Jawa Tengah</option>
                                                        <option value="Salatiga, Jawa Tengah"> Kota Salatiga, Jawa Tengah</option>
                                                        <option value="Magelang, Jawa Tengah">	Kota Magelang, Jawa Tengah</option>
                                                        <option value="Yogyakarta, Yogyakarta"> Kota Yogyakarta, Yogyakarta</option>
                                                        <option value="Surakarta, Jawa Tengah"> Kota Surakarta, Jawa Tengah</option>
                                                        <option value="	"> </option>
                                                        
                                                        <option value="Madiun, Jawa Timur"> Kota Madiun, Jawa Timur</option>
                                                        <option value="Surabaya, Jawa Timur"> Kota Surabaya, Jawa Timur</option>
                                                        <option value="Kediri, Jawa Timur"> Kota Kediri, Jawa Timur</option>
                                                        <option value="Probolinggo, Jawa Timur"> Kota Probolinggo, Jawa Timur</option>
                                                        <option value="Pasuruan, Jawa Timur"> Kota Pasuruan, Jawa Timur</option>
                                                        <option value="Blitar, Jawa Timur"> Kota Blitar, Jawa Timur</option>
                                                        <option value="Batu, Jawa Timur"> Kota Batu, Jawa Timur</option>
                                                        <option value="Malang, Jawa Timur"> Kota Malang, Jawa Timur</option>
                                                        <option value="Mojokerto, Jawa Timur"> Kota Mojokerto, Jawa Timur</option>
                                                        <option value="	"> </option>
                                                    <!--Tujuan Utama: Bali-->    
                                                        <option value="Denpasar, Bali"> Kota Denpasar, Bali</option>
                                                        <option value="Tabanaan, Bali"> Tabanaan, Bali</option>
                                                        <option value="	"> </option>
                                                        
                                                    <!--Tujuan Utama: NTB-->    
                                                        <option value="Mataram, Nusa Tenggara Barat"> Kota Mataram, Nusa Tenggara Barat</option>
                                                        <option value="Bima, Nusa Tenggara Barat"> Kota Bima, Nusa Tenggara Barat</option>
                                                        <option value="	"> </option>
                                                        
                                                    <!--Tujuan Utama: NTT-->    
                                                        <option value="Kupang, Nusa Tenggara Timur"> Kota Kupang, Nusa Tenggara Timur</option>
                                                    <!--Tujuan Utama: Sulawesi-->    
                                                        <option value="Makassar, Sulawesi Selatan"> Kota Makassar, Sulawesi Selatan</option>
                                                        <option value="Manado, Sulawesi Utara"> Kota Manado, Sulawesi Utara</option>
                                                        <option value="	"> </option>
                                                    <!--Tujuan Utama: Kalimantan-->    
                                                        <option value="Samarinda, Kalimantan Timur"> Kota Samarinda, Kalimantan Timur</option>
                                                        <option value="Balikpapan, Kalimantan Timur"> Kota Balikpapan, Kalimantan Timur</option>
                                                        <option value="Pontianak, Kalimantan Barat"> Kota Pontianak, Kalimantan Barat</option>
                                                        <option value="Banjarmasin, Kalimantan Selatan"> Kota Banjarmasin, Kalimantan Selatan</option>
                                                        <option value="	"> </option>
                                                        
                                                        <option value="Palangka Raya, Kalimantan Tengah">	Kota Palangka Raya,	Kalimantan Tengah</option>
                                                        <option value="Banjarbaru, Kalimantan Selatan"> Kota Banjarbaru, Kalimantan Selatan</option>
                                                        <option value="Tarakan, Kalimantan Utara">	Kota Tarakan, Kalimantan Utara</option>
                                                        <option value="Singkawang, Kalimantan Barat"> Kota Singkawang, Kalimantan Barat</option>
                                                        <option value="Bontang, Kalimantan Timur">	Kota Bontang,Kalimantan Timur</option>
                                                        
                                                        <option value="Palu, Sulawesi Tengah">	Kota Palu, Sulawesi Tengah</option>
                                                        <option value="Ambon, Maluku"> Kota Ambon, Maluku</option>                                                    
                                                        <option value="Kendari, Sulawesi Tenggara"> Kota Kendari, Sulawesi Tenggara</option>
                                                        <option value="Bitung, Sulawesi Utara"> Kota Bitung, Sulawesi Utara</option>
                                                        <option value="Ternate, Maluku Utara">	Kota Ternate, Maluku Utara</option>
                                                        <option value="Gorontalo, Gorontalo"> Kota Gorontalo, Gorontalo</option>
                                                        <option value="Palopo, Sulawesi Selatan"> Kota Palopo, Sulawesi Selatan</option>
                                                        <option value="Baubau, Sulawesi Tenggara">	Kota Baubau, Sulawesi Tenggara</option>
                                                        <option value="Parepare, Sulawesi Selatan"> Kota Parepare, Sulawesi Selatan</option>
                                                        <option value="Kotamobagu, Sulawesi Utara"> Kota Kotamobagu, Sulawesi Utara</option>
                                                        <option value="Tidore Kepulauan, Maluku Utara"> Kota Tidore Kepulauan, Maluku Utara</option>
                                                        <option value="Tomohon, Sulawesi Utara"> Kota Tomohon, Sulawesi Utara</option>
                                                        <option value="Tual, Maluku"> Kota Tual, Maluku</option>
                                                        <option value="	"> </option>
                                                        
                                                    <!--Tujuan Utama: Papua-->    
                                                        <option value="Jayapura, Papua"> Kota Jayapura, Papua</option>
                                                        <option value="Sorong, Papua Barat Daya"> Kota Sorong, Papua Barat Daya</option-->
                                                        <option value="	"> </option>
                                                    
                                                    <!--Area Tingkat dua-->
                                                        <!--option value="	Langsa,	Aceh"> Kota Langsa, Aceh</option>
                                                        <option value="	Lhokseumawe, Aceh">	Kota Lhokseumawe, Aceh</option>
                                                        <option value="	Sabang,	Aceh"> Kota Sabang, Aceh</option>
                                                        <option value="	Subulussalam, Aceh"> Kota Subulussalam, Aceh</option>
                                                        
                                                        <br>
                                                        <option value="	Binjai,	Sumatera Utara"> Kota Binjai, Sumatera Utara</option>
                                                        <option value="	Sibolga, Sumatera Utara"> Kota Sibolga,	Sumatera Utara</option>
                                                        <option value="	Pematangsiantar, Sumatera Utara"> Kota Pematangsiantar, Sumatera Utara</option>
                                                        <option value="	Padang Sidempuan, Sumatera Utara"> Kota Padang Sidempuan, Sumatera Utara</option>
                                                        <option value="	Tanjungbalai, Sumatera Utara"> Kota Tanjungbalai, Sumatera Utara</option>
                                                        <option value="	Tebing Tinggi, Sumatera Utara">	Kota Tebing Tinggi,	Sumatera Utara</option>
                                                        <option value="	Gunungsitoli, Sumatera Utara"> Kota Gunungsitoli, Sumatera Utara</option>
                                                                                                        
                                                        <br>
                                                        <option value="	Tanjungpinang,	Kepulauan Riau"> Kota Tanjungpinang, Kepulauan Riau</option>
                                                        <option value="	Batam,	Kepulauan Riau"> Kota Batam, Kepulauan Riau</option>
                                                        <option value="	Dumai,	Riau">	Kota Dumai,	Riau</option>
                                                        
                                                        <br>
                                                        <option value="	Payakumbuh,	Sumatera Barat"> Kota Payakumbuh, Sumatera Barat</option>
                                                        <option value="	Bukittinggi, Sumatera Barat"> Kota Bukittinggi, Sumatera Barat</option>
                                                        <option value="	Solok, Sumatera Barat">	Kota Solok,	Sumatera Barat</option>
                                                        <option value="	Sawahlunto,	Sumatera Barat"> Kota Sawahlunto, Sumatera Barat</option>
                                                        <option value="	Padang Panjang,	Sumatera Barat"> Kota Padang Panjang, Sumatera Barat</option>
                                                        <option value="	Pariaman, Sumatera Barat"> Kota Pariaman, Sumatera Barat</option>
                                                        
                                                        <br>
                                                        <option value="	Sungaipenuh, Jambi"> Kota Sungaipenuh, Jambi</option>
                                                        <option value="	Pagar Alam,	Sumatera Selatan"> Kota Pagar Alam,	Sumatera Selatan</option>
                                                        <option value="	Lubuklinggau, Sumatera Selatan"> Kota Lubuklinggau, Sumatera Selatan</option>                                                    <option value="	Prabumulih,	Sumatera Selatan"> Kota Prabumulih,	Sumatera Selatan</option>
                                                        
                                                        <br>
                                                        <option value="	Pangkal Pinang, Bangka Belitung"> Kota Pangkal Pinang, Bangka Belitung</option>
                                                        
                                                        <br>
                                                        <option value="	Bandar Lampung"> Kota Bandar Lampung, Lampung</option> 
                                                        <option value="	Metro, Lampung"> Kota Metro, Lampung</option> 
                                                        
                                                        <br>
                                                        <option value="	Cilegon, Banten"> Kota Cilegon,	Banten</option>
                                                        <option value="	Serang,	Banten"> Kota Serang,	Banten</option>
                                                        <option value="	Tangerang, Banten">	Kota Tangerang,	Banten</option>
                                                        <option value="	Tangerang Selatan, Banten">	Kota Tangerang Selatan,	Banten</option>
                                                        
                                                        <br>
                                                        <option value="	Jakarta, Jakarta"> Kota Jakarta, Jakarta</option>
                                                        
                                                        <br>
                                                        <option value="	Bekasi,	Jawa Barat"> Kota Bekasi, Jawa Barat</option>
                                                        <option value="	Depok, Jawa Barat"> Kota Depok, Jawa Barat</option>
                                                        <option value="	Bogor, Jawa Barat"> Kota Bogor, Jawa Barat</option>
                                                        <option value="	Sukabumi, Jawa Barat"> Kota Sukabumi, Jawa Barat</option>
                                                        <option value="	Cimahi,	Jawa Barat"> Kota Cimahi,	Jawa Barat</option>
                                                        <option value="	Bandung, Jawa Barat"> Kota Bandung, Jawa Barat</option>
                                                        <option value="	Tasikmalaya, Jawa Barat"> Kota Tasikmalaya,	Jawa Barat</option>
                                                        <option value="	Banjar,	Jawa Barat"> Kota Banjar, Jawa Barat</option>
                                                        <option value="	Cirebon, Jawa Barat"> Kota Cirebon, Jawa Barat</option>
                                                        
                                                        <br>
                                                        <option value="	Tegal, Jawa Tengah"> Kota Tegal, Jawa Tengah</option>
                                                        <option value="	Pekalongan,	Jawa Tengah"> Kota Pekalongan, Jawa Tengah</option>
                                                        <option value="	Semarang, Jawa Tengah"> Kota Semarang, Jawa Tengah</option>
                                                        <option value="	Salatiga, Jawa Tengah"> Kota Salatiga, Jawa Tengah</option>
                                                        <option value="	Magelang, Jawa Tengah">	Kota Magelang, Jawa Tengah</option>
                                                        <option value="	Yogyakarta,	Yogyakarta"> Kota Yogyakarta, Yogyakarta</option>
                                                        <option value="	Surakarta, Jawa Tengah"> Kota Surakarta, Jawa Tengah</option>
                                                        
                                                        <br>
                                                        <option value="	Madiun, Jawa Timur"> Kota Madiun, Jawa Timur</option>
                                                        <option value="	Surabaya, Jawa Timur"> Kota Surabaya, Jawa Timur</option>
                                                        <option value="	Kediri,	Jawa Timur"> Kota Kediri, Jawa Timur</option>
                                                        <option value=" Probolinggo, Jawa Timur"> Kota Probolinggo,	Jawa Timur</option>
                                                        <option value="	Pasuruan, Jawa Timur"> Kota Pasuruan,	Jawa Timur</option>
                                                        <option value="	Blitar,	Jawa Timur"> Kota Blitar, Jawa Timur</option>
                                                        <option value="	Batu, Jawa Timur"> Kota Batu,	Jawa Timur</option>
                                                        <option value="	Malang,	Jawa Timur"> Kota Malang, Jawa Timur</option>
                                                        <option value="	Mojokerto, Jawa Timur"> Kota Mojokerto, Jawa Timur</option>
                                                        
                                                        <br>
                                                        <option value="	Denpasar, Bali"> Kota Denpasar, Bali</option>
                                                        
                                                        <br>
                                                        <option value="	Mataram, Nusa Tenggara Barat"> Kota Mataram, Nusa Tenggara Barat</option>
                                                        <option value="	Bima, Nusa Tenggara Barat"> Kota Bima, Nusa Tenggara Barat</option>
                                                        <option value="	Kupang,	Nusa Tenggara Timur"> Kota Kupang,	Nusa Tenggara Timur</option>
                                                        
                                                        <br>
                                                        <option value="	Makassar, Sulawesi Selatan"> Kota Makassar,	Sulawesi Selatan</option>
                                                        <option value="	Manado,	Sulawesi Utara"> Kota Manado, Sulawesi Utara</option>
                                                        
                                                        <br>
                                                        <option value="	Samarinda, Kalimantan Timur"> Kota Samarinda, Kalimantan Timur</option>
                                                        <option value="	Balikpapan, Kalimantan Timur"> Kota Balikpapan,	Kalimantan Timur</option>
                                                        <option value="	Pontianak, Kalimantan Barat"> Kota Pontianak, Kalimantan Barat</option>
                                                        <option value="	Banjarmasin, Kalimantan Selatan	"> Kota Banjarmasin, Kalimantan Selatan</option>
                                                        
                                                        <br>
                                                        <option value="	Palangka Raya, Kalimantan Tengah">	Kota Palangka Raya,	Kalimantan Tengah</option>
                                                        <option value="	Banjarbaru,	Kalimantan Selatan"> Kota Banjarbaru, Kalimantan Selatan</option>
                                                        <option value="	Tarakan, Kalimantan Utara">	Kota Tarakan, Kalimantan Utara</option>
                                                        <option value="	Singkawang,	Kalimantan Barat"> Kota Singkawang, Kalimantan Barat</option>
                                                        <option value="	Bontang, Kalimantan Timur">	Kota Bontang,Kalimantan Timur</option>
                                                                                                            
                                                        
                                                        <br>
                                                        <option value="	Palu, Sulawesi Tengah">	Kota Palu, Sulawesi Tengah</option>
                                                        <option value="	Ambon, Maluku"> Kota Ambon, Maluku</option>                                                    
                                                        <option value="	Kendari, Sulawesi Tenggara"> Kota Kendari, Sulawesi Tenggara</option>
                                                        <option value="	Bitung,	Sulawesi Utara"> Kota Bitung, Sulawesi Utara</option>
                                                        <option value="	Ternate, Maluku Utara">	Kota Ternate, Maluku Utara</option>
                                                        <option value="	Gorontalo, Gorontalo"> Kota Gorontalo,	Gorontalo</option>
                                                        <option value="	Palopo,	Sulawesi Selatan"> Kota Palopo, Sulawesi Selatan</option>
                                                        <option value="	Baubau,	Sulawesi Tenggara">	Kota Baubau, Sulawesi Tenggara</option>
                                                        <option value="	Parepare, Sulawesi Selatan"> Kota Parepare, Sulawesi Selatan</option>
                                                        <option value="	Kotamobagu,	Sulawesi Utara"> Kota Kotamobagu, Sulawesi Utara</option>
                                                        <option value="	Tidore Kepulauan, Maluku Utara"> Kota Tidore Kepulauan,	Maluku Utara</option>
                                                        <option value="	Tomohon, Sulawesi Utara"> Kota Tomohon, Sulawesi Utara</option>
                                                        <option value="	Tual, Maluku"> Kota Tual, Maluku</option>
                                                        
                                                        
                                                        <br>
                                                        <option value="	Jayapura, Papua"> Kota Jayapura, Papua</option>
                                                        <option value="	Sorong,	Papua Barat Daya"> Kota Sorong,	Papua Barat Daya</option>
                                                        
                                                        
                                                    
                                                        <option value="	Jakarta, Jakarta	">	Jakarta, Jakarta	</option>
                                                        <option value="	Jakarta Barat, Jakarta ">	Jakarta Barat, Jakarta	</option>
                                                        <option value="	Jakarta Pusat, Jakarta ">	Jakarta Pusat, Jakarta	</option>
                                                        <option value="	Jakarta Selatan, Jakarta ">	Jakarta Selatan, Jakarta </option>
                                                        <option value="	Jakarta Timur, Jakarta ">	Jakarta Timur, Jakarta	</option>
                                                        <option value="	Jakarta Utara, Jakarta ">	Jakarta Utara, Jakarta	</option>
                                                        
                                                        <option value="	Depok, Jawa Barat	">	Depok, Jawa Barat	</option>
                                                        <option value="	Tangerang Selatan,	Banten	">	Tangerang Selatan,	Banten	</option>
                                                        <option value="	Tangerang,	Banten	">	Tangerang,	Banten	</option>
                                                        
                                                        <option value="	Bogor, Jawa Barat	">	Bogor,	Jawa Barat	</option>
                                                        <option value="	Bogor Barat, Jawa Barat	"> Bogor Barat, Jawa Barat	</option>
                                                        <option value="	Bogor Timur, Jawa Barat	"> Bogor Timur, Jawa Barat	</option>
                                                        <option value="	Bogor Selatan, Jawa Barat "> Bogor selatan, Jawa Barat </option>
                                                        <option value="	Bogor Utara, Jawa Barat	">	Bogor Utara, Jawa Barat	</option>
                                                        <option value="	Kab. Bogor,	Jawa Barat	">	Kab. Bogor,	Jawa Barat	</option>
                                                        
                                                        <option value="	Bekasi,	Jawa Barat	">	Bekasi,	Jawa Barat	</option>
                                                        <option value="	Kab. Bekasi, Jawa Barat	">	Kab. Bekasi, Jawa Barat	</option>
                                                        
                                                    
                                                        <option value="	Bandung, Jawa Barat	">	Bandung, Jawa Barat	</option>
                                                        <option value="	Kab. Bandung, Jawa Barat	">	Kab. Bandung, Jawa Barat </option>
                                                        <option value="	Kab. Bandung Barat, Jawa Barat	">	Kab. Bandung barat, Jawa Barat </option>
                                                        <option value="	Kab. Sumedang, Jawa Barat	">	Kab. Sumedang, Jawa Barat </option>
                                                        
                                                        
                                                        <option value="	Cilegon, Banten	">	Cilegon, Banten	</option>
                                                        <option value="	Serang,	Banten	">	Serang,	Banten	</option>
                                                        
                                                        
                                                        <option value="	Bandar Lampung,	Lampung	"> Bandar Lampung,	Lampung	</option>
                                                        <option value="	Palembang, Sumatera Selatan"> Palembang, Sumatera Selatan </option>
                                                        <option value="	Bengkulu, Bengkulu "> Bengkulu, Bengkulu </option>
                                                        <option value="	Jambi, Jambi"> Jambi, Jambi</option>
                                                        <option value="	Padang,	Sumatera Barat"> Padang, Sumatera Barat	</option>
                                                        <option value="	Pekanbaru, Riau"> Pekanbaru, Riau</option>
                                                        <option value="	Medan, Sumatera Utara"> Medan, Sumatera Utara</option>
                                                        <option value="	Banda Aceh,	Aceh">	Banda Aceh,	Aceh </option>
                                                        <option value="	Batam, Kep. Riau">	Batam, Kep. Riau</option>
                                                        <option value="	Dumai, Riau"> Dumai, Riau</option>
                                                        <option value="	Pangkalpinang, Bangka Belitung"> Pangkalpinang, Bangka Belitung </option>
                                                        <option value="	Tanjungpinang, Kep. Riau">	Tanjungpinang, Kep. Riau </option>
                                                        
                                                        
                                                        <option value=" Makassar, Sulawesi Selatan"> Makassar, Sulawesi Selatan </option>
                                                        <option value="	Pontianak, Kalimantan Barat"> Pontianak, Kalimantan Barat </option>
                                                        <option value="	Balikpapan,	Kalimantan Timur"> Balikpapan, Kalimantan Timur </option>
                                                        <option value="	Samarinda, Kalimantan Timur"> Samarinda, Kalimantan Timur </option>
                                                        
                                                        <!--Peroritas6 wilayah luar kota 2025 </option--->
                                                        
                                                        
                                                        <!--option value="ACEH">11. ACEH</option>
                                                        <option>Baiturrahman, Kota Banda Aceh  </option>
                                                        <option>Banda Raya, Kota Banda Aceh  </option>
                                                        <option>Jaya Baru, Kota Banda Aceh  </option>
                                                        <option>Kuta Alam, Kota Banda Aceh  </option>
                                                        <option>Kuta Raja, Kota Banda Aceh  </option>
                                                        <option>Lueng Bata, Kota Banda Aceh  </option> 
                                                        <option>Meuraxa, Kota Banda Aceh  </option>
                                                        <option>Syiah Kuala, Kota Banda Aceh  </option>
                                                        <option>Ulee Kareng, Kota Banda Aceh  </option>
                                                        
                                                        <option> Meulaboh,	Kab. Aceh Barat	</option>
                                                        <option> Blangpidie, Kab. Aceh Barat Daya </option>
                                                        <option> Jantho, Kab. Aceh Besar  </option>
                                                        <option> Krueng Sabee,	Kab. Aceh Jaya </option>
                                                        <option> Tapak Tuan, Kab. Aceh Selatan </option>
                                                        <option> Singkil, Kab. Aceh Singkil </option>
                                                        <option> Kuala Simpang,	Kab. Aceh Tamiang </option>
                                                        <option> Takengon, Kab. Aceh Tengah </option>
                                                        <option> Kutacane, Kab. Aceh Tenggara </option>
                                                        <option> Idi Rayeuk, Kab. Aceh Timur </option>
                                                        <option> Lhoksukon,	Kab. Aceh Utara </option>
                                                        <option> Simpang Tiga Redelon,	Kab. Bener Meriah </option>
                                                        <option> Bireuen, Kab. Bireuen </option>
                                                        <option> Blang Kejeren,	Kab. Gayo Lues </option>
                                                        <option> Suka Makmue, Kab. Nagan Raya </option>
                                                        <option> Sigli,	Kab. Pidie </option>
                                                        <option> Meureudu, Kab. Pidie Jaya </option>
                                                        <option> Sinabang,	Kab. Simeulue </option>
                                                        <option> Langsa, Kota Langsa </option>
                                                        <option> Lhokseumawe, Kota Lhokseumawe </option>
                                                        <option> Sabang, Kota Sabang </option>
                                                        <option> Subulussalam,	Kota Subulussalam </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="SUMATERA&nbsp;UTARA"> 12. SUMATERA&nbsp;UTARA </option>
                                                        <option>Medan Amplas, Kota Medan</option>
                                                        <option>Medan Area, Kota Medan</option>
                                                        <option>Medan Barat, Kota Medan</option>
                                                        <option>Medan Baru, Kota Medan</option>
                                                        <option>Medan Belawan, Kota Medan</option>
                                                        <option>Medan Deli, Kota Medan</option>
                                                        <option>Medan Denai, Kota Medan</option>
                                                        <option>Medan Johor, Kota Medan</option>
                                                        <option>Medan Helvetia, Kota Medan</option>
                                                        <option>Medan Kota, Kota Medan</option>
                                                        <option>Medan Labuhan, Kota Medan</option>
                                                        <option>Medan Maimun, Kota Medan</option>
                                                        <option>Medan Marelan, Kota Medan</option>
                                                        <option>Medan Perjuangan, Kota Medan</option>
                                                        <option>Medan Petisah, Kota Medan</option>
                                                        <option>Medan Polonia, Kota Medan</option>	
                                                        <option>Medan Sunggal, Kota Medan</option>
                                                        <option>Medan Selayang, Kota Medan</option>
                                                        <option>Medan Tembung, Kota Medan</option>
                                                        <option>Medan Tuntungan, Kota Medan</option>
                                                        <option>Medan Timur, Kota Medan</option>

                                                        <option> Kisaran, Kab. Asahan </option>
                                                        <option> Limapuluh,	Kab. Batubara </option>
                                                        <option> Sidikalang, Kab. Dairi </option>
                                                        <option> Sumbul, Kab. Dairi </option>
                                                        <option> Lubuk Pakam, Kab. Deli Serdang </option>
                                                        <option> Tanjung Morawa, Kab. Deli Serdang </option>
                                                        <option> Batang Kuis, Kab. Deli Serdang </option>
                                                        <option> Percut Sei Tuan, Kab. Deli Serdang </option>
                                                        <option> Deli Tua, Kab. Deli Serdang </option>
                                                        <option> Pancur Batu, Kab. Deli Serdang </option>
                                                        <option> Patumbak, Kab. Deli Serdang </option>
                                                        <option> Bandar Baru, Kab. Deli Serdang </option>
                                                        <option> Dolok Sangggul, Kab. Humbang Hasudutan </option>
                                                        <option> Kabanjahe,	Kab. Karo </option>
                                                        <option> Berastagi,	Kab. Karo </option>
                                                        <option> Tigapanah,	Kab. Karo </option>
                                                        <option> Merek,	Kab. Karo </option>
                                                        <option> Rantau Prapat,	Kab. Labuhan Batu </option>
                                                        <option> Tandem, Kab. Langkat </option>
                                                        <option> Stabat, Kab. Langkat </option>
                                                        <option> Pangkalan Brandan,	Kab. Langkat </option>
                                                        <option> Pangkalan Susu, Kab. Langkat </option>
                                                        <option> Panyabungan, Kab. Mandailing Natal </option>
                                                        <option> Gunung Sitoli,	Kab. Nias </option>
                                                        <option> Teluk Dalam, Kab. Nias Selatan </option>
                                                        <option> Sibuhuan, Kab. Padang Lawas </option>
                                                        <option> Gunung Tua, Kab. Padang Lawas Utara </option>
                                                        <option> Salak,	Kab. Pakpak Bharat </option>
                                                        <option> Pangururan, Kab. Samosir </option>
                                                        <option> Sei Rampah, Kab. Serdang Bedagai </option>
                                                        <option> Pematangsiantar, Kab. Simalungun </option>
                                                        <option> Padang Sidempuan, Kab. Tapanuli Selatan </option>
                                                        <option> Sibolga, Kab. Tapanuli Tengah </option>
                                                        <option> Tarutung, Kab. Tapanuli Utara </option>
                                                        <option> Balige, Kab. Toba Samosir </option>
                                                        <option> Binjai, Kota Binjai </option>
                                                        <option> Padang Sidempuan, Kota Padang Sidempuan </option>
                                                        <option> Pematangsiantar, Kota Pematangsiantar	</option>
                                                        <option> Sibolga, Kota Sibolga </option>
                                                        <option> Tanjung Balai,	Kota Tanjung Balai </option>
                                                        <option> Tebing Tinggi,	Kota Tebing Tinggi </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="PADANG"> 13. SUMATERA&nbsp;BARAT </option>
                                                        <option> Padang, Kota Padang </option>
                                                        <option> Bungus Teluk Kabung, Kota Padang </option>
                                                        <option> Koto Tangah, Kota Padang </option>
                                                        <option> Kuranji, Kota Padang </option>
                                                        <option> Lubuk Begalung, Kota Padang </option>
                                                        <option> Lubuk Kilangan, Kota Padang </option>
                                                        <option> Nanggalo, Kota Padang </option>
                                                        <option> Padang Barat, Kota Padang </option>
                                                        <option> Padang Selatan, Kota Padang </option>
                                                        <option> Padang Timur, Kota Padang </option>
                                                        <option> Padang Utara, Kota Padang </option>
                                                        <option> Pauh, Kota Padang </option>
                                                        
                                                        <option> Lubuk Basung,	Kab. Agam </option>
                                                        <option> Pualu Punjung,	Kab. Dharmasraya </option>
                                                        <option> Sarilamak,	Kab. Lima Puluh Kota </option>
                                                        <option> Tuapejat, Kab. Kepulaun Mentawai </option>
                                                        <option> Pariaman, Kab. Padang Pariaman </option>
                                                        <option> Lubuk Sikaping, Kab. Pasaman </option>
                                                        <option> Simpang Empat,	Kab. Pasaman Barat	</option>
                                                        <option> Painan, Kab. Pesisir Selatan </option>
                                                        <option> Muara,	Kab. Sijunjung	</option>
                                                        <option> Solok,	Kota Solok </option>
                                                        <option> Arosuka, Kab. Solok </option>
                                                        <option> Padang Aro, Kab. Solok Selatan </option>
                                                        <option> Batu Sangkar,	Kab. Tanah Datar </option>
                                                        <option> Bukittinggi, Kota Bukittinggi </option>
                                                        <option> Padang Panjang, Kota Padang Panjang </option>
                                                        <option> Pariaman, Kota Pariaman </option>
                                                        <option> Payakumbuh, Kota Payakumbuh </option>
                                                        <option> Sawahlunto, Kota Sawahlunto </option>
                                                        
                                                        <!--option> </option>
                                                        <!--option value="RIAU"> 14. RIAU </option>
                                                        <option> Binawidya, Kota Pekanbaru </option>
                                                        <option> Bukit Raya, Kota Pekanbaru </option>
                                                        <option> Kulim, Kota Pekanbaru </option>
                                                        <option> Lima Puluh, Kota Pekanbaru </option>
                                                        <option> Marpoyan Damai, Kota Pekanbaru </option>
                                                        <option> Payung Sekaki, Kota Pekanbaru </option>
                                                        <option> Pekanbaru Kota, Kota Pekanbaru </option>
                                                        <option> Rumbai Barat, Kota Pekanbaru </option>
                                                        <option> Rumbai, Kota Pekanbaru </option>
                                                        <option> Rumbai Timur, Kota Pekanbaru </option>
                                                        <option> Sail, Kota Pekanbaru </option>
                                                        <option> Senapelan, Kota Pekanbaru </option>
                                                        <option> Sukajadi, Kota Pekanbaru </option>
                                                        <option> Tuah Madani, Kota Pekanbaru </option>
                                                        <option> Tenayan Raya, Kota Pekanbaru </option>
                                                        
                                                        <option> Sei kijang, Kab. Pelalawan </option>
                                                        <option> Langgam, Kab. Pelalawan	</option>
                                                        <option> Pelalawan,	Kab. Pelalawan </option>
                                                        <option> Pelalawan (RAPP), Kab. Pelalawan </option>
                                                        <option> Sorek,	Kab. Pelalawan </option>
                                                        <option> Ukui, Kab. Pelalawan </option>
                                                        <option> Lirik,	Kab. Indragiri Hulu </option>
                                                        <option> Air molek,	Kab. Indragiri Hulu </option>
                                                        <option> Peranap, Kab. Indragiri Hulu </option>
                                                        <option> Rengat, Kab. Indragiri Hulu </option>
                                                        <option> Tembilahan, Kab. Indragiri Hilir </option>
                                                        <option> Kubang, Kab. Kampar </option>
                                                        <option> Sungai pagar,	Kab. Kampar </option>
                                                        <option> Lipat kain, Kab. Kampar </option>
                                                        <option> Air tiris,	Kab. Kampar </option>
                                                        <option> Bangkinang, Kab. Kampar </option>
                                                        <option> Kuok, Kab. Kampar </option>
                                                        <option> Selat Panjang, Kab. Meranti </option>
                                                        <option> Baserah, Kab. Kuantan Singingi </option>
                                                        <option> Taluk kuantan,	Kab. Kuantan Singingi </option>
                                                        <option> Kabun,	Kab. Rokan Hulu </option>
                                                        <option> Tandun, Kab. Rokan Hulu </option>
                                                        <option> Ujung batu, Kab. Rokan Hulu </option>
                                                        <option> Dalu-dalu,	Kab. Rokan Hulu </option>
                                                        <option> Bagan batu, Kab. Rokan Hilir </option>
                                                        <option> Pasir pangiraian, Kab. Rokan Hilir </option>
                                                        <option> Ujung tanjung,	Kab. Rokan Hilir </option>
                                                        <option> Bagan Siapi-api, Kab. Rokan Hilir </option>
                                                        <option> Minas,	Kab. Siak </option>
                                                        <option> Kandis, Kab. Siak </option>
                                                        <option> Perawang,	Kab. Siak </option>
                                                        <option> Dayun,	Kab. Siak </option>
                                                        <option> Siak sri indrapura, Kab. Siak </option>
                                                        <option> Sungai Apit, Kab. Siak </option>
                                                        <option> Buton,	Kab. Siak </option>
                                                        <option> Bengkalis,	Kab. Bengkalis </option>
                                                        <option> Sungai pakning, Kab. Bengkalis </option>
                                                        <option> Duri, Kab. Bengkalis </option>
                                                        <option> Dumai,	Kota Dumai </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="JAMBI"> 15. JAMBI </option>
                                                        <option> Jambi, Kota Jambi </option>
                                                        <option>Alam Barajo, Kota Jambi </option>
                                                        <option>Danau Sipin, Kota Jambi </option>
                                                        <option>Danau Teluk, Kota Jambi </option>
                                                        <option>Jambi Selatan, Kota Jambi </option>
                                                        <option>Jambi Timur, Kota Jambi </option>
                                                        <option>Jelutung, Kota Jambi </option>
                                                        <option>Kota Baru, Kota Jambi </option>
                                                        <option>Paal Merah, Kota Jambi </option>
                                                        <option>Pasar Jambi, Kota Jambi </option>
                                                        <option>Pelayangan, Kota Jambi </option>
                                                        <option>Telanaipura, Kota Jambi </option>
                                                        
                                                        <option> Muara Bulian, Kab. Batang Hari  </option>
                                                        <option> Muara Bungo, Kab. Bungo </option>
                                                        <option> Sungai Penuh, Kab. Kerinci </option>
                                                        <option> Bangko, Kab. Merangin </option>
                                                        <option> Sengeti, Kab. Muaro Jambi </option>
                                                        <option> Sarolangun, Kab. Sarolangun </option>
                                                        <option> Muarasabak, Kab. Tanjung Jabung Timur </option>
                                                        <option> Kualatungkal, Kab. Tanjung Jabung Barat </option>
                                                        <option> Muara Tebo, Kab. Tebo </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="SUMATERA&nbsp;SELATAN"> 16. SUMATERA&nbsp;SELATAN </option>
                                                        <option> Palembang, Kota Palembang </option>
                                                        <option> Alang-alang Lebar, Kota Palembang </option>
                                                        <option> Bukit Kecil, Kota Palembang </option>
                                                        <option> Gandus, Kota Palembang </option>
                                                        <option> Ilir Barat I, Kota Palembang </option>
                                                        <option> Ilir Barat II, Kota Palembang </option>
                                                        <option> Ilir Timur I, Kota Palembang </option>
                                                        <option> Ilir Timur II, Kota Palembang </option>
                                                        <option> Ilir Timur III, Kota Palembang </option>
                                                        <option> Jakabaring, Kota Palembang </option>
                                                        <option> Kalidoni, Kota Palembang </option>
                                                        <option> Kemuning, Kota Palembang </option>
                                                        <option> Kertapati, Kota Palembang </option>
                                                        <option> Plaju, Kota Palembang </option>
                                                        <option> Sako, Kota Palembang </option>
                                                        <option> Seberang Ulu I, Kota Palembang </option>
                                                        <option> Seberang Ulu II, Kota Palembang </option>
                                                        <option> Sematang Borang, Kota Palembang </option>
                                                        <option> Sukarami, Kota Palembang </option>
                                                        
                                                        <option> Pangkalan Balai, Kab. Banyuasin </option>
                                                        <option> Tebing Tinggi,	Kab. Empat Lawang </option>
                                                        <option> Lahat, Kab. Lahat </option>
                                                        <option> Muara enim, Kab. Muara Enim </option>
                                                        <option> Sekayu, Kab. Musi Banyuasin  </option>
                                                        <option> Muara Beliti Baru,	Kab. Musi Rawas </option>
                                                        <option> Indralaya,	Kab. Ogan Ilir </option>
                                                        <option> Kayu Agung, Kab. Ogan Komering Ilir  </option>
                                                        <option> Baturaja,	Kab. Ogan Komering Ulu </option>
                                                        <option> Martapura,	Kab. Ogan Komering Ulu Timur </option>
                                                        <option> Muaradua, Kab. Ogan Komering Ulu Selatan  </option>
                                                        <option> Lubuk Linggau,	Kota Lubuk Linggau </option>
                                                        <option> Pagar Alam, Kota Pagar Alam </option>
                                                        <option> Prabumulih, Kota Prabumulih </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="BENGKULU"> 17. BENGKULU </option>
                                                        <option> Bengkulu, Kota Bengkulu  </option>
                                                        <option> Gading Cempaka, Kota Bengkulu  </option>
                                                        <option> Kampung Melayu, Kota Bengkulu  </option>
                                                        <option> Muara Bangka Hulu, Kota Bengkulu  </option>
                                                        <option> Ratu Agung, Kota Bengkulu  </option>
                                                        <option> Ratu Samban, Kota Bengkulu  </option>
                                                        <option> Selebar, Kota Bengkulu  </option>
                                                        <option> Singaran Pati, Kota Bengkulu  </option>
                                                        <option> Sungai Serut, Kota Bengkulu  </option>
                                                        <option> Teluk Segara, Kota Bengkulu  </option>
                                                        
                                                        <option> Manna,	Kab. Bengkulu Selatan  </option>
                                                        <option> Arga Makmur, Kab. Bengkulu Utara </option>
                                                        <option> Kaur,	Kab. Kaur  </option>
                                                        <option> Kepahiang,	Kab. Kepahiang	</option>
                                                        <option> Lebong, Kab. Lebong  </option>
                                                        <option> Muko-muko,	Kab. Muko-muko </option>
                                                        <option> Curup,	Kab. Rejang Lebong </option>
                                                        <option> Tais, Kab. Seluma	</option>
                                                        
                                                        <!--option> </option>
                                                        <option value="LAMPUNG"> 18. LAMPUNG </option>
                                                        <option> Bandar Lampung, Kota Bandar Lampung </option>
                                                        <option> Bumi Waras, Kota Bandar Lampung </option>
                                                        <option> Enggal, Kota Bandar Lampung </option>
                                                        <option> Kedamaian, Kota Bandar Lampung </option>
                                                        <option> Kedaton, Kota Bandar Lampung </option>
                                                        <option> Kemiling, Kota Bandar Lampung </option>
                                                        <option> Labuhan Ratu, Kota Bandar Lampung </option>
                                                        <option> Langkapura, Kota Bandar Lampung </option>
                                                        <option> Panjang, Kota Bandar Lampung </option>
                                                        <option> Rajabasa, Kota Bandar Lampung </option>
                                                        <option> Sukabumi, Kota Bandar Lampung </option>
                                                        <option> Sukarame, Kota Bandar Lampung </option>
                                                        <option> Tanjung Senang, Kota Bandar Lampung </option>
                                                        <option> Tanjung Karang Barat, Kota Bandar Lampung </option>
                                                        <option> Tanjung Karang Pusat, Kota Bandar Lampung </option>
                                                        <option> Tanjung Karang Timur, Kota Bandar Lampung </option>
                                                        <option> Teluk Betung Barat, Kota Bandar Lampung </option>
                                                        <option> Teluk Betung Selatan, Kota Bandar Lampung </option>
                                                        <option> Teluk Betung Timur, Kota Bandar Lampung </option>
                                                        <option> Teluk Betung Utara, Kota Bandar Lampung </option>
                                                        <option> Way Halim, Kota Bandar Lampung </option>

                                                        <option> Liwa, Kab. Lampung Barat </option>
                                                        <option> Kalianda, Kab. Lampung Selatan	</option>
                                                        <option> Gunung Sugih, kab. Lampung Tengah </option>
                                                        <option> Sukadana, Kab. Lampung Timur </option>
                                                        <option> Kotabumi, Kab. Lampung Utara </option>
                                                        <option> Blambangan umpu, Kab. Way Kanan </ option>
                                                        <option> Kota Agung, Kab. Tanggamus </option>
                                                        <option> Menggala, kab. Tulang Bawang </option>
                                                        <option> Gedong Tataan,	Kab. Pesawaran </option>
                                                        <option> Metro,	Kota Metro </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="BANGKA&nbsp;BELITUNG"> 19. BANGKA&nbsp;BELITUNG </option>
                                                        <option> Pangkal Pinang, Kota Pangkal Pinang </option>
                                                        <option> Bukit Intan, Kota Pangkal Pinang </option>
                                                        <option> Gabek, Kota Pangkal Pinang </option>
                                                        <option> Gerunggang, Kota Pangkal Pinang </option>
                                                        <option> Girimaya, Kota Pangkal Pinang </option>
                                                        <option> Pangkal Balam, Kota Pangkal Pinang </option>
                                                        <option> Rangkui, Kota Pangkal Pinang </option>
                                                        <option> Taman Sari, Kota Pangkal Pinang </option>
                                                        
                                                        <option> Sungai Liat, Kab. Bangka </option>
                                                        <option> Muntok, Kab. Bangka Barat </option>
                                                        <option> Toboali, Kab. Bangka Selatan </option>
                                                        <option> Koba, Kab. Bangka Tengah </option>
                                                        <option> Tanjung Pandan, Kab. Belitung </option>
                                                        <option> Manggar, Kab. Belitung Timur </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="KEPULAUAN&nbsp;RIAU"> 21. KEPULAUAN&nbsp;RIAU </option>
                                                        <option> Batam, Kota Batam </option>
                                                        <option> Batu Aji, Kota Batam </option>
                                                        <option> Batu Ampar, Kota Batam </option>
                                                        <option> Belakang Padang, Kota Batam </option>
                                                        <option> Bengkong, Kota Batam </option>
                                                        <option> Bulang, Kota Batam </option>
                                                        <option> Galang, Kota Batam </option>
                                                        <option> Lubuk Baja, Kota Batam </option>
                                                        <option> Nongsa, Kota Batam </option>
                                                        <option> Sagulung, Kota Batam </option>
                                                        <option> Sei Beduk, Kota Batam </option>
                                                        <option> Sekupang, Kota Batam </option>
                                                        
                                                        <option> Bukit Bestari, Kota Tanjung Pinang </option>
                                                        <option> Tanjungpinang Barat, Kota Tanjung Pinang </option>
                                                        <option> Tanjungpinang Kota, Kota Tanjung Pinang </option>
                                                        <option> Tanjungpinang Timur, Kota Tanjung Pinang </option>

                                                        <option> Tanjung Balai, Karimun, Kab. Karimun  </option>
                                                        <option> Belat,	Kab. Karimun  </option>
                                                        <option> Buru, Kab. Karimun  </option>
                                                        <option> Durai,	Kab. Karimun  </option>
                                                        <option> Karimun, Kab. Karimun  </option>
                                                        <option> Kundur, Kab. Karimun  </option>
                                                        <option> Kundur Barat, Kab. Karimun  </option>
                                                        <option> Kundur Utara, Kab. Karimun  </option>
                                                        <option> Meral,	Kab. Karimun  </option>
                                                        <option> Meral Barat, Kab. Karimun  </option>
                                                        <option> Moro, Kab. Karimun  </option>
                                                        <option> Selat Gelam, Kab. Karimun  </option>
                                                        <option> Sugie Besar, Kab. Karimun  </option>
                                                        <option> Tebing, Kab. Karimun  </option>
                                                        <option> Ungar,	Kab. Karimun  </option>
                                                        
                                                        <option> Bandar Seri Bintan, Kab. Bintan   </option>
                                                        <option> Bintan Pesisir, Kab. Bintan   </option>
                                                        <option> Bintan Timur, Kab. Bintan   </option>
                                                        <option> Bintan Utara, Kab. Bintan   </option>
                                                        <option> Gunung Kijang, Kab. Bintan   </option>
                                                        <option> Mantang, Kab. Bintan   </option>
                                                        <option> Seri Kuala Lobam, Kab. Bintan   </option>
                                                        <option> Tambelan, Kab. Bintan   </option>
                                                        <option> Teluk Sebong, Kab. Bintan   </option>
                                                        <option> Teluk Bintan, Kab. Bintan   </option>
                                                        <option> Toapaya, Kab. Bintan   </option>

                                                        <option> Daik, Kab. Lingga	</option>
                                                        <option> Bakung Serumpun, Kab. Lingga	</option>
                                                        <option> Katang Bidare, Kab. Lingga	</option>
                                                        <option> Kepulauan Posek, Kab. Lingga	</option>
                                                        <option> Lingga, Kab. Lingga	</option>
                                                        <option> Lingga Timur, Kab. Lingga	</option>
                                                        <option> Lingga Utara, Kab. Lingga	</option>
                                                        <option> Selayar, Kab. Lingga	</option>
                                                        <option> Senayang, Kab. Lingga	</option>
                                                        <option> Singkep, Kab. Lingga	</option>
                                                        <option> Singkep Barat, Kab. Lingga	</option>
                                                        <option> Singkep Pesisir, Kab. Lingga	</option>
                                                        <option> Singkep Selatan, Kab. Lingga	</option>
                                                        <option> Temiang Pesisir, Kab. Lingga	</option>
                                                        
                                                        <option> Ranai,	Kab. Natuna </option>
                                                        <option> Bunguran Barat,	Kab. Natuna </option>
                                                        <option> Bunguran Batubi, Kab. Natuna </option>
                                                        <option> Bunguran Timur,	Kab. Natuna </option>
                                                        <option> Bunguran Timur Laut, Kab. Natuna </option>
                                                        <option> Bunguran Selatan, Kab. Natuna </option>
                                                        <option> Bunguran Tengah, Kab. Natuna </option>
                                                        <option> Bunguran Utara,	Kab. Natuna </option>
                                                        <option> Midai, Kab. Natuna </option>
                                                        <option> Pulau Laut,	Kab. Natuna </option>
                                                        <option> Pulau Seluan, Kab. Natuna </option>
                                                        <option> Pulau Tiga,	Kab. Natuna </option>
                                                        <option> Pulau Tiga Barat, Kab. Natuna </option>
                                                        <option> Serasan, Kab. Natuna </option>
                                                        <option> Serasan Timur, Kab. Natuna </option>
                                                        <option> Suak Midai,	Kab. Natuna </option>
                                                        <option> Subi, Kab. Natuna </option> 
                                                        
                                                        <!--option> </option>
                                                        <option value="JAKARTA"> 31. JAKARTA </option>
                                                        <option> Jakarta, Kota Jakarta </option>
                                                        <option> Jakarta Pusat, Kota Jakarta </option>
                                                        <option> Jakarta Selatan, Kota Jakarta </option>
                                                        <option> Jakarta Timur, Kota Jakarta </option>
                                                        <option> Jakarta Barat, Kota Jakarta </option>
                                                        <option> Jakarta Utara, Kota Jakarta </option>
                                                        <option> Kepulauan Seribu, Kota Jakarta </option>
                                                        
                                                        
                                                        <!--option> </option>
                                                        <option value="	JAWA&nbsp;BARAT	"> 32. JAWA&nbsp;BARAT </option>
                                                        <option> Bandung, Kota Bandung </option>
                                                        <option> Andir, Kota Bandung </option>
                                                        <option> Astana Anyar, Kota Bandung </option>
                                                        <option> Antapani, Kota Bandung </option>
                                                        <option> Arcamanik, Kota Bandung </option>
                                                        <option> Babakan Ciparay, Kota Bandung </option>
                                                        <option> Bandung Kidul, Kota Bandung </option>
                                                        <option> Bandung Kulon, Kota Bandung </option>
                                                        <option> Bandung Wetan, Kota Bandung </option>
                                                        <option> Batununggal, Kota Bandung </option>
                                                        <option> Bojongloa Kaler, Kota Bandung </option>
                                                        <option> Bojongloa Kidul, Kota Bandung </option>
                                                        <option> Buahbatu, Kota Bandung </option>
                                                        <option> Cibeunying Kaler, Kota Bandung </option>
                                                        <option> Cibeunying Kidul, Kota Bandung </option>
                                                        <option> Cibiru, Kota Bandung </option>
                                                        <option> Cicendo, Kota Bandung </option>
                                                        <option> Cidadap, Kota Bandung </option>
                                                        <option> Cinambo, Kota Bandung </option>
                                                        <option> Coblong, Kota Bandung </option>
                                                        <option> Gedebage, Kota Bandung </option>
                                                        <option> Kiaracondong, Kota Bandung </option>
                                                        <option> Lengkong, Kota Bandung </option>
                                                        <option> Mandalajati, Kota Bandung </option>
                                                        <option> Panyileukan, Kota Bandung </option>
                                                        <option> Rancasari, Kota Bandung </option>
                                                        <option> Regol, Kota Bandung </option>
                                                        <option> Sukajadi, Kota Bandung </option>
                                                        <option> Sukasari, Kota Bandung </option>
                                                        <option> Sumur Bandung, Kota Bandung </option>
                                                        <option> Ujungberung, Kota Bandung </option>
                                                        
                                                        
                                                        <option> Cikarang, Kab. Bekasi </option>
                                                        <option> Cibinong, Kab. Bogor </option>
                                                        <option> Sukabumi, Kab. Sukabumi </option>
                                                        <option> Cianjur, Kab. Cianjur </option>
                                                        <option> Sukabumi, Kota Sukabumi </option>
                                                        <option> Sumber, Kab. Cirebon </option>
                                                        <option> Indramayu,	Kab. Indramayu </option>
                                                        <option> Kuningan,	Kab. Kuningan </option>
                                                        <option> Majalengka, Kab. Majalengka </option>
                                                        <option> Cirebon, Kota Cirebon </option>
                                                        <option> Karawang, Kab. Karawang </option>
                                                        <option> Purwakarta, Kab. Purwakarta </option>
                                                        <option> Subang, Kab. Subang </option>
                                                        <option> Soreang, Kab. Bandung </option>
                                                        <option> Ngamprah, Kab. Bandung Barat </option>
                                                        <option> Sumedang, Kab. Sumedang </option>
                                                        <option> Singaparna, Kab. Tasikmalaya </option>
                                                        <option> Tasikmalaya, Kota Tasikmalaya </option>
                                                        <option> Garut,	Kab. Garut </option>
                                                        <option> Ciamis, Kab. Ciamis </option>
                                                        <option> Cimahi, Kota Cimahi </option>
                                                        <option> Banjar, Kota Banjar </option>
                                                        <option> Bekasi, Kota Bekasi </option>
                                                        <option> Bogor,	Kota Bogor </option>
                                                        <option> Depok,	Kota Depok </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	JAWA&nbsp;TENGAH "> 33. JAWA&nbsp;TENGAH </option>
                                                        <option> Semarang, Kota Semarang </option>
                                                        <option> Banyumanik, Kota Semarang </option>
                                                        <option> Candisari, Kota Semarang </option>
                                                        <option> Gajahmungkur, Kota Semarang </option>
                                                        <option> Gayamsari, Kota Semarang </option>
                                                        <option> Genuk, Kota Semarang </option>
                                                        <option> Gunungpati, Kota Semarang </option>
                                                        <option> Ngaliyan, Kota Semarang </option>
                                                        <option> Pedurungan, Kota Semarang </option>
                                                        <option> Semarang Barat, Kota Semarang </option>
                                                        <option> Semarang Selatan, Kota Semarang </option>
                                                        <option> Semarang Tengah, Kota Semarang </option>
                                                        <option> Semarang Timur, Kota Semarang </option>
                                                        <option> Tembalang, Kota Semarang </option>
                                                        <option> Tugu, Kota Semarang </option>

                                                        <option> Solo, Kota Surakarta </option>
                                                        <option> Tegal, Kota Tegal </option>
                                                        <option> Banjarnegara,	Kab. Banjarnegara </option>
                                                        <option> Batang, Kab. Batang </option>
                                                        <option> Blora,	Kab. Blora </option>
                                                        <option> Boyolali, Kab. Boyolali </option>
                                                        <option> Brebes, Kab. Brebes </option>
                                                        <option> Cilacap, Kab. Cilacap </option>
                                                        <option> Demak,	Kab. Demak </option>
                                                        <option> Jepara, Kab. Jepara </option>
                                                        <option> Kajen,	Kab. Pekalongan </option>
                                                        <option> Karanganyar, Kab. Karanganyar </option>
                                                        <option> Kebumen, Kab. Kebumen </option>
                                                        <option> Kendal, Kab. Kendal </option>
                                                        <option> Klaten, kab. Klaten </option>
                                                        <option> Kudus,	Kab. Kudus </option>
                                                        <option> Magelang, Kota Magelang </option>
                                                        <option> Mungkid, Kab. Magelang	</option>
                                                        <option> Pati, Kab. Pati </option>
                                                        <option> Pekalongan, Kota Pekalongan </option>
                                                        <option> Pemalang, Kab. Pemalang </option>
                                                        <option> Purbalingga, Kab. Purbalingga </option>
                                                        <option> Purwokerto, Kab. Banyumas </option>
                                                        <option> Purworejo,	Kab. Purworejo </option>
                                                        <option> Rembang, Kab. Rembang </option>
                                                        <option> Salatiga, Kota Salatiga </option>
                                                        <option> Slawi,	Kab. Tegal </option>
                                                        <option> Sragen, Kab. Sragen </option>
                                                        <option> Sukoharjo,	Kab. Sukoharjo </option>
                                                        <option> Temanggung, Kab. Temanggung </option>
                                                        <option> Ungaran, Kab. Semarang </option>
                                                        <option> Wonogiri, Kab. Wonogiri </option>
                                                        <option> Wonosalam,	Kab. Grobogan </option>
                                                        <option> Wonosobo, Kab. Wonosobo </option-->
                                                        
                                                        <!--option> </option>
                                                        <option value="	YOGYAKARTA	"> 34. YOGYAKARTA </option>
                                                        <option> Yogyakarta, Kota Yogyakarta </option>
                                                        <option> Bantul, Kab. Bantul	</option>
                                                        <option> Wonosari, Kab. Gunung Kidul </option>
                                                        <option> Wates,	Kab. Kulon Progo </option>
                                                        <option> Sleman, Kab. Sleman </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	JAWA&nbsp;TIMUR	"> 36. JAWA&nbsp;TIMUR </option>
                                                        <option> Surabaya, Kota Surabaya </option>
                                                        <option> Sidoarjo, Kab. Sidoarjo </option>
                                                        <option> Bangkalan,	Kab. Bangkalan </option>
                                                        <option> Bantaran, Kab. Probolinggo </option>
                                                        <option> Banyuwangi, Kab. Banyuwangi </option>
                                                        <option> Batu, Kota Batu </option>
                                                        <option> Blitar, Kota Blitar </option>
                                                        <option> Bondowoso,	Kab. Bondowoso </option>
                                                        <option> Caruban, Kab. Madiun </option>
                                                        <option> Gresik, Kab. Gresik </option>
                                                        <option> Jember, Kab. Jember </option>
                                                        <option> Jombang, Kab. Jombang </option>
                                                        <option> Kediri, Kota Kediri </option>
                                                        <option> Kepanjen, Kab. Malang </option>
                                                        <option> Lamongan, Kab. Lamongan </option>
                                                        <option> Lumajang, Kab. Lumajang </option>
                                                        <option> Madiun, Kota Madiun </option>
                                                        <option> Magetan, Kab. Magetan </option>
                                                        <option> Malang, Kota Malang </option>
                                                        <option> Mojokerto,	Kota Mojokerto </option>
                                                        <option> Nganjuk, Kab. Nganjuk </option>
                                                        <option> Ngawi,	Kab. Ngawi </option>
                                                        <option> Pacitan, Kab. Pacitan </option>
                                                        <option> Pamekasan,	Kab. Pamekasan </option>
                                                        <option> Pandaan, Kab. Pasuruan </option>
                                                        <option> Pasuruan, Kota Pasuruan </option>
                                                        <option> Ponorogo, Kab. Ponorogo </option>
                                                        <option> Probolinggo, Kota Probolinggo </option>
                                                        <option> Sampang, Kab. Sampang </option>
                                                        <option> Situbondo,	Kab. Situbondo </option>
                                                        <option> Sumenep, Kab. Sumenep </option>
                                                        <option> Trenggalek, Kab. Trenggalek </option>
                                                        <option> Tuban,	Kab. Tuban </option>
                                                        <option> Tulungagung, Kab. Tulungagung </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="BANTEN"> 36. BANTEN </option>
                                                        <option> Tangerang, Kota Tangerang </option>
                                                        <option> Tigaraksa,	Kab. Tangerang </option>
                                                        <option> Serang, Kota Serang </option>
                                                        <option> Rangkasbitung,	Kab. Lebak </option>
                                                        <option> Pandeglang, Kab. Pandeglang </option>
                                                        <option> Baros,	Kab. Serang	</option>
                                                        <option> Cilegon, Kota Cilegon </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	BALI "> 51. BALI </option>
                                                        <option> Denpasar, Kab. Denpasar </option>
                                                        <option> Sanur,	Kab. Denpasar </option>
                                                        <option> Abian Semal, Kab. Badung	</option>
                                                        <option> Benoa,	Kab. Badung </option>
                                                        <option> Canggu, Kab. Badung </option>
                                                        <option> Dalung, Kerobokan,	Kab. Badung </option>
                                                        <option> Legian, Kab. Badung </option>
                                                        <option> Nusa Dua, Kab. Badung	</option>
                                                        <option> Petang, Kab. Badung </option>
                                                        <option> Seminyak, Kab. Badung </option>
                                                        <option> Mengwi, Kab. Badung </option>
                                                        <option> Tanjung Benoa,	Kab. Badung </option>
                                                        <option> Bangli Kota, Kab. Bangli </option>
                                                        <option> Kintamani,	Kab. Bangli </option>
                                                        <option> Singaraja Kota, Kab. Buleleng </option>
                                                        <option> Batu Bulan, Kab. Gianyar </option>
                                                        <option> Batuan, Sukawati, Kab. Gianyar </option>
                                                        <option> Celuk,	Kab. Gianyar </option>
                                                        <option> Gianyar Kota, Kab. Gianyar </option>
                                                        <option> Tampak Siring,	Kab. Gianyar </option>
                                                        <option> Ubud, Kab. Gianyar </option>
                                                        <option> Negara, Kab. Jembrana </option>
                                                        <option> Amlapura, Kab. Karangasem	</option>
                                                        <option> Karang Asem Kota, Kab. Karangasem </option>
                                                        <option> Padang Bai, Kab. Karangasem </option>
                                                        <option> Klungkung Kota, Kab. Klungkung </option>
                                                        <option> Nusa Penida, Kab. Klungkung </option>
                                                        <option> Penebel, Kab. Tabanan </option>
                                                        <option> Tabanan Kota, Kab. Tabanan  </option>i
                                                        <option> Tanah Lot,	Kab. Tabanan </option>
                                                        <option> Gilimanuk,	Kab.Jembrana </option>
                                                        <option> Kuta, Kab.Kuta </option>
                                                        <option> Bedugul, Kab.Tabanan </option>
                                                        <option> Kerambitan, Kab.Tabanan  </option>
                                                        <option> Baturiti, Kab.Tabanan  </option>
                                                        <option> Pupuan, Kab.Tabanan  </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	NTB	"> 52. NUSA&nbsp;TENGGARA&nbsp;BARAT </option>
                                                        <option> Mataram, Kota Mataram  </option>
                                                        <option> Woha, Kab. Bima </option>
                                                        <option> Dompu,	Kab. Dompu </option>
                                                        <option> Gerung, Kab. Lombok Barat </option>
                                                        <option> Praya,	Kab. Lombok Tengah </option>
                                                        <option> Selong, Kab. Lombok Timur </option>
                                                        <option> Sumbawa besar,	Kab. Sumbawa </option>
                                                        <option> Taliwang, Kab. Sumbawa Barat </option>
                                                        <option> Bima, Kota Bima </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	NTT	"> 53. NUSA&nbsp;TENGGARA&nbsp;TIMUR </option>
                                                        <option> Kupang, Kota Kupang </option>
                                                        <option> Kalabahi, Kab. Alor </option>
                                                        <option> Atambua, Kab. Belu	</option>
                                                        <option> Ende, Kab. Ende </option>
                                                        <option> Larantuka,	Kab. Flores Timur </option>
                                                        <option> Oelamasi, Kab. Kupang </option>
                                                        <option> Lewoleba, Kab. Lembata </option>
                                                        <option> Ruteng, Kab. Manggarai </option>
                                                        <option> Labuan Bajo, Kab. Manggarai Barat </option>
                                                        <option> Borong, Kab. Manggarai timur </option>
                                                        <option> Mbay, Kab. Nagekeo </option>
                                                        <option> Bajawa, Kab. Ngada	</option>
                                                        <option> Baa, Kab. Rote Ndao </option>
                                                        <option> Maumere, Kab. Sikka </option>
                                                        <option> Waikabubak, Kab. Sumba Barat </option>
                                                        <option> Tambolaka,	Kab. Sumba Barat Daya </option>
                                                        <option> Waibakul, Kab. Sumba Tengah </option>
                                                        <option> Waingapu, Kab. Sumba Timur  </option>
                                                        <option> Soe, Kab. Timor Tengah Selatan	</option>
                                                        <option> Kafamenanu, Kab.TimorTengah Utara </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	KALIMANTAN&nbsp;BARAT "> 61. KALIMANTAN&nbsp;BARAT  </option>
                                                        <option> Pontianak, Kota Pontianak </option>
                                                        <option> Bengkayang, Kab. Bengkayang </option>
                                                        <option> Putussibau, Kab. Kapuas Hulu </option>
                                                        <option> Ketapang, Kab. Ketapang </option>
                                                        <option> Sukadana/Teluk Melano,	Kab. Kayong Utara </option>
                                                        <option> Ngabang, Kab. Landak </option>
                                                        <option> Nanga Pinoh, Kab. Melawi </option>
                                                        <option> Mempawah, Kab. Pontianak </option>
                                                        <option> Sambas, Kab. Sambas </option>
                                                        <option> Sanggau, Kab. Sanggau </option>
                                                        <option> Sekadau Hilir,	Kab. Sekadau </option>
                                                        <option> Sintang, Kab. Sintang </option>
                                                        <option> Sungai Raya, Kab. Kubu Raya </option>
                                                        <option> Singkawang	Kota, Singkawang </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	KALIMANTAN&nbsp;TNGAH "> 62. KALIMANTAN&nbsp;TENGAH </option>
                                                        <option> Palangkaraya, Kota Palangkaraya </option>
                                                        <option> Kuala Kurun, Kab. Gunung Mas </option>
                                                        <option> Kuala Kapuas,	Kab. Kapuas	</option>
                                                        <option> Kasongan,	Kab. Katingan  </option>
                                                        <option> Karengpangi, Kab. Katingan </option>
                                                        <option> Pangkalan Bun,	Kab. Kotawaringin Barat	</option>
                                                        <option> Kumai,	Kab. Kotawaringin Barat	</option>
                                                        <option> Pangkalan Lada, Kab. Kotawaringin Barat </option>
                                                        <option> Pangkalan Banteng,	Kab. Kotawaringin Barat </option>
                                                        <option> Sampit, Kab. Kotawaringin Timur </option>
                                                        <option> Samuda, Kab. Kotawaringin Timur </option>
                                                        <option> Nanga Bulik, Kab. Lamandau	</option>
                                                        <option> Lamandau, Kab. Lamandau </option>
                                                        <option> Puruk Cahu, Kab. Murung Raya </option>
                                                        <option> Pulang Pisau, Kab. Pulang Pisau </option>
                                                        <option> Sukamara, Kab. Sukamara </option>
                                                        <option> Kuala Pembuang, Kab. Seruyan </option>
                                                        <option> Seruyan, Kab. Seruyan </option>
                                                        <option> Hanau,	Kab. Seruyan </option>
                                                        <option> Buntok, Kab. Barito Selatan </option>
                                                        <option> Tamiang Layang, Kab. Barito Timur </option>
                                                        <option> Muara Teweh, Kab. Barito Utara </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	KALIMANTAN&nbsp;SELATAN "> 63. KALIAMNTAN&nbsp;SELATAN </option>
                                                        <option> Banjarmasin, Kota Banjarmasin </option>
                                                        <option> Paringin, Kab. Balangan </option>
                                                        <option> Gambut, Kab. Banjar </option>
                                                        <option> Martapura,	Kab. Banjar </option>
                                                        <option> Marabahan,	Kab. Barito Kuala </option>
                                                        <option> Kandangan,	Kab. Hulu Sungai Selatan </option>
                                                        <option> Nagara, Kab. Hulu Sungai Selatan </option>
                                                        <option> Barabai, Kab. Hulu Sungai Tengah </option>
                                                        <option> Amuntai, Kab. Hulu Sungai Utara </option>
                                                        <option> Kotabaru, Kab. Kota Baru </option>
                                                        <option> Serongga, Kab. Kota Baru </option>
                                                        <option> Pelaihari,	Kab. Tanah Laut </option>
                                                        <option> Tanjung, Kab. Tabalong </option>
                                                        <option> Kelua,	Kab. Tabalong </option>
                                                        <option> Muruk Pundak, Kab. Tabalong </option>
                                                        <option> Batu Licin, Kab. Tanah Bambu </option>
                                                        <option> Satui, Kab. Tanah Bambu </option>
                                                        <option> Pagatan, Kab. Tanah Bambu </option>
                                                        <option> Rantau, Kab. Tapin	</option>
                                                        <option> Binuang, Kab. Tapin </option>
                                                        <option> Banjarbaru	Kota, Banjarbaru </option>
                                                        <option> Landasan Ulin,	Kab Banjarbaru </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	KALIMANATAN&nbsp;TIMUR	"> 64. KALIMANTAN&nbsp;TIMUR </option>
                                                        <option> Balikpapan, Kota Balikpapan </option>
                                                        <option> Tanjung Redep,	Kab. Berau </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	KALIMANATAN&nbsp;UTARA	"> 65. KALIMANTAN&nbsp;UTARA </option>
                                                        <option> Tanjung Selor,	Kab. Bulungan </option>
                                                        <option> Sendawar, Kab. Kutai Barat </option>
                                                        <option> Tenggarong, Kab. Kutai Kartanegara </option>
                                                        <option> Sanggata, Kab. Kutai Timur </option>
                                                        <option> Malinau, Kab. Malinau </option>
                                                        <option> Nunukan, Kab. Nunukan </option>
                                                        <option> Tanah Grogot, Kab. Paser </option>
                                                        <option> Penajam, Kab. Penajam Paser Utara </option>
                                                        <option> Tana Tidung, Kab Tana Tidung </option>
                                                        <option> Bontang, Kota Bontang </option>
                                                        <option> Samarinda,	Kota Samarinda </option>
                                                        <option> Tarakan, Kota Tarakan </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	GORONTALO "> 23 </option>
                                                        <option> Gorontalo, Kota Gorontalo </option>
                                                        <option> Tilamuta, Kab. Boalemo </option>
                                                        <option> Suwawa, Kab. Bone Bolango </option>
                                                        <option> Limboto, Kab. Gorontalo </option>
                                                        <option> Kwandang, Kab. Gorontalo Utara </option>
                                                        <option> Marisa, Kab. Pahuwato </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	KENDARI "> 24 </option>
                                                        <option> Kendari, Kota Kendari </option>
                                                        <option> Rumbia, Kab. Bombana </option>
                                                        <option> Pasar Wajo, Kab. Buton & Buton Utara </option>
                                                        <option> Kolaka, Kab. Kolaka </option>
                                                        <option> Lasusua, Kab. Kolaka Utara	</option>
                                                        <option> Unaaha, Kab. Konawe </option>
                                                        <option> Wanggodo/Andolo, Kab. Konawe Utara/Selatan	</option>
                                                        <option> Raha, Kab. Muna </option>
                                                        <option> Wangi-Wangi, Kab. Wakatobi </option>
                                                        <option> Bau-Bau, Kota Bau-Bau </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	SULAWESI&nbsp;SELATAN "> 25 </option>
                                                        <option> Makassar, Kota Makassar </option>
                                                        <option> Bantaeng, Kab. Bantaeng </option>
                                                        <option> Barru,	Kab. Barru </option>
                                                        <option> Watampone,	Kab. Bone </option>
                                                        <option> Bulukumba,	Kab. Bulukumba </option>
                                                        <option> Enrekang, Kab. Enrekang </option>
                                                        <option> Sungguminasa,	Kab. Gowa </option>
                                                        <option> Jeneponto,	Kab. Jeneponto </option>
                                                        <option> Belopa, Kab Luwu Utara	</option>
                                                        <option> Soroako/Malili, Kab. Luwu Timur </option>
                                                        <option> Masamba, Kab. Luwu Utara </option>
                                                        <option> Maros,	Kab. Maros </option>
                                                        <option> Pangkajene, Kab. Pangkajene Kepulauan </option>
                                                        <option> Pinrang, Kab. Pinrang </option>
                                                        <option> Benteng, Kab. Selayar </option>
                                                        <option> Sinjai, Kab. Sinjai </option>
                                                        <option> Sindereng,	Kab. Sidenreng Rappang </option>
                                                        <option> Watansoppeng, Kab. Soppeng	</option>
                                                        <option> Takalar, Kab. Takalar </option>
                                                        <option> Makale, Kab. Tana Toraja </option>
                                                        <option> Sengkang, Kab. Wajo </option>
                                                        <option> Palopo, Kota Palopo </option>
                                                        <option> Pare-Pare, Kota Pare-Pare </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	MANADO "> 26 </option>
                                                        <option> Manado, Kota Manado  </option>
                                                        <option> Kotamobagu, Kab. Bolaang Mongondow	</option>
                                                        <option> Boroko, Kab. Bolaang Mongondow Utara </option>
                                                        <option> Tahuna, Kab. Kepulauan Sangihe </option>
                                                        <option> Tondano, Kab. Minahasa	</option>
                                                        <option> Airmadidi,	Kab. Minahasa Utara	</option>
                                                        <option> Amurang, Kab. Minahasa Selatan	</option>
                                                        <option> Ratahan, Kab. Minahasa Tenggara </option>
                                                        <option> Bitung, Kota Bitung  </option>
                                                        <option> Tomohon, Kota Tomohon </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	PALU "> 27 </option>
                                                        <option> Palu, Kota Palu </option>
                                                        <option> Luwuk banggai,	Kab. Banggai </option>
                                                        <option> Banggai, Kab. Banggai Kepulauan </option>
                                                        <option> Buol, Kab. Buol </option>
                                                        <option> Banawa, Kab. Donggala </option>
                                                        <option> Bungku, Kab. Morowali </option>
                                                        <option> Parigi, Kab. Parigi Moutong </option>
                                                        <option> Poso, Kab. Poso </option>
                                                        <option> Ampana, Kab. Tojo Una-Una </option>
                                                        <option> Tolitoli, Kab. Toli-Toli </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	MAMUJU "> 28 </option>
                                                        <option>Polewali,	Kab. Polewali Mandar </option>
                                                        <option>Majene, Kab. Majene </option>
                                                        <option>Mamasa, Kab. Mamasa </option>
                                                        <option>Mamuju, Kab. Mamuju </option>
                                                        <option>Pasangkayu, Kab. Mamuju Utara </option-->
                                                        
                                                        <!--option> </option>
                                                        <option value="	AMBON "> 29 </option>
                                                        <option> Ambon, Kota Ambon </option>
                                                        <option> Namlea, Kab. Buru </option>
                                                        <option> Dobo, Kab. Kepulauan Aru </option>
                                                        <option> Masohi, Kab. Maluku Tengah	</option>
                                                        <option> Tual,	Kab. Maluku Tenggara  </option>
                                                        <option> Saumlaki,	Kab. Maluku Tenggara Barat </option>
                                                        <option> Piru, Kab. Seram Bagian Barat </option>
                                                        <option> Dataran Hunimoa, Kab. Seram Bagian Timur </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	TERNATE "> 30 </option>
                                                        <option> Ternate, Kota Ternate </option>
                                                        <option> Sofifi, Kab Tidore Kepulauan </option>
                                                        <option> Jailolo, Kab. Halmahera Barat </option>
                                                        <option> Kao, Kab. Halmahera Utara </option>
                                                        <option> Tobelo, Kab. Halmahera Utara </option>
                                                        <option> Morotai, Kab. Halmahera  </option>
                                                        <option> Tidore	Kota, Tidore </option>
                                                        <option> Labuha,Kab. Halmahera Selatan </option>
                                                        <option> Bacan,	Kab. Halmahera Selatan </option>
                                                        <option> Weda, Kab. Halmahera Tengah </option>
                                                        <option> Subaim, Kab. Halmahera Timur </option>
                                                        <option> Maba, Kab. Halmahera Timur </option>
                                                        <option> Subaim, Kab. Halmahera Timur </option>
                                                        <option> Wasile, Kab. Halmahera Timur </option>
                                                        <option> Sanana, Kab. Kepulauan Sula </option>
                                                        <option> Bobong, Kab. Kepulauan Taliabu	</option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	JAYAPURA "> 31 </option>
                                                        <option> Jayapura, Kota Jayapura </option>
                                                        <option> Agats,	Kab. Asmat </option>
                                                        <option> Biak, Kab. Biak Numfor </option>
                                                        <option> Tanah Merah, Kab. Boven Digoel	</option>
                                                        <option> Demta,	Kab. Jayapura </option>
                                                        <option> Wamena, Kab. Jayawijaya </option>
                                                        <option> Waris,	Kab. Keerom	</option>
                                                        <option> Kepi,	Kab. Mappi </option>
                                                        <option> Merauke, Kab. Merauke </option>
                                                        <option> Monokwari,	Kab. Manokwari </option>
                                                        <option> Oksibil, Kab. Pegunungan Bintang </option>
                                                        <option> Mulia,	Kab. Puncak Jaya </option>
                                                        <option> Sarmi,	Kab. Sarmi	</option>
                                                        <option> Sorendiweri, Kab. Supiori </option>
                                                        <option> Karubaga,	Kab. Tolikora  </option>
                                                        <option> Botawa, Kab. Waropen </option>
                                                        <option> Sumohai, Kab. Yahukimo	</option>
                                                        <option> Serui,	Kab. Yapen Waropen </option>
                                                        <option> Burmeso, Kab. Mamberamo Raya </option>
                                                        
                                                        <!--option> </option>
                                                        <option value="	TIMIKA "> 32 </option>
                                                        <option> Timika,Kab. Mimika </option>
                                                        <option> Sorong, Kota Sorong </option>
                                                        <option> Fak-Fak, Kab. Fak-Fak </option>
                                                        <option> Kaimana, Kab. Kaimana </option>
                                                        <option> Waisai, Kab. Raja Ampat </option>
                                                        <option> Abun, Kab. Sorong	</option>
                                                        <option> Teminabuan, Kab. Sorong Selatan </option>
                                                        <option> Bintuni, Kab. Teluk Bintuni  </option>
                                                        <option> Rasei,	Kab. Teluk Wondama </option>
                                                        <option> Nabire, Kab. Nabire </option>
                                                        <option> Enarotari,	Kab. Paniai </option-->
                                                    </select>
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="col-md-4 control-label">Layanan</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input type="hidden" name="id">
                                                    <input class="form-control" type="text" name="layanan" maxlength="30">
                                                    <!--select  class="form-control"  name="layanan">
                                                        <option style="color:red"; title=" "value=" ">-</option>
                                                        <option title="minimal 150 kg" value="Cargo (150 kg)">Cargo (150 Kg) </option>
                                                        <option title="minimal 100 kg" value="Cargo (100 kg)">Cargo (100 Kg) </option>
                                                        <option title="minimal 30 kg" value="Cargo (30 kg)">Cargo (30 Kg) </option>
                                                        <option title="minimal 1 kg" value="Reguler">Reguler</option>
                                                        <option title="dikirim langsung" value="Delivery faster">Delivery faster</option>
                                                        
                                                        <option value="Ekonomis">Ekonomis </option>
                                                        <option value="Sameday Service">Sameday Service</option>
                                                        <option value="Priority">Priority</option>
                                                        <option value="delivery faster">faster</option>
                                                            
                                                        <option title="Tarif Promo" value="Tarif Promo">TARIF PROMO</option>
                                                        <option value="Cargo (250 kg)">Cargo (250 Kg) </option>
                                                        <option value="Cargo (200 kg)">Cargo (200 Kg) </option>
                                                        <option value="Cargo (50 kg)">Cargo (50 Kg) </option>
                                                        <option value="Cargo (20 kg)">Cargo (20 Kg) </option>
                                                        <option value="Cargo (10 kg)">Cargo (10 Kg) </option>
                                                        
                                                        <option value="UDARA (Door to Door)">UDARA (Door to Door)</option>
                                                        <option value="UDARA (Port to Port)">UDARA (Port to Port)</option>
                                                        <option value="UDARA (Door to Port)">UDARA (Door to Port)</option>
                                                        <option value="UDARA (Port to Door)">UDARA (Port to Door)</option>
                                                        
                                                        <option value="Motor">Motor </option>
                                                        <option value="Motor Besar">Motor Besar </option>
                                                        <option value="MOBIL">MOBIL </option>
                                                        <option value="MOBIL KECIL">MOBIL KECIL</option>
                                                        <option value="MOBIL SEDANG">MOBIL SEDANG </option>
                                                        <option value="MOBIL BESAR">MOBIL BESAR </option>
                                                        
                                                        <option value="LAUT (LCL)">LAUT (LCL)</option>
                                                        <option value="LAUT (FLC)">LAUT (FLC)</option>
                                                        <option value="LAUT (FLC)">LAUT (FLC)</option>
                                                        
                                                        <option value="Cargo Laut (Via Kapal Cepat)">Cargo Laut (Via Kapal Cepat)</option>
                                                        <option value="Cargo Laut (Via Kapal Cargo)">Cargo Laut (Via Kapal Cargo)</option>
                                                        <option value="Pelni (100 kg)">Pelni (100 Kg) </option>
                                                    </select-->
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="col-md-4 control-label">Tarif</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="harga" maxlength="15" onkeypress="return isNumberKey(event)">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="col-md-4 control-label">Estimasi</label>
                                            <div class="col-md-8">
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="estimasi" maxlength="20">
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <script type="text/javascript">
                                    
                                        function isNumberKey(evt)
                                        {
                                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                                            if (charCode != 46 && charCode > 31 
                                            && (charCode < 48 || charCode > 57))
                                            return false;
                                            return true;
                                        }  
                                    
                                    </script>
            
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!--button type="reset" name="rest" value="reset" class="btn btn-danger">
                                                    <i class="fa fa-refresh"></i> Reset
                                                </button-->
                                                <input type="hidden" name="simpan">
                                                <button type="button" id="btnSave"  onclick="save()" class="btn btn-primary">
                                                    <i class="fa fa-floppy-o"></i>  Simpan <span id="loading"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
        
                                </form>
                            
	
						</div>
						<!-- end widget content -->
	
					</div>
					<!-- end widget div -->
					
				</div>
				<!-- end widget -->
	
				
	
			</article>
            <?php endif; ?>
			<!-- WIDGET END -->
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-<?php echo ($level == 'admin2') ? '12' : '8'; ?>">

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
						<h2>List Tarif<span id="loading2"></span></h2>
	
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
	
						
						<table id="table" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone" style="width:30px;">No</th>
										<th data-class="expand"><i class="fa fa fa-map-o text-muted hidden-md hidden-sm hidden-xs"></i> Asal</th>
										<th data-class="expand" ><i class="fa fa fa-map text-muted hidden-md hidden-sm hidden-xs"></i> Tujuan</th>
										<th data-hide="phone" ><i class="fa fa fa-tags text-muted hidden-md hidden-sm hidden-xs"></i> Layanan</th>
										<th data-class="expand" ><i class="fa fa-fw fa-money text-muted hidden-md hidden-sm hidden-xs"></i> Tarif</th>
										<th data-hide="phone" ><i class="fa fa fa-clock-o text-muted hidden-md hidden-sm hidden-xs"></i> Estimasi</th>
										<th data-hide="phone,tablet" style="width:80px;"><i class="fa fa-fw fa-gear txt-color-blue hidden-md hidden-sm hidden-xs"></i> Aksi</th>
										
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



<script type="text/javascript">

// DO NOT REMOVE : GLOBAL FUNCTIONS!

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
var table;

$(document).ready(function() {

    //datatables
    var responsiveHelper_dt_basic = undefined;
		
		
		var breakpointDefinition = {
			tablet : 1024,
			phone : 480
		};
		
	table = $('#table').DataTable({ 
		 
		dom: 'Bfrtip',
		buttons: [
			'copy', 'csv', 'excel', 
			{
                extend: 'pdf',
                orientation: 'landscape',
                pageSize: 'A4'
            },'print'
		],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('cadmin/home/set_harga_ajax_list')?>",
            "type": "POST"
        },
		"preDrawCallback" : function() {
				// Initialize the responsive datatables helper once.
				if (!responsiveHelper_dt_basic) {
					responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#table'), breakpointDefinition);
				}
			},
		"rowCallback" : function(nRow) {
				responsiveHelper_dt_basic.createExpandIcon(nRow);
			},
			"drawCallback" : function(oSettings) {
				responsiveHelper_dt_basic.respond();
			},
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],


    });
});
</script>
