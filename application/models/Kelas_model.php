<?php

class Kelas_model extends CI_Model {

  public function getAll() {
    $this->db->order_by('nama_kelas', 'ASC');
    return $this->db->get('kelas')->result();
	}

  public function getById($id) {
    $this->db->where('id_kelas', $id);
    return $this->db->get('kelas')->row();
  }

  public function makeClassId() {
    $sql = 'SELECT MAX(MID(id_kelas, 5, 2)) as id
            FROM kelas
            WHERE MID(id_kelas, 3, 2) = DATE_FORMAT(CURRENT_DATE(), "%y")';
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.02d", $increamentNo);
    } else {
      $no = '01';
    }
    $classId = 'KL'.date('y').$no;
    return $classId;
  }

  public function add($data) {
    return $this->db->insert('kelas', $data);
  }

  public function edit($id, $data) {
    $this->db->where('id_kelas', $id);
    return $this->db->update('kelas', $data);
  }

  public function delete($id) {
    $this->db->where('id_kelas', $id);
    return $this->db->delete('kelas');
  }
}
