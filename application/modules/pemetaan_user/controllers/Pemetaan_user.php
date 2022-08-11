<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemetaan_user extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_pemetaan_user');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Pemetaan Desa Bantan Tengah',
            'pemetaan_user' => $this->m_pemetaan_user->get_data(),
            'isi'           => 'halaman_index'
        );

        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pemetaan_user/request_halaman', $data, FALSE);
    }

    public function cari()
    {
        // $data = array(
        //     'cariberdasarkan' => $this->input->post('cariberdasarkan'),
        //     'yangdicari'      => $this->input->post('yangdicari'),
        // );
        $data['title'] = 'Pemetaan User';
        $data['isi'] = 'halaman_index';
        $data['cariberdasarkan'] = $this->input->post("cariberdasarkan");
        $data['yangdicari'] = $this->input->post("yangdicari");
        $data['pemetaan_user'] = $this->m_pemetaan_user->cari($data['cariberdasarkan'], $data['yangdicari'])->result();
        $data['jumlah'] = count($data['pemetaan_user']);
        // user login
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pemetaan_user/request_halaman', $data, FALSE);
    }

    public function detailLahanUser($id_detail_tanah = null)
    {
        $data['title'] = 'Pemetaan Desa Bantan Tengah';
        $data['isi'] = 'halaman_detail';
        $data['detail_pemetaan'] = $this->m_pemetaan_user->detailUserLahan($id_detail_tanah);
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('pemetaan_user/request_halaman', $data, FALSE);
    }
}

/* End of file Front_end.php */