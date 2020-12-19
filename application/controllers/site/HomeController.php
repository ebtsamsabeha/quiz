<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends SiteController {

    public function __construct() {
        parent::__construct();
        $this->load->model('ResultModel', 'result_model');
        $this->load->library('session');
    }

    public function result($result_id) {


        $questions = $this->result_model->viewTestResult($result_id);
        $result = $this->result_model->getTestResult($result_id);

        $test = $this->result_model->getTest($result_id);

        $data['questions'] = $questions;
        $data['result'] = $result;
        $data['test'] = $test;

        $this->load->view('site/templates/header');
        $this->load->view('site/templates/head');
        $this->load->view('site/result', $data);
        $this->load->view('site/templates/footer');
    }

    public function logout() {

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }

            $this->session->set_flashdata('message', 'success Logout');
            redirect('login');
        } else {
            redirect('/');
        }
    }


}
