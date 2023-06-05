<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_request extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_request_model', 'informasiRequest');
        belum_login();
        not_user();
        not_gudang();
    }

    public function index()
    {
        $data['title'] = 'Data Informasi Request | App Penjualan';
        $data['judul'] = 'Data Informasi Request';
        $data['data'] = $this->informasiRequest->getData();
        $this->template->load('template', 'informasi_request/index', $data);
    }

    public function status($id)
    {
        $this->form_validation->set_rules('status', 'Status order', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->informasiRequest->getData($id);
            if($query->row()->status === 'failed'){
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Status Failed, Tidak Bisa Diubah. Silahkan Buat Transaksi Baru.');
                redirect('informasi_request');
            }
            if($query->num_rows() > 0){
                $data['title'] = 'Update Informasi Request | App Penjualan';
                $data['judul'] = 'Update Informasi Request';
                $data['data'] = $query->row();
                $this->template->load('template', 'informasi_request/status', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('informasi_request');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->informasiRequest->updateStatus($data);
            if($this->db->affected_rows() > 0){
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Status Order');
                redirect('informasi_request');
            }else{
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Status Order');
                redirect('informasi_request');
            }
        }
    }

    public function print($id)
    {
        $query = $this->informasiRequest->getData($id);
        if($query->row()->status === 'failed'){
            $this->session->set_flashdata('warning', 'Data Yang Anda Cari Status Failed, Tidak Bisa Diubah. Silahkan Buat Transaksi Baru');
            redirect('informasi_request');
        }
        if($query->num_rows() > 0){
            $data['title'] = 'Data Informasi Request | App Penjualan';
            $data['data'] = $query->row();
            $this->load->view('informasi_request/print', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
            redirect('informasi_request');
        }
    }
}
?>