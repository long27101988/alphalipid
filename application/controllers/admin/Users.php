<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
		$this->load->model('admin/users_model');
	}

	public function index(){
		$this->_data['title'] = 'All Users';
		$this->_data['all_users'] = $this->users_model->get_all_users();
		$this->_data['subview'] = 'admin/users/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function del($id){
		$this->users_model->del_user_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Delete user successfully!');
		redirect(base_url().'admin/users');
	}

	public function check_user($user, $id){
		$id = $this->uri->segment(3);
		if($this->users_model->checkUsername($user, $id) === TRUE){
			$this->form_validation->set_message('check_user', "Your username has been registed, please try again!");
			return FALSE;
		}else{
			return TRUE;
		}

	}

	public function check_email($email, $id){
		$id = $this->uri->segment(3);
		if($this->users_model->checkEmail($email, $id) === TRUE){
			$this->form_validation->set_message('check_email', "Your email has been registed, please try again!");
			return FALSE;
		}else{
			return TRUE;
		}
	}

	public function add(){
		$this->_data['title'] = 'Add A User';
		$this->_data['subview'] = 'admin/users/add';

		$this->form_validation->set_rules("txtUsername", "username", "required|trim|min_length[4]|callback_check_user");
       	$this->form_validation->set_rules("txtPassword", "password", "required|matches[txtRePassword]|trim");
       	$this->form_validation->set_rules("txtRePassword", "re-password", "required|matches[txtPassword]|trim");
       	$this->form_validation->set_rules("txtEmail", "email", "required|trim|valid_email|callback_check_email");

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'username' => $this->input->post('txtUsername'),
				'email' => $this->input->post('txtEmail'),
				'password' => md5($this->input->post('txtPassword'))
				
			);
			$this->users_model->add_user($info);
			$this->session->set_flashdata('flash_mess', 'Add user successfully!');
			redirect(base_url().'admin/users');
		}
		
	}

	public function edit($id){
		$this->_data['title'] = 'Update User Info';
		$this->_data['subview'] = 'admin/users/edit';
		$this->_data['info'] = $this->users_model->get_user_by_id($id);

		
       	$this->form_validation->set_rules("txtPassword", "password", "required|matches[txtRePassword]|trim");
       	$this->form_validation->set_rules("txtRePassword", "re-password", "required|matches[txtPassword]|trim");
       	$this->form_validation->set_rules("txtEmail", "email", "required|trim|valid_email");

		if($this->form_validation->run() ===  FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'email' => $this->input->post('txtEmail'),
				'password' => md5($this->input->post('txtPassword'))
				
			);
			$this->users_model->edit_user($id, $info);
			$this->session->set_flashdata('flash_mess', 'Update user successfully!');
			redirect(base_url().'admin/users');
		}
	}
}
?>