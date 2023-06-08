<?php

class Permohonan extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('permohonan_model');
    $this->load->model('auth_model');
	}
  
	public function index() {
    // $data['data'] = $this->permohonan_model->getKegiatan();
		$this->load->view('workshop/permohonan/permohonan');
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

    if ($this->form_validation->run()) {
			// $this->pendaftaran_model->addPeserta($dataPeserta);
      // $dataPresensi = [
      //   'id_peserta' => $this->input->POST('id_peserta'),
      //   'kode_kegiatan' => $this->input->POST('kegiatan'),
      // ];
      // $this->pendaftaran_model->addPresensi($dataPresensi);
			// redirect('pendaftaran');

      $dataPermohonan = $this->input->POST('kode_permohonan');
      $configUpload['upload_path']    = FCPATH.'/upload/surat_permohonan/';
      $configUpload['allowed_types']  = 'pdf|jpg|jpeg|png';
      $configUpload['file_name']      = $dataPermohonan;
      $configUpload['overwrite']      = true;
      $configUpload['max_size']       = 1024;
      $this->load->library('upload', $configUpload);

      if (!$this->upload->do_upload('surat_kegiatan')) {
        $data['error'] = $this->upload->display_errors();
      } else {
        $uploadedData = $this->upload->data();
  
        // $newData = [
        // 'surat_kegiatan' => $uploadedData['file_name'],
        // ];
      }

      $dataPermohonan = [
        'kode_permohonan' => $this->input->POST('kode_permohonan'),
        'nama_pemohon' => $this->input->POST('nama_pemohon'),
				'telp' => $this->input->POST('telp'),
				'nama_kegiatan' => $this->input->POST('nama_kegiatan'),
				'alamat_kegiatan' => $this->input->POST('alamat_kegiatan'),
        'tgl_permohonan' => date('Y/m/d'),
        'surat_kegiatan' => $uploadedData['file_name'],
        'keterangan' => $this->input->POST('keterangan'),
			];

      $this->permohonan_model->add($dataPermohonan);
      redirect('permohonan');
		}
  }
}
