<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileUsers_model extends CI_Model
{
    public function getData($id = null)
    {
        $id = $this->checkusers->users_login()->id_users;
        $this->db->from('users');
        if($id)
        {
            $this->db->where('id_users', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('id_users', $id);
        return $this->db->get();
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama' => htmlspecialchars($data['nama']),
            'username' => htmlspecialchars($data['username']),
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
}
?>