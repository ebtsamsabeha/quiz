<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->load->model('TestModel', 'test_model');
        $this->load->model('ResultModel', 'result_model');

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $data['tests'] = $this->test_model->getAllTests();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tests/tests', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $data['formAction'] = 'Add';
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tests/form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function edit($id) {
        $data['test'] = $this->test_model->getTest($id)[0];
        $data['formAction'] = 'Update';
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tests/form', $data);
        $this->load->view('admin/templates/footer');
    }

    public function validate() {
        // Grab all the form Data
        $formData = $this->input->post(NULL, TRUE);

        //var_dump($formData);
        // Method was call directly without any form information
        if (empty($formData['formAction'])) {
            redirect('admin/tests');
        }

        if ($formData['formAction'] === 'Add') {
            $is_unique_name = '|is_unique[tests.title]';
        } elseif ($formData['formAction'] === 'Update') {
            if ($this->input->post('title') != $this->input->post('title_old')) {
                $is_unique_name = '|is_unique[tests.title]';
            } else {
                $is_unique_name = '';
            }
        }


        // Set form valiation rules
        $this->form_validation->set_rules('title', 'Test Title', 'required|alpha_numeric' . $is_unique_name);
        $this->form_validation->set_rules('status', 'test Status', 'required');

        
        if ($this->form_validation->run() === FALSE) {

            $data['test'] = (object) $formData;
            $data['formAction'] = $this->input->post('formAction');
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/tests/form', $data);
            $this->load->view('admin/templates/footer');
        } else {
            if ($formData['formAction'] === 'Add') {
                $this->test_model->insert();
            } elseif ($formData['formAction'] === 'Update') {
                $this->test_model->update();
            }

            $this->session->set_flashdata('message', 'Your Test has been saved.');

            redirect('admin/tests');
        }
    }

    public function delete($test_id) {
        // Delete data-

        if (is_null($test_id)) {
            show_error('Invalid attempt to delete test');
        }

        if ($this->test_model->delete($test_id)) {
            $this->session->set_flashdata('message', 'Your Test has been Deleted.');
            redirect('admin/tests');
        } else {
            show_error('Have problem delete test ' . $test_id);
        }
    }

    public function view($test_id) {
        $data['questions'] = $this->test_model->getTestQuestions($test_id);

        $data['test'] = $this->test_model->getTest($test_id)[0];
        $date = new DateTime();
        $data['start_time'] = date_format($date, "Y/m/d H:i:s");
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/tests/view', $data);
        $this->load->view('admin/templates/footer');
    }

    public function result() {
        $formData = $this->input->post(NULL, TRUE);

        var_dump($formData);
//        exit;
        $test_id = $this->input->post('test_id');
        $start_time = $this->input->post('start_time');
        $duration = $this->input->post('duration');

        $result_id = $this->result_model->insertResult($_SESSION['user_id'], $test_id, $start_time, $duration);
        if ($result_id) {
            if (isset($formData['correct_ans'])) {
                foreach ($formData['correct_ans'] as $ans) {
                    if (isset($ans['answer'])) {
                        $ques_ans = $ans['answer'];
                    } else {
                        $ques_ans = 0;
                    }
                    $this->result_model->insertTestAnswer($result_id, $ans['id'], $ques_ans);
                }
            }
            $this->session->set_flashdata('message', 'test submitted .');
//            redirect('tests');
        } else {

            // user creation failed, this should never happen
            $data['error'] = 'There was a problem creating your new account. Please try again.';

            // send error to the view
            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('users', $data);
            $this->load->view('admin/templates/footer');
        }
    }

}
