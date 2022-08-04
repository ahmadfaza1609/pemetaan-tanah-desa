<?php


defined('BASEPATH') or exit('No direct script access allowed');

class UnitTest extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('unit_test');
        // $this->load->model('m_lahan');
    }

    public function get_user()
    {
        $this->db->select('
            tbl_user_regis.nama,
            tbl_user_regis.email,
            tbl_user_regis.role_id,
            tbl_user_regis.user_aktif,
            tbl_user_regis.date_created, 
            tbl_user_role.role
        ');
        $this->db->from('tbl_user_regis');
        $this->db->join('tbl_user_role', 'tbl_user_role.id_role_user = tbl_user_regis.role_id');
        $this->db->group_by('tbl_user_regis.id_user_regis');
        $this->db->order_by('id_user_regis', 'desc');
        return $this->db->get()->result();
    }

    public function unitTest()
    {
        $fungsi_unit = $this->get_user();
        $hasil_test = $this->get_user();
        $ket_test = 'Unit Test Mengambil Data User';
        echo $this->unit->run($fungsi_unit, $hasil_test, $ket_test);
    }
}