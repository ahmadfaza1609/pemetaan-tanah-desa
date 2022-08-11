<?php


defined('BASEPATH') or exit('No direct script access allowed');

class LahanJumlah extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_lahanJumlah');
        $this->load->model('m_lahanTanah');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Kumpulan Jumlah Tanah Warga',
            'jumlah_tanah'  => $this->m_lahanJumlah->getJumWarga(),
            'isi'           => 'lahan/v_detailJumlahLahan'
        );
        // $data = json_encode($data, true);
        // var_dump($data);
        // die();
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function tambahTanahWarga($id_lahan_warga = null)
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
                    'jumlah_tanah'  => $this->m_lahanJumlah->getTanahPem($id_lahan_warga),
                    'isi'           => 'lahan/v_tanahWarga'
                );
                $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('admin/v_admin', $data, FALSE);
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar/' . $upload_data['uploads']['file_name'];

                $this->load->library('image_lib', $config);

                $data = array(
                    'id_penduduk'   => $id_lahan_warga,
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
                $this->m_lahanJumlah->tambahLahanWarga($data);
                $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert">Data Berhasil Di Ditambah!</div>');
                redirect('lahan/LahanJumlah/');
            }
        }
        $data = array(
            'title' => 'Tambah Tanah Lahan',
            'jumlah_tanah'  => $this->m_lahanJumlah->getTanahPem($id_lahan_warga),
            'isi'   => 'v_tanahWarga'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('admin/v_admin', $data, FALSE);
    }
}

/* End of file LahanJumlah.php */