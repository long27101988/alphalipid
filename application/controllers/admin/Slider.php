<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
		$this->load->model('admin/slider_model');
	}

	public function index(){
		$this->_data['title'] 		= 'Sliders';
		$this->_data['all_sliders'] = $this->slider_model->get_all_sliders();
		$this->_data['subview'] 	= 'admin/slider/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function del($id){
		$this->slider_model->del_slider_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Delete slider successfully!');
		redirect(base_url().'admin/slider');
	}

	public function do_upload(){
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
        $config['override']				= FALSE;

        $this->load->library('upload', $config);

        if( ! $this->upload->do_upload('fileImg'))
        {
            $this->session->set_flashdata('flash_mess', $this->upload->display_errors());
            return FALSE;
        }else{
            $data = $this->upload->data();
            return $data;
        }
    }

	public function add(){
		$this->_data['title'] 		= 'Add A Slider';
		$this->_data['subview'] 	= 'admin/slider/add';
		$this->_data['next_pos'] 	= $this->slider_model->get_next_pos();

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
       	$this->form_validation->set_rules("fileImg", "image", "trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");
       	$this->form_validation->set_rules("rdoState", "state", "required");

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/templates/main', $this->_data);
		} else {
			$info_upload = $this->do_upload();

			if($info_upload === FALSE){
				redirect(base_url().'admin/slider/add');
			}

			$info = array(
				'title' => $this->input->post('txtTitle'),
				'url' => $info_upload['file_name'],
				'position' => $this->input->post('txtPosition'),
				'state' => $this->input->post('rdoState')
			);

			$this->slider_model->add_slider($info);
			$this->session->set_flashdata('flash_mess', 'Add slider successfully!');
			redirect(base_url().'admin/slider');
		}
	}

	public function edit($id){
		$this->_data['title'] = 'Update Slider';
		$this->_data['subview'] = 'admin/slider/edit';
		$this->_data['info'] = $this->slider_model->get_slider_by_id($id);

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
       	$this->form_validation->set_rules("fileImg", "image", "trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");

		if($this->form_validation->run() ===  FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{

			$info_upload = $this->do_upload();

			if($info_upload === FALSE){
				$image_name = $this->_data['info']['url'];
			}else{
				$image_name = $info_upload['file_name'];
				unlink("./uploads/".$this->_data['info']['url']);
			}

			$info = array(
				'title' => $this->input->post('txtTitle'),
				'url' => $image_name,
				'position' => $this->input->post('txtPosition')
			);

			$this->slider_model->edit_slider($id, $info);
			$this->session->set_flashdata('flash_mess', 'Update slider successfully!');
			redirect(base_url().'admin/slider');
		}
	}

	public function update_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->slider_model->update_state($this->_data);
	}
}
?>