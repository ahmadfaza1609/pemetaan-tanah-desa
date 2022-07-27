<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_data_rt extends CI_Model
{

    public function add_rt($data)
    {
        $this->db->insert('tbl_data_rt', $data);
    }

    public function get_data_rt()
    {
        $this->db->select('*');
        $this->db->from('tbl_data_rt');
        $this->db->order_by('id_data_rt', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_data_rt)
    {
        $this->db->select('*');
        $this->db->from('tbl_data_rt');
        $this->db->where('id_data_rt', $id_data_rt);
        return $this->db->get()->row();
    }

    public function delete($data)
    {
        $this->db->where('id_data_rt', $data['id_data_rt']);
        $this->db->delete('tbl_data_rt', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_data_rt', $data['id_data_rt']);
        $this->db->update('tbl_data_rt', $data);
    }
}

/* End of file M_data_rt.php */