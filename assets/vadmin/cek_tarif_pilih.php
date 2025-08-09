<?php 
	//$vol=$p*$l*$t/4000;
	if($paket->num_rows()>0){
		        
				echo"
						<table class='table table-striped align='center''>
							<thead>
							<tr>
								<th>Layanan</th>
								<th>Tarif/Kg</th>
								<th>Ongkir</th>
							
								<th>Pilih</th>
							</tr></thead>";
				$harga=0;
				foreach($paket->result() as $k){			
							
						echo"<tbody><tr>
								<td>".$k->layanan."</td>
								<td align='center'>".number_format($k->harga,0)."</td>
							<td align='center'>";
								if($vol>=$berat){
									if($k->layanan=="Motor &lt; 150 cc" or $k->layanan =="Motor 150-250 cc"){
										echo number_format($k->harga,0);
										$harga=$k->harga;
									}else{
										echo number_format($k->harga*$vol,0);
										$harga=$k->harga*$vol;
									}
								}else{
									if($k->layanan=="Motor &lt; 150 cc" or $k->layanan =="Motor 150-250 cc"){
										echo number_format($k->harga,0);
										$harga=$k->harga;
									}else{
										echo number_format($k->harga*$berat,0);
										$harga=$k->harga*$berat;
									}
								}
							echo"</td>";
							
							echo"<td>";
							echo'<div class="text-center">
									<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Pilih tarif" onclick="pilih_tarif('."'".$harga."'".')"><i class="glyphicon glyphicon-check"></i></a></div>';
							echo"</td>
							</tr></tbody>";
					}
					echo"	</table>
					<i class='fa fa-warning'></i> - Cargo (Minimum Berat 30kg) <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Reguler (Minimum Berat 1 kg)
					";
			
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