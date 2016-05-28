<?php 
class Cat_news_model extends CI_model{
	protected $_table = 'cat_news';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_cat_news(){
		$this->db->select('id, title,slug');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_cat_name_by_id($slug){
		$this->db->where('slug', $slug);
		$this->db->select('id,title');
		$this->db->from($this->_table);
		return $this->db->get()->row_array();
	}
}
