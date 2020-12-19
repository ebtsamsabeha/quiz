<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class LoginController extends CI_Controller {

    /**
     * __construct function.
     * 
     * @access public
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->library(array('session'));
        $this->load->model('UserModel', 'user_model');
        $this->load->library('form_validation');
    }

    /**
     * login function.
     * 
     * @access public
     * @return void
     */
    public function index() {

        // create the data object

        $data = new ArrayObject;
        $formData = $this->input->post(NULL, TRUE);
        if ($formData) {
            $data['user'] = (object) $formData;
        }
        // set validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('admin/templates/header');
            $this->load->view('admin/login', $data);
        } else {

            // set variables from the form
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            if ($this->user_model->userLogin($email, $password)) {

                $user = $this->user_model->getUserByEmail($email);
                if($user->type == 1){
                    // set session user datas
                    $_SESSION['user_id'] = (int) $user->id;
                    $_SESSION['username'] = (string) $user->username;
                    $_SESSION['logged_in'] = (bool) true;
                    $_SESSION['is_admin'] = (bool) $user->type;
                    $_SESSION['site_user_id'] = (int) $user->id;
                    $_SESSION['site_username'] = (string) $user->username;
                    $_SESSION['site_logged_in'] = (bool) true;
                    $_SESSION['site_is_site'] = (bool) $user->type;

                    // user login ok
                    redirect('/admin');
                }else{
                    // login failed
                $data['error'] = "Can't Access DashBoard" ;

                // send error to the view
                $this->load->view('admin/templates/header');
                $this->load->view('admin/login', $data);
                }
            } else {

                // login failed
                $data['error'] = 'Wrong Email or password.';

                // send error to the view
                $this->load->view('admin/templates/header');
                $this->load->view('admin/login', $data);
            }
        }
    }

}
