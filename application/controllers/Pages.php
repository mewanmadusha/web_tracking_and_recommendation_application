<?php

class Pages extends CI_Controller
{
//	home is to default php page
	public function view($page = 'home')
	{
		// if its not available
		if (!file_exists(APPPATH . 'views/app_pages/' . $page . '.php')) {
			show_404();
		}
		$data['title'] = ucfirst($page);
		$this->load->view('templates/header');
		/*view directory path*/
		$this->load->view('app_pages/' . $page, $data);
		$this->load->view('templates/footer');
	}

}
