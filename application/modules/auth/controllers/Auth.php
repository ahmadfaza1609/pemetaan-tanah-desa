<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{

    public function login()
    {
        $this->load->view('v_login');
    }
}

/* End of file Auth.php */