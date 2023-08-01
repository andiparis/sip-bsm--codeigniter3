<?php

class Instruktur_model extends CI_Model {

  public function getAll() {
    $this->db->order_by('keahlian', 'ASC');
    return $this->db->get('instruktur')->result();
	}

  public function getUserAccount() {
    $this->db->select('*');
    $this->db->from('instruktur');
    $this->db->join('user', 'instruktur.id_user = user.id_user', 'right');
    $this->db->where('user.level', '1');
    $this->db->where('instruktur.id_user IS NULL');
    return $this->db->get()->result();
  }

  public function getById($id) {
    $this->db->where('id_instruktur', $id);
    return $this->db->get('instruktur')->row();
  }

  public function makeInstructorId() {
    $sql = 'SELECT MAX(MID(id_instruktur, 5, 2)) as id
            FROM instruktur
            WHERE MID(id_instruktur, 3, 2) = DATE_FORMAT(CURRENT_DATE(), "%y")';
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.02d", $increamentNo);
    } else {
      $no = '01';
    }
    $instructorId = 'IT'.date('y').$no;
    return $instructorId;
  }

  public function add($data) {
    return $this->db->insert('instruktur', $data);
  }

  public function edit($id, $data) {
    $this->db->where('id_instruktur', $id);
    return $this->db->update('instruktur', $data);
  }

  public function delete($id) {
    $this->db->where('id_instruktur', $id);
    return $this->db->delete('instruktur');
  }
}
