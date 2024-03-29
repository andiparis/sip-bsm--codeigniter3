<?php

class Pendaftaran_model extends CI_Model {

  public function getKegiatan() {
    $sql = "SELECT * FROM peserta_pembinaan
            RIGHT JOIN pembinaan ON pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan
            LEFT JOIN peserta ON peserta_pembinaan.id_peserta = peserta.id_peserta
            WHERE pembinaan.kategori IN (1, 2)
            AND CURDATE() <pembinaan.tgl_mulai";
    $query = $this->db->query($sql);
    return $query->result();
	}

  public function getActivityById($activityId) {
    $this->db->from('pembinaan');
    $this->db->where('id_kegiatan', $activityId);
    return $this->db->get()->row();
  }

  public function makeIdPeserta() {
    $sql = 'SELECT MAX(MID(id_peserta, 7, 4)) as id
            FROM peserta
            WHERE MID(id_peserta,3,4) = DATE_FORMAT(CURRENT_DATE(), "%y%m")';
    $query = $this->db->query($sql);
    if($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.04d", $increamentNo);
    } else {
      $no = '0001';
    }
    $idPeserta = 'PS'.date('ym').$no;
    return $idPeserta;
  }

  public function makeIdPesertaPembinaan() {
    $sql = 'SELECT MAX(MID(id_peserta_pembinaan, 7, 4)) as id
            FROM peserta_pembinaan
            WHERE MID(id_peserta_pembinaan, 3, 4) = DATE_FORMAT(CURRENT_DATE(), "%y%m")';
    $query = $this->db->query($sql);
    if($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.04d", $increamentNo);
    } else {
      $no = '0001';
    }
    return 'PP'.date('ym').$no;
  }

  public function addPeserta($data) {
    return $this->db->insert('peserta', $data);
  }

  public function addPesertaPembinaan($data) {
    return $this->db->insert('peserta_pembinaan', $data);
  }
}
