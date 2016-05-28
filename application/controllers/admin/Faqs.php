<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
		$this->load->model('admin/faqs_model');
	}

	public function index(){
		$this->_data['title'] = 'All Faqs';
		$this->_data['all_faqs'] = $this->faqs_model->get_all_faqs();
		$this->_data['subview'] = 'admin/faqs/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function del($id){
		$this->faqs_model->del_faq_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Delete faq successfully!');
		redirect(base_url().'admin/faqs');
	}


	public function add(){
		$this->_data['title'] = 'Add A Faq';
		$this->_data['subview'] = 'admin/faqs/add';
		$this->_data['next_pos'] = $this->faqs_model->get_next_pos();

		$this->form_validation->set_rules("txtQuestion", "question", "required|trim");
       	$this->form_validation->set_rules("txtAnswer", "answer", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");
       	$this->form_validation->set_rules("rdoState", "state", "required");

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'question' => $this->input->post('txtQuestion'),
				'answer' => $this->input->post('txtAnswer'),
				'position' => $this->input->post('txtPosition'),
				'state' => $this->input->post('rdoState')
				
			);
			$this->faqs_model->add_faq($info);
			$this->session->set_flashdata('flash_mess', 'Add faq successfully!');
			redirect(base_url().'admin/faqs');
		}
		
	}

	public function edit($id){
		$this->_data['title'] = 'Update Faq Info';
		$this->_data['subview'] = 'admin/faqs/edit';
		$this->_data['info'] = $this->faqs_model->get_faq_by_id($id);

		$this->form_validation->set_rules("txtQuestion", "question", "required|trim");
       	$this->form_validation->set_rules("txtAnswer", "answer", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");

		if($this->form_validation->run() ===  FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'question' => $this->input->post('txtQuestion'),
				'answer' => $this->input->post('txtAnswer'),
				'position' => $this->input->post('txtPosition')
				
			);
			$this->faqs_model->edit_faq($id, $info);
			$this->session->set_flashdata('flash_mess', 'Update faq successfully!');
			redirect(base_url().'admin/faqs');
		}
	}

	public function update_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->faqs_model->update_state($this->_data);
	}

	public function del_rows_selected(){
		$this->_data = $this->input->post('id');
		$this->faqs_model->del_rows_selected($this->_data);
	}
}
?>