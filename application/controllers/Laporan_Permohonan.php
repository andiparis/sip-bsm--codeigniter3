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
		$data['data'] = $this->laporan_permohonan_model->getAll();
    // $data['data_kegiatan'] = $this->peserta_model->getKegiatan();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('workshop/laporan_permohonan/show_permohonan', $data);
		$this->load->view('templates/footer');
	}
}
