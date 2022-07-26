<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_auth extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function add_register($data)
    {
        $this->db->insert('tbl_user_regis', $data);
    }
}

/* End of file Controllername.php */