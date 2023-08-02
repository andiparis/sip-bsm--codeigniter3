<?php

class Laporan_Permohonan_model extends CI_Model {

  public function getWorkshopRequest() {
    $this->db->order_by('tgl_permohonan', 'ASC');
    return $this->db->get('workshop')->result();
	}

  public function changeRequestStatus($requestId, $data) {
    $this->db->where('id_permohonan', $requestId);
    return $this->db->update('workshop', $data);
  }
}
