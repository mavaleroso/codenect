<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller
{
	public function view($page = 'index')
	{
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		if($page == 'index') {
			$this->loggedIn();
		}	else {

			$this->notLoggedIn();

			$this->load->library('session');

			$this->load->model('student_model');

			$data['userData'] = $this->student_model->fetchUserData($this->session->userdata('user_id'));
		}

		if($page == 'index') {
			$this->loggedInT();
		}	else {

			$this->notLoggedInT();

			$this->load->library('session');

			$this->load->model('teacher_model');

			$data['userData2'] = $this->teacher_model->fetchUserData($this->session->userdata('user_id'));
		}

		$this->load->view('pages/' . $page, $data);
			// $this->load->view('pages/index');

		// $this->load->view('templates/header', $data);

		// $this->load->view('templates/footer', $data);
	}
	public function admin()
  {
    $this->load->view('pages/admin_login');
  }


}
