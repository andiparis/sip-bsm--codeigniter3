<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property session $session
 *  @property laporan_peserta_model $laporan_peserta_model
 */

class Laporan_Peserta extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('laporan_peserta_model');
	
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
    $month = date('n');
    $data['reports'] = $this->laporan_peserta_model->getReportsByMonth($month);
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/laporan_peserta/participant_report', $data);
		$this->load->view('templates/footer');
	}

  public function loadReportTable($month) {
    $data['reports'] = $this->laporan_peserta_model->getReportsByMonth($month);
    $this->load->view('pembinaan/laporan_peserta/report_table_data', $data);
  }
}
