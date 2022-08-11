<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_rw extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('m_data_rw');
    }

    public function index()
    {
        $data = array(
            'title' => 'Kelola Data RW',
            'data_rw' => $this->m_data_rw->get_data_rw(),
            'isi' => 'v_data_rw'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function add_rw()
    {
        // set form validation
        $this->form_validation->set_rules('nama_rw', 'Nama RW', 'required|trim');
        $this->form_validation->set_rules('no_rw', 'No RW', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_rw'       => $this->input->post('nama_rw'),
                'no_rw'         => $this->input->post('no_rw'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat'        => $this->input->post('alamat')
            ];
            $this->m_data_rw->add_rw($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('data_rw/');
        } else {

            $data = array(
                'title' => 'Tambah Data RW',
                'isi' => 'v_add_rw'
            );
            $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }

    public function delete($id_data_rw)
    {
        $data = array(
            'id_data_rw' => $id_data_rw
        );
        $this->m_data_rw->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('data_rw/');
    }

    public function edit($id_data_rw)
    {
        // set form validation
        $this->form_validation->set_rules('nama_rw', 'Nama RW', 'required|trim');
        $this->form_validation->set_rules('no_rw', 'No RW', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_data_rw'    => $id_data_rw,
                'nama_rw'       => $this->input->post('nama_rw'),
                'no_rw'         => $this->input->post('no_rw'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat'        => $this->input->post('alamat')
            ];
            $this->m_data_rw->edit($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Diedit!</div>');
            redirect('data_rw/');
        } else {

            $data = array(
                'title'     => 'Edit Data RW',
                'data_rw'   => $this->m_data_rw->detail($id_data_rw),
                'isi'       => 'v_edit_rw'
            );
            $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }
}

/* End of file Data_rt.php */