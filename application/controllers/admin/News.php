<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('session_userId')){
			redirect(base_url().'admin/login');
		}
		$this->load->model('admin/news_model');
		$this->load->model('admin/video_news_model');
		$this->load->model('admin/cat_news_model');
		$this->load->library('pagination');
	}

	/********************************** News ********************************/
	public function index($id = null){
		if($id == null){
			$this->_data['id']			= $this->cat_news_model->get_first_cat_news();
		}else{
			$this->_data['id'] 			= (int)$id;
		}

		$size = 4; 
		
		if(!empty($this->uri->segment(5)) && $this->uri->segment(5) != "page"){
			$offset = 0;
		}else{
			if(empty($this->uri->segment(6))){
				$offset = 0;
			}
			$offset = (int)$this->uri->segment(6);
		}
		$this->_data['title'] 		= 'All News';
		$this->_data['group_news'] 	= $this->cat_news_model->get_cat_news();
		$this->_data['all_news_not_limit'] 	= $this->news_model->get_news_by_cat_id($this->_data['id']);
		$this->_data['all_news'] 	= $this->news_model->get_news_by_cat_id_limit($this->_data['id'], $offset, $size);
		$this->_data['subview'] 	= 'admin/group_news/news/list';
		$this->_data['id_cate'] 	= $this->_data['id'];
		
		//config pagination
		$config['base_url'] = "/admin/news/index/".$this->_data['id']."/page/";
		$config['total_rows'] = count($this->_data['all_news_not_limit']);
		$config['per_page'] = $size;

		$config['full_tag_open'] = '<div class="paper"><ul class="pagination">';
		//config first link
		$config['first_link'] = '&lt;&lt;';
		$config['first_tag_open'] = '<li class="first">';
		$config['first_tag_close'] = '</li>';
		$config['first_url'] = '/admin/news/index/'.$this->_data['id'];

		//config prev
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li class="previous">';
		$config['prev_tag_close'] = '</li>';

		//config current link
		$config['cur_tag_open'] = '<li> <a href="#" class="current">';
		$config['cur_tag_close'] = '</a></li>';

		//config digit link
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		//config next link
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';

		//config last link
		$config['last_tag_open'] = '<li class="last">';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '&gt;&gt;';

		$config['full_tag_close'] = '</ul></div>';
		$this->pagination->initialize($config);
		//end config pagination
		$this->_data['pagination_link'] = $this->pagination->create_links();
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function load_news_by_category(){
		if($this->input->post('cat_id')){
			$cat_id = $this->input->post('cat_id');
			$info 	= $this->news_model->get_news_by_cat_id($cat_id);
			$html 	= "";
			$html = $cat_id;
			echo $html;
		}
	}

	public function del($id){
		$this->news_model->del_new_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Bạn đã xóa 1 tin tức !');
		redirect(base_url().'admin/news');
	}

	public function do_upload(){
		if($_FILES){
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
		}else{
			return FALSE;
		}
        
    }

	public function add($id_cate = null){
		
		$this->_data['title'] 		= 'Add A New';
		$this->_data['subview'] 	= 'admin/group_news/news/add';
		$this->_data['next_pos'] 	= $this->news_model->get_next_pos();
		$this->_data['group_news'] 	= $this->cat_news_model->get_cat_news();
		$this->_data['id_cate']		= (!empty($id_cate)) ? (int)$id_cate : (int)$this->cat_news_model->get_first_cat_news();

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
		$this->form_validation->set_rules("txtDesc", "desc", "required|trim");
       	$this->form_validation->set_rules("fileImg", "image", "trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");
       	$this->form_validation->set_rules("rdoState", "state", "required");

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/templates/main', $this->_data);
		} else {
			$info_upload = $this->do_upload();

			if($info_upload === FALSE){
				redirect(base_url().'group_news/news/add');
			}

			$info = array(
				'cat_id' 	=> $this->input->post('selCatNew'),
				'title' 	=> $this->input->post('txtTitle'),
				'slug' 	=> $this->function->convertHTML($this->input->post('txtTitle')),	
				'desc' 		=> $this->input->post('txtDesc'),
				'content' 		=> $this->input->post('txtContent'),
				'url' 		=> $info_upload['file_name'],
				'position' 	=> $this->input->post('txtPosition'),
				'state' 	=> $this->input->post('rdoState')
			);

			$this->news_model->add_new($info);
			$this->session->set_flashdata('flash_mess', 'Đã thêm 1 tin tức mới !');
			redirect(base_url().'admin/news/'.$info['cat_id']);
		}
		
	}

	public function edit($id){
		$this->_data['title'] 	= 'Update A New';
		$this->_data['subview'] = 'admin/group_news/news/edit';
		$this->_data['info'] 	= $this->news_model->get_new_by_id($id);
		$this->_data['group_news'] 	= $this->cat_news_model->get_cat_news();

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
		$this->form_validation->set_rules("txtDesc", "desc", "required|trim");
       	$this->form_validation->set_rules("fileImg", "image", "trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/templates/main', $this->_data);
		} else {
			$info_upload = $this->do_upload();
			if($info_upload == FALSE){	
				$image_name = $this->_data['info']['url'];
			}else{
				$image_name = $info_upload['file_name'];
				unlink("./uploads/".$this->_data['info']['url']);
			}
		

			$info = array(
				'cat_id' 	=> $this->input->post('selCatNew'),
				'title' 	=> $this->input->post('txtTitle'),	
				'desc' 		=> $this->input->post('txtDesc'),
				'slug' 		=> $this->function->convertHTML($this->input->post('txtTitle')),
				'content' 	=> $this->input->post('txtContent'),
				'url' 		=> $image_name,
				'position' 	=> $this->input->post('txtPosition')
			);

			$this->news_model->edit_new($id, $info);
			$this->session->set_flashdata('flash_mess', 'Chỉnh sửa tin tức thành công !');
			redirect(base_url().'admin/news/index/'.$info['cat_id']);
		}
	}

	public function update_new_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->news_model->update_state($this->_data);
	}

	/********************************** Video News ********************************/
	public function video_index($id = null){
		if($id == null){
			$this->_data['id']			= (int)$this->cat_news_model->get_first_cat_news();
		}else{
			$this->_data['id']			= (int)$id;
		}

		$size = 4; 
		
		if(!empty($this->uri->segment(5)) && $this->uri->segment(5) != "page"){
			$offset = 0;
		}else{
			if(empty($this->uri->segment(6))){
				$offset = 0;
			}
			$offset = (int)$this->uri->segment(6);
		}

		$this->_data['title'] 		= 'All News';
		$this->_data['group_news'] 	= $this->cat_news_model->get_cat_news();
		$this->_data['all_news_not_limit'] 	= $this->video_news_model->get_news_by_cat_id($this->_data['id']);
		$this->_data['all_news'] 	= $this->video_news_model->get_news_by_cat_id_limit($this->_data['id'], $offset, $size);
		$this->_data['subview'] 	= 'admin/group_news/videos/list';
		$this->_data['id_cate'] 	= $this->_data['id'];

		//config pagination
		$config['base_url'] = "/admin/news/video_index/".$this->_data['id']."/page/";
		$config['total_rows'] = count($this->_data['all_news_not_limit']);
		$config['per_page'] = $size;
		$config['full_tag_open'] = '<div class="paper"><ul class="pagination">';
		//config first link
		$config['first_link'] = '&lt;&lt;';
		$config['first_tag_open'] = '<li class="first">';
		$config['first_tag_close'] = '</li>';
		$config['first_url'] = '/admin/news/video_index/'.$this->_data['id'];

		//config prev
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li class="previous">';
		$config['prev_tag_close'] = '</li>';

		//config current link
		$config['cur_tag_open'] = '<li> <a href="#" class="current">';
		$config['cur_tag_close'] = '</a></li>';

		//config digit link
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		//config next link
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';

		//config last link
		$config['last_tag_open'] = '<li class="last">';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '&gt;&gt;';


		$config['full_tag_close'] = '</ul></div>';
		$this->pagination->initialize($config);
		//end config pagination
		$this->_data['pagination_link'] = $this->pagination->create_links();
		$this->load->view('admin/templates/main', $this->_data);
	}

	public function load_video_news_by_category(){
		if($this->input->post('cat_id')){
			$cat_id = $this->input->post('cat_id');
			$info 	= $this->video_news_model->get_news_by_cat_id($cat_id);
			$html 	= "";
			$html = $cat_id;
			echo $html;
			
		}
	}

	public function video_del($id){
		$this->video_news_model->del_new_by_id($id);
		$this->session->set_flashdata('flash_mess', 'Bạn đã xóa 1 video !');
		redirect(base_url().'admin/news/video_index');
	}


	public function video_add($id_cate = null){
		$this->_data['title'] = 'Add A Video';
		$this->_data['subview'] = 'admin/group_news/videos/add';
		$this->_data['next_pos'] = $this->video_news_model->get_next_pos();
		$this->_data['group_news'] 	= $this->cat_news_model->get_cat_news();
		$this->_data['id_cate']		= (!empty($id_cate)) ? (int)$id_cate : (int)$this->cat_news_model->get_first_cat_news();;

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
		$this->form_validation->set_rules("txtVideoUrl", "url", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");
       	$this->form_validation->set_rules("rdoState", "state", "required");

		if($this->form_validation->run() === FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'cat_id' 	=> $this->input->post('selCatNew'),
				'title' => $this->input->post('txtTitle'),
				'video_url' => $this->input->post('txtVideoUrl'),
				'position' => $this->input->post('txtPosition'),
				'state' => $this->input->post('rdoState')
				
			);
			$this->video_news_model->add_new($info);
			$this->session->set_flashdata('flash_mess', 'Bạn đã thêm 1 video mới !');
			redirect(base_url().'admin/news/video_index/'.$info['cat_id']);
		}
		
	}

	public function video_edit($id){
		$this->_data['title'] = 'Update A Video';
		$this->_data['subview'] = 'admin/group_news/videos/edit';
		$this->_data['info'] = $this->video_news_model->get_new_by_id($id);
		$this->_data['group_news'] 	= $this->cat_news_model->get_cat_news();

		$this->form_validation->set_rules("txtTitle", "title", "required|trim");
		$this->form_validation->set_rules("txtVideoUrl", "url", "required|trim");
       	$this->form_validation->set_rules("txtPosition", "position", "required|integer|trim");

		if($this->form_validation->run() ===  FALSE){
			$this->load->view('admin/templates/main', $this->_data);
		}else{
			$info = array(
				'cat_id' 	=> $this->input->post('selCatNew'),
				'title' => $this->input->post('txtTitle'),
				'video_url' => $this->input->post('txtVideoUrl'),
				'position' => $this->input->post('txtPosition')
				
			);
			$this->video_news_model->edit_new($id, $info);
			$this->session->set_flashdata('flash_mess', 'Thay đổi video thành công !');
			redirect(base_url().'admin/news/video_index/'.$info['cat_id']);
		}
	}

	public function update_video_new_state(){
		$this->_data = array(
			'id' => $this->input->post('id'),
			'state' => $this->input->post('state')
		);
		$this->video_news_model->update_state($this->_data);
	}
}
?>