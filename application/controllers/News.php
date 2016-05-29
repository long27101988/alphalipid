<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('site/news_model');
		$this->load->model('site/video_news_model');
		$this->load->model('site/cat_news_model');
		$this->load->library('pagination');
		$this->load->library('session');
	}

	public function get_news_by_cat_id($slug = ""){
		$cate = $this->cat_news_model->get_cat_name_by_id($slug);
		if(count($cate) == 0){
			redirect(base_url());
		}
		$size = 1; 	
		$this->session->unset_userdata('search');
		if(!empty($this->uri->segment(4)) && $this->uri->segment(4) != "page" ){
			$offset = 0;
		}else{

			if(empty($this->uri->segment(5))){
				$offset = 0;
			}
			$offset = (int)$this->uri->segment(5);
		}

		$this->_data['video_news'] 	= $this->video_news_model->get_videos_by_cat_id($cate['id']);
		$this->_data['subview'] 	= 'site/news';
		$this->_data['cat_news'] 	= $this->cat_news_model->get_all_cat_news();
		$this->_data['title'] 		= $cate['title'];
		$this->_data['news_not_limit']		= $this->news_model->get_news_by_cat_id($cate['id']);
		$this->_data['news']		= $this->news_model->get_news_by_cat_id_limit($cate['id'], $offset, $size);
		//config pagination
		$config['base_url'] = "/news/get_news_by_cat_id/".$slug."/page";
		$config['total_rows'] = count($this->_data['news_not_limit']);
		$config['per_page'] = $size;

		$config['full_tag_open'] = '<section class="paper"><div class="clearfix"><ul>';
		//config first link
		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_url'] = "/news/get_news_by_cat_id/".$slug;

		//config prev
		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		//config current link
		$config['cur_tag_open'] = '<li> <a href="#" class="active">';
		$config['cur_tag_close'] = '</a></li>';

		//config digit link
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		//config next link
		$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		//config last link
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';

		$config['full_tag_close'] = '</ul></div></section>';

		$this->pagination->initialize($config);
		//end config pagination
		$this->_data['pagination_link'] = $this->pagination->create_links();
		
		
		if(!empty($this->input->post()) || (!empty($this->session->userdata('search_news')) && $this->session->userdata('search_news') != "")){
			if(empty($this->session->userdata('search_news'))){
				$search_condition 			= $this->input->post('search');
				$data_search['search_news'] =  $this->input->post('search');
				$this->session->set_userdata($data_search);
			}else{
				$search_condition = $this->session->userdata('search_news');
			}
			$this->_data['video_news'] 	= $this->video_news_model->search_video($cate['id'], $search_condition);
			$this->_data['subview'] 	= 'site/news';
			$this->_data['cat_news'] 	= $this->cat_news_model->get_all_cat_news();
			$this->_data['title'] 		= $cate['title'];
			$this->_data['news_not_limit']		= $this->news_model->search_news($cate['id'], $search_condition);
			$this->_data['news']		= $this->news_model->search_news_limit($cate['id'], $search_condition, $offset, $size);
			$config['base_url'] = "/news/get_news_by_cat_id/".$slug."/page";
			$config['total_rows'] = count($this->_data['news_not_limit']);
			$config['per_page'] = $size;
			$this->pagination->initialize($config);
			//end config pagination
			$this->_data['pagination_link'] = $this->pagination->create_links();
		}

		$this->load->view('site/templates/main', $this->_data);
		
	}

	public function get_new_details($slug){
		$this->_data['cat_news'] 	= $this->cat_news_model->get_all_cat_news();
		$this->_data['news'] 	= $this->news_model->get_new_details($slug);
		$this->_data['title'] 	= $slug;
		$this->_data['subview'] 	= 'site/new-details';
		
		$this->load->view('site/templates/main', $this->_data);
	}

}
?>