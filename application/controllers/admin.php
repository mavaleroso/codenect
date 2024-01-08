<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
  {
    parent::__construct();
	$this->load->library('form_validation');
	$this->load->library('session');
    $this->load->model('admin_model');
  }

	public function login()
  {
    $this->load->view('pages/admin_login');
  }

	public function auth()
  {
		$validator = array('success' => false, 'messages1' => array());

		$validate_data = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($validate_data);
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run() === true) {

			$login = $this->admin_model->login();

			if($login) {

				$this->load->library('session');

				$newdata = array(
	        'user_id'  => $login,
	        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				$validator['success'] = true;
				$validator['messages1'] = 'main';
			}
			else {
				$validator['success'] = false;
				$validator['messages1'] = 'Incorrect username/password combination';
			} // /else
		}
		else {
			$validator['success'] = false;
			foreach ($_POST as $key => $value) {
				$validator['messages1'][$key] = form_error($key);
			}
		}

		echo json_encode($validator);
  }

	public function logout()
	{
		$this->session->sess_destroy();
		header('location: ./login');
	}

  public function dashboard()
  {
    $this->load->view('pages/admin_dashboard');
  }

	function fetch_user(){
		 $game = $this->input->post('GameT');
		 $table = $this->input->post('Table');
     $this->load->model("admin_model");
     $fetch_data = $this->admin_model->make_datatables();
     $data = array();
     foreach($fetch_data as $row)
     {
			 		if ($table === 'student_user' || $table === 'teacher_user') {
						$sub_array = array();
						$sub_array[] = $row->id;
						$sub_array[] = $row->email;
						$sub_array[] = $row->fname;
						$sub_array[] = $row->mname;
						$sub_array[] = $row->lname;
						$sub_array[] = $row->password;
						$data[] = $sub_array;
			 		} elseif ($table === 'quiz') {
						if ($game === 'novice') {
							$sub_array = array();
							$sub_array[] = $row->id;
							$sub_array[] = $row->problem;
							$sub_array[] = $row->choice1;
							$sub_array[] = $row->choice2;
							$sub_array[] = $row->choice3;
							$sub_array[] = $row->answer;
							$sub_array[] = $row->trivia;
							$sub_array[] = '<i class="fas fa-pen-square icon" id="'.$row->id.'" data-toggle="modal" data-target="#openModal" onclick="myModal('.$row->id.')"></i>';
							$sub_array[] = '<i class="fas fa-trash-alt icon" id="'.$row->id.'" onclick="quizDelete('.$row->id.')"></i>';
							$data[] = $sub_array;
						} elseif ($game === 'intermediate') {
							$sub_array = array();
							$sub_array[] = $row->id;
							$sub_array[] = $row->problem;
							$sub_array[] = $row->answer;
							$sub_array[] = $row->subject;
							$sub_array[] = $row->trivia;
							$sub_array[] = $row->example;
							$sub_array[] = $row->output;
							$sub_array[] = $row->requirement;
							$sub_array[] = '<i class="fas fa-pen-square icon" id="'.$row->id.'" data-toggle="modal" data-target="#openModal" onclick="myModal1('.$row->id.')""></i>';
							$sub_array[] = '<i class="fas fa-trash-alt icon" id="'.$row->id.'" onclick="quizDelete('.$row->id.')"></i>';
							$data[] = $sub_array;
						} elseif ($game === 'advance') {
							$sub_array = array();
							$sub_array[] = $row->id;
							$sub_array[] = $row->problem;
							$sub_array[] = $row->answer;
							$sub_array[] = $row->subject;
							$sub_array[] = $row->trivia;
							$sub_array[] = $row->example;
							$sub_array[] = $row->output;
							$sub_array[] = $row->requirement;
							$sub_array[] = '<i class="fas fa-pen-square icon" id="'.$row->id.'" data-toggle="modal" data-target="#openModal" onclick="myModal1('.$row->id.')""></i>';
							$sub_array[] = '<i class="fas fa-trash-alt icon" id="'.$row->id.'" onclick="quizDelete('.$row->id.')"></i>';
							$data[] = $sub_array;
						}
			 		}

     }
     $output = array(
          "draw"                    =>     intval($_POST["draw"]),
          "recordsTotal"          =>      $this->admin_model->get_all_data(),
          "recordsFiltered"     =>     $this->admin_model->get_filtered_data(),
          "data"                    =>     $data
     );
     echo json_encode($output);
	}

	function get_student_data() {
		$query = $this->admin_model->get_student_data();

		echo json_encode($query);
	}
	function update_student_data() {
		$query = $this->admin_model->update_student_data();

		echo json_encode($query);
	}

	function update_intermediate_quiz() {
		$query = $this->admin_model->update_intermediate_quiz();

		echo json_encode($query);
	}
	function delete_quiz_data() {
		$query = $this->admin_model->delete_quiz_data();

		echo json_encode($query);
	}
	function add_novice_quiz(){
		$query = $this->admin_model->add_novice_quiz();

		echo json_encode($query);
	}

	function add_intermediate_quiz(){
		$query = $this->admin_model->add_intermediate_quiz();

		echo json_encode($query);
	}

	function add_advance_quiz(){
		$query = $this->admin_model->add_advance_quiz();

		echo json_encode($query);
	}

}
