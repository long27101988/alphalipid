<?php 
class Business_model extends CI_model{
	protected $_table = 'business';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_business(){
		$this->db->select('id, province, contact_name, phone, email, position, state');
		return $this->db->get($this->_table)->result_array();
	}

	public function del_business_by_id($id){
		$this->db->delete($this->_table, array('id' => $id));
	}

	public function get_next_pos(){
		$num_rows = $this->db->count_all($this->_table);
		return $num_rows + 1;
	}

	public function add_business($info){
		$this->db->insert($this->_table, $info);
	}

	public function get_business_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row_array();
	}

	public function edit_business($id, $info){
		$this->db->where('id', $id);
		$this->db->update($this->_table, $info);
	}
	
	public function update_state($data){
		if($data['state'] == 1){
			$this->db->set('state', 0);
			$this->db->where('id', $data['id']);
			$this->db->update($this->_table);
			echo '0';
		}else{
			$this->db->set('state', 1);
			$this->db->where('id', $data['id']);
			$this->db->update($this->_table);
			echo '1';
		}
	}
}
?>