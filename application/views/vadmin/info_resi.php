<?php 
	if($paket->num_rows()>0){
			foreach($paket->result() as $k){
				echo"<div class='alert alert-success fade in'>
						<button class='close' data-dismiss='alert'>×</button>
						<i class='fa-fw fa fa-check'></i>
						<strong>Success</strong> Resi : ".$k->resi."<br/>
						Tujuan : ".$k->penerima."<br/>
						Alamat : ".$k->alamat."
						Kecamatan ".$this->app_model->find_kec($k->kec_id)." ".$this->app_model->find_kokab(substr($k->kec_id,0,4)).", ".$this->app_model->find_prov(substr($k->kec_id,0,2))."
						<hr/>
						Selanjutnya silahkan klik update posisi kargo
					</div>";
			}
		}else{
			echo "<div class='alert alert-danger fade in'>
				<button class='close' data-dismiss='alert'>
					×
				</button>
				<i class='fa-fw fa fa-times'></i>
				<strong>Error!</strong> Nomor Resi tidak ditemukan.
			</div>";
		}
	
?>