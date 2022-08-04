<?php


defined('BASEPATH') or exit('No direct script access allowed');

class UnitTest extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test', 'form_validation');
        $this->load->model('m_jenis_surat');
    }

    public function get_data_dusun()
    {

        $this->db->select('*');
        $this->db->from('tbl_data_dusun');
        $this->db->order_by('id_data_dusun', 'desc');
        return $this->db->get()->result();
    }

    public function unitTest()
    {
        $fungsi_unit = $this->get_data_dusun();
        $hasil_test = $this->get_data_dusun();
        $ket_test = 'Unit Test Mengambil Data Dusun';
        echo $this->unit->run($fungsi_unit, $hasil_test, $ket_test);
    }
}