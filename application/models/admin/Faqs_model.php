<?php 
class Faqs_model extends CI_model{
	protected $_table = 'faqs';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_faqs(){
		$this->db->select('id, question, answer, position, state');
		return $this->db->get($this->_table)->result_array();
	}

	public function del_faq_by_id($id){
		$this->db->delete($this->_table, array('id' => $id));
	}

	public function get_next_pos(){
		$num_rows = $this->db->count_all($this->_table);
		return $num_rows + 1; 
	}

	public function add_faq($info){
		$this->db->insert($this->_table, $info);
	}

	public function get_faq_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row_array();
	}

	public function edit_faq($id, $info){
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

	public function del_rows_selected($data){
		$this->db->where_in('id', $data);
		$this->db->delete($this->_table);
	}
}
?>