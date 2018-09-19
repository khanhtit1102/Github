<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class V_Auth
{
	public function show_login()
	{
		include "res/login.php";
	}
	public function show_register()
	{
		include "res/register.php";
	}
	public function show_info($data, $owner)
	{
		include "res/account.php";
	}
}