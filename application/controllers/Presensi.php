<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property input $input
 *  @property session $session
 *  @property form_validation $form_validation
 *  @property presensi_model $presensi_model
 */

class Presensi extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('presensi_model');

    if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
  }

  public function index() {
    $instructorId = $this->session->userdata('instructorId');
    $data['activityData'] = $this->presensi_model->getKegiatan($instructorId);
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/participant_attendance/show_activity', $data);
		$this->load->view('templates/footer');
  }

  public function addAttendance($activityId) {
    $config = array(
			array(
        'field' => 'attendance_date', 
        'label' => 'Tgl Presensi', 
        'rules' => 'max_length[15]',
      ),
    );
    $this->form_validation->set_rules($config);

    if ($this->form_validation->run()) {
      $allCheckboxes = $this->presensi_model->getParticipantId($activityId);
      $selectedCheckboxes = $this->input->post('participant_id');
      if (!empty($selectedCheckboxes)) {
        foreach ($allCheckboxes as $checkbox) {
          $data = array(
            'id_presensi' => $this->presensi_model->makeIdPresensi(),
            'tgl' => $this->input->post('attendance_date'),
            'status_kehadiran' => in_array($checkbox->id_peserta_pembinaan, $selectedCheckboxes) ? '1' : '0',
            'id_peserta_pembinaan' => $checkbox->id_peserta_pembinaan,
          );
          $this->presensi_model->add($data);
        }
        redirect('presensi');
      }
    } else {
      $data['activityParticipant'] = $this->presensi_model->getParticipantByActivityId($activityId);
      $data['activityId'] = $activityId;
      $this->load->view('templates/header');
      $this->load->view('templates/menu');
      $this->load->view('pembinaan/participant_attendance/add_attendance', $data);
      $this->load->view('templates/footer');
    }
  }
}
