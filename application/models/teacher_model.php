<?php

class Teacher_model extends CI_Model
{
  public function register()
	{

		// $salt = $this->salt();
    //
		// $password = $this->makePassword($this->input->post('spassword'), $salt);

		$insert_data = array(
      'email' => $this->input->post('temail'),
			'fname' => $this->input->post('tfname'),
			'password' => $this->input->post('tpassword')
			// 'salt' => $salt
		);

		$this->db->insert('teacher_user', $insert_data);
	}

  public function login()
  {
    $email = $this->input->post('temail');
    $password = $this->input->post('tpassword');

    $userData = $this->fetchDataByEmail($email);

    if($userData) {
      // $password = $this->makePassword($password, $userData['salt']);

      $sql = "SELECT * FROM teacher_user WHERE email = ? AND password = ?";
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
			$sql = "SELECT * FROM teacher_user WHERE email = ?";
			$query = $this->db->query($sql, array($email));
			$result = $query->row_array();

			return ($query->num_rows() == 1) ? $result : false;
			return $result;
		}
	}

  public function fetchUserData($userId = null)
	{
		if($userId) {
			$sql = "SELECT * FROM teacher_user WHERE id = ?";
			$query = $this->db->query($sql, array($userId));
			$result = $query->row_array();

			return $result;
		}
	}

  function get_student() {

    $studID = $this->input->post('studID');

    $this->db->select("*");
    $this->db->from("student_user");
    $this->db->where_not_in('id', $studID);
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
      'gender' => $this->input->post('gender'),
      'occupation' => $this->input->post('occ'),
      'school' => $this->input->post('school'),
      'email' => $this->input->post('email'),

    );
    $this->db->where('id', $userID);
    $query = $this->db->update('teacher_user', $data1);
  }

  function remove_student() {
    $id = $this->input->post('studID');
    $this->db->where('student_id', $id);
    $this->db->delete('teacher_students');
  }

}


?>
