		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php echo base_url();?>assets/js/plugin/pace/pace.min.js"></script>

		<!-- These scripts will be located in Header So we can add scripts inside body (used in class.datatables.php) -->
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local 
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script>
			if (!window.jQuery) {
				document.write('<script src="<?php echo base_url();?>assets/js/libs/jquery-2.0.2.min.js"><\/script>');
			}
		</script>

		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script>
			if (!window.jQuery.ui) {
				document.write('<script src="<?php echo base_url();?>assets/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
			}
		</script> -->

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?php echo base_url();?>assets/js/app.config.js"></script>

		
		<!-- JQUERY VALIDATE -->
		<script src="<?php echo base_url();?>assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?php echo base_url();?>assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		
		<!--[if IE 8]>
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
		<![endif]-->

		<!-- Demo purpose only -->
		<script src="<?php echo base_url();?>assets/js/demo.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?php echo base_url();?>assets/js/app.min.js"></script>		

	
		<!-- PAGE RELATED PLUGIN(S) -->
		<script src="<?php echo base_url();?>assets/js/plugin/jquery-form/jquery-form.min.js"></script>

		<script type="text/javascript">
			// DO NOT REMOVE : GLOBAL FUNCTIONS!
			$(document).ready(function() {
				pageSetUp();
			})
		</script>
		