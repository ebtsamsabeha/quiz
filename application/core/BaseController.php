<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BaseController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if( !(isset($_SESSION['user_id']))){
            redirect('admin/login');
        }
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == FALSE) {
            redirect('404');
        } 
        
        
       
        
    }
}

