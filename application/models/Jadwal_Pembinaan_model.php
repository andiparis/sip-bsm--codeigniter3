<?php

class Jadwal_Pembinaan_model extends CI_Model {

  public function getAll() {
    return $this->db->get('jadwa_pembinaan')->result();
	}

  public function getById($id) {
    $this->db->where('kode_kegiatan', $id);
    return $this->db->get('pembinaan')->row();
  }

  public function add($data) {
    return $this->db->insert('pembinaan', $data);
  }

  public function edit($id, $data) {
    $this->db->where('kode_kegiatan', $id);
    return $this->db->update('pembinaan', $data);
  }

  public function delete($id) {
    $this->db->where('kode_kegiatan', $id);
    return $this->db->delete('pembinaan');
  }
}
