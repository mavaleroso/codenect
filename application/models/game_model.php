<?php

class Game_model extends CI_Model
{
  public function insert_solved_quiz_db()
  {
    $insert_data = array(
      'student_id' => $this->input->post('userID'),
      'quiz_id' => $this->input->post('quizID'),
      'game_difficulty' => $this->input->post('Difficulty')
    );

    $this->db->insert('problem_solve', $insert_data);
  }

  public function update_Map()
  {
    $userID = $this->session->userdata('user_id');
    $quizID = $this->input->post('quizID');
    $difficulty = $this->input->post('Difficulty');
    $data = array(
      'mapTile' => $this->input->post('mapStat')
    );

    $this->db->where('student_id', $userID);
    $this->db->where('quiz_id', $quizID);
    $this->db->where('game_difficulty', $difficulty);
    $this->db->update('problem_solve', $data);


    $data1 = array(
      'game_progress' => $this->input->post('progress')
    );
    $this->db->where('student_id', $userID);
    $this->db->where('game_difficulty', $difficulty);
    $this->db->update('game_progress', $data1);


  }

  public function insert_map()
  {
    $data = array(
      'mapTile' => $this->input->post('mapStat'),
      'student_id' => $this->session->userdata('user_id'),
      'quiz_id' => $this->input->post('quizID'),
      'game_difficulty' => $this->input->post('Difficulty')
    );

    $this->db->insert('problem_solve', $data);
  }


  public function updateTime()
  {
    $userID = $this->session->userdata('user_id');
    $difficulty = $this->input->post('Difficulty');
    $data = array(
      'gametime' => $this->input->post('Time')
    );

    $this->db->where('student_id', $userID);
    $this->db->where('game_difficulty', $difficulty);
    $this->db->update('game_progress', $data);
  }

  public function mistakes()
  {
    $userID = $this->session->userdata('user_id');
    $difficulty = $this->input->post('Difficulty');
    $data = array(
      'game_mistakes' => $this->input->post('Mistakes')
    );

    $this->db->where('student_id', $userID);
    $this->db->where('game_difficulty', $difficulty);
    $this->db->update('game_progress', $data);
  }

}


?>
