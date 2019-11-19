<?php

class Authentication extends CI_Controller
{
	public function register_user()
	{
		$register_data['title'] = 'Register User';

//		retrive available music genres
		$register_data['genres'] = $this->musicgenres_model->get_genres();

//		debug purpose
//		print_r($register_data);

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_existing_username');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('conpassword', 'Confirm Password', 'matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			/// derectory path
			$this->load->view('authentication/register', $register_data);
			$this->load->view('templates/footer');
		} else {
			/*password encryption*/
			$encrypt_pw = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$this->user_model->register_user($encrypt_pw);
			/*session handling*/
			$this->session->set_flashdata('user_successfully_registered', 'You can log now');
			redirect('uthentication/login_user');

		}
	}

	/*custom validation*/
	function check_existing_username($username)
	{
		$this->form_validation->set_message('check_existing_username', 'Username has been already registered');
		if ($this->user_model->check_existing_username($username)) {
			return true;
		} else {
			return false;
		}
	}

	/*login function*/
	public function login_user()
	{
		$register_data['title'] = 'Login';


		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			/// derectory path
			$this->load->view('authentication/login', $register_data);
			$this->load->view('templates/footer');
		} else {

			//get login data
			$login_username = $this->input->post('username');
			$login_password = $this->input->post('password');

			$login_user_id = $this->user_model->login_user($login_username, $login_password);

			if ($login_user_id) {
				//session start
//				die($login_user);
				$login_user_data = array(
					'usr_id' => $login_user_id,
					'username' => $login_username,
					'login_status' => true
				);

				$this->session->set_userdata($login_user_data);
				$this->session->set_flashdata('user_successfully_loggedin', 'User successfully logged in');
				redirect('timeline');
			} else {
				/*session handling*/
				$this->session->set_flashdata('user_login_fail', 'User login failed');
				redirect('authentication/login_user');
			}


		}
	}

	/*log out current logged in user*/
	public function logout()
	{
		$this->session->unset_userdata('login_status');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('usr_id');

		$this->session->set_flashdata('user_logout', 'User log out');
		redirect('authentication/login_user');
	}
}
