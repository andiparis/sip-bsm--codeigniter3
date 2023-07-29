<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property session $session
 *  @property dashboard_model $dashboard_model
 */

class Dashboard extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('dashboard_model');
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
  public function index() {
    $data['instructor'] = $this->dashboard_model->getInstructor();
    $data['activity'] = $this->dashboard_model->getActivity();
    $data['participant'] = $this->dashboard_model->getParticipant();
    $data['workshop'] = $this->dashboard_model->getWorkshop();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('master/dashboard', $data);
		$this->load->view('templates/footer');
  }
}
