<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function cek_data($pos)
    {
        $this->db->from('users');
        $this->db->where('username', strtolower($pos['username']));
        $this->db->where('password', sha1($pos['password']));
        $this->db->where('deleted_at', null);
        $data = $this->db->get();
        return $data;
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama' => htmlspecialchars($data['nama']),
            'username' => htmlspecialchars(strtolower($data['username'])),
            'password' => sha1($data['password']),
            'level' => "user",
            'status' => "pending",
            'no_hp' => htmlspecialchars($data['no_hp']),
            'alamat' => htmlspecialchars($data['alamat']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($data['image'] != null){
            $params['image'] = $data['image'];
        }
        $this->db->insert('users', $params);
    }

    public function get($id = null)
    {
        $this->db->from('users');
        if($id)
        {
            $this->db->where('id_users', $id);
        }
        $this->db->where('deleted_at', null);
        $data = $this->db->get();
        return $data;
    }
}

?>