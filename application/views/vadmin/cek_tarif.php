<?php 
	$vol=$p*$l*$t/4000;
	if($paket->num_rows()>0){
			
				echo"<div class='alert alert-light  fade in'>
					    
						<table class='table table-sm'>
							<thead>
							<tr>
								<th>Layanan</th>
								<th>Tarif / kg</th>
								<th style='display: none;'>Harga</th>
								<th>Waktu</th>
							</tr>
							</thead>";
				$harga=0;
				foreach($paket->result() as $k){			
							
						echo"<tbody ><tr>
								<td>".$k->layanan."</td>
								<td align='left'>".number_format($k->harga,0)."</td> 
								
							    <td align='left' style='display: none; width:0'>";
								if($vol>=$berat){
									if($k->layanan=="Motor &lt; " or $k->layanan =="Motor Besar"){
										echo number_format($k->harga,0);
										$harga=$k->harga;
										
									}else{
										echo number_format($k->harga*$vol,0);
										$harga=$k->harga*$vol;
									}
								}else{
									if($k->layanan=="Motor &lt;" or $k->layanan =="Motor Besar"){
										echo number_format($k->harga,0);
										$harga=$k->harga;
									}else{
										echo number_format($k->harga*$berat,0);
										$harga=$k->harga*$berat;
									}
								}
							echo"</td>
							
								<td>".$k->estimasi."</td>";
						//-- echo"<td>";
						//-- echo'<div class="text-left" >
						//--	</div>';
						     echo"</td> 
							</tr></tbody>";
					}
					echo"	</table> 
					</div>";
		}else{
		     echo"	<br> 
					</br>";
			echo "<div class='alert alert-danger fade in'>
				<!--button class='close' data-dismiss='alert'>
				×
				</button-->
				<i class='fa-fw fa fa-times'></i>
			<strong>Error!</strong>, Tarif tidak ditemukan.
			</div>";
		}
	
?>
<!---<br><br><br><br>--->
<!-- Button trigger modal -->
<!--button type="button" class="btn btn-primary-centered" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: -90px;">
  <em>*Syarat dan ketentuan</em>
</button>

<!-- Modal -->
<!--div class="modal fade" id="exampleModalCenter" tabindex="2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header" style=" background-color: #cc3d3d;"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="exampleModalLongTitle">Syarat dan ketentuan pengiriman barang</h4>
      </div>
      <div class="modal-body">
		* Service <b>Priority</b> (Deliver Faster)<br>
		* Service <b>Reguler</b> (via udara, darat &amp; laut)<br>
		* Service <b>Cargo</b> (via darat &amp; laut)<br>
		* Estimasi Waktu Kirim (<b>ETD</b>)<br>
		* Packing standar SOP (Darat, Laut &amp; Udara)<br>
		* Asuransikan barang anda untuk menghindari kerugian besar<br>
		* Berat Service Priority &ge; 90 kg (SMU)<br> 
		* Berat lebih dari 150 kg ada biaya sewa alat<br>
		* Belum termasuk harga PPN dan Asuransi<br>
		* Pengiriman (door to door) &amp; (port to port)<br>
		* Harga belum termasuk biaya packing<br> 
		* Penghitungan volume barang untuk layanan cargo (Trucking) adalah P x L x T / 4000<br>
		* Pengiriman ke daerah tingkat dua ada penambahan biaya<br>
		* Konfirmasi bila Panjang lebih dari 5 Mtr<br>
		* Daftar tarif dapat berubah sewaktu-waktu<br>
		* Alamat (pengirim / penerima) harus jelas<br>
      </div>
    </div>
  </div>
</div>
</br--->