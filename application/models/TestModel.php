<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestModel extends CI_Model {

    // Constructor to load the database helper library
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getAllTests() {

        $tests = $this->db->get('tests');
        return $tests->result();
    }

    public function insert() {
        // Insert data
        $data = $this->input->post(array('title', 'status'));

        if ($this->db->insert('tests', $data)) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }

    public function getTest($id) {

        $this->db->where('id', $id);
        $tests = $this->db->get('tests');
        return $tests->result();
    }
    public function getTestByTitle($title) {

        $this->db->where('title', $title);
        $tests = $this->db->get('tests');
        return $tests->result()[0];
    }

    public function update() {
//        print_r($this->input->post);
//        exit;
        $data = $this->input->post(array('title', 'status'));
        // Set the where condition
        $this->db->where('id', $this->input->post('id'));

        // Run update on table
        $this->db->update('tests', $data);
        return $this->db->affected_rows();
    }

    public function delete($test_id) {

        $this->db->where('id', $test_id)
                ->delete('tests');

        if ($this->db->affected_rows() > 0) {
            return $this->db->affected_rows();
        } else {
            return FALSE;
        }
    }
    
    public function getTestQuestions($test_id) {
        $this->db->select('questions.*');
        $this->db->from('questions');
        $this->db->join('tests_questions', 'tests_questions.quest_id = questions.id');
        $this->db->where('tests_questions.test_id', $test_id);
        return $this->db->get()->result();
    }

}
