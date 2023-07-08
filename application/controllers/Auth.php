<?php
defined('BASEPATH') or exit('No direct script access allowed');

/** 
 *  @property input $input
 *  @property session $session
 *  @property form_validation $form_validation
 *  @property auth_model $auth_model
 */

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('auth_model');
  }

  public function index() {
    if ($this->session->userdata('status') == 'login') {
			redirect('dashboard');
		}
    
    $this->load->view('master/login');
  }

  public function register() {
    $config = array(
			array(
        'field' => 'username', 
        'label' => 'Username', 
        'rules' => 'required|max_length[25]',
      ),
			array(
        'field' => 'password', 
        'label' => 'Password', 
        'rules' => 'required|max_length[50]',
      ),
      array(
        'field' => 'name', 
        'label' => 'Nama Lengkap', 
        'rules' => 'required|max_length[50]',
      ),
		);
		$this->form_validation->set_rules($config);

    if ($this->form_validation->run()) {
      $data = array(
        'id_user' => $this->auth_model->makeUserId(),
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password')),
        'nama' => $this->input->post('name'),
        'level' => '1',
      );

      $this->auth_model->registerUser($data);
      redirect('auth');
    } else {
      $data['errors'] = validation_errors();
      $this->load->view('master/register', $data);
    }
  }
  
  public function process() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
    );
		$check = $this->auth_model->loginCheck('user', $where);

		if ($check) {
      $userId = $check->id_user;
      $instructorId = $this->auth_model->getInstructorByUserId($userId);
			$session_data = array(
        'instructorId' => $instructorId->id_instruktur,
				'name' => $username,
        'fullName' => $check->nama,
        'userLevel' => $check->level,
				'status' => 'login',
			);
			$this->session->set_userdata($session_data);

      if ($session_data['userLevel'] == '0') {
			  redirect('dashboard');
      } else {
        redirect('jadwal_instruktur');
      }
		} else {
      $this->session->set_flashdata('error', 'Sign in failed. Invalid username or password.');
			redirect('auth');
		}
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('auth');
  }
}
