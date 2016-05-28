<?php 
class Faqs_model extends CI_model{
	protected $_table = 'faqs';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_faqs(){
		$this->db->select('question, answer');
		return $this->db->get($this->_table)->result_array();
	}
}
?>