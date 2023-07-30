<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *  @property input $input
 *  @property upload $upload
 *  @property session $session
 *  @property form_validation $form_validation
 *  @property pendaftaran_model $pendaftaran_model
 *  @property permohonan_model $permohonan_model
 */

class Program extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('pendaftaran_model');
    $this->load->model('permohonan_model');
	}
  
  public function index() {
		$this->load->view('homepage/header');
		$this->load->view('homepage/program');
		$this->load->view('homepage/footer');
  }

  public function pendaftaran() {
    $data['activities'] = $this->pendaftaran_model->getKegiatan();
    $this->load->view('homepage/header');
		$this->load->view('homepage/show_activity', $data);
  }

  public function registrationForm($activityId) {
    $data['activity'] = $this->pendaftaran_model->getActivityById($activityId);
    $this->load->view('homepage/header');
		$this->load->view('homepage/registration_form', $data);
		$this->load->view('homepage/footer');
  }

  public function addRegistration($activityId) {
		$config = array(
			array(
        'field' => 'nama', 
        'label' => 'Nama Lengkap', 
        'rules' => 'max_length[50]',
      ),
      array(
        'field' => 'jk', 
        'label' => 'Jenis Kelamin', 
        'rules' => 'max_length[1]',
      ),
			array(
        'field' => 'telp', 
        'label' => 'No. Telp', 
        'rules' => 'max_length[15]|numeric',
      ),
      array(
        'field' => 'alamat', 
        'label' => 'Alamat', 
        'rules' => 'max_length[100]',
      ),
      array(
        'field' => 'email', 
        'label' => 'Email', 
        'rules' => 'max_length[50]',
      ),
		);
		$this->form_validation->set_rules($config);

    $idPeserta = $this->pendaftaran_model->makeIdPeserta();
    $email = $this->input->post('email');
    if($email == '')
      $email = null;
	
	 	if($this->form_validation->run()) {
			$dataPeserta = [
        'id_peserta' => $idPeserta,
        'nama' => $this->input->POST('nama'),
				'jk' => $this->input->POST('jenis_kelamin'),
				'telp' => $this->input->POST('telp'),
				'alamat' => $this->input->POST('alamat'),
        'email' => $email,
        'tgl_daftar' => date('Y/m/d'),
        'status' => '0',
			];
			$this->pendaftaran_model->addPeserta($dataPeserta);
      $dataPesertaPembinaan = [
        'id_peserta_pembinaan' => $this->pendaftaran_model->makeIdPesertaPembinaan(),
        'id_peserta' => $idPeserta,
        'id_kegiatan' => $activityId,
      ];
      $this->pendaftaran_model->addPesertaPembinaan($dataPesertaPembinaan);
			redirect('program');
		}
  }

  public function permohonan() {
    $this->load->view('homepage/header');
		$this->load->view('homepage/workshop_request');
		$this->load->view('homepage/footer');
  }

  public function addRequest() {
    $config = array(
			array(
        'field' => 'name', 
        'label' => 'Nama Lengkap', 
        'rules' => 'max_length[50]',
      ),
			array(
        'field' => 'phone', 
        'label' => 'No. Telp', 
        'rules' => 'max_length[15]|numeric',
      ),
      array(
        'field' => 'activity_name', 
        'label' => 'Nama Kegiatan', 
        'rules' => 'max_length[50]',
      ),
      array(
        'field' => 'location', 
        'label' => 'Alamat Kegiatan', 
        'rules' => 'max_length[100]',
      ),
      array(
        'field' => 'note', 
        'label' => 'Keterangan', 
        'rules' => 'max_length[100]',
      ),
		);
		$this->form_validation->set_rules($config);	

    if ($this->form_validation->run()) {
      $requestId = $this->permohonan_model->makeRequestId();
      $configUpload['upload_path']    = FCPATH.'/uploads/activity_letter/';
      $configUpload['allowed_types']  = 'pdf|jpg|jpeg|png';
      $configUpload['file_name']      = $requestId;
      $configUpload['overwrite']      = true;
      $configUpload['max_size']       = 2048;
      $this->load->library('upload', $configUpload);

      if (!$this->upload->do_upload('activity_letter')) {
        $data['error'] = $this->upload->display_errors();
        echo $data['error'];
      } else {
        $uploadedData = $this->upload->data();
      }

      $data = [
        'id_permohonan' => $requestId,
        'nama_pemohon' => $this->input->post('name_of_requester'),
				'telp' => $this->input->post('phone'),
				'nama_kegiatan' => $this->input->post('activity_name'),
				'alamat_kegiatan' => $this->input->post('activity_location'),
        'tgl_permohonan' => date('Y/m/d'),
        'surat_kegiatan' => $uploadedData['file_name'],
        'status_permohonan' => '0',
        'keterangan' => $this->input->post('note'),
			];

      $this->permohonan_model->addRequest($data);
      redirect('program');
		}
  }
}
