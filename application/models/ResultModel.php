<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ResultModel extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insertResult($user_id, $test_id, $start_time, $duration) {
        // Insert data
        $data = array(
            'user_id' => $user_id,
            'test_id' => $test_id,
            'start_time' => $start_time,
            'duration' => $duration
        );

        if ($this->db->insert('test_result', $data)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function insertTestAnswer($test_result_id, $question_id, $ans) {
        // Insert data
        $data = array(
            'test_result_id' => $test_result_id,
            'quest_id' => $question_id,
            'ans' => $ans
        );

        if ($this->db->insert('test_answers', $data)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    public function getUserTests($user_id) {
        $sql ="SELECT `test_result`.*, `tests`.`title` FROM `test_result`, `tests` 
            WHERE  `test_result`.`test_id` = `tests`.`id` AND `test_result`.`user_id` = $user_id";
        return $this->db->query($sql)->result();
    }

    //
    public function getTestResult( $test_result_id) {
        $sql = "Select 
            (select COUNT(*) from questions ,test_answers WHERE  questions.id = test_answers.quest_id
            and questions.correct_ans = test_answers.ans and test_answers.test_result_id=$test_result_id) AS correct_ans ,
            (select COUNT(*) from questions ,test_answers WHERE  questions.id = test_answers.quest_id 
            and questions.correct_ans != test_answers.ans and test_answers.test_result_id=$test_result_id ) AS wrong_ans ,
            ( select COUNT(*) from questions ,test_answers WHERE  questions.id = test_answers.quest_id 
            and test_answers.test_result_id=$test_result_id )  AS Total_question GROUP BY correct_ans ASC";
        return $this->db->query($sql)->result();
    }
    function viewTestResult($result_id) {
        $this->db->select('questions.*,test_answers.ans');
        $this->db->from('test_answers,questions');
        $this->db->where('test_answers.test_result_id', $result_id);
        $this->db->where('questions.id = test_answers.quest_id');
        return $this->db->get()->result();
    }
    function getTest($result_id) {
        $this->db->select('tests.*');
        $this->db->from('test_result,tests');
        $this->db->where('test_result.id', $result_id);
        $this->db->where('tests.id = test_result.test_id');
        return $this->db->get()->result()[0];
    }
    
    function getResultTest($user_id,$test_id) {
        $sql = "SELECT * FROM test_result
                WHERE   start_time IN (SELECT max(start_time) FROM test_result where  user_id=$user_id and test_id=$test_id)";
        return $this->db->query($sql)->result();
    }
    
    public function getUsersTests($user_id) {
        $this->db->select('tests.*');
        $this->db->from('tests,user_tests');
        $this->db->where('user_tests.user_id', $user_id);
        $this->db->where('tests.id = user_tests.test_id');
        $this->db->where('tests.status = 1');
        return $this->db->get()->result();
    }

}
