<?php
		// đọc phân trang 
		$list_user = $pagination['list_user'];
		$pager = $pagination['pager'];
?>			
		<form action method="POST" enctype="multipart/form-data">
				<div class="quantridanhsachsp quantrishowoff col-xs-12 col-sm-12 col-md-10 col-lg-10">
					<div class="row">
						<div class="quantriname col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1>
								<a href="<?php echo base_url()?>/quantri">
									Danh sách thành viên
								</a>
							</h1>
						</div>
						<div class="quantriitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="item">
								<div class="itemname">
									<strong><i class="fa fa-list-alt" aria-hidden="true"></i>Danh sách</strong>
								</div>
								<table class="quantridanhsach table table-hover">
									<thead>
										<th class="img">Ảnh</th>
										<th class="name">Tên thành viên</th>
										<th class="">Mã thành viên</th>
										<th class="">Tên tài khoản</th>
										<th class="">Mật khẩu</th>
										<th class="">Email</th>
										<th class="">Thể loại</th>
										<th class="option">Hành động</th>
									</thead>
									<tbody>
										<?php 
											foreach ($list_user as $value) {
										?>
											<tr>
												<td><img src="<?php echo base_url().'/img_user/'.$value['img']; ?>"></td>
												<td><?php echo $value['first_name']." ". $value['name']; ?></td>
												<td><?php echo $value['id']; ?></td>
												<td><?php echo $value['user']; ?></td>
												<td><?php echo $value['pass']; ?></td>
												<td><?php echo $value['email']; ?></td>
												<td>
													<?php
														if ($value['pos']==1) {
															echo "admin";
														}else{
															echo "user";
														}
													?>
												</td>
												<td>
													<a class="refresh" href="<?php echo base_url()?>/list_user?page=&search=<?php if(!empty($_GET['search'])){ echo $_GET['search'];}?>&type=<?php if(!empty($_GET['type'])){ echo $_GET['type'];}?>" onclick="return confirm('Bạn có chắc làm mới sản phẩm này?')" data-id="<?php echo $value['id']?>" data-alert-title="Thông báo"><i class="fa fa-refresh" aria-hidden="true"></i></a>
													<a class="update" href="<?php echo base_url()?>/update_user/<?php echo $value['id']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
													<a class="delete" href="<?php echo base_url()?>/delete_user/<?php echo $value['id']?>" onclick="return confirm('Bạn có chắc xóa sản phẩm này?')" data-id="<?php echo $value['id']?>" data-alert-title="Thông báo"><i class="fa fa-trash" aria-hidden="true"></i></a>
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