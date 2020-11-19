<section class="tongtien_page">
		<div class="container">
			<div class="row">
				<div class="tienleft col-xs-12 col-sm-12 col-md-8 col-lg-8" id="product_cart_list">
					<?php 
						if (!empty($cart)){ 
							// print_r('<pre>');
							// print_r($cart);	
							foreach ($cart as $value) { ?>
								<div id="<?php echo $value['id'] ; ?>" class="tienleft_item">
									<div class="row">
										<figure class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
											<img src="<?php echo base_url() . '/img/'. $value['pic']; ?>">
										</figure>
										<figcaption class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
											<h3><a href="<?php echo base_url().'product_item?id='. $value['id'] .'&sl='. $value['quantity']?>"><?php echo $value['name']; ?></a></h3>
											<p>Giá tiền: <?php echo number_format($value['price']); ?> đ</p>
											<dir>Số lượng: <?php echo $value['quantity']; ?></dir>
											<button class="delete" data-id="<?php echo $value['id'] ; ?>" data-total='<?php echo $value['price'] ; ?>'><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa sản phẩm</button>
										</figcaption>
									</div>
								</div>
							<?php
							}
						}else{
						echo "chua co san pham trong gio hang";
						} 
					?>
					<div id="total" class="tongtienprice" data-total="<?php echo $total?>">Tổng giá sản phẩm: <strong><?php echo number_format($total)?> Đ</strong></div>
				</div>

	
				<div class="tienright col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<img src="<?php echo base_url().'/img/1510630659_t2.png'?>" class="img-responsive">
							<p>Sản phẩm của chúng tôi luôn làm khách hàng hài lòng và thoải mái. Đem đến cho người dùng sự sang trọng và thanh lịch</p>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<a href="<?php echo base_url().'/index.php'?>">Mua tiếp hàng ?</a>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<a href="<?php echo base_url().'/huygiohang'?>">Xóa giỏ hàng ?</a>
						</div>
						<div class="thanhtoan col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="<?php echo base_url().'/thanhtoan?'?>">Thanh toán</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
