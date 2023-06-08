<?php

class Pendaftaran extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('pendaftaran_model');
	}
  
	public function index() {
    $data['data'] = $this->pendaftaran_model->getKegiatan();
		$this->load->view('pembinaan/pendaftaran/pendaftaran', $data);
	}

	public function add_data() {
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
	
	 	if($this->form_validation->run()) {
			$dataPeserta = [
        'id_peserta' => $this->input->POST('id_peserta'),
        'nama' => $this->input->POST('nama'),
				'jk' => $this->input->POST('jenis_kelamin'),
				'telp' => $this->input->POST('telp'),
				'alamat' => $this->input->POST('alamat'),
        'email' => $this->input->POST('email'),
        'tgl_daftar' => date('Y/m/d'),
			];
			$this->pendaftaran_model->addPeserta($dataPeserta);
      $dataPresensi = [
        'id_peserta' => $this->input->POST('id_peserta'),
        'kode_kegiatan' => $this->input->POST('kegiatan'),
      ];
      $this->pendaftaran_model->addPresensi($dataPresensi);
			redirect('pendaftaran');
		}
  }
}
