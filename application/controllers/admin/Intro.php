<?php
class Intro extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
		$this->load->model('admin/intro_model');
		$this->load->model('admin/video_intro_model');
	}

	/********************************** INTRO ********************************/
	public function index(){
		$this->_data['title'] = 'Intro';
		$this->_data['intro'] = $this->intro_model->get_intro();
		$this->_data['subview'] = 'admin/intro/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function edit($id){
		$this->_data['title'] = 'Update Intro Info';
		$this->_data['subview'] = 'admin/intro/edit';
		$this->_data['info'] = $this->intro_model->get_intro_by_id($id);

		$this->form_validation->set_rules("txtTitle", "title", "trim");
       	$this->form_validation->set_rules("txtContent", "content", "trim");

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'content' => $this->input->post('txtContent')
			);
			$this->intro_model->edit_intro($id, $info);
			$this->session->set_flashdata('flash_mess', 'Update intro successfully!');
			redirect(base_url().'admin/intro');
		}
	}

	/********************************** VIDEO ********************************/
	public function video_index(){
		$this->_data['title'] = 'All Intro Videos';
		$this->_data['all_intro'] = $this->video_intro_model->get_all_videos();
		$this->_data['subview'] = 'admin/intro/videos/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function video_del($id){
		$this->video_intro_model->del_video_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Delete intro video successfully!');
		redirect(base_url().'admin/intro/video_index');
	}

	public function video_add(){
		$this->_data['title'] = 'Add a intro video';
		$this->_data['subview'] = 'admin/intro/videos/add';
		$this->_data['next_pos'] = $this->video_intro_model->get_next_pos();

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
			$this->video_intro_model->add_video($info);
			$this->session->set_flashdata('flash_mess', 'Add a intro video successfully!');
			redirect(base_url().'admin/intro/video_index');
		}
	}

	public function video_edit($id){
		$this->_data['title'] = 'Update intro video info';
		$this->_data['subview'] = 'admin/intro/videos/edit';
		$this->_data['info'] = $this->video_intro_model->get_video_by_id($id);

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
			$this->video_intro_model->edit_video($id, $info);
			$this->session->set_flashdata('flash_mess', 'Update intro video successfully!');
			redirect(base_url().'admin/intro/video_index');
		}
	}

	public function update_video_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->video_intro_model->update_state($this->_data);
	}

}
?>