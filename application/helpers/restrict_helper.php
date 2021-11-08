<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('level')) {
        redirect('login');
    } else
    if ($ci->session->userdata('level') != 1) {
        redirect('login');
    }
}

function organtri_check()
{
    $ci = get_instance();
    if (!$ci->session->userdata('level')) {
        redirect('login');
    } else
    if ($ci->session->userdata('level') != 4) {
        redirect('login');
    }
}
function pengasuhan_check()
{
    $ci = get_instance();
    if (!$ci->session->userdata('level')) {
        redirect('login');
    } else
    if ($ci->session->userdata('level') != 2) {
        redirect('login');
    }
}
function pengajar_check()
{
    $ci = get_instance();
    if (!$ci->session->userdata('level')) {
        redirect('login');
    } else
    if ($ci->session->userdata('level') != 3) {
        redirect('login');
    }
}