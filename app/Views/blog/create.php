<div class="container">
	<h1>Create new post</h1>

	<?php if($_POST):?>
		<?= \Config\Services::validation()->listErrors(); ?>
	<?php endif; ?>

	<form class="" action="/blog/create" method="post">
		<!-- <div class="form-group">
			<label for="title">Title:</label>
			<input type="text" class="form-control" name="title" id="title" value="">
		</div>
		<div class="form-group">
			<label for="body">Body:</label>
			<textarea class="form-control" name="body" id="body"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Create</button>
		</div> -->
		<div class="iteminput">
									<div class="row">
										<div class="inputform col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="form-group">
												<label class="">Tên sản phẩm <span>*</span></label>
												<div class=""><input type="text" class="form-control" name="name" placeholder="ABCD"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<label class="">URL SEO <span>*</span></label>
												<div class=""><input type="text" class="form-control" name="url" placeholder="https://example.com"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<label class="">Giá bán sản phẩm <span>*</span></label>
												<div class=""><input type="num" class="form-control" name="price" placeholder="100000"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<label class="">Trọng lượng </label>
												<div class=""><input type="num" class="form-control" name="weight" placeholder="100"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<label class="">Chọn danh mục <span>*</span></label>
												<div class="quantritinhtrang">
													<select class="form-control" id="search_type" name="type">
														<option value="0">Danh mục gốc</option>
														<?php 
															//thiết lâp dao diện
															function showCategories($product_type, $parent_id = 0, $char = ''){
																foreach ($product_type as $z => $x) {
																	if ($x['parent_id'] == $parent_id){
														?>
																		<option value="<?php echo $x['id'] ?>"><?php echo $char . $x['name'] ?></option>
														<?php
																		// unset($list_type_op[$z]);
																		showCategories($product_type, $x['id'], $char.'---');
																	}				
																}
															}
															// hiển thị dao diện
															showCategories($type);
														?>
													</select>
												</div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<label class="">Số lượng sản phẩm <span>*</span></label>
												<div class=""><input type="num" class="form-control" name="num" placeholder="100"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="form-group">
												<div class="quantripic">
													<h3>Chọn ảnh</h3>
													<input type="file" class="form-control" id="img" name="pic" accept="image/*">
													<img id="dangtintucpic" src="../../../img/no_image.gif">
												</div>
											</div>
										</div>
								</div>
				<div>
					<button type="submit" class="btn btn-primary" name="submit"	>Create</button>
				</div>
	</form>
</div>
<?php 
	session_start();

	include_once('quantri/function.php');

	if (isset($_POST['order'])) {
		$priceall = $_SESSION['lasttotal'];

		$post_city = $_POST['thanhpho'];
	 	$post_distric = $_POST['quan'];
	 	$post_commune = $_POST['phuong'];

		$sqlcity      = "SELECT name FROM devvn_tinhthanhpho WHERE matp = '$post_city'";
		$city   = mysql($sqlcity);
		// print_r($city);

		$sqldistric      = "SELECT * FROM devvn_quanhuyen WHERE maqh = '$post_distric'";
		$distric   = mysql($sqldistric);
		// print_r($distric);

		$sqlcommune      = "SELECT * FROM devvn_xaphuongthitran WHERE xaid = '$post_commune'";
		$commune   = mysql($sqlcommune);
		add_customer($_POST,$priceall,$city,$distric,$commune);
	}

	$sql       = "SELECT * FROM products ORDER BY id";
	$sqldis    = 'SELECT * FROM discount ORDER BY id';
	$sqlthanhpho    = 'SELECT * FROM devvn_tinhthanhpho';
	
	// $sqlphuong    = 'SELECT * FROM devvn_xaphuongthitran ORDER BY id';

	// $product    = mysql($sql);
	// $discount = mysql($sqldis);	
	$thanhpho = mysql($sqlthanhpho);
	// $quan = showDistric('');

	if (!isset($_GET['city']) || $_GET['city']=='') {
		$data = 1;
	}else{
		$data = $_GET['city'];
	}
	// echo $data;
	// print_r($quan);
	// print_r($discount);


	// print_r($_SESSION['cart']);


	$_SESSION['lasttotal'] = $_SESSION['total'];
	$checkmin = 3;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$code = $_POST['code'];
		if (!empty($code)) {
			foreach ($discount as $k => $v) {
				if ($v['code'] == $code) {
					$place = $k;
					if ($_SESSION['total'] >= $discount[$place]['min']) {
						$type = $discount[$place]['type'];
						$p = $discount[$place]['value']; 
						// $test = true;
						if ($type == 0) {
							$_SESSION['lasttotal'] = $_SESSION['total'] - ($_SESSION['total'] * $p / 100);
						}elseif($type == 1){
							$_SESSION['lasttotal'] = $_SESSION['total'] - $p;
						}
						$checkmin = 1;
					}else{
						$checkmin = 2;
					}
				}
			}
		}

		$_SESSION['customer']['tenkhachhang'] = $_POST['tenkhachhang'];
		$_SESSION['customer']['email'] = $_POST['email'];
		$_SESSION['customer']['sodienthoai'] = $_POST['sodienthoai'];
		$_SESSION['customer']['thanhpho'] = $_POST['thanhpho'];
		$_SESSION['customer']['quan'] = $_POST['quan'];
		$_SESSION['customer']['phuong'] = $_POST['phuong'];
		$_SESSION['customer']['diachi'] = htmlspecialchars($_POST['diachi']);
		$_SESSION['customer']['code'] = $_POST['code'];
		// $_SESSION['customer']['product'] = $_SESSION['cart']; 
	}
	
?>