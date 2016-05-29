<?php 
class Video_news_model extends CI_Model{
	protected $_table = 'video_news';

	public function __construct(){
		parent::__construct();
	}

	public function get_videos_by_cat_id($id){
		$this->db->limit(5);
		$this->db->where('cat_id', $id);
		$this->db->select('id, title, video_url');
		return $this->db->get($this->_table)->result_array();
	}

	public function search_video($id_cate, $txtSearch){
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
		return $this->db->get($this->_table)->result_array();
	}
}
?>