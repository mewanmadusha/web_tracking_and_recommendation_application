<?php

class Friends extends CI_Controller
{

	public function index()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');
		}

		$data['title'] = 'MusicTribute Friends';

		$data['friends'] = $this->friend_model->get_all_app_users();
//		$data['user_data'] = $this->user_model->get_users($this->session->userdata['usr_id']);

		print_r($data['friends']);
//		print_r($data['user_data']);
		$this->load->view('templates/header');
		$this->load->view('friends/index', $data);
		$this->load->view('templates/footer');
	}

	public function follow()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')) {
			redirect('authentication/login_user');}

//			$current_usr=$this->session->userdata('usr_id');
//			print_r($current_usr);
			$this->friend_model->follow_user();

			$this->session->set_flashdata('following', 'You followed new user');
			redirect('friends');
		}



}
