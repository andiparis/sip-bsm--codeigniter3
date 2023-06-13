<?php

class Presensi_model extends CI_Model {

  public function makeIdPresensi() {
    $sql = 'SELECT MAX(MID(id_presensi, 7, 5)) as id
            FROM presensi
            WHERE MID(id_presensi, 3, 4) = DATE_FORMAT(CURRENT_DATE(), "%y%m")';
    $query = $this->db->query($sql);
    if($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.04d", $increamentNo);
    } else {
      $no = '00001';
    }
    return 'PR'.date('ym').$no;
  }

  public function add($data) {
    return $this->db->insert('presensi', $data);
  }
}
