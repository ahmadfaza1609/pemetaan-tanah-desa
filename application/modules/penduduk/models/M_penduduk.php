<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
    public function getPenduduk()
    {
        $this->db->select('
            tbl_penduduk.*,
            tbl_data_dusun.no_dusun,
            tbl_data_rw.no_rw,
            tbl_data_rt.no_rt
        ');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_penduduk.id_dusun');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->group_by('tbl_penduduk.id_penduduk');
        $this->db->order_by('id_penduduk', 'desc');
        return $this->db->get()->result();
    }

    public function getPendudukDetail($id_penduduk)
    {
        $this->db->select('*');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_penduduk.id_dusun');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->where('id_penduduk', $id_penduduk);
        return $this->db->get()->row();
    }

    public function addPenduduk($data)
    {
        $this->db->insert('tbl_penduduk', $data);
    }

    public function delPenduduk($data)
    {
        $this->db->delete('tbl_penduduk', $data);
    }

    public function updatePenduduk($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_penduduk');
        $this->db->where('id_penduduk', $data['id_penduduk']);
        $this->db->update('tbl_penduduk', $data);
    }
}

/* End of file ModelName.php */