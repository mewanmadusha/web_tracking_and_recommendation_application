<?php

class Friends extends CI_Controller
{

	public function index()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');
		}
		$data['user_data']=$this->user_model->get_users($this->session->userdata['usr_id']);


		$returnedResult = $this->friend_model->get_all_app_users($this->session->userdata['usr_id']);
//		print_r($returnedResult['result']);
		if ($returnedResult['result']) {
			$data = array(
				'title'=> 'MusicTribute Friends',
				'userList' => $returnedResult['userFound'],
				'profileData'=>$data['user_data']
			);
//			print_r($data);
			$this->load->view('templates/header');
			$this->load->view('friends/index', $data);
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'title'=> 'MusicTribute Friends',
				'userList' => NULL
			);
//			print_r($values['userList']);
			$this->load->view('templates/header');
			$this->load->view('friends/index', $data);
			$this->load->view('templates/footer');
		}


	}

	/*
	 * follow friend ,current user
	 * @parm get through the model id of current user
	 * and following user id
	 * */
	public function follow()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');}

			$this->friend_model->follow_user();

		$this->session->set_flashdata('following', 'You followed new user');
			redirect('friends');
		}

	public function unfollow_profile()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');}

		$this->friend_model->unfollow_user();

		$this->session->set_flashdata('following', 'You followed new user');

		$id=$this->input->post('id');
		redirect('timeline/view_profile/'.$id);
	}

	public function follow_profile()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');}

		$this->friend_model->follow_user();

		$this->session->set_flashdata('following', 'You followed new user');
		$id=$this->input->post('id');
		redirect('timeline/view_profile/'.$id);
	}
	/*
		 * unfollow friend ,current user
		 * @parm get through the model id of current user
		 * and following user id
		 * */
	public function unfollow()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');}

		$this->friend_model->unfollow_user();

		$this->session->set_flashdata('unfollow', 'You un followed' );
		redirect('friends');
	}

	public  function search(){
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');}

//		$data=$this->input->post('search');
//		print_r($data);
		$returnedResult=$this->friend_model->search();
//
//
//		print_r($returnedResult);

		if ($returnedResult['result']) {
			$data = array(
				'title'=> 'Search Result',
				'userList' => $returnedResult['search_users']
			);
//			print_r($data);
			$this->session->set_flashdata('have_users', 'Search Result of matching users by Genre "'.$this->input->post('search').'"' );
			$this->session->set_flashdata('no_users', 'Can not find users by genre "'.$this->input->post('search').'"');
			$this->load->view('templates/header');
			$this->load->view('friends/search', $data);
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'title'=> 'Search Result',
				'userList' => NULL
			);
			$this->session->set_flashdata('no_users', 'Can not find users by genre "'.$this->input->post('search').'"');
//			print_r($values['userList']);
			$this->load->view('templates/header');
			$this->load->view('friends/search', $data);
			$this->load->view('templates/footer');
		}


	}

	/*
	 * get following friends of current user
	 * */
	public function followings(){
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');}
		$data['user_data']=$this->user_model->get_users($this->session->userdata['usr_id']);

		$returnedResult = $this->friend_model->get_all_app_users($this->session->userdata['usr_id']);
//		print_r($returnedResult['result']);
		if ($returnedResult['result']) {
			$data = array(
				'title'=> 'MusicTribute following Friends',
				'userList' => $returnedResult['userFound'],
				'profileData'=>$data['user_data']
			);
//			print_r($data);
			$this->load->view('templates/header');
			$this->load->view('friends/followings', $data);
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'title'=> 'MusicTribute Friends',
				'userList' => NULL
			);
//			print_r($values['userList']);
			$this->load->view('templates/header');
			$this->load->view('friends/followings', $data);
			$this->load->view('templates/footer');
		}

	}

	/*
	 * get followers of current user
	 * */
	public  function followers(){
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');}

		$data['user_data']=$this->user_model->get_users($this->session->userdata['usr_id']);
		$returnedResult = $this->friend_model->follower_users();
//		print_r($returnedResult['result']);
		if ($returnedResult['result']) {
			$data = array(
				'title'=> 'MusicTribute Your Followers',
				'followerList' => $returnedResult['followersFound'],
				'profileData'=>$data['user_data']
			);
//			print_r($data);
			$this->load->view('templates/header');
			$this->load->view('friends/followers', $data);
			$this->load->view('templates/footer');
		}else{
			$data = array(
				'title'=> 'MusicTribute Your Followers',
				'userList' => NULL
			);
//			print_r($values['userList']);
			$this->load->view('templates/header');
			$this->load->view('friends/followers', $data);
			$this->load->view('templates/footer');
		}

	}

}
