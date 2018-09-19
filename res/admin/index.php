<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/') ?>imgs/icon.png">
	<title>Trang Quản Lý Của ADMIN - Edumall</title>
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/morris.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/admin-index.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/dataTables.bootstrap.min.css">
</head>
<body>
	<main>
		<section class="row">
			<div class="col-md-2">
				<div class="nav-side-menu">
					<div class="brand"><img src="<?php echo base_url('res/') ?>imgs/logo.png" alt="" width="90%"></div>
					<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
					<div class="menu-list">
						<ul id="menu-content" class="menu-content collapse out">
							<li class="active">
								<a href="?page=dashboard">
									<i class="fa fa-dashboard fa-lg"></i> Dashboard
								</a>
							</li>

							<li  data-toggle="collapse" data-target="#products" class="collapsed">
								<a href="#"><i class="fa fa-gift fa-lg"></i> Thành viên<span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="products">
								<li><a href="?page=qltv"> Tất cả thành viên</a></li>
								<li><a href="?page=qltv"> Thêm thành viên mới</a></li>
								<li><a href="?page=qltv"> Trang cá nhân của bạn</a></li>
							</ul>


							<li data-toggle="collapse" data-target="#service" class="collapsed">
								<a href="#"><i class="fa fa-globe fa-lg"></i> Khóa học <span class="arrow"></span></a>
							</li>  
							<ul class="sub-menu collapse" id="service">
								<li>New Service 1</li>
								<li>New Service 2</li>
								<li>New Service 3</li>
							</ul>


							<li data-toggle="collapse" data-target="#new" class="collapsed">
								<a href="#"><i class="fa fa-car fa-lg"></i> Đơn hàng <span class="arrow"></span></a>
							</li>
							<ul class="sub-menu collapse" id="new">
								<li>New New 1</li>
								<li>New New 2</li>
								<li>New New 3</li>
							</ul>


							<li>
								<a href="#">
									<i class="fa fa-user fa-lg"></i> Trang cá nhân
								</a>
							</li>

							<li>
								<a href="#">
									<i class="fa fa-users fa-lg"></i> Đăng xuất
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php 
				switch ($page) {
					case 'qltv':
						include "res/includes/qltv.php";
						break;

					case 'qlkh':
						include "res/includes/qlkh.php";
						break;

					default:
						include "res/includes/dashboard.php";
						break;
				}
			 ?>
		</section>
	</main>
	<!-- Script -->
	<script type="text/javascript" src="<?php echo base_url('res/') ?>bs/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>bs/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/webjs.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/raphael-min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/morris.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/chart-data.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/jscustom.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('res/') ?>js/dataTables.bootstrap.min.js"></script>
</body>
</html>