<?php

function is_logged_in()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        redirect('login');
    } else {
        $username = $ci->session->userdata('username');
        $queryUser = $ci->db->get_where('user', ['username' => $username])->row_array();
        var_dump($queryUser);
        die;
    }
}
