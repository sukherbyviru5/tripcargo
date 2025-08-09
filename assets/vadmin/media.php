<?php
//initilize the page
// $this->load->view("lib/class-smartui-nav");

//require UI configuration (nav, ribbon, etc.)
// $this->load->view("inc/config");

/*---------------- PHP Custom Scripts ---------

YOU CAN SET CONFIGURATION VARIABLES HERE BEFORE IT GOES TO NAV, RIBBON, ETC.
E.G. $page_title = "Custom Title" */

$page_title = "Blank";

/* ---------------- END PHP Custom Scripts ------------- */

//include header
//you can add your custom css in $page_css array.
//Note: all css files are inside css/ folder
$page_css[] = "your_style.css";
$this->load->view("inc/header.php");

//include left panel (navigation)
//follow the tree in inc/config.ui.php
$page_nav["forms"]["sub"]["smart_layout"]["active"] = true;
$this->load->view("inc/nav.php");

?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		// $this->load->view("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<?php 
		echo $isi;
	?>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- ==========================CONTENT ENDS HERE ========================== -->
<!--- chat
<script type="text/javascript">function add_chatinline(){var hccid=54309616;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script> -->

<!-- PAGE FOOTER -->
<?php
	$this->load->view("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php 
	//include required scripts
	$this->load->view("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->


<?php 
	//include footer
	$this->load->view("inc/google-analytics.php"); 
?>