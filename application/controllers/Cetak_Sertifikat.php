<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property session $session
 *  @property laporan_presensi_model $laporan_presensi_model
 *  @property pdf $pdf
 *  @property view $view
 */

class Cetak_Sertifikat extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->helper('download');
    $this->load->library('pdf');
    $this->load->model('laporan_presensi_model');
    
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
		$data['activityData'] = $this->laporan_presensi_model->getActivity();
    $data['attendanceData'] = $this->laporan_presensi_model->getAttendancesHeld();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/print_certificate/show_activity', $data);
		$this->load->view('templates/footer');
	}

  public function participantReport($activityId) {
    $data['attendanceReport'] = $this->laporan_presensi_model->getParticipantAttendance($activityId);
    $this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/print_certificate/show_participant_report', $data);
		$this->load->view('templates/footer');
  }

  public function printCertificate($participantId) {
    $data['detailParticipant'] = $this->laporan_presensi_model->getDetailParticipantById($participantId);
    $activityName = $data['detailParticipant']->nama_kegiatan;
    $participantName = $data['detailParticipant']->nama;
    
    $this->pdf->setPaper('A4', 'landscape');
    $pdfContent = $this->pdf->load_view('pembinaan/print_certificate/certificate_layout', $data);
    $pdfFilename = $activityName . '_' . $participantName . '.pdf';

    // Set the appropriate headers to force download
    header("Content-Type: application/pdf");
    header("Content-Disposition: attachment; filename=\"$pdfFilename\"");
    header("Content-Length: " . strlen($pdfContent));
    echo $pdfContent;
  }
}
