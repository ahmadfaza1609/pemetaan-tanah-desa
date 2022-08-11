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

    public function getDetailTanah($id_lahan_tanah)
    {
        $this->db->select('
            tbl_penduduk.nik,
            tbl_penduduk.nama,
            tbl_penduduk.alamat,
            tbl_penduduk.id_rt,
            tbl_penduduk.id_rw,
            tbl_penduduk.id_dusun,
            tbl_lahan_warga.panjang,
            tbl_lahan_warga.lebar,
            tbl_lahan_warga.luas,
            tbl_lahan_warga.denah_tanah,
            tbl_lahan_warga.warna_lahan,
            tbl_lahan_warga.file_gambar,
            tbl_lahan_warga.batas_barat,
            tbl_lahan_warga.batas_timur,
            tbl_lahan_warga.batas_selatan,
            tbl_lahan_warga.batas_utara,
            tbl_data_rt.no_rt,
            tbl_data_rw.no_rw,
            tbl_data_dusun.no_dusun,
        ');
        $this->db->from('tbl_lahan_warga');
        $this->db->join('tbl_penduduk', 'tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_penduduk.id_dusun');
        $this->db->where('tbl_lahan_warga.id_lahan_warga', $id_lahan_tanah);
        return $this->db->get()->row();
    }

    public function getTanahJoin()
    {
        $this->db->select('
            tbl_penduduk.*,
            tbl_lahan_warga.*
        ');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_lahan_warga', 'tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk');
        $this->db->group_by('tbl_lahan_warga.id_lahan_warga');
        return $this->db->get()->result_array();
    }
}

/* End of file M_lahanTanah.php */