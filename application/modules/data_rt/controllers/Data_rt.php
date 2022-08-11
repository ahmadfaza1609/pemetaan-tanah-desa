<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_rt extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('m_data_rt');
    }

    public function index()
    {
        $data = array(
            'title' => 'Kelola Data RT',
            'data_rt' => $this->m_data_rt->get_data_rt(),
            'isi' => 'v_data_rt'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function add_rt()
    {
        // set form validation
        $this->form_validation->set_rules('nama_rt', 'Nama RT', 'required|trim');
        $this->form_validation->set_rules('no_rt', 'No RT', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_rt'       => $this->input->post('nama_rt'),
                'no_rt'         => $this->input->post('no_rt'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat'        => $this->input->post('alamat')
            ];
            $this->m_data_rt->add_rt($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('data_rt/');
        } else {

            $data = array(
                'title' => 'Tambah Data RT',
                'isi' => 'v_add_rt'
            );
            $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }

    public function delete($id_data_rt)
    {
        $data = array(
            'id_data_rt' => $id_data_rt
        );
        $this->m_data_rt->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('data_rt/');
    }

    public function edit($id_data_rt)
    {
        // set form validation
        $this->form_validation->set_rules('nama_rt', 'Nama RT', 'required|trim');
        $this->form_validation->set_rules('no_rt', 'No RT', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_data_rt'    => $id_data_rt,
                'nama_rt'       => $this->input->post('nama_rt'),
                'no_rt'         => $this->input->post('no_rt'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat'        => $this->input->post('alamat')
            ];
            $this->m_data_rt->edit($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Diedit!</div>');
            redirect('data_rt/');
        } else {

            $data = array(
                'title'     => 'Edit Data RT',
                'data_rt'   => $this->m_data_rt->detail($id_data_rt),
                'isi'       => 'v_edit_rt'
            );
            $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }
}

/* End of file Data_rt.php */