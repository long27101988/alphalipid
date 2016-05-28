<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
		$this->load->model('admin/business_model');
		$this->load->model('admin/video_business_model');
	}

	/********************************** BUSINESS ********************************/
	public function index(){
		$this->_data['title'] = 'All Business';
		$this->_data['all_business'] = $this->business_model->get_all_business();
		$this->_data['subview'] = 'admin/business/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function del($id){
		$this->business_model->del_business_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Delete business successfully!');
		redirect(base_url().'admin/business');
	}


	public function add(){
		$this->_data['title'] = 'Add A business';
		$this->_data['subview'] = 'admin/business/add';
		$this->_data['next_pos'] = $this->business_model->get_next_pos();

		$this->form_validation->set_rules("txtProvince", "province", "required|trim");
       	$this->form_validation->set_rules("txtContactName", "contact-name", "required|trim");
       	$this->form_validation->set_rules("txtPhone", "phone", "required|trim");
       	$this->form_validation->set_rules("txtEmail", "email", "trim|valid_email");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");
       	$this->form_validation->set_rules("rdoState", "state", "required");

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'province' => $this->input->post('txtProvince'),
				'contact_name' => $this->input->post('txtContactName'),
				'phone' => $this->input->post('txtPhone'),
				'email' => $this->input->post('txtEmail'),
				'position' => $this->input->post('txtPosition'),
				'state' => $this->input->post('rdoState')
				
			);
			$this->business_model->add_business($info);
			$this->session->set_flashdata('flash_mess', 'Add business successfully!');
			redirect(base_url().'admin/business');
		}
		
	}

	public function edit($id){
		$this->_data['title'] = 'Update business Info';
		$this->_data['subview'] = 'admin/business/edit';
		$this->_data['info'] = $this->business_model->get_business_by_id($id);

		$this->form_validation->set_rules("txtProvince", "province", "required|trim");
       	$this->form_validation->set_rules("txtContactName", "contact-name", "required|trim");
       	$this->form_validation->set_rules("txtPhone", "phone", "required|max_length[11]|trim");
       	$this->form_validation->set_rules("txtEmail", "email", "trim|valid_email");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");

		if($this->form_validation->run() ===  FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'province' => $this->input->post('txtProvince'),
				'contact_name' => $this->input->post('txtContactName'),
				'phone' => $this->input->post('txtPhone'),
				'email' => $this->input->post('txtEmail'),
				'position' => $this->input->post('txtPosition')
			);
			$this->business_model->edit_business($id, $info);
			$this->session->set_flashdata('flash_mess', 'Update business successfully!');
			redirect(base_url().'admin/business');
		}
	}

	public function update_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->business_model->update_state($this->_data);
	}

	/********************************** VIDEO ********************************/
	public function video_index(){
		$this->_data['title'] = 'All Business Videos';
		$this->_data['all_business'] = $this->video_business_model->get_all_videos();
		$this->_data['subview'] = 'admin/business/videos/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function video_del($id){
		$this->video_business_model->del_video_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Delete business video successfully!');
		redirect(base_url().'admin/business/video_index');
	}

	public function video_add(){
		$this->_data['title'] = 'Add a business video';
		$this->_data['subview'] = 'admin/business/videos/add';
		$this->_data['next_pos'] = $this->video_business_model->get_next_pos();

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
		$this->form_validation->set_rules("txtVideoUrl", "url", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");
       	$this->form_validation->set_rules("rdoState", "state", "required");

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'title' => $this->input->post('txtTitle'),
				'video_url' => $this->input->post('txtVideoUrl'),
				'position' => $this->input->post('txtPosition'),
				'state' => $this->input->post('rdoState')
			);
			$this->video_business_model->add_video($info);
			$this->session->set_flashdata('flash_mess', 'Add a business video successfully!');
			redirect(base_url().'admin/business/video_index');
		}
	}

	public function video_edit($id){
		$this->_data['title'] = 'Update business video info';
		$this->_data['subview'] = 'admin/business/videos/edit';
		$this->_data['info'] = $this->video_business_model->get_video_by_id($id);

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
		$this->form_validation->set_rules("txtVideoUrl", "url", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");

		if($this->form_validation->run() ===  FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'title' => $this->input->post('txtTitle'),
				'video_url' => $this->input->post('txtVideoUrl'),
				'position' => $this->input->post('txtPosition')
			);
			$this->video_business_model->edit_video($id, $info);
			$this->session->set_flashdata('flash_mess', 'Update business video successfully!');
			redirect(base_url().'admin/business/video_index');
		}
	}

	public function update_video_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->video_business_model->update_state($this->_data);
	}
}
?>