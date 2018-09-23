<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/') ?>imgs/icon.png">
	<title>Trang chỉnh sửa thông tin tài khoản - Edumall - Admin</title>
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/'); ?>css/admin-edituser.css">
</head>
<body>
	<header>
		<?php include "res/includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<h2>Trang Chỉnh Sửa Thông Tin Thành Viên Của Admin</h2><hr>
				<div class="col-md-10">
					<?php 
						foreach ($result as $key => $value) {
							$per = $value['permission_user'];
							$select_0 = '';$select_1 = '';$select_2 = '';$select_3 = '';
							if ($per == 0) {
								$select_0 = 'selected';
							}
							if ($per == 1) {
								$select_1 = 'selected';
							}
							if ($per == 2) {
								$select_2 = 'selected';
							}
							if ($per == 3) {
								$select_3 = 'selected';
							}
							$select = '<select name="permission" class="form-control">
									<option value="0" '.$select_0.'>Non-Active</option>
									<option value="1" '.$select_1.'>Member</option>
									<option value="2" '.$select_2.'>Teacher</option>
									<option value="3" '.$select_3.'>Admin</option>
								</select>';
					 ?>
					<form action="" method="POST" role="form">
						<legend>Chỉnh sửa thông tin thành viên</legend>
						<div class="form-group">
							<label for="">Họ và Tên: </label>
							<input type="text" class="form-control" id="" name="name"  value="<?php echo $value['name_user']; ?>">
						</div>
						<div class="form-group">
							<label for="">Thư điện tử: </label>
							<input type="email" class="form-control" id="" name="email"  value="<?php echo $value['email_user']; ?>">
						</div>
						<div class="form-group">
							<label for="">Công việc: </label>
							<input type="text" class="form-control" id="" name="job"  value="<?php echo $value['job_user']; ?>">
						</div>
						<div class="form-group">
							<label for="">Giới thiệu: </label>
							<textarea name="about" class="form-control" rows="3"><?php echo $value['about_user']; ?></textarea>
						</div>
						<div class="form-group">
							<label for="">Quyền: </label>
							<?php echo $select; ?>
						</div>
						<button type="submit" name="update" value="user" class="btn btn-primary" name="btn-submit">Cập nhật thông tin</button>
					</form>
					<?php } ?>
				</div>
				<div class="col-md-2">
					<?php include "res/includes/more-tool-admin.php" ?>
				</div>
			</div>
		</div>
	</main>
	<footer>
		<?php include "res/includes/footer.php" ?>
	</footer>
	<script src="<?php echo base_url('res/'); ?>js/webjs.js"></script>
	<script src="<?php echo base_url('res/'); ?>bs/js/jquery.js"></script>
	<script src="<?php echo base_url('res/'); ?>bs/js/bootstrap.min.js"></script>
</body>
</html>