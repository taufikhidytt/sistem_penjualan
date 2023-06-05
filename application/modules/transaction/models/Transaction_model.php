<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'id_barang' => htmlspecialchars($data['id_barang']),
            'id_users' => htmlspecialchars($data['id_users']),
            'no_invoice' => htmlspecialchars($data['no_invoice']),
            'qty' => htmlspecialchars($data['qty']),
            'harga' => htmlspecialchars($data['harga']),
            'total_harga' => htmlspecialchars($data['harga'] * $data['qty']),
            'no_hp' => htmlspecialchars($data['no_hp']),
            'kategori_order' => "order",
            'status' => "pending",
            'alamat' => htmlspecialchars($data['alamat']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('transaction', $params);
    }

    public function addRequest($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'id_barang' => htmlspecialchars($data['id_barang']),
            'id_users' => htmlspecialchars($data['id_users']),
            'no_invoice' => htmlspecialchars($data['no_invoice']),
            'qty' => htmlspecialchars($data['qty']),
            'harga' => htmlspecialchars($data['harga']),
            'total_harga' => htmlspecialchars($data['harga'] * $data['qty']),
            'no_hp' => htmlspecialchars($data['no_hp']),
            'kategori_order' => "request",
            'status' => "pending",
            'alamat' => htmlspecialchars($data['alamat']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('transaction', $params);
    }

    public function insertStockOut($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'id_barang' => htmlspecialchars($data['id_barang']),
            'id_users' => htmlspecialchars($data['id_users']),
            'stock' => htmlspecialchars($data['qty']),
            'status' => 'out',
            'description' => htmlspecialchars("Order No Invoice ".$data['no_invoice']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('stock_out', $params);
    }

    public function updateStockBarang($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $query = $this->db->query("SELECT stok FROM barang WHERE id_barang = $data[id_barang]")->row_array();
        $jumlah = $query['stok'] - $data['qty'];
        $params = array(
            'stok' => $jumlah,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('barang', $params);
    }
}
?>