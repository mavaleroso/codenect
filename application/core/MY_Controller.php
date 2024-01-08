<?php

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
	}

	public function loggedIn()
	{
		if($this->session->userdata('logged_in') === true) {
			header('location: index.php/student_dashboard');
			// header('location: student/home');
		}
	}


	public function notLoggedIn()
	{
		if($this->session->userdata('logged_in') != true) {
			header('location: ../');
		}
	}

	public function loggedInT()
	{
		if($this->session->userdata('logged_in') === true) {
			header('location: index.php/teacher_dashboard');
		}
	}


	public function notLoggedInT()
	{
		if($this->session->userdata('logged_in') != true) {
			header('location: ../');
		}
	}
}
