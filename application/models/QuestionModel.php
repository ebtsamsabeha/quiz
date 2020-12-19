<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionModel extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAllQuestions() {

        $questions = $this->db->get('questions');
        return $questions->result();
    }

    public function insert() {
        // Insert data
        $data = $this->input->post(array('title', 'ans_1', 'ans_2', 'ans_3', 'ans_4', 'correct_ans'));

        if ($this->db->insert('questions', $data)) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

    public function getQuestion($id) {
        $this->db->where('id', $id);
        $questions = $this->db->get('questions');
        return $questions->result();
    }

    public function update() {
        $data = $this->input->post(array('title', 'ans_1', 'ans_2', 'ans_3', 'ans_4', 'correct_ans'));
        // Set the where condition
        $this->db->where('id', $this->input->post('id'));

        // Run update on table
        $this->db->update('questions', $data);
        return $this->db->affected_rows();
    }

    public function delete($question_id) {

        $this->db->where('id', $question_id)
                ->delete('questions');

        if ($this->db->affected_rows() > 0) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

    public function deleteQuestionTests($quest_id) {
        $this->db->where('quest_id', $quest_id)
                ->delete('tests_questions');
    }

    public function getQuestionTests($quest_id) {
        $this->db->select('test_id');
        $this->db->from('tests_questions');
        $this->db->where('quest_id', $quest_id);
        return $this->db->get()->result();
    }

    public function insertQuestTest($question_id, $tests) {
        // Insert data
//        $data = $this->input->post(array('test_id', 'quest_id'));
        foreach ($tests as $test) {
            $data = array(
                'quest_id' => $question_id,
                'test_id' => $test
            );

            $this->db->insert('tests_questions', $data);
        }
    }

}
