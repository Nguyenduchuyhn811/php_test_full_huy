<?php
	if (session()->get('result_success')) {
		echo "<script type='text/javascript'>alert('Đăng nhập thành công');</script>";
	}
?>
<div class="quantri">
		<div class="quantribackground">
			<div class="quantrimenu col-xs-12 col-sm-12 col-md-2 col-lg-2">
			<?php if ($user != ''): ?>
				<div class="quantrimenuitem user_area">
					<div class="row">
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<a href="<?php echo base_url() . '/user_profile/'. $user['id']?>">
								<img src="<?php echo base_url().'/img_user/'. $user['img']; ?>">
							</a>
						</div>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<a href="<?php echo base_url() . '/user_profile/' .$user['id'] ?>">
								<h4>Hello, <b><?php echo $user['name']; ?></b></h4>
								<p>Nhấp vào để xem thông tin chi tiết</p>
							</a>
						</div>
					</div>
				</div>
			<?php endif?>
			<?php if ($user['pos'] == 1): ?>
				<div class="quantrimenuitem">
					<div class="row">
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h3>Thành viên</h3>
						</div>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a class="active" href="http://localhost:81/create_user">Thêm quản trị viên</a>
						</div>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a class="" href="http://localhost:81/list_user">Danh sách quản trị viên</a>
						</div>
					</div>
				</div>
			<?php endif?>
			<?php
				$option_user = explode("|",$user['opp']);
				// var_dump($option_user);die();
				foreach ($option_user as $opp) {
					// var_dump($opp);
					if ($opp == 1) {
			?>
				<div class="quantrimenuitem">
					<div class="row">
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h3>Sản phẩm</h3>
						</div>
					<?php };if ($opp == 6){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a class="active" href="http://localhost:81/quantri/sanpham">Thêm sản phẩm</a>
						</div>
					<?php };if ($opp == 7){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/danhsach">Danh sách sản phẩm</a>
						</div>
					<?php };if ($opp == 8){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/quantrimagiamgia">Thêm mã giảm giá</a>
						</div>
					<?php };if ($opp == 9){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/danhsachmagiamgia">Danh sách mã giảm giá</a>
						</div>
					<?php };if ($opp == 10){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/quantrithemdanhmucsp">Thêm danh mục sản phẩm</a>
						</div>
					<?php };if ($opp == 11){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/quantridanhmucsp">Danh mục sản phẩm</a>
						</div>
					<?php }elseif ($opp == 2) {?>
					</div>
				</div>
				<div class="quantrimenuitem">
					<div class="row">
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h3>Tin tức</h3>
						</div>
					<?php }elseif ($opp == 12){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/tintuc/dangtintuc">Đăng tin tức</a>
						</div>
					<?php }elseif ($opp == 13){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/tintuc/danhsachtintuc">Danh sách tin tức</a>
						</div>
					<?php }elseif ($opp == 14){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/tintuc/dangdanhmuctintuc">Đăng danh mục</a>
						</div>
					<?php }elseif ($opp == 15){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/tintuc/danhmuctintuc">Danh mục tin tức</a>
						</div>
					<?php }elseif ($opp == 3){ ?>
					</div>
				</div>
				<div class="quantrimenuitem">
					<div class="row">
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h3>Album</h3>
						</div>
					<?php }elseif ($opp == 16){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/album/dangalbum">Đăng album</a>
						</div>
					<?php }elseif ($opp == 17){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/album/quanlialbum">Danh sách album</a>
						</div>
					<?php }elseif ($opp == 18){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/album/dangdanhmucalbum">Đăng danh mục album</a>
						</div>
					<?php }elseif ($opp == 19){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/album/danhmucalbum">Danh mục album</a>
						</div>
					<?php }elseif ($opp == 4){ ?>
					</div>
				</div>
				<div class="quantrimenuitem">
					<div class="row">
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h3>Video</h3>
						</div>
					<?php }elseif ($opp == 20){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/video/dangvideo">Đăng video</a>
						</div>
					<?php }elseif ($opp == 21){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/video/quanlivideo">Danh sách video</a>
						</div>
					<?php }elseif ($opp == 22){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/video/dangdanhmucvideo">Đăng danh mục video</a>
						</div>
					<?php }elseif ($opp == 23){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/video/danhmucvideo">Danh mục video</a>
						</div>
					<?php }elseif ($opp == 5){ ?>
					</div>
				</div>
				<div class="quantrimenuitem">
					<div class="row">
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h3>Quảng cáo</h3>
						</div>
					<?php }elseif ($opp == 24){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/quangcao/dangqc">Đăng quảng cáo</a>
						</div>
					<?php }elseif ($opp == 25){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/quangcao/quanliqc">Danh sách quảng cáo</a>
						</div>
					<?php }elseif ($opp == 26){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/quangcao/dangdanhmucqc">Đăng danh mục quảng cáo</a>
						</div>
					<?php }elseif ($opp == 27){ ?>
						<div class="quantriheaderitem col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<a href="http://localhost:81/quantri/quangcao/danhmucqc">Danh mục quảng cáo</a>
						</div>
					<?php } ?>
					</div>
				</div>
			<?php
				}
			?>
			
			</div>
