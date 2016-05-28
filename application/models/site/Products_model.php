<?php 
class Products_model extends CI_Model{
	protected $_table = 'products';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_products(){
		$this->db->select('id, name, url');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_product_by_id($id){
		$this->db->where('id', $id);
		return $this->db->get($this->_table)->row_array();
	}
}
?>