<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lahan extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->library('form_validation');
        $this->load->model('m_lahan');
    }

    // List all your items
    public function index()
    {
        $data = array(
            'title' => 'Data Lahan',
            'lahan' => $this->m_lahan->get_all_data(),
            'isi'   => 'v_data'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }


    // Add a new item
    public function add()
    {
        // proteksi halaman
        // $this->user_login->protek_halaman();

        // form validation
        $this->form_validation->set_rules('nama_lahan', 'Nama Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('isi_lahan', 'Isi Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('pemilik_lahan', 'Pemilik Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('alamat_pemilik', 'Alamat Pemilik', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('denah_geojson', 'Denah GeoJSON', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('warna_lahan', 'Warna Lahan', 'required|trim', ['required' => '%s harus di isi !!']);
        $this->form_validation->set_rules('luas_lahan', 'Luas Lahan', 'required|trim', ['required' => '%s harus di isi !!']);


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 5000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Input Data Lahan',
                    'error_upload' => $this->upload->display_errors(),
                    'isi'   => 'v_add'
                );

                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];

                $this->load->library('image_lib', $config);

                $data = array(
                    'nama_lahan'        => $this->input->post('nama_lahan'),
                    'pemilik_lahan'     => $this->input->post('pemilik_lahan'),
                    'isi_lahan'         => $this->input->post('isi_lahan'),
                    'denah_geojson'     => $this->input->post('denah_geojson'),
                    'alamat_pemilik'    => $this->input->post('alamat_pemilik'),
                    'warna_lahan'       => $this->input->post('warna_lahan'),
                    'gambar'            => $upload_data['uploads']['file_name'],
                    'luas_lahan'        => $this->input->post('luas_lahan')
                );
                $this->m_lahan->add($data);
                $this->session->set_flashdata('sukses', 'Data Berhasil disimpan !!');
                redirect('lahan/');
            }
        }
        $data = array(
            'title' => 'Input Data Lahan',
            'isi'   => 'v_add'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    //Update one item
    public function edit($id_lahan = null)
    {
        // $this->user_login->protek_halaman();

        $this->form_validation->set_rules('nama_lahan', 'Nama Lahan', 'required', array('required' => '%s harus di isi !!'));
        $this->form_validation->set_rules('isi_lahan', 'Isi Lahan', 'required', array('required' => '%s harus di isi !!'));
        $this->form_validation->set_rules('pemilik_lahan', 'Pemilik Lahan', 'required', array('required' => '%s harus di isi !!'));
        $this->form_validation->set_rules('alamat_pemilik', 'Alamat Pemilik', 'required', array('required' => '%s harus di isi !!'));
        $this->form_validation->set_rules('denah_geojson', 'Denah GeoJSON', 'required', array('required' => '%s harus di isi !!'));
        $this->form_validation->set_rules('warna_lahan', 'Warna Lahan', 'required', array('required' => '%s harus di isi !!'));
        $this->form_validation->set_rules('luas_lahan', 'Luas Lahan', 'required', array('required' => '%s harus di isi !!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './gambar/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 5000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('gambar')) {
                $data = array(
                    'title' => 'Edit Data Lahan',
                    'error_upload' => $this->upload->display_errors(),
                    'lahan' => $this->m_lahan->detail($id_lahan),
                    'isi'   => 'v_edit'
                );

                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                // perubahan foto
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];

                $this->load->library('image_lib', $config);

                $data = array(
                    'id_lahan'          => $id_lahan,
                    'nama_lahan'        => $this->input->post('nama_lahan'),
                    'pemilik_lahan'     => $this->input->post('pemilik_lahan'),
                    'isi_lahan'         => $this->input->post('isi_lahan'),
                    'denah_geojson'     => $this->input->post('denah_geojson'),
                    'alamat_pemilik'    => $this->input->post('alamat_pemilik'),
                    'warna_lahan'       => $this->input->post('warna_lahan'),
                    'gambar'            => $upload_data['uploads']['file_name'],
                    'luas_lahan'        => $this->input->post('luas_lahan')
                );
                $this->m_lahan->edit($data);
                $this->session->set_flashdata('sukses', 'Data Berhasil diedit !!');
                redirect('lahan/');
            }
            // foto tidak diganti
            $data = array(
                'id_lahan'          => $id_lahan,
                'nama_lahan'        => $this->input->post('nama_lahan'),
                'pemilik_lahan'     => $this->input->post('pemilik_lahan'),
                'isi_lahan'         => $this->input->post('isi_lahan'),
                'denah_geojson'     => $this->input->post('denah_geojson'),
                'alamat_pemilik'    => $this->input->post('alamat_pemilik'),
                'warna_lahan'       => $this->input->post('warna_lahan'),
                'luas_lahan'        => $this->input->post('luas_lahan')
            );
            $this->m_lahan->edit($data);
            $this->session->set_flashdata('sukses', 'Data Berhasil diedit !!');
            redirect('lahan');
        }
        $data = array(
            'title' => 'Edit Data Lahan',
            'lahan' => $this->m_lahan->detail($id_lahan),
            'isi'   => 'v_edit'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    //Delete one item
    public function delete($id_lahan)
    {
        $data = array('id_lahan' => $id_lahan);
        $this->m_lahan->delete($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil dihapus !!');
        redirect('lahan');
    }

    // galeri foto lahan
    public function galeri()
    {
        $data = array(
            'title' => 'Galeri Foto',
            'galeri' => $this->m_lahan->get_all_galeri(),
            'isi'   => 'v_galeri'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }


    // tambah fotos
    public function add_foto($id_lahan = null)
    {
        // $this->user_login->protek_halaman();

        $this->form_validation->set_rules('ket', 'Keterangan', 'required', array('required' => '%s harus di isi !!'));


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path']          = './foto/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 5000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $data = array(
                    'title' => 'Galeri Foto Lahan',
                    'lahan' => $this->m_lahan->detail($id_lahan),
                    'foto' => $this->m_lahan->detail_galeri($id_lahan),
                    'error_upload' => $this->upload->display_errors(),
                    'isi'   => 'v_add_foto'
                );

                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto/' . $upload_data['uploads']['file_name'];

                $this->load->library('image_lib', $config);

                $data = array(
                    'id_lahan' => $id_lahan,
                    'ket'     => $this->input->post('ket'),
                    'foto'    => $upload_data['uploads']['file_name']
                );
                $this->m_lahan->add_foto($data);
                $this->session->set_flashdata('sukses', 'Foto berhasil ditambahkan !!');
                redirect('lahan/add_foto/' . $id_lahan);
            }
        }

        $data = array(
            'title' => 'Galeri Foto',
            'lahan' => $this->m_lahan->detail($id_lahan),
            'foto' => $this->m_lahan->detail_galeri($id_lahan),
            'isi'   => 'v_add_foto'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    // delete foto
    public function delete_foto($id_lahan, $id_galeri_lahan)
    {

        // $this->user_login->protek_halaman();

        $data = array(
            'id_galeri_lahan' => $id_galeri_lahan
        );
        $this->m_lahan->delete_foto($data);
        $this->session->set_flashdata('sukses', 'Data Berhasil dihapus !!');
        redirect('lahan/add_foto/' . $id_lahan);
    }


    public function galeri_lahan()
    {
        $data = array(
            'title' => 'Galeri Lahan',
            'galeri' => $this->m_lahan->get_all_galeri(),
            'isi'   => 'v_galeri_lahan'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function view_galeri($id_lahan = null)
    {
        $data = array(
            'title' => 'Galeri Foto',
            'lahan' => $this->m_lahan->detail($id_lahan),
            'foto' => $this->m_lahan->detail_galeri($id_lahan),
            'isi'   => 'v_view_galeri'
        );

        $this->load->view('admin/v_admin', $data, FALSE);
    }
}

/* End of file Controllername.php */