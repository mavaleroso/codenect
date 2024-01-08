<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

  public function __construct()
  {
      parent::__construct();


        // if ( !$this->session->userdata('logged_in'))
        // {
        //     redirect('../');
        // }
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('student_model');
  }

  public function register()
  {
    $validator = array('success' => false, 'messages' => array());
    $validate_data = array(
      array(
        'field' => 'fname',
        'label' => 'Name',
        'rules' => 'required'
      ),
      array(
        'field' => 'spassword',
        'label' => 'Password',
        'rules' => 'required|matches[spassword2]'
      ),
      array(
        'field' => 'spassword2',
        'label' => 'Pass Confirmation',
        'rules' => 'required'
      ),
      array(
        'field' => 'semail',
        'label' => 'Email',
        'rules' => 'required|is_unique[student_user.email]'
      ),
    );

    $this->form_validation->set_rules($validate_data);
    $this->form_validation->set_message('is_unique', 'The {field} already exists');
    $this->form_validation->set_message('integer', 'The {field} must be number');
    $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

    if($this->form_validation->run() === true) {

      $this->student_model->register();

      $validator['success'] = true;
      $validator['messages'] = 'Successfully Registered';
    }
    else {
      $validator['success'] = false;
      foreach ($_POST as $key => $value) {
        $validator['messages'][$key] = form_error($key);
      }
    }

    echo json_encode($validator);
  }

  public function login()
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

			$login = $this->student_model->login();

			if($login) {

				$this->load->library('session');

				$newdata = array(
	        'user_id'  => $login,
	        'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				$validator['success'] = true;
				$validator['messages1'] = 'index.php/student_dashboard';
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
		header('location: ../../');
	}

  function get_teacher() {

    $query = $this->student_model->get_teacher();

    echo json_encode($query);
  }

  function update_profile() {
    $query = $this->student_model->update_profile();
    // redirect($this->uri->uri_string());
    echo json_encode($query);

  }

  function add_teacher() {
    // redirect($this->uri->uri_string());

    $userID = $this->session->userdata('user_id');
    $difficulty = $this->input->post('id_c');
    // $data1 = array(
    //       'teacher_id' => $difficulty
    // );
    //
    // $this->db->where('id', $userID);
    // $query = $this->db->update('student_user', $data1);

    $data2 = array(
          'teacher_id' => $difficulty,
          'student_id' => $userID
    );
  $query = $this->db->insert('teacher_students', $data2);

    echo json_encode($query);
  }

  function teacher_students() {
    $userID = $this->session->userdata('user_id');
    $this->db->where_in('student_id', $userID);
    $query = $this->db->get('teacher_students');

    $res =  $query->result();
    echo json_encode($res);
  }

  function get_student_data() {
    $userID = $this->session->userdata('user_id');
    $game = $this->input->post('c_game');
    $this->db->where_in('student_id', $userID);
    $this->db->where_in('game_difficulty', $game);
    $query = $this->db->get('game_progress');

    $res =  $query->result();
    echo json_encode($res);
  }

  function view_teacher() {
    $teacher = $this->input->post('teachID');
    $this->db->select("*");
    $this->db->from("teacher_user");
    $this->db->where("id", $teacher);
    $query = $this->db->get();

    $res = $query->result();
    echo json_encode($res);

  }

  function remove_teacher() {
    $teacher = $this->input->post('teachID');
    $userID = $this->session->userdata('user_id');
    // $data1 = array(
    //       'teacher_id' => NULL
    // );
    // $this->db->where_in('id', $userID);
    // $this->db->where_in('id', $teacher);
    // $query = $this->db->update('student_user', $data1);



    $this->db->where('student_id', $userID);
    $this->db->where_in('teacher_id', $teacher);
    $query = $this->db->delete('teacher_students');

    echo json_encode($query);

  }

  function check_progress() {
    $userID = $this->session->userdata('user_id');
    $this->db->from('game_progress');
    $this->db->where('student_id', $userID);
    $query = $this->db->get();

    $res = $query->result();

    echo json_encode($res);

  }

  function insert_progress() {
    $this->student_model->insert_progress();

  }


  public function home()
  {
    $this->load->library('session');
    $this->load->view('pages/student_dashboard');
  }

	public function profile()
  {
    $this->load->view('pages/student_profile');
  }

  public function courses()
  {
    $this->load->view('pages/student_courses');
  }

  public function rankings()
  {
    $this->load->view('pages/student_rankings');
  }

  public function novice_c()
  {
    $this->load->view('pages/novice_c');
  }
}
