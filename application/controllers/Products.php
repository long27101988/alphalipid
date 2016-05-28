<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('site/products_model');
		$this->load->model('site/cat_news_model');
	}

	public function index(){
		$this->_data['title'] = 'Sản phẩm';
		$this->_data['all_products'] = $this->products_model->get_all_products();
		$this->_data['subview'] = 'site/products';
		$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
		$this->load->view('site/templates/main', $this->_data);
	}

	public function get_product_by_id($id){
		$this->_data['product'] = $this->products_model->get_product_by_id($id);
		$this->_data['title'] = $this->_data['product']['name'];
		$this->_data['subview'] = 'site/product-details';
		$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
		$this->load->view('site/templates/main', $this->_data);
	}

	public function get_product_details($slug){
		
	}

}
?>