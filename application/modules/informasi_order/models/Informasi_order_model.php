<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_order_model extends CI_Model
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
        $this->db->where('transaction.kategori_order', 'order');
        // $this->db->order_by('transaction.bukti_tf', null);
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

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'id_barang' => htmlspecialchars($data['id_barang']),
            'stock' => htmlspecialchars($data['qty']),
            'status' => 'failed order',
            'id_users' => htmlspecialchars($this->checkusers->users_login()->id_users),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('stock_in', $params);
    }
    
    public function jumlah($data, $total)
    {
        $jumlah = $data['qty'] + $total;
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'stok' => $jumlah,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('barang', $params);
    }

}

?>