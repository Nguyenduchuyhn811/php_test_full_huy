<?php
	// var_dump($product_type);
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
				<form method="POST" action="<?php echo base_url().'/user_profile/'. $value['id'] ?>" enctype="multipart/form-data">
				  <div class="imgcontainer">
				    <img src="<?php echo base_url()?>/img/1510630659_t2.png" alt="Logo" class="avatar">
				  </div>

				  <div class="container">
				  	<div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    	<label for="uname"><b>Họ</b></label>
				    	<input type="text" name="first_name" value="<?php echo $value['first_name']; ?>" required>
				    </div>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
				    	<label for="uname"><b>Tên</b></label>
				    	<input type="text" name="name" value="<?php echo $value['name']; ?>" required>
				    </div>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
					    <label for="psw"><b>Email</b></label>
					    <input type="text" name="email" value="<?php echo $value['email']; ?>" required disabled>
					</div>
					<div class="form-gruop col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    <label for="psw"><b>Tên tài khoản</b></label>
					    <input type="text" name="user" value="<?php echo $value['user']; ?>" required disabled>
					</div>
					<div class="form-gruop col-xs-6 col-sm-6 col-md-3 col-lg-3">
					    <label for="psw"><b>Mật khẩu</b></label>
					    <input type="password" name="pass" value="<?php echo $value['pass']; ?>" required>
					</div>
					<div class="form-gruop col-xs-6 col-sm-6 col-md-3 col-lg-3">
					    <label for="psw"><b>Mật khẩu xác minh</b></label>
					    <input type="password" name="pass_confirm" value="<?php echo $value['pass']; ?>" required>
					</div>
					<div class="img_user col-xs-12 col-sm-12 col-md-6 col-lg-6">
					    <label for="psw"><b>Ảnh</b></label>
					    <input type="file" name="img_user" accept="image/*" value="<?php echo $value['img']; ?>" required>
					    <img id="img_user" src="<?php echo base_url().  '/img_user/'. $value['img']; ?>">
					</div>
					<?php if (isset($validation)):?>
						<div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12 alert alert-danger" role="alert">
						   <?= $validation->listErrors() ?> 
						</div>
					<?php endif; ?>
				    <div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    	<button type="submit">Cập nhật</button>
				    </div>
				  	<div class="bottom_login form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    	<a href="<?php echo base_url()?>/quantri" type="button" class="cancelbtn">Quay lại trang chủ</a>
				    	<a href="<?php echo base_url()?>/logout_user" type="button" class="cancelbtn">Đăng xuất</a>
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
<?php }?>