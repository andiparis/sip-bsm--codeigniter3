<?php

class Permohonan_model extends CI_Model {

  public function add($data) {
    return $this->db->insert('workshop', $data);
  }
}
