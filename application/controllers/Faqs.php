<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('site/faqs_model');
		$this->load->model('site/cat_news_model');
		$this->load->library('email');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('pagination');
		$this->load->library('session');
	}

	public function index(){
		$size = 2; 	
		$this->session->unset_userdata('search');
		if(!empty($this->uri->segment(3)) && $this->uri->segment(3) != "page" ){
			$offset = 0;
		}else{

			if(empty($this->uri->segment(4))){
				$offset = 0;
			}
			$offset = (int)$this->uri->segment(4);
		}
		$this->_data['title'] = 'Hỏi đáp';
		$this->_data['all_faqs_no_limit'] = $this->faqs_model->get_all_faqs();
		$this->_data['all_faqs'] = $this->faqs_model->get_all_faqs_limit($offset, $size);
		$this->_data['subview'] = 'site/faqs';
		$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
		//config pagination
		$config['base_url'] = "/faqs/index/page";
		$config['total_rows'] = count($this->_data['all_faqs_no_limit']);
		$config['per_page'] = $size;

		$config['full_tag_open'] = '<section class="paper"><div class="clearfix"><ul>';
		//config first link
		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_url'] = '/faqs/index';

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
		

		if(!empty($this->input->post())){
			if(!empty($this->input->post('send_question'))){
				// validation FAQ form
				$this->form_validation->set_rules('txtName', 'Họ tên', 'trim|required');
				$this->form_validation->set_rules('txtPhone', 'Điện thoai', 'trim|required');
				$this->form_validation->set_rules('txtEmail', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('txtAddress', 'Địa chỉ', 'trim|required');
				$this->form_validation->set_rules('txtQuestion', 'Câu hỏi', 'trim|required');
				if ($this->form_validation->run() == TRUE){
					$from = $this->input->post('txtEmail');
					$name = $this->input->post('txtName');
					$to = "mrlong1206@gmail.com";

					$content = "Name: ".$this->input->post('txtName')."\n"; 
					$content .= "Phone: ".$this->input->post('txtPhone')."\n"; 
					$content .= "Email: ".$this->input->post('txtEmail')."\n"; 
					$content .= "Address: ".$this->input->post('txtAddress')."\n"; 
					$content .= "Content: \n"; 
					$content .= $this->input->post('txtQuestion');

					$subject = "Email test send mail FAQ";

					$this->email->from($from, $name);
					$this->email->to($to); 
					$this->email->subject($subject);
					$this->email->message($content);	

					$this->email->send();
				}
			}else if(!empty($this->input->post('search')) || (!empty($this->session->userdata('search')) && $this->session->userdata('search') != "")){
				if(empty($this->session->userdata('search'))){
					$search_condition 			= $this->input->post('search');
					$data_search['search'] =  $this->input->post('search');
					$this->session->set_userdata($data_search);
				}else{
					$search_condition = $this->session->userdata('search');
				}
				$this->_data['title'] = 'Hỏi đáp';
				$this->_data['all_faqs_search_no_limit'] = $this->faqs_model->search_faq($search_condition);
				$this->_data['all_faqs'] = $this->faqs_model->search_faq_limit($search_condition, $offset, $size);
				//var_dump($this->faqs_model->search_faq_limit($search_condition, $offset, $size));die();
				$config['base_url'] = "/faqs/index/page";
				$config['total_rows'] = count($this->_data['all_faqs_search_no_limit']);
				$config['per_page'] = $size;
				$this->_data['subview'] = 'site/faqs';
				$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
				$this->pagination->initialize($config);
				//end config pagination
				$this->_data['pagination_link'] = $this->pagination->create_links();
			}
			//echo $this->email->print_debugger();	
		}
		$this->load->view('site/templates/main', $this->_data);
	}
}
?>