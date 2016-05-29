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

	public function search_news($id_cate, $txtSearch){
		$arrCondition = explode(' ', $txtSearch);
		$arr_result = array();
		$arr_result = $this->get_data_by_search((int)$id_cate, strtolower($txtSearch));
		if(count($arr_result) <= 0){
			foreach ($arrCondition as $key => $valSearch) {
				$array_temp = $this->get_data_by_search((int)$id_cate, strtolower($valSearch));
				$arr_result = array_merge_recursive($arr_result, $array_temp);
			}	
		}
		return $arr_result;
	}

	public function get_data_by_search($id_cate, $textSearch){
		$this->db->where('cat_id', $id_cate);
		$this->db->like('title', $textSearch);
		$this->db->or_like('`desc`', $textSearch);
		$this->db->or_like('content', $textSearch);
		return $this->db->get($this->_table)->result_array();
	}
}
?>