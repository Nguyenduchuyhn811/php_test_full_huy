<section>
			<div class="v2_bnc_blog_option_top">
				<div class="container">
					<div class="row">
						<div class="blog_option_top_caption col-xs-12 col-sm-12 col-sm-12 col-lg-12">
							<h2>Dịch vụ & hỗ trợ1</h2>
							<p>Nhanh chóng nhất với thời gian linh hoạt</p>
						</div>
						<div class="blog_option_top_item col-xs-12 col-sm-12 col-sm-12 col-lg-12">
							<div class="item_blog col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<a href="<?php echo base_url(). '/product_item.php'?>">
									<img src="img/1510026400_triangular-arrows-sign-for-recycle.png">
								</a>
								<h3 class="option_top_title">
									<a href title="Đổi hàng trong 10 ngày">Đổi hàng trong 10 ngày</a>
								</h3>
								<p class="option_top_info">Khách hàng vui lòng  mang sản phẩm lỗi tới cửa hàng, NVBH sẽ kiểm tra đánh giá, xác định nguyên nhân lỗi</p>
							</div>
							<div class="item_blog col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<a href="<?php echo base_url(). '/product_item.php'?>">
									<img src="img/1510026849_medal-2.png">
								</a>
								<h3 class="option_top_title">
									<a href title="Bảo hành">Bảo hành</a>
								</h3>
								<p class="option_top_info">Bảo trì sản phẩm trọn đời với các quá trình làm mới, làm sạch, làm bóng, làm mềm sản phẩm, lỗi có thể khắc phục</p>
							</div>
							<div class="item_blog col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<a href="<?php echo base_url(). '/product_item.php'?>">
									<img src="img/1510027222_delivery-truck-4.png">
								</a>
								<h3 class="option_top_title">
									<a href title="Giao hàng nhanh">Giao hàng nhanh</a>
								</h3>
								<p class="option_top_info">Khách không còn phải phân vân về thời gian giao hàng, hàng sẽ được giao đến tay khách nhanh chóng</p>
							</div>
							<div class="item_blog col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<a href="<?php echo base_url(). '/product_item.php'?>">
									<img src="img/1510027397_shopping-support-calling.png">
								</a>
								<h3 class="option_top_title">
									<a href title="Hỗ trợ">Hỗ trợ</a>
								</h3>
								<p class="option_top_info">Nhằm nâng cao khả năng hỗ trợ, giải đáp thắc mắc từ phía khách hàng cũng như trải nghiệm của khách hàng</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="advertisement1">
				<div class="container">
					<div class="row">
						<div class="adv1_item col-xs-6 col-sm-6 col-md-3 col-lg-3">
							<p class="counter">400</p>
							<p class="title">Sản phẩm và chất lượng</p>
						</div>
						<div class="adv1_item col-xs-6 col-sm-6 col-md-3 col-lg-3">
							<p class="counter">57</p>
							<p class="title">Khuyến mãi</p>
						</div>
						<div class="adv1_item col-xs-6 col-sm-6 col-md-3 col-lg-3">
							<p class="counter">1000</p>
							<p class="title">Khách hàng</p>
						</div>
						<div class="adv1_item col-xs-6 col-sm-6 col-md-3 col-lg-3">
							<p class="counter">0</p>
							<p class="title">Đối tác</p>
						</div>
					</div>
				</div>
			</div>
			<div class="v2_bnc_blog_new">
				<div class="container">
					<div class="row">
						<div class="home_title">
							<h2>Tin mới</h2>
							<p>Luôn luôn cập nhật những tin mới nhất</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="home_content owl-carousel owl-theme">
								<?php 
									foreach ($news as $k => $v) {
								?>
								<div class="item">
									<a href="<?php echo base_url(). '/product_item.php'?>">
										<img src="<?php echo base_url(). '/img/'. $v['img'] ?>">
									</a>
									<h3><a href="<?php echo base_url(). '/product_item.php'?>"><?php echo $v['name'] ?></a></h3>
									<time><?php echo $v['date'] ?></time>
									<p><?php echo $v['name_discription'] ?></p>
								</div>
								<?php
									}
								?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="v2_bnc_blog_tab_product">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<ul class="nav nav-pills">
		  						<li class="active"><a data-toggle="pill" href="#menu1">Sản phẩm mới</a></li>
		  						<li><a data-toggle="pill" href="#menu2">Sản phẩm xem nhiều</a></li>
								<li><a data-toggle="pill" href="#menu3">Sản phẩm khuyến mãi</a></li>
							</ul>
							<div class="tab-content">
								<div id="menu1" class="tab-pane fade in active">
									<div class="product_slide_show owl-carousel owl-theme">
										<?php 
											foreach ($products as $value) {
										?>
											<div class="item" id="<?php echo $value['id']; ?>">
												<a href="<?php echo base_url(). '/product_item/'. $value['id']; ?>">
													<img src="<?php echo base_url() . '/img/' . $value['pic'];?>" title="<?php echo $value['name'];?>">
												</a>
												<div class="cart_mobile hidden-md hidden-lg"><button data="<?php echo $value['id']; ?>">Mua hàng</button></div>
												<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="<?php echo $value['id']; ?>" data-op="true">
													<a href="<?php echo base_url(). '/tamtinh/'. $value['id'] .'/add'; ?>" data="<?php echo $value['id']; ?>" data-add="true">
														<i class="fa fa-shopping-cart" aria-hidden="true"></i>
													</a>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item/'. $value['id']; ?>">
														<i class="fa fa-search" aria-hidden="true"></i>		
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
												</div>
												<h3><?php echo $value['name'];?></h3>
												<div class="price">
													<p value="<?php echo number_format($value['price']);?>"><?php echo number_format($value['price']);?> đ</p>
												</div>
											</div>
									    <?php	
										}
										?>
									</div>
								</div>
								<div id="menu2" class="tab-pane fade">
									<div class="product_slide_show owl-carousel owl-theme">
										<div class="item item13">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510151821_balo-laptop-du-liYch-da-boY-166.jpg" title="Balo laptop du lịch da bò 166">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item13">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item13">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Balo laptop du lịch da bò 166</h3>
											<div class="price">
												<p value="2100000">2.100.000 đ</p>
											</div>
										</div>
										<div class="item item14">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510152215_-------balo-laptop-da-boY-057.jpg" title="Balo laptop da bò 057">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item14">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item14">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Balo laptop da bò 057</h3>
											<div class="price">
												<p value="2500000">2.500.000 đ</p>
											</div>
										</div>
										<div class="item item15">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510152420_balo-laptop-da-boY-086.jpg" title="Balo laptop da bò 086">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item15">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item15">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Balo laptop da bò 086</h3>
											<div class="price">
												<p value="2690000">2.690.000 đ</p>
											</div>
										</div>
										<div class="item item16">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510152593_balo-laptop-da-boY-059.jpg" title="Balo lapto da bò 059">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item16">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item16">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Balo lapto da bò 059</h3>
											<div class="price">
												<p value="0">Liên hệ</p>
											</div>
										</div>
										<div class="item item17">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510630952_tuYi-da-du-liYch-6031.png" title="Túi da du lịch 603">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item17">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item17">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Túi da du lịch 603</h3>
											<div class="price">
												<p value="2400000">2.400.000 đ</p>
											</div>
										</div>
										<div class="item item18">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510631695_tuYi-troYYng-du-liYch-da-boY-vaYn-luYoYYi.jpg" title="Túi trống du lịch da bò vân lưới 612">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item18">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item18">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Túi trống du lịch da bò vân lưới 612</h3>
											<div class="price">
												<p value="1700000">1.700.000 đ</p>
											</div>
										</div>
										<div class="item item19">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510631900_tuYi-xaYch-du-liYch-da-boY-351-1.jpg" title="Túi xách du lịch da bò 351">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item19">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item19">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Túi xách du lịch da bò 351</h3>
											<div class="price">
												<p value="3800000">3.800.000 đ</p>
												<p>4.000.000 đ</p>
											</div>
										</div>
										<div class="item item20">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510632231_tuYi-xaYch-du-liYch-da-boY-390-1.jpg" title="Balo laptop du lịch da bò 166">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item20">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item20">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Balo laptop du lịch da bò 166</h3>
											<div class="price">
												<p value="2100000">2.100.000 đ</p>
											</div>
										</div>
										<div class="item item21">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510632827_tuYi-du-liYch-keYo-tay-da-boY-600-1.png" title="Túi du lịch kéo tay da bò 600">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item21">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item21">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<div class="sale">13%</div>
											<h3>Túi du lịch kéo tay da bò 600</h3>
											<div class="price">
												<p value="2100000">2.100.000 đ</p>
											</div>
										</div>
										<div class="item item22">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510633714_vali-keYo-da-boY-601-3.png" title="Vali kéo da bò 601">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item22">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item22">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Vali kéo da bò 601</h3>
											<div class="price">
												<p value="3900000">3.900.000 đ</p>
												<p>4.500.000 đ</p>
											</div>
										</div>
										<div class="item item23">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510633902_vali-keYo-tay-da-boY-607-3.png" title="Vali kéo tay da bò 607">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item23">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item23">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<div class="sale">7%</div>
											<h3>Vali kéo tay da bò 607</h3>
											<div class="price">
												<p value="3900000">3.900.000 đ</p>
												<p>4.500.000 đ</p>
											</div>
										</div>
										<div class="item item24">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510634156_caYYp-da-coYng-soYY-du-liYch-342-1.jpg" title="Cặp da công sở du lịch 342">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item24">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item24">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Cặp da công sở du lịch 342</h3>
											<div class="price">
												<p value="2400000">2.400.000 đ</p>
											</div>
										</div>
									</div>
								</div>
								<div id="menu3" class="tab-pane fade">
									<div class="product_slide_show owl-carousel owl-theme">
										<div class="item item25">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510631900_tuYi-xaYch-du-liYch-da-boY-351-1.jpg" title="Túi xách du lịch da bò 351">
											</a>
											<div class="sale">7%</div>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item25">Mua hàng</button></div>
											<div class="product_item_icon">
												<button id="add-cart" data="item25">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<h3>Túi xách du lịch da bò 351</h3>
											<div class="price">
												<p value="3800000">3.800.000 đ</p>
												<p>4.000.000 đ</p>
											</div>
										</div>
										<div class="item item26">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510632827_tuYi-du-liYch-keYo-tay-da-boY-600-1.png" title="Túi du lịch kéo tay da bò 600">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item26">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item26">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<div class="sale">13%</div>
											<h3>Túi du lịch kéo tay da bò 600</h3>
											<div class="price">
												<p value="2100000">2.100.000 đ</p>
											</div>
										</div>
										<div class="item item27">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510633902_vali-keYo-tay-da-boY-607-3.png" title="Vali kéo tay da bò 607">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item27">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item28">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<div class="sale">5%</div>
											<h3>Vali kéo tay da bò 607</h3>
											<div class="price">
												<p value="3900000">3.900.000 đ</p>
												<p>4.500.000 đ</p>
											</div>
										</div>
										<div class="item item28">
											<a href="<?php echo base_url(). '/product_item.php'?>">
												<img src="img/1510072819_tuYi-xaYch-nam-da-thaYYt-noname-15.6-inch--cm1.jpg" title="Túi xách nam da thật Noname 15.6 inch- CM125">
											</a>
											<div class="cart_mobile hidden-md hidden-lg"><button data="item28">Mua hàng</button></div>
											<div class="product_item_icon hidden-xs hidden-sm">
												<button id="add-cart" data="item28">
													<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												</button>
												<button class="search-item">
													<a href="<?php echo base_url(). '/product_item.php'?>">
														<i class="fa fa-search" aria-hidden="true"></i>
													</a>
												</button>
												<button id="compare-item">
													<i class="fa fa-exchange" aria-hidden="true"></i>
												</button>
											</div>
											<div class="sale">13%</div>
											<h3>Túi xách nam da thật Noname 15.6 inch- CM125</h3>
											<div class="price">
												<p value="1200000">1.200.000 đ</p>
												<p>1.300.000 đ</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="v2_bnc_advertisement2">
				<div class="container">
					<div class="row">
						<div class="adv2 col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<h3>Leather</h3>
							<p>Là nơi cung cấp kiến thức bổ ích về đồ da và những kinh nghiệm về cách phối trang phục cho đàn ông Việt. Địa chỉ kinh doanh đồ da nam số 1 Việt Nam. Chúng tôi đảm bảo về chất lượng sản phẩm và dịch vụ Tất cả sản phẩm của chúng tôi được thiết kế, sản xuất và giám sát bởi các chuyên gia kỹ thuật xuất sắc, hơn 20 năm kinh nghiệm trong lĩnh vực da thuộc</p>
						</div>
						<div class="adv2 col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="adv2_item">
								<div class="adv2_item_title">
									<span>Dịch vụ</span>
									<span class="item_title">100%</span>
								</div>
								<div class="adv2_item_bar">
									<span style="width: 100%"></span>
								</div>
							</div>
							<div class="adv2_item">
								<div class="adv2_item_title">
									<span>Cửa hàng</span>
									<span class="item_title">50%</span>
								</div>
								<div class="adv2_item_bar">
									<span style="width: 50%"></span>
								</div>
							</div>
							<div class="adv2_item">
								<div class="adv2_item_title">
									<span>Website</span>
									<span class="item_title">78%</span>
								</div>
								<div class="adv2_item_bar">
									<span style="width: 78%"></span>
								</div>
							</div>
							<div class="adv2_item">
								<div class="adv2_item_title">
									<span>Thiết kế</span>
									<span class="item_title">89%</span>
								</div>
								<div class="adv2_item_bar">
									<span style="width: 89%"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="v2_bnc_customer_opinion">
				<div class="container">
					<div class="row">
						<div class="v2_bnc_customer_opinion_title">
							<h3>Ý kiến khách hàng</h3>
						</div>
						<div class="customer_opinion_slide owl-carousel owl-theme">
							<div class="item">
								<figure>
									<a href="<?php echo base_url(). '/product_item.php'?>">
										<img src="img/1426406733_141180164151.jpg_crop190x190.jpg">
									</a>
								</figure>
								<figcaption>
									<div class="name_title">Nguyễn Quang Vũ</div>
									<p>
	                  					Sau một thời gian sử dụng WEBBNC, tôi rất hài lòng với kết quả mà WEBBNC mang lại. Rất nhiều khách hàng tìm kiếm sản phẩm trên Google biết đến website của tôi bởi website của tôi có thứ hạng cao trong tìm kiếm của Google. Tính năng của WEBBNC rất chuyên nghiệp, phong phú và dễ dùng.                  
	                  				</p>
								</figcaption>
							</div>
							<div class="item">
								<figure>
									<a href="<?php echo base_url(). '/product_item.php'?>">
										<img src="img/1426406705_141180961552.jpg_crop190x190.jpg">
									</a>
								</figure>
								<figcaption>
									<div class="name_title">Chị Nguyễn Trang Phương Trinh</div>
									<p>
	                  					Rất tuyệt vời! Thật khó tin là chúng tôi có thể lập được một website bán hàng trực tuyến lại đơn giản và nhanh chóng đến vậy. Từ khi có website số lượng đơn hàng tăng lên, công việc kinh doanh của vợ chồng tôi trở nên thuận lợi hơn rất nhiều. Lượng khách hàng biết đến và mua hàng của chúng tôi qua website tăng lên từng ngày.                                    
	                  				</p>
								</figcaption>
							</div>
							<div class="item">
								<figure>
									<a href="<?php echo base_url(). '/product_item.php'?>">
										<img src="img/1426406678_141223650342.jpg_crop190x190.jpg">
									</a>
								</figure>
								<figcaption>
									<div class="name_title">Bùi Thị Thủy</div>
									<p>
	                  					Giao diện dành cho người dùng và quản trị hệ thống của WEBBNC rất thân thiện. Để quản trị hệ thống, không đòi hỏi phải biết nhiều về công nghệ thông tin, mà đơn giản chỉ cần thực hiện vài thao tác nhỏ . Là dân IT tôi rất tin tưởng vào tính bảo mật của WEBBNC.              
	                  				</p>
								</figcaption>
							</div>
							<div class="item">
								<figure>
									<a href="<?php echo base_url(). '/product_item.php'?>">
										<img src="img/1426406594_141224237733.jpg_crop190x190.jpg">
									</a>
								</figure>
								<figcaption>
									<div class="name_title">Ông Nguyễn Sỹ Hùng</div>
									<p>
	                  					Tính năng phong phú, tùy biến giao diện linh hoạt. Và điều tôi hài lòng nhất là WEBBNC luôn có thêm những tính năng mới để thúc đẩy việc kinh doanh của tôi. Điển hình tính năng mới mà tôi thích nhất là Vchat. Nhờ tính năng này tôi có thể trả lời thắc mắc ngay của khách ghé thăm website, tôi biết được ai đang xem sản phẩm gì trên website của tôi, và tôi có thể chủ động chat với khách hàng để chăm sóc họ.                  
	                  				</p>
								</figcaption>
							</div>
							<div class="item">
								<figure>
									<a href="<?php echo base_url(). '/product_item.php'?>">
										<img src="img/1426406561_141180156884.jpg_crop190x190.jpg">
									</a>
								</figure>
								<figcaption>
									<div class="name_title">Bùi Nguyễn Hoàng Duy </div>
									<p>
	                  					Trang web của tôi đã được thiết kế đúng như mong muốn. Tôi thật sự rất ấn tượng với phong cách làm việc chuyên nghiệp của Công ty. Giao diện phong phú phù hợp với những sản phẩm công ty đang kinh doanh. Quản trị web rất dễ sử dụng, đầy đủ tính năng.                  
	                  				</p>
								</figcaption>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<!-- <section>
			<?php 
				echo "<pre>";
				var_dump($panertop);
				echo "</pre>";
			?>
		</section> -->
