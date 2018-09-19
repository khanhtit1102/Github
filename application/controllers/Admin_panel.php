<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Panel extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library("session");
		// $this->load->library('pagination');

		// Kiểm tra tài khoản ADMIN
		if ($this->session->has_userdata('id_user') == false) {
			redirect(base_url('auth/login'));
		}
		else{
			if ($this->session->userdata('permission_user') < 3) {
				redirect(base_url('home'));
			}
		}
		$this->load->model('m_admin');
		
		$this->load->view('v_admin');
		
	}
	public function index()
	{
		$model = new M_Admin();
		$view = new V_Admin();
		// Load Count Header
		$dashboard_count = $model->dashboard_count();
		// Load Admin Chat
		$admin_chat = $model->admin_chat();
		if ($this->input->post('chat_admin') == 'submit') {
			if ($this->input->post('content_chat') == null) {
				echo "<script type='text/javascript'>alert('Không được để trống ô chat!');</script>";
			}
			else{
				$comment['id_user'] = $this->session->userdata('id_user');
				$comment['content_chat'] = $this->input->post('content_chat');
				$comment['date_chat'] = date("Y-m-d H:i:s");
				$model->add_chat($comment);
				redirect(base_url('admin_panel?page=dashboard'));
			}
		}
		$page = $this->input->get('page');
		$view->index($dashboard_count, $admin_chat, $page);
	}
	public function qltv()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		if ($this->input->get('delete')) {
			$id = $this->input->get('delete');
			$model->delete_user($id);
		}
		if ($this->input->post('add_user') == 'add') {
			$username = $this->input->post('name');
			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass'));
			$this->load->model('m_auth');
			$model_add = new M_Auth();
			$model_add->register($username, $email, $pass);
		}

		if($this->input->post('search') == 'search'){
			$keyword = $this->input->post('keyword');
			$name = $this->input->post('name');
			$this->session->set_userdata("type_member", $name);
			$this->session->set_userdata("keyword_member", $keyword);
		}
		else{
			if ($this->session->has_userdata('type_member') && $this->session->has_userdata('keyword_member')) {
				$name = $this->session->userdata('type_member');
				$keyword = $this->session->userdata('keyword_member');
			} else {
				$name = '1';
				$keyword = '';
			}
		}
		$model->search_member($name, $keyword);
		$result = $model->qltv();
		
		$view->qltv($result);
	}
	public function edit()
	{
		if ($this->input->get('user')) {
			$id = $this->input->get('user');
			$key = 'id_user';
			$table = 'user';
		}
		elseif ($this->input->get('course')) {
			$id = $this->input->get('course');
			$key = 'id_cs';
			$table = 'course';
		}
		else{
			redirect(base_url('admin_panel/qltv'));
		}

		// Bắt sự kiện edit
		if ($this->input->post('update') == 'user') {
			$data['id'] = $id;
			$data['name'] = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['job'] = $this->input->post('job');
			$data['about'] = $this->input->post('about');
			$data['permission'] = $this->input->post('permission');
			
			$model_update = new M_Admin();
			$model_update->update_user($data);
		}
		if ($this->input->post('update') == 'course') {
			$data['id_cs'] = $id;
			$data['ten_cs'] = $this->input->post('ten_cs');
			$data['info_cs'] = $this->input->post('info_cs');
			$data['tc_cs'] = $this->input->post('tc_cs');
			$data['mota_cs'] = $this->input->post('mota_cs');
			$data['giaotrinh_cs'] = $this->input->post('giaotrinh_cs');
			$data['gia_cs'] = $this->input->post('gia_cs');
			$data['id_cate'] = $this->input->post('theloai_cs');
			$data['sobh_cs'] = $this->input->post('sobh_cs');
			$data['time_cs'] = $this->input->post('time_cs');
			
			
			$model_update = new M_Admin();
			$model_update->update_course($data);
		}

		$model = new M_Admin();
		$result = $model->showone($id, $key, $table);
		$view = new V_Admin();
		if ($table == 'user') {
			$view->edit_user($result);
		}
		if ($table == 'course') {
			$view->edit_course($result);
		}
	}
	public function qlkh()
	{
		$model = new M_Admin();
		$view = new V_Admin();

		if ($this->input->get('delete')) {
			$id = $this->input->get('delete');
			$model->delete_course($id);
		}
		if ($this->input->post('add_course') == 'add') {
			$item['ten_cs'] = $this->input->post('ten');
			$item['info_cs'] = $this->input->post('info');
			$item['tc_cs'] = $this->input->post('tc');
			$item['mota_cs'] = $this->input->post('mota');
			$item['giaotrinh_cs'] = $this->input->post('giaotrinh');
			$item['gia_cs'] = $this->input->post('price');
			$item['id_cate'] = $this->input->post('theloai');
			$item['sobh_cs'] = $this->input->post('sobh');
			$item['time_cs'] = $this->input->post('time');

			$this->load->model('m_admin');
			$model_add = new M_Admin();
			$model_add->add_course($item);
		}
		$result = $model->qlkh();
		
		$view->qlkh($result);
	}
	public function cancel_search()
	{
		$this->session->unset_userdata('type_member');
		$this->session->unset_userdata('keyword_member');
		switch ($this->input->get('page')) {
			case 'qltv':
				redirect(base_url('admin_panel/qltv'));
				break;

			case 'qlkh':
				redirect(base_url('admin_panel/qlkh'));
				break;
		}
		
	}
}
