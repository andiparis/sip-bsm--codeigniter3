<?php

class Kegiatan extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('kegiatan_model');
	
		if($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}

    // Variabel config dipindah ke sini
	}
  
	public function index() {
		$data['data'] = $this->kegiatan_model->getAll();
    $data['data_instruktur_2'] = $this->kegiatan_model->getInstruktur2();
    $data['data_kelas'] = $this->kegiatan_model->getKelas();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/kegiatan/show_kegiatan', $data);
		$this->load->view('templates/footer');
	}

	public function add_data() {
		$config = array(
      array(
        'field' => 'id_kegiatan', 
        'label' => 'ID Kegiatan', 
        'rules' => 'max_length[10]',
      ),
			array(
        'field' => 'nama_kegiatan', 
        'label' => 'Nama Kegiatan', 
        'rules' => 'max_length[50]',
      ),
			array(
        'field' => 'keterangan', 
        'label' => 'Keterangan', 
        'rules' => 'max_length[100]',
      ),
		);
		$this->form_validation->set_rules($config);	

    $idPermohonan = $this->input->post('id_permohonan');
    $idInstruktur2 = $this->input->post('id_instruktur_2');
    $idKelas = $this->input->post('id_kelas');
    if($idPermohonan == '')
      $idPermohonan = null;
    
    if($idInstruktur2 == '')
      $idInstruktur2 = null;

    if($idKelas == '')
      $idKelas = null;
	
	 	if($this->form_validation->run()) {
			$data = [
        'id_kegiatan' => $this->input->POST('id_kegiatan'),
				'id_permohonan' => $idPermohonan,
				'nama_kegiatan' => $this->input->POST('nama_kegiatan'),
        'kategori' => $this->input->POST('kategori_kegiatan'),
        'tgl_mulai' => $this->input->POST('tgl_mulai'),
        'tgl_berakhir' => $this->input->POST('tgl_berakhir'),
        'id_instruktur_1' => $this->input->POST('id_instruktur_1'),
        'id_instruktur_2' => $idInstruktur2,
        'id_kelas' => $idKelas,
				'keterangan' => $this->input->POST('keterangan'),
			];
			$this->kegiatan_model->add($data);
			redirect('kegiatan');
		} else {
      $data['data_permohonan'] = $this->kegiatan_model->getPermohonan();
      $data['data_instruktur'] = $this->kegiatan_model->getInstrukturName();
      $data['data_kelas'] = $this->kegiatan_model->getKelasName();
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('pembinaan/kegiatan/add_kegiatan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function edit_data($id) {
		$config = array(
			array(
        'field' => 'nama_kegiatan', 
        'label' => 'Nama Kegiatan', 
        'rules' => 'max_length[50]',
      ),
			array(
        'field' => 'keterangan', 
        'label' => 'Keterangan', 
        'rules' => 'max_length[100]',
      ),
		);
		$this->form_validation->set_rules($config);

    $idPermohonan = $this->input->post('id_permohonan');
    $idInstruktur2 = $this->input->post('id_instruktur_2');
    $idKelas = $this->input->post('id_kelas');
    if($idPermohonan == '')
      $idPermohonan = null;
    
    if($idInstruktur2 == '')
      $idInstruktur2 = null;

    if($idKelas == '')
      $idKelas = null;

		if($this->form_validation->run()) {
			$data = [
				'id_permohonan' => $idPermohonan,
				'nama_kegiatan' => $this->input->POST('nama_kegiatan'),
        'kategori' => $this->input->POST('kategori_kegiatan'),
        'tgl_mulai' => $this->input->POST('tgl_mulai'),
        'tgl_berakhir' => $this->input->POST('tgl_berakhir'),
        'id_instruktur_1' => $this->input->POST('id_instruktur_1'),
        'id_instruktur_2' => $idInstruktur2,
        'id_kelas' => $idKelas,
				'keterangan' => $this->input->POST('keterangan'),
			];
			$this->kegiatan_model->edit($id, $data);
			redirect('kegiatan');
		} else {
			$data['kegiatan'] = $this->kegiatan_model->getById($id);
      $data['data_permohonan'] = $this->kegiatan_model->getPermohonan();
      $data['data_instruktur'] = $this->kegiatan_model->getInstrukturName();
      $data['data_kelas'] = $this->kegiatan_model->getKelasName();
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('pembinaan/kegiatan/edit_kegiatan', $data);
			$this->load->view('templates/footer');
		}
	}

	public function delete_data($id) {
		$this->kegiatan_model->delete($id);
		redirect('kegiatan');
	}
}
