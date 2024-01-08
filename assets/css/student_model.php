<?php

class Student_model extends CI_Model
{
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
}


?>
