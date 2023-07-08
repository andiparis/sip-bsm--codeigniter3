<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property session $session
 *  @property jadwal_instruktur_model $jadwal_instruktur_model
 */

class Jadwal_Instruktur extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('jadwal_instruktur_model');
	
		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('auth'));
		}
	}
  
	public function index() {
    $instructorId = $this->session->userdata('instructorId');
    $data['activityDetailData'] = $this->jadwal_instruktur_model->getDetailKegiatan($instructorId);
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/kegiatan/show_instructor_schedule', $data);
		$this->load->view('templates/footer');
	}

  public function detail_data($activityId) {
    $data['data'] = $this->jadwal_instruktur_model->getDetailKegiatanById($activityId);
    $data['activityData'] = $this->jadwal_instruktur_model->getInstructor1($activityId);
    $data['instructor2Data'] = $this->jadwal_instruktur_model->getInstructor2($activityId);
    $data['classData'] = $this->jadwal_instruktur_model->getClass();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/kegiatan/detail_instructor_schedule', $data);
		$this->load->view('templates/footer');
  }
}
