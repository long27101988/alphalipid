<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('site/news_model');
		$this->load->model('site/video_news_model');
		$this->load->model('site/cat_news_model');
	}

	public function get_news_by_cat_id($slug = ""){
		$cate = $this->cat_news_model->get_cat_name_by_id($slug);
		if(count($cate) == 0){
			redirect(base_url());
		}
		$this->_data['news']		= $this->news_model->get_news_by_cat_id($cate['id']);
		$this->_data['video_news'] 	= $this->video_news_model->get_videos_by_cat_id($cate['id']);
		$this->_data['subview'] 	= 'site/news';
		$this->_data['cat_news'] 	= $this->cat_news_model->get_all_cat_news();
		$this->_data['title'] 		= $cate['title'];
		
		if(!empty($this->input->post())){
			$search_condition 			= $this->input->post('search');
			$this->_data['news']		= $this->news_model->search_news($cate['id'], $search_condition);
			$this->_data['video_news'] 	= $this->video_news_model->search_video($cate['id'], $search_condition);
			$this->_data['subview'] 	= 'site/news';
			$this->_data['cat_news'] 	= $this->cat_news_model->get_all_cat_news();
			$this->_data['title'] 		= $cate['title'];
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