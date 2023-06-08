<?php

class Kelas extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('kelas_model');
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}

    // Variabel config dipindah ke sini
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
        'field' => 'kode_kelas', 
        'label' => 'Kode Kelas', 
        'rules' => 'max_length[10]',
      ),
			array(
        'field' => 'nama_kelas', 
        'label' => 'Nama Kelas', 
        'rules' => 'max_length[50]',
      ),
      array(
        'field' => 'fungsi_kelas', 
        'label' => 'Fungsi Kelas', 
        'rules' => 'max_length[50]',
      ),
			array(
        'field' => 'kapasitas', 
        'label' => 'Kapasitas', 
        'rules' => 'max_length[3]|numeric',
      ),
		);
		$this->form_validation->set_rules($config);	
	
	 	if($this->form_validation->run()) {
			$data = [
        'kode_kelas' => $this->input->POST('kode_kelas'),
				'nama' => $this->input->POST('nama_kelas'),
				'fungsi' => $this->input->POST('fungsi_kelas'),
				'kapasitas' => $this->input->POST('kapasitas'),
			];
			$this->kelas_model->add($data);
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
        'rules' => 'max_length[50]',
      ),
      array(
        'field' => 'fungsi_kelas', 
        'label' => 'Fungsi Kelas', 
        'rules' => 'max_length[50]',
      ),
			array(
        'field' => 'kapasitas', 
        'label' => 'Kapasitas', 
        'rules' => 'max_length[3]|numeric',
      ),
		);
		$this->form_validation->set_rules($config);

		if($this->form_validation->run()) {
			$data = [
				'nama' => $this->input->POST('nama_kelas'),
				'fungsi' => $this->input->POST('fungsi_kelas'),
				'kapasitas' => $this->input->POST('kapasitas'),
			];
			$this->kelas_model->edit($id, $data);
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
		redirect('kelas');
	}
}
