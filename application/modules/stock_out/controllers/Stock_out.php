<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_out extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('StockOut_model', 'stockout');
        $this->load->model('barang/Barang_model', 'barang');
        belum_login();
        not_user();
        not_admin();
    }

    public function index()
    {
        $data['title'] = 'Stock Out Barang | App Penjualan';
        $data['judul'] = 'Stock Out Barang';
        $data['data'] = $this->stockout->getData();
        $this->template->load('template', 'stock_out/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('nama_kategori', 'Kategori barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga barang', 'required');
        $this->form_validation->set_rules('stok', 'Stok In barang', 'required');
        $this->form_validation->set_rules('description', 'Description barang', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Stock Out | App Penjualan';
            $data['judul'] = 'Stock Out';
            $data['data'] = $this->barang->getData();
            $this->template->load('template', 'stock_out/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $total = $this->db->query("SELECT stok FROM barang WHERE id_barang = '$data[id_barang]'")->row_array();
            if($data['stok'] > $total['stok']){
                $this->session->set_flashdata('warning', 'Stock Out Lebih Besar Dari Total Stock Barang, Harap Stock Out Tidak Boleh Besar Dari Total Stock Barang');
                redirect('stock_out/add');
            }else{
                $this->stockout->jumlah($data, $total['stok']);
                $this->stockout->add($data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                    redirect('stock_out');
                }else{
                    $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                    redirect('stock_out');
                }
            }
        }
    }
}
?>