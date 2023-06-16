<?php

class Permohonan_model extends CI_Model {

  public function makeRequestId() {
    $sql = 'SELECT MAX(MID(id_permohonan, 7, 3)) as id
            FROM workshop
            WHERE MID(id_permohonan, 3, 4) = DATE_FORMAT(CURRENT_DATE(), "%y%m")';
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.04d", $increamentNo);
    } else {
      $no = '001';
    }
    $requestId = 'WS'.date('ym').$no;
    return $requestId;
  }

  public function addRequest($data) {
    return $this->db->insert('workshop', $data);
  }
}
