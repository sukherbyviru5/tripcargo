<?php 
	$vol=$p*$l*$t/4000;
	if($paket->num_rows()>0){
			
				echo"<div class='alert alert-light  fade in'>
					    
						<table class='table table-sm'>
							<thead>
							<tr>
								<th>Layanan</th>
								<th>Tarif</th>
								<th style='display: none; width:0'>Harga</th>
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
							echo"<td>";
							echo'<div class="text-left" >
									</div>';
							echo"</td>
							</tr></tbody>";
					}
					echo"	</table> 
					</div>";
					
			
		}else{
			echo "<div class='alert alert-danger fade in'>
				<button class='close' data-dismiss='alert'>
					×
				</button>
				<i class='fa-fw fa fa-times'></i>
				<strong>Error!</strong>, Tarif tidak ditemukan.
			</div>";
		}
	
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary-centered" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: -90px;">
  <em>*Syarat dan ketentuan</em>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="2" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLongTitle">Syarat dan ketentuan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        * Promo Harga pada waktu-waktu tertentu<br>
		* Cargo 100 kg (minimal berat 100 kg)<br>
		* Cargo 50 kg (minimal berat 50 kg)<br>
		* Cargo 30 kg (minimal berat 30 kg)<br>
		* Cargo 10 kg (minimal berat 10 kg)<br>
		* Cargo (Berat per kilo)<br>
	    * ETD (Waktu) dari Kapal berangkat<br>
		* Priority (paket langsung berangkat)<br>
		* Priority ( via Udara / Darat)<br> 
		* Priority (Standar Udara)<br>
		* Berat Priority (max 1000 kg)<br> 
		* Kemasan Priority standar cargo udara<br>
		* Reguler standar cargo udara<br>
		* Untuk barang panjang lebih dari 5 Meter<br>
		  mohon di infokan terlebih dahulu<br>
	
      </div>
     
    </div>
  </div>
</div>