<?php

class Auth_model extends CI_Model {

  public function login_check($table, $where) {
		// $this->db->select('nama');
		$query = $this->db->get_where($table, $where);
		return $query;
	}
}
