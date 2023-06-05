<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
    public function getData($id = null)
    {
        $users = $this->checkusers->users_login()->id_users;
        $this->db->select('transaction.*, barang.id_barang, barang.nama_barang, barang.photo_barang, users.id_users, users.nama, users.level');
        $this->db->from('transaction');
        $this->db->join('barang', 'barang.id_barang = transaction.id_barang');
        $this->db->join('users', 'users.id_users = transaction.id_users');
        if($id)
        {
            $this->db->where('transaction.id_transaction', $id);
        }
        $this->db->where('transaction.deleted_at', null);
        $this->db->where('transaction.id_users', $users);
        // $this->db->order_by('transaction.bukti_tf', null);
        $this->db->order_by('transaction.no_invoice', 'DESC');
        return $this->db->get();
    }

    public function upload($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $params = array(
            'bukti_tf' => $data['bukti_tf'],
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('id_transaction', $data['id']);
        $this->db->update('transaction', $params);
    }
}
?>