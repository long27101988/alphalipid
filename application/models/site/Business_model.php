<?php 
class Business_model extends CI_model{
	protected $_table = 'business';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_business(){
		$this->db->select('province, contact_name, phone, email');
		return $this->db->get($this->_table)->result_array();
	}
}
?>