<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('m_user');
    }

    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'user_regis'  => $this->m_user->get_user(),
            'isi'   => 'v_data_user'
        );
        $data['user'] = $this->db->get_where('tbl_user_regis', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/v_admin', $data, FALSE);
    }

    public function hapusUser($id_user_regis = null)
    {
        $data = [
            'id_user_regis' => $id_user_regis
        ];
        $this->m_user->delUser($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus!</div>');
        redirect('user/');
    }
}

/* End of file User.php */