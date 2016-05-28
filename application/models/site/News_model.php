<?php 
class News_model extends CI_Model{
	protected $_table = 'news';

	public function __construct(){
		parent::__construct();
	}

	public function get_news_by_cat_id($id){
		$this->db->where('cat_id', $id);
		return $this->db->get($this->_table)->result_array();
	}

	public function get_new_details($slug){
		$this->db->where('slug', $slug);
		return $this->db->get($this->_table)->row_array();
	}
}
?>