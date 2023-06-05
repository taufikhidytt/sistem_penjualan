<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriBarang_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->select('kategori_barang.*, users.id_users, users.nama, users.level');
        $this->db->from('kategori_barang');
        $this->db->join('users', 'users.id_users = kategori_barang.id_users');
        if ($id) {
            $this->db->where('kategori_barang.id_kategori_barang', $id);
        }
        $this->db->where('kategori_barang.deleted_at', null);
        return $this->db->get();
    }

    public function getBarang($id = null)
    {
        $this->db->from('barang');
        if ($id) {
            $this->db->where('id_kategori_barang', $id['id']);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama_kategori' => htmlspecialchars($data['nama_kategori']),
            'deskripsi' => htmlspecialchars($data['deskripsi']),
            'id_users' => htmlspecialchars($this->checkusers->users_login()->id_users),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('kategori_barang', $params);
    }

    public function update($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'nama_kategori' => htmlspecialchars($data['nama_kategori']),
            'deskripsi' => htmlspecialchars($data['deskripsi']),
            'id_users' => htmlspecialchars($this->checkusers->users_login()->id_users),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_kategori_barang', $data['id']);
        $this->db->update('kategori_barang', $params);
    }

    public function del($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'deleted_at' => date('Y-m-d H:i:s')
        );
        $this->db->where('id_kategori_barang', $data['id']);
        $this->db->update('kategori_barang', $params);
    }
}
