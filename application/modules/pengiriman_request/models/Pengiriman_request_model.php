<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_request_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->select('transaction.*, barang.id_barang, barang.nama_barang, kategori_barang.id_kategori_barang, kategori_barang.nama_kategori, users.id_users, users.nama, users.level');
        $this->db->from('transaction');
        $this->db->join('barang', 'barang.id_barang = transaction.id_barang');
        $this->db->join('users', 'users.id_users = transaction.id_users');
        $this->db->join('kategori_barang', 'kategori_barang.id_kategori_barang = barang.id_kategori_barang');
        if($id)
        {
            $this->db->where('transaction.id_transaction', $id);
        }
        $this->db->where('transaction.deleted_at', null);
        $this->db->where('transaction.kategori_order', 'request');
        $this->db->where('transaction.status !=',  'pending');
        $this->db->order_by('transaction.no_invoice', 'DESC');
        return $this->db->get();
    }

    public function updateStatus($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'status' => htmlspecialchars($data['status']),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_transaction', $data['id']);
        $this->db->update('transaction', $params);
    }

}

?>