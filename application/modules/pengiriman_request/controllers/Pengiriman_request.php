<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_request extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengiriman_request_model', 'pengirimanRequest');
        belum_login();
        not_user();
        not_admin();
    }

    public function index()
    {
        $data['title'] = 'Data Pengiriman Request | App Penjualan';
        $data['judul'] = 'Data Pengiriman Request';
        $data['data'] = $this->pengirimanRequest->getData();
        $this->template->load('template', 'pengiriman_request/index', $data);
    }

    public function status($id)
    {
        $this->form_validation->set_rules('status', 'Status order', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->pengirimanRequest->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Pengiriman Request | App Penjualan';
                $data['judul'] = 'Update Pengiriman Request';
                $data['data'] = $query->row();
                $this->template->load('template', 'pengiriman_request/status', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('pengiriman_request');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->pengirimanRequest->updateStatus($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Status Order');
                redirect('pengiriman_request');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Status Order');
                redirect('pengiriman_request');
            }
        }
    }

    public function print($id)
    {
        $query = $this->pengirimanRequest->getData($id);
        if($query->num_rows() > 0){
            $data['title'] = 'Data Informasi Peniriman Request | App Penjualan';
            $data['data'] = $query->row();
            $this->load->view('pengiriman_request/print', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
            redirect('pengiriman_request');
        }
    }
}
?>