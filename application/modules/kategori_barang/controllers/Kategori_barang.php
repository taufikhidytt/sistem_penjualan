<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_barang extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('KategoriBarang_model', 'kategori');
        belum_login();
        not_user();
        not_admin();
    }

    public function index()
    {
        $data['title'] = 'Kategori Barang | App Penjualan';
        $data['judul'] = 'Kategori Barang';
        $data['data'] = $this->kategori->getData();
        $this->template->load('template', 'kategori_barang/index', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama kategori barang', 'required|is_unique[kategori_barang.nama_kategori]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi kategori barang', 'required');
        $this->form_validation->set_rules('status', 'Status kategori barang', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} sudah ada, Silahkan cari kategori barang baru');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Add Kategori Barang | App Penjualan';
            $data['judul'] = 'Add Kategori Barang';
            $this->template->load('template', 'kategori_barang/add', $data);
        } else {
            $data = $this->input->post(null, true);
            $this->kategori->add($data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menambahkan Data Baru');
                redirect('kategori_barang');
            } else {
                $this->session->set_flashdata('error', 'Anda Gagal Menambahkan Data Baru');
                redirect('kategori_barang');
            }
        }
    }

    public function update($id)
    {
        $this->form_validation->CI = &$this;

        $this->form_validation->set_rules('nama_kategori', 'Nama kategori barang', 'required|callback_username_check');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi kategori barang', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->kategori->getData($id);
            if ($query->num_rows() > 0) {
                $data['title'] = 'Update Kategori Barang | App Penjualan';
                $data['judul'] = 'Update Kategori Barang';
                $data['data'] = $query->row();
                $this->template->load('template', 'kategori_barang/update', $data);
            } else {
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('kategori_barang');
            }
        } else {
            $data = $this->input->post(null, true);
            $this->kategori->update($data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                redirect('kategori_barang');
            } else {
                $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                redirect('kategori_barang');
            }
        }
    }

    public function del()
    {
        $data = $this->input->post(null, true);
        $query = $this->kategori->getBarang($data);
        if ($query->num_rows() > 0) {
            $this->session->set_flashdata('warning', 'Tidak Bisa Menghapus Kategori Barang, Data Kategori Barang Masih Di Gunakan Di Data Barang');
            redirect('kategori_barang');
        } else {
            $this->kategori->del($data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Selamat Anda Berhasil Menghapus Data');
                redirect('kategori_barang');
            } else {
                $this->session->set_flashdata('error', 'Anda Gagal Menghapus Data');
                redirect('kategori_barang');
            }
        }
    }

    function username_check()
    {
        $pos = $this->input->post(null, true);
        $query = $this->db->query("SELECT * FROM kategori_barang WHERE nama_kategori = '$pos[nama_kategori]' AND id_kategori_barang != '$pos[id]' AND deleted_at IS NULL");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} sudah ada, silahkan cari nama barang lain');
            return false;
        } else {
            return true;
        }
    }
}
