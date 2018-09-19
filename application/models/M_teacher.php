<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Teacher extends CI_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library("session");
    }
	public function showone($id, $key, $table, $user)
	{
		$this->db->from($table)->where($key, $id)->where('tc_cs', $user);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function qlkh()
	{
		$tc_cs = $this->session->userdata('name_user');
		$this->db->where('tc_cs', $tc_cs);
		$query = $this->db->get('course');
		return $query->result_array();
	}
	public function delete_course($id, $user)
	{
		$this->db->where('id_cs', $id)->where('tc_cs', $user)->delete('course');
	}
	public function add_course($item)
	{
		$this->db->insert('course', $item);
		echo "<script type='text/javascript'>alert('Thêm khóa học thành công!');</script>";
	}
	public function update_course($data)
	{
		$this->db->where('id_cs', $data['id_cs']);
		$this->db->update('course', $data);
	}
}