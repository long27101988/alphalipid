<?php
class Slider_model extends CI_Model{
	protected $_table = 'slider';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_sliders(){
		$this->db->select('id, title, url, position, state');
		return $this->db->get($this->_table)->result_array();
	}

	public function del_slider_by_id($id){
		// Delete from server
		$this->db->where('id', $id);
		$info = $this->db->get($this->_table)->row_array();
		unlink("./uploads/".$info['url']);

		// Delete from database
		$this->db->delete($this->_table, array('id' => $id));
	}

	public function get_next_pos(){
		$num_rows = $this->db->count_all($this->_table);
		return $num_rows + 1;
	}

	public function add_slider($info){
		$this->db->insert($this->_table, $info);
	}

	public function get_slider_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row_array();
	}

	public function edit_slider($id, $info){
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