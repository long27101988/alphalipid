<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Business extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('site/business_model');
		$this->load->model('site/video_business_model');
		$this->load->model('site/cat_news_model');
	}
	public function index(){
		$this->_data['title'] = 'Kinh doanh';
		$this->_data['all_business'] = $this->business_model->get_all_business();
		$this->_data['video_business'] = $this->video_business_model->get_all_videos();
		$this->_data['subview'] = 'site/business';
		$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
		$this->load->view('site/templates/main', $this->_data);
	}
}
?>