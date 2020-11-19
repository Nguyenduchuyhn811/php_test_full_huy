<?php
	// var_dump($product_type);
	if (session()->get('result_fail_pass')) {
		echo "<script type='text/javascript'>alert('Mật khẩu không đúng ,vui lòng nhập lại!');</script>";
	}else if (session()->get('result_fail_user')) {
		echo "<script type='text/javascript'>alert('Tên đăng nhập không đúng hoặc không tồn tại ,vui lòng nhập lại!');</script>";
	}else if (session()->get('result_success_create')) {
		echo "<script type='text/javascript'>alert('Tạo tài khoản thành công!');</script>";
	}
?>

<div class="quantri">
		<div class="quantribackground">
			<div class="quantrilogin login_page">
				<form action="<?php echo base_url()?>/action_page_login" method="POST">
				  <div class="imgcontainer">
				    <img src="<?php echo base_url()?>/img/1510630659_t2.png" alt="Logo" class="avatar">
				  </div>

				  <div class="container">
				  	<div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
					    <label for="uname"><b>Tên tài khoản</b></label>
					    <input type="text" placeholder="Đăng nhập tài khoản" name="user" value="<?php echo set_value('name'); ?>" required>
					</div>
					<div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
					    <label for="psw"><b>Mật khẩu</b></label>
					    <input type="password" placeholder="********" name="pass" value="" required>
					</div>
					<div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">        
					    <button type="submit">Login</button>
					</div>
					<div class="form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
					    <label>
					      <input type="checkbox" checked="checked" name="remember"> Nhớ tài khoản
					    </label>
					</div>
				  	<div class="bottom_login form-gruop col-xs-12 col-sm-12 col-md-12 col-lg-12">
					    <a href="<?php echo base_url()?>" type="button" class="cancelbtn">Quay lại trang chính</a>
				    	<span class="psw">Quên <a href="/create_user">mật khẩu?</a></span>
				    </div>
				  </div>
				</form>
			</div>
			
	