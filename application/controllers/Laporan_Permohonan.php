<?php

class Laporan_Permohonan extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('laporan_permohonan_model');
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
		$data['workshopRequest'] = $this->laporan_permohonan_model->getWorkshopRequest();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('workshop/request_report/workshop_report', $data);
		$this->load->view('templates/footer');
	}

  public function approveRequest($requestId) {
    $data = [
      'status_permohonan' => '1',
    ];
    $this->laporan_permohonan_model->changeRequestStatus($requestId, $data);
    redirect('laporan_permohonan');
  }

  public function rejectRequest($requestId) {
    $data = [
      'status_permohonan' => '2',
    ];
    $this->laporan_permohonan_model->changeRequestStatus($requestId, $data);
    redirect('laporan_permohonan');
  }
}
