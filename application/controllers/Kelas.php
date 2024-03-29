<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property input $input
 *  @property session $session
 *  @property form_validation $form_validation
 *  @property kelas_model $kelas_model
 */

class Kelas extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('kelas_model');
	
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
		$data['data'] = $this->kelas_model->getAll();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('master/kelas/show_kelas', $data);
		$this->load->view('templates/footer');
	}

	public function add_data() {
		$config = array(
			array(
        'field' => 'nama_kelas', 
        'label' => 'Nama Kelas', 
        'rules' => 'required|max_length[50]',
      ),
			array(
        'field' => 'kapasitas', 
        'label' => 'Kapasitas', 
        'rules' => 'required|numeric|max_length[3]',
      ),
		);
		$this->form_validation->set_rules($config);	
	
	 	if ($this->form_validation->run()) {
			$data = [
        'id_kelas' => $this->kelas_model->makeClassId(),
				'nama_kelas' => $this->input->POST('nama_kelas'),
				'kapasitas' => $this->input->POST('kapasitas'),
			];
			$this->kelas_model->add($data);
      $this->session->set_flashdata('success_message', 'Data kelas berhasil ditambahkan.');
			redirect('kelas');
		} else {
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('master/kelas/add_kelas');
			$this->load->view('templates/footer');
		}
	}

	public function edit_data($id) {
		$config = array(
			array(
        'field' => 'nama_kelas', 
        'label' => 'Nama Kelas', 
        'rules' => 'required|max_length[50]',
      ),
			array(
        'field' => 'kapasitas', 
        'label' => 'Kapasitas', 
        'rules' => 'required|numeric|max_length[3]',
      ),
		);
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run()) {
			$data = [
				'nama_kelas' => $this->input->POST('nama_kelas'),
				'kapasitas' => $this->input->POST('kapasitas'),
			];
			$this->kelas_model->edit($id, $data);
      $this->session->set_flashdata('success_message', 'Data kelas berhasil dirubah.');
			redirect('kelas');
		} else {
			$data['kelas'] = $this->kelas_model->getById($id);
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('master/kelas/edit_kelas', $data);
			$this->load->view('templates/footer');
		}
	}

	public function delete_data($id) {
		$this->kelas_model->delete($id);
    $this->session->set_flashdata('success_message', 'Data kelas berhasil dihapus.');
    redirect('kelas');
	}
}
