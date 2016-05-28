<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cat_news extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
		$this->load->model('admin/cat_news_model');
	}

	public function index(){
		$this->_data['title'] = 'Group News';
		$this->_data['all_cat_news'] = $this->cat_news_model->get_all_cat_news();
		$this->_data['subview'] = 'admin/cat_news/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function del($id){
		$this->cat_news_model->del_cat_new_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Delete cat new successfully!');
		redirect(base_url().'admin/cat_news');
	}


	public function add(){
		$this->_data['title'] = 'Add A Cat New';
		$this->_data['subview'] = 'admin/cat_news/add';
		$this->_data['next_pos'] = $this->cat_news_model->get_next_pos();

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");
       	$this->form_validation->set_rules("rdoState", "state", "required");

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'title' => $this->input->post('txtTitle'),
				'slug' 	=> $this->function->convertHTML($this->input->post('txtTitle')),
				'position' => $this->input->post('txtPosition'),
				'state' => $this->input->post('rdoState')
				
			);
			$this->cat_news_model->add_cat_new($info);
			$this->session->set_flashdata('flash_mess', 'Add cat new successfully!');
			redirect(base_url().'admin/cat_news');
		}
		
	}

	public function edit($id){
		$this->_data['title'] = 'Update Cat New Info';
		$this->_data['subview'] = 'admin/cat_news/edit';
		$this->_data['info'] = $this->cat_news_model->get_cat_new_by_id($id);

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");

		if($this->form_validation->run() ===  FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'title' => $this->input->post('txtTitle'),
				'slug' 	=> $this->function->convertHTML($this->input->post('txtTitle')),
				'position' => $this->input->post('txtPosition')
				
			);
			$this->cat_news_model->edit_cat_new($id, $info);
			$this->session->set_flashdata('flash_mess', 'Update cat new successfully!');
			redirect(base_url().'admin/cat_news');
		}
	}

	public function update_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->cat_news_model->update_state($this->_data);
	}
}
?>