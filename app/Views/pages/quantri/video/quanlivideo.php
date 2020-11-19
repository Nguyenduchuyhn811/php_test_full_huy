<?php 
	session_start();

	include_once('../function.php');

	if (empty($_GET['page']) || !isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$huy = $_GET['page'];
	$per_page = 10;

	if ($huy == 1) {
		$start = 0;
	}else if($huy > 1 ){
		$start = ($huy-1)*$per_page;
	}
	// echo $start;
	// echo'<br>';


	if (!empty($_GET['search_name'])) {
		$a = $_GET['search_name'];
		if (!empty($_GET['type'])) {
			$b = $_GET['type'];
			$sql      = "SELECT * FROM video WHERE name LIKE '%$a%' AND type = $b ORDER BY id DESC LIMIT $start, $per_page";

			$sqlsearch= "SELECT * FROM video WHERE name LIKE '%$a%' AND type = $b ORDER BY id DESC";
			$products_search = mysql($sqlsearch);
		}else{
			$sql      = "SELECT * FROM video WHERE name LIKE '%$a%' ORDER BY id DESC LIMIT $start, $per_page";

			$sqlsearch= "SELECT * FROM video WHERE name LIKE '%$a%' ORDER BY id DESC";
			$products_search = mysql($sqlsearch);
			// echo count($products_search);
		}
	}else{
		if (!empty($_GET['type'])) {
			$b = $_GET['type'];
			$sql      = "SELECT * FROM video WHERE type = $b ORDER BY id DESC LIMIT $start, $per_page";

			$sqlsearch= "SELECT * FROM video WHERE type = $b ORDER BY id DESC";
			$products_search = mysql($sqlsearch);
			// echo "<pre>";
			// print_r($products_search);
		}else{
			$sql      = "SELECT * FROM video ORDER BY id DESC LIMIT $start, $per_page";
			// echo $sql;
		}
	}
	$video = mysql($sql);
	// echo count($products)."<br>";

	$result_all_video = "SELECT * FROM news ORDER BY id DESC";
	$all_video = mysql($result_all_video);
	// echo count($all_products);
	$num_page = (int)(count($all_video)/$per_page);
	// echo "<br>" . $num_page;
	// echo "<br>" . $num_page*$per_page;
	
	$op = "SELECT * FROM video_type";
	$video_type = mysql($op);

	$_SESSION['http'] = getCurURL(); 
	// echo $_SESSION['http'];

	// lấy đường dẫn thư mục cha để add link ảnh vào
	$linkimg = dirname($_SESSION['http'], 4) . "/img/";
	// echo $linkimg;

	if (empty($_GET['type'])) {
		$idtype = '';
	}else{
		$idtype = $_GET['type'];
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>http://v2bnc00420.v2.webbnc.net/</title>
	<!-- owl.carousel -->
	<link rel="stylesheet" type="text/css" href="../../../owlcarousel2-2.3.4/owlcarousel2-2.3.4//dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="../../../owlcarousel2-2.3.4/owlcarousel2-2.3.4//dist/assets/owl.theme.default.min.css">
	<!-- end owl.carousel -->


	<!-- bootstrap -->
	<link rel="stylesheet" href="../../../bootstrap-3.4.1-dist/bootstrap/bootstrap.min.css">
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
	<link href="../../../menumobile/mmenu.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../../../css/css.css">
	<link rel="stylesheet" type="text/css" href="../../../css/quantri.css">
	<link rel="stylesheet" type="text/css" href="../../../css/mobile.css">
	<link rel="stylesheet" type="text/css" href="../../../css/responsive.css">
	<!-- end css -->


  	<!-- javascript -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
	<script src="../../../bootstrap-3.4.1-dist/bootstrap/bootstrap.min.js"></script>
	<script src="../../../OwlCarousel2-2.3.4/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sticky-kit/1.1.3/sticky-kit.min.js"></script>
	
		<!-- counter up -->
		<script type="text/javascript" src="../../../Counter-Up-master/Counter-Up-master/jquery.counterup.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- end counter up -->

		<!-- zoomContainer -->
		<script src="../../../elevatezoom-master/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
		<!-- end zoomContainer -->

		<!-- galleria -->
		<script type="text/javascript" src="../../../galleria-1.5.7/galleria/galleria-1.5.7.min.js"></script>
		<!-- end galleria -->

	<script src="../../../menumobile/mmenu.js"></script>
	<script type="text/javascript" src="../../../js.js"></script>
	<!-- end javascript -->
	
</head>
<body class="quanlivideo">
	<div class="quantri">
		<div class="quantribackground">
			<form action method="POST" enctype="multipart/form-data">
				<div class="quantrimenu col-xs-12 col-sm-12 col-md-2 col-lg-2">
					<div class="quantrimenuitem">
						<div class="row">
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h3>Sản phẩm</h3>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/sanpham/quantri.php">Quản trị thêm sản phẩm</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/sanpham/danhsach.php">Quản trị danh sách sản phẩm</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/sanpham/quantrimagiamgia.php">Quản trị thêm mã giảm giá</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/sanpham/danhsachmagiamgia.php">Danh sách mã giảm giá</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/sanpham/quantrithemdanhmucsp.php">Thêm danh mục sản phẩm</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/sanpham/quantridanhmucsp.php">Danh mục sản phẩm</a>
							</div>
						</div>
					</div>
					<div class="quantrimenuitem">
						<div class="row">
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h3>Tin tức</h3>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/dangtintuc.php">Đăng tin tức</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhsachtintuc.php">Danh sách tin tức</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/dangdanhmuctintuc.php">Đăng danh mục</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhmuctintuc.php">Danh mục tin tức</a>
							</div>
						</div>
					</div>
					<div class="quantrimenuitem">
						<div class="row">
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h3>Album</h3>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/album/dangalbum.php">Đăng album</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/album/quanlialbum.php">Danh sách album</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/album/dangdanhmucalbum.php">Đăng danh mục album</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/album/danhmucalbum.php">Danh mục album</a>
							</div>
						</div>
					</div>
					<div class="quantrimenuitem">
						<div class="row">
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h3>Video</h3>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/video/dangvideo.php">Đăng video</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a class="active" href="http://localhost:81/occko/webdong/html/quantri/video/quanlivideo.php">Danh sách video</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/video/dangdanhmucvideo.php">Đăng danh mục video</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/video/danhmucvideo.php">Danh mục video</a>
							</div>
						</div>
					</div>
					<div class="quantrimenuitem">
						<div class="row">
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<h3>Quảng cáo</h3>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/quangcao/dangqc.php">Đăng quảng cáo</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/quangcao/quanliqc.php">Danh sách quảng cáo</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/quangcao/dangdanhmucqc.php">Đăng danh mục quảng cáo</a>
							</div>
							<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<a href="http://localhost:81/occko/webdong/html/quantri/quangcao/danhmucqc.php">Danh mục quảng cáo</a>
							</div>
						</div>
					</div>
				</div>
				<div class="quantrishowoff col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="quantriname col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>
								<a href="http://localhost:81/occko/webdong/html/quantri.php">
									Danh sách video
								</a>
							</h1>
						</div>
						<div class="quantriitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="item">
								<div class="itemname">
									<strong><i class="fa fa-list-alt" aria-hidden="true"></i>Danh sách</strong>
								</div>
								<div class="quantridanhsachsearch">
									<input id="quantridanhsachsearch" type="text" name="products_name" placeholder="Tìm theo tên sản phẩm" value="<?php if(!empty($_GET['search_name'])){echo $_GET['search_name']; } ?>">
									<select id="search_type" name="products_type">
										<option value="">Tìm theo danh mục</option>
										<?php 
											function showCategories($video_type, $parent_id = 0, $char = ''){
												foreach ($video_type as $z => $x) {
													if ($x['parent_id'] == $parent_id){
										?>
														<option value="<?php echo $x['id'] ?>"<?php if( !empty($_GET['type']) && $x['id'] == $_GET['type']) {echo "selected";} ?>><?php echo $char . $x['name'] ?></option>
										<?php
														// unset($video_type[$z]);
														showCategories($video_type, $x['id'], $char.'---');
													}				
												}
											}
											// hiển thị dao diện
											showCategories($video_type);
										?>
									</select>
									<button>
										<a href="<?php echo $_SESSION['http']?>">gửi</a>
									</button>


									<script type="text/javascript">
										var a = "http://localhost:81/occko/webdong/html/danhsach.php";
										var c = "<?php if (!empty($_GET['type'])) {echo $_GET['type'];} ?>";
										var b = "<?php if (!empty($_GET['search_name'])) {echo $_GET['search_name'];}?>";

										$('#quantridanhsachsearch').on('input',function(){
											b = $('#quantridanhsachsearch').val();
											m = a + "?search_name=" + b + "&type=" + c;
											$('.quantridanhsachsearch button a').attr('href',m);
										});



										$('#search_type').on('change',function(){ 
											c = $('#search_type').val();
											console.log(c);
											m = a + "?search_name=" + b + "&type=" + c;
											$('.quantridanhsachsearch button a').attr('href',m);
										});

										
										
										
										
									</script>

								</div>
								<table class="quantridanhsach quantrinews table table-hover">
									<thead>
										<th class="img">Ảnh</th>
										<th class="news">Tên tin tức</th>
										<th class="">Danh mục</th>
										<th class="">Mô tả</th>
										<th class="">Nội dung</th>
										<th class="type">Hình thức</th>
										<th class="option">Hành động</th>
									</thead>
									<tbody>
										<?php 
											foreach ($video as $key => $value) {
										?>
											<tr>
												<td><img src="<?php echo $linkimg.$value['img']; ?>"></td>
												<td><?php echo $value['name']; ?></td>
												<td><?php 
													if ($value['category'] == 0) {
														echo "Danh mục gốc";
													}else{
														foreach ($video_type as $key1 => $value1) {
															if ($value['category'] == $value1['id']) {
																echo $value1['name'];
															}
														}
													}
												 ?></td>
												<td><?php echo $value['name_discription']; ?></td>
												<td><?php echo $value['discription']; ?></td>
												<td>
													<select name="status<?php echo $value['id'];?>" data-id="<?php echo $value['id'];?>">
														<option value="1" <?php if ($value['status'] == 1) {echo "selected";} ?>>Hiển thị</option>
														<option value="0" <?php if ($value['status'] == 0) {echo "selected";} ?>>Ẩn</option>
													</select>
												</td>
												<td>
													<a href="http://localhost:81/occko/webdong/html/quantri/video/quantrivideo.php?id=<?php echo $value['id']?>" target="blank" data-id="<?php echo $value['id']?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
													<a class="refresh" href="http://localhost:81/occko/webdong/html/quantri/video/danhsachvideo.php?page=<?php echo $huy;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];}?>" onclick="return confirm('Bạn có chắc làm mới sản phẩm này?')" data-id="<?php echo $value['id']?>" data-alert-title="Thông báo"><i class="fa fa-refresh" aria-hidden="true"></i></a>
													<a class="update" href="http://localhost:81/occko/webdong/html/quantri/video/suadanhsachvideo.php?id=<?php echo $value['id']?>" target="blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
													<a class="delete" href="http://localhost:81/occko/webdong/html/quantri/video/quantrixoavideo.php?id=<?php echo $value['id']?>" onclick="return confirm('Bạn có chắc xóa sản phẩm này?')" data-id="<?php echo $value['id']?>" data-alert-title="Thông báo"><i class="fa fa-trash" aria-hidden="true"></i></a>
												</td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
								<div class="quantridanhsachlistbtn">
									<ul>
										<?php if($huy > 1){
											?>
											<li class="disabled">
												<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhsach.php?page=<?php echo $huy-1;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];} ?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>">|<<</a>
											</li>
											<li>
												<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhsach.php?page=<?php echo $huy-1;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];} ?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>"><?php echo $huy - 1;?></a>
											</li>
										<?php
										}else{
										?>
											<li class="disabled">
												<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhsach.php?page=<?php echo $huy;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>">|<<</a>
											</li>
										<?php
										} 
										;?>						
											<li class="active">
												<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhsach.php?page=<?php echo $huy;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];}?>"><?php echo $huy;?></a>
											</li>

										<?php if(count($all_video) > ($num_page*$per_page) && ($num_page*$per_page) > $start){
											?>
											<li>
												<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhsach.php?page=<?php echo $huy+1;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];} ?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>"><?php echo $huy + 1;?></a>
											</li>
											<li class="disabled">
												<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhsach.php?page=<?php echo $huy+1;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];} ?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>">>>|</a>
											</li>
										<?php
										}else{
										?>
											<li class="disabled">
												<a href="http://localhost:81/occko/webdong/html/quantri/tintuc/danhsach.php?page=<?php echo $huy;?>&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];} ?>">>>|</a>
											</li>
										<?php
										} 
										;?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="last">
		<div>
			Thiết kế bởi
			<a href="https://bota.vn">BOTA</a>
		</div>
	</div>


	<script type="text/javascript">
		
	</script>


        <script>
            document.addEventListener(
                "DOMContentLoaded", () => {
                new Mmenu( "#my-menu", {
                    extensions  : [ "shadow-panels", "fx-listitems-slide", "border-none", "theme-black", "fullscreen"],
                    counters    : true,
                    iconbars     : 
                    {
                    	add     : true,
                    	position: "top",
                    	content : [
                    	 "<a href='#/'><i class='fa fa-home'></i></a>",
                         "<a href='#/'><i class='fa fa-user'></i></a>"
                         ]
                    },
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