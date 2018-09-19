<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->library("session");
    }
	public function login($email, $pass)
	{
		$sql = "SELECT count(id_user) FROM user WHERE email_user = '$email' AND pass_user ='$pass'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
			$count = $row['count(id_user)'];
		}
		if ($count == 1) {
			// Lưu thông tin vào SESSION
			$sql = "SELECT * FROM user WHERE email_user = '$email'";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row)
			{
				$session_user = array(
					'id_user'=> $row['id_user'],
					'email_user'=> $row['email_user'],
					'name_user' => $row['name_user'],
					'job_user' => $row['job_user'],
					'about_user' => $row['about_user'],
					'avatar_user' => $row['avatar_user'],
					'permission_user' => $row['permission_user'],
					'coin_user' => $row['coin_user'],
					);
			}
				$this->session->set_userdata($session_user);
				redirect(base_url('auth'));
		}
		else{
			echo "<script type='text/javascript'>alert('Tài khoản hoặc mật khẩu không đúng! Vui lòng nhập lại!');</script>";
			$this->load->view('v_auth');
			$view = new V_Auth();
			$view->show_login();
		}
	}
	public function register($username ,$email, $pass)
	{
		$sql = "SELECT count(id_user) FROM user WHERE email_user = '$email'";
		$query = $this->db->query($sql);
		foreach ($query->result_array() as $row)
		{
			$count = $row['count(id_user)'];
		}
		if ($count == 1) {
			echo "<script type='text/javascript'>alert('Tài khoản đã bị trùng! Vui lòng nhập lại!');</script>";
		}
		else{
			$sql = "INSERT INTO user(name_user, pass_user, email_user) VALUES ('$username', '$pass', '$email')";
			$query = $this->db->query($sql);
			echo "<script type='text/javascript'>alert('Chúc mừng bạn đã đăng ký thành công! Hãy đăng nhập để trải nghiệm nào!');</script>";
		}
	}
	public function show_once()
	{
		$id = $this->session->userdata('id_user');
		$sql = "SELECT * FROM user WHERE id_user = '$id'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function show_owner_course()
	{
		#SELECT * FROM course WHERE id_cs IN (SELECT id_cs FROM own WHERE id_user = $id_user)
		$id_user = $this->session->userdata('id_user');
		$this->db->where('id_cs IN (SELECT id_cs FROM own WHERE id_user = '.$id_user.')', NULL, FALSE);
		$query = $this->db->get('course');
		return $query->result_array();
	}
	public function changeinfo($id, $name, $job, $about)
	{
		$sql = "UPDATE user SET name_user = '$name', job_user = '$job', about_user = '$about' WHERE id_user = '$id'";
		$query = $this->db->query($sql);
		echo "<script type='text/javascript'>alert('Đổi thông tin thành công!');</script>";
		echo "<meta http-equiv='refresh' content='0' />";
	}
	public function changepass($id, $oldpass, $newpass)
	{
		if (strlen($oldpass) < 6 || strlen($newpass) < 6) {
			echo "<script type='text/javascript'>alert('Vui lòng nhập mật khẩu lớn hơn 6 ký tự!');</script>";
		}
		else{
			$sql = "SELECT count(id_user) FROM user WHERE id_user = '$id' AND pass_user ='$oldpass'";
			$query = $this->db->query($sql);
			foreach ($query->result_array() as $row)
			{
				$count = $row['count(id_user)'];
			}
			if ($count == 1) {
				$sql = "UPDATE user SET pass_user = '$newpass' WHERE id_user = '$id' ";
				$query = $this->db->query($sql);
				echo "<script type='text/javascript'>alert('Đổi mật khẩu thành công!');</script>";
				echo "<meta http-equiv='refresh' content='0' />";
			}
			else{
				echo "<script type='text/javascript'>alert('Sai mật khẩu!');</script>";
				echo "<meta http-equiv='refresh' content='0' />";
			}
		}
	}
	public function add_money($number)
	{
		$id = $this->session->userdata('id_user');
		$this->db->set('coin_user', $number);
		$this->db->where('id_user', $id);
		$this->db->update('user');
		$this->session->set_userdata('coin_user', $number);
	}
}