<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->from('users');
        if($id)
        {
            $this->db->where('id_users', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->order_by('status', 'DESC');
        $this->db->order_by('created_at', 'DESC');
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama' => htmlspecialchars($data['nama']),
            'username' => htmlspecialchars(strtolower($data['username'])),
            'password' => sha1($data['password']),
            'level' => htmlspecialchars($data['level']),
            'status' => htmlspecialchars($data['status']),
            'no_hp' => htmlspecialchars($data['no_hp']),
            'alamat' => htmlspecialchars($data['alamat']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($data['image'] != null){
            $params['image'] = $data['image'];
        }
        $this->db->insert('users', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama' => htmlspecialchars($data['nama']),
            'username' => htmlspecialchars($data['username']),
            'level' => htmlspecialchars($data['level']),
            'status' => htmlspecialchars($data['status']),
            'no_hp' => htmlspecialchars($data['no_hp']),
            'alamat' => htmlspecialchars($data['alamat']),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        if($data['image'] != null){
            $params['image'] = $data['image'];
        }
        if(!empty($data['password'])){
            $params['password'] = sha1($data['password']);
        }
        $this->db->where('id_users', $data['id']);
        $this->db->update('users', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s'),
            'status' => 'inactive'
        );
        $this->db->where('id_users', $data['id']);
        $this->db->update('users', $params);
    }
}
?>