<?php

class Laporan_Presensi extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('laporan_presensi_model');
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
		$data['activityData'] = $this->laporan_presensi_model->getActivity();
    $data['attendanceData'] = $this->laporan_presensi_model->getAttendancesHeld();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/laporan_presensi/show_activity', $data);
		$this->load->view('templates/footer');
	}

  // public function setujui_pendaftaran($id) {
  //   $data = [
  //     'status' => '1',
  //   ];
  //   $this->peserta_model->changeStatus($id, $data);

  //   $detailKegiatan = $this->peserta_model->getKegiatan();
  //   foreach($detailKegiatan as $kegiatan) {
  //     if($id == $kegiatan->id_peserta) {
  //       $tglMulai = $kegiatan->tgl_mulai;
  //       $tglBerakhir = $kegiatan->tgl_berakhir;
  //       $idPesertaPembinaan = $kegiatan->id_peserta_pembinaan;
  //     }
  //   }

  //   $dateInterval = new DatePeriod(
  //     new DateTime($tglMulai),
  //     new DateInterval('P1D'),
  //     new DateTime($tglBerakhir . '+ 1 day'),
  //   );

  //   foreach($dateInterval as $data) {
  //     $presensiData = [
  //       'id_presensi' => $this->presensi_model->makeIdPresensi(),
  //       'tgl' => $data->format('Y-m-d'),
  //       'status' => '0',
  //       'id_peserta_pembinaan' => $idPesertaPembinaan,
  //     ];
  //     $this->presensi_model->add($presensiData);
  //   }
  //   redirect('peserta');
	// }

  // public function tolak_pendaftaran($id) {
  //   $data = [
  //     'status' => '0',
  //   ];
  //   $this->peserta_model->changeStatus($id, $data);
  //   redirect('peserta');
	// }
}
