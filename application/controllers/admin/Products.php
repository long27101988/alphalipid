<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
		$this->load->model('admin/products_model');
	}

	public function index(){
		$this->_data['title'] = 'All Products';
		$this->_data['all_products'] = $this->products_model->get_all_products();
		$this->_data['subview'] = 'admin/products/list';
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function del($id){
		$this->products_model->del_product_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Delete product successfully!');
		redirect(base_url().'admin/products');
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

		$this->_data['title'] 		= 'Add A Product';
		$this->_data['subview'] 	= 'admin/products/add';
		$this->_data['next_pos'] 	= $this->products_model->get_next_pos();

		$this->form_validation->set_rules("txtName", "product name", "required|trim");
       	$this->form_validation->set_rules("fileImg", "image", "trim");
       	$this->form_validation->set_rules("txtDesc", "desc", "required|trim");
       	$this->form_validation->set_rules("txtPrice", "price", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");
       	$this->form_validation->set_rules("rdoState", "state", "required");

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/templates/main', $this->_data);
		} else {
			$info_upload = $this->do_upload();

			if($info_upload === FALSE){
				redirect(base_url().'products/add');
			}

			$info = array(
				'name' 			=> $this->input->post('txtName'),
				'url' 			=> $info_upload['file_name'],
				'desc' 			=> $this->input->post('txtDesc'),
				'components' 	=> $this->input->post('txtComponents'),
				'manual' 		=> $this->input->post('txtManual'),
				'price' 		=> $this->input->post('txtPrice'),
				'position' 		=> $this->input->post('txtPosition'),
				'state' 		=> $this->input->post('rdoState')
			);


			$this->products_model->add_product($info);
			$this->session->set_flashdata('flash_mess', 'Add products successfully!');
			redirect(base_url().'admin/products');
		}
		
	}

	public function edit($id){
		$this->_data['title'] 	= 'Update A Product';
		$this->_data['subview'] = 'admin/products/edit';
		$this->_data['info'] 	= $this->products_model->get_product_by_id($id);

		$this->form_validation->set_rules("txtName", "product name", "required|trim");
       	$this->form_validation->set_rules("fileImg", "image", "trim");
       	$this->form_validation->set_rules("txtDesc", "desc", "required|trim");
       	$this->form_validation->set_rules("txtPrice", "price", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/templates/main', $this->_data);
		} else {
			$info_upload = $this->do_upload();

			if($info_upload === FALSE){
				$image_name = $this->_data['info']['url'];
			}else{
				$image_name = $info_upload['file_name'];
				unlink("./uploads/".$this->_data['info']['url']);
			}

			$info = array(
				'name' => $this->input->post('txtName'),
				'url' => $image_name,
				'desc' => $this->input->post('txtDesc'),
				'components' => $this->input->post('txtComponents'),
				'manual' => $this->input->post('txtManual'),
				'price' => $this->input->post('txtPrice'),
				'position' => $this->input->post('txtPosition')
			);


			$this->products_model->edit_product($id, $info);
			$this->session->set_flashdata('flash_mess', 'Add products successfully!');
			redirect(base_url().'admin/products');
		}
	}

	public function update_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->products_model->update_state($this->_data);
	}
}
?>