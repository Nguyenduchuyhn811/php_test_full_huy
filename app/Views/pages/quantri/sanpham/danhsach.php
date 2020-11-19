<?php
		// đọc phân trang 
		$products = $pagination['products'];
		$pager = $pagination['pager'];
?>			
		<form action method="POST" enctype="multipart/form-data">
				<div class="quantridanhsachsp quantrishowoff col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="quantriname col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>
								<a href="<?php echo base_url()?>/quantri">
									Danh sách sản phẩm
								</a>
							</h1>
						</div>
						<div class="quantriitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="item">
								<div class="itemname">
									<strong><i class="fa fa-list-alt" aria-hidden="true"></i>Danh sách</strong>
								</div>
								<div class="quantridanhsachsearch">
									<input id="quantridanhsachsearch" type="text" name="products_name" placeholder="Tìm theo tên sản phẩm" value="<?php if(!empty($_GET['search_name'])){echo $_GET['search_name']; } ?>">
									<select id="search_type" name="products_type">
										<option value="">Tìm theo danh mục</option>
										<?php 
											function showCategories($product_type, $parent_id = 0, $char = ''){
												foreach ($product_type as $x) {
													if ($x->parent_id == $parent_id){
										?>
														<option value="<?php echo $x->id ?>"<?php if( !empty($_GET['type']) && $x->id == $_GET['type']) {echo "selected";} ?>><?php echo $char . $x->name ?></option>
										<?php
														// unset($product_type[$z]);
														showCategories($product_type, $x->id, $char.'---');
													}				
												}
											}
											// hiển thị dao diện
											showCategories($product_type);
										?>
									</select>
									<button>
										<a href="<?php echo base_url()?>">gửi</a>
									</button>

									<?php
										if (isset($_POST['search_name'])) {
											echo "ngu";
										}
									?>

									<script type="text/javascript">
										var a = "<?php echo base_url()?>/danhsach";
										var c = "<?php if (!empty($_GET['type'])) {echo $_GET['type'];} ?>";
										var b = "<?php if (!empty($_GET['search_name'])) {echo $_GET['search_name'];}?>";

										$('#quantridanhsachsearch').on('input',function(){
											b = $('#quantridanhsachsearch').val();
											m = a + "?search_name=" + b + "&type=" + c;
											$('.quantridanhsachsearch button a').attr('href',m);
										});



										$('#search_type').on('change',function(){ 
											c = $('#search_type').val();
											console.log(c);
											m = a + "?search_name=" + b + "&type=" + c;
											$('.quantridanhsachsearch button a').attr('href',m);
										});

										
										
										
										
									</script>

								</div>
								<table class="quantridanhsach table table-hover">
									<thead>
										<th class="img">Ảnh</th>
										<th class="name">Tên sản phẩm</th>
										<th class="id">Mã SP</th>
										<th class="price">Giá sản phẩm</th>
										<th class="num">Số lượng</th>
										<th class="type">Thể loại</th>
										<th class="">Hiển thị</th>
										<th class="option">Hành động</th>
									</thead>
									<tbody>
										<?php 
											foreach ($products as $value) {
										?>
											<tr>
												<td><img src="<?php echo base_url().'/img/'.$value['pic']; ?>"></td>
												<td><?php echo $value['name']; ?></td>
												<td><?php echo $value['id']; ?></td>
												<td><?php echo number_format($value['price']); ?> Đ</td>
												<td><?php echo $value['num']; ?></td>
												<td>
													<?php
														$type = $value['type'];
														if ($type == 0) {
															echo"Danh mục gốc";
														}else{
															foreach ($product_type as $typeP) {
																if ($typeP->id == $type) {
																	echo $typeP->name;
																}
															}
														}
													?>
												</td>
												<td>
													<select name="status<?php echo $value['id'];?>" data-id="<?php echo $value['id'];?>">
														<option value="1" <?php if ($value['status'] == 1) {echo "selected";} ?>>Hiển thị</option>
														<option value="0" <?php if ($value['status'] == 0) {echo "selected";} ?>>Ẩn</option>
													</select>
												</td>
												<td>
													<a href="<?php echo base_url()?>/sanpham?id=<?php echo $value['id']?>" target="blank" data-id="<?php echo $value['id']?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
													<a class="refresh" href="<?php echo base_url()?>/quantri/danhsach?page=&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];}?>" onclick="return confirm('Bạn có chắc làm mới sản phẩm này?')" data-id="<?php echo $value['id']?>" data-alert-title="Thông báo"><i class="fa fa-refresh" aria-hidden="true"></i></a>
													<a class="update" href="<?php echo base_url()?>/quantri/quantrisuasanpham/<?php echo $value['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
													<a class="delete" href="<?php echo base_url()?>/quantri/quantrixoasanpham/	<?php echo $value['id']?>" onclick="return confirm('Bạn có chắc xóa sản phẩm này?')" data-id="<?php echo $value['id']?>" data-alert-title="Thông báo"><i class="fa fa-trash" aria-hidden="true"></i></a>
												</td>
											</tr>
										<?php
											}
										?>
									</tbody>
								</table>
								<div class="quantridanhsachlistbtn">
									<ul>
										<?= $pager->links() ?>
									</ul>
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