<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_surat extends CI_Model
{

    public function add_jenis($data)
    {
        $this->db->insert('tbl_jenis_surat', $data);
    }

    public function getJenisSurat()
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_surat');
        $this->db->order_by('id_jenis_surat', 'desc');
        return $this->db->get()->result();
    }

    public function detail($id_jenis_surat)
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_surat');
        $this->db->where('id_jenis_surat', $id_jenis_surat);
        return $this->db->get()->row();
    }

    public function delete($data)
    {
        $this->db->delete('tbl_jenis_surat', $data);
    }

    public function edit($data)
    {
        $this->db->where('id_jenis_surat', $data['id_jenis_surat']);
        $this->db->update('tbl_jenis_surat', $data);
    }

    public function pdf($data)
    {
        $this->db->insert('tbl_arsip', $data);
    }
}

/* End of file M_data_rt.php */