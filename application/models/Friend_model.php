<?php
class Friend_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function get_all_app_users($id = FALSE){
		if($id === FALSE){
			$this->db->order_by('id', 'DESC');
//			$this->db->order_by('posts.id', 'DESC');
//			$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row_array();
	}

	public function follow_user(){

		$follow_user_data=array(
			'user_id'=>$this->session->userdata('usr_id'),
			'follow_user_id' => $this->input->post('id')
		);

		return $this->db->insert('friends', $follow_user_data);

	}
}
