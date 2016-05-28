<?php
class Intro extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('site/intro_model');
		$this->load->model('site/video_intro_model');
		$this->load->model('site/cat_news_model');
	}

	/********************************** INTRO ********************************/
	public function index(){
		$this->_data['title'] = 'Giới thiệu';
		$this->_data['intro'] = $this->intro_model->get_intro();
		$this->_data['video_intro'] = $this->video_intro_model->get_all_videos();
		$this->_data['subview'] = 'site/intro';
		$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
		$this->load->view('site/templates/main', $this->_data);
	}
}
?>