<div class="header_cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</div>
								<div class="header_social_cart">
									<div class="row">
										
									<?php 
										if (empty($cart)) {
											echo '<center class="col-xs-12" id="cart_top">Hiện chưa có sản phẩm nào trong giỏ hàng của bạn</center>';
										}else{
											foreach ($cart as $value) {
									?>
											<div class="header_social_cart_item" data-product="<?php echo $value['id']?>">
												<figure class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
													<img src="<?php echo base_url() .'/img/'. $value['pic']; ?>" class="img-responsive">
												</figure>
												<figcaption class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
													<div class="sanpham"><?php echo $value['name']; ?></div>
													<div class="giatien">Giá tiền: </div>
													<div class="soluong">Số lượng: <?php echo $value['quantity']; ?> x <?php echo number_format($value['price']); ?></div>
												</figcaption>
												<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
												<a class="reload" href="http://localhost:81/reloadweb?del=<?php echo $value['id']; ?>">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</a>
											</div>
										</div>
									<?php
											}
										}
									?>	
									<div class="header_social_cart_total col-xs-12"><p>Tổng: <strong>
										<?php 
											echo number_format($total);
										?> 
									Đ</strong></p></div>
									<div class="col-xs-12"><a href="<?php echo base_url() . '/tongtien'?>">Tiến hành đặt hàng</a></div>
									</div>							
								</div>
								<div class="number" id="number_item" data-target="quantity_cart">
									<?php 
										if (empty($quantity)) {
											echo "0";
										}else{
											echo $quantity;
										}										
									?>
								</div>