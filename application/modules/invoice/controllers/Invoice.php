<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model', 'invoice');
        belum_login();
        not_gudang();
    }
    public function index()
    {
        $data['title'] = 'Data Invoice | App Penjualan';
        $data['judul'] = 'Data Invoice';
        $data['data'] = $this->invoice->getData();
        $this->template->load('template', 'invoice/index', $data);
    }

    public function upload($id)
    {
        $query = $this->invoice->getData($id);
        if($query->row()->status === 'failed'){
            $this->session->set_flashdata('warning', 'Data Yang Anda Cari Status Failed, Tidak Bisa Diubah. Silahkan Buat Transaksi Baru');
            redirect('invoice');
        }
        if($query->num_rows() > 0){
            $data['title'] = 'Upload Bukti Transfer | App Penjualan';
            $data['judul'] = 'Upload Bukti Transfer';
            $data['data'] = $query->row();
            $this->template->load('template', 'invoice/upload', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
            redirect('invoice');
        }
    }

    public function prosesUpload()
    {
        $data = $this->input->post();
        if($_FILES)
        {
            date_default_timezone_set("Asia/Jakarta");
            $config['upload_path']      = './assets/upload/bukti_tf/';
            $config['allowed_types']    = 'jpeg|jpg|png';
            $config['max_size']         = '220';
            $config['file_name']        = 'buktiTfPhoto-'.date('Y-m-d,H-i-s');
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if($_FILES['bukti_tf']['name'])
            {
                if($this->upload->do_upload('bukti_tf'))
                {
                    $data['bukti_tf'] = $this->upload->data('file_name');
                    $this->invoice->upload($data);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Bukti Transfer Baru');
                        redirect('invoice');
                    }else{
                        $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Bukti Transfer Baru');
                        redirect('invoice');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Photo Gagal Di Upload, Pastikan Format Dan Size Yang Di Upload Benar');
                    redirect('invoice');
                }
            }else{
                $this->session->set_flashdata('warning', 'Anda Belum Mengupload Bukti Transfer');
                redirect('invoice');
            }
        }
    }

    public function print($id)
    {
        $query = $this->invoice->getData($id);
        if($query->row()->status === 'failed'){
            $this->session->set_flashdata('warning', 'Data Yang Anda Cari Status Failed, Tidak Bisa Diubah. Silahkan Buat Transaksi Baru');
            redirect('invoice');
        }
        if($query->num_rows() > 0){
            $data['title'] = 'Invoice | App Penjualan';
            $data['data'] = $query->row();
            // var_dump($data1);
            // die();
            $this->load->view('invoice/print', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
            redirect('invoice');
        }
    }
}
?>