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

	public function get_all_faqs_limit($offset, $size){
		$this->db->select('question, answer');
		return $this->db->get($this->_table, $size, $offset)->result_array();
	}

	public function search_faq($txtSearch){
		$arrCondition = explode(' ', $txtSearch);
		$arr_result = array();
		$arr_result = $this->get_data_by_search(strtolower($txtSearch));
		if(count($arr_result) <= 0){
			foreach ($arrCondition as $key => $valSearch) {
				$array_temp = $this->get_data_by_search(strtolower($valSearch));
				$arr_result = array_merge_recursive($arr_result, $array_temp);
			}	
		}
		return $arr_result;
	}

	public function search_faq_limit($txtSearch, $offset, $size = 10){
		$arrCondition = explode(' ', $txtSearch);
		$arr_result = array();
		$arr_result = $this->get_data_by_search_limit(strtolower($txtSearch), $offset, $size);
		if(count($arr_result) <= 0){
			foreach ($arrCondition as $key => $valSearch) {
				$array_temp = $this->get_data_by_search_limit(strtolower($valSearch), $offset, $size);
				$arr_result = array_merge_recursive($arr_result, $array_temp);
			}	
		}
		return $arr_result;
	}

	public function get_data_by_search($textSearch){
		$this->db->like('question', $textSearch);
		$this->db->or_like('answer', $textSearch);
		return $this->db->get($this->_table)->result_array();
	}

	public function get_data_by_search_limit($textSearch, $offset, $size){
		$this->db->like('question', $textSearch);
		$this->db->or_like('answer', $textSearch);
		return $this->db->get($this->_table, $size, $offset)->result_array();
	}
}
?>