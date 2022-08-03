<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_surat extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_jenis_surat');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Kelola Jenis Surat',
            'jenis_surat'   => $this->m_jenis_surat->getJenisSurat(),
            'isi'           => 'v_data_jenis'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    // upload arsip

    public function get_arsip()
    {
        $data = array(
            'title'         => 'Arsip Upload Arsip',
            'arsip_surat'   => $this->m_jenis_surat->get_arsip(),
            'isi'           => 'v_arsip'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function upload_arsip()
    {
        // form validation arsip
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('no_surat', 'No Surat Tanah', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './uploads_file/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 0;
            $config['encrypt_name']         = TRUE;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_arsip')) {
                $data = array(
                    'title'         => 'Arsip Upload Arsip',
                    'error'         => $this->upload->display_errors(),
                    'jenis_surat'   => $this->m_jenis_surat->getJenisSurat(),
                    'data_rt'       => $this->m_jenis_surat->get_data_rt(),
                    'data_rw'       => $this->m_jenis_surat->get_data_rw(),
                    'data_dusun'    => $this->m_jenis_surat->get_data_dusun(),
                    'isi'           => 'v_tambah_arsip'
                );
                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = $this->upload->data();

                $data = array(
                    'nama'          => $this->input->post('nama'),
                    'nik'           => $this->input->post('nik'),
                    'no_surat'      => $this->input->post('no_surat'),
                    'alamat'        => $this->input->post('alamat'),
                    'id_jenis_surat' => $this->input->post('id_jenis_surat'),
                    'id_rt'         => $this->input->post('id_rt'),
                    'id_rw'         => $this->input->post('id_rw'),
                    'id_dusun'      => $this->input->post('id_dusun'),
                    'file_arsip'    => $upload_data['file_name'],
                );
                $this->m_jenis_surat->pdf($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
                redirect('jenis_surat/get_arsip');
            }
        }
        $data = array(
            'title'         => 'Kelola Tambah Arsip',
            'error'         => $this->upload->display_errors(),
            'jenis_surat'   => $this->m_jenis_surat->getJenisSurat(),
            'data_rt'       => $this->m_jenis_surat->get_data_rt(),
            'data_rw'       => $this->m_jenis_surat->get_data_rw(),
            'data_dusun'    => $this->m_jenis_surat->get_data_dusun(),
            'isi'           => 'v_tambah_arsip'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function del_arsip($id_arsip = null)
    {
        $data = array(
            'id_arsip' => $id_arsip
        );
        $this->m_jenis_surat->delete_arsip($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('jenis_surat/get_arsip/');
    }

    public function detail_arsip($id_arsip = null)
    {
        $data = array(
            'title' => 'Detail Surat Tanah',
            'arsip' => $this->m_jenis_surat->get_detail_arsip($id_arsip),
            'isi'   => 'v_detail_arsip'
        );
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function edit_arsip($id_arsip = null)
    {
        // form validation arsip
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('no_surat', 'No Surat Tanah', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './uploads_file/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 0;
            $config['encrypt_name']         = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_arsip')) {
                $data = array(
                    'title'         => 'Arsip Edit Arsio',
                    'error'         => $this->upload->display_errors(),
                    'arsip_surat'   => $this->m_jenis_surat->get_detail_arsip($id_arsip),
                    'jenis_surat'   => $this->m_jenis_surat->getJenisSurat($id_arsip),
                    'data_rt'       => $this->m_jenis_surat->get_data_rt($id_arsip),
                    'data_rw'       => $this->m_jenis_surat->get_data_rw($id_arsip),
                    'data_dusun'    => $this->m_jenis_surat->get_data_dusun($id_arsip),
                    'isi'           => 'v_edit_arsip'
                );
                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = $this->upload->data();
                $data = array(
                    'id_arsip'      => $id_arsip,
                    'nama'          => $this->input->post('nama'),
                    'nik'           => $this->input->post('nik'),
                    'no_surat'      => $this->input->post('no_surat'),
                    'alamat'        => $this->input->post('alamat'),
                    'id_jenis_surat' => $this->input->post('id_jenis_surat'),
                    'id_rt'         => $this->input->post('id_rt'),
                    'id_rw'         => $this->input->post('id_rw'),
                    'id_dusun'      => $this->input->post('id_dusun'),
                    'file_arsip'    => $upload_data['file_name'],
                );
                $this->m_jenis_surat->arsip_edit($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Edit!</div>');
                redirect('jenis_surat/get_arsip');
            }
            $data = array(
                'id_arsip'      => $id_arsip,
                'nama'          => $this->input->post('nama'),
                'nik'           => $this->input->post('nik'),
                'no_surat'      => $this->input->post('no_surat'),
                'alamat'        => $this->input->post('alamat'),
                'id_jenis_surat' => $this->input->post('id_jenis_surat'),
                'id_rt'         => $this->input->post('id_rt'),
                'id_rw'         => $this->input->post('id_rw'),
                'id_dusun'      => $this->input->post('id_dusun'),
            );
            $this->m_jenis_surat->arsip_edit($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Edit!</div>');
            redirect('jenis_surat/get_arsip');
        }
        $data = array(
            'title'         => 'Kelola Edit Arsip',
            'error'         => $this->upload->display_errors(),
            'arsip_surat'   => $this->m_jenis_surat->get_detail_arsip($id_arsip),
            'jenis_surat'   => $this->m_jenis_surat->getJenisSurat($id_arsip),
            'data_rt'       => $this->m_jenis_surat->get_data_rt($id_arsip),
            'data_rw'       => $this->m_jenis_surat->get_data_rw($id_arsip),
            'data_dusun'    => $this->m_jenis_surat->get_data_dusun($id_arsip),
            'isi'           => 'v_edit_arsip'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }





    // tambah jenis surat
    public function add_jenis()
    {
        // set form validation
        $this->form_validation->set_rules('nama_surat', 'Jenis Surat', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama_surat'       => $this->input->post('nama_surat'),
                'keterangan'       => $this->input->post('keterangan')
            ];
            $this->m_jenis_surat->add_jenis($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('jenis_surat/');
        } else {

            $data = array(
                'title' => 'Tambah Jenis Surat',
                'isi' => 'v_add_jenis'
            );

            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }

    public function delete($id_jenis_surat = null)
    {
        $data = array(
            'id_jenis_surat' => $id_jenis_surat
        );
        $this->m_jenis_surat->delete($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('jenis_surat/');
    }

    public function edit($id_jenis_surat = null)
    {
        // set form validation
        $this->form_validation->set_rules('nama_surat', 'Jenis Surat', 'required|trim');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');


        if ($this->form_validation->run() == TRUE) {
            $data = [
                'id_jenis_surat' => $id_jenis_surat,
                'nama_surat'    => $this->input->post('nama_surat'),
                'keterangan'    => $this->input->post('keterangan')
            ];
            $this->m_jenis_surat->edit($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Baru Diedit!</div>');
            redirect('jenis_surat/');
        } else {

            $data = array(
                'title'         => 'Edit Data Jenis Surat',
                'jenis_surat'   => $this->m_jenis_surat->detail($id_jenis_surat),
                'isi'           => 'v_edit_jenis'
            );

            $this->load->view('admin/v_admin', $data, FALSE);
        }
    }
}

/* End of file Data_rt.php */