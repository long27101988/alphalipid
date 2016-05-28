<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();	
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
	}

	public function index(){
		$this->_data['title'] = 'Dashboard';
		$this->_data['subview'] = 'admin/index'; 
		$this->load->view('admin/templates/main', $this->_data);
	}
}
?>