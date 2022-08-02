<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

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
}

/* End of file M_user.php */