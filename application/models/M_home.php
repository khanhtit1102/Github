<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Model
{
	public function load_all_cate()
	{
		$sql = "SELECT * FROM category WHERE 1 ORDER BY stt_cate ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function load_slide_newest()
	{
		$sql = "SELECT * FROM course WHERE 1 ORDER BY id_cs DESC LIMIT 7";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function load_slide_price()
	{
		$sql = "SELECT * FROM course WHERE 1 ORDER BY gia_cs DESC LIMIT 7";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function load_slide_rand()
	{
		$sql = "SELECT * FROM course ORDER BY RAND() LIMIT 7";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}

