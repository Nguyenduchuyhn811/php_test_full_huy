<section>
	<div class="container">
		<h1>About us</h1>
		<p>=)))))))))))))))))))))))))))))))))))))))))</p>
		<h2>=))))))))))))))))))))))))))))))))))))))))</h2>
	</div>
</section>
<?php 
	session_start();

	// include_once('quantri/function.php');

	// $sql      = "SELECT * FROM products ORDER BY id";
	// $products = mysql($sql);
	

	if (!empty($_GET['id'])) {
		$id = $_GET['id'];	
		!empty($_GET['sl']) ? $sl = $_GET['sl'] : $sl = 1; // cách dùng khác của if() sau dấu '?' là trường hợp đúng, sau dấu ':' là trường hợp sai
		foreach ($products as $key => $value) {
			if ($id == $value['id']) {
				if (empty($_SESSION['cart'])) {
					$value['sl'] = $sl;
					$_SESSION['cart_slsp'] = $sl;
					$_SESSION['cart'][0] = $value;
					$_SESSION['total'] = $value['price'] * $sl;
				}
				else{
					$flag = false;
					$stt = 0;
					foreach ($_SESSION['cart'] as $k=> $v) {  
						if ($v['id'] == $id) { 
							$flag = true;
							$stt = $k;
						}
					}
					if ($flag == true) {
						$_SESSION['cart'][$stt]['sl'] = $_SESSION['cart'][$stt]['sl'] + $sl;
						$_SESSION['cart_slsp'] = $_SESSION['cart_slsp'] + $sl;
						$_SESSION['total' ]= $_SESSION['total'] + $value['price'] * $sl;
					}else{
						$_SESSION['cart_slsp'] = $_SESSION['cart_slsp'] + $sl;
						$value['sl'] = $sl;
						$_SESSION['cart'][] = $value;
						$_SESSION['total'] = $_SESSION['total'] + $value['price'] * $sl;
					}	
				}
			}
		}
	}

	if (!empty($_GET['del'])) {
		$del = $_GET['del'];
		$check=false;
		$vitri=0;
		foreach ($_SESSION['cart'] as $m => $n) {
			if ($n['id'] == $del) {
				$vitri = $m;
				$check = true;
			}
		}
		if ($check == true) {
			$_SESSION['cart_slsp'] = $_SESSION['cart_slsp'] - $_SESSION['cart'][$vitri]['sl'];
			unset($_SESSION['cart'][$vitri]);
			$_SESSION['total'] = $_SESSION['total'] - $n['price'] * $_SESSION['cart'][$vitri]['sl'];
		}
	}

?>