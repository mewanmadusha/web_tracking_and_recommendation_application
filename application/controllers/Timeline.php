<?php

class Timeline extends CI_Controller
{
//	home is to default php page
	public function index()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')){
			redirect('authentication/login_user');
		}

		$data['title'] = 'MusicTribute Timeline';

		$data['posts'] = $this->posts_model->get_posts();
		$data['user_data']=$this->user_model->get_users($this->session->userdata['usr_id']);

//		print_r($data['posts']);
//		print_r($data['user_data']);
		$this->load->view('templates/header');
		$this->load->view('timeline/index', $data);
		$this->load->view('templates/footer');
	}

//to view post
	public function view($slug , $id )
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')){
			redirect('authentication/login_user');
		}

		//slug using fr netter identification
		$data['post'] = $this->posts_model->get_posts($id);
//		$post_id = $data['post']['id'];
//		$data['comments'] = $this->comment_model->get_comments($post_id);
//		print_r($data['post']);
		if (empty($data['post'])) {
			show_404();
		}
		$data['title'] = $data['post']['post_title'];
		$this->load->view('templates/header');
		/// derectory path
		$this->load->view('timeline/view_post', $data);
		$this->load->view('templates/footer');
	}

	//to create post
	public function add()
	{

		/*check login status*/
		if (!$this->session->userdata('login_status')){
			redirect('authentication/login_user');
		}

		$data['title'] = "Add new Post";

		//going through the validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			/// derectory path
			$this->load->view('timeline/add_post', $data);
			$this->load->view('templates/footer');
		} else {

			/*image uploading */
			$config['upload_path']='./assets/images/posts';
			$config['allowed_types']='gih|jpg|png';
			$config['max_size']='2048';
			$config['max_width']='500';
			$config['max_height']='500';

			$this->load->library('upload',$config);

			if(!$this->upload->do_upload()){
				$error= array('error'=> $this->upload->display_errors());
				$post_image='noimg.jpg';
			}else{

				$data =array('upload_data'=> $this->upload->data());
				$post_image=$_FILES['userfile']['name'];
			}

			/*send to the model*/
			$this->posts_model->add_post($post_image);
//			$this->load->view('timeline/success');
			redirect('timeline');
		}

	}

	public function delete($id)
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')){
			redirect('authentication/login_user');
		}

//		echo $id;
		$this->posts_model->delete_post($id);
		redirect('timeline');
	}

	public function update($id)
	{

		/*check login status*/
		if (!$this->session->userdata('login_status')){
			redirect('authentication/login_user');
		}

		$data['post'] = $this->posts_model->get_posts($id);
//		$post_id = $data['post']['id'];
//		$data['comments'] = $this->comment_model->get_comments($post_id);
//		print_r($data['post']);
		if (empty($data['post'])) {
			show_404();
		}
		$data['title'] = "Update Current post";
		$this->load->view('templates/header');
		/// derectory path
		$this->load->view('timeline/update_post', $data);
		$this->load->view('templates/footer');

	}
	public function update_submit()
	{
		/*check login status*/
		if (!$this->session->userdata('login_status')){
			redirect('authentication/login_user');
		}

		 $this->posts_model->update_post();
		redirect('timeline');
	}
}

