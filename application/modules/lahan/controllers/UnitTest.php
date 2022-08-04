<?php


defined('BASEPATH') or exit('No direct script access allowed');

class UnitTest extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('m_lahan');
    }

    public function add_foto()
    {
        $data = array(
            'ket' => '',
            'foto' => ''
        );
        $this->db->insert('tbl_galeri_lahan', $data);
    }

    public function unitTest()
    {
        $fungsi_unit = $this->add_foto();
        $hasil_test = $this->add_foto();
        $ket_test = 'Unit Test Tambah Foto Lahan';
        echo $this->unit->run($fungsi_unit, $hasil_test, $ket_test);
    }
}