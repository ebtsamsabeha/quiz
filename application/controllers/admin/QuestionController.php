<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionController extends BaseController {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('TestModel', 'test_model');
        $this->load->model('QuestionModel', 'question_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['questions'] = $this->question_model->getAllQuestions();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/questions/questions', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {

        $data['tests'] = $this->test_model->getAllTests();
        $data['question_tests']=array();
        $data['formAction'] = 'Add';
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/questions/form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($id) {
        $data['tests'] = $this->test_model->getAllTests();
        $data['question'] = $this->question_model->getQuestion($id)[0];
        $question_tests = $this->question_model->getQuestionTests($id);
        $data['question_tests']=array();
        foreach ($question_tests as $value) {
            array_push($data['question_tests'], $value->test_id);
        }
        $data['formAction'] = 'Update';
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/questions/form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function validate() {
        $data['tests'] = $this->test_model->getAllTests();
        // Grab all the form Data
        $formData = $this->input->post(NULL, TRUE);
        //var_dump($formData);
        // Method was call directly without any form information
        if (empty($formData['formAction'])) {
            redirect('admin/questions');
        }

        // Set form valiation rules
        $this->form_validation->set_rules('title', 'Question Title', 'required');
        $this->form_validation->set_rules('ans_1', 'Answer one', 'required');
        $this->form_validation->set_rules('ans_2', 'Answer Two', 'required');
        $this->form_validation->set_rules('ans_3', 'Answer Three', 'required');
        $this->form_validation->set_rules('ans_4', 'Answer Four', 'required');
        $this->form_validation->set_rules('correct_ans', ' Correct Answer ', 'required');

        if ($this->form_validation->run() === FALSE) {

            $data['question'] = (object) $formData;
            $data['formAction'] =  $this->input->post('formAction');
            $data['question_tests']= $formData['test_id'];
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/questions/form', $data);
            $this->load->view('admin/templates/footer');
        } else {
            if ($formData['formAction'] === 'Add') {
                $question_id =$this->question_model->insert();
                if (isset($formData['test_id'])) {
                   $this->question_model->insertQuestTest($question_id,$formData['test_id']);
                }
            } elseif ($formData['formAction'] === 'Update') {
                $this->question_model->deleteQuestionTests($this->input->post('id'));
                if (isset($formData['test_id'])) {
                   $this->question_model->insertQuestTest($this->input->post('id'),$formData['test_id']);
                }
                $this->question_model->update();
            }

            $this->session->set_flashdata('message', 'Your Question has been saved.');

            redirect('admin/questions');
        }
    }

    public function delete($question_id) {
        // Delete data-

        if (is_null($question_id)) {
            show_error('Invalid attempt to delete question');
        }

        if ($this->question_model->delete($question_id)) {
            $this->session->set_flashdata('message', 'Your Question has been Deleted.');
            redirect('admin/questions');
        } else {
            show_error('Have problem delete question ' . $question_id);
        }
    }

}
