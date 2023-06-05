<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_order extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengiriman_order_model', 'pengirimanOrder');
        belum_login();
        not_user();
        not_admin();
    }

    public function index()
    {
        $data['title'] = 'Data Pengiriman Order | App Penjualan';
        $data['judul'] = 'Data Pengiriman Order';
        $data['data'] = $this->pengirimanOrder->getData();
        $this->template->load('template', 'pengiriman_order/index', $data);
    }

    public function status($id)
    {
        $this->form_validation->set_rules('status', 'Status order', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->pengirimanOrder->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Pengiriman Order | App Penjualan';
                $data['judul'] = 'Update Pengiriman Order';
                $data['data'] = $query->row();
                $this->template->load('template', 'pengiriman_order/status', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('pengiriman_order');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->pengirimanOrder->updateStatus($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Status Order');
                redirect('pengiriman_order');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Status Order');
                redirect('pengiriman_order');
            }
        }
    }

    public function print($id)
    {
        $query = $this->pengirimanOrder->getData($id);
        if($query->num_rows() > 0){
            $data['title'] = 'Data Informasi Peniriman Order | App Penjualan';
            $data['data'] = $query->row();
            $this->load->view('pengiriman_order/print', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
            redirect('pengiriman_order');
        }
    }
}
?>