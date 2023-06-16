<?php

class Permohonan extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('permohonan_model');
	}
  
	public function index() {
    $this->load->view('templates/header_user');
		$this->load->view('workshop/request/workshop_request');
    $this->load->view('templates/footer_user');
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
      $configUpload['max_size']       = 1024;
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
      redirect('permohonan');
		}
  }
}
