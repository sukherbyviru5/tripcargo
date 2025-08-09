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
			Berikut adalah hasil pencarian nomor resi: 
			<?php echo $resi; 
			if($record_resi->num_rows()>0){
			foreach($record_resi->result() as $k){
				echo"<div class='alert alert-success fade in'>
						<i class='fa-fw fa fa-check'></i>
						<strong>OK</strong> Resi : <strong>".$k->resi.' '.$this->app_model->find_status_paket($resi)."</strong> <br>
						</div>";
					
				echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%' font-weight: 'normal'>
					<thead>			                
						<tr>
							<th data-class='phone'>Pengirim:</th>
						</tr>
						<tr>
						    <th style='font-weight: normal' data-class='phone'></i>".$k->p_nama."<br>
					            ".$k->p_nama."<br>  
					            ". (substr($k->p_telp,0,-8))."XXXX".(substr($k->p_telp,-4))."<br>
					            ".$this->app_model->find_kokab(substr($k->p_kec_id,0,4))."<br> </th>
						</tr>
					</thead>
				<tbody>";
				
			    echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%' font-weight: 'normal'>
					<thead>			                
						<tr>
							<th data-class='phone'>Penerima:</th>
						</tr>
						<tr>
						    <th style='font-weight: normal' data-class='phone'></i>".$k->penerima."<br>
					            ".$k->dept2."<br> 
					            ". (substr($k->telp,0,4))."XXXX".(substr($k->telp,-4))."<br>
					            ".$this->app_model->find_kokab(substr($k->kec_id,0,4))."<br> </th>
						</tr>
					</thead>
				<tbody>";
				
				 echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%' font-weight: 'normal'>
					<thead>			                
						<tr>
							<th data-class='phone'>Koli</th>
							<th data-class='phone'>Berat</th>
							
						</tr>
						<tr>
							<th style='font-weight: normal' data-class='expand'></i>".number_format($k->koli,0)." Pcs</th>
							<th style='font-weight: normal' data-class='phone'></i>".number_format($k->berat,0)." Kg</th>
						</tr>
						</tr>
					</thead>
				<tbody>";
				
				echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%' font-weight: 'normal'>
					<thead>			                
						<tr>
							<th data-class='phone'>Keterangan Isi Barang:</th>
						</tr>
						<tr>
							<th style='font-weight: normal' data-class='expand'></i>".$k->deskripsi."</th>
						</tr>
						</tr>
					</thead>
				<tbody>";
				
				echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%' font-weight: 'normal'>
					<thead>			                
						<tr>
							<th data-class='phone'>Catatan tambahan:</th>
						</tr>
						<tr>
							<th style='font-weight: normal' data-class='expand'></i>".$k->catatan." </th>
						</tr>
						</tr>
					</thead>
				<tbody>";
				
			    echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%' font-weight: 'normal'>
					<thead>			                
						<tr>
							<th data-class='phone'>Ongkir</th>
							<th data-class='phone'>Packing</th>
							<th data-class='phone'>Asuransi</th>
							<th data-class='phone'>T. Biaya</th>
						</tr>
						<tr>
							<th style='font-weight: normal' data-class='phone'></i>Rp.".number_format($k->harga2,0)." </th>
							<th style='font-weight: normal' data-class='phone'></i>Rp.".number_format($k->harga5,0)." 
							<th style='font-weight: normal' data-class='phone'></i>Rp.".number_format($k->harga6,0)." </th>
							<th style='font-weight: normal' data-class='phone'></i>Rp.".number_format($k->totalbayar,0)." </th>
						</tr>
						</tr>
					</thead>
				<tbody>"; 
				
				echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%' font-weight: 'normal'>
					<thead>			                
						<tr>
							<th data-class='phone'>Pembayaran:</th>
							
						</tr>
						<tr>
							<th style='font-weight: normal' data-class='phone'></i>".$k->metode."</th>
						</tr>
						</tr>
					</thead>
				<tbody>";	
					
				//informasi tracking
				
				$this->db->select('*');
				$this->db->from('lacak');
				$this->db->LIKE('resi',$resi);
				$this->db->order_by('tgl','ASC');
				$query = $this->db->get();
				
				foreach($query->result() as $r){
					
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