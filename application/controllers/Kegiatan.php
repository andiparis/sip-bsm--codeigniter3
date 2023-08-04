<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property input $input
 *  @property session $session
 *  @property form_validation $form_validation
 *  @property kegiatan_model $kegiatan_model
 */

class Kegiatan extends CI_Controller {

  function __construct() {
		parent::__construct();
    $this->load->model('kegiatan_model');
	
		if ($this->session->userdata('status') != "login") {
			redirect(base_url("auth"));
		}
	}
  
	public function index() {
		$data['data'] = $this->kegiatan_model->getAll(); // This code is probably unused
    $data['activityDetailData'] = $this->kegiatan_model->getDetailKegiatan();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/kegiatan/show_kegiatan', $data);
		$this->load->view('templates/footer');
	}

	public function add_data() {
		$config = array(
			array(
        'field' => 'nama_kegiatan', 
        'label' => 'Nama Kegiatan', 
        'rules' => 'required|max_length[100]',
      ),
      array(
        'field' => 'kategori_kegiatan', 
        'label' => 'Kategori Kegiatan', 
        'rules' => 'required',
      ),
      array(
        'field' => 'tgl_mulai', 
        'label' => 'Tanggal Mulai', 
        'rules' => 'required|callback_check_date_range',
      ),
      array(
        'field' => 'tgl_berakhir', 
        'label' => 'Tanggal Berakhir', 
        'rules' => 'required',
      ),
      array(
        'field' => 'kuota_peserta', 
        'label' => 'Kuota Peserta', 
        'rules' => 'numeric',
      ),
      array(
        'field' => 'id_instruktur_1', 
        'label' => 'Instruktur 1', 
        'rules' => 'required|callback_check_instruktur',
      ),
			array(
        'field' => 'keterangan', 
        'label' => 'Keterangan', 
        'rules' => 'max_length[100]',
      ),
		);
		$this->form_validation->set_rules($config);	

    $idPermohonan = $this->input->post('id_permohonan');
    $quota = $this->input->post('kuota_peserta');
    $idInstruktur2 = $this->input->post('id_instruktur_2');
    $idKelas = $this->input->post('id_kelas');

    if ($idPermohonan == '') {
      $idPermohonan = null;
    }

    if ($quota == '') {
      $quota = null;
    }
    
    if ($idInstruktur2 == '') {
      $idInstruktur2 = null;
    }

    if ($idKelas == '') {
      $idKelas = null;
    }
	
	 	if ($this->form_validation->run()) {
			$data = [
        'id_kegiatan' => $this->kegiatan_model->makeActivityId(),
				'id_permohonan' => $idPermohonan,
				'nama_kegiatan' => $this->input->POST('nama_kegiatan'),
        'kategori' => $this->input->POST('kategori_kegiatan'),
        'tgl_mulai' => $this->input->POST('tgl_mulai'),
        'tgl_berakhir' => $this->input->POST('tgl_berakhir'),
        'kuota' => $quota,
        'id_instruktur_1' => $this->input->POST('id_instruktur_1'),
        'id_instruktur_2' => $idInstruktur2,
        'id_kelas' => $idKelas,
				'keterangan' => $this->input->POST('keterangan'),
			];
			$this->kegiatan_model->add($data);
      $this->session->set_flashdata('success_message', 'Data jadwal kegiatan pembinaan berhasil ditambahkan.');
			redirect('kegiatan');
		} else {
      $data['data_permohonan'] = $this->kegiatan_model->getWorkshopRequest();
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
        'rules' => 'required|max_length[100]',
      ),
      array(
        'field' => 'kategori_kegiatan', 
        'label' => 'Kategori Kegiatan', 
        'rules' => 'required',
      ),
      array(
        'field' => 'tgl_mulai', 
        'label' => 'Tanggal Mulai', 
        'rules' => 'required|callback_check_date_range',
      ),
      array(
        'field' => 'tgl_berakhir', 
        'label' => 'Tanggal Berakhir', 
        'rules' => 'required',
      ),
      array(
        'field' => 'kuota_peserta', 
        'label' => 'Kuota Peserta', 
        'rules' => 'numeric',
      ),
      array(
        'field' => 'id_instruktur_1', 
        'label' => 'Instruktur 1', 
        'rules' => 'required|callback_check_instruktur',
      ),
			array(
        'field' => 'keterangan', 
        'label' => 'Keterangan', 
        'rules' => 'max_length[100]',
      ),
		);
		$this->form_validation->set_rules($config);

