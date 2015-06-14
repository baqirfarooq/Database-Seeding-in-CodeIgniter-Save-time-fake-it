<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function insert($options = array()) {
		$this->db->insert('user', $options);
	}
	function truncate()
	{
		$this->db->truncate('user');
	}
	function get()
	{
		$query = $this->db->get('user');
		return $query->result();
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */