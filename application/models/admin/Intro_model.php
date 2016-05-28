<?php 
class Intro_model extends CI_Model{
	protected $_table = 'intro';

	public function __construct(){
		parent::__construct();
	}

	public function get_intro(){
		$this->db->select('id, content');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_intro_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row_array();
	}

	public function edit_intro($id, $info){
		$this->db->where('id', $id);
		$this->db->update($this->_table, $info);
	}
}
?>