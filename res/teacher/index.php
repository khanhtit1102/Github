<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/') ?>imgs/icon.png">
	<title>Trang Quản Lý Của ADMIN - Edumall</title>
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/admin-index.css">
</head>
<body>
	<header>
		<?php include "res/includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<h2 class="admin-title"><i class="fa fa-circle-o-notch fa-spin fa-fw"></i>Trang Chức Năng Của Admin<i class="fa fa-circle-o-notch fa-spin fa-fw"></i></h2>
				<hr>
				<div class="trai col-md-10">
					<h3>
						Hi, <span style="color: red; font-weight: bold;"><?php echo $_SESSION['name_user']; ?></span> !
					</h3>
					<p><i class="glyphicon glyphicon-arrow-right"></i>Nhìn cái gì? Bên phải to đùng kia không nhìn! <i class="glyphicon glyphicon-arrow-left"></i></p>
				</div>
				<div class="phai col-md-2">
					<?php include "res/includes/more-tool-teacher.php" ?>
				</div>
			</div>
		</div>

	</main>
	<footer>
		<?php include "res/includes/footer.php" ?>
	</footer>
	<!-- Script -->
	<script src="<?php echo base_url('res/') ?>js/webjs.js"></script>
	<script src="<?php echo base_url('res/') ?>bs/js/jquery.js"></script>
	<script src="<?php echo base_url('res/') ?>bs/js/bootstrap.min.js"></script>
</body>
</html>