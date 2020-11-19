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
if (!empty($_GET['id'])) {
	# code...
}


echo "Session variables are set.";
print_r($_SESSION);
session_destroy();  //xóa session ra khỏi bộ nhớ trên web
header("Location:http://localhost/occko/test5.php",3);
die;
?>

</body>
</html>