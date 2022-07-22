<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('lahan/m_lahan');
    }

    public function index()
    {
        $data = array(
            'title' => 'Pemetaan',
            'lahan' => $this->m_lahan->get_all_data(),
            'isi'   => 'v_dashboard'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function detail_lahan($id_lahan)
    {
        $data = array(
            'title' => 'Lahan Pertanahan',
            'lahan' => $this->m_lahan->detail($id_lahan),
            'foto'  => $this->m_lahan->detail_galeri($id_lahan),
            'isi'   => 'v_detail_lahan'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }
}