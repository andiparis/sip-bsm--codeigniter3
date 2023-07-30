<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

  function __construct() {
		parent::__construct();
	}
  
  public function index() {
		$this->load->view('homepage/header');
		$this->load->view('homepage/home');
		$this->load->view('homepage/footer');
  }
}
