<?php

function sudah_login()
{
    $ci =& get_instance();
    $session = $ci->session->userdata('id_users');
    if($session){
        $ci->session->set_flashdata('warning', 'Anda Sudah Login!! Jika Ingin Logout Silahkan Cari Tombol Logout!!');
        redirect('dashboard');
    }
}

function belum_login()
{
    $ci =& get_instance();
    $session = $ci->session->userdata('id_users');
    if(!$session)
    {
        $ci->session->set_flashdata('warning', 'Anda Belum Login!! Silahkan Login Terlebih Dahulu!');
        redirect('auth');
    }
    // elseif()
}

function not_user()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level == 'user'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda User');
        redirect('dashboard');
    }
}

function not_gudang()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level == 'gudang'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda Gudang');
        redirect('dashboard');
    }
}

function not_admin()
{
    $ci =& get_instance();
    $ci->load->library('checkusers');
    if($ci->checkusers->users_login()->level == 'admin'){
        $ci->session->set_flashdata('warning', 'Maaf, Rules Anda Admin');
        redirect('dashboard');
    }
}

?>