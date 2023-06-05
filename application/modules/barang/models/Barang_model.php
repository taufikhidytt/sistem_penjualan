<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->select('barang.*, kategori_barang.id_kategori_barang, kategori_barang.nama_kategori, users.id_users, users.nama, users.level');
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori_barang = barang.id_kategori_barang');
        $this->db->join('users', 'users.id_users = barang.id_users');
        if($id)
        {
            $this->db->where('barang.id_barang', $id);
        }
        $this->db->where('barang.deleted_at', null);
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama_barang' => htmlspecialchars($data['nama_barang']),
            'id_kategori_barang' => htmlspecialchars($data['kategori_barang']),
            'harga' => htmlspecialchars($data['harga']),
            'deskripsi' => htmlspecialchars($data['deskripsi']),
            'id_users' => htmlspecialchars($this->checkusers->users_login()->id_users),
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($data['photo_barang'] != null)
        {
            $params['photo_barang'] = htmlspecialchars($data['photo_barang']);
        }
        $this->db->insert('barang', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama_barang' => htmlspecialchars($data['nama_barang']),
            'id_kategori_barang' => htmlspecialchars($data['kategori_barang']),
            'harga' => htmlspecialchars($data['harga']),
            'deskripsi' => htmlspecialchars($data['deskripsi']),
            'id_users' => htmlspecialchars($this->checkusers->users_login()->id_users),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        if($data['photo_barang'] != null)
        {
            $params['photo_barang'] = htmlspecialchars($data['photo_barang']);
        }
        $this->db->where('id_barang', $data['id']);
        $this->db->update('barang', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_barang', $data['id']);
        $this->db->update('barang', $params);
    }

}

?>