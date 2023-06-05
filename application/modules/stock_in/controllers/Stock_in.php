<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_in extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('StockIn_model', 'stockin');
        $this->load->model('barang/Barang_model', 'barang');
        belum_login();
        not_user();
        not_admin();
    }

    public function index()
    {
        $data['title'] = 'Stock In Barang | App Penjualan';
        $data['judul'] = 'Stock In Barang';
        $data['data'] = $this->stockin->getData();
        $this->template->load('template', 'stock_in/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('nama_kategori', 'Kategori barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga barang', 'required');
        $this->form_validation->set_rules('stok', 'Stok In barang', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Stock In | App Penjualan';
            $data['judul'] = 'Add Stock In';
            $data['data'] = $this->barang->getData();
            $this->template->load('template', 'stock_in/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $total = $this->db->query("SELECT stok FROM barang WHERE id_barang = '$data[id_barang]'")->row_array();
            $this->stockin->jumlah($data, $total['stok']);
            $this->stockin->add($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                redirect('stock_in');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                redirect('stock_in');
            }
        }
    }
}
?>