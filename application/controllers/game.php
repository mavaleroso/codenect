<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('game_model');
  }



  // public function filter_quiz()
  // {
  //
  //   $userID = $this->session->userdata('user_id');
  //   $query = $this->db->query("SELECT * FROM problem_solve WHERE student_id = $userID");
  //   $items = array('');
  //   foreach ($query->result() as $row)
  //   {
  //           $items[] = $row->quiz_id;
  //
  //   }
  //   $this->db->where_not_in('id', $items);
  //   $query = $this->db->get('quiz');
  //
  //   $res = $query->result();
  //   $res = $query->result_array();
  //
  //   echo json_encode($res);
  // }

  public function get_quiz()
	{

    $difficulty = $this->input->post('Difficulty');
    $userID = $this->session->userdata('user_id');
    $query1 = $this->db->query("SELECT * FROM problem_solve WHERE student_id = $userID");
    $items = array('');
      foreach ($query1->result() as $row)
      {
              $items[] = $row->quiz_id;

      }

      $this->db->where_in('difficulty', $difficulty);
      $this->db->where_not_in('id', $items);
      $this->db->order_by('rand()');
      $this->db->limit(1);
      $query = $this->db->get('quiz');

      $res = $query->result();
      $res = $query->result_array();

      echo json_encode($res);
	}

  public function get_hint()
  {

      $difficulty = $this->input->post('Difficulty');

      $this->db->where_in('difficulty', $difficulty);
      $this->db->order_by('rand()');
      $this->db->limit(1);
      $query = $this->db->get('quiz');

      $res = $query->result();
      $res = $query->result_array();

      echo json_encode($res);
  }

  public function get_trivia()
  {
      $difficulty = $this->input->post('Difficulty');
      $quizID = $this->input->post('quizID');

      $this->db->where_in('difficulty', $difficulty);
      $this->db->where_in('id', $quizID);
      $this->db->order_by('rand()');
      $this->db->limit(1);
      $query = $this->db->get('quiz');

      $res = $query->result();
      $res = $query->result_array();

      echo json_encode($res);
  }

  public function get_map()
	{
      $difficulty = $this->input->post('Difficulty');
      $userID = $this->session->userdata('user_id');
      $this->db->select('mapTile');
      $this->db->where_in('student_id', $userID);
      $this->db->where_in('game_difficulty', $difficulty);
      $query = $this->db->get('problem_solve');

      $res = $query->result();
      $res = $query->result_array();

      echo json_encode($res);
	}

  public function get_problem_solved()
	{
      $userID = $this->session->userdata('user_id');
      $difficulty = $this->input->post('Difficulty');

      $this->db->select('*,count(id) AS num_of_quiz');
      $this->db->where_in('student_id', $userID);
      $this->db->where_in('game_difficulty', $difficulty);
      $query = $this->db->get('problem_solve');

      $res =  $query->result();
      echo json_encode($res);
	}

  public function getProgress()
	{
      $difficulty = $this->input->post('Difficulty');
      $userID = $this->session->userdata('user_id');
      $this->db->select('*');
      $this->db->where_in('student_id', $userID);
      $this->db->where_in('game_difficulty', $difficulty);
      $query = $this->db->get('game_progress');

    $res = $query->result();
      // $res = $query->result_array();
      echo json_encode($res);
	}

  public function insert_solved_quiz()
  {
    $this->game_model->insert_solved_quiz_db();
  }

  public function updateGameTime()
  {
    $this->game_model->updateTime();
  }

  public function updateMap()
  {
    $this->game_model->update_Map();
  }

  public function solve_quiz_Map()
  {
    $this->game_model->insert_map();
  }

  public function player_position()
  {
    $userID = $this->session->userdata('user_id');
    $this->db->select('player_position');
    $this->db->where_in('student_id', $userID);
    $query = $this->db->get('game_progress');

    $res = $query->result();
    $res = $query->result_array();

    echo json_encode($res);
  }

  public function mistakes()
  {
    $this->game_model->mistakes();
  }


}
