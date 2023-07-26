<?php

class Laporan_Presensi_model extends CI_Model {

  public function getActivity() {
    $sql = "SELECT * FROM pembinaan 
            WHERE pembinaan.kategori IN ('1', '2');";
    return $this->db->query($sql)->result();
  }

  public function getAttendancesHeld() {
    $sql = "SELECT * FROM pembinaan
            LEFT JOIN peserta_pembinaan 
            ON pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan
            LEFT JOIN presensi 
            ON peserta_pembinaan.id_peserta_pembinaan = presensi.id_peserta_pembinaan
            LEFT JOIN peserta 
            ON peserta_pembinaan.id_peserta = peserta.id_peserta
            WHERE pembinaan.kategori IN ('1', '2') 
            AND (peserta.status IS NULL OR peserta.status NOT IN ('0', '2'));";
    return $this->db->query($sql)->result();
  }
  
  public function getParticipantAttendance($id) {
    $sql = "SELECT * FROM pembinaan
            JOIN peserta_pembinaan 
            ON pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan
            LEFT JOIN presensi 
            ON peserta_pembinaan.id_peserta_pembinaan = presensi.id_peserta_pembinaan
            JOIN peserta 
            ON peserta_pembinaan.id_peserta = peserta.id_peserta
            WHERE pembinaan.id_kegiatan = '$id' 
            AND (peserta.status IS NULL OR peserta.status NOT IN ('0', '2'));";
    return $this->db->query($sql)->result();
	}

  public function getDetailParticipantById($participantId) {
    $this->db->select('*');
    $this->db->from('peserta');
    $this->db->join('peserta_pembinaan', 'peserta.id_peserta = peserta_pembinaan.id_peserta');
    $this->db->join('pembinaan', 'peserta_pembinaan.id_kegiatan = pembinaan.id_kegiatan');
    $this->db->where('peserta_pembinaan.id_peserta_pembinaan', $participantId);
    return $this->db->get()->row();
  }
}
