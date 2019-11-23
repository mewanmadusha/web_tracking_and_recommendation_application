<?php

include('Post.php');
class Posts_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_posts($id = FALSE){
		if($id === FALSE) {

 		try{
			$user_id = $this->session->userdata('usr_id');

			$result1=array();

			$this->db->select('users.* , timeline_posts.*');
			$this->db->where('friends.user_id=', $user_id);
//			$this->db->or_where('timeline_posts.user_id=', $user_id);
			$this->db->join('friends', 'friends.follow_user_id=users.id', 'left outer');
			$this->db->join('timeline_posts', 'timeline_posts.user_id=friends.follow_user_id');
//			$this->db->group_by('timeline_posts.post_id');
//			$this->db->order_by('timeline_posts.posted_time desc');
			$this->db->get('users');
			$result1 =$query1 = $this->db->last_query();

			$result2=array();
			$this->db->select('users.* , timeline_posts.*');
			$this->db->where('timeline_posts.user_id=', $user_id);
//			$this->db->or_where('timeline_posts.user_id=', $user_id);
			$this->db->join('timeline_posts', 'timeline_posts.user_id=users.id');
//			$this->db->group_by('timeline_posts.post_id');
//			$this->db->order_by('timeline_posts.posted_time desc');
			 $this->db->get('users');
			$result2 = $this->db->last_query();
//			$this->db->order_by('timeline_posts.posted_date', "ASC");

//			print_r($user_id);


			$result =$this->db->query($result1." UNION ".$result2);

//$result=$qresult->result();
//			print_r($result);

			$timeline_post = array();
			$userList = array();
			if ($result->num_rows() != 0) {
				foreach ($result->result() as $row) {

					$timeline_post[] = new Post($row->post_id, $row->user_id, $row->post_title, $row->post_description, $row->slug, $row->posted_time, $row->name);
					$userList[] = new User($row->id, $row->name, $row->username, $row->user_profile_img_url, null, null, null);


				}

//				print_r($postList->getPostedTime());
//				usort($postList, function($a, $b) { return $b['posted_time'] - $a['posted_time']; });


			}


//			print_r($postList);

			/*
			 * sort according to time format
			 * */

			if ($timeline_post==null) {

				log_message('error', 'postlist is empty');
				$returnedArray = array(
					'result' => false,
					'postList' => null,
					'userList' => null
				);
//				print_r('ell');
				return $returnedArray;


			}else{
				usort($timeline_post, function ($one, $two) {
					$one = date('Y-m-d H:i:s', strtotime($one->getPostedTime()));
					$two = date('Y-m-d H:i:s', strtotime($two->getPostedTime()));

					if ($one === $two) {
						return 0;
					}
					return $one > $two ? -1 : 1;
				});
			}
//			return $query->result();
			$returnedArray = array(
				'result' => true,
				'postList' => $timeline_post,
				'userList' => $userList
			);
			return $returnedArray;
			}catch (Exception  $e){
				$returnedArray = array(
					'result' => false,
					'postList' => null,
					'userList' => null
				);
				print_r('ell');
				return $returnedArray;
			}
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
		$this->db->where('post_id',$id);
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
		$this->db->where('post_id',$this->input->post('id'));
		return $this->db->update('timeline_posts', $newInputData);
	}

	public function view_profile_timeline($id){
		if ($id != null) {
			$this->db->select('*');
			$this->db->where('user_id', $id);
			$result = $this->db->get('timeline_posts');

//			print_r($id);
//			print_r($result);


			$this->db->select('*');
			$this->db->where('friends.user_id', $this->session->userdata('usr_id'));
			$this->db->where('friends.follow_user_id',$id);
			$follow_data = $this->db->get('friends');

			$postList = array();
			if ($result->num_rows() != 0) {
				foreach ($result->result() as $row) {

					$postList[] = new Post($row->post_id, $row->user_id, $row->post_title, $row->post_description, $row->slug, $row->posted_time,null);
				}


			}
			$profile_data = $this->user_model->get_users($id);

			$follow_status=null;
			if ($follow_data->num_rows() != 0) {
				$follow_status=true;
			}else{
				$follow_status=false;
			}


//			$profile_data = new User($profile_data_raw['id'],$profile_data_raw['name'], $profile_data_raw['username'],$profile_data_raw['user_profile_img_url'], null, null, null);

//			print_r($profile_data_raw);

			$returnedArray = array(
				'result' => true,
				'postList' => $postList,
				'profileData'=>$profile_data,
				'followStatus'=>$follow_status
		);
			return $returnedArray;
		}
	}

	/*
	 * get user information by post id
	 * */
	public function get_usersby_post($post_id){
		try{
			$this->db->select('*');
			$this->db->where('post_id', $post_id);
			$this->db->join('users', 'timeline_posts.user_id = users.id');
			 $result = $this->db->get('timeline_posts');
			return $result->row_array();
//			print_r($result);
		}catch (Error $e){
			print_r($e);
		}
	}

}
