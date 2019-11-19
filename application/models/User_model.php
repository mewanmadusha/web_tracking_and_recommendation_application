<?php
class User_model extends CI_Model
{
	public function register_user($encrypt_pw)
	{
		$register_usr_data=array(
			'name'=> $this->input->post('name'),
			'username'=> $this->input->post('username'),
			'password'=> $encrypt_pw,
			'user_profile_img_url'=> $this->input->post('profileimglink'),
			'music_gener_id'=>$this->input->post('genre_id')
		);

		/*add new user to database*/
		return $this->db->insert('users',$register_usr_data);
	}

	public function login_user($username,$password)
	{
		$this->db->where('username',$username);
//		$this->db->where('password',$password);

//		$login_summary=$this->db->get('users');
		$query = $this->db->get('users');
		$result = $query->row_array();

		if (!empty($result) && password_verify($password, $result['password'])){
			return  $result['id'];
		}else{
			return false;
		}

	}


	/*validation existing user*/
	public function  check_existing_username($username){
		$check_query =$this->db->get_where('users',array(
			'username'=> $username));

		$is = $check_query->num_rows();

		if($is<1){
			return true;
		}else{
			return false;
		}
	}

	public function get_users($id = FALSE){
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

}
