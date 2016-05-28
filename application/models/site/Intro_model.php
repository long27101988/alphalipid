<?php 
class Intro_model extends CI_Model{
	protected $_table = 'intro';

	public function __construct(){
		parent::__construct();
	}

	public function get_intro(){
		$this->db->select('id, content');
		return $this->db->get($this->_table)->row_array();
	}
}
?>