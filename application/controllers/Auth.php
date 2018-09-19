<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url', 'form'));	
		$this->load->library("session");
	}
	public function index()
	{
		
		if ($this->session->has_userdata('id_user')) {
			$this->load->model('m_auth');
			$model = new M_Auth();

			$this->load->view('v_auth');
			$view = new V_Auth();

			// Show owner courses
			$this->load->model('m_auth');
			$model = new M_Auth();
			$owner = $model->show_owner_course();

			$data = $model->show_once();

			
			$view->show_info($data, $owner);

			if ($this->input->post('changeinfo') == 'changeinfo') {
				$id = $this->session->userdata('id_user');
				$name = $this->input->post('name_user');
				$job = $this->input->post('job_user');
				$about = $this->input->post('about_user');

				$model->changeinfo($id, $name, $job, $about);
			}
			if ($this->input->post('changepass') == 'changepass') {
				$id = $this->session->userdata('id_user');
				$oldpass = md5($this->input->post('oldpass'));
				$newpass = md5($this->input->post('newpass'));

				$model->changepass($id, $oldpass, $newpass);
			}
		}
		else{
			redirect(base_url('auth/login'));
		}
	}
	public function login()
	{
		if ($this->session->has_userdata('id_user')) {
			redirect(base_url('auth'));
		}
		else{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('pass', 'Mật khẩu', 'required|min_length[6]');
			if($this->form_validation->run() == FALSE){
				$this->load->view('v_auth');
				$view = new V_Auth();
				$view->show_login();
			}
			else{
				$this->login_submit();
			}
		}
		
	}
	public function login_submit()
	{
		if ($this->input->post('login') == 'login') {
			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass'));
			$this->load->model('m_auth');
			$model = new M_Auth();
			$model->login($email, $pass);
		}
		else{
			redirect(base_url('auth/login'));
		}
	}
	public function register()
	{
		if ($this->session->has_userdata('id_user')) {
			redirect(base_url('auth'));
		}
		else{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Họ và tên', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('pass', 'Mật khẩu', 'required|min_length[6]');
			if($this->form_validation->run() == FALSE){
				$this->load->view('v_auth');
				$view = new V_Auth();
				$view->show_register();
			}
			else{
				$this->register_submit();
			}
		}
		
		
	}
	public function register_submit()
	{
		if ($this->input->post('register') == 'register') {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$pass = md5($this->input->post('pass'));
			$this->load->model('m_auth');
			$model = new M_Auth();
			$model->register($username, $email, $pass);
			echo "<meta http-equiv='refresh' content='0; url=".base_url('auth/register')."' />";
		}
		else{
			redirect(base_url('auth/register'));
		}
	}
	public function logout()
	{
		// Clear all SESSION value
		$this->session->sess_destroy();
		redirect(base_url('auth/login'));
	}
	public function money($number = '0')
	{
		$this->load->model('m_auth');
		$model = new M_Auth();
		$model->add_money($number);
		redirect(base_url('auth'));
	}
}