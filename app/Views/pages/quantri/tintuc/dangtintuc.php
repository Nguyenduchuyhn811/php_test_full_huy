<?php 
	session_start();

	include_once('../function.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		insertNews($_POST);// xong add sp
	}

	// $sql      = "SELECT * FROM products ORDER BY id";
	// $products = mysql($sql);
	// echo("<pre>");
	// print_r($products);

	$sqltype      = "SELECT * FROM news_type ORDER BY id";
	$newstype = mysql($sqltype);
	// connect($sql)
	// echo("<pre>");
	// print_r($productstype);

	
	$_SESSION['http'] = getCurURL(); 
	// echo $_SESSION['http'];

	if (!isset($_SESSION['total'])) {
		$_SESSION['total'] = 0;
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

		<!-- CKEditor 5 classic -->
		<script src="../../../ckeditor5-build-classic/ckeditor.js"></script>
		<!-- end CKEditor -->

	<script src="../../../menumobile/mmenu.js"></script>
	<script type="text/javascript" src="../../../js.js"></script>
	<!-- end javascript -->
	
</head>
<body>
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
								<a class="active" href="http://localhost:81/occko/webdong/html/quantri/tintuc/dangtintuc.php">Đăng tin tức</a>
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
								<a href="http://localhost:81/occko/webdong/html/quantri/video/quanlivideo.php">Danh sách video</a>
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
								<a href="http://localhost:81/occko/webdong/html/dangtintuc.php">
									Đăng tin tức 
								</a>
							</h1>
						</div>
						<div class="quantriitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="item">
								<div class="itemname">
									<strong><i class="fa fa-list-alt" aria-hidden="true"></i>THÔNG TIN CƠ BẢN</strong>
									<p>Những trường có dấu * là bắt buộc</p>
								</div>
								<div class="iteminput">
									<div class="row">
										<div class="inputform col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-4 col-lg-4">Tiêu đề <span>*</span></label>
												<div class="col-md-8 col-sm-12 col-xs-12 col-lg-8"><input type="text" name="name" placeholder="ABCD"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-4 col-lg-4">Tên gọi khác </label>
												<div class="col-md-8 col-sm-12 col-xs-12 col-lg-8"><input type="text" name="id" placeholder="abcd1234"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Mô tả <span>*</span></label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10"><textarea id="name_discription" type="text" name="name_discription" placeholder="This is some sample content."></textarea></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Nội dung thông tin <span>*</span></label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10"><textarea id="discription" type="text" name="discription" placeholder="This is some sample content."></textarea></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Tag <span>*</span></label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10"><input type="text" name="tag" placeholder="abc"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Chọn danh mục <span>*</span></label>
												<div class="quantritinhtrang col-xs-12 col-sm-12 col-md-10 col-lg-10">
													<select id="search_type" name="list">
														<option value="0">Danh mục gốc</option>
														<?php 
															//thiết lâp dao diện
															function showCategories($newstype, $parent_id = 0, $char = ''){
																foreach ($newstype as $z => $x) {
																	if ($x['parent_id'] == $parent_id){
														?>
																		<option value="<?php echo $x['id'] ?>"><?php echo $char . $x['name'] ?></option>
														<?php
																		// unset($list_type_op[$z]);
																		showCategories($newstype, $x['id'], $char.'---');
																	}				
																}
															}
															// hiển thị dao diện
															showCategories($newstype);
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Nhà cung cấp</label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10"><input type="text" name="nhacungcap" value="BNC"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Tình trạng <span>*</span></label>
												<div class="quantritinhtrang col-xs-12 col-sm-12 col-md-10 col-lg-10">
													<span class="">
														<div class="quantricheckbox">
															<div class="checkbox col-xs-12 col-sm-12 col-md-3 col-lg-3"><label class="checkbox-inline"><input type="checkbox" name="check_list[]" value="hightlight">Nổi bật</label></div>
															<div class="checkbox col-xs-12 col-sm-12 col-md-3 col-lg-3"><label class="checkbox-inline"><input type="checkbox" name="check_list[]" value="commingsoon">Hàng sắp về</label></div>
															<div class="checkbox col-xs-12 col-sm-12 col-md-3 col-lg-3"><label class="checkbox-inline"><input type="checkbox" name="check_list[]" value="accept-order">Nhận đặt hàng</label></div>
															<div class="checkbox col-xs-12 col-sm-12 col-md-3 col-lg-3"><label class="checkbox-inline"><input type="checkbox" name="check_list[]" value="secondhand">Hàng cũ</label></div>
															<div class="checkbox col-xs-12 col-sm-12 col-md-3 col-lg-3"><label class="checkbox-inline"><input type="checkbox" name="check_list[]" value="out-of-stock">Hết hàng</label></div>
														</div>
													</span>
												</div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Trạng thái <span>*</span></label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10">
													<select name="status">
														<option value="1">Hiện</option>
														<option value="0">Ẩn</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="itemname">
									<strong><i class="fa fa-list-alt" aria-hidden="true"></i>MÔ TẢ & MÔ TẢ KHÁC</strong>
								</div>
								<div class="iteminput">
									<div class="quantripic">
										<h3>Chọn ảnh</h3>
										<input type="file" id="img" name="img" accept="image/*">
										<img id="dangtintucpic" src="../../../img/no_image.gif">
									</div>
								</div>
							</div>
						</div>
						<div class="quantriupdate col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="quantridelete">        <!-- cách thứ nhất là kết hợp với js -->
								<button class="delete" data-button='0'>
									<a href="javascript:;">
										Xóa dữ liệu trên
									</a>
								</button>
								<button class="update" data-button='1'>
									<input type="submit" name="submit" value="Lưu và tiếp tục" onclick="return confirm('Are you sure?')">
								</button>
								<button class="update" data-button='2'>
									<input type="submit" name="move" value="Lưu và đồng bộ">
									<!-- a href="javascript:;">Lưu và đồng bộ</a> -->
								</button>
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





<!-- <script type="text/javascript">
	$('.quantriupdate button').on('click',function(){
		var x = $(this).attr('data-button');
		console.log(x);
		if (x == 0) {
			window.location.assign("http://localhost:81/occko/webdong/html/quantri.php?move=1");
		}else if (x == 2) {
			window.location.assign("http://localhost:81/occko/webdong/html/danhsach.php");
		}
	})
</script> -->
	<script>
        ClassicEditor
            .create( document.querySelector( '#discription' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#name_discription' ) )
            .catch( error => {
                console.error( error );
            } );
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