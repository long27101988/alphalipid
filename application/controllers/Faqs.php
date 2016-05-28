<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('site/faqs_model');
		$this->load->model('site/cat_news_model');
	}

	public function index(){
		$this->_data['title'] = 'Hỏi đáp';
		$this->_data['all_faqs'] = $this->faqs_model->get_all_faqs();
		$this->_data['subview'] = 'site/faqs';
		$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
		$this->load->view('site/templates/main', $this->_data);
	}
}
?>