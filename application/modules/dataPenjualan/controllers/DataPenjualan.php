<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataPenjualan extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('DataPenjualan_model', 'dataPenjualan');
        belum_login();
        not_user();
        not_gudang();
    }

    public function index()
    {
        if($this->input->post()){
            $barang = $this->input->post('barang');
            $kategori = $this->input->post('kategori');
            $status = $this->input->post('status');
            $users = $this->input->post('users');
            $dari_tgl = $this->input->post('dari_tgl');
            $sampai_tgl = $this->input->post('sampai_tgl');

            $where = '';
            if($barang != ''){
                $where .= ' AND transaction.id_barang=' . $barang;
            }
            if($kategori != ''){
                $where .= ' AND transaction.kategori_order=' . '"'. $kategori .'"';
            }
            if($status != ''){
                $where .= ' AND transaction.status=' . '"'. $status .'"';
            }
            if($users != ''){
                $where .= ' AND transaction.id_users=' . $users;
            }
            if($dari_tgl != '' AND $sampai_tgl != ''){
                $where .= ' AND DATE_FORMAT(transaction.created_at,"%Y-%m-%d") >= ' .'"'. $dari_tgl .'"'. ' AND DATE_FORMAT(transaction.created_at,"%Y-%m-%d") <=' .'"'. $sampai_tgl .'"';
            }else{
                if($dari_tgl != ''){
                    $where .= ' AND DATE_FORMAT(transaction.created_at,"%Y-%m-%d") >= ' .'"'. $dari_tgl .'"';
                }
                if($sampai_tgl != ''){
                    $where .= ' AND DATE_FORMAT(transaction.created_at,"%Y-%m-%d") <=' .'"'. $sampai_tgl .'"';
                }
            }

            if($where != ''){
                $query = $this->db->query(
                    "SELECT transaction.*, barang.id_barang, barang.nama_barang, users.id_users, users.nama, users.level FROM transaction JOIN barang ON barang.id_barang = transaction.id_barang JOIN users ON users.id_users = transaction.id_users WHERE transaction.deleted_at IS NULL $where");
                $data['title'] = 'Data Penjualan | App Penjualan';
                $data['judul'] = 'Data Penjualan';
                $data['data'] = $query;
                $data['barang'] = $this->dataPenjualan->getBarang();
                $data['users'] = $this->dataPenjualan->getUser();
                $this->template->load('template', 'dataPenjualan/index', $data);
            }else{
                $data['title'] = 'Data Penjualan | App Penjualan';
                $data['judul'] = 'Data Penjualan';
                $data['data'] = $this->dataPenjualan->getData();
                $data['barang'] = $this->dataPenjualan->getBarang();
                $data['users'] = $this->dataPenjualan->getUser();
                $this->template->load('template', 'dataPenjualan/index', $data);
            }
        }else{
            $data['title'] = 'Data Penjualan | App Penjualan';
            $data['judul'] = 'Data Penjualan';
            $data['data'] = $this->dataPenjualan->getData();
            $data['barang'] = $this->dataPenjualan->getBarang();
            $data['users'] = $this->dataPenjualan->getUser();
            $this->template->load('template', 'dataPenjualan/index', $data);
        }
    }

    public function print()
    {
        if($this->input->post()){
            $barang = $this->input->post('barang');
            $kategori = $this->input->post('kategori');
            $status = $this->input->post('status');
            $users = $this->input->post('users');
            $dari_tgl = $this->input->post('dari_tgl');
            $sampai_tgl = $this->input->post('sampai_tgl');

            $where = '';
            if($barang != ''){
                $where .= ' AND transaction.id_barang=' . $barang;
            }
            if($kategori != ''){
                $where .= ' AND transaction.kategori_order=' . '"'. $kategori .'"';
            }
            if($status != ''){
                $where .= ' AND transaction.status=' . '"'. $status .'"';
            }
            if($users != ''){
                $where .= ' AND transaction.id_users=' . $users;
            }
            if($dari_tgl != '' AND $sampai_tgl != ''){
                $where .= ' AND DATE_FORMAT(transaction.created_at,"%Y-%m-%d") >= ' .'"'. $dari_tgl .'"'. ' AND DATE_FORMAT(transaction.created_at,"%Y-%m-%d") <=' .'"'. $sampai_tgl .'"';
            }else{
                if($dari_tgl != ''){
                    $where .= ' AND DATE_FORMAT(transaction.created_at,"%Y-%m-%d") >= ' .'"'. $dari_tgl .'"';
                }
                if($sampai_tgl != ''){
                    $where .= ' AND DATE_FORMAT(transaction.created_at,"%Y-%m-%d") <=' .'"'. $sampai_tgl .'"';
                }
            }

            if($where != ''){
                $query = $this->db->query(
                    "SELECT transaction.*, barang.id_barang, barang.nama_barang, users.id_users, users.nama, users.level FROM transaction JOIN barang ON barang.id_barang = transaction.id_barang JOIN users ON users.id_users = transaction.id_users WHERE transaction.deleted_at IS NULL $where");
                // var_dump($query);
                // die();
                $data['title'] = 'Data Penjualan Filter| App Penjualan';
                $data['data'] = $query;
                $this->load->view('dataPenjualan/print', $data);
            }else{
                $data['title'] = 'Data Penjualan Null| App Penjualan';
                $data['data'] = $this->dataPenjualan->getData();
                $this->load->view('dataPenjualan/print', $data);
            }
        }
        else{
            redirect('dataPenjualan');
        }
    }
}
?>