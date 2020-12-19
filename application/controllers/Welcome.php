<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends SiteController {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel', 'user_model');
        $this->load->model('ResultModel', 'result_model');
        $this->load->model('TestModel', 'test_model');

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index(){
        
        $user_id= $_SESSION['site_user_id'];
        $tests = $this->result_model->getUsersTests($user_id);
        foreach ($tests as $key => $test) {
            $test->result= $this->result_model->getResultTest($user_id,$test->id);
            $test->questions= count($this->test_model->getTestQuestions($test->id));
        
        }
        $data['tests'] =$tests;
        $this->load->view('site/templates/header');
        $this->load->view('site/templates/head');
        $this->load->view('site/home', $data);
        $this->load->view('site/templates/footer');
    }
    

}
