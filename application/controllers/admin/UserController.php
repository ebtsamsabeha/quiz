<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class UserController extends BaseController {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
        $this->load->model('UserModel', 'user_model');
        $this->load->model('TestModel', 'test_model');
        $this->load->model('ResultModel', 'result_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['users'] = $this->user_model->getAllUsers();
        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/users/users', $data);
        $this->load->view('admin/templates/footer');
    }

    public function add() {
        $data['tests'] = $this->test_model->getAllTests();
        $data['user_tests'] = array();
        $data['formAction'] = 'Add';
        // Grab all the form Data
        $formData = $this->input->post(NULL, TRUE);
//        var_dump($formData);
        $data['user'] = (object) $formData;

        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() === false) {

            // validation not ok, send validation errors to the view

            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/users/form', $data);
            $this->load->view('admin/templates/footer');
        } else {

            // set variables from the form
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $type = $this->input->post('type');
            $user_id = $this->user_model->create_user($username, $email, $password, $type);
            if ($user_id) {
                if (isset($formData['test_id'])) {
                    $this->user_model->insertUserTest($user_id, $formData['test_id']);
                }
                $this->session->set_flashdata('message', 'Your User has been saved.');
                redirect('admin/users');
            } else {

                // user creation failed, this should never happen
                $data['error'] = 'There was a problem creating your new account. Please try again.';

                // send error to the view
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidebar');
                $this->load->view('admin/users/form', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }

    public function edit($id) {
        $data['tests'] = $this->test_model->getAllTests();
        $data['user'] = $this->user_model->getUser($id)[0];
        $user_tests = $this->user_model->getUserTests($id);
        $data['user_tests'] = array();
        foreach ($user_tests as $value) {
            array_push($data['user_tests'], $value->test_id);
        }
        $data['formAction'] = 'Update';
        $formData = $this->input->post(NULL, TRUE);

        if ($this->input->post('username') != $data['user']->username) {
            $is_unique_name = '|is_unique[users.username]';
        } else {
            $is_unique_name = '';
        }
        if ($this->input->post('email') != $data['user']->email) {
            $is_unique_email = '|is_unique[users.email]';
        } else {
            $is_unique_email = '';
        }
        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]' . $is_unique_name, array('is_unique' => 'This username already exists. Please choose another one.'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email' . $is_unique_email);
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[6]|required');
            $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
        }
        $this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() === false) {
            if ($formData) {
//        var_dump($formData);
                $data['user'] = (object) $formData;
            }
            // validation not ok, send validation errors to the view

            $this->load->view('admin/templates/header');
            $this->load->view('admin/templates/sidebar');
            $this->load->view('admin/users/form', $data);
            $this->load->view('admin/templates/footer');
        } else {

            // set variables from the form
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $type = $this->input->post('type');
            if ($this->user_model->update($username, $email, $password, $type)) {
                $this->user_model->deleteUserTests($this->input->post('id'));
                if (isset($formData['test_id'])) {
                    $this->user_model->insertUserTest($this->input->post('id'), $formData['test_id']);
                }

                $this->session->set_flashdata('message', 'Your User has been saved.');
                redirect('admin/users');
            } else {

                // user creation failed, this should never happen
                $data['error'] = 'There was a problem updating This account. Please try again.';

                // send error to the view
                $this->load->view('admin/templates/header');
                $this->load->view('admin/templates/sidebar');
                $this->load->view('admin/users/form', $data);
                $this->load->view('admin/templates/footer');
            }
        }
    }

    public function delete($user_id) {
        // Delete data-

        if (is_null($user_id)) {
            show_error('Invalid attempt to delete question');
        }

        if ($this->user_model->delete($user_id)) {
            $this->session->set_flashdata('message', 'Your User has been Deleted.');
            redirect('admin/users');
        } else {
            show_error('Have problem delete User ID:  ' . $user_id);
        }
    }

    public function tests($user_id) {

        $tests = $this->result_model->getUserTests($user_id);


        foreach ($tests as $key => $test) {
            $results = $this->result_model->getTestResult($test->id);
            if (isset($results[0])) {
                $tests[$key]->result = $results[0];
            }
        }
        $data['tests'] = $tests;

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/users/tests', $data);
        $this->load->view('admin/templates/footer');
    }

    public function viewTestResult($result_id) {

        $questions = $this->result_model->viewTestResult($result_id);
        $result = $this->result_model->getTestResult($result_id);

        $test = $this->result_model->getTest($result_id);
//        var_dump($tests);

        $data['questions'] = $questions;
        $data['result'] = $result;
        $data['test'] = $test;

        $this->load->view('admin/templates/header');
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/users/view_result', $data);
        $this->load->view('admin/templates/footer');
    }

    

    /**
     * logout function.
     * 
     * @access public
     * @return void
     */
    public function logout() {

        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {

            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            
            $this->session->set_flashdata('message', 'success Logout');
            redirect('admin/login');
        } else {
            redirect('/admin');
        }
    }

}
