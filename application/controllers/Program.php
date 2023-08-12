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

  public function addRegistration($activityId) {
		$config = array(
			array(
        'field' => 'nama', 
        'label' => 'Nama Lengkap', 
        'rules' => 'required|max_length[50]',
      ),
      array(
        'field' => 'jk', 
        'label' => 'Jenis Kelamin', 
        'rules' => 'max_length[1]',
      ),
			array(
        'field' => 'telp', 
        'label' => 'No. Telp', 
        'rules' => 'required|numeric|max_length[15]',
      ),
      array(
        'field' => 'alamat', 
        'label' => 'Alamat', 
        'rules' => 'required|max_length[100]',
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
    if ($email == '')
      $email = null;
	
	 	if ($this->form_validation->run()) {
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
      $this->session->set_flashdata('success_message', 'Pendaftaran anda berhasil dikirimkan. Sampai berjumpa pada kegiatan yang akan berlangsung.');
			redirect('program');
		} else {
      $data['activity'] = $this->pendaftaran_model->getActivityById($activityId);
      $this->load->view('homepage/header');
      $this->load->view('homepage/registration_form', $data);
      $this->load->view('homepage/footer');
    }
  }

  public function addRequest() {
    $config = array(
			array(
        'field' => 'name_of_requester', 
        'label' => 'Nama Pemohon', 
        'rules' => 'required|max_length[50]',
      ),
			array(
        'field' => 'phone', 
        'label' => 'No. Telp', 
        'rules' => 'required|numeric|max_length[15]',
      ),
      array(
        'field' => 'activity_name', 
        'label' => 'Nama Kegiatan', 
        'rules' => 'required|max_length[50]',
      ),
      array(
        'field' => 'activity_location', 
        'label' => 'Alamat Kegiatan', 
        'rules' => 'required|max_length[100]',
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

      if ($this->upload->do_upload('activity_letter')) {
        $uploadedData = $this->upload->data();
      } else {
        $data['error'] = $this->upload->display_errors();
        $this->session->set_flashdata('upload_error', $data['error']);
        redirect('program/addRequest');
      }

      $selectedCheckboxes = $this->input->post('activity_type');
      $selectedActivityTypes = implode(',', $selectedCheckboxes);
      if (empty($selectedActivityTypes)) {
        $selectedActivityTypes = null;
      }

      $data = [
        'id_permohonan' => $requestId,
        'nama_pemohon' => $this->input->post('name_of_requester'),
				'telp' => $this->input->post('phone'),
				'nama_kegiatan' => $this->input->post('activity_name'),
				'alamat_kegiatan' => $this->input->post('activity_location'),
        'tgl_permohonan' => date('Y/m/d'),
        'surat_kegiatan' => $uploadedData['file_name'],
        'jenis_kegiatan' => $selectedActivityTypes,
        'status_permohonan' => '0',
        'keterangan' => $this->input->post('note'),
			];

      $this->permohonan_model->addRequest($data);
      $this->session->set_flashdata('success_message', 'Permohonan workshop anda berhasil dikirimkan. Jika terdapat jadwal kami yang mungkin bentrok dengan jadwal permohonan kegiatan anda, maka akan kami hubungi untuk informasi lebih lanjut.');
      redirect('program');
		} else {
      $this->load->view('homepage/header');
      $this->load->view('homepage/workshop_request');
      $this->load->view('homepage/footer');
    }
  }
}
