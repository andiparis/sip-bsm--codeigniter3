<?php

class Laporan_Permohonan_model extends CI_Model {

  // public function getKegiatan() {
  //   $this->db->select('*');
  //   $this->db->from('presensi');
  //   $this->db->join('peserta', 'presensi.id_peserta = peserta.id_peserta');
  //   $this->db->join('pembinaan', 'presensi.kode_kegiatan = pembinaan.kode_kegiatan');
  //   // $this->db->join('jadwal_pembinaan', 'presensi.id_jadwal = jadwal_pembinaan.id_jadwal');
  //   return $this->db->get()->result();
  // }

  public function getAll() {
    return $this->db->get('workshop')->result();
	}
}
