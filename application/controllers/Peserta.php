<?php

class Peserta extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('peserta_model');
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
		$data['data'] = $this->peserta_model->getAll();
    $data['data_kegiatan'] = $this->peserta_model->getKegiatan();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/laporan_peserta/show_peserta', $data);
		$this->load->view('templates/footer');
	}
}
