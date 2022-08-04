<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pengarsipan extends CI_Model
{

    public function getPengarsipan()
    {
        $this->db->select('
            tbl_pengarsipan.*,
            tbl_penduduk.nik,
            tbl_penduduk.nama,
            tbl_penduduk.alamat,
            tbl_jenis_surat.nama_surat,
            tbl_data_rt.no_rt,
            tbl_data_rw.no_rw,
            tbl_data_dusun.no_dusun,
        ');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_pengarsipan', 'tbl_penduduk.id_penduduk = tbl_pengarsipan.id_penduduk');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_penduduk.id_dusun');
        $this->db->join('tbl_jenis_surat', 'tbl_jenis_surat.id_jenis_surat = tbl_pengarsipan.id_jenis_surat');
        $this->db->group_by('tbl_pengarsipan.id_pengarsipan');
        $this->db->order_by('id_pengarsipan', 'desc');
        return $this->db->get()->result();
    }

    public function addPengarsipan($data)
    {
        $this->db->insert('tbl_pengarsipan', $data);
    }

    public function updatePengarsipan($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_pengarsipan');
        $this->db->where('id_pengarsipan', $data['id_pengarsipan']);
        $this->db->update('tbl_pengarsipan', $data);
    }

    public function getPengarsipanId($id_pengarsipan)
    {
        $this->db->select('*');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_pengarsipan', 'tbl_penduduk.id_penduduk = tbl_pengarsipan.id_penduduk', 'left');
        $this->db->join('tbl_jenis_surat', 'tbl_jenis_surat.id_jenis_surat = tbl_pengarsipan.id_jenis_surat', 'left');
        $this->db->where('id_pengarsipan', $id_pengarsipan);
        return $this->db->get()->row();
    }

    public function deletePengarsipan($data)
    {
        $this->db->delete('tbl_pengarsipan', $data);
    }

    public function getDetailPengarsipan($id_pengarsipan)
    {
        $this->db->select('
            tbl_pengarsipan.*,
            tbl_penduduk.nik,
            tbl_penduduk.nama,
            tbl_penduduk.alamat,
            tbl_jenis_surat.nama_surat,
            tbl_data_rt.no_rt,
            tbl_data_rw.no_rw,
            tbl_data_dusun.no_dusun,
        ');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_pengarsipan', 'tbl_penduduk.id_penduduk = tbl_pengarsipan.id_penduduk');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_penduduk.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_penduduk.id_rw');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_penduduk.id_dusun');
        $this->db->join('tbl_jenis_surat', 'tbl_jenis_surat.id_jenis_surat = tbl_pengarsipan.id_jenis_surat');
        $this->db->where('id_pengarsipan', $id_pengarsipan);
        return $this->db->get()->row();
    }
}

/* End of file M_pengarsipan.php */