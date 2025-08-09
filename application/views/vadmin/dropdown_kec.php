<div class="input-group" >
<span id="loading2"></span>
<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
<select class="form-control" name="kec" id="kec">
	<option value="" selected="selected">Pilih Kecamatan
	</option>
	<?php 
		foreach($kec as $r){
			echo"<option value='".$r->kec_id."'>".$r->kec."</option>\n";
		}
	?>
</select>
</div>
