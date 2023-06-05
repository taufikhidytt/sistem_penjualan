<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function getPenjualan($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function getOrder($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('kategori_order', 'order');
        return $this->db->get();
    }

    public function getRequest($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('kategori_order', 'request');
        return $this->db->get();
    }

    public function getUsers($id = null)
    {
        $this->db->from('users');
        if($id){
            $this->db->where('id_users', $id);
        }
        $this->db->where('deleted_at', null);
        return $this->db->get();
    }

    public function getKategori($id = null)
    {
        $this->db->from('kategori_barang');
        if($id){
            $this->db->where('id_ketegori_barang', $id);
        }
        $this->db->where('deleted_at', null);
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

    public function getPengirimanOrder($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('kategori_order', 'order');
        $this->db->where('status', 'delivery');
        return $this->db->get();
    }

    public function getPengirimanRequest($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('kategori_order', 'request');
        $this->db->where('status', 'delivery');
        return $this->db->get();
    }

    public function getPending($id = null)
    {
        $users = $this->checkusers->users_login()->id_users;
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('id_users', $users);
        $this->db->where('status', 'pending');
        return $this->db->get();
    }

    public function getProses($id = null)
    {
        $users = $this->checkusers->users_login()->id_users;
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('id_users', $users);
        $this->db->where('status', 'proses');
        return $this->db->get();
    }

    public function getDelivery($id = null)
    {
        $users = $this->checkusers->users_login()->id_users;
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('id_users', $users);
        $this->db->where('status', 'delivery');
        return $this->db->get();
    }

    public function getFailed($id = null)
    {
        $users = $this->checkusers->users_login()->id_users;
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('id_users', $users);
        $this->db->where('status', 'failed');
        return $this->db->get();
    }

    public function getAllPending($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('status', 'pending');
        return $this->db->get();
    }

    public function getAllProses($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('status', 'proses');
        return $this->db->get();
    }

    public function getAllDelivery($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('status', 'delivery');
        return $this->db->get();
    }

    public function getAllFailed($id = null)
    {
        $this->db->from('transaction');
        if($id){
            $this->db->where('id_transaction', $id);
        }
        $this->db->where('deleted_at', null);
        $this->db->where('status', 'failed');
        return $this->db->get();
    }

    public function grafik()
    {
        $query = $this->db->query("SELECT nama_barang, SUM(transaction.qty) AS penjualan FROM transaction JOIN barang ON barang.id_barang = transaction.id_barang GROUP BY transaction.id_barang");
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}

?>