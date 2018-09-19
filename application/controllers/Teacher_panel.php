<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_Panel extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form'));
		$this->load->library("session");

		// Kiểm tra tài khoản Giáo Viên
		if ($this->session->has_userdata('id_user') == false) {
			redirect(base_url('auth/login'));
		}
		else{
			if ($this->session->userdata('permission_user') != 2) {
				redirect(base_url('home'));
			}
		}
		$this->load->model('m_teacher');
		
		$this->load->view('v_teacher');
		
	}
	public function index()
	{
		$view = new V_Teacher();
		$view->index();
	}
	public function edit()
	{
		$user = $this->session->userdata('name_user');
		if ($this->input->get('course')) {
			$id = $this->input->get('course');
			$key = 'id_cs';
			$table = 'course';
		}
		else{
			redirect(base_url('teacher/qltv'));
		}

		// Bắt sự kiện edit
		if ($this->input->post('update') == 'course') {
			$data['id_cs'] = $id;
			$data['ten_cs'] = $this->input->post('ten_cs');
			$data['info_cs'] = $this->input->post('info_cs');
			$data['mota_cs'] = $this->input->post('mota_cs');
			$data['giaotrinh_cs'] = $this->input->post('giaotrinh_cs');
			$data['gia_cs'] = $this->input->post('gia_cs');
			$data['id_cate'] = $this->input->post('theloai_cs');
			$data['sobh_cs'] = $this->input->post('sobh_cs');
			$data['time_cs'] = $this->input->post('time_cs');
			$data['playlist_key'] = $this->input->post('playlist');
			
			
			$model_update = new M_Teacher();
			$model_update->update_course($data);
		}

		$model = new M_Teacher();
		$result = $model->showone($id, $key, $table, $user);
		$view = new V_Teacher();
		$view->edit_course($result);
	}
	public function qlkh()
	{
		$user = $this->session->userdata('name_user');
		$model = new M_Teacher();
		$view = new V_Teacher();

		if ($this->input->get('delete')) {
			$id = $this->input->get('delete');
			$model->delete_course($id, $user);
		}
		if ($this->input->post('add_course') == 'add') {
			$item['ten_cs'] = $this->input->post('ten');
			$item['info_cs'] = $this->input->post('info');
			$item['tc_cs'] = $this->session->userdata('name_user');
			$item['mota_cs'] = $this->input->post('mota');
			$item['giaotrinh_cs'] = $this->input->post('giaotrinh');
			$item['gia_cs'] = $this->input->post('price');
			$item['id_cate'] = $this->input->post('theloai');
			$item['sobh_cs'] = $this->input->post('sobh');
			$item['time_cs'] = $this->input->post('time');
			$item['playlist_key'] = $this->input->post('playlist');

			$this->load->model('m_teacher');
			$model_add = new M_Teacher();
			$model_add->add_course($item);
		}
		$result = $model->qlkh();
		
		$view->qlkh($result);
	}
}
