<?php
class Slider_model extends CI_Model{
	protected $_table = 'slider';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_sliders(){
		$this->db->select('title, url');
		return $this->db->get($this->_table)->result_array();
	}
}
?>