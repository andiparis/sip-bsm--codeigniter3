<?php

class Laporan_Peserta_model extends CI_Model {

  public function getAll() {
    return $this->db->get('peserta')->result();
	}

  public function getKegiatan() {
    $this->db->select('*');
    $this->db->from('peserta');
    $this->db->join('peserta_pembinaan', 'peserta.id_peserta = peserta_pembinaan.id_peserta');
    $this->db->join('pembinaan', 'peserta_pembinaan.id_kegiatan = pembinaan.id_kegiatan');
    return $this->db->get()->result();
  }

  public function changeStatus($id, $data) {
    $this->db->where('id_peserta', $id);
    return $this->db->update('peserta', $data);
  }
}
