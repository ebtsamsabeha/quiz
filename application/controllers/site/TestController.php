<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends SiteController {

    public function __construct() {
        parent::__construct();
        $this->load->model('ResultModel', 'result_model');
        
        $this->load->model('UserModel', 'user_model');
        $this->load->model('TestModel', 'test_model');
        $this->load->library('email');
        $this->load->library('session');
    }

    public function index($test_title) {
        $test = $this->test_model->getTestByTitle($test_title);
        $data['questions'] = $this->test_model->getTestQuestions($test->id);

        $data['test'] = $this->test_model->getTest($test->id)[0];
        $date = new DateTime();
        $data['start_time'] = date_format($date, "Y/m/d H:i:s");
        $this->load->view('site/templates/header');
        $this->load->view('site/templates/head');
        $this->load->view('site/tests/view', $data);
        $this->load->view('site/templates/footer');
    }

    public function result() {
        $formData = $this->input->post(NULL, TRUE);
        $test_id = $this->input->post('test_id');
        $start_time = $this->input->post('start_time');
        $duration = $this->input->post('duration');

        $result_id = $this->result_model->insertResult($_SESSION['site_user_id'], $test_id, $start_time, $duration);
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
            $admin = $this->user_model->getAdmin();
            $from_email = "email@example.com";
            $to_email = $admin[0]->email;
            $msg='<html><body>';
            $text.= '<a href="'.base_url('admin/admin/users/test_result/').$result_id.'">click here </a> to view Result';
            $text.= '</body></html>';
            //Load email library
            $this->load->library('email');
            $this->email->from($from_email, 'Identification');
            $this->email->to($to_email);
            $this->email->subject('User Complete Test');
            $this->email->message($msg);
            $this->email->send();
            
            
            $this->session->set_flashdata('message', 'test submitted .');
            redirect('/');
        } else {

            // user creation failed, this should never happen
            $data['error'] = '';
        }
    }

}
