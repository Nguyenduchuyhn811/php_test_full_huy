<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>set up session and logout session</title>
</head>
<body>

<?php
	echo $_SESSION['http'];
	$http = $_SESSION['http'];
	echo "<br>";
	echo $_GET['del'];
	echo "<br>";
	$m = $_GET['del'];
	print_r($_SESSION['cart']);
	echo "<br>";
	$n = false;
	foreach ($_SESSION['cart'] as $key => $value) {
		if ($value['id'] == $m) {
			$n = true;
			$stt = $key;
			$sl = $_SESSION['cart'][$stt]['sl']; 
			$o = $_SESSION['cart'][$stt]['sl']*$_SESSION['cart'][$stt]['price'];
		}
		echo $value['id'];
	}
		echo "<br>";
		echo $n;
		echo "<br>";
		echo $stt;
		echo "<br>";
	if ($n == true) {
		print_r($_SESSION['cart'][$stt]);
		echo "<br>";
	}
	unset($_SESSION['cart'][$stt]);
	unset($_SESSION['discount']);
	print_r($_SESSION['cart']);
	$_SESSION['cart_slsp'] = $_SESSION['cart_slsp'] - $sl;
	$_SESSION['total'] = $_SESSION['total'] - $o;
	echo "<br>";	
	header('Location:'.$http,3);
die;
?>

</body>
</html>