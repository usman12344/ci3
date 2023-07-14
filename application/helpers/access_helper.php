<?php

function is_logged_in()
{
    $ci3 = get_instance();
    if (!$ci3->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci3->session->userdata('role_id');
        $menu = $ci3->uri->segment(1);

        $queryMenu = $ci3->db->get_where('user_menu', ['menu' => $menu])->row_array();

        $menu_id = $queryMenu['id'];

        $Access = $ci3->db->get_where('user_access_menu', ['role_id' => $role_id, 'menu_id' => $menu_id]);

        if ($Access->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}