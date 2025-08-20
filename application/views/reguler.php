<!-- WRAPPER -->
<title>Service Reguler </title>
 <script type="text/javascript">
 (function () {
  const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

  //I'm adding this section so I don't have to keep updating this pen every year :-)
  //remove this if you don't need it
  let today = new Date(),
      dd = String(today.getDate()).padStart(2, "0"),
      mm = String(today.getMonth() + 1).padStart(2, "0"),
      yyyy = today.getFullYear(),
      nextYear = yyyy + 1,
      dayMonth = "7/25/", //batas promo ("bulan / tanggal")
      promo = dayMonth + yyyy;
  
  today = mm + "/" + dd + "/" + yyyy;
  if (today > promo) {
    promo = dayMonth + nextYear;
  }
  //end
  
  const countDown = new Date(promo).getTime(),
      x = setInterval(function() {    

        const now = new Date().getTime(),
              distance = countDown - now;

        document.getElementById("days").innerText = Math.floor(distance / (day)),
          document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
          document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
          document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
          document.getElementById("headline").style.color  = "#333333";
          

        //do something later when date is reached
        if (distance < 0) {
          document.getElementById("headline").innerText = "Waktu promosi habis!";
          document.getElementById("countdown").style.display = "none";
          document.getElementById("content").style.display = "block";
          clearInterval(x);
        }
        //seconds
      }, 0)
  }());
 </script>





<style type="text/css">
.style1 {
	font-size: 10;
	font-family: Arial, Helvetica, sans-serif;
	div.ex1 {
  width:400px;
  margin: auto;
  border: 3px solid #73AD21;
}
.style6 {font-weight: bold}
.style7 {
	font: bold larger;
	font-size: x-large;
	color: #000033;
}
</style>


	<div id="wrapper">
		<!-- PAGE TITLE -->
		<section id="Reguler" class="container" style="text-align:center; margin-top:-30px">
		<div class="style1" >
		    <div align="Left">
                <h1 style="margin-top: 43px;">SERVICE REGULER</h1>
                <div align="Left" style="margin-top: -20px;">
                    <!-- breadcrumb --->
                    <hr style="margin-top: -25px;">
                        <nav style="margin-top: -60px;" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="https://tripcargo.test/">Home</a></li>
                                <li class="breadcrumb-item"><a href="https://tripcargo.test/Produk_dan_Layanan">Layanan</a></li>
                                <li class="breadcrumb-item active" aria-current="">Reguler</li>
                            </ol>
                        </nav>
                    <hr style="margin-top: 1px;">
                    <!-- breadcrumb akhir--->
                    <div style="margin-top: -25px;" >
                        <p>
                        Service Reguler adalah layanan standar yang memiliki waktu dan biaya pengiriman yang biasa, bukan yang dipercepat atau khusus,
                        pengiriman standar service door to door dengan penyampaian kiriman berdasarkan zona daerah atau (tingkatan daerah).<br>
                        
                        Trip Cargo mengutamakan pengiriman barang atau distribusi paket ke seluruh wilayah Indonesia dengan 
                        jalur-jalur rutinnitas kami atau pengiriman barang ke daerah yang diprioritaskan dalam melayani pengiriman barang.<br> 
                        
                        Adapun dengan waktu penyampaian sesuai estimasi yang telah diberikan berdasarkan zona daerah.<br>
                        
                        Trip Cargo mengutamakan ketepatan waktu kirim untuk daerah tujuan yang jadi rutinitas kami, 
                        untuk pengiriman paket reguler, dengan layanan pengiriman via darat, laut dan udara.<br> 
                        
                        Adapun kirim barang dalam jumlah besar atau banyak, kami berikan dengan harga yang spesial atau diskon dengan harga yang murah atau negoisasi tarif.<br>
                        
                        Kelebihan dari kami Trip Cargo dalam pelayaan reguler bisa dengan service door to door, port to port atau door to port.<br>
                        
                        Barang yang dikirim dengan layanan reguler akan diproses sesuai dengan alur standar dan mungkin dikonsolidasikan dengan kiriman lain, bukan mendapatkan penanganan prioritas seperti layanan ekspres.<br>
                        
                        Dikirim langsung dengan kurir kami yang profesional serta didukung vendor penerus untuk beberapa daerah yang lebih jauh dari cakupan wilayah distribusi kami atau yang daerah tingkat dua.<br>
                        </p>
                        </div>
                    <hr style="margin-top: -10px;">
                    
                    <h2 style="text-align: center;">Berikut ini daftar tarif untuk service reguler Trip Cargo:</h2>
                    <p style="margin-top: -30px; text-align: center;">Trip Cargo bisa dijadikan referensi pillihan untuk kirim barang-barang dalam jumlah besar atau banyak dengan harga murah. </p>		       
                      
            </div>
        </div>
    </div>			    


 <!----Akhir--->
<style>
div.gallery { 
  border: 1px solid #ccc;
  border-radius: 10px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

div.gallery-noframe { 
  background-color: transparent;
}

div.gallery:hover {    
  border: 1px solid #777;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

div.gallery img {  
  width: 20%;
  height: auto;
}

div.gallery iframe {
  width: auto;
  height: auto;
  border-top-left-radius: 0px;
  border-top-right-radius: 0px;
}

div.desc {
  background-color: khaki;  
  padding: 15px;
  text-align: center;
  font-size: 3em;
  color: blue;
  position: relative;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
   
}
div.desc1 {
  background-color:#FFD700;  
  padding: 10px;
  text-align: center;
  text-align: center;
  font-size: 3em;
   column-count: 2;
  column-gap: 40px;
  column-rule-style: solid;
  column-rule-color: #ff0000;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}
div.pesan {
  background-color:#FFD700;  
  padding: 10px;
  color: #101E6F;
  text-align: center;
  font-size: 0.9em;
  font-weight: bold;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
}
div.desc2 { 
  color: #191970; 
  background-color:#F8F8FF;  
  padding: auto;
  text-align: center;
}
div.desc3 {
  background-color:#F8F8FF;  
  padding: auto;
  text-align: center;
}
div.desc4 {
  background-color:#ADD8E6;  
  padding: auto;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}
.tautan-dinonaktifkan {
        pointer-events: none;
    }

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
</style>

        <h3 align="center" style="margin-top: 30px; color: red"><b>Promo Tarif Reguler</b></h3>
        <div style="margin-top: -30px;">
        Manfaatkan promo tarif cargo super murah di Trip Cargo ke beberapa tujuan untuk area kota di Jawa, Bali, Sumatera, Sulawesi dan Kalimantan.
        <br>Promo terbatas segera konfimasi ke team marketing untuk mendapatkan tarif murah. 
        </div>
        
        <!---/Batas waktu promosi--->
        <div class="container" style="background-color: #EDEDED; padding:10px;">
                <h1 id="headline" style="color:black">Jangka waktu promosi</h1>
                <div id="countdown">
                    <h2 style="margin-top: -50px; color:black">
                    <div id="demo">    
                        <b><span id="days"></span> hari <span id="hours"> </span> jam <span id="minutes"> </span>:<span id="seconds"> </span></b>
                        </h2>
                        <!-- iklan tujuan Kota Bandung--->
                        <div class="responsive">
                        <div class="gallery">
                            <img src="https://bit.ly/4jAXI6E"></img>
                        <div class="desc3">
                        			<div style="height: auto; width: 100%;" class="fullwidthbanner-container roundedcorners">
                        				<!-- REVOLUTION SLIDER -->
                        				<div class="fullwidthbanner">
                        				<ul>
                        				<!-- SLIDE PETA 1  -->
                        					<li data-transition="fade" data-slotamount="10" data-masterspeed="500" data-delay="1000" aria-disabled="true" >
                        						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.60965077218!2d107.56075469698932!3d-6.903271951264765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1744171380305!5m2!1sid!2sid" class="tautan-dinonaktifkan" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        					</li>
                                        <!-- SLIDE PETA 2  -->
                        					<li data-transition="fade" data-slotamount="10" data-masterspeed="1001" data-delay="1500" >
                        						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126881.52584774737!2d106.8177975!3d-6.38784855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e95620a297d3%3A0x1cfd4042316fb217!2sKota%20Depok%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1744171187070!5m2!1sid!2sid" class="tautan-dinonaktifkan" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        					</li>
                        				</ul>
                        				</div>
                        				    
                        				<!-- /slideshow -->
                            				<div class="pull-center nav">
                                                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000"style=" padding: 0px 10px 0px 10px; font-family: monospace;">
                                            	    <div class="carousel-inner" role="listbox">
                                            			<div class="item active">
                                            			<b>DEPOK</b> &nbsp; <i style="color: RED; font-size: 1.2em;" class="fa fa-exchange" aria-hidden="true"></i> &nbsp;  <b>BANDUNG</b>
                                            			</div>
                                            			<div class="item "> 
                                            			<b>BANDUNG</b> &nbsp; <i style="color: RED; font-size: 1.2em;" class="fa fa-exchange" aria-hidden="true"></i> &nbsp;  <b>DEPOK</b>
                                            			</div>
                                            		</div>
                                            	</div>
                                            </div>
                                        </div>
                        		    </div>
                        		    
                        		    
                        <div class="desc4">Rp. <s>50.000</s> /Paket</div>
                        <div class="desc"> 40.000 </div>
                        <div class="desc3">
                            <b>ETD:</b> 1-3 Hari<br>
                            <b>Promo Murah</b><br>
                            <b>Service Door to door</b> <br>
                            <b>Maxsimal berat 10 Kg</b>
                        </div>
                        <div class="pesan">
                        <div class="container">
                            <a href="https://tripcargo.test/web/Tarif_Kargo_Hemat">
                            <b style="color: RED; font-size: 1em; font-weight: 900;">Kota Bandung</b>
                            </a>
                        </div>    
                    </div><!--demo-->
                </div> <!--countdown-->
        </div> <!--container-->
    
    
    
                        <!-- Iklan tujuan Bandar Lampung--->
                        <div class="responsive">
                        <div class="gallery">
                            <img src="https://png.pngtree.com/png-clipart/20230410/ourmid/pngtree-special-promo-png-image_6699279.png"></img>
                        <div class="desc3"> 
                                <!-- REVOLUTION SLIDER -->
                        			<div style="height: auto; width: 100%;" class="fullwidthbanner-container roundedcorners">
                        				<div class="fullwidthbanner">
                        					<ul>
                        						<!-- SLIDE  -->
                        						<li data-transition="fade" data-slotamount="10" data-masterspeed="500" data-delay="1000" >
                        							<!-- MAIN IMAGE -->
                        							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127101.59181477611!2d105.1850726251765!3d-5.428403066559952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40dbcabf21b51f%3A0xdcb06324bff3cb9e!2sKota%20Bandar%20Lampung%2C%20Lampung!5e0!3m2!1sid!2sid!4v1744172206202!5m2!1sid!2sid" class="tautan-dinonaktifkan" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                </li>
                                                <!-- SLIDE  -->
                        						<li data-transition="fade" data-slotamount="10" data-masterspeed="1000" data-delay="1500" >
                        							<!-- MAIN IMAGE -->
                        							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126881.52584774737!2d106.8177975!3d-6.38784855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e95620a297d3%3A0x1cfd4042316fb217!2sKota%20Depok%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1744171187070!5m2!1sid!2sid" class="tautan-dinonaktifkan" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        							
                        						</li>
                        					</ul>
                        					<div class="tp-bannertimer"></div>
                        				</div>
                        				<div>
                        				    <b>DEPOK</b> &nbsp; <i style="color: RED; font-size: 1.2em;" class="fa fa-exchange" aria-hidden="true"></i> &nbsp;  <b>LAMPUNG</b></div>
                                        </div>
                        			</div>
                        			<!-- /REVOLUTION SLIDER -->   
                                <div class="desc4">Rp. <s>100.000</s> /Paket</div>
                                <div class="desc"> 80.000 </div>
                                <div class="desc3">
                                    <b>ETD:</b> 1-3 Hari<br>
                                    <b>Promo Murah</b><br>
                                    <b>Service Door to door</b> <br>
                                    <b>Maxsimal berat 10 Kg</b>
                                </div>
                                    <div class="pesan">
                                        <a href="https://tripcargo.test/web/Tarif_Kargo_Hemat"> 
                                        <b style="color: RED; font-size: 1em; font-weight: 900;">Kota Bandar Lampung</b>
                                        </a>
                                    </div>
                        </div>
                        </div>
                        
                        
                        <!-- iklan Yogyakarta--->
                        <div class="responsive">
                          <div class="gallery">
                              <img src="https://bit.ly/4jAXI6E"></img>
                                <div class="desc3"> 
                                <!-- REVOLUTION SLIDER -->
                        			<div style="height: auto; width: 100%;" class="fullwidthbanner-container roundedcorners">
                        				<div class="fullwidthbanner">
                        					<ul>
                        						<!-- SLIDE  -->
                        						<li data-transition="fade" data-slotamount="10" data-masterspeed="500" data-delay="1000" >
                        							<!-- MAIN IMAGE -->
                        							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63245.97085681638!2d110.33355917431128!3d-7.80324844913624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5787bd5b6bc5%3A0x21723fd4d3684f71!2sYogyakarta%2C%20Kota%20Yogyakarta%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1745226738103!5m2!1sid!2sid" class="tautan-dinonaktifkan" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        					    </li>
                                                <!-- SLIDE  -->
                        						<li data-transition="fade" data-slotamount="10" data-masterspeed="1001" data-delay="1500" >
                        							<!-- MAIN IMAGE -->
                        							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126881.52584774737!2d106.8177975!3d-6.38784855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e95620a297d3%3A0x1cfd4042316fb217!2sKota%20Depok%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1744171187070!5m2!1sid!2sid" class="tautan-dinonaktifkan" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        						</li>
                        					</ul>
                        				</div>
                        				<!-- /slideshow -->
                        				<div class="pull-center nav">
                                        		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000"style=" padding: 0px 10px 0px 10px; font-family: monospace;">
                                        			<div class="carousel-inner" role="listbox">
                                        				<div class="item active">
                                        				<b>DEPOK</b> &nbsp; <i style="color: RED; font-size: 1.2em;" class="fa fa-exchange" aria-hidden="true"></i> &nbsp;  <b>YOGYAKARTA</b></div>
                                        				<div class="item "> 
                                        				<b>YOGYAKARTA</b> &nbsp; <i style="color: RED; font-size: 1.2em;" class="fa fa-exchange" aria-hidden="true"></i> &nbsp;  <b>DEPOK</b></div>
                                        			</div>
                                        		</div>
                                         </div>
                                    </div>
                        		</div>
                        			<!-- /REVOLUTION SLIDER -->   
                                <div class="desc4">Rp. <s>75.000</s> /Paket</div>
                                <div class="desc"> 50.000 </div>
                                <div class="desc3">
                                    <b>ETD:</b> 2-3 Hari<br>
                                    <b>Promo Murah</b><br>
                                    <b>Service Door to door</b> <br>
                                    <b>Maxsimal berat 10 Kg</b>
                                </div>
                                    <div class="pesan">
                                        <a href="https://tripcargo.test/web/Tarif_Kargo_Hemat"> 
                                        <b style="color: RED; font-size: 1em; font-weight: 900;">Kota Yogyakarta</b>
                                        </a>
                                    </div>
                            </div>
                        </div>
                        
                        
                        <!-- iklan Makassar--->
                        <div class="responsive">
                          <div class="gallery">
                              <img src="https://bit.ly/4jAXI6E"></img>
                                <div class="desc3"> 
                                <!-- REVOLUTION SLIDER -->
                        			<div style="height: auto; width: 100%;" class="fullwidthbanner-container roundedcorners">
                        				<div class="fullwidthbanner">
                        					<ul>
                        						<!-- SLIDE  -->
                        						<li data-transition="fade" data-slotamount="10" data-masterspeed="500" data-delay="1000" >
                        							<!-- MAIN IMAGE -->
                        							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31738.298559534807!2d106.8610670555748!3d-6.091943909229239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1f09ec0c58a7%3A0x2788cecfeed3bbc!2sTandjungperiuk!5e0!3m2!1sid!2sid!4v1745237704210!5m2!1sid!2sid" class="tautan-dinonaktifkan" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        					    </li>
                                                <!-- SLIDE  -->
                        						<li data-transition="fade" data-slotamount="10" data-masterspeed="1001" data-delay="1500" >
                        							<!-- MAIN IMAGE -->
                        							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127166.45507817011!2d119.3200535290318!3d-5.111484219777325!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee329d96c4671%3A0x3030bfbcaf770b0!2sMakassar%2C%20Kota%20Makassar%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1745237871786!5m2!1sid!2sid" class="tautan-dinonaktifkan" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        						</li>
                        					</ul>
                        				</div>
                        				<!-- /slideshow -->
                        				<div class="pull-center nav">
                                        		<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000"style=" padding: 0px 10px 0px 10px; font-family: monospace;">
                                        			<div class="carousel-inner" role="listbox">
                                        				<div class="item active">
                                        				<b>JAKARTA</b> &nbsp; <i style="color: RED; font-size: 1.2em;" class="fa fa-exchange" aria-hidden="true"></i> &nbsp;  <b>MAKASSAR</b></div>
                                        				<div class="item "> 
                                        				<b>MAKASSAR</b> &nbsp; <i style="color: RED; font-size: 1.2em;" class="fa fa-exchange" aria-hidden="true"></i> &nbsp;  <b>JAKARTA</b></div>
                                        			</div>
                                        		</div>
                                        </div>
                                    </div>
                        		</div>
                        			<!-- /REVOLUTION SLIDER -->   
                                <div class="desc4">Rp. <s>250.000</s> /kg</div>
                                <div class="desc"> 150.000 </div>
                                <div class="desc3">
                                    <b>ETD:</b> 6-8 Hari<br>
                                    <b>Promo Murah</b><br>
                                    <b>Service Door to door</b> <br>
                                    <b>Maxsimal berat 10 Kg</b>
                                </div>
                                    <div class="pesan">
                                        <a href="https://tripcargo.test/web/Tarif_Kargo_Hemat"> 
                                        <b style="color: RED; font-size: 1em; font-weight: 900;">Kota Makassar</b>
                                        </a>
                                    </div>
                            </div>
                        </div>
                 
               
            
<style>
.blink {
  animation: blink-animation 1s steps(2, start) infinite;
  -webkit-animation: blink-animation 1s steps(2, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
</style>




<div class="clearfix"></div>
<div style="padding:6px;">
  <p>Sering ada promo murah untuk area  Cirebon - Bandung - Semarang - Yogyakarta - Surabaya - Bali - Cilegon - Lampung - Palembang - Jambi - Pangkalpinang - Bengkulu - Padang - Pekanbaru - Batam - Medan - Aceh - Makassar - Pontianak - Balikpapan - Banjarmasin.<br>
  Terima kasih telah mempercayakan ke Trip Cargo dalam distribusi barang.</p>
</div>


	       <!-- REVOLUTION SLIDER -->
			<!---div class="fullwidthbanner-container roundedcorners"> 
				<div class="fullwidthbanner">
				<ul>
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1500">
							<div class="tp-caption finewide_large_transparan customin customout tp-resizeme"
								data-x="center" data-hoffset="0"
								data-y="center" data-voffset="-40"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="500"
								data-start="500"
								data-easing="Power3.easeInOut"
								data-splitin="chars"
								data-splitout="chars"
								data-elementdelay="0.08"
								data-endelementdelay="0.08"
								data-end="4000"
								data-endspeed="500"
								style="z-index: 0; max-width: auto; max-height: auto; white-space: nowrap;">
							<img src="https://1.bp.blogspot.com/-8VtCnqqbEdM/X5LcvZMkEdI/AAAAAAAAMko/sD-LMA9MZi0KL9LUiNB8lyrREx683vy-ACLcBGAsYHQ/s0/BG-DJB%2Bcopy.jpg" alt="" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                </div>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="60" data-hoffset="0"
								data-y="100" data-voffset="30"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="500"
								data-start="500"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.908"
								data-endelementdelay="0.08"
							    data-end="4000"
								data-endspeed="500"
								style="z-index: 1; max-width: auto; max-height: auto; white-space: nowrap;"><strong><img src='https://1.bp.blogspot.com/-SFVgVHxAdOg/X5zjakwg4PI/AAAAAAAAMrU/ulDRhxHq75Ut_Bhi3ZlLWKHSLO4DYh0TgCLcBGAsYHQ/s0/SERVICE-CARGO.png' width="Auto" height="254"/> </a></strong>
							</div>
							<div class="tp-caption sft large_bold_grey customin customout tp-resizeme"
								data-x="center" data-hoffset="0"
								data-y="center" data-voffset="-40"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="500"
								data-start="500"
								data-easing="Power3.easeInOut"
								data-splitin="chars"
								data-splitout="chars"
								data-elementdelay="0.08"
								data-endelementdelay="0.08"
								data-end="4000"
								data-endspeed="500"
								style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">PAKET REGULER
							</div>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="center" data-hoffset="0"
								data-y="center" data-voffset="30"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="500"
								data-start="500"
								data-easing="Power3.easeInOut"
								data-splitin="chars"
								data-splitout="chars"
								data-elementdelay="0.08"
								data-endelementdelay="0.08"
								data-end="4000"
								data-endspeed="500"
								style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;">DAPATKAN DISKON HINGGGA 10%
							</div>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="80" data-hoffset="0"
								data-y="0" data-voffset="30"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="800"
								data-start="5000"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.908"
								data-endelementdelay="0.08"
								data-endspeed="300"
								style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;"><strong><img src='https://2.bp.blogspot.com/-Qz0R7tK8CTU/XxMBEvx_MZI/AAAAAAAAKx4/wnDduE1HaeoFIk6khDA5fajSd8U06JyBwCLcBGAsYHQ/s320/20190709_123650.jpg' width="Auto" height="254"/> </a></strong>
							</div>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="80" data-hoffset="0"
								data-y="250" data-voffset="30"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="800"
								data-start="5000"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.908"
								data-endelementdelay="0.08"
							
								data-endspeed="300"
								style="z-index: 1; max-width: auto; max-height: auto; white-space: nowrap;"><strong><img src='https://4.bp.blogspot.com/-0esUSBXxhps/XxMBBhVAqzI/AAAAAAAAKxg/bMLBEXrgvj48BmrlpoFWuMbCKlBbOTRMQCLcBGAsYHQ/s1600/20190709_122455.jpg' width="Auto" height="254"/> </a></strong>
							</div>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="420" data-hoffset="0"
								data-y="0" data-voffset="30"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="800"
								data-start="5000"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.908"
								data-endelementdelay="0.08"
								data-endspeed="300"
								style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;"><strong><img src='https://3.bp.blogspot.com/-uf_cW2OVoWI/XxMBC2JAWeI/AAAAAAAAKxs/OUUkeNNEjVIFmvX5lOwUqezIN6a7uqHBQCLcBGAsYHQ/s1600/20190709_123242.jpg' width="Auto" height="254"/> </a></strong>
							</div>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="420" data-hoffset="0"
								data-y="245" data-voffset="30"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="800"
								data-start="5000"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.908"
								data-endelementdelay="0.08"
								data-endspeed="300"
								style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><strong><img src='https://4.bp.blogspot.com/-GG0mg4l8UeI/XxMBDf2FBQI/AAAAAAAAKxw/y3ohBtb1BVEXVJs6GGPOe8a64bOXXz7RQCLcBGAsYHQ/s320/20190709_123553.jpg' width="Auto" height="254"/> </a></strong>
							</div>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="760" data-hoffset="0"
								data-y="10" data-voffset="30"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="800"
								data-start="5000"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.908"
								data-endelementdelay="0.08"
								data-endspeed="300"
								style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"><strong><img src='https://3.bp.blogspot.com/-zOs67PCc1Rs/XxMBIIcC1GI/AAAAAAAAKyA/j2Fkcq9PthgcVbFzqvjvR-3t1OXgEChUwCLcBGAsYHQ/s320/20190914_100553.jpg' width="Auto" height="254"/> </a></strong>
							</div>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="760" data-hoffset="0"
								data-y="245" data-voffset="30"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="800"
								data-start="5000"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.908"
								data-endelementdelay="0.08"
							
								data-endspeed="300"
								style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;"><strong><img src='https://1.bp.blogspot.com/-Ym6kY0bAuOg/XxMBIrJnDUI/AAAAAAAAKyE/TlOzRHHIOz8BwMBJdvuaNS3riZxcMeXEwCLcBGAsYHQ/s320/20190914_100607.jpg" width="314">' width="Auto" height="254"/> </a></strong>
							</div>
							<div class="tp-caption sft large_bold_white customin customout tp-resizeme"
								data-x="center" data-hoffset="0"
								data-y="center" data-voffset="-40"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="500"
								data-start="5500"
								data-easing="Power3.easeInOut"
								data-splitin="chars"
								data-splitout="chars"
								data-elementdelay="0.08"
								data-endelementdelay="0.08"
								data-end="4000"
								data-endspeed="500"
								style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;"> MOVERS SERVISCE
							</div>
							<a target="_blank" href="https://tripcargo.test/web/movers">
							<div class="tp-caption sft modern_big_redbg" 
								data-x="450" 
								data-y="150" 
								data-speed="300" 
								data-start="5500" 
								style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;"
								data-easing="easeOutExpo">PINDAHAN KANTOR
							</div>
							</a>
							<div class="tp-caption whitedivider3px_vertical customin tp-resizeme"
								data-x="420"
								data-y="110" 
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="300"
								data-start="5500"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.1"
								data-endelementdelay="0.1"
								data-endspeed="300"
								style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">&nbsp;
							</div>
							<div class="tp-caption finewide_verysmall_white_mw customin customout tp-resizeme"
								data-x="460"
								data-y="300" 
								data-customin="x:0;y:50;z:0;rotationX:-120;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 0%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="900"
								data-start="8000"
								data-easing="Power3.easeInOut"
								data-splitin="lines"
								data-splitout="lines"
								data-elementdelay="0.2"
								data-endelementdelay="0.08"
								data-endspeed="300"
								style="z-index: 11; max-width: auto; max-height: auto; white-space: nowrap;">
							</div>
							<div class="tp-caption lft boxshadow" 
								data-x="70" 
								data-y="70" 
								data-speed="900" 
								data-start="5000" 
								data-easing="easeOutBack">
							</div>
						</li>
						
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1000" data-delay="5000" >
							<img src="https://1.bp.blogspot.com/-5QG3CjdBXOY/X5RNPgKb_HI/AAAAAAAAMmE/SG6Wwdzid8s6TGs1TKtnL-cWFdUyVesWwCLcBGAsYHQ/s0/BG-Forklif.jpg" alt="" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
							<a target="_blank" href="https://tripcargo.test">
							<div class="tp-caption sft large_bold_grey customin customout tp-resizeme"
								data-x="center" data-hoffset="0"
								data-y="center" data-voffset="-40"
								data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="500"
								data-start="500"
								data-easing="Power3.easeInOut"
								data-splitin="chars"
								data-splitout="chars"
								data-elementdelay="0.08"
								data-endelementdelay="0.08"
								data-end="4000"
								data-endspeed="500"
								style="z-index: 2; max-width: auto; max-height: auto; white-space: nowrap;">tripcargo.test
							</div>
                            </a>
							<div class="tp-caption lfb thinheadline_dark randomrotate customout tp-resizeme"
								data-x="center" data-hoffset="0"
								data-y="center" data-voffset="30"
								data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
								data-speed="500"
								data-start="500"
								data-easing="Power3.easeInOut"
								data-splitin="chars"
								data-splitout="chars"
								data-elementdelay="0.08"
								data-endelementdelay="0.08"
								data-end="4000"
								data-endspeed="500"
								style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;">Solution Handeling Logistic 
							</div>
						</li>
					</ul>
					<div class="tp-bannertimer"></div>
				</div>
			</div--->
	</table> 
                        
                        
                      </div>
                      </div>
</div>
			      <div align="center"></div>
		  </div>
					<div class="col-md-8" style='text-align:justify'>
					  <div class="col-md-12">
					    <div class='containersub'>
					      <div>
					        <div class='rkiri'>
          <div align="justify"></div>
          </div></div>

</div></div></div>
				</div>
				</div>
				  </div>
		
	<style type="text/css">
    p{
      color:black;
      font-family: 'Open Sans';
      line-height: 1.75em;
      font-size: 1.2em;;
    }
    
    
  </style>	

