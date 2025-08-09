<!-- RIBBON -->
<div id="ribbon">
	<ol class="breadcrumb">
		<li>Home</li><li>Pencarian</li>
	</ol>
</div>	
<div id="content">

	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-12">
			<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-search"></i> Cari <span>/ Hasil</span></h1>
			Berikut adalah hasil pencarian nomor resi
			<?php echo $resi;
			if($record_resi->num_rows()>0){
			foreach($record_resi->result() as $k){
				echo"<div class='alert alert-success fade in'>
						<button class='close' data-dismiss='alert'>×</button>
						<i class='fa-fw fa fa-check'></i>
						<strong>OK</strong> Resi : <strong>".$k->resi.$this->app_model->find_status_paket($resi)."</strong><br/>
						Tujuan : Tn/Nn. ".$k->penerima."<br/>
						Alamat : ".$k->alamat."
						Kecamatan ".$this->app_model->find_kec($k->kec_id)." ".$this->app_model->find_kokab(substr($k->kec_id,0,4)).", ".$this->app_model->find_prov(substr($k->kec_id,0,2))." Telp. ".$k->telp."<br/>
						Status : ".$this->app_model->find_status_paket($resi)."
					</div>";
				//informasi tracking
				
				$this->db->select('*');
				$this->db->from('lacak');
				$this->db->LIKE('resi',$resi);
				$this->db->order_by('tgl','ASC');
				$query = $this->db->get();
				echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%'>
					<thead>			                
						<tr>
							<th data-hide='phone' style='width:30px;'>No</th>
							<th data-class='expand'><i class='fa fa-fw fa-date text-muted hidden-md hidden-sm hidden-xs'></i>Tanggal</th>
							<th data-class='phone'><i class='fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs'></i>Posisi</th>
							<th data-class='phone'><i class='fa fa-fw fa-comments text-muted hidden-md hidden-sm hidden-xs'></i>Keterangan</th>
						</tr>
					</thead>
				<tbody>";
				$no=1;
				foreach($query->result() as $r){
					echo"<tr>
							<td>".$no."</td>
							<td>".$r->tgl."</td>
							<td>".$this->app_model->find_kec($r->kec_id)." ".$this->app_model->find_kokab(substr($r->kec_id,0,4)).", ".$this->app_model->find_prov(substr($r->kec_id,0,2))."</td>
							<td>".$r->ket."</td>
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
		</div>
	</div>
	
</div>