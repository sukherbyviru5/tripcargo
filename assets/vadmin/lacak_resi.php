<?php 
	if($paket->num_rows()>0){
			foreach($paket->result() as $k){
			    
			    
			echo"<div class='alert alert-success fade in'>
						<button class='close' data-dismiss='alert'></button>
						<i class='fa-fw fa fa-check'></i>
						 Status : <strong>".$this->app_model->find_status_paket($k->resi)."</strong><br/>
						</div>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
                    
						RESI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
						<strong>".$k->resi."</strong><br/>
						Pengirim&nbsp;&nbsp;: 
						".$this->app_model->find_dept($k->pel_id).'</br>    
						Dari&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
						'     .$this->app_model->find_pel($k->pel_id)."</br>";
						$pkec=$this->app_model->find_kec_pel($k->pel_id);
					echo "
					    Asal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
					    ".$this->app_model->find_kokab(substr($pkec,0,4))." <br/>";
					//Telp. ".substr($this->app_model->find_telp_pel($k->pel_id),0,4)."-xxxx-".substr($this->app_model->find_telp_pel($k->pel_id),8,13)."
					
					
					
					echo"<hr/>
						Penerima &nbsp;: ".$k->penerima."<br/>
						Tujuan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: ".$this->app_model->find_kec($k->kec_id)." , ".$this->app_model->find_kokab(substr($k->kec_id,0,4)).", ".$this->app_model->find_prov(substr($k->kec_id,0,2))."<br/>";
						//Telp. ".substr($k->telp,0,4)."-xxxx-".substr($k->telp,8,13)."<br/>
						
						if($k->diterima!=""){
							echo" Diterima &nbsp;&nbsp;&nbsp;: ".$this->app_model->tgl_str($k->diterima) ;
							
							
						}else{
							echo"";
						}
						
						
						
				echo"</div>";
				//informasi tracking
				$resi = $this->input->post('resi');
				$this->db->select('*');
				$this->db->from('lacak');
				$this->db->LIKE('resi',$resi);
				$this->db->order_by('tgl','ASC');
				$query = $this->db->get();
				echo"<hr/>";
				echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%'>
					<thead>			                
						<tr>
							<th  style='display:none' data-hide='phone' style='width:30px;'>No</th>
							<th data-class='expand'><i class='fa fa-calendar text-muted hidden-md hidden-sm hidden-xs'></i> Tanggal</th>
							<th data-class='phone'><i class='fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs'></i> Posisi</th>
							<th data-class='phone'><i class='fa fa-fw fa-comments text-muted hidden-md hidden-sm hidden-xs'></i> Keterangan</th>
						</tr>
					</thead>
				<tbody>";
				$no=1;
				foreach($query->result() as $r){
					echo"<tr>
							<td style='display:none'>".$no."</td>
							<td>".$r->tgl."</td>
							<td>".$this->app_model->find_kec($r->kec_id)." , ".$this->app_model->find_kokab(substr($r->kec_id,0,4))."</td>
							<td>".substr($r->ket,4,20)."<br/>";
							if(substr($r->ket,4,20)=="Delivered")
			echo "".$r->diterima."  </td>
						</tr>";
					$no++;
				}
			echo"<tbody>
			</table>";
				
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