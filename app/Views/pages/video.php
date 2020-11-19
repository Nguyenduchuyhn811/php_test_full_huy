<?php 
	session_start();

	include_once('quantri/function.php');

	if (empty($_GET['page'])) {
		$_GET['page'] = 1;
	};
	$huy = $_GET['page'];
	$per_page = 3;

	if ($huy == 1) {
		$start = 0;
	}else if($huy > 1 ){
		$start = ($huy-1)*$per_page;
	}
	// echo $start;
	// echo'<br>';

	if (!empty($_GET['search'])) {
		$a = $_GET['search'];
		$sql      = "SELECT * FROM video WHERE name LIKE '%$a%' ORDER BY id DESC LIMIT $start, $per_page";

		$sqlsearch= "SELECT * FROM video WHERE name LIKE '%$a%' ORDER BY id DESC";
		$products_search = mysql($sqlsearch);
		// echo count($products_search);
	}else{
		$sql      = "SELECT * FROM video ORDER BY id DESC LIMIT $start, $per_page";
		// echo $sql;
	}
	
	$video = mysql($sql);
	// echo count($video)."<br>";

	$result_all_video = "SELECT * FROM video ORDER BY id DESC";
	$all_video = mysql($result_all_video);
	 // echo count($all_products);
	$num_page = (int)(count($all_video)/$per_page);
	// echo "<br>" . $num_page;
	// echo "<br>" . $num_page*$per_page;


	$_SESSION['http'] = getCurURL(); 
	// echo $_SESSION['http'];

	// lấy đường dẫn thư mục cha để add link ảnh vào
	$linkimg = dirname($_SESSION['http'], 2) . "/img/";
	// echo $linkimg;
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
	<header>
		<div class="header_menu">	
			<div class="container">
				<div class="row">
					<div class="header_logo col-xs-4 col-sm-4 col-md-2 col-lg-2">
						<a href="http://localhost:81/occko/webdong/index.php">
							<img src="../img/1510630659_t2.png">
						</a>
					</div>
					<div class="header_menu_item hidden-xs hidden-sm col-md-8 col-lg-8">
						<div id="menu">
							<ul class="header_menu_item_main">
								<li><a href="http://localhost:81/occko/webdong/index.php">TRANG CHỦ</a></li>
								<li><a href="http://localhost:81/occko/webdong/html/gioithieu.php">GIỚI THIỆU</a></li>
								<li class="active"><a href="http://localhost:81/occko/webdong/html/video.php">VIDEO</a></li>
								<li>
									<a href="http://localhost:81/occko/webdong/html/sanpham.php">SẢN PHẨM</a>
									<ul>
										<li><a href="http://localhost:81/occko/webdong/html/sanpham/tuixach.php">TÚI XÁCH</a></li>
										<li><a href="http://localhost:81/occko/webdong/html/sanpham/balo.php">BA LÔ</a></li>
										<li><a href="http://localhost:81/occko/webdong/html/sanpham/tuidulich.php">TÚI DU LỊCH</a></li>
										<li><a href="http://localhost:81/occko/webdong/html/sanpham/vi.php">VÍ</a></li>
										<li><a href="http://localhost:81/occko/webdong/html/sanpham/vali.php">VALI</a></li>
										<li><a href="http://localhost:81/occko/webdong/html/sanpham/thatlung.php">THẮT LƯNG</a></li>
									</ul>
								</li>
								<li><a href="http://localhost:81/occko/webdong/html/tintuc.php">TIN TỨC</a></li>
								<li><a href="http://localhost:81/occko/webdong/html/album.php">ALBUM</a></li>
								<li><a href="http://localhost:81/occko/webdong/html/lienhe.php">LIÊN HỆ</a></li>
								<li><a href="http://localhost:81/occko/webdong/html/bando.php">BẢN ĐỒ</a></li>
							</ul>
						</div>
					</div>
					<div class="header_social col-xs-8 col-sm-8 col-md-2 col-lg-2">
						<ul class="header_social_item">
							<li>
								<a href="/">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<div class="header_search_button">
									<i class="fa fa-search" aria-hidden="true"></i>
								</div>
								<div class="header_search_area">
									<div class="search_area">
										<div class="autocomplete">
											<input id="search_box" type="text" name="search" value="<?php if(!empty($_POST['search'])){echo $_POST['search'];} ?>">
											<div id="suggesstion-box"></div>
										</div>
										<a href="http://localhost:81/occko/webdong/html/sanpham.php?page=1"><i class="fa fa-search" aria-hidden="true"></i></a>
									</div>


									<script type="text/javascript">
										$('#search_box').on('input',function(){
											var link = "http://localhost:81/occko/webdong/html/sanpham.php?page=1";
											link = link + '&search='+$('#search_box').val();
											$('.header_search_area .search_area a').attr('href',link);
										});
									</script>
									
								</div>
							</li>
							<li>
								<div class="header_cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</div>
								<div class="header_social_cart">
									<div class="row">
										
									<?php 
										if (empty($_SESSION['cart'])) {
											echo '<center class="col-xs-12" id="cart_top">Hiện chưa có sản phẩm nào trong giỏ hàng của bạn</center>';
										}else{
											foreach ($_SESSION['cart'] as $key => $value) {
									?>
											<div class="header_social_cart_item">
												<figure class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
													<img src="<?php echo $linkimg . $value['pic']; ?>" class="img-responsive">
												</figure>
												<figcaption class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="sanpham"><?php echo $value['name']; ?></div>
													<!-- <div class="giatien">Giá tiền: </div> -->
													<div class="soluong">Số lượng: <?php echo $value['sl']; ?> x <?php echo number_format($value['price']); ?></div>
												</figcaption>
												<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
												<a class="reload" href="http://localhost:81/occko/webdong/html/reloadweb.php?del=<?php echo $value['id']; ?>">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</a>
											</div>
										</div>
									<?php
											}
										}
									?>	
									<div class="header_social_cart_total col-xs-12"><p>Tổng: <strong><?php echo number_format($_SESSION['total'])?> Đ</strong></p></div>
									<div class="col-xs-12"><a href="http://localhost:81/occko/webdong/html/tongtien.php">Tiến hành đặt hàng</a></div>
									</div>							
								</div>
								<div class="number" id="number_item">
									<?php 
										if (empty($_SESSION['cart_slsp'])) {
											echo "0";
										}else{
											echo $_SESSION['cart_slsp'];										}
									?>
								</div>
							</li>
							<li class="hidden-md hidden-lg">
								<div id="my-page">
		            				<div id="my-header">
							            <a class="menu-button" href="#my-menu">  
							                <div class="nav_list">
							                	<span class="menu-line menu-line-1"></span>
							                	<span class="menu-line menu-line-2"></span>
							                	<span class="menu-line menu-line-3"></span>
							                </div>
							            </a>
						                <div id="my-menu">
						                    <ul>
						                    	<li><a href="http://localhost:81/occko/webdong/index.php">TRANG CHỦ</a></li>
												<li><a href="http://localhost:81/occko/webdong/html/gioithieu.php">GIỚI THIỆU</a></li>
												<li><a href="http://localhost:81/occko/webdong/html/video.php">VIDEO</a></li>
												<li>
													<a href="http://localhost:81/occko/webdong/html/sanpham.php">SẢN PHẨM</a>
													<ul>
														<li><a href="http://localhost:81/occko/webdong/html/sanpham/tuixach.php">TÚI XÁCH</a></li>
														<li><a href="http://localhost:81/occko/webdong/html/sanpham/balo.php">BA LÔ</a></li>
														<li><a href="http://localhost:81/occko/webdong/html/sanpham/tuidulich.php">TÚI DU LỊCH</a></li>
														<li><a href="http://localhost:81/occko/webdong/html/sanpham/vi.php">VÍ</a></li>
														<li><a href="http://localhost:81/occko/webdong/html/sanpham/vali.php">VALI</a></li>
														<li><a href="http://localhost:81/occko/webdong/html/sanpham/thatlung.php">THẮT LƯNG</a></li>
													</ul>
												</li>
												<li><a href="http://localhost:81/occko/webdong/html/tintuc.php">TIN TỨC</a></li>
												<li><a href="http://localhost:81/occko/webdong/html/album.php">ALBUM</a></li>
												<li><a href="http://localhost:81/occko/webdong/html/lienhe.php">LIÊN HỆ</a></li>
												<li><a href="http://localhost:81/occko/webdong/html/bando.php">BẢN ĐỒ</a></li>
						                    </ul>
						                </div>
						            </div>
						        </div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="header_img">
			<div class="header_img_no_slide">
				<img src="../img/1510072034_qc.png">
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="row">
				<div class="v2_bnc_video_breadcrum col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ol class="breadcrumb">
						<li>
							<a href="http://localhost:81/occko/webdong/index.php">Giới thiệu</a>
						</li>
						<li>
							<a href="http://localhost:81/occko/webdong/html/video.php">Video</a>
						</li>
					</ol>
				</div>
				<div class="v2_bnc_video_main">
					<div class="video_top_title col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1>Video</h1>
					</div>
					<div class="video_option col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<select class="form-control">
							<option value="video_lasted">Video mới nhất</option>
							<option value="video_vip">Video nổi bật</option>
							<option value="video_AZ">Video A-Z</option>
						</select>
					</div>
					<div class="video_input col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<input type="text" name="input" placeholder="Tiêu đề" class="form-control">
					</div>
					<div class="video_option col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<select class="form-control">
							<option value="video_show">Số bản hiển thị</option>
							<option value="video_10">10</option>
							<option value="video_20">20</option>
							<option value="video_30">30</option>
							<option value="video_40">40</option>
							<option value="video_50">50</option>
						</select>
					</div>
					<div class="video_search col-xs-12 col-sm-12 col-md-3 col-lg-3">
						<button>Tìm kiếm</button>
					</div>
				</div>
				<div class="v2_bnc_video_item">
					<?php
						foreach ($video as $key => $value) {
					?>
						<div class="video_item col-xs-12 col-sm-12 col-sm-4 col-lg-4">
							<div class="item">
								<div class="video_picture">
									<a href="http://localhost:81/occko/webdong/html/video/videoitem.php?id=<?php echo $value['id']?>" title="Sản xuất túi da">
										<img src="<?php echo $linkimg . $value['img'] ?>" alt="<?php echo $value['name'] ?>">
									</a>
								</div>
								<div class="video_name">
									<h3><?php echo $value['name'] ?></h3>
								</div>
								<div class="video_icon">
									<a href="http://localhost:81/occko/webdong/html/video/videoitem.php?id=<?php echo $value['id']?>" title="Sản xuất túi da">
										<i class="fa fa-play" aria-hidden="true"></i>
									</a>
								</div>
							</div>
						</div>
					<?php
						}
					?>
				</div>
				<div class="v2_bnc_video_button col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ul class="video_button">
					<?php if($huy > 1){
						?>
						<li class="disabled">
							<a href="http://localhost:81/occko/webdong/html/sanpham.php?page=<?php echo $huy-1;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];} ?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>">|<<</a>
						</li>
						<li>
							<a href="http://localhost:81/occko/webdong/html/sanpham.php?page=<?php echo $huy-1;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];} ?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>"><?php echo $huy - 1;?></a>
						</li>
					<?php
					}else{
					?>
						<li class="disabled">
							<a href="http://localhost:81/occko/webdong/html/sanpham.php?page=<?php echo $huy;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>">|<<</a>
						</li>
					<?php
					} 
					;?>						
						<li class="active">
							<a href="http://localhost:81/occko/webdong/html/sanpham.php?page=<?php echo $huy;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];}?>"><?php echo $huy;?></a>
						</li>

					<?php if(count($all_video) > ($num_page*$per_page) && ($num_page*$per_page) > $start){
						?>
						<li>
							<a href="http://localhost:81/occko/webdong/html/sanpham.php?page=<?php echo $huy+1;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];} ?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>"><?php echo $huy + 1;?></a>
						</li>
						<li class="disabled">
							<a href="http://localhost:81/occko/webdong/html/sanpham.php?page=<?php echo $huy+1;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];} ?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>">>>|</a>
						</li>
					<?php
					}else{
					?>
						<li class="disabled">
							<a href="http://localhost:81/occko/webdong/html/sanpham.php?page=<?php echo $huy;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>">>>|</a>
						</li>
					<?php
					} 
					;?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<div class="row">
				<div class="v2_bnc_footer col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="logo_footer">
						<a href="/">
							<img src="../img/1510630659_t2.png">
						</a>
					</div>ơ
					<div class="info_company">
						<h3>CÔNG TY CỔ PHẦN CÔNG NGHỆ BNC VIỆT NAM</h3>
						<div>
							<span>Trụ sở chính:</span>
							 Tầng 8, 51 Lê Đại Hành, Hà Nội
						</div>
						<div>
							<span> Chi nhánh HCM:</span>
							 Tầng 3 tòa nhà TienLoc Building
							 <br>
							  155-157 An Dương Vương – P.8 – Quận 5 - Tp. HCM
						</div>
						<div>
							<span>CN Vinh:</span>
							 Số 9 Ngõ 63E - Nguyễn Đức Cảnh - Tp. Vinh
						</div>
						<div>
							<span>Hỗ trợ:</span>
							 1900 2008 
							<span> -  Hotline:</span>
							 0988 512 772
						</div>
						<div>
							<span>Email:</span>
							<a href="http://v2bnc00420.v2.webbnc.net/mailto:contact@bncgroup.com.vn">contact@bncgroup.com.vn</a>
						</div>
						<div>
							<span>Website:</span>
							<a href="https://bota.vn/">https://bota.vn/</a>
						</div>
					</div>
				</div>
				<div class="v2_bnc_footer col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<h3>Form đăng kí</h3>
					<div class="mail_area">
						<input type="text" name="Name" placeholder="Họ và tên">
						<input type="text" name="Email" placeholder="Email nhận tin mới ...">
						<button type="submit">Đăng kí</button>
					</div>
				</div>
				<div class="help col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<h3>Giúp bạn</h3>
					<p>Xã hội phát triển và đàn ông buộc phải chú ý hơn về ăn mặc thì lại càng có quá nhiều kiểu dáng, phong cách ra đời. Đồ da trở thành một người anh em hữu ích và tiện dụng với cánh mày râu: túi xách, ví, thắt lưng da đều rất phổ biến.</p>
					<p>Niềm tin của khách hàng là mục tiêu sống còn của mỗi doanh nghiệp. Hiểu được điều này, chúng tôi luôn kiểm định sản phẩm từ khâu sản xuất cho đến bán hàng và bảo hành sau mua hàng.</p>
				</div>
			</div>
		</div>
	</footer>
	<div class="last">
		<div>
			Thiết kế bởi
			<a href="https://bota.vn">BOTA</a>
		</div>
	</div>


        <script>
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