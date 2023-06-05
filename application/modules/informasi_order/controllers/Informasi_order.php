<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_order extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_order_model', 'informasiOrder');
        belum_login();
        not_user();
        not_gudang();
    }

    public function index()
    {
        $data['title'] = 'Data Informasi Order | App Penjualan';
        $data['judul'] = 'Data Informasi Order';
        $data['data'] = $this->informasiOrder->getData();
        $this->template->load('template', 'informasi_order/index', $data);
    }

    public function status($id)
    {
        $this->form_validation->set_rules('status', 'Status order', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->informasiOrder->getData($id);
            if($query->row()->status === 'failed'){
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Status Failed, Tidak Bisa Diubah. Silahkan Buat Transaksi Baru.');
                redirect('informasi_order');
            }
            if($query->num_rows() > 0){
                $data['title'] = 'Update Informasi Order | App Penjualan';
                $data['judul'] = 'Update Informasi Order';
                $data['data'] = $query->row();
                $this->template->load('template', 'informasi_order/status', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('informasi_order');
            }
        } else {
            $data = $this->input->post(null, true);
            if($data['status'] == 'failed'){
                $id = $data['id'];
                $query = $this->informasiOrder->getData($id)->row_array();
                $total = $this->db->query("SELECT stok FROM barang WHERE id_barang = '$query[id_barang]'")->row_array();
                $this->informasiOrder->jumlah($query, $total['stok']);
                $this->informasiOrder->add($query);
                $this->informasiOrder->updateStatus($data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Status Order');
                    redirect('informasi_order');
                }else{
                    $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Status Order');
                    redirect('informasi_order');
                }
            }else{
                $this->informasiOrder->updateStatus($data);
                if($this->db->affected_rows() > 0){
                    $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Status Order');
                    redirect('informasi_order');
                }else{
                    $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Status Order');
                    redirect('informasi_order');
                }
            }
        }
    }
}
?>