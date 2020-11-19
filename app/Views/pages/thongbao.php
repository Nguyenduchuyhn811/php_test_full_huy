<?php 
	session_start();

	include_once('quantri/function.php');
	if (!empty($_SESSION['customer'])) {
	 	// print_r($_SESSION['customer']);
	 	$session_city = $_SESSION['customer']['thanhpho'];
	 	$session_distric = $_SESSION['customer']['quan'];
	 	$session_commune = $_SESSION['customer']['phuong'];
	} 

	$sqlcity      = "SELECT * FROM devvn_tinhthanhpho WHERE matp = '$session_city'";
	$city   = mysql($sqlcity);
	// print_r($city);

	$sqldistric      = "SELECT * FROM devvn_quanhuyen WHERE maqh = '$session_distric'";
	$distric   = mysql($sqldistric);
	// print_r($distric);

	$sqlcommune      = "SELECT * FROM devvn_xaphuongthitran WHERE xaid = '$session_commune'";
	$commune   = mysql($sqlcommune);
	// print_r($commune);

	$_SESSION['http'] = getCurURL(); 
	// echo $_SESSION['http'];

	// if (!empty($_SESSION['customer'])) {
	// 	var_dump('<pre>');
	//  	print_r($_SESSION['customer']);
	//  } 







	// $mysql = mysql_connect('localhost','root','','');
	// $sql = 'INSERT INTO customer(tenkhachhang,email,sodienthoai,thanhpho,quan,code,id,price)';
	// mysql_query($mysql,$sql .)
	// foreach ($_SESSION['customer']['product'] as $key => $value) {
	// 	# code...
	// }











?>
<!DOCTYPE html>
<html>
<head>
	<title>http://v2bnc00420.v2.webbnc.net/</title>
	<!-- owl.carousel -->
	<link rel="stylesheet" type="text/css" href="../owlcarousel2-2.3.4/owlcarousel2-2.3.4//dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="../owlcarousel2-2.3.4/owlcarousel2-2.3.4//dist/assets/owl.theme.default.min.css">
	<!-- end owl.carousel -->


	<!-- bootstrap -->
	<link rel="stylesheet" href="../bootstrap-3.4.1-dist/bootstrap/bootstrap.min.css">
	<!-- end bootstrap -->


	<!-- effect -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- end effect -->


	<!-- font -->
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+HK:100,300,400,500,700,900|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans+HK|Oswald:200,300,400,500,600,700|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap&subset=vietnamese" rel="stylesheet">
  	<!-- end font -->
	

	<!-- css -->
	<link href="../menumobile/mmenu.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/css.css">
	<link rel="stylesheet" type="text/css" href="../css/mobile.css">
	<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	<!-- end css -->


  	<!-- javascript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
	<script src="../bootstrap-3.4.1-dist/bootstrap/bootstrap.min.js"></script>
	<script src="../OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sticky-kit/1.1.3/sticky-kit.min.js"></script>
	
		<!-- counter up -->
		<script type="text/javascript" src="../Counter-Up-master/Counter-Up-master/jquery.counterup.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- end counter up -->

		<!-- zoomContainer -->
		<script src="../elevatezoom-master/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
		<!-- end zoomContainer -->

		<!-- galleria -->
		<script type="text/javascript" src="../galleria-1.5.7/galleria/galleria-1.5.7.min.js"></script>
		<!-- end galleria -->

	<script src="../menumobile/mmenu.js"></script>
	<script type="text/javascript" src="../js.js"></script>
	<!-- end javascript -->
	
</head>
<body>
	<div class="thanhtoanbackground thongbao">
		<div class="thanhtoanlogo"><div class="container"><div class="row"><a href="http://localhost:81/occko/webdong/index.php"><img src="http://localhost:81/occko/webdong/img/1510630659_t2.png"></a></div></div></div>
		<div class="thanhtoanshow">
			<div class="container">
				<div class="row">
					<div class="thongbaoitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<strong>Giao dịch hoàn thành</strong>
						<p>Thông tin chúng tôi sẽ gửi về <?php print_r($_SESSION['customer']['email']); ?></p>
					</div>
					<div class="thongbaoname col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="thongbaonameitem">	
							<p><b>Tên khách hàng: </b><?php print_r($_SESSION['customer']['tenkhachhang']); ?></p>
							<p><b>SĐT: </b><?php print_r($_SESSION['customer']['sodienthoai']); ?></p>
							<p><b>Địa chỉ: </b><?php echo $_SESSION['customer']['diachi'] .', '. $commune[0]['name'] .', '. $distric[0]['name'] .', '. $city[0]['name'] ; ?></p>
						</div>
					</div>
					<div class="thongbaoitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<a href="http://localhost:81/occko/webdong/html/huygiohang.php">Quay lại trang chính</a>
					</div>
				</div>
			</div>
		</div>
	</div>

        <script type="text/javascript">
                document.addEventListener(
                "DOMContentLoaded", () => {
                new Mmenu( "#my-menu", {
                    extensions  : [ "shadow-panels", "fx-listitems-slide", "border-none", "theme-black", "fullscreen"],
                    counters    : true,
                    navbars     : [
                    {
                        content : ["prev", "searchfield", "close"],
                        height  : 2                   
                    },
                    {
                    	searchfield: true,
                    	content    : ["searchfield"]
                    },
                    {
                    	position: "bottom",
                    	content: [
                         "<a href='#/'><i class='fa fa-twitter'></i></a>",
                         "<a href='#/'><i class='fa fa-facebook'></i></a>",
                         "<a href='#/'><i class='fa fa-linkedin'></i></a>"
                      	]
                    }
                   	],
               	});
	           	}
            );

       	</script>
</body>
</html>

