<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemetaan_user extends MX_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Pemetaan Desa Bantan Tengah',
            'isi' => 'halaman_index'
        );
        $this->load->view('pemetaan_user/request_halaman', $data, FALSE);
    }
}

/* End of file Front_end.php */