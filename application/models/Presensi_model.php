<?php

class Presensi_model extends CI_Model {

  public function getKegiatan() {
    $sql = "SELECT * FROM pembinaan 
            WHERE pembinaan.kategori IN ('1', '2') 
            AND DATE_ADD(pembinaan.tgl_berakhir, INTERVAL 1 MONTH) > CURDATE();";
    return $this->db->query($sql)->result();
  }

  public function getParticipantId($id) {
    $sql = "SELECT peserta_pembinaan.id_peserta_pembinaan 
            FROM pembinaan 
            JOIN peserta_pembinaan 
            ON pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan 
            JOIN peserta 
            ON peserta_pembinaan.id_peserta = peserta.id_peserta 
            WHERE pembinaan.id_kegiatan = '$id' AND peserta.status = '1';";
    return $this->db->query($sql)->result();
  }

  public function getParticipantByActivityId($id) {
    $sql = "SELECT * FROM pembinaan
            JOIN peserta_pembinaan 
            ON pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan 
            JOIN peserta 
            ON peserta_pembinaan.id_peserta = peserta.id_peserta 
            WHERE pembinaan.id_kegiatan = '$id' AND peserta.status = '1';";
    return $this->db->query($sql)->result();
	}

  // public function getDetailKegiatan() {
  //   $sql = "SELECT * FROM peserta_pembinaan
  //           RIGHT JOIN pembinaan
  //           ON pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan
  //           LEFT JOIN peserta
  //           ON peserta_pembinaan.id_peserta = peserta.id_peserta;";
  //   $query = $this->db->query($sql);
  //   return $query->result();
	// }

  public function makeIdPresensi() {
    $sql = 'SELECT MAX(MID(id_presensi, 7, 5)) as id
            FROM presensi
            WHERE MID(id_presensi, 3, 4) = DATE_FORMAT(CURRENT_DATE(), "%y%m")';
    $query = $this->db->query($sql);
    if($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.05d", $increamentNo);
    } else {
      $no = '00001';
    }
    return 'PR'.date('ym').$no;
  }

  public function add($data) {
    return $this->db->insert('presensi', $data);
  }
}
