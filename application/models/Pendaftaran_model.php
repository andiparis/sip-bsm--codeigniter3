<?php

class Pendaftaran_model extends CI_Model {

  public function getKegiatan() {
    return $this->db->get('pembinaan')->result();
	}

  public function addPeserta($data) {
    return $this->db->insert('peserta', $data);
  }

  public function addPresensi($data) {
    return $this->db->insert('presensi', $data);
  }
}
