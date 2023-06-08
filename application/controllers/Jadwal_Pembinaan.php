<?php

class Jadwal_Pembinaan extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('jadwal_pembinaan_model');
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}

    // Variabel config dipindah ke sini
	}
  
	public function index() {
		$data['data'] = $this->jadwal_pembinaan_model->getAll();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/jadwal/show_jadwal', $data);
		$this->load->view('templates/footer');
	}

	// public function add_data() {
	// 	$config = array(
  //     array(
  //       'field' => 'kode_kegiatan', 
  //       'label' => 'Kode Kegiatan', 
  //       'rules' => 'max_length[10]',
  //     ),
	// 		array(
  //       'field' => 'nama_kegiatan', 
  //       'label' => 'Nama Kegiatan', 
  //       'rules' => 'max_length[50]',
  //     ),
  //     array(
  //       'field' => 'kategori_kegiatan', 
  //       'label' => 'Kategori Kegiatan', 
  //       'rules' => 'max_length[25]',
  //     ),
	// 		array(
  //       'field' => 'keterangan', 
  //       'label' => 'Keterangan', 
  //       'rules' => 'max_length[100]',
  //     ),
	// 	);
	// 	$this->form_validation->set_rules($config);	
	
	//  	if($this->form_validation->run()) {
	// 		$data = [
  //       'kode_kegiatan' => $this->input->POST('kode_kegiatan'),
	// 			'nama_kegiatan' => $this->input->POST('nama_kegiatan'),
	// 			'kategori' => $this->input->POST('kategori_kegiatan'),
	// 			'keterangan' => $this->input->POST('keterangan'),
	// 		];
	// 		$this->kegiatan_model->add($data);
	// 		redirect('kegiatan');
	// 	} else {
	// 		$this->load->view('templates/header');
	// 		$this->load->view('templates/menu');
	// 		$this->load->view('pembinaan/kegiatan/add_kegiatan');
	// 		$this->load->view('templates/footer');
	// 	}
	// }

	// public function edit_data($id) {
	// 	$config = array(
	// 		array(
  //       'field' => 'nama_kegiatan', 
  //       'label' => 'Nama Kegiatan', 
  //       'rules' => 'max_length[50]',
  //     ),
  //     array(
  //       'field' => 'kategori_kegiatan', 
  //       'label' => 'Kategori Kegiatan', 
  //       'rules' => 'max_length[25]',
  //     ),
	// 		array(
  //       'field' => 'keterangan', 
  //       'label' => 'Keterangan', 
  //       'rules' => 'max_length[100]',
  //     ),
	// 	);
	// 	$this->form_validation->set_rules($config);

	// 	if($this->form_validation->run()) {
	// 		$data = [
	// 			'nama_kegiatan' => $this->input->POST('nama_kegiatan'),
	// 			'kategori' => $this->input->POST('kategori_kegiatan'),
	// 			'keterangan' => $this->input->POST('keterangan'),
	// 		];
	// 		$this->kegiatan_model->edit($id, $data);
	// 		redirect('kegiatan');
	// 	} else {
	// 		$data['kegiatan'] = $this->kegiatan_model->getById($id);
	// 		$this->load->view('templates/header');
	// 		$this->load->view('templates/menu');
	// 		$this->load->view('pembinaan/kegiatan/edit_kegiatan', $data);
	// 		$this->load->view('templates/footer');
	// 	}
	// }

	// public function delete_data($id) {
	// 	$this->kegiatan_model->delete($id);
	// 	redirect('kegiatan');
	// }
}
