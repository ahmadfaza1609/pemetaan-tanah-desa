<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth/');
    } else {
        $role_id = $ci->session->userdata('role_id');

        $userAcces = $ci->db->get_where('tbl_user_regis', [
            'role_id' => $role_id,
        ]);

        if ($userAcces->num_rows() < 0) {
            redirect('auth/blocked');
        }
    }
}