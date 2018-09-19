<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_Admin
{
	public function index($dashboard_count, $admin_chat, $page)
	{
		include "res/admin/index.php";
	}
	public function qltv($result)
	{
		include "res/admin/ql-tv.php";
	}
	public function edit_user($result)
	{
		include "res/admin/edit-user.php";
	}
	public function edit_course($result)
	{
		include "res/admin/edit-course.php";
	}
	public function qlkh($result)
	{
		include "res/admin/ql-kh.php";
	}
}