    $idPermohonan = $this->input->post('id_permohonan');
    $quota = $this->input->post('kuota_peserta');
    $idInstruktur2 = $this->input->post('id_instruktur_2');
    $idKelas = $this->input->post('id_kelas');

    if ($idPermohonan == '') {
      $idPermohonan = null;
    }

    if ($quota == '') {
      $quota = null;
    }
    
    if ($idInstruktur2 == '') {
      $idInstruktur2 = null;
    }

    if ($idKelas == '') {
      $idKelas = null;
    }

		if($this->form_validation->run()) {
			$data = [
				'nama_kegiatan' => $this->input->POST('nama_kegiatan'),
        'kategori' => $this->input->POST('kategori_kegiatan'),
        'tgl_mulai' => $this->input->POST('tgl_mulai'),
        'tgl_berakhir' => $this->input->POST('tgl_berakhir'),
        'kuota' => $quota,
        'id_instruktur_1' => $this->input->POST('id_instruktur_1'),
        'id_instruktur_2' => $idInstruktur2,
        'id_kelas' => $idKelas,
				'keterangan' => $this->input->POST('keterangan'),
			];
			$this->kegiatan_model->edit($id, $data);
      $this->session->set_flashdata('success_message', 'Data jadwal kegiatan pembinaan berhasil dirubah.');
			redirect('kegiatan');
		} else {
			$data['kegiatan'] = $this->kegiatan_model->getById($id);
      $data['data_permohonan'] = $this->kegiatan_model->getWorkshopRequest();
      $data['data_instruktur'] = $this->kegiatan_model->getInstrukturName();
      $data['data_kelas'] = $this->kegiatan_model->getKelasName();
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('pembinaan/kegiatan/edit_kegiatan', $data);
			$this->load->view('templates/footer');
		}
	}

  public function check_date_range($tgl_mulai) {
    $tgl_berakhir = $this->input->post('tgl_berakhir');

    // Mengubah format tanggal menjadi UNIX timestamp untuk membandingkan nilai lebih mudah
    $tgl_mulai_timestamp = strtotime($tgl_mulai);
    $tgl_berakhir_timestamp = strtotime($tgl_berakhir);

    if ($tgl_mulai_timestamp > $tgl_berakhir_timestamp) {
        $this->form_validation->set_message('check_date_range', 'Tanggal Mulai cannot be greater than Tanggal Berakhir.');
        return false;
    }

    return true;
  }

  public function check_instruktur($id_instruktur_1) {
    $id_instruktur_2 = $this->input->post('id_instruktur_2');

    if ($id_instruktur_1 === $id_instruktur_2) {
        $this->form_validation->set_message('check_instruktur', 'Instruktur 1 and Instruktur 2 cannot be the same.');
        return false;
    }

    return true;
  }

	public function delete_data($id) {
		$this->kegiatan_model->delete($id);
    $this->session->set_flashdata('success_message', 'Data jadwal kegiatan pembinaan berhasil dihapus.');
		redirect('kegiatan');
	}

  public function detail_data($activityId) {
    $data['data'] = $this->kegiatan_model->getDetailKegiatanById($activityId);
    $data['activityData'] = $this->kegiatan_model->getInstructor1($activityId);
    $data['instructor2Data'] = $this->kegiatan_model->getInstructor2($activityId);
    $data['classData'] = $this->kegiatan_model->getClass();
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('pembinaan/kegiatan/detail_kegiatan', $data);
		$this->load->view('templates/footer');
  }

  public function setujui_pendaftaran($activityId, $id) {
    $data = [
      'status' => '1',
    ];
    $this->kegiatan_model->changeStatus($id, $data);
    $this->session->set_flashdata('success_message', 'Pendaftaran peserta telah disetujui.');
    redirect('kegiatan/detail_data/' . $activityId);
	}

  public function tolak_pendaftaran($activityId, $id) {
    $data = [
      'status' => '2',
    ];
    $this->kegiatan_model->changeStatus($id, $data);
    $this->session->set_flashdata('success_message', 'Pendaftaran peserta telah ditolak.');
    redirect('kegiatan/detail_data/' . $activityId);
	}
}
