<!DOCTYPE html>	
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content='Học trực tuyến cùng với những Giảng viên hàng đầu. Học online 24/7 - Tự tin làm chủ tương lai. Siêu thị bài giảng trực tuyến lớn nhất Việt Nam' name='description'>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('res/') ?>imgs/icon.png">
	<title>Trang Quản Lý Thành Viên Của Admin - Edumall</title>
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/webstyle.css">
	<link rel="stylesheet" href="<?php echo base_url('res/') ?>css/admin-qltv.css">
</head>
<body>
	<header>
		<?php include "res/includes/header.php" ?>
	</header>
	<main>
		<div class="container">
			<div class="row">
				<h2>Trang Quản Lý Thành Viên Của Admin</h2><hr>
				<div class="trai col-md-10">
					<div class="form locsp">
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="">Tìm kiếm theo:</label>
							<div class="form-group">
								<div class="col-sm-2">
									<select name="name" class="form-control">
										<option value="name_user">Tên</option>
										<option value="email_user">Thư điện tử</option>
										<option value="job_user">Công việc</option>
										<option value="about_user">Giới thiệu</option>
										<option value="permission_user">Quyền</option>
									</select>
								</div>
								<div class="col-sm-4">
									<form action="" method="">
										<input type="text" class="form-control search" placeholder="Nhập từ khóa..." name="keyword">
									</form>
								</div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-default" name="search" value="search" title="Vui lòng chỉ chọn một loại lọc">Tìm kiếm<i class="glyphicon glyphicon-search"></i></button>
								</div>
								<div class="col-md-2">
									<a href="<?php echo base_url('admin_panel/cancel_search?page=qltv'); ?>"><button type="button" class="btn btn-default">Huỷ tìm<i class="glyphicon glyphicon-remove-sign"></i></button></a>
								</div>
								<div class="col-md-2">
									<span class="badge pull-right">Có 1231 thành viên</span>
								</div>
							</div>
						</div>
					</form><br><br><br>
				</div>
					<div class="list">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Tên</th>
									<th>Thư điện tử</th>
									<th>Công việc</th>
									<th>Giới thiệu</th>
									<th>Số Coin</th>
									<th>Quyền</th>
									<th>Tool</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 0;
									foreach ($result as $key => $value) {
										$i++;
								 ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $value['name_user']; ?></td>
									<td><?php echo $value['email_user']; ?></td>
									<td><?php echo $value['job_user']; ?></td>
									<td><?php echo $value['about_user']; ?></td>
									<td><?php echo $value['coin_user']; ?></td>
									<td>
									<?php 
										if($value["permission_user"] == 1){
											echo '<i style="color: blue;">Member</i>';
										}
										elseif ($value["permission_user"] == 2) {
											echo '<i style="color: green;">Teacher</i>';
										}
										elseif ($value["permission_user"] == 3) {
											echo '<i style="color: red;">Admin</i>';
										}
										else{
											echo 'Non-Active';
										}
									 ?>
									</td>
									<td>
										<a href="<?php echo base_url('admin_panel/edit').'?user='.$value['id_user']; ?>">Sửa</a>
										<label for="">|</label>
										<a href="<?php echo base_url('admin_panel/qltv').'?delete='.$value['id_user']; ?>" onclick="return confirm('Bạn thực sự muốn xóa thành viên này?')">Xoá</a>
									</td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
					<br>

					<div class="add">
						<form action="" method="POST" role="form">
							<legend>Thêm thành viên</legend>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" name="name" placeholder="Họ và tên" required="">
								</div>
								<div class="form-group">
									<input type="email" class="form-control" name="email" placeholder="Tài khoản" required="">
								</div>
								<div class="form-group">
									<input type="password" class="form-control" name="pass" placeholder="Mật khẩu" required="" minlength="6">
								</div>
								<button type="submit" name="add_user" value="add" class="btn btn-primary">Thêm</button>	
							</div>
						</form>
					</div>
				</div>
				<div class="phai col-md-2">
					<?php include "res/includes/more-tool-admin.php" ?>
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