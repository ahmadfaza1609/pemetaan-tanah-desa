<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{

    public function getTanahJoin()
    {
        $this->db->select('
            tbl_penduduk.*,
            tbl_lahan_warga.*,
            count(tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk) as total
        ');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_lahan_warga', 'tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk');
        $this->db->group_by('tbl_lahan_warga.id_lahan_warga');
        return $this->db->get()->result();
    }

    public function getJumlahLahan()
    {
        $this->db->select('*');
        $this->db->from('tbl_lahan_warga');
        return $this->db->get()->num_rows();
    }

    public function getJumlahPenduduk()
    {
        $this->db->select('*');
        $this->db->from('tbl_penduduk');
        return $this->db->get()->num_rows();
    }

    public function getJumlahSurat()
    {
        $this->db->select('*');
        $this->db->from('tbl_penduduk');
        return $this->db->get()->num_rows();
    }
}

/* End of file M_dashboard.php */