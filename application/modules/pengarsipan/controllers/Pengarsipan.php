<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengarsipan extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_pengarsipan');
        $this->load->model('penduduk/m_penduduk');
        $this->load->model('jenis_surat/m_jenis_surat');
    }

    public function index()
    {
        $data = array(
            'title' =>  'Pengarsipan',
            'pengarsipan' => $this->m_pengarsipan->getPengarsipan(),
            'isi' => 'v_pengarsipan'
        );
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function ubahPengarsipan($id_pengarsipan = null)
    {
        // form validation arsip
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './uploads_file/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 0;
            $config['encrypt_name']         = TRUE;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_surat')) {
                $data = array(
                    'title'         => 'Update Data Arsip',
                    'error'         => $this->upload->display_errors(),
                    'pengarsipan'   => $this->m_pengarsipan->getPengarsipanId($id_pengarsipan),
                    'jenis_surat'   => $this->m_jenis_surat->getJenisSurat($id_pengarsipan),
                    'penduduk'      => $this->m_penduduk->getPenduduk($id_pengarsipan),
                    'isi'           => 'pengarsipan/v_ubahPengarsipan'
                );
                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = $this->upload->data();

                $data = array(
                    'id_pengarsipan'    => $id_pengarsipan,
                    'id_penduduk'       => $this->input->post('id_penduduk'),
                    'id_jenis_surat'    => $this->input->post('id_jenis_surat'),
                    'ket'               => $this->input->post('ket'),
                    'file_surat'        => $upload_data['file_name'],
                );
                $this->m_pengarsipan->addPengarsipan($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
                redirect('pengarsipan/Pengarsipan');
            }
            $data = array(
                'id_pengarsipan'    => $id_pengarsipan,
                'id_penduduk'       => $this->input->post('id_penduduk'),
                'id_jenis_surat'    => $this->input->post('id_jenis_surat'),
                'ket'               => $this->input->post('ket')
            );
            $this->m_pengarsipan->updatePengarsipan($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
            redirect('pengarsipan/Pengarsipan');
        }
        $data = array(
            'title'         => 'Update Data Arsip',
            'error'         => $this->upload->display_errors(),
            'pengarsipan'   => $this->m_pengarsipan->getPengarsipanId($id_pengarsipan),
            'jenis_surat'   => $this->m_jenis_surat->getJenisSurat($id_pengarsipan),
            'penduduk'      => $this->m_penduduk->getPenduduk($id_pengarsipan),
            'isi'           => 'pengarsipan/v_ubahPengarsipan'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }


    public function tambahPengarsipan()
    {
        // form validation arsip
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './uploads_file/';
            $config['allowed_types']        = 'pdf';
            $config['max_size']             = 0;
            $config['encrypt_name']         = TRUE;
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_surat')) {
                $data = array(
                    'title'         => 'Arsip Upload Arsip',
                    'error'         => $this->upload->display_errors(),
                    'jenis_surat'   => $this->m_jenis_surat->getJenisSurat(),
                    'penduduk'      => $this->m_penduduk->getPenduduk(),
                    'isi'           => 'pengarsipan/v_tambahPengarsipan'
                );
                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = $this->upload->data();

                $data = array(
                    'id_lahan_warga'    => $this->input->post('id_lahan_warga'),
                    'id_penduduk'       => $this->input->post('id_penduduk'),
                    'id_jenis_surat'    => $this->input->post('id_jenis_surat'),
                    'ket'               => $this->input->post('ket'),
                    'file_surat'        => $upload_data['file_name'],
                );
                $this->m_pengarsipan->addPengarsipan($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Ditambahkan!</div>');
                redirect('pengarsipan/Pengarsipan');
            }
        }
        $data = array(
            'title'         => 'Kelola Tambah Arsip',
            'error'         => $this->upload->display_errors(),
            'jenis_surat'   => $this->m_jenis_surat->getJenisSurat(),
            'penduduk'      => $this->m_penduduk->getPenduduk(),
            'isi'           => 'pengarsipan/v_tambahPengarsipan'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }



    public function hapusPengarsipan($id_pengarsipan = null)
    {
        $data = [
            'id_pengarsipan' => $id_pengarsipan
        ];
        $this->m_pengarsipan->deletePengarsipan($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('pengarsipan/');
    }


    public function detailSuratArsip($id_pengarsipan = null)
    {
        $data = array(
            'title' => 'Detail Surat Tanah',
            'arsip' => $this->m_pengarsipan->getDetailPengarsipan($id_pengarsipan),
            'isi'   => 'pengarsipan/v_detailPengarsipan'
        );
        $this->load->view('admin/v_admin', $data, FALSE);
    }
}

/* End of file Pengarsipan.php */