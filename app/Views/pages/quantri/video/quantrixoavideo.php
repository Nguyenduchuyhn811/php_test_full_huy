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
		$deletesql = "DELETE FROM video WHERE id = $id";
		deleteProduct($deletesql);
		header("location: http://localhost/occko/webdong/html/quantri/video/danhsachvideo.php?page=1");
	}

	if (!empty($_GET['idtype'])) {
		$idtype = $_GET['idtype'];
		$deletesql = "DELETE FROM video_type WHERE id = '$idtype'";
		deleteProduct($deletesql);
		header("location: http://localhost/occko/webdong/html/quantri/video/danhmucvideo.php?page=1");
	}
?>
</body>
</html>