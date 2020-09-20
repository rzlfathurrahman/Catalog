<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model {

	public function getData()
	{
		return $this->db->get('users')->result_array();
	}

	public function insertData($data,$table)
	{
		$this->db->insert($table,$data);
	}

	public function deleteData($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file Model_users.php */
/* Location: ./application/models/Model_users.php */