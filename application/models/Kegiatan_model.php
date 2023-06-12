<?php

class Kegiatan_model extends CI_Model {

  public function getAll() {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('instruktur', 'pembinaan.id_instruktur_1 = instruktur.id_instruktur');
    return $this->db->get()->result();
	}

  public function getPermohonan() {
    // $this->db->select('*');
    // $this->db->from('pembinaan');
    // $this->db->join('workshop', 'pembinaan.id_permohonan = workshop.id_permohonan');
    return $this->db->get('workshop')->result();
  }

  public function getInstruktur2() {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('instruktur', 'pembinaan.id_instruktur_2 = instruktur.id_instruktur');
    return $this->db->get()->result();
  }

  public function getKelas() {
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

  public function add($data) {
    return $this->db->insert('pembinaan', $data);
  }

  public function edit($id, $data) {
    $this->db->where('id_kegiatan', $id);
    return $this->db->update('pembinaan', $data);
  }

  public function delete($id) {
    $this->db->where('kode_kegiatan', $id);
    return $this->db->delete('pembinaan');
  }
}
