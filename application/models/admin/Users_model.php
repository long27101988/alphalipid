<?php 
class Users_model extends CI_Model{
	protected $_table = 'user';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_users(){
		$this->db->select('id, username, email');
		return $this->db->get($this->_table)->result_array();
	}

	public function del_user_by_id($id){
		$this->db->delete($this->_table, array('id' => $id));
	}

	public function checkUsername($user, $id = ''){
		if($id != ''){
			$this->db->where('id !=', $id);
		}
		$this->db->where('username', $user);
		$query = $this->db->get($this->_table);
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}

	}

	public function checkEmail($email, $id = ''){
		if($id != ''){
			$this->db->where('id !=', $id);
		}
		$this->db->where('email', $email);
		$query = $this->db->get($this->_table);
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function add_user($info){
		$this->db->insert($this->_table, $info);
	}

	public function get_user_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row_array();
	}

	public function edit_user($id, $info){
		$this->db->where('id', $id);
		$this->db->update($this->_table, $info);
	}

	public function checkLogin($data){

		$this->db->where($data);
		$query = $this->db->get($this->_table);
		$result = $query->row_array();
		return $result;
	}
}
?>