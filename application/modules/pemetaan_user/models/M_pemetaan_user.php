<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pemetaan_user extends CI_Model
{

    public function get_data()
    {
        $this->db->select('
            tbl_penduduk.*,
            tbl_lahan_warga.*,
            tbl_pengarsipan.*,
            tbl_jenis_surat.nama_surat,
            tbl_data_rt.no_rt,
            tbl_data_rw.no_rw,
            tbl_data_dusun.no_dusun
        ');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_lahan_warga', 'tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk');
        $this->db->join('tbl_pengarsipan', 'tbl_penduduk.id_penduduk = tbl_pengarsipan.id_penduduk');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_penduduk.id_dusun');
        $this->db->join('tbl_jenis_surat', 'tbl_jenis_surat.id_jenis_surat = tbl_pengarsipan.id_jenis_surat');
        $this->db->group_by('tbl_penduduk.id_penduduk', 'tbl_lahan_warga.id_lahan_warga', 'tbl_pengarsipan.id_pengarsipan');
        $this->db->order_by('tbl_penduduk.id_penduduk', 'desc');
        return $this->db->get()->result();
    }

    public function cari($berdasarkan, $yangdicari)
    {
        $this->db->select('
            tbl_penduduk.nik,
            tbl_penduduk.nama,
            tbl_penduduk.alamat,
            tbl_lahan_warga.id_lahan_warga,
            tbl_lahan_warga.panjang,
            tbl_lahan_warga.lebar,
            tbl_lahan_warga.luas,
            tbl_lahan_warga.denah_tanah,
            tbl_lahan_warga.warna_lahan,
            tbl_lahan_warga.batas_barat,
            tbl_lahan_warga.batas_timur,
            tbl_lahan_warga.batas_utara,
            tbl_lahan_warga.batas_selatan,
            tbl_pengarsipan.file_surat,
            tbl_pengarsipan.ket,
            tbl_jenis_surat.nama_surat,
            tbl_data_rt.no_rt,
            tbl_data_rw.no_rw,
            tbl_data_dusun.no_dusun
        ');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_lahan_warga', 'tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk');
        $this->db->join('tbl_pengarsipan', 'tbl_penduduk.id_penduduk = tbl_pengarsipan.id_penduduk');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_penduduk.id_dusun');
        $this->db->join('tbl_jenis_surat', 'tbl_jenis_surat.id_jenis_surat = tbl_pengarsipan.id_jenis_surat');

        $this->db->group_by('tbl_penduduk.id_penduduk', 'tbl_lahan_warga.id_lahan_warga', 'tbl_pengarsipan.id_pengarsipan');
        switch ($berdasarkan) {
            case "":
                $this->db->like('nik', $yangdicari);
                $this->db->or_like('nama', $yangdicari);
                break;

            default:
                $this->db->like($berdasarkan, $yangdicari);
        }
        return $this->db->get();
    }

    public function detailUserLahan($id_lahan_user)
    {
        $this->db->select('
            tbl_penduduk.*,
            tbl_lahan_warga.*,
            tbl_pengarsipan.*,
            tbl_data_rt.no_rt,
            tbl_data_rw.no_rw,
            tbl_data_dusun.no_dusun,
            tbl_jenis_surat.nama_surat
        ');
        $this->db->from('tbl_lahan_warga');
        $this->db->join('tbl_penduduk', 'tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_penduduk.id_dusun');
        $this->db->join('tbl_pengarsipan', 'tbl_pengarsipan.id_pengarsipan = tbl_pengarsipan.id_penduduk');
        $this->db->join('tbl_jenis_surat', 'tbl_jenis_surat.id_jenis_surat = tbl_pengarsipan.id_jenis_surat');
        $this->db->where('tbl_lahan_warga.id_lahan_warga', $id_lahan_user);
        // var_dump($this->db->get()->row());
        // die();
        return $this->db->get()->row();
    }
}

/* End of file M_pemetaan_user.php */