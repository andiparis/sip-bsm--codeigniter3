<?php

class Kelas_model extends CI_Model {

  public function getAll() {
    return $this->db->get('kelas')->result();
	}

  public function getById($id) {
    $this->db->where('id_kelas', $id);
    return $this->db->get('kelas')->row();
  }

  public function add($data) {
    return $this->db->insert('kelas', $data);
  }

  public function edit($id, $data) {
    $this->db->where('id_kelas', $id);
    return $this->db->update('kelas', $data);
  }

  public function delete($id) {
    $this->db->where('id_kelas', $id);
    return $this->db->delete('kelas');
  }
}
