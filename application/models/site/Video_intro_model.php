<?php 
class Video_intro_model extends CI_Model{
	protected $_table = 'video_intro';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_videos(){
		$this->db->limit(5);
		$this->db->select('id, title, video_url');
		return $this->db->get($this->_table)->result_array();
	}
}
?>