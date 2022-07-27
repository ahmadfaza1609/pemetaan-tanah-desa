<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    public function get_user($id_user_regis)
    {
        $this->db->select('*');
        $this->db->from('tbl_user_regis');
        $this->db->where('id_user_regis', $id_user_regis);
        return $this->db->get()->row();
    }
}

/* End of file M_admin.php */