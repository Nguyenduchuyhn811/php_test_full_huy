<?php
	// var_dump($product_type);
	if (session()->get('result_fail_pass')) {
		echo "<script type='text/javascript'>alert('Mật khẩu không đúng ,vui lòng nhập lại!');</script>";
	}else if (session()->get('result_fail_user')) {
		echo "<script type='text/javascript'>alert('Tên đăng nhập không đúng hoặc không tồn tại ,vui lòng nhập lại!');</script>";
	}
?>

<div class="quantri">
		<div class="quantribackground">
			<div class="quantrilogin">
				<form method="POST" action="<?php echo base_url().'/create_user'?>" enctype="multipart/form-data">
				  <div class="imgcontainer">
				    <img src="<?php echo base_url()?>/img/1510630659_t2.png" alt="Logo" class="avatar">
				  </div>

				  <div class="container">
				  	<div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    	<label for="uname"><b>Họ</b></label>
				    	<input type="text" placeholder="Đăng nhập tên" name="first_name" value="<?php echo set_value('name'); ?>" required>
				    </div>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    	<label for="uname"><b>Tên</b></label>
				    	<input type="text" placeholder="Đăng nhập họ" name="name" value="<?php echo set_value('first_name'); ?>" required>
				    </div>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
					    <label for="psw"><b>Email</b></label>
					    <input type="text" placeholder="test@gmail.com" name="email" value="<?php echo set_value('email'); ?>" required>
					</div>
					<div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    <label for="psw"><b>Tên tài khoản</b></label>
					    <input type="text" placeholder="abcd" name="user" value="<?php echo set_value('user'); ?>" required>
					</div>
					<div class="form-gruop col-xs-6 col-sm-6 col-md-3 col-lg-3">
					    <label for="psw"><b>Mật khẩu</b></label>
					    <input type="password" placeholder="********" name="pass" value="" required>
					</div>
					<div class="form-gruop col-xs-6 col-sm-6 col-md-3 col-lg-3">
					    <label for="psw"><b>Mật khẩu xác minh</b></label>
					    <input type="password" placeholder="********" name="pass_confirm" value="" required>
					</div>
					<div class="img_user col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    <label for="psw"><b>Ảnh</b></label>
					    <input type="file" name="img_user" accept="image/*" required>
					    <img id="img_user" src="../../../img/no_image.gif">
					</div>
					<div class="form-gruop option col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    <label><b>Chọn chúc năng</b></label>
					    <?php 
							function showCategories($option_user, $parent_id = 0, $char = ''){
								foreach ($option_user as $opuser) {
									if ($opuser['parent_id'] == $parent_id){
						?>
										<div><label class="checkbox-inline"><input type="checkbox" name="opp[]" id="opp<?php echo $opuser['id'] ?>" class="oppclass<?php echo $opuser['parent_id'] ?>" value="<?php echo $opuser['id'] ?>" data-parent="<?php echo $opuser['parent_id'] ?>"><?php echo $opuser['opp'] ?></label></div>
						<?php
										// unset($option_user[$z]);
										showCategories($option_user, $opuser['id'], $char.'---');
									}				
								}
							}
							// hiển thị dao diện
							showCategories($option_user);

							// thao tác chọn opp trong select_user.js
						?>
					</div>
					<?php if (isset($validation)):?>
						<div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger" role="alert">
						   <?= $validation->listErrors() ?> 
						</div>
					<?php endif; ?>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    	<button type="submit">Login</button>
				    </div>
				  	<div class="bottom_login form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    	<a href="<?php echo base_url()?>/quantri" type="button" class="cancelbtn">Quay lại trang chủ</a>
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