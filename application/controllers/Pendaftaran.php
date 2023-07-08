<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property input $input
 *  @property session $session
 *  @property form_validation $form_validation
 *  @property pendaftaran_model $pendaftaran_model
 */

class Pendaftaran extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('pendaftaran_model');
	}
  
	public function index() {
    $data['data'] = $this->pendaftaran_model->getKegiatan();
    $this->load->view('templates/header_user');
		$this->load->view('pembinaan/pendaftaran/pendaftaran', $data);
    $this->load->view('templates/footer_user');
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
        'id_kegiatan' => $this->input->POST('kegiatan'),
      ];
      $this->pendaftaran_model->addPesertaPembinaan($dataPesertaPembinaan);
			redirect('pendaftaran');
		}
  }
}
