<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property input $input
 *  @property session $session
 *  @property form_validation $form_validation
 *  @property presensi_model $presensi_model
 *  @property laporan_presensi_model $laporan_presensi_model
 */

class Presensi extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('presensi_model');
    $this->load->model('laporan_presensi_model');

    if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
  }

  public function index() {
    $instructorId = $this->session->userdata('instructorId');
    $data['activityData'] = $this->presensi_model->getKegiatan($instructorId);
    $data['attendanceData'] = $this->laporan_presensi_model->getAttendancesHeld();
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
        'rules' => 'required|callback_check_date',
      ),
    );
    $this->form_validation->set_rules($config);

    if ($this->form_validation->run()) {
      $allCheckboxes = $this->presensi_model->getParticipantId($activityId);
      $selectedCheckboxes = $this->input->post('participant_id');
      // if (!empty($selectedCheckboxes)) {
      //   foreach ($allCheckboxes as $checkbox) {
      //     $data = array(
      //       'id_presensi' => $this->presensi_model->makeIdPresensi(),
      //       'tgl' => $this->input->post('attendance_date'),
      //       'status_kehadiran' => in_array($checkbox->id_peserta_pembinaan, $selectedCheckboxes) ? '1' : '0',
      //       'id_peserta_pembinaan' => $checkbox->id_peserta_pembinaan,
      //     );
      //     $this->presensi_model->add($data);
          
      //   }
      //   redirect('presensi');
      // }
      foreach ($allCheckboxes as $checkbox) {
        // Check if the checkbox is selected
        if (in_array($checkbox->id_peserta_pembinaan, $selectedCheckboxes)) {
          $status_kehadiran = '1';
        } else {
          $status_kehadiran = '0';
        }

        $data = array(
          'id_presensi' => $this->presensi_model->makeIdPresensi(),
          'tgl' => $this->input->post('attendance_date'),
          'status_kehadiran' => $status_kehadiran,
          'id_peserta_pembinaan' => $checkbox->id_peserta_pembinaan,
        );
        $this->presensi_model->add($data);
        $this->session->set_flashdata('success_message', 'Data presensi peserta program pembinaan berhasil disimpan.');
      }
      redirect('presensi');
    } else {
      $data['activityParticipant'] = $this->presensi_model->getParticipantByActivityId($activityId);
      $data['activityId'] = $activityId;
      $this->load->view('templates/header');
      $this->load->view('templates/menu');
      $this->load->view('pembinaan/participant_attendance/add_attendance', $data);
      $this->load->view('templates/footer');
    }
  }

  public function check_date($date) {
    $currentDate = date('Y-m-d');
    if ($date > $currentDate) {
      $this->form_validation->set_message('check_date', 'Tanggal presensi cannot exceed the current date.');
      return false;
    }
    return true;
  }
}
