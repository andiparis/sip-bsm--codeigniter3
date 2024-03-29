<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property input $input
 *  @property session $session
 *  @property form_validation $form_validation
 *  @property instruktur_model $instruktur_model
 */

class Instruktur extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('instruktur_model');
	
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
		$data['data'] = $this->instruktur_model->getAll();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('master/instruktur/show_instruktur', $data);
		$this->load->view('templates/footer');
	}

	public function add_data() {
		$config = array(
			array(
        'field' => 'nama', 
        'label' => 'Nama', 
        'rules' => 'required|max_length[50]',
      ),
      array(
        'field' => 'jenis_kelamin', 
        'label' => 'Jenis Kelamin', 
        'rules' => 'required|max_length[1]',
      ),
			array(
        'field' => 'telp', 
        'label' => 'No. Telp', 
        'rules' => 'required|numeric|max_length[15]',
      ),
      array(
        'field' => 'email', 
        'label' => 'Email', 
        'rules' => 'required|max_length[50]',
      ),
      array(
        'field' => 'alamat', 
        'label' => 'Alamat', 
        'rules' => 'required|max_length[100]',
      ),
			array(
        'field' => 'keahlian', 
        'label' => 'Keahlian', 
        'rules' => 'required|max_length[50]',
      ),
		);
		$this->form_validation->set_rules($config);
	
    $userAccount = $this->input->post('user_account');
    if ($userAccount == '') {
      $userAccount = null;
    }

	 	if ($this->form_validation->run()) {
			$data = [
				'id_instruktur' => $this->instruktur_model->makeInstructorId(),
				'nama' => $this->input->POST('nama'),
				'jk' => $this->input->POST('jenis_kelamin'),
				'telp' => $this->input->POST('telp'),
				'email' => $this->input->POST('email'),
        'alamat' => $this->input->POST('alamat'),
        'keahlian' => $this->input->POST('keahlian'),
        'id_user' => $userAccount,
			];
			$this->instruktur_model->add($data);
      $this->session->set_flashdata('success_message', 'Data instruktur berhasil ditambahkan.');
			redirect('instruktur');
		} else {
      $data['userAccount'] = $this->instruktur_model->getUserAccount();
      $data['validationErrors'] = validation_errors();
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('master/instruktur/add_instruktur', $data);
			$this->load->view('templates/footer');
		}
	}

	public function edit_data($id) {
		$config = array(
			array(
        'field' => 'nama', 
        'label' => 'Nama', 
        'rules' => 'required|max_length[50]',
      ),
      array(
        'field' => 'jenis_kelamin', 
        'label' => 'Jenis Kelamin', 
        'rules' => 'required|max_length[1]',
      ),
			array(
        'field' => 'telp', 
        'label' => 'No. Telp', 
        'rules' => 'required|numeric|max_length[15]',
      ),
      array(
        'field' => 'email', 
        'label' => 'Email', 
        'rules' => 'required|max_length[50]',
      ),
      array(
        'field' => 'alamat', 
        'label' => 'Alamat', 
        'rules' => 'required|max_length[100]',
      ),
			array(
        'field' => 'keahlian', 
        'label' => 'Keahlian', 
        'rules' => 'required|max_length[50]',
      ),
		);
		$this->form_validation->set_rules($config);

    $userAccount = $this->input->post('user_account');
    if ($userAccount == '') {
      $userAccount = null;
    }

		if ($this->form_validation->run()) {
			$data = [
				'nama' => $this->input->POST('nama'),
				'jk' => $this->input->POST('jenis_kelamin'),
				'telp' => $this->input->POST('telp'),
				'email' => $this->input->POST('email'),
        'alamat' => $this->input->POST('alamat'),
        'keahlian' => $this->input->POST('keahlian'),
        'id_user' => $userAccount,
			];
			$this->instruktur_model->edit($id, $data);
      $this->session->set_flashdata('success_message', 'Data instruktur berhasil dirubah.');
			redirect('instruktur');
		} else {
			$data['instruktur'] = $this->instruktur_model->getById($id);
      $data['userAccount'] = $this->instruktur_model->getUserAccount();
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('master/instruktur/edit_instruktur', $data);
			$this->load->view('templates/footer');
		}
	}

	public function delete_data($id) {
		$this->instruktur_model->delete($id);
    $this->session->set_flashdata('success_message', 'Data instruktur berhasil dihapus.');
    redirect('instruktur');
	}
}
