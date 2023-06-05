<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model', 'transaction');
        $this->load->model('barang/Barang_model', 'barang');
        belum_login();
        not_gudang();
    }

    public function index()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('nama_kategori', 'Kategori barang', 'required');
        $this->form_validation->set_rules('stok_barang', 'Stok barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga barang', 'required');
        $this->form_validation->set_rules('qty', 'Qty barang', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('numeric', '{field} wajib angka');
        $this->form_validation->set_message('max_length', '{field} maximal 12 angka');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Transaction | App Penjualan';
            $data['judul'] = 'Transaction';
            $data['barang'] = $this->barang->getData();
            $this->template->load('template', 'transaction/index', $data);
        } else {
            $data = $this->input->post(null, true);
            $data['no_invoice'] = "INV00".date('YmdHis');
            // var_dump($data);
            // die();
            if($data['qty'] > $data['stok_barang']){
                $this->session->set_flashdata('warning', 'Jumlah quantity lebih besar dari total stock, Jika melebihi total stock anda bisa request product barang dengan mengclick tombol request barang');
                redirect('transaction');
            }else{
                $this->transaction->updateStockBarang($data);
                if($this->db->affected_rows() > 0){
                    $this->transaction->insertStockOut($data);
                    if($this->db->affected_rows() > 0){
                        $this->transaction->add($data);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengorder Barang, Silahkan Periksa Menu Invoice Dan Kirimkan Bukti Pembayaran');
                            redirect('transaction');
                        }else{
                            $this->session->set_flashdata('error', 'Anda Gagal Mengorder Barang');
                            redirect('transaction');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Data Stock Out Gagal Di Tambahkan');
                        redirect('transaction');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Data Stock Barang Gagal Di Update');
                    redirect('transaction');
                }
            }
        }
    }

    public function requestBarang()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->form_validation->set_rules('nama_barang', 'Nama barang', 'required');
        $this->form_validation->set_rules('nama_kategori', 'Kategori barang', 'required');
        $this->form_validation->set_rules('harga', 'Harga barang', 'required');
        $this->form_validation->set_rules('qty', 'Qty barang', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('numeric', '{field} wajib angka');
        $this->form_validation->set_message('max_length', '{field} maximal 12 angka');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Request Barang | App Penjualan';
            $data['judul'] = 'Request Barang';
            $data['barang'] = $this->barang->getData();
            $this->template->load('template', 'transaction/request', $data);
        } else {
            $data = $this->input->post(null, true);
            $data['no_invoice'] = "INV00".date('YmdHis');
            $this->transaction->addRequest($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Merequest Barang, Silahkan Periksa Menu Invoice Dan Kirimkan Bukti Pembayaran');
                redirect('transaction');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Merequest Barang');
                redirect('transaction');
            }
        }
    }
}
?>