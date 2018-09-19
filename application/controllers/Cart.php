<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'date'));	
		$this->load->library("session");
		// Kiểm tra đăng nhập và số lượng giỏ hàng
		if ($this->session->has_userdata('id_user') == false) {
			redirect(base_url('auth/login'));
		}
	}
	public function index()
	{
		$this->load->model('m_cart');
		$model = new M_Cart();
		$this->load->view('v_cart');
		$view = new V_Cart();
		//Kiểm tra số lượng giỏ hàng
		$count = $model->count();
		if ($count == 0) {
			echo "<script type='text/javascript'>alert('Chưa có khóa nào trong giỏ hàng!');</script>";
			header("Refresh:0; url=courses");
		}

		if ($this->input->get('delete')) {
			$id_cs = $this->input->get('delete');
			$model->delete_once_cart($id_cs);
			redirect(base_url('cart'));
		}
		if ($this->input->get('action') == 'buy') {
			if ($this->session->userdata['tien_thua'] <= 0) {
				echo "<script type='text/javascript'>alert('Bạn không đủ tiền! Vui lòng nạp thêm tiền để mua khóa học.');</script>";
			}
			else{
				$model->buy_all_cart();
			}
		}
		if ($this->input->get('action') == 'cancel') {
			$id = $this->session->userdata('id_user');
			$model->delete_all_cart($id);
			redirect(base_url('cart'));
		}

		$result = $model->show_all_cart();
		

		$view->index($result, $count);
	}
}