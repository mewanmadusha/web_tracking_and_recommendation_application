<?php
class Posts_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_posts($id = FALSE){
		if($id === FALSE){
//			$this->db->order_by('id', 'DESC');
////			$this->db->order_by('posts.id', 'DESC');
////			$this->db->join('categories', 'categories.id = posts.category_id');
//			$query = $this->db->get('timeline_posts');
//			return $query->result_array();

			$this->db->order_by('timeline_posts.post_id', 'DESC');
			$this->db->select('*');
			$this->db->from('timeline_posts');
			$this->db->join('users', 'timeline_posts.user_id = users.id');
			$query = $this->db->get();
			return $query->result();
		}
		$query = $this->db->get_where('timeline_posts', array('post_id' => $id));
		return $query->row_array();
	}

	public function add_post($post_image_data){
		$slugKey=url_title($this->input->post('title'));
		$inputData=array(
			'post_title' => $this->input->post('title'),
			'user_id'=>$this->session->userdata('usr_id'),
			'slug' => $slugKey,
			'post_description' => $this->input->post('description'),
			'post_image_path' => $post_image_data
		);

		return $this->db->insert('timeline_posts', $inputData);
	}

	public function delete_post($id){
		$this->db->where('id',$id);
		$this->db->delete('timeline_posts');
		return true;
	}

	public function update_post(){
//		 echo $this->input->post('id');
		$slugKey=url_title($this->input->post('title'));
		$newInputData=array(
			'post_title' => $this->input->post('title'),
			'slug' => $slugKey,
			'post_description' => $this->input->post('description')
		);
		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('timeline_posts', $newInputData);
	}
}
