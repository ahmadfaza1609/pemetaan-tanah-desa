<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LahanTanah extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('m_lahanTanah');
        $this->load->model('penduduk/m_penduduk');
        $this->load->model('dashboard/m_dashboard');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Pertanahan Desa',
            'lahan_warga'   => $this->m_lahanTanah->getAllDataTanah(),
            'isi'           => 'lahan/v_pertanahan'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function tambahTanah()
    {
        // form validation
        $this->form_validation->set_rules('panjang', 'Panjang Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('lebar', 'Lebar Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('luas', 'Luas Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('warna_lahan', 'Warna Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('denah_tanah', 'Denah Tanah', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('batas_barat', 'Batas Barat', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('batas_selatan', 'Batas Selatan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('batas_utara', 'Batas Utara', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('batas_timur', 'Batas Timur', 'required|trim', ['required' => '%s harus di isi !!']);


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'jpeg|jpg|png|gif';
            $config['max_size']             = 5000;
            $config['encrypt_name']         = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_gambar')) {
                $data = array(
                    'title' => 'Tambah Tanah Lahan',
                    'lahan'         => $this->m_dashboard->getTanahJoin(),
                    'penduduk' => $this->m_penduduk->getPenduduk(),
                    'error_upload' => $this->upload->display_errors(),
                    'isi'   => 'lahan/v_tambahTanah'
                );

                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];

                $this->load->library('image_lib', $config);

                $data = array(
                    'id_penduduk'   => $this->input->post('id_penduduk'),
                    'panjang'       => $this->input->post('panjang'),
                    'lebar'         => $this->input->post('lebar'),
                    'luas'          => $this->input->post('luas'),
                    'warna_lahan'   => $this->input->post('warna_lahan'),
                    'denah_tanah'   => $this->input->post('denah_tanah'),
                    'file_gambar'   => $upload_data['uploads']['file_name'],
                    'batas_barat'   => $this->input->post('batas_barat'),
                    'batas_selatan' => $this->input->post('batas_selatan'),
                    'batas_utara'   => $this->input->post('batas_utara'),
                    'batas_timur'   => $this->input->post('batas_timur')
                );
                $this->m_lahanTanah->addLahanTanah($data);
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Data Berhasil Di Ditambah!</div>');
                redirect('lahan/LahanTanah/');
            }
        }
        $data = array(
            'title' => 'Tambah Tanah Lahan',
            'lahan'         => $this->m_dashboard->getTanahJoin(),
            'penduduk' => $this->m_penduduk->getPenduduk(),
            'error_upload' => $this->upload->display_errors(),
            'isi'   => 'lahan/v_tambahTanah'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function hapusLahanTanah($id_lahan_warga = null)
    {
        $data = array(
            'id_lahan_warga' => $id_lahan_warga
        );
        $this->m_lahanTanah->delLahanTanah($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil dihapus');
        redirect('lahan/LahanTanah');
    }

    public function ubahLahanTanah($id_lahan_warga = null)
    {
        // form validation
        $this->form_validation->set_rules('panjang', 'Panjang Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('lebar', 'Lebar Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('luas', 'Luas Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('warna_lahan', 'Warna Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('denah_tanah', 'Denah Tanah', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('batas_barat', 'Batas Barat', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('batas_selatan', 'Batas Selatan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('batas_utara', 'Batas Utara', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('batas_timur', 'Batas Timur', 'required|trim', ['required' => '%s harus di isi !!']);


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 5000;
            $config['encrypt_name']         = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file_gambar')) {
                $data = array(
                    'title'         => 'Tambah Tanah Lahan',
                    'error_upload'  => $this->upload->display_errors(),
                    'lahan'         => $this->m_dashboard->getTanahJoin(),
                    'penduduk'      => $this->m_penduduk->getPenduduk($id_lahan_warga),
                    'tanah_warga'   => $this->m_lahanTanah->getOneTanah($id_lahan_warga),
                    'isi'           => 'lahan/v_editTanah'
                );
                $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];

                $this->load->library('image_lib', $config);

                $data = array(
                    'id_lahan_warga' => $id_lahan_warga,
                    'id_penduduk'   => $this->input->post('id_penduduk'),
                    'panjang'       => $this->input->post('panjang'),
                    'lebar'         => $this->input->post('lebar'),
                    'luas'          => $this->input->post('luas'),
                    'warna_lahan'   => $this->input->post('warna_lahan'),
                    'denah_tanah'   => $this->input->post('denah_tanah'),
                    'file_gambar'   => $upload_data['uploads']['file_name'],
                    'batas_barat'   => $this->input->post('batas_barat'),
                    'batas_selatan' => $this->input->post('batas_selatan'),
                    'batas_utara'   => $this->input->post('batas_utara'),
                    'batas_timur'   => $this->input->post('batas_timur')
                );
                $this->m_lahanTanah->updateDataTanah($data);
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Data Berhasil Di ubah!</div>');
                redirect('lahan/LahanTanah/');
            }
            $this->_noEdit($id_lahan_warga);
        }
        $data = array(
            'title'         => 'Edit Tanah Lahan',
            'lahan'         => $this->m_dashboard->getTanahJoin(),
            'penduduk'      => $this->m_penduduk->getPenduduk($id_lahan_warga),
            'tanah_warga'   => $this->m_lahanTanah->getOneTanah($id_lahan_warga),
            'isi'           => 'lahan/v_editTanah'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    private function _noEdit($id_lahan_warga)
    {
        $data = array(
            'id_lahan_warga' => $id_lahan_warga,
            'id_penduduk'   => $this->input->post('id_penduduk'),
            'panjang'       => $this->input->post('panjang'),
            'lebar'         => $this->input->post('lebar'),
            'luas'          => $this->input->post('luas'),
            'warna_lahan'   => $this->input->post('warna_lahan'),
            'denah_tanah'   => $this->input->post('denah_tanah'),
            'batas_barat'   => $this->input->post('batas_barat'),
            'batas_selatan' => $this->input->post('batas_selatan'),
            'batas_utara'   => $this->input->post('batas_utara'),
            'batas_timur'   => $this->input->post('batas_timur')
        );
        $this->m_lahanTanah->updateDataTanah($data);
        $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Data Berhasil Di ubah!</div>');
        redirect('lahan/LahanTanah/');
    }

    public function detailLahanTanah($id_detail_tanah = null)
    {
        $data = array(
            'title'         => 'Detail Lahan Tanah',
            'detail_tanah'  => $this->m_lahanTanah->getDetailTanah($id_detail_tanah),
            'isi'           => 'lahan/v_detailLahanTanah',
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/v_admin', $data, FALSE);
    }
}

/* End of file LahanTanah.php */