<?php

class Auth_model extends CI_Model {

  public function loginCheck($table, $where) {
    return $this->db->get_where($table, $where)->row();
	}

  public function getInstructorByUserId($id) {
    $this->db->select('*');
    $this->db->from('instruktur');
    $this->db->where('id_user', $id);
    return $this->db->get()->row();
  }

  public function makeUserId() {
    $sql = "SELECT MAX(MID(id_user, 4, 2)) as id
            FROM user
            WHERE MID(id_user, 2, 2) = DATE_FORMAT(CURRENT_DATE(), '%y')";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.02d", $increamentNo);
    } else {
      $no = '01';
    }
    $requestId = 'U'.date('y').$no;
    return $requestId;
  }

  public function registerUser($data) {
    return $this->db->insert('user', $data);
  }
}
