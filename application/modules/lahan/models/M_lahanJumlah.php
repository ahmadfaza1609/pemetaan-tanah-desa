<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_lahanJumlah extends CI_Model
{
    public function getJumWarga()
    {
        $this->db->select('
            tbl_penduduk.id_penduduk,
            tbl_penduduk.nik,
            tbl_penduduk.nama,
            tbl_lahan_warga.*,
            count(tbl_penduduk.id_penduduk = tbl_lahan_warga.id_penduduk) as total_tanah
        ');
        $this->db->from('tbl_penduduk');
        $this->db->join('tbl_lahan_warga', 'tbl_lahan_warga.id_penduduk = tbl_penduduk.id_penduduk');
        $this->db->group_by('tbl_lahan_warga.id_penduduk');
        $this->db->order_by('id_lahan_warga',);
        return $this->db->get()->result();
    }

    // public function get_all_galeri()
    // {
    //     $this->db->select('
    //         tbl_lahan.*,
    //         count(tbl_galeri_lahan.id_lahan = tbl_lahan.id_lahan) as total_foto
    //     ');
    //     $this->db->from('tbl_lahan');
    //     $this->db->join('tbl_galeri_lahan', 'tbl_galeri_lahan.id_lahan = tbl_lahan.id_lahan', 'left');
    //     $this->db->group_by('tbl_lahan.id_lahan');
    //     $this->db->order_by('id_lahan');
    //     return $this->db->get()->result();
    // }


    public function getTanahPem($id_lahan_warga)
    {
        $this->db->select('*');
        $this->db->from('tbl_lahan_warga');
        $this->db->where('tbl_lahan_warga.id_lahan_warga', $id_lahan_warga);
        return $this->db->get()->row();
    }

    public function tambahLahanWarga($data)
    {
        $this->db->insert('tbl_lahan_warga', $data);
    }
}

/* End of file ModelName.php */