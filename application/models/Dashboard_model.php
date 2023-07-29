<?php

class Dashboard_model extends CI_Model {

  public function getInstructor() {
    return $this->db->get('instruktur')->num_rows();
	}

  public function getActivity() {
    $this->db->from('pembinaan');
    $this->db->where_in('kategori', array('1', '2'));
    return $this->db->get()->num_rows();
  }

  public function getParticipant() {
    $this->db->from('peserta');
    $this->db->where('status', '1');
    return $this->db->get()->num_rows();
  }

  public function getWorkshop() {
    $this->db->from('workshop');
    $this->db->where('status_permohonan', '1');
    return $this->db->get()->num_rows();
  }
}
