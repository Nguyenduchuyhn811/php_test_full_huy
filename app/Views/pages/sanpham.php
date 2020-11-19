<?php
	//phân trang
	$products = $pagination['products'];
	$pager = $pagination['pager'];
?>	
		<section>
			<div class="container">
				<div class="row">
					<div class="v2_bnc_product_breadcrumb col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ol class="breadcrumb">
							<li>
								<a href="<?php echo base_url().'index' ?>">Trang chủ</a>
							</li>
							<li>
								<a href="<?php echo base_url().'sanpham' ?>">Sản phẩm</a>
							</li>
						</ol>
					</div>
					<div class="v2_bnc_product_main">
						<div class="product_top_title">
							<h1>Sản phẩm</h1>
						</div>
						<!-- <div class="v2_bnc_blog_tab_product_search col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<strong>Tìm kiếm sản phẩm</strong>
							<input id="search_box" type="text" name="search" value="<?php if(!empty($_POST['search'])){echo $_POST['search'];} ?>">

							<script type="text/javascript">
								$('#search_box').on('input',function(){
									var link = "<?php echo base_url().'' ?>sanpham?page=1";
									link = link + '&search='+$('#search_box').val();
									$('.v2_bnc_blog_tab_product_search button a').attr('href',link);
								});
							</script>

							<button>
								<a href="<?php echo base_url().'' ?>sanpham?page=1">Gửi</a>
							</button>
						</div> -->
						
					<?php 
						foreach ($products as $key => $value) {
					?>
						<div class="product_list_item col-lg-6 col-sm-6 col-md-3 col-lg-3">
							<a href="<?php echo base_url().'/product_item/' . $value['id']; ?>">
								<img src="<?php echo base_url().'/img/'. $value['pic']?>" title="<?php echo $value['name']?>">
							</a>
							<div class="product_item_icon">
								<button id="add-cart">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</button>
								<button class="search-item">
									<a href="<?php echo base_url().'product_item?id=' . $value['id']; ?>">
										<i class="fa fa-search" aria-hidden="true"></i>
									</a>
								</button>
								<button id="compare-item">
									<i class="fa fa-exchange" aria-hidden="true"></i>
								</button>
							</div>
							<h3><?php echo $value['name']; ?></h3>
							<div class="price">
								<p><?php echo number_format($value['price']) ?> Đ</p>
							</div>
						</div>
					<?php
						}
					?>
						
					</div>
					<div class="v2_bnc_video_button col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<ul class="video_button">
							<?= $pager->links() ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
			