<?php

class CheckUsers
{
    protected $ci;

    function __construct()
    {
        $this->ci =& get_instance();
    }

    function users_login()
    {
        $this->ci->load->model('Auth/Auth_model', 'auth_m');
        $id_users = $this->ci->session->userdata('id_users');
        $data = $this->ci->auth_m->get($id_users)->row();
        return $data;
    }
}
?>