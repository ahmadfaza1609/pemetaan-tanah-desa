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

    // upload pdf
    public function get_data_rt()
    {

        $this->db->select('*');
        $this->db->from('tbl_data_rt');
        $this->db->order_by('id_data_rt', 'desc');
        return $this->db->get()->result();
    }

    public function get_data_rw()
    {

        $this->db->select('*');
        $this->db->from('tbl_data_rw');
        $this->db->order_by('id_data_rw', 'desc');
        return $this->db->get()->result();
    }

    public function get_data_dusun()
    {

        $this->db->select('*');
        $this->db->from('tbl_data_dusun');
        $this->db->order_by('id_data_dusun', 'desc');
        return $this->db->get()->result();
    }

    public function get_arsip()
    {
        $this->db->select('
            tbl_arsip.id_arsip, 
            tbl_arsip.nama, 
            tbl_arsip.nik, 
            tbl_arsip.alamat, 
            tbl_arsip.id_jenis_surat, 
            tbl_arsip.id_rt, 
            tbl_arsip.id_rw, 
            tbl_arsip.id_dusun,
            tbl_arsip.file_arsip,
            tbl_arsip.alamat,
            tbl_jenis_surat.nama_surat,
            tbl_data_dusun.no_dusun,
            tbl_data_rw.no_rw,
            tbl_data_rt.no_rt
        ');
        $this->db->from('tbl_jenis_surat');
        $this->db->join('tbl_arsip', 'tbl_jenis_surat.id_jenis_surat = tbl_arsip.id_jenis_surat');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_arsip.id_dusun');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_arsip.id_rw');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt = tbl_arsip.id_rt');
        $this->db->group_by('tbl_arsip.id_arsip');
        $this->db->order_by('id_arsip', 'desc');
        return $this->db->get()->result();
    }

    public function pdf($data)
    {
        $this->db->insert('tbl_arsip', $data);
    }

    public function delete_arsip($data)
    {
        $this->db->delete('tbl_arsip', $data);
    }

    public function get_detail_arsip($id_arsip)
    {
        $this->db->select('*');
        $this->db->from('tbl_arsip');
        $this->db->join('tbl_jenis_surat', 'tbl_jenis_surat.id_jenis_surat = tbl_arsip.id_jenis_surat');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_arsip.id_dusun');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt=tbl_arsip.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_arsip.id_rw');
        $this->db->where('id_arsip', $id_arsip);
        return $this->db->get()->row();
    }

    public function arsip_edit($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_arsip');
        $this->db->join('tbl_jenis_surat', 'tbl_jenis_surat.id_jenis_surat = tbl_arsip.id_jenis_surat');
        $this->db->join('tbl_data_dusun', 'tbl_data_dusun.id_data_dusun = tbl_arsip.id_dusun');
        $this->db->join('tbl_data_rt', 'tbl_data_rt.id_data_rt=tbl_arsip.id_rt');
        $this->db->join('tbl_data_rw', 'tbl_data_rw.id_data_rw = tbl_arsip.id_rw');
        $this->db->where('id_arsip', $data['id_arsip']);
        $this->db->where('id_data_rt', $data['id_data_rt']);
        $this->db->where('id_data_rw', $data['id_data_rw']);
        $this->db->update('tbl_arsip', $data);
    }
}

/* End of file M_data_rt.php */