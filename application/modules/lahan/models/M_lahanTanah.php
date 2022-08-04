<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_lahanTanah extends CI_Model
{

    public function getTanah()
    {
        $this->db->select('*');
        $this->db->from('tbl_lahan_warga');
        $this->db->order_by('id_lahan_warga', 'desc');
        return $this->db->get()->result();
    }

    public function getOneTanah($id_lahan_warga)
    {
        $this->db->select('*');
        $this->db->from('tbl_lahan_warga');
        $this->db->where('id_lahan_warga', $id_lahan_warga);
        return $this->db->get()->row();
    }

    public function addLahanTanah($data)
    {
        $this->db->insert('tbl_lahan_warga', $data);
    }

    public function getAllDataTanah()
    {
        $this->db->select('
            tbl_lahan_warga.id_lahan_warga,
            tbl_penduduk.nik,
            tbl_penduduk.nama,
            tbl_penduduk.alamat,
            tbl_lahan_warga.panjang,
            tbl_lahan_warga.lebar,
            tbl_lahan_warga.luas,
            tbl_lahan_warga.batas_barat,
            tbl_lahan_warga.batas_timur,
            tbl_lahan_warga.batas_utara,
            tbl_lahan_warga.batas_selatan,
            tbl_penduduk.id_rt,
            tbl_penduduk.id_rw,
            tbl_data_rt.no_rt,
            tbl_data_rw.no_rw,
        ');
        $this->db->from('tbl_lahan_warga');
        $this->db->join('tbl_penduduk', 'tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->group_by('tbl_lahan_warga.id_lahan_warga');
        $this->db->order_by('id_lahan_warga', 'desc');
        return $this->db->get()->result();
    }

    public function delLahanTanah($data)
    {
        $this->db->where('id_lahan_warga', $data['id_lahan_warga']);
        $this->db->delete('tbl_lahan_warga', $data);
    }

    public function updateDataTanah($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_lahan_warga');
        $this->db->where('id_lahan_warga', $data['id_lahan_warga']);
        $this->db->update('tbl_lahan_warga', $data);
    }
}

/* End of file M_lahanTanah.php */