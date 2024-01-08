<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

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

     $this->load->library('form_validation');
     $this->load->library('session');
     $this->load->model('teacher_model');
     // if ( !$this->session->userdata('logged_in'))
     // {
     //     redirect('../');
     // }
   }

   public function register()
   {
     $validator = array('success' => false, 'messages2' => array());
     $validate_data = array(
       array(
         'field' => 'tfname',
         'label' => 'Name',
         'rules' => 'required'
       ),
       array(
         'field' => 'tpassword',
         'label' => 'Password',
         'rules' => 'required|matches[tpassword2]'
       ),
       array(
         'field' => 'tpassword2',
         'label' => 'Pass Confirmation',
         'rules' => 'required'
       ),
       array(
         'field' => 'temail',
         'label' => 'Email',
         'rules' => 'required|is_unique[teacher_user.email]'
       ),
     );

     $this->form_validation->set_rules($validate_data);
     $this->form_validation->set_message('is_unique', 'The {field} already exists');
     $this->form_validation->set_message('integer', 'The {field} must be number');
     $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

     if($this->form_validation->run() === true) {

       $this->teacher_model->register();

       $validator['success'] = true;
       $validator['messages2'] = 'Successfully Registered';
     }
     else {
       $validator['success'] = false;
       foreach ($_POST as $key => $value) {
         $validator['messages2'][$key] = form_error($key);
       }
     }

     echo json_encode($validator);
   }

   public function login()
 	{
 		$validator = array('success' => false, 'messages3' => array());

 		$validate_data = array(
 			array(
 				'field' => 'temail',
 				'label' => 'Email',
 				'rules' => 'required'
 			),
 			array(
 				'field' => 'tpassword',
 				'label' => 'Password',
 				'rules' => 'required'
 			)
 		);

 		$this->form_validation->set_rules($validate_data);
 		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

 		if($this->form_validation->run() === true) {

 			$login = $this->teacher_model->login();

 			if($login) {

 				$this->load->library('session');

 				$newdata1 = array(
 	        'user_id'  => $login,
 	        'logged_in' => TRUE
 				);

 				$this->session->set_userdata($newdata1);


 				$validator['success'] = true;
 				$validator['messages3'] = 'index.php/teacher_dashboard';
 			}
 			else {
 				$validator['success'] = false;
 				$validator['messages3'] = 'Incorrect username/password combination';
 			} // /else
 		}
 		else {
 			$validator['success'] = false;
 			foreach ($_POST as $key => $value) {
 				$validator['messages3'][$key] = form_error($key);
 			}
 		}

 		echo json_encode($validator);

 	}

   public function logout()
   {
     $this->session->sess_destroy();
     header('location: ../../');
   }

   public function get_students() {
     $userID = $this->session->userdata('user_id');

     $this->db->where('teacher_id', $userID);
     $query = $this->db->get('teacher_students');

     $res = $query->result();
     $res = $query->result_array();

     echo json_encode($res);
   }

   public function get_students_progress_c() {
     $userID = $this->session->userdata('user_id');
     $studID = $this->input->post('studID');
     $this->db->where('student_id', $studID);
     $this->db->where("CONCAT('',game_difficulty) LIKE '%c_%'");
     $query = $this->db->get('game_progress');

     $res = $query->result();
     $res = $query->result_array();

     echo json_encode($res);
   }

   public function get_students_progress_java() {
     $userID = $this->session->userdata('user_id');
     $studID = $this->input->post('studID');
     $this->db->where('student_id', $studID);
     $this->db->where("CONCAT('',game_difficulty) LIKE '%java_%'");
     $query = $this->db->get('game_progress');

     $res = $query->result();
     $res = $query->result_array();

     echo json_encode($res);
   }

   public function student_data() {
     $studID = $this->input->post('studID');
     $this->db->where('id', $studID);
     $query = $this->db->get('student_user');

     $res = $query->result();
     $res = $query->result_array();

     echo json_encode($res);
   }

   function get_student() {

     $query = $this->teacher_model->get_student();

     echo json_encode($query);
   }

   function add_student() {

     $userID = $this->session->userdata('user_id');
     $difficulty = $this->input->post('id_c');

     $data2 = array(
           'teacher_id' => $userID,
           'student_id' => $difficulty
     );
     $query = $this->db->insert('teacher_students', $data2);
     echo json_encode($query);
   }

   function update_profile() {
     $query = $this->teacher_model->update_profile();
     echo json_encode($query);

   }

   function remove_student() {
     $query = $this->teacher_model->remove_student();

     echo json_encode($query);
   }

  public function home()
  {
    $this->load->view('pages/teacher_dashboard');
  }

  public function profile()
  {
    $this->load->view('pages/teacher_profile');
  }

  public function students()
  {
    $this->load->view('pages/teacher_students');
  }

  public function courses()
  {
    $this->load->view('pages/teacher_courses');
  }
}
