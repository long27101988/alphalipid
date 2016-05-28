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
}
?>