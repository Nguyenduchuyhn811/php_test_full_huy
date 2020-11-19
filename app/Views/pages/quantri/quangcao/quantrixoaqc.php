<?php
// Start the session
session_start();

include_once('../function.php');

$sql   	  = "SELECT * FROM products WHERE id";
$products = mysql($sql);
// echo '<pre>';
// print_r($products);

$sqltype   	  = "SELECT * FROM product_type WHERE id";
$productstype = mysql($sqltype);
// echo '<pre>';
// print_r($productstype);

?>
<!DOCTYPE html>
<html>
<head>
	<title>set up session and logout session</title>
</head>
<body>

<?php
	if (!empty($_GET['id'])) {
		$id = $_GET['id'];
		$deletesql = "DELETE FROM panertop WHERE id = $id";
		deleteProduct($deletesql);
		header("location: http://localhost/occko/webdong/html/quantri/quangcao/danhsachqc.php?page=1");
	}

	if (!empty($_GET['idtype'])) {
		$idtype = $_GET['idtype'];
		$deletesql = "DELETE FROM news_type WHERE id = '$idtype'";
		deleteProduct($deletesql);
		header("location: http://localhost/occko/webdong/html/quantri/quangcao/danhmucqc.php?page=1");
	}
?>
</body>
</html>