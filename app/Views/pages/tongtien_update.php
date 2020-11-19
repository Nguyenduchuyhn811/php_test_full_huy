
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