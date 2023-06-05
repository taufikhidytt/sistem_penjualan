<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPenjualan_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->select('transaction.*, barang.id_barang, barang.nama_barang, users.id_users, users.nama, users.level');
        $this->db->from('transaction');
        $this->db->join('barang', 'barang.id_barang = transaction.id_barang');
        $this->db->join('users', 'users.id_users = transaction.id_users');
        if($id)
        {
            $this->db->where('transaction.id_transaction', $id);
        }
        $this->db->where('transaction.deleted_at', null);
        $this->db->order_by('transaction.bukti_tf', null);
        $this->db->order_by('transaction.no_invoice', 'DESC');
        return $this->db->get();
    }

    public function getBarang($id = null)
    {
        $this->db->from('barang');
        if($id){
            $this->db->where('id_barang', $id);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function getKategori($id = null)
    {
        $this->db->from('kategori_barang');
        if($id){
            $this->db->where('id_kategori_barang', $id);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function getUser($id = null)
    {
        $this->db->from('users');
        if($id){
            $this->db->where('id_users', $id);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }
}

?>