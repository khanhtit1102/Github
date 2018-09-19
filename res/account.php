<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang quản lý tài khoản</title>
	<link rel="stylesheet" href="res/bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="res/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="res/css/webstyle.css">
	<link rel="stylesheet" href="res/css/account.css">
</head>
<body>
	<header>
		<?php include "includes/header.php" ?>
	</header>
	<main>
		<br>
		<section class="profile">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#info">Thông tin cá nhân</a></li>
				<li><a data-toggle="tab" href="#security">Bảo mật</a></li>
				<li><a data-toggle="tab" href="#mycourse">Khóa học của tôi</a></li>
			</ul>
			<?php 
				foreach ($data as $row) {
			?>
			<div class="tab-content container">
				<div id="info" class="tab-pane fade in active">
					<div class="row">
						<div class="col-md-4 avatar" align="center">
							<img src="res/imgs/<?php echo $row['avatar_user']; ?>" alt="">
							<br>
							<input type="file" accept=".png, .jpg, .jpeg" name="image" class="form-control" style="width: 80%;"><br>
							<?php 
								if ($row['permission_user'] == 3) {
									echo "Status: <b>Administrator</b>";
								}
								if ($row['permission_user'] == 2) {
									echo "Status: <b>Teacher</b>";
								}
								if ($row['permission_user'] == 1) {
									echo "Status: <b>Actived</b>";
								}
								if ($row['permission_user'] == 0) {
									echo "Status: <b>Non-active</b>";
								}
								echo '<br>Số tiền: <b>'.$_SESSION['coin_user'].'</b>đ';
							?>
						</div>
						<form action="" method="POST" role="form" enctype="multipart/form-data">
							<div class="col-md-8">
								<legend>Thông tin cơ bản</legend>
								<div class="form-group">
									<label for="">Họ tên đầy đủ:</label>
									<input type="text" class="form-control" name="name_user" id="" value="<?php echo $row['name_user']; ?>">
									<br>
									<label for="">Nghề nghiệp:</label>
									<input type="text" class="form-control" name="job_user" id="" value="<?php echo $row['job_user']; ?>">
									<br>
									<label for="">Giới thiệu bản thân:</label>
									<textarea name="about_user" id="" class="form-control" rows="3"><?php echo $row['about_user']; ?></textarea>
								</div>
								<button type="submit" name="changeinfo" value="changeinfo" class="btn btn-danger" style="float: right;">Lưu thay đổi</button>
								<a href="auth/logout"><button type="button" class="btn btn-danger" onclick="return confirm('Bạn thực sự muốn đăng xuất?')">ĐĂNG XUẤT</button></a>
								<?php 
									if ($row['permission_user'] == 3) {
										echo "<a href='".base_url('admin_panel')."'><button type='button' class='btn btn-success'>Admin Panel</button></a>";
									}
									if ($row['permission_user'] == 2) {
										echo "<a href='".base_url('teacher_panel')."'><button type='button' class='btn btn-success'>Teacher Panel</button></a>";
									}
									if ($row['permission_user'] == 0) {
										echo "<a href='".base_url('')."' target='_blank'><button type='button' class='btn btn-success'>Kích hoạt Email</button></a>";
									}
								 ?>
							</div>
						</form>
					</div>
				</div>
				<div id="security" class="tab-pane fade">
					<div class="row">
						<div class="col-md-offset-3 col-md-6">
							<form action="" method="POST" role="form">
								<legend>Kích hoạt Email và đổi mật khẩu</legend>
								<div class="form-group">
									<label for="">Email: </label>
									<input type="text" class="form-control" id="" value="<?php echo $row['email_user']; ?>" disabled>
									<br>
									<ul class="error"><?php echo validation_errors('- '); ?></ul>
									<label for="">Mật khẩu hiện tại: </label>
									<input type="password" class="form-control" name="oldpass" id="" placeholder="**********">
									<br>
									<label for="">Mật khẩu mới: </label>
									<input type="password" class="form-control" name="newpass" id="" placeholder="**********">
								</div>
								<a href='#' target='_blank' class='btn btn-default'>Kích hoạt Email</a>
								<button type="submit" name="changepass" value="changepass" class="btn btn-primary" style="float: right;">Lưu thay đổi</button>
							</form>
						</div>
					</div>
				</div>
				<?php } ?>
				<div id="mycourse" class="tab-pane fade">
					<table>
						<tr>
							<?php 
							$i = 0;
								foreach ($owner as $key => $value) {
									if($i == 3){
										echo "</tr>";
										$i = 0;
									}
							 ?>
							<td class="col-md-4">
								<a href="<?php echo base_url('learn/course/').$value['id_cs']; ?>" class="thumbnail">
									<img src="res/imgs/<?php echo $value['thumb_cs']; ?>" alt="">
									<h5><?php echo $value['ten_cs']; ?></h5>
									<label class="author"><?php echo $value['tc_cs']; ?></label>
								</a>
							</td>
							<?php $i++; } ?>
					</table>
				</div>
			</div>
		</section>
	</main>
	<footer>
		<?php include "includes/footer.php" ?>
	</footer>
	<script src="res/js/myjs.js" type="text/javascript"></script>
	<script src="res/bs/js/jquery.js" type="text/javascript"></script>
	<script src="res/bs/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>