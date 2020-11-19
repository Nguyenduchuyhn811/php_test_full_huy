<?php  
	foreach ($products as $value) {
?>
	<section>
		<div class="container">
			<div class="row">
				<div class="v2_bnc_product_breadcrumb col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<ol class="breadcrumb">
						<li>
							<a href="http://localhost:81/occko/webdong/index.php">Trang chủ</a>
						</li>
						<li>
							<a href="http://localhost:81/sanpham.php">Sản phẩm</a>
						</li>
						<li>
							<a href="http://localhost:81/sanpham/balo.php">Balo</a>
						</li>
						<li>
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.php">Balo laptop du lịch da bò 166</a>
						</li>
					</ol>
				</div>
				<div class="v2_bnc_product_main">
					<figure class="product_img col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<img id="zoom_01" src="<?php echo base_url() .'/img/' . $value['pic'] ?>" data-zoom-image="<?php echo base_url() . $value['pic']?>"/>
						<div class="clear-box"></div>
						<div class="product_slide owl-carousel owl-theme">
							<div class="item">
								<a href="#" data-image="../../../img/1510151821_balo-laptop-du-liYch-da-boY-166.jpg" data-zoom-image="../../../img/1510151821_balo-laptop-du-liYch-da-boY-166.jpg">
							    	<img id="img_01" src="../../../img/1510151821_balo-laptop-du-liYch-da-boY-166.jpg" />
								</a>
							</div>
							<div class="item">
								<a href="#" data-image="../../../img/1510801503_balo-laptop-du-liYch-da-boY-1663.jpg" data-zoom-image="../../../img/1510801503_balo-laptop-du-liYch-da-boY-1663.jpg">
							    	<img id="img_01" src="../../../img/1510801503_balo-laptop-du-liYch-da-boY-1663.jpg" />
								</a>
							</div>
							<div class="item">
								<a href="#" data-image="../../../img/1510151819_balo-laptop-du-liYch-da-boY-1662.jpg" data-zoom-image="../../../img/1510151819_balo-laptop-du-liYch-da-boY-1662.jpg">
							    	<img id="img_01" src="../../../img/1510151819_balo-laptop-du-liYch-da-boY-1662.jpg" />
								</a>
							</div>
						</div>
					</figure>
					<figcaption class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<h2><?php echo $value['name']; ?></h2>
						<p>Cặp da thật nam CM68 với kiểu dáng thiết kế mới nhẹ nhàng đẹp mắt, phong cách quyến rũ, điều này được thể hiện bởi sự kết hợp rất hài hòa giữa thiết kế kiểu mới cùng màu sắc nâu cá tính. Mẫu sản phẩm cặp da nam giá rẻ có thiết kế mới nhất năm đang được nhiều quý khách hàng ưa chuộng. </p>
						<ul>
							<li class="">Giá sản phẩm: </li>
							<li class="product_price"><p><?php echo number_format($value['price']) ?></p></li>
							<div class="clearfix"></div>
							<li class="">Lượi xem: </li>
							<li class="">233</li>
							<div class="clearfix"></div>
							<li class="">Tình trạng</li>
							<li class="">Hàng mới</li>
							<div class="clearfix"></div>
							<div class="product_box">
								<option class="giam">-</option>
								<option id="clicks" value="1">1</option>
								<option class="tang">+</option> 	
							</div>
							<script type="text/javascript">
								clicks = 1;
								$('.tang').on('click', function(){
									clicks = clicks + 1;
									document.getElementById("clicks").innerHTML = clicks;
    								document.getElementById("clicks").value = clicks;
    								var addCart= 'http://localhost:81/tongtien/<?php echo $value['id']?>';
        							addCart = addCart+'/'+ clicks;
        							console.log(addCart);
        							$('.add').attr('href',addCart);
    							});
    							$('.giam').on('click', function(){
								    if(clicks.valueOf()!=1 || clicks.valueOf()>1)
								        {
								           clicks = clicks - 1;
								           document.getElementById("clicks").innerHTML = clicks;
								           document.getElementById("clicks").value = clicks;
								        }
								        var addCart= 'http://localhost:81/tongtien/<?php echo $value['id']?>';
	        							addCart = addCart+'/'+ clicks;
	        							console.log(addCart);
	        							$('.add').attr('href',addCart); 
								    });
							</script>
						</ul>
						<a class="add" type="submid" href="http://localhost:81/tongtien/<?php echo $value['id']?>/1">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
							THÊM VÀO GIỎ HÀNG
						</a>
						<div class="product_social_icon">
							<button style="background-color: rgb(59, 89, 152)">
								<i class="fa fa-facebook" aria-hidden="true"></i>
								Facebook
							</button>
							<button style="background-color: rgb(29, 161, 242)">
								<i class="fa fa-twitter" aria-hidden="true"></i>
								Twitter
							</button>
							<button style="background-color: rgb(255, 101, 80)">
								<i class="fa fa-plus" aria-hidden="true"></i>
								Thêm...
							</button>
						</div>
					</figcaption>
					<div class="clearfix"></div>
					<div class="product_describe col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="describe nav nav-tabs">
	  						<li class="active"><a data-toggle="tab" href="#menu1">THÔNG TIN CHI TIẾT</a></li>
	  						<li><a data-toggle="tab" href="#menu2">MÔ TẢ</a></li>
							<li><a data-toggle="tab" href="#menu3">HƯỚNG DẪN MUA HÀNG</a></li>
							<li><a data-toggle="tab" href="#menu4">MÔ TẢ VẮN TẮT</a></li>
						</ul>

						<div class="tab-content">
							<div id="menu1" class="tab-pane fade in active">
								<table class="table table-bordered table-condensed table-striped table-hover">
									<tbody>
										<tr>
											<td class="col-xs-4">Xuất xứ</td>
											<td class="col-xs-8">Hồng Kông</td>
										</tr>
										<tr>
											<td class="col-xs-4">Kích cỡ</td>
											<td class="col-xs-8">36 x 10 x 28 (cm)</td>
										</tr>
										<tr>
											<td class="col-xs-4">Chất liệu</td>
											<td class="col-xs-8">Da thật 100%</td>
										</tr>
										<tr>
											<td class="col-xs-4">Màu sắc</td>
											<td class="col-xs-8">Màu nâu</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div id="menu2" class="tab-pane fade">
								<div style="text-align: justify;">
									<span style="font-weight: 600">Túi xách nam da thật Noname 15.6 inch - CM124</span>
									có thiết kế cơ bản với không gian lớn tối ưu cho nhu cầu sử dụng điều này được thể hiện bởi sự kết hợp rất hài hòa giữa thiết kế kiểu mới cùng màu sắc nâu cá tính. Mẫu sản phẩm túi nam có thiết kế mới nhất năm đang được nhiều quý khách hàng ưa chuộng. 
									<br>
									<br>
									<span style="font-size:16px; color:rgb(128, 0, 0)"><strong>Thông số sản phẩm túi xách nam da thật Noname 15.6 inch - CM124:</strong></span>
									<br>
									<br>
									<span style="color:rgb(105, 105, 105)">
										<strong>Màu sắc:</strong>
									</span>
									Màu nâu.
									<br>
									<span style="color:rgb(105, 105, 105)">
										<strong>Chất liệu:</strong>
									</span>
									Da thật 100%.
									<br>
									<span style="color:rgb(105, 105, 105)">
										<strong>Kích thước:</strong>
									</span>
									39 x 30 x 9 (cm).
									<br>
									<span style="color:rgb(105, 105, 105)">
										<strong>Xuất xứ:</strong>
									</span>
									Hồng Kông.
									<br>
									<span style="color:rgb(105, 105, 105)">
										<strong>Bảo hành</strong>
									</span>
									12 tháng.
									<br>
									<span style="color:rgb(105, 105, 105)">
										<strong>Kiểu dáng</strong>
									</span>
									Cặp xách da nam.
									<br>	
									<br>
									<span style="font-size:16px; color:rgb(128, 0, 0)"><strong>Tính năng và lợi ích của sản phẩm túi xách nam da thật Noname 15.6 inch - CM124:</strong></span>
									<br>
									<br>
									<span style="color:rgb(105, 105, 105)">
										<strong>Tính năng</strong>
										Mẫu túi da nam phù hợp với khách hàng có nhu cầu để đồ lớn và bền bỉ chắc chắn theo thời trang. Người sở hữu sự tự tin, phong cách mạnh mẽ trong đám đông với mẫu túi xách da thật nam này. Các đường chỉ được may chau chuốt tỉ mỉ với độ tinh tế cực cao đến từng góc cạnh sản phẩm.
									</span>
									<span style="color:rgb(105, 105, 105)">
										<strong>Lợi ích sản phẩm:</strong>
										  Với ba ngăn chính bên trong và 3 ngăn phụ bên ngoài, quý khách có thể để rất rắt nhiều đồ khi ra ngoài nào là laptop để làm việc, smartphone máy tính bảng, tài liệu, để ví cá nhân. Chất liệu làm nên điểm nhấn cho sản phẩm là da thật cùng mẫu mã mới nhất, xu hướng lâu dài, nên bạn có thể yên tâm trong việc sử dụng qua thời gian dài mà vẫn đảm bảo ấn tượng thời trang cho mình với người khách.
									</span>
									<br>
									<br>
									<em>Để biết thêm chi tiết sản phẩm, Quý khách vui lòng xem Hình ảnh chi tiết sản phẩm dưới đây.</em>
									<br>
									<br>
									<em><strong>XEM CHI TIẾT HÌNH ẢNH SẢN PHẨM:</strong></em>
									<div style="text-align: center;">
										<img src="../../../img/1510025069_noname1.jpg">
										<br>
										<img src="../../../img/1510025263_noname2.jpg">
										<br>
										<img src="../../../img/1510025272_noname3.jpg">
										<br>
										<img src="../../../img/1510025282_noname4.jpg">
										<br>
										<img src="../../../img/1510025294_noname5.jpg">
										<br>
										<img src="../../../img/1510025304_noname6.jpg">
										<br>
										<img src="../../../img/1510025313_noname7.jpg">
										<br>
										<img src="../../../img/1510025321_noname8.jpg">
									</div>
									<br>
									<br>
									<span style="font-size:16px; color:rgb(128, 0, 0)"><strong>Hotline của chúng tôi luôn sẵn sàng phục vụ quý khách:</strong></span>
									<br>
									<br>
									Trụ sở chính: Tầng 8, 51 Lê Đại Hành, Hai Bà Trưng, Hà Nội
									<br>
									Chi nhánh HCM: Tháp R1 The everich 968 đường 3 tháng 2 - Phường 15 - Quân 11 - TP.HCM
									<br>
									Chi nhánh Vinh: Số 02B - Đường Phạm Ngũ Lão - Phường Cửa Nam - TP Vinh
									<br>
									Hỗ trợ: 1900 2008
									<br>
									Email: contact@bncgroup.com.vn
									<br>
									<br>
									<em>Chúc các bạn shoping vui vẻ và mua được sản phẩm ưng ý ^^</em>
								</div>
							</div>
							<div id="menu3" class="tab-pane fade">
								Đặt hàng online hoặc có thể liên hệ trực tiếp đến cửa hàng.
							</div>
							<div id="menu4" class="tab-pane fade">
								Cặp da thật nam CM68 với kiểu dáng thiết kế mới nhẹ nhàng đẹp mắt, phong cách quyến rũ, điều này được thể hiện bởi sự kết hợp rất hài hòa giữa thiết kế kiểu mới cùng màu sắc nâu cá tính. Mẫu sản phẩm cặp da nam giá rẻ có thiết kế mới nhất năm đang được nhiều quý khách hàng ưa chuộng. 
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="product_tags col-xs-12" style="margin-top: 50px">Tags:</div>
					<div class="product_describe1 col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="nav nav-tabs">
	  						<li class="active"><a data-toggle="tab" href="#menu5">Bình luận bằng tài khoản Facebook</a></li>
	  						<li><a data-toggle="tab" href="#menu6">Bình luận bằng tài khoản Google+</a></li>
						</ul>

						<div class="tab-content">
							<div id="menu5" class="tab-pane fade in active">
								<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="" data-numposts="5"></div>
							</div>
							<div id="menu6" class="tab-pane fade">
							</div>
						</div>
					</div>
					<div class="product_same">
						<div class="product_same_top col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h2>SẢN PHẨM CÙNG DANH MỤC</h2>
						</div>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
								<img src="../../../img/1510151821_balo-laptop-du-liYch-da-boY-166.jpg" title="Balo laptop du lịch da bò 166">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3>Balo laptop du lịch da bò 166</h3>
							<div class="price">
								<p id="price-product">2.100.000 đ</p>
							</div>
						</div>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
								<img src="../../../img/1510152420_balo-laptop-da-boY-086.jpg" title="Balo laptop da bò 086">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3>Balo laptop da bò 086</h3>
							<div class="price">
								<p>2.690.000 đ</p>
							</div>
						</div>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
								<img src="../../../img/1510152215_-------balo-laptop-da-boY-057.jpg" title="Balo laptop da bò 057">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3>Balo laptop da bò 057</h3>
							<div class="price">
								<p>2.500.000 đ</p>
							</div>
						</div>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
								<img src="../../../img/1510152593_balo-laptop-da-boY-059.jpg" title="Balo laptop da bò 059">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3>Balo laptop da bò 059</h3>
							<div class="price">
								<p>Liên hệ</p>
							</div>
						</div>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
								<img src="../../../img/1510634156_caYYp-da-coYng-soYY-du-liYch-342-1.jpg" title="Cặp da công sở du lịch 342">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3>Cặp da công sở du lịch 342</h3>
							<div class="price">
								<p>2.400.000 đ</p>
							</div>
						</div>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
								<img src="../../../img/1510633902_vali-keYo-tay-da-boY-607-3.png" title="Vali kéo tay da bò 607">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3>Vali kéo tay da bò 607</h3>
							<div class="price">
								<p>3.900.000 đ</p>
								<p>4.200.000 đ</p>
							</div>
						</div>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
								<img src="../../../img/1510633714_vali-keYo-da-boY-601-3.png" title="Vali kéo da bò 601">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3>Vali kéo da bò 601</h3>
							<div class="price">
								<p>3.900.000 đ</p>
							</div>
						</div>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
								<img src="../../../img/1510632827_tuYi-du-liYch-keYo-tay-da-boY-600-1.png" title="Túi du lịch kéo tay da bò 600">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="http://localhost:81/sanpham/sanphamcon/product_item001.html">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3>Túi du lịch kéo tay da bò 600</h3>
							<div class="price">
								<p>3.900.000 đ</p>
								<p>4.500.000 đ</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3"></script>
	</section>
<?php  
}
?> 