<?php

class Kegiatan_model extends CI_Model {

  public function getAll() {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('instruktur', 'pembinaan.id_instruktur_1 = instruktur.id_instruktur');
    return $this->db->get()->result();
	}

  public function getDetailKegiatan() {
    $sql = "SELECT * FROM peserta_pembinaan 
            RIGHT JOIN pembinaan 
            ON pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan 
            LEFT JOIN peserta 
            ON peserta_pembinaan.id_peserta = peserta.id_peserta;";
    $query = $this->db->query($sql);
    return $query->result();
	}

  public function getWorkshopRequest() {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('workshop', 'pembinaan.id_permohonan = workshop.id_permohonan', 'right');
    $this->db->where('workshop.status_permohonan', '1');
    $this->db->where('pembinaan.id_permohonan IS NULL');
    return $this->db->get()->result();
  }

  public function getInstructor1($id) {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('instruktur', 'pembinaan.id_instruktur_1 = instruktur.id_instruktur');
    $this->db->where('pembinaan.id_kegiatan', $id);
    return $this->db->get()->result();
	}

  public function getInstructor2($id) {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('instruktur', 'pembinaan.id_instruktur_2 = instruktur.id_instruktur');
    $this->db->where('pembinaan.id_kegiatan', $id);
    return $this->db->get()->result();
  }

  public function getClass() {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('kelas', 'pembinaan.id_kelas = kelas.id_kelas');
    return $this->db->get()->result();
  }

  public function getInstrukturName() {
    return $this->db->get('instruktur')->result();
  }

  public function getKelasName() {
    return $this->db->get('kelas')->result();
  }

  public function getById($id) {
    $this->db->where('id_kegiatan', $id);
    return $this->db->get('pembinaan')->row();
  }

  public function getDetailKegiatanById($id) {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('peserta_pembinaan', 'pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan');
    $this->db->join('peserta', 'peserta_pembinaan.id_peserta = peserta.id_peserta');
    $this->db->where('pembinaan.id_kegiatan', $id);
    return $this->db->get()->result();
	}

  public function makeActivityId() {
    $sql = 'SELECT MAX(MID(id_kegiatan, 7, 2)) as id
            FROM pembinaan
            WHERE MID(id_kegiatan, 3, 4) = DATE_FORMAT(CURRENT_DATE(), "%y%m")';
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.02d", $increamentNo);
    } else {
      $no = '01';
    }
    $acitivityId = 'PB'.date('ym').$no;
    return $acitivityId;
  }

  public function add($data) {
    return $this->db->insert('pembinaan', $data);
  }

  public function edit($id, $data) {
    $this->db->where('id_kegiatan', $id);
    return $this->db->update('pembinaan', $data);
  }

  public function changeStatus($id, $data) {
    $this->db->where('id_peserta', $id);
    return $this->db->update('peserta', $data);
  }

  public function delete($id) {
    $this->db->where('id_kegiatan', $id);
    return $this->db->delete('pembinaan');
  }
}
