<?php

class Jadwal_Instruktur_model extends CI_Model {

  public function getDetailKegiatan($id) {
    $this->db->select('*');
    $this->db->from('peserta_pembinaan');
    $this->db->join('pembinaan', 'peserta_pembinaan.id_kegiatan = pembinaan.id_kegiatan', 'right');
    $this->db->join('peserta', 'peserta_pembinaan.id_peserta = peserta.id_peserta', 'left');
    $this->db->where("(pembinaan.id_instruktur_1 = '$id' OR pembinaan.id_instruktur_2 = '$id')");
    $this->db->order_by('pembinaan.tgl_mulai', 'DESC');
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



  public function getAll() {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('instruktur', 'pembinaan.id_instruktur_1 = instruktur.id_instruktur');
    return $this->db->get()->result();
	}

  public function getWorkshopRequest() {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('workshop', 'pembinaan.id_permohonan = workshop.id_permohonan', 'right');
    $this->db->where('workshop.status_permohonan', '1');
    $this->db->where('pembinaan.id_permohonan IS NULL');
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
    $sql = 'SELECT MAX(MID(id_kegiatan, 7, 3)) as id
            FROM pembinaan
            WHERE MID(id_kegiatan, 3, 4) = DATE_FORMAT(CURRENT_DATE(), "%y%m")';
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
      $row = $query->row();
      $increamentNo = ((int)$row->id) + 1;
      $no = sprintf("%'.03d", $increamentNo);
    } else {
      $no = '001';
    }
    $requestId = 'PB'.date('ym').$no;
    return $requestId;
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
