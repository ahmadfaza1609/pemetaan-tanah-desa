<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('lahan/m_lahanTanah');
        $this->load->model('penduduk/m_penduduk');
        $this->load->model('m_dashboard');
    }


    public function index()
    {
        $data = array(
            'title'         => 'Pemetaan',
            'lahan'         => $this->m_dashboard->getTanahJoin(),
            'jumlah_lahan'  => $this->m_dashboard->getJumlahLahan(),
            'jumlah_penduduk'  => $this->m_dashboard->getJumlahPenduduk(),
            'jumlah_surat'  => $this->m_dashboard->getJumlahSurat(),
            'jumlah_user'  => $this->m_dashboard->getJumlahUser(),
            'isi'           => 'v_dashboard'
        );
        // $data['jumlah_lahan'] = $this->m_dashboard->getJumlahLahan();
        // var_dump($data);
        // die();
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function detail_lahan($id_lahan)
    {
        $data = array(
            'title' => 'Detail Lahan Pertanahan',
            'lahan' => $this->m_lahan->detail($id_lahan),
            'foto'  => $this->m_lahan->detail_galeri($id_lahan),
            'isi'   => 'lahan/v_detail_lahan'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }
}