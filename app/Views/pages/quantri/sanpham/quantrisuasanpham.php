
			<form  method="POST" action="<?php echo base_url() . '/quantri/listproduct/update'?>" enctype="multipart/form-data">
				<div class="quantrishowoff col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="quantriname col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>
								<a href="http://localhost:81/occko/webdong/html/quantri.php">
									Thông tin sản phẩm sản phẩm
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
										<?php 
											$check = false;
											foreach ($products as $value) {
												if ($value['id'] == $id_topProduct) {
													$check = true;
													$getid = $value['id'];
													$product = $value;
												}
											};
											// 	
											// if ($check == false) {
												
											// }
										?>
										<div class="inputform col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-4 col-lg-4">Tên sản phẩm <span>*</span></label>
												<div class="col-md-8 col-sm-12 col-xs-12 col-lg-8"><input type="text" name="name" placeholder="ABCD" value="<?php
												echo $product['name']; ?>"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-6 col-lg-6">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-4 col-lg-4">Tên gọi khác <span>*</span></label>
												<div class="col-md-8 col-sm-12 col-xs-12 col-lg-8"><input type="num" name="" placeholder="abcd1234"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">URL SEO <span>*</span></label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10"><input type="text" name="url" placeholder="https://example.com" value="<?php echo $product['url']; ?>"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Giá bán sản phẩm <span>*</span></label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10"><input type="num" name="price" placeholder="100000" value="<?php
												echo $product['price']; ?>"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Trọng lượng </label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10"><input type="num" name="weight" placeholder="100" value="<?php
												echo $product['weight']; ?>"></div>
											</div>
										</div>
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Chọn danh mục <span>*</span></label>
												<div class="quantritinhtrang col-xs-12 col-sm-12 col-md-10 col-lg-10">
													<select id="search_type" name="type">
														<option value="0">Danh mục gốc</option>
														<?php 
															//thiết lâp dao diện
															function showCategories($product_type, $parent_id = 0, $char = ''){
																foreach ($product_type as $x) {
																	if ($x->parent_id == $parent_id){
														?>
																		<option id="op<?php echo $x->id ?>" value="<?php echo $x->id ?>"><?php echo $char . $x->name ?></option>
														<?php
																		// unset($productstype[$z]);
																		showCategories($product_type, $x->id, $char.'---');
																	}				
																}
															}
															// hiển thị dao diện
															showCategories($product_type);
														?>
													</select>
													<script type="text/javascript">
														var x = "op" + "<?php echo $product['type'];?>";
														console.log(x);
														document.getElementById(x).selected = "true";
													</script>
												</div>
											</div>
										</div>
										<!-- <div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
										</div> -->
										<div class="inputform col-xs-12 col-sm-12 col-md-12 col-lg-12">
											<div class="row">
												<label class="col-xs-12 col-sm-12 col-md-2 col-lg-2">Số lượng sản phẩm <span>*</span></label>
												<div class="col-md-10 col-sm-12 col-xs-12 col-lg-10"><input type="num" name="num" placeholder="100"  value="<?php
												echo $product['num']; ?>"></div>
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
										<input type="file" id="img" name="img" accept="image/*" value="<?php echo $product['pic']; ?>">
										<img src="<?php echo base_url() . '/img/' . $product['pic'];?>">
										<script type="text/javascript">
											// function basename(path) {
											//     return path.replace(/.*\//, '');
											// };


											$('.quantri .quantriitem .iteminput .quantripic input').on('change',function(){
												var x = $(this).val();
												var base = x.substring(x.lastIndexOf(':') + 11);
												var link = "<?php echo base_url() . '/img/';?>";
												console.log(link);
												$('.quantri .quantriitem .iteminput .quantripic img').attr('src', x)
											});


										</script>
									</div>
								</div>
							</div>
						</div>
						<div class="quantriupdate col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="quantridelete">        <!-- cách thứ nhất là kết hợp với js -->
								<button class="delete">
									<a href="http://localhost:81/occko/webdong/html/quantri.php">
										Xóa dữ liệu trên
									</a>
								</button>
								<button class="update">
									<input type="submit" name="submit" value="Update" onclick="return confirm('Are you sure?')">
								</button>
								<!-- <div class="quantridelete">        cách 2 là ko cần dùng js thì dùng trực tiếp onclick confirm
								<button class="delete">
									<a href="http://localhost:81/occko/webdong/html/quantri.php" onclick="return confirm('Are you sure?')">
										Xóa dữ liệu trên
									</a>
								</button>
								<button class="update">
									<a href="javascript:void(0)" onclick="return confirm('Are you sure?')">
										Lưu và đồng bộ
									</a>
								</button> -->
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