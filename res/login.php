<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="../res/imgs/icon.png">
	<title>Đăng nhập Tài Khoản - Edumall</title>
	<link rel="stylesheet" href="../res/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="../res/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../res/css/webstyle.css">
	<link rel="stylesheet" href="../res/css/login.css">
</head>	
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<div class="all col-md-offset-3 col-md-6">
					<div class="with-email">
						<form action="" method="POST" role="form">
							<legend>Bạn muốn học các khóa học của chúng tôi?<br>Đăng nhập đi để trải nghiệm nào!</legend>
							<div class="form-group" align="center">
								<label for="">Đăng Nhập Bằng <b>Email</b></label>
								<ul class="error"><?php echo validation_errors('- '); ?></ul>
								<input type="text" class="form-control" name="email" id="email" placeholder="Email"">
								<input type="password" class="form-control" name="pass" id="pass" placeholder="Mật khẩu">
							</div>
							<div id="btnsubmit">
								<button type="submit" class="btn btn-danger" name="login" id="submit" value="login">Đăng nhập</button>
							</div>
						</form>
					</div>
					<br><br>
					<div class="with-social" align="center">
						<label for="">Đăng nhập với tài khoản <b>Mạng Xã Hội</b></label><br>
						<a href="" target="_blank"><button type="button" class="btn btn-info"><i class="fa fa-facebook"></i>Facebook</button></a>
						<a href="" target="_blank"><button type="button" class="btn btn-warning"><i class="fa fa-google-plus"></i>Google+</button></a>
					</div><br>
					<div class="login" align="center">
						<p>Chưa có tài khoản? <a href="register"><b>Đăng Ký</b></a></p>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<?php include "includes/footer.php" ?>
	</footer>
	<!-- Script -->
	<script type="text/javascript" src="../res/js/test.js"></script>
	<script type="text/javascript" src="../res/bs/js/jquery.js"></script>
	<script type="text/javascript" src="../res/bs/js/bootstrap.min.js"></script>
</body>
</html>