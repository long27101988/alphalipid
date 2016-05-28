<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('session_userId')){
			redirect(base_url().'admin/dashboard');
		}
		$this->load->model('admin/users_model');
	}

	public function index(){
		$this->_data['title'] = 'Login';
		if($this->input->post()){
			$data = $this->input->post();

			$array = array(
					'username' => $data['username'],
					'password' => md5($data['password'])
				);
			$user = $this->users_model->checkLogin($array);
			if($user != NULL){
				$sessionUser = array(
						'session_userId' => $user['id'],
						'session_username' => $user['username']
					);
				$this->session->set_userdata($sessionUser);
				redirect(base_url().'admin/dashboard');
			}else{
				$this->session->set_flashdata('flash_mess', 'Delete user successfully!');
			}
		}
		$this->load->view('admin/login', $this->_data);
	}

	public function logOut(){
		$this->session->sess_destroy();
		redirect(base_url().'admin/login');
	}
}
?>