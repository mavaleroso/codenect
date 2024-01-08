<?php
 class Admin_model extends CI_Model
 {
      var $select_column_quiz = array('id', 'problem', 'choice1', 'choice2', 'choice3', 'answer', 'trivia');
      var $order_column_quiz = array('id', null, null, null, null, null, null);

      var $select_column_quiz1 = array('id', 'problem', 'answer', 'trivia', 'subject', 'example', 'output', 'requirement');
      var $order_column_quiz1 = array('id', null, null, null, null, null, null, null);

      var $select_column = array("id", "email", "fname", "mname", "lname", "password");
      var $order_column = array("id", "email", "fname", "mname", "lname", null);
      function make_query()
      {
           $game = $this->input->post('GameT');
           $table = $this->input->post('Table');
           if ($table === 'student_user' || $table === 'teacher_user') {
             $this->db->select($this->select_column);
             $this->db->from($table);

             if(isset($_POST["search"]["value"]))
             {
                 $this->db->like("fname", $_POST["search"]["value"]);
                 $this->db->or_like("mname", $_POST["search"]["value"]);
                 $this->db->or_like("email", $_POST["search"]["value"]);
                 $this->db->or_like("lname", $_POST["search"]["value"]);

             }
             if(isset($_POST["order"]))
             {
                  $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
             }
             else
             {
                  $this->db->order_by('id', 'ASC');
             }
           }elseif ($table === 'quiz') {
             if ($game === 'novice') {
               $this->db->select($this->select_column_quiz);
               $this->db->from($table);
               $this->db->where('difficulty', 'c_novice');

               // if(isset($_POST["search"]["value"]))
               // {
               //   if ($table === 'quiz') {
               //     if ($game === 'novice') {
               //       $this->db->like("quiz_code", $_POST["search"]["value"]);
               //       $this->db->or_like("problem", $_POST["search"]["value"]);
               //       $this->db->or_like("answer", $_POST["search"]["value"]);
               //     }elseif ($game === 'intermediate') {
               //       $this->db->like("quiz_code", $_POST["search"]["value"]);
               //       $this->db->or_like("problem", $_POST["search"]["value"]);
               //       $this->db->or_like("answer", $_POST["search"]["value"]);
               //     }
               //   }
               //
               // }
               if(isset($_POST["order"]))
               {
                    $this->db->order_by($this->order_column_quiz[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
               }
               else
               {
                    $this->db->order_by('id', 'ASC');
               }
             }elseif ($game === 'intermediate') {
               $this->db->select($this->select_column_quiz1);
               $this->db->from($table);
               $this->db->where('difficulty', 'c_intermediate');

               // if(isset($_POST["search"]["value"]))
               // {
               //   if ($table === 'quiz') {
               //     if ($game === 'novice') {
               //       $this->db->like("quiz_code", $_POST["search"]["value"]);
               //       $this->db->or_like("problem", $_POST["search"]["value"]);
               //       $this->db->or_like("answer", $_POST["search"]["value"]);
               //     }elseif ($game === 'intermediate') {
               //       $this->db->like("quiz_code", $_POST["search"]["value"]);
               //       $this->db->or_like("problem", $_POST["search"]["value"]);
               //       $this->db->or_like("answer", $_POST["search"]["value"]);
               //     }
               //   }
               //
               // }
               if(isset($_POST["order"]))
               {
                    $this->db->order_by($this->order_column_quiz1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
               }
               else
               {
                    $this->db->order_by('id', 'ASC');
               }
             }elseif ($game === 'advance') {
               $this->db->select($this->select_column_quiz1);
               $this->db->from($table);
               $this->db->where('difficulty', 'c_advance');

               // if(isset($_POST["search"]["value"]))
               // {
               //   if ($table === 'quiz') {
               //     if ($game === 'novice') {
               //       $this->db->like("quiz_code", $_POST["search"]["value"]);
               //       $this->db->or_like("problem", $_POST["search"]["value"]);
               //       $this->db->or_like("answer", $_POST["search"]["value"]);
               //     }elseif ($game === 'intermediate') {
               //       $this->db->like("quiz_code", $_POST["search"]["value"]);
               //       $this->db->or_like("problem", $_POST["search"]["value"]);
               //       $this->db->or_like("answer", $_POST["search"]["value"]);
               //     }
               //   }
               //
               // }
               if(isset($_POST["order"]))
               {
                    $this->db->order_by($this->order_column_quiz1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
               }
               else
               {
                    $this->db->order_by('id', 'ASC');
               }
             }

           }

      }
      function make_datatables(){
           $this->make_query();

           if($_POST["length"] != -1)
           {
                $this->db->limit($_POST['length'], $_POST['start']);
           }

           $query = $this->db->get();
           return $query->result();
      }
      function get_filtered_data(){
           $this->make_query();
           $query = $this->db->get();
           return $query->num_rows();
      }
      function get_all_data()
      {
           $game = $this->input->post('GameT');
           $table = $this->input->post('Table');
           $this->db->select("*");
           $this->db->from($table);

           return $this->db->count_all_results();
      }

      function get_student_data() {
        $studID = $this->input->post('studentID');

        $this->db->select("*");
        $this->db->from("quiz");
        $this->db->where('id', $studID);
        $query = $this->db->get();

        return $query->result();
      }

      function update_student_data() {
        $quizID = $this->input->post('quizID');


        $data = array(
          'problem' => $this->input->post('quizProblem'),
          'choice1' => $this->input->post('quizChoice1'),
          'choice2' => $this->input->post('quizChoice2'),
          'choice3' => $this->input->post('quizChoice3'),
          'answer' => $this->input->post('quizAnswer'),
          'trivia' => $this->input->post('quizTrivia'),

        );

        $this->db->where('id', $quizID);
        $this->db->update('quiz', $data);

        // return $query->result();
      }

      function update_intermediate_quiz() {
        $quizID = $this->input->post('quizID');

        $data = array(
          'problem' => $this->input->post('quizProblem'),
          'answer' => $this->input->post('answer'),
          'trivia' => $this->input->post('trivia'),
          'subject' => $this->input->post('subject'),
          'example' => $this->input->post('example'),
          'output' => $this->input->post('output'),
          'output' => $this->input->post('require'),

        );

        $this->db->where('id', $quizID);
        $this->db->update('quiz', $data);

        // return $query->result();
      }

      function update_advance_quiz() {
        $quizID = $this->input->post('quizID');

        $data = array(
          'problem' => $this->input->post('quizProblem'),
          'answer' => $this->input->post('answer'),
          'trivia' => $this->input->post('trivia'),
          'subject' => $this->input->post('subject'),
          'example' => $this->input->post('example'),
          'output' => $this->input->post('output'),
          'output' => $this->input->post('require'),

        );

        $this->db->where('id', $quizID);
        $this->db->update('quiz', $data);

        // return $query->result();
      }

      function delete_quiz_data() {
        $id = $this->input->post('quizID');
        $this->db->where('id', $id);
        $this->db->delete('quiz');
      }

      function add_novice_quiz() {
        $data = array(
        'difficulty' => $this->input->post('dif'),
        'problem' => $this->input->post('prob'),
        'choice1' => $this->input->post('cho1'),
        'choice2' => $this->input->post('cho2'),
        'choice3' => $this->input->post('cho3'),
        'answer' => $this->input->post('ans'),
        'trivia' => $this->input->post('triv'),
        );

        $this->db->insert('quiz', $data);
      }

      function add_intermediate_quiz() {
        $data = array(
        'difficulty' => $this->input->post('dif'),
        'problem' => $this->input->post('prob'),
        'answer' => $this->input->post('ans'),
        'trivia' => $this->input->post('triv'),
        'subject' => $this->input->post('subj'),
        'example' => $this->input->post('exam'),
        'output' => $this->input->post('out'),
        'requirement' => $this->input->post('req'),
        );

        $this->db->insert('quiz', $data);
      }

      function add_advance_quiz() {
        $data = array(
        'difficulty' => $this->input->post('dif'),
        'problem' => $this->input->post('prob'),
        'answer' => $this->input->post('ans'),
        'trivia' => $this->input->post('triv'),
        'subject' => $this->input->post('subj'),
        'example' => $this->input->post('exam'),
        'output' => $this->input->post('out'),
        'requirement' => $this->input->post('req'),
        );

        $this->db->insert('quiz', $data);
      }

      public function login()
      {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $userData = $this->fetchDataByEmail($email);

        if($userData) {
          // $password = $this->makePassword($password, $userData['salt']);

          $sql = "SELECT * FROM admin_user WHERE email = ? AND password = ?";
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
    			$sql = "SELECT * FROM admin_user WHERE email = ?";
    			$query = $this->db->query($sql, array($email));
    			$result = $query->row_array();

    			return ($query->num_rows() == 1) ? $result : false;
    			return $result;
    		}
    	}

      public function fetchUserData($userId = null)
    	{
    		if($userId) {
    			$sql = "SELECT * FROM admin_user WHERE id = ?";
    			$query = $this->db->query($sql, array($userId));
    			$result = $query->row_array();

    			return $result;
    		}
    	}

 }
