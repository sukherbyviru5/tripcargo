<div class="input-group" >
<span id="loading"></span>
<span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i></span>
<select class="form-control" name="kab" id="kab">
	<option value="" selected="selected">Pilih Kabupaten
	</option>
	<?php 
		foreach($kab as $r){
		echo"<option value='".$r->kokab_id."'>".$r->kab."</option>\n";
	}
	?>
</select>
</div>

<script type="text/javascript">
	$("#kab").change(function(){
		$('#loading2').html("<img src='<?php echo base_url();?>assets/img/loading.gif' />");
		var loading = $("#loading2");
		var selectValues = $("#kab").val();
		if (selectValues == 0){
			var msg = "<option value=\"Pilih Kecamatan \">Pilih Kecamatan Dulu</option>";
			$('#ckecamatan').html(msg);
		}else{
			var kab = {kab:$("#kab").val()};
			// $('#kab').attr("disabled",true);
			$.ajax({
					type: "POST",
					url : "<?php echo site_url('cadmin/home/select_kec')?>",
					data: kab,
					beforeSend: function(){
					   // $("#loaderDiv").show();
					   loading.fadeIn();						
					},
					success: function(msg){
						$('#ckecamatan').html(msg);
						loading.fadeOut();
					}
			});
		}
	});
</script>