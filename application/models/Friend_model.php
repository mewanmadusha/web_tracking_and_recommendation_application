<?php
include('User.php');
include('Musicgenres.php');
class Friend_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_all_app_users($id = FALSE){
		if($id === FALSE) {
			$this->db->order_by('id', 'DESC');
//			$this->db->order_by('posts.id', 'DESC');
//			$this->db->join('categories', 'categories.id = posts.category_id');
			$query = $this->db->get('users');
			return $query->result_array();

		}
		try {

//			$this->db->select('users.*, GROUP_CONCAT(umg.genres_id) as genreList, GROUP_CONCAT(mg.genre_name) as genreName');
//			$this->db->where('f.user_id', $id);
//			$this->db->join('users', 'users.id=f.follow_user_id', 'left outer');
//			$this->db->join('user_music_genres as umg', 'umg.user_id = users.id', 'left outer');
//			$this->db->join('music_genres as mg', 'mg.id = umg.genres_id');
//			$this->db->group_by('users.id');
//			$this->db->order_by('users.name asc');
//			$result = $this->db->get('friends as f');

			$this->db->select('users.*, GROUP_CONCAT(DISTINCT umg.genres_id) as genrelist,GROUP_CONCAT(mg.genre_name) as genrename, GROUP_CONCAT(DISTINCT f.follow_user_id) as FollowingId');
			$this->db->where('users.id !=', $id);
			$this->db->join('user_music_genres as umg', 'umg.user_id = users.id', 'left outer');
			$this->db->join('music_genres as mg', 'mg.id = umg.genres_id', 'left outer');
			$this->db->join('friends as f', 'f.follow_user_id = users.id AND f.user_id=' . $id, 'left outer');
			$this->db->group_by('users.id');
			$this->db->order_by('users.name asc');
			$result = $this->db->get('users');

//			print_r($id);
//			print_r($result);
			$userFound=array();
			if ($result->num_rows() != 0) {
				foreach ($result->result() as $row) {
					$genresFounds = array();
					$genreList = explode(",", $row->genrename);
					foreach ($genreList as $gl) {
						$genresFounds[] = new Musicgenres($gl, "");
					}
					$userFound[] = new User($row->id, $row->name, $row->username, $row->user_profile_img_url, NULL, $genresFounds,$row->FollowingId);
				}


			}

			$returnedArray = array('result' => true, 'userFound' => $userFound);
			return $returnedArray;
		} catch (Exception $e) {
			$returnedArray = array('result' => false,'userFound'=>null);
			return $returnedArray;
		}

	}

	/*
	 * follow friend db handling part
	 * get current user and following user
	 * add row to friends list with maping id's
	 * */
	public function follow_user(){

		$follow_user_data=array(
			'user_id'=>$this->session->userdata('usr_id'),
			'follow_user_id' => $this->input->post('id')
		);

		return $this->db->insert('friends', $follow_user_data);

	}
	/*
		 * un follow friend db handling part
		 * get current user and following user
		 * add row to friends list with maping id's
		 * */
	public function unfollow_user(){


		$user_id=$this->session->userdata('usr_id');
		$follow_id=$this->input->post('id');

		$this->db->where('user_id', $user_id);
		$this->db->where('follow_user_id', $follow_id);
		return $this->db->delete('friends');

	}

	public function search(){
		$newInputData=array(
			'search_genre' => $this->input->post('search'),
			'user_id' => $this->session->userdata('usr_id')
		);


		try {
			$this->db->select('users.*, GROUP_CONCAT(DISTINCT umg.genres_id) as genrelist,GROUP_CONCAT(mg.genre_name) as genrename, GROUP_CONCAT(DISTINCT f.follow_user_id) as FollowingId');
			$this->db->where('users.id !=', $newInputData['user_id']);
			$this->db->where('mg.genre_name =', $newInputData['search_genre']);
			$this->db->join('user_music_genres as umg', 'umg.user_id = users.id', 'left outer');
			$this->db->join('music_genres as mg', 'mg.id = umg.genres_id', 'left outer');
			$this->db->join('friends as f', 'f.follow_user_id = users.id AND f.user_id=' . $newInputData['user_id'], 'left outer');
			$this->db->group_by('users.id');
			$this->db->order_by('users.name asc');
			$result = $this->db->get('users');

			$search_users=array();
			if ($result->num_rows() != 0) {
				foreach ($result->result() as $row) {
					$genresFounds = array();
					$genreList = explode(",", $row->genrename);
					foreach ($genreList as $gl) {
						$genresFounds[] = new Musicgenres($gl, "");
					}
					$search_users[] = new User($row->id, $row->name, $row->username, $row->user_profile_img_url, NULL, $genresFounds,$row->FollowingId);
				}


			}

			$returnedArray = array('result' => true, 'search_users' => $search_users);
			return $returnedArray;


		}catch (Error $e){
			$returnedArray = array('result' => false,'search_users'=>null);
			return $returnedArray;
			print_r($e);
		}

	}


	public  function follower_users(){
		try {

			$this->db->select('users.*');
			$this->db->where('friends.follow_user_id=',$this->session->userdata('usr_id'));
			$this->db->join('users', 'users.id = friends.user_id');
			$this->db->group_by('users.id');
			$this->db->order_by('users.name asc');
			$result = $this->db->get('friends');

//			print_r($id);
//			print_r($result);
			$followers=array();
			if ($result->num_rows() != 0) {
				foreach ($result->result() as $row) {

					$followers[] = new User($row->id, $row->name, $row->username, $row->user_profile_img_url, NULL, null,null);
				}


			}

			$returnedArray = array('result' => true, 'followersFound' => $followers);
			return $returnedArray;
		} catch (Exception $e) {
			$returnedArray = array('result' => false,'followersFound'=>null);
			return $returnedArray;
		}
	}

}
