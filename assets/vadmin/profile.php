	<!-- MAIN CONTENT -->
	<div id="content">
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
				<h1 class="page-title txt-color-blueDark">
					
					<!-- PAGE HEADER -->
					<i class="fa-fw fa fa-user fa-lg"></i> 
					<span>  
						<?php foreach($record as $c){$hasil[]=$c;}?>
						<header>
						<h2><?php echo $c->namalengkap;?></h2>				
						</header>
						<!-- widget div-->
					</span>
				</h1>
			</div>
			
		</div>

		

		<!-- widget grid -->
		<section id="widget-grid" class="">


			<!-- START ROW -->

			<div class="row">

				<!-- NEW COL START -->
				<article class="col-sm-12 col-md-12 col-lg-4">
					
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
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
						
						<?php foreach($record as $c){$hasil[]=$c;}?>
						<header>
							<span class="widget-icon"> <i class="fa fa-edit"></i></span>
						</header>

						<!-- widget div-->
						<div>
							
							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->
								
							</div>
							<!-- end widget edit box -->
							
							<!-- widget content -->
							<div class="widget-body no-padding">
								
								<div id="demo-form2" class="form-horizontal" >
									
									<fieldset>
										
										<div class="x_content">
											<legend style="padding-left:10px;"> Foto Pengguna</legend>
											<div class="form-group">
												<center>
													<?php
													$foto=$c->foto;
													if($foto=="" || $foto=="-"){
														echo "<img src='".base_url()."assets/images/avatar_2x.png' width='165px'  class='img-circle img-responsive'>";
													}else{
														echo "<img src='".base_url()."assets/upload/".$c->foto."' width='165px'  class='img-circle img-responsive'>";
													}
													?>
												</div>
													</center>	
											  <?php echo form_open_multipart('cadmin/home/upload_add') ?>
											  <input type="hidden" name="user_id" value="<?php echo $c->user_id;?>">
											  
												<!-- image-preview-filename input [CUT FROM HERE]-->
												<div class="input-group image-preview">
													<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
													<span class="input-group-btn">
														<!-- image-preview-clear button -->
														<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
															<span class="glyphicon glyphicon-remove"></span> Clear
														</button>
														<!-- image-preview-input -->
														<div class="btn btn-default image-preview-input">
															<span class="glyphicon glyphicon-folder-open"></span>
															<span class="image-preview-input-title">Browse</span>
															<input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
														</div>
														
														<button name="upload" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-upload"></span> Upload</button>
													</span>
												</div><!-- /input-group image-preview [TO HERE]--> 
											  
								  
											 
												</form>
											
										</div>
										
									</fieldset>

										
								</div>

							</div>
							<!-- end widget content -->
							
						</div>
						<!-- end widget div -->
						
					</div>
					<!-- end widget -->
					
						

					

				</article>
				<!-- END COL -->

				<!-- NEW COL START -->
				<article class="col-sm-12 col-md-12 col-lg-8">
					
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
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
							<h2>Detail Profile Pengguna </h2>				
							
						</header>

						<!-- widget div-->
						<div>
							
							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->
								
							</div>
							<!-- end widget edit box -->
							
							<!-- widget content -->
							<div class="widget-body ">
								<div class="widget-body">
	
						
						<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<form id="smart-form-register" class="smart-form">
									<header>
										Profile Pengguna
									</header>

									<fieldset>
										<div class="x_content">
										<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th colspan='2'>PROFILE AKUN</th>
												   
												</tr>
											</thead>
											<?php foreach($record  as $row){?>
											<tbody>
												<tr data-hide="phone"class="odd gradeX">
													<td width="40%">Nama Lengkap</td>
													<td><?php echo $row->namalengkap;?></td>                                      
												</tr>
												<tr data-class="phone"class="even gradeC">
													<td>Username</td>
													<td><?php echo $row->user_id;?></td>                                      
												</tr>
												<tr data-class="phone" class="even gradeC">
													<td>Password</td>
													<td><?php echo "<i>encrypted</i>";?></td>                                      
												</tr>
												<tr data-hide="phone"class="even gradeC">
													<td>Level</td>
													<td><?php echo $row->level;?></td>                                      
												</tr>
												<tr data-hide="phone"class="even gradeC">
													<td>Area</td>
													<td><?php echo $row->area;?></td>                                      
												</tr>
												<tr data-class="phone" class="even gradeC">
													<td>Kecamatan</td>
													<td><?php echo $row->kec_id;?></td>                                 
												</tr>
												<?php
												$level=$this->session->userdata('level');
												if($level=="mhs")
												
												{
													echo"<tr>
															<td>NIM / NIDN</td>
															<td>".$row->nim."</td>
														</tr>";
												}
												?></div>
											</tbody>
											<?php }?>
										</table>
										<?php 
										$level = $this->session->userdata('level');
										if($level=="mhs")
										{
										?>
										<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th colspan='2'>IDENTITAS <?php echo strtoupper($level);?></th>
												   
												</tr>
											</thead>
											<tbody>
												<?php foreach($mhs  as $rm){
												echo"<tr>
														<td width='40%'>NIM </td>
														<td>".$rm->nim." </td>
													</tr>";	
												echo"<tr>
														<td>Nama Mahasiswa </td>
														<td>".$rm->nama." </td>
													</tr>";
												echo"<tr>
														<td>Jenis Kelamin </td>
														<td>".$this->app_model->jk($rm->jk)." </td>
													</tr>";
												echo"<tr>
														<td>Tempat Tgl Lahir </td>
														<td>".$rm->tlahir.', '.$this->app_model->tgl_str($rm->tgllahir)." </td>
													</tr>";
												echo"<tr>
														<td>Jurusan/Prodi </td>
														<td>".$rm->jurusan." </td>
													</tr>";
												echo"<tr>
														<td>Alamat </td>
														<td>".$rm->alamat." </td>
													</tr>";
												echo"<tr>
														<td>Telpn/HP </td>
														<td>".$rm->telp." </td>
													</tr>";
												}
												?>
											</tbody>
										</table>
										<?php }elseif($level=="dosen")
										{
										?>
										<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
											<thead>
												<tr>
													<th colspan='2'>IDENTITAS <?php echo strtoupper($level);?></th>
												   
												</tr>
											</thead>
											<tbody>
												<?php foreach($mhs  as $rm){
												echo"<tr>
														<td width='40%'>NIM </td>
														<td>".$rm->nidn." </td>
													</tr>";	
												echo"<tr>
														<td>Nama Mahasiswa </td>
														<td>".$rm->nama." </td>
													</tr>";
												echo"<tr>
														<td>Jenis Kelamin </td>
														<td>".$this->app_model->jk($rm->jk)." </td>
													</tr>";
												echo"<tr>
														<td>Jurusan/Prodi </td>
														<td>".$rm->jabatan." </td>
													</tr>";
												echo"<tr>
														<td>Tempat Tgl Lahir </td>
														<td>".$rm->tlahir.', '.$this->app_model->tgl_str($rm->tgllahir)." </td>
													</tr>";
												echo"<tr>
														<td>Alamat </td>
														<td>".$rm->alamat." </td>
													</tr>";
												
												}
												?>
											</tbody>
										</table>
										<?php }?>
									</div>
                
									</fieldset>
									
								</form>						
								
							</div>
							<!-- end widget content -->
							
						</div>
						<!-- end widget div -->
						
					</div>
					<!-- end widget -->
					
					


				</article>
				<!-- END COL -->		

			</div>

			<!-- END ROW -->

		</section>
		<!-- end widget grid -->


		
	</div>
	<!-- END MAIN CONTENT -->
	  
<style>
	.image-preview-input {
    position: relative;
	overflow: hidden;
	margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
	</style>
<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo base_url().'assets'; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>

<script type="text/javascript">
	$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>