<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('m_penduduk');
        $this->load->model('data_dusun/m_data_dusun');
        $this->load->model('data_rt/m_data_rt');
        $this->load->model('data_rw/m_data_rw');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Data Penduduk',
            'penduduk'      => $this->m_penduduk->getPenduduk(),
            'isi'           => 'v_data_penduduk'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function tambahPenduduk()
    {
        // form validation
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Penduduk', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nik'           => $this->input->post('nik'),
                'nama'          => $this->input->post('nama'),
                'alamat'        => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'id_dusun'      => $this->input->post('id_dusun'),
                'id_rw'         => $this->input->post('id_rw'),
                'id_rt'         => $this->input->post('id_rt')
            ];
            $this->m_penduduk->addPenduduk($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('penduduk/');
        } else {
            $data = array(
                'title'         => 'Tambah Data Penduduk',
                'data_dusun'    => $this->m_data_dusun->getDataDusun(),
                'data_rw'       => $this->m_data_rw->get_data_rw(),
                'data_rt'       => $this->m_data_rt->get_data_rt(),
                'isi'           => 'v_add_penduduk'
            );
            $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }

    public function hapusPenduduk($id_penduduk = null)
    {
        $data = [
            'id_penduduk' => $id_penduduk
        ];
        $this->m_penduduk->delPenduduk($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('penduduk/');
    }

    public function ubahPenduduk($id_penduduk = null)
    {
        // form validation
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama Penduduk', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_penduduk'   => $id_penduduk,
                'nik'           => $this->input->post('nik'),
                'nama'          => $this->input->post('nama'),
                'alamat'        => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'id_dusun'      => $this->input->post('id_dusun'),
                'id_rw'         => $this->input->post('id_rw'),
                'id_rt'         => $this->input->post('id_rt')
            ];
            $this->m_penduduk->updatePenduduk($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Diubah!</div>');
            redirect('penduduk/');
        } else {
            $data = array(
                'title'         => 'Edit Data Penduduk',
                'error'         => $this->upload->display_errors(),
                'penduduk'      => $this->m_penduduk->getPendudukDetail($id_penduduk),
                'data_dusun'    => $this->m_data_dusun->getDataDusun($id_penduduk),
                'data_rw'       => $this->m_data_rw->get_data_rw($id_penduduk),
                'data_rt'       => $this->m_data_rt->get_data_rt($id_penduduk),
                'isi'           => 'v_edit_penduduk'
            );
            $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }
}

/* End of file Penduduk.php */