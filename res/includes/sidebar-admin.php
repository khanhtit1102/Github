<div class="nav-side-menu">
	<div class="brand"><img src="<?php echo base_url('res/') ?>imgs/logo.png" alt="" width="90%"></div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
	<div class="menu-list">
		<ul id="menu-content" class="menu-content collapse out">
			<li class="active">
				<a href="<?php echo base_url('admin_panel') ?>">
					<i class="fa fa-dashboard fa-lg"></i> Dashboard
				</a>
			</li>

			<li  data-toggle="collapse" data-target="#member" class="collapsed">
				<a><i class="fa fa-gift fa-lg"></i> Thành viên<span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="member">
				<li><a href="<?php echo base_url('admin_panel/qltv') ?>"> Tất cả thành viên</a></li>
				<li><a href="<?php echo base_url('admin_panel/add_user') ?>"> Thêm thành viên mới</a></li>
				<li><a href="<?php echo base_url('admin_panel/chart_user') ?>"> Thống kê</a></li>
			</ul>


			<li data-toggle="collapse" data-target="#course" class="collapsed">
				<a><i class="fa fa-globe fa-lg"></i> Khóa học <span class="arrow"></span></a>
			</li>  
			<ul class="sub-menu collapse" id="course">
				<li><a href="<?php echo base_url('admin_panel/qlkh') ?>"> Tất cả khóa học</a></li>
				<li><a href="<?php echo base_url('admin_panel/add_course') ?>"> Thêm khóa học mới</a></li>
				<li><a href="<?php echo base_url('admin_panel/chart_course') ?>"> Thống kê</a></li>
			</ul>


			<li data-toggle="collapse" data-target="#new" class="collapsed">
				<a><i class="fa fa-car fa-lg"></i> Đơn hàng <span class="arrow"></span></a>
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