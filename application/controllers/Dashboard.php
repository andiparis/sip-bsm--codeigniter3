<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property session $session
 */

class Dashboard extends CI_Controller {

  function __construct() {
		parent::__construct();
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
  public function index() {
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('master/dashboard');
		$this->load->view('templates/footer');
  }
}
