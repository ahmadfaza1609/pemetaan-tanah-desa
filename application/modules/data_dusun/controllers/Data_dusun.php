<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_dusun extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('m_data_dusun');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Kelola Data Dusun',
            'data_dusun'   => $this->m_data_dusun->getDataDusun(),
            'isi'           => 'v_data_dusun'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function add_dusun()
    {
        // set form validation
        $this->form_validation->set_rules('nama_dusun', 'Nama Dusun', 'required|trim');
        $this->form_validation->set_rules('no_dusun', 'No Dusun', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_dusun'     => $this->input->post('nama_dusun'),
                'no_dusun'       => $this->input->post('no_dusun'),
                'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
                'alamat'         => $this->input->post('alamat')
            ];
            $this->m_data_dusun->add_dusun($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('data_dusun/');
        } else {

            $data = array(
                'title' => 'Tambah Data Dusun',
                'isi' => 'v_add_dusun'
            );
            $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }

    public function delete($id_data_dusun)
    {
        $data = array(
            'id_data_dusun' => $id_data_dusun
        );
        $this->m_data_dusun->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('data_dusun/');
    }

    public function edit($id_data_dusun)
    {
        // set form validation
        $this->form_validation->set_rules('nama_dusun', 'Nama Dusun', 'required|trim');
        $this->form_validation->set_rules('no_dusun', 'No Dusun', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');



        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_data_dusun' => $id_data_dusun,
                'nama_dusun'     => $this->input->post('nama_dusun'),
                'no_dusun'       => $this->input->post('no_dusun'),
                'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
                'alamat'         => $this->input->post('alamat')
            ];
            $this->m_data_dusun->edit($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Diedit!</div>');
            redirect('data_dusun/');
        } else {

            $data = array(
                'title'         => 'Edit Data Dusun',
                'data_dusun'    => $this->m_data_dusun->detail($id_data_dusun),
                'isi'           => 'v_edit_dusun'
            );
            $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }
}

/* End of file Data_rt.php */