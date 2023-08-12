<?php

class Laporan_Peserta_model extends CI_Model {

  public function getReportsByMonth($month) {
    $this->db->select('*');
    $this->db->from('pembinaan');
    $this->db->join('peserta_pembinaan', 'pembinaan.id_kegiatan = peserta_pembinaan.id_kegiatan', 'left');
    $this->db->join('peserta', 'peserta_pembinaan.id_peserta = peserta.id_peserta');
    $this->db->where('MONTH(pembinaan.tgl_mulai)', $month);
    $this->db->where('YEAR(pembinaan.tgl_mulai)', date('Y'));
    $this->db->order_by('pembinaan.kategori', 'ASC');
    return $this->db->get()->result();
	}
}
