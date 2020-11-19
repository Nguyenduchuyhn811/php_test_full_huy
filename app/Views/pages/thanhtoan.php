<!-- <?php 
	// session_start();

	if (!isset($_GET['city']) || $_GET['city']=='') {
		$data = 1;
	}else{
		$data = $_GET['city'];
	}
	// echo $data;
	// print_r($quan);
	// print_r($discount);


	// print_r($cart);


	$_SESSION['lasttotal'] = $_SESSION['total'];
	$checkmin = 3;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$code = $_POST['code'];
		if (!empty($code)) {
			foreach ($discount as $k => $v) {
				if ($v['code'] == $code) {
					$place 	= $k;
					if ($total >= $discount[$place]['min']) {
						$type = $discount[$place]['type'];
						$p = $discount[$place]['value']; 
						// $test = true;
						if ($type == 0) {
							$_SESSION['lasttotal'] = $total - ($total * $p / 100);
						}elseif($type == 1){
							$_SESSION['lasttotal'] = $total - $p;
						}
						$checkmin = 1;
					}else{
						$checkmin = 2;
					}
				}
			}
		}
	}
?> -->





<!-- fix chọn thành phố phường quận --> 
<!-- chưa sửa -->



	<div class="thanhtoanbackground">
		<div class="thanhtoanlogo"><div class="container"><div class="row"><a href="http://localhost:81/occko/webdong/index.php"><img src="<?php echo base_url() .'/img/1510630659_t2.png'?>"></a></div></div></div>
		<div class="thanhtoanshow">
			<div class="container">
				<div class="row">
					<form action method="POST">
						<div class="thanhtoanbar">
							<div class="baritem col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="thanhtoannum">
									<b>1</b>
									Địa chỉ
								</div>
								<div class="thanhtoandiachi">
									<input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="text" name="tenkhachhang" placeholder="Họ và tên" value="<?php if(!empty($_POST['tenkhachhang'])){echo $_POST['tenkhachhang']; } ?>">
									<input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="text" name="email" placeholder="Email" value="<?php if(!empty($_POST['email'])){echo $_POST['email']; } ?>">
									<input class="col-xs-12 col-sm-12 col-md-12 col-lg-12" type="text" name="sodienthoai" placeholder="Số điện thoại" value="<?php if(!empty($_POST['sodienthoai'])){echo $_POST['sodienthoai']; } ?>">
									<select id="thanhpho" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" name="thanhpho">
										<option value="0">- Chọn thành phố -</option>
										<?php 
											foreach ($city as $n) {
										?>
											<option value="<?php echo $n['matp'] ?>" <?php if (isset($_POST['thanhpho'])) {if($n['matp'] == $_POST['thanhpho']){echo 'selected'; } }?>><?php echo $n['name'] ?></option>
										<?php
											}
										?>
									</select>
									<select id="quan" class="col-xs-12 col-sm-12 col-md-6 col-lg-6" name="quan">
										<?php
											if (isset($_POST['sub'])) {
												if (isset($_POST['thanhpho'])) {
													echo "<option value=''>- Chọn quận huyện -</option>";
													$matp = $_POST['thanhpho'];
													foreach ($distric as $qhh) {
										?>
											<option value="<?php echo $qhh->maqh ?>" <?php if (isset($_POST['quan'])) {if($qhh->maqh == $_POST['quan']){echo 'selected'; } }?>><?php echo $qhh->name ?></option>
										<?php
													}
												}else{
										?>
											<option value="">- Chọn quận huyện -</option>
										<?php
												}
											}else{
										?>
											<option value="">- Chưa chọn thành phố -</option>
										<?php
											}
										?>
									</select>
									<select id="phuong" class="col-xs-12 col-sm-12 col-md-6 col-lg-6" name="phuong">
										<?php
											if (isset($_POST['sub'])) {
												if (isset($_POST['quan'])) {
													echo "<option value=''>- Chọn quận huyện -</option>";
													$maqh = $_POST['quan'];
													// $sqlphuong    = "SELECT * FROM devvn_xaphuongthitran WHERE maqh = '$maqh'";
													// $phuong       = mysql($sqlphuong);
													foreach ($phuong as $xp => $xpp) {
										?>
											<option value="<?php echo $xpp['xaid'] ?>" <?php if (isset($_POST['phuong'])) {if($xpp['xaid'] == $_POST['phuong']){echo 'selected'; } }?>><?php echo $xpp['name'] ?></option>
										<?php
													}
												}else{
										?>
											<option value="">- Chọn xã phường -</option>
										<?php
												}
											}else{
										?>
											<option value="">- Chưa chọn quận -</option>
										<?php
											}
										?>
									</select>
									<textarea name="diachi" id="diachi" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Số nhà, đường/phố, tòa nhà, xã/phường ,....... Vui lòng điền đầy đủ thông tin."><?php if(!empty($_POST['diachi'])){echo $_POST['diachi']; } ?></textarea>
								</div>
								<div class="thanhtoanship">
									<div class="shipopption"><i class="fa fa-truck"></i>Dịch vụ giao hàng</div>
									<p>Vui Lòng chọn địa điểm cần giao hàng tới.</p>
								</div>
							</div>
							<div class="baritem col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="thanhtoannum">
									<b>2</b>
									Phương thức thanh toán
								</div>
								<div class="thanhtoanphuongthuc">
									<div class="thanhtoanphuongthucitem">
										<div class="thanhtoanphuongthucitemname" data="checkboxx1">
											<b id="checkboxx1" class="checkboxx"><i class="fa fa-square-o" aria-hidden="true"></i></b><b>Thanh toán tại nhà (COD)</b>
										</div>
										<div class="thanhtoanphuongthucitemlist">
											<ul>
												<li>- Hình thức thanh toán được sử dụng nhiều nhất</li>
												<li>- Chỉ thanh toán khi đã nhận được hàng</li>
												<li>- Bạn sẽ phải trả một khoản phí nhỏ cho người giao hàng</li>
											</ul>
										</div>
									</div>
									<div class="thanhtoanphuongthucitem">
										<div class="thanhtoanphuongthucitemname" data="checkboxx2">
											<b id="checkboxx2" class="checkboxx"><i class="fa fa-square-o" aria-hidden="true"></i></b><b>Thanh toán bằng Ví điện tử Bảo Kim</b>
										</div>
										<div class="thanhtoanphuongthucitemlist">
											<ul>
												<li>Đăng nhập tài khoản của bạn</li>
											</ul>
											<a href="#">Đăng nhập</a>
										</div>
									</div>
									<div class="thanhtoanphuongthucitem">
										<div class="thanhtoanphuongthucitemname" data="checkboxx3">
											<b id="checkboxx3" class="checkboxx"><i class="fa fa-square-o" aria-hidden="true"></i></b><b>Chuyển khoản tại quầy giao dịch Ngân hàng</b>
										</div>
									</div>
									<div class="thanhtoanphuongthucitem">
										<div class="thanhtoanphuongthucitemname" data="checkboxx4">
											<b id="checkboxx4" class="checkboxx"><i class="fa fa-square-o" aria-hidden="true"></i></b><b>Chuyển khoản qua ngân hàng (Tùy chọn)</b>
										</div>
										<div class="thanhtoanphuongthucitemlist">
											<ul class="selectbank">
												<li>
													<p>Ngân hàng: techcom</p>
													<p>Chi nhánh: phú thọ</p>
													<p>Chủ tài khoản: Ông trùm</p>
													<p>Số tài khoản: 888989898312</p>
												</li>
												<li>
													<p>Ngân hàng: viettinbank</p>
													<p>Chi nhánh: Hà Nội</p>
													<p>Chủ tài khoản: Ông trùm</p>
													<p>Số tài khoản:6524562456264</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="baritem col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<div class="thanhtoannum">
									<b>3</b>
									Hóa đơn mua hàng
									<b class="print"><i class="fa fa-print" aria-hidden="true"></i></b>
								</div>
								<div class="thanhtoanlist">
									<strong>Danh sách sản phẩm</strong>
									<dir>
									<?php
									if (!empty($cart)) {
										foreach ($cart as $value) {									
									?>
											<div class="thanhtoanitem">
												<div class="row">
													<figure class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
														<a href="<?php echo base_url()?>/sanpham/sanphamcon/product_item?id=<?php echo $value['id']?>">
															<img src="<?php echo base_url(). '/img/' . $value['pic']?>">
														</a>
													</figure>
													<figcaption class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
														<h4>
															<a href="<?php echo base_url()?>/sanpham/sanphamcon/product_item?id=<?php echo $value['id']?>"><?php echo $value['name']?></a>
														</h4>
														<p>SL: <?php echo $value['quantity']?> x <?php echo number_format($value['price'])?></p>
														<b class="thanhtoanprice">Tiền: <?php echo number_format($value['quantity']*$value['price']); $t = $value['quantity']*$value['price']?> Đ</b>
													</figcaption>
													<div class="thanhtoandelete col-xs-12 col-sm-12 col-md-2 col-lg-2">
														<a href="http://localhost:81/occko/webdong/html/reloadweb.php?del=<?php echo $value['id']?>">
															<i class="fa fa-trash-o" aria-hidden="true"></i>
														</a>
													</div>
												</div>
											</div>
									<?php
										}
									}
									?>
									</dir>
								</div>
								<div class="thanhtoantotal">
									<div class="thanhtoanname">Tổng tiền:
										<b class="thanhtoantotalright">
											<?php echo number_format($total) ?> Đ
										</b>
									</div>
									<div class="thanhtoanname">Phí ship:<b class="ship">Liên hệ</b></div>
									<div class="thanhtoanname">Phí Cod ( thu hộ ):<b>Liên hệ</b></div>
									<div class="thanhtoanname">Mã giảm giá:
										<div class="discount">
											<form>
												<input type="text" name="code">
												<input class="done" name="sub" type="submit">
											</form>
										</div>
									</div>
									<div class="thanhtoanname">
										<?php
											if ($checkmin == 1) {
												echo "(Đã áp dụng mã giảm giá)";
											}elseif($checkmin == 2){
												echo "(Đơn hàng không đủ điều kiện giảm giá)";
											}elseif($checkmin == 3){
												echo "(Đã áp dụng sai mã giảm giá)";
											}
										?>									</div>
									<div class="tongthanhtoan">Tổng tiền đơn hàng:<b class="thanhtoantotalright"><?php echo number_format($total) ?> Đ</b></div>
								</div>
								<textarea placeholder="Ghi chú thêm"></textarea>
								<div class="thanhtoanbutton">
									<div class="row">
										<div class="buttonitem col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<a class="thanhtoanmuathem" href="http://localhost:81/occko/webdong/index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>Mua thêm</a>
										</div>
										<div class="buttonitem col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<button class="thanhtoanxong" type="submit" name="order" value="Đặt hàng">
												<i class="fa fa-shopping-cart" aria-hidden="true"></i> Đặt hàng
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>

