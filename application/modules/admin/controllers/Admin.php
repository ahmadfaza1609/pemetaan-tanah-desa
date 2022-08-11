<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('session');
        $this->load->model('m_admin');
        $this->load->model('dashboard/m_dashboard');
        $this->load->model('auth/m_auth');
        // if(!$this->m_auth->)
    }

    public function index()
    {

        $data = array(
            'title' => 'Pemetaan',
            'lahan' => $this->m_dashboard->getTanahJoin(),
            'isi'   => 'dashboard/v_dashboard',
        );
        // $data['title'] = 'Pemetaan';
        // $data['isi'] = 'dashboard/v_dashboard';
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();

        // echo 'Selamat Datang' . $data['user']['nama'];
        // die();

        $this->load->view('admin/v_admin', $data, FALSE);
    }
}

/* End of file Admin.php */