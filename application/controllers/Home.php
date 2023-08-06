<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  @property pendaftaran_model $pendaftaran_model
 */

class Home extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('pendaftaran_model');
	}
  
  public function index() {
    $data['activities'] = $this->pendaftaran_model->getKegiatan();
		$this->load->view('homepage/header');
		$this->load->view('homepage/home', $data);
		$this->load->view('homepage/footer');
  }
}
