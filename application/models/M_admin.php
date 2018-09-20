<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model
{
	public function __construct(){
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library("session");
    }
    public function dashboard_count()
    {
    	$course = $this->db->from('course');
    	$count_course = $this->db->count_all_results();
    	$comment = $this->db->from('cmt');
    	$count_comment = $this->db->count_all_results();
    	$own = $this->db->from('own');
    	$count_own = $this->db->count_all_results();
    	$user = $this->db->from('user');
    	$count_user = $this->db->count_all_results();
    	$dashboard_count = array(
    		'course' => $count_course, 
    		'comment' => $count_comment, 
    		'own' => $count_own, 
    		'user' => $count_user 
    	);
    	return $dashboard_count;
    }
    public function admin_chat()
    {
    	$this->db->from('adminchat, user')->where('adminchat.id_user = user.id_user')->order_by('adminchat.date_chat', 'DESC');
    	$query = $this->db->get();
		return $query->result_array();
    }
    public function add_chat($comment)
    {
    	$this->db->insert('adminchat', $comment);
    }
	public function qltv()
	{
		$query = $this->db->get('user');
		return $query->result_array();
	}
	public function delete_user($id)
	{
		$this->db->where('id_user', $id)->delete('adminchat');
		$this->db->where('id_user', $id)->delete('cart');
		$this->db->where('id_user', $id)->delete('own');
		$this->db->where('id_user', $id)->delete('user');
	}
	public function show_one_user($id)
	{
		$this->db->from('user')->where('id_user', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function show_one_course($id)
	{
		$this->db->from('course')->where('id_cs', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update_user($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}
	public function add_user($data)
	{
		$this->db->insert('user', $data);
	}
	public function qlkh()
	{
		$query = $this->db->get('course');
		return $query->result_array();
	}
	public function delete_course($id)
	{
		$this->db->where('id_cs', $id)->delete('cmt');
		$this->db->where('id_cs', $id)->delete('own');
		$this->db->where('id_cs', $id)->delete('cart');
		$this->db->where('id_cs', $id)->delete('course');
	}
	public function add_course($data)
	{
		$this->db->insert('course', $item);
	}
	public function update_course($data)
	{
		$this->db->where('id_cs', $data['id_cs']);
		$this->db->update('course', $data);
	}
	public function search_member($name, $keyword)
	{
		$this->db->like($name, $keyword);
	}
}