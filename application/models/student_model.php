<?php

class Student_model extends CI_Model
{
  // public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->library('session');
	// }
  public function register()
	{

		// $salt = $this->salt();
    //
		// $password = $this->makePassword($this->input->post('spassword'), $salt);

		$insert_data = array(
      'email' => $this->input->post('semail'),
			'fname' => $this->input->post('fname'),
			'password' => $this->input->post('spassword')
			// 'salt' => $salt
		);

		$this->db->insert('student_user', $insert_data);
	}


  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $userData = $this->fetchDataByEmail($email);

    if($userData) {
      // $password = $this->makePassword($password, $userData['salt']);

      $sql = "SELECT * FROM student_user WHERE email = ? AND password = ?";
      $query = $this->db->query($sql, array($email, $password));
      $result = $query->row_array();

      return ( $query->num_rows() == 1 ) ? $result['id'] : false;
    } // /if
    else {
      return false;
    } // /else
  }

  public function fetchDataByEmail($email = null)
	{
		if($email) {
			$sql = "SELECT * FROM student_user WHERE email = ?";
			$query = $this->db->query($sql, array($email));
			$result = $query->row_array();

			return ($query->num_rows() == 1) ? $result : false;
			return $result;
		}
	}

  public function fetchUserData($userId = null)
	{
		if($userId) {
			$sql = "SELECT * FROM student_user WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			return $result;
		}
	}

  function get_teacher() {

    $this->db->select("*");
    $this->db->from("teacher_user");
    $query = $this->db->get();

    return $query->result();
  }

  function update_profile() {
    $userID = $this->session->userdata('user_id');

    $data1 = array(
      'fname' => $this->input->post('fname'),
      'mname' => $this->input->post('mname'),
      'lname' => $this->input->post('lname'),
      'age' => $this->input->post('age'),
      'birthdate' => $this->input->post('bday'),
      'gender' => $this->input->post('gender'),
      'educational_stats' => $this->input->post('edu'),
      'school' => $this->input->post('school'),
      'email' => $this->input->post('email'),

    );
    $this->db->where('id', $userID);
    $query = $this->db->update('student_user', $data1);


  }

  function insert_progress() {
    $data = array(
     array(
        'student_id' => $this->session->userdata('user_id') ,
        'gametime' => '0' ,
        'game_difficulty' => 'c_novice' ,
        'game_status' => 'ongoing' ,
        'game_progress' => '0' ,
        'game_mistakes' => '0'

     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'c_intermediate' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'c_advance' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'java_novice' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'java_intermediate' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     ),
     array(
       'student_id' => $this->session->userdata('user_id') ,
       'gametime' => '0' ,
       'game_difficulty' => 'java_advance' ,
       'game_status' => 'ongoing' ,
       'game_progress' => '0' ,
       'game_mistakes' => '0'
     )
  );

  $this->db->insert_batch('game_progress', $data);
  }

}


?>
