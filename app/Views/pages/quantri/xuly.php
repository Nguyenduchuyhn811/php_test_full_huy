<?php 
	session_start();

	include_once('function.php');
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$function = $_POST['datafn']; 
	if(!empty($function)) {
		if($function =='updateDiscount'){ 
			updateDiscount($_POST);
		}else if ($function =='updateStatusProductList') {
			updateStatusProductList($_POST);
		}else if ($function =='updateStatusProduct') {
			updateStatusProduct($_POST);
		}else if ($function =='updateStatusNews') {
			updateStatusNews($_POST);
		}else if ($function =='updateStatusVideo') {
			updateStatusVideo($_POST);
		}else if ($function =='updateStatusQc') {
			updateStatusQc($_POST);
		}else if ($function =='autoComplete') {
			autoComplete($_POST);
		}
	}
}
?>