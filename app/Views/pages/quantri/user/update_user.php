<?php
	// var_dump($option_user);
	if (session()->get('result_fail_pass')) {
		echo "<script type='text/javascript'>alert('Mật khẩu không đúng ,vui lòng nhập lại!');</script>";
	}else if (session()->get('result_fail_user')) {
		echo "<script type='text/javascript'>alert('Tên đăng nhập không đúng hoặc không tồn tại ,vui lòng nhập lại!');</script>";
	}
	
	foreach ($profile as $value) {
?>

<div class="quantri">
		<div class="quantribackground">
			<div class="quantrilogin">
				<form method="POST" action="<?php echo base_url().'/update_user/'.$value['id']?>" enctype="multipart/form-data">
				  <div class="imgcontainer">
				    <img src="<?php echo base_url()?>/img/1510630659_t2.png" alt="Logo" class="avatar">
				  </div>

				  <div class="container">
				  	<div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    	<label for="uname"><b>Họ</b></label>
				    	<input type="text" placeholder="Đăng nhập tên" name="first_name" value="<?php echo $value['first_name']; ?>" required>
				    </div>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    	<label for="uname"><b>Tên</b></label>
				    	<input type="text" placeholder="Đăng nhập họ" name="name" value="<?php echo $value['name']; ?>" required>
				    </div>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
					    <label for="psw"><b>Email</b></label>
					    <input type="text" placeholder="test@gmail.com" name="email" value="<?php echo $value['email']; ?>" required disabled>
					</div>
					<div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    <label for="psw"><b>Tên tài khoản</b></label>
					    <input type="text" placeholder="abcd" name="user" value="<?php echo $value['user']; ?>" required disabled>
					</div>
					<div class="form-gruop col-xs-6 col-sm-6 col-md-3 col-lg-3">
					    <label for="psw"><b>Mật khẩu</b></label>
					    <input type="password" placeholder="********" name="pass" value="<?php echo $value['pass']; ?>" required>
					</div>
					<div class="form-gruop col-xs-6 col-sm-6 col-md-3 col-lg-3">
					    <label for="psw"><b>Mật khẩu xác minh</b></label>
					    <input type="password" placeholder="********" name="pass_confirm" value="<?php echo $value['pass']; ?>" required>
					</div>
					<div class="img_user col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    <label for="psw"><b>Ảnh</b></label>
					    <input type="file" name="img_user" accept="image/*" required>
					    <img id="img_user" src="../../../img_user/<?php echo $value['img']; ?>">
					</div>
					<div class="form-gruop option col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    <label><b>Chọn chúc năng</b></label>
					    <?php 
							function showCategories($option_user, $parent_id = 0, $char = ''){
								foreach ($option_user as $opuser) {
									if ($opuser['parent_id'] == $parent_id){
						?>
										<div>
											<label class="checkbox-inline">
												<input type="checkbox" name="opp[]" id="opp<?php echo $opuser['id']; ?>" class="oppclass<?php echo $opuser['parent_id']; ?>" value="<?php echo $opuser['id'] ?>" data-parent="<?php echo $opuser['parent_id']; ?>">
												<?php echo $char.$opuser['opp'] ?>
											</label>
										</div>
						<?php
										// unset($option_user[$z]);
										showCategories($option_user, $opuser['id'], $char.'---');
									}				
								}
							}
							// hiển thị dao diện
							showCategories($option_user);    // thao tác chọn opp trong select_user.js
						?>
					<script type="">
						<?php
							$setupbyadmin = explode("|",$value['opp']);     // opp đã đc admin select cho user khi truy cập
							foreach ($setupbyadmin as $setupopp) {
								$idopp = "opp".$setupopp;
							echo "document.getElementById('".$idopp."').checked=true; \n";
							}
						?>
					</script>


					</div>
					<?php if (isset($validation)):?>
						<div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger" role="alert">
						   <?= $validation->listErrors() ?> 
						</div>
					<?php endif; ?>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    	<button type="submit">Update</button>
				    </div>
				  	<div class="bottom_login form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    	<a href="<?php echo base_url()?>/list_user" type="button" class="cancelbtn">Quay lại trang chủ</a>
				    </div>
				</div>
				</form>
			</div>
			
			<script type="text/javascript">
				// thay hình ảnh trong trang quản trị
				    function readURL(input) {
				          if (input.files && input.files[0]) {
				            var reader = new FileReader();
				            
				            reader.onload = function(e) {
				              $('#img_user').attr('src', e.target.result);
				            }
				            
				            reader.readAsDataURL(input.files[0]);
				          }
				        }

				    $('.img_user input').on('change', function(){
				        readURL(this);
				    });
				    // end
			</script>

<?php 
	}
?>