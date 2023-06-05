<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model', 'dashboard');
        belum_login();
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Apps Penjualan';
        $data['judul'] = 'Dashboard';
        $data['penjualan']= $this->dashboard->getPenjualan()->num_rows();
        $data['order']= $this->dashboard->getOrder()->num_rows();
        $data['request']= $this->dashboard->getRequest()->num_rows();
        $data['users']= $this->dashboard->getUsers()->num_rows();
        $data['kategori']= $this->dashboard->getKategori()->num_rows();
        $data['barang']= $this->dashboard->getBarang()->num_rows();
        $data['barang']= $this->dashboard->getBarang()->num_rows();
        $data['pengirimanOrder']= $this->dashboard->getPengirimanOrder()->num_rows();
        $data['pengirimanRequest']= $this->dashboard->getPengirimanRequest()->num_rows();
        $data['pending']= $this->dashboard->getPending()->num_rows();
        $data['proses']= $this->dashboard->getProses()->num_rows();
        $data['delivery']= $this->dashboard->getDelivery()->num_rows();
        $data['failed']= $this->dashboard->getFailed()->num_rows();
        $data['allpending']= $this->dashboard->getAllPending()->num_rows();
        $data['allproses']= $this->dashboard->getAllProses()->num_rows();
        $data['alldelivery']= $this->dashboard->getAllDelivery()->num_rows();
        $data['allfailed']= $this->dashboard->getAllFailed()->num_rows();
        $data['data']=$this->dashboard->grafik();
        // var_dump($data1);
        // die();
        $this->template->load('template', 'dashboard/dashboard', $data);
    }
}


?>