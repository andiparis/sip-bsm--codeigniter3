<?php

class Laporan_Peserta extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('laporan_peserta_model');
    $this->load->model('presensi_model');
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
		$data['data'] = $this->laporan_peserta_model->getAll();
    $data['data_kegiatan'] = $this->laporan_peserta_model->getKegiatan();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/laporan_peserta/show_peserta', $data);
		$this->load->view('templates/footer');
	}

  public function setujui_pendaftaran($id) {
    $data = [
      'status' => '1',
    ];
    $this->laporan_peserta_model->changeStatus($id, $data);

    $detailKegiatan = $this->laporan_peserta_model->getKegiatan();
    foreach($detailKegiatan as $kegiatan) {
      if($id == $kegiatan->id_peserta) {
        $tglMulai = $kegiatan->tgl_mulai;
        $tglBerakhir = $kegiatan->tgl_berakhir;
        $idPesertaPembinaan = $kegiatan->id_peserta_pembinaan;
      }
    }

    $dateInterval = new DatePeriod(
      new DateTime($tglMulai),
      new DateInterval('P1D'),
      new DateTime($tglBerakhir . '+ 1 day'),
    );

    foreach($dateInterval as $data) {
      $presensiData = [
        'id_presensi' => $this->presensi_model->makeIdPresensi(),
        'tgl' => $data->format('Y-m-d'),
        'status' => '0',
        'id_peserta_pembinaan' => $idPesertaPembinaan,
      ];
      $this->presensi_model->add($presensiData);
    }
    redirect('peserta');
	}

  public function tolak_pendaftaran($id) {
    $data = [
      'status' => '0',
    ];
    $this->laporan_peserta_model->changeStatus($id, $data);
    redirect('peserta');
	}
}
