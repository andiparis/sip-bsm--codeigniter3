<?php

class Laporan_Presensi_model extends CI_Model {

  public function getAll() {
    $this->db->select('*');
    $this->db->from('presensi');
    $this->db->join('peserta_pembinaan', 'presensi.id_peserta_pembinaan = peserta_pembinaan.id_peserta_pembinaan');
    $this->db->join('peserta', 'peserta_pembinaan.id_peserta = peserta.id_peserta');
    $this->db->join('pembinaan', 'peserta_pembinaan.id_kegiatan = pembinaan.id_kegiatan');
    return $this->db->get()->result();
	}

  // public function getKegiatan() {
  //   $this->db->select('*');
  //   $this->db->from('peserta');
  //   $this->db->join('peserta_pembinaan', 'peserta.id_peserta = peserta_pembinaan.id_peserta');
  //   $this->db->join('pembinaan', 'peserta_pembinaan.id_kegiatan = pembinaan.id_kegiatan');
  //   return $this->db->get()->result();
  // }

  // public function changeStatus($id, $data) {
  //   $this->db->where('id_peserta', $id);
  //   return $this->db->update('peserta', $data);
  // }
}
