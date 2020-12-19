<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if( !(isset($_SESSION['site_user_id']))){
            redirect('login');
        }
        
    }
}

