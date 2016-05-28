<?php 
class Video_intro_model extends CI_Model{
	protected $_table = 'video_intro';

	public function __construct(){
		parent::__construct();
	}

	public function get_all_videos(){
		$this->db->select('id, title, video_url, position, state');
		return $this->db->get($this->_table)->result_array();
	}

	public function del_video_by_id($id){
		// Delete from database
		$this->db->delete($this->_table, array('id' => $id));
	}

	public function get_next_pos(){
		$num_rows = $this->db->count_all($this->_table);
		return $num_rows + 1;
	}

	public function add_video($info){
		$this->db->insert($this->_table, $info);
	}

	public function get_video_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row_array();
	}

	public function edit_video($id, $info){
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