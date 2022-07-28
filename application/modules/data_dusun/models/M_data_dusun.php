<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_data_dusun extends CI_Model
{

    public function add_dusun($data)
    {
        $this->db->insert('tbl_data_dusun', $data);
    }

    public function getDataDusun()
    {
        $this->db->select('*');
        $this->db->from('tbl_data_dusun');
        $this->db->order_by('id_data_dusun', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_data_dusun)
    {
        $this->db->select('*');
        $this->db->from('tbl_data_dusun');
        $this->db->where('id_data_dusun', $id_data_dusun);
        return $this->db->get()->row();
    }

    public function delete($data)
    {
        $this->db->where('id_data_dusun', $data['id_data_dusun']);
        $this->db->delete('tbl_data_dusun', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_data_dusun', $data['id_data_dusun']);
        $this->db->update('tbl_data_dusun', $data);
    }
}

/* End of file M_data_rt.php */