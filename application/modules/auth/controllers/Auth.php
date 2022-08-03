<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_auth');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email wajib diisi!!!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password wajib diisi!!!'
        ]);
        if ($this->form_validation->run() == FALSE) {

            $data = array(
                'auth'   => 'v_login'
            );
            $this->load->view('auth/v_auth_user', $data, FALSE);
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_user_regis', [
            'email' => $email
        ])->row_array();

        // user ada
        if ($user) {
            // user aktif
            if ($user['user_aktif']) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']

                    ];

                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum diaktivasikan!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }


    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|min_length[1]', [
            'required' => '%s wajib di isi !!!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user_regis.email]', [
            'required' => 'Email wajib di isi !!!',
            'valid_email' => 'Email tidak valid masukkan email yang benar ',
            'is_unique' => 'Email sudah terdaftar',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password tidak sama',
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]', [
            'matches' => 'Password tidak sama'
        ]);

        if ($this->form_validation->run() == false) {

            $data = array(
                'auth'   => 'v_register'
            );
            $this->load->view('auth/v_auth_user', $data, FALSE);
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars(
                    $this->input->post('email', true)
                ),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'foto' => 'default.jpg',
                'role_id' => 2,
                'user_aktif' => 1,
                'date_created' => time(),
            ];

            $this->m_auth->add_register($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mendaftar!</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil logout!</div>');
        redirect('auth');
    }
}

/* End of file Auth.php */