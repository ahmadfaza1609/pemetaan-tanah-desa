<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_data_rw extends CI_Model
{

    public function add_rw($data)
    {
        $this->db->insert('tbl_data_rw', $data);
    }

    public function get_data_rw()
    {
        $this->db->select('*');
        $this->db->from('tbl_data_rw');
        $this->db->order_by('id_data_rw', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_data_rw)
    {
        $this->db->select('*');
        $this->db->from('tbl_data_rw');
        $this->db->where('id_data_rw', $id_data_rw);
        return $this->db->get()->row();
    }

    public function delete($data)
    {
        $this->db->where('id_data_rw', $data['id_data_rw']);
        $this->db->delete('tbl_data_rw', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_data_rw', $data['id_data_rw']);
        $this->db->update('tbl_data_rw', $data);
    }
}

/* End of file M_data_rt.php */