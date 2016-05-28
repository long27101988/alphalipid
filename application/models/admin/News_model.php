<?php 
class News_model extends CI_Model{
	protected $_table = 'news';

	public function __construct(){
		parent::__construct();
	}

	public function get_news_by_cat_id($id){
		$this->db->where('cat_id', $id);
		$this->db->select('id, cat_id, title, desc, content, url, position, state');
		return $this->db->get($this->_table)->result_array();
	}

	public function get_news_by_cat_id_limit($id, $offset, $size = 10){
		$this->db->where('cat_id', $id);
		$this->db->select('id, cat_id, title, desc, content, url, position, state');
		return $this->db->get($this->_table, $size, $offset)->result_array();

	}

	public function del_new_by_id($id){
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

	public function add_new($info){
		$this->db->insert($this->_table, $info);
	}

	public function get_new_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get($this->_table);
		return $query->row_array();
	}

	public function edit_new($id, $info){
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