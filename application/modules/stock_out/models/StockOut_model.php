<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockOut_model extends CI_Model
{
    public function getData($id = null)
    {
        $this->db->select('stock_out.*, barang.id_barang, barang.nama_barang, users.id_users, users.nama, users.level');
        $this->db->from('stock_out');
        $this->db->join('barang', 'barang.id_barang = stock_out.id_barang');
        $this->db->join('users', 'users.id_users = stock_out.id_users');
        if($id)
        {
            $this->db->where('stock_out.id_stock_out', $id);
        }
        $this->db->where('stock_out.deleted_at', null);
        $this->db->order_by('stock_out.created_at', 'DESC');
        return $this->db->get();
    }

    public function add($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'id_barang' => htmlspecialchars($data['id_barang']),
            'stock' => htmlspecialchars($data['stok']),
            'status' => 'out',
            'description' => htmlspecialchars($data['description']),
            'id_users' => htmlspecialchars($this->checkusers->users_login()->id_users),
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('stock_out', $params);
    }

    public function jumlah($data, $total)
    {
        $jumlah = $total - $data['stok'];
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