<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{

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