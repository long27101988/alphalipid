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
	}

	public function index(){
		$this->_data['title'] = 'Hỏi đáp';
		$this->_data['all_faqs'] = $this->faqs_model->get_all_faqs();
		$this->_data['subview'] = 'site/faqs';
		$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
		$this->load->view('site/templates/main', $this->_data);

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
			}else if(!empty($this->input->post('search_faq'))){
				$search_condition 			= $this->input->post('search');
				$this->_data['title'] = 'Hỏi đáp';
				$this->_data['all_faqs'] = $this->news_model->search_faq($search_condition);;
				$this->_data['subview'] = 'site/faqs';
				$this->_data['cat_news'] = $this->cat_news_model->get_all_cat_news();
				$this->load->view('site/templates/main', $this->_data);
			}
			
			//echo $this->email->print_debugger();	
		}
	}
}
?>