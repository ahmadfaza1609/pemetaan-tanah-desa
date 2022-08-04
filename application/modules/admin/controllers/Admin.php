<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('auth/m_auth');
        // if(!$this->m_auth->)
    }

    public function index()
    {

        $data = array(
            'title' => 'Pemetaan',
            'isi'   => 'v_dashboard'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }
}

/* End of file Admin.php */