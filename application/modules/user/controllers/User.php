<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'user'  => $this->m_user->get_user(),
            'isi'   => 'v_data_user'
        );
        $this->load->view('admin/v_admin', $data, FALSE);
    }
}

/* End of file User.php */