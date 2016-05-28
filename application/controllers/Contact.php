<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('site/cat_news_model');
	}

	public function index(){
		$this->_data['title'] = 'Liên hệ';
		$this->_data['subview'] = 'site/contact';
		$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
		$this->load->view('site/templates/main', $this->_data);
	}
}
?>