<!-- WRAPPER -->
<div id="wrapper">
	
	<br/>
	<br/>
	<!-- WELCOME -->
	<section class="container">
		

		<!-- row -->
		<div class="row">
	
			<!-- NEW WIDGET START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
	
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
					<div class='MobileOnly'>
					
					</div>

	
					<!-- widget div-->
					<div>
	
						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
	
						</div>
						<!-- end widget edit box -->
	
						<!-- widget content -->
						<div class="widget-body">
							<?php 
							
						        $resi = $_GET['k'];
						        $this->db->select('*');
						        $this->db->from('paket');
						        $this->db->where('resi',$resi);
						        $this->db->order_by('resi','ASC');
						        $paket = $this->db->get();
						    	
						    	if($paket->num_rows()>0){
			foreach($paket->result() as $k){
			    echo"<div class='alert alert-success fade in'background-color: #f9f9f9; border-left: #f9f9f9 3px solid;}>
						<i class='fa-fw fa fa-check'></i>
						Status :<strong background-color: #f9f9f9; border-left: #f9f9f9 3px solid;> ".$this->app_model->find_status_paket($k->resi)."</strong>";
						if($k->diterima!="</div>")
				echo"</div>";
				
				//informasi tracking
				$this->db->select('*');
				$this->db->from('lacak');
				$this->db->LIKE('resi',$resi);
				$this->db->order_by('tgl','ASC');
				$query = $this->db->get();
				echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%'>
					<thead>			                
						<tr>
							<th data-class='expand'><i class='fa fa fa-qrcode text-muted hidden-md hidden-sm hidden-xs'></i>  Resi</th>
							<td> <strong> ".$k->resi." </strong> <br/> ".$k->layan."</td>
						</tr>
						<tr>
							<th data-class='expand'><i class='fa fa-calendar-check-o text-muted hidden-md hidden-sm hidden-xs'></i> Input</th>
							<td>".date('d-m-Y H:i:s', strtotime($k->tglkirim))."</td>
						</tr>
						<tr>
							<th data-class='expand'><i class='fa fa-cubes text-muted hidden-md hidden-sm hidden-xs'></i> Koli</th>
							<td>".$k->koli." Pcs</td>
						</tr>
						<tr>
							<th data-class='expand'><i class='fa fa-tachometer text-muted hidden-md hidden-sm hidden-xs'></i> Berat</th>
							<td>".$k->berat." Kg</td>
						</tr>
						<!--tr>
							<!--th data-class='expand'><i class='fa fa-cube text-muted hidden-md hidden-sm hidden-xs'></i> Ukuran</th-->
							<!--td>".$k->p." x ".$k->l." x ".$k->t." (cm)</td-->
						</tr-->
						<tr>
							<th data-class='expand'><i class='fa fa-commenting text-muted hidden-md hidden-sm hidden-xs'></i> Isi</th>
							<td>".$k->deskripsi."</td>
						</tr>
						<tr>
							<th data-class='expand'><i class='fa fa-tag text-muted hidden-md hidden-sm hidden-xs'></i> Catatan</th>
							<td>".$k->catatan."</td>
						</tr>
						<tr>
							<th data-class='expand'><i class='fa fa-user-circle text-muted hidden-md hidden-sm hidden-xs'></i> Penerima</th>
							<td>".$k->penerima." <br> ".$k->dept2." <br> ".substr($k->telp,0,4). "  XXX  " .substr($k->telp,8,13)."</td>
						</tr>
						<tr>
							<th data-class='expand'><i class='fa fa-map text-muted hidden-md hidden-sm hidden-xs'></i> Alamat tujuan</th>
							<td>".$k->alamat." </td>
						</tr>
						<tr>
							<th data-class='expand'><i class='fa fa-map text-muted hidden-md hidden-sm hidden-xs'></i> Kota Tujuan</th>
							<td>".$pkec=$this->app_model->find_kokab(substr($k->kec_id,0,4))."
						</tr>
					</thead>
					
				<tbody>";
				$no=1;
				foreach($query->result() as $r){
					echo"<tr> 
						
						
							
						</tr>";
					$no++;
				}
			echo"<tbody>
			<thead>			                
						<tr>
						
						</tr>
					</thead>
				<tbody>";
				$no=1;
				foreach($query->result() as $r){
					echo"<tr> 
							
						</tr>";
					$no++;
				}
			echo"<tbody>
			<thead>			                
						<tr>
						
						</tr>
					</thead>
				<tbody>";
				$no=1;
				foreach($query->result() as $r){
					echo"<tr> 
						
						</tr>";
					$no++;
				}
			echo"<tbody>
			</table>";
							echo"<table id='dt_basic' class='table table-striped table-bordered table-hover' width='100%'>
					<thead>			                
						<tr>
						
							
						</tr>
					</thead>
				<tbody>";
				$no=1;
				foreach($query->result() as $r){
					echo"<tr> 
						
						
						</tr>";
					$no++;
				}
			echo"<tbody>
			<thead>			                
					
					</thead>
				<tbody>";
				$no=1;
				foreach($query->result() as $r){
					echo"<tr> 
						
						</tr>";
					$no++;
				}
			echo"<tbody>
			<thead>			                
						<tr>
						
							<th data-class='expand'><i class='fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs'></i> Tanggal</th>
							<th data-class='phone'><i class='fa fa-fw fa-map-o text-muted hidden-md hidden-sm hidden-xs'></i> Posisi</th>
							<th data-class='phone'><i class='fa fa-fw fa-comments text-muted hidden-md hidden-sm hidden-xs'></i> Keterangan</th>
						</tr>
					</thead>
				<tbody>";
				
				
				
				$no=1;
				foreach($query->result() as $r){
					echo"<tr> 
							<td>".date('d-m-Y H:i:s', strtotime($r->tgl))."</td>
							<td> ".$this->app_model->find_kokab(substr($r->kec_id,0,4))."</td>
							<td>".substr($r->ket,4,20)."<br/>";
							if(substr($r->ket,4,20)=="Delivered")
								echo "".$r->diterima." </td>
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
				<strong>Error!</strong> Pencarian tidak ditemukan.
			</div>";
		}
							?>
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
		



	
</div>
<!-- /WRAPPER -->
					<style>
					     @media (max-width: 479px) {
					      header#topHead,
					      header#topNav.topHead,
					      #header_shadow,
					      .divider,
					      h1,
					      body.boxed footer
					      {display:none;height:0;background:none;}  
					      .container,body.boxed #wrapper{margin-top:-110px;background:#cc3d3d!important;}
					      body.boxed header{display:none;}
					      .alert.alert-success{line-height:140%;color:#333;background:#f2f2f2;border:none!important;font-size:1.2em;}
					     }
					    
					</style>