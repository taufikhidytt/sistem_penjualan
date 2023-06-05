<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth_m');
    }

    public function index()
    {
        sudah_login();
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => '{field} Tidak Boleh Kosong',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => '{field} Tidak Boleh Kosong',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Sign In | App Penjualan";
            $data['judul'] = 'Sign In';
            $this->load->view('auth/login', $data);
        } else {
            $pos = $this->input->post(null, true);
            $query = $this->auth_m->cek_data($pos);
            if($query->num_rows() > 0)
            {
                $data = $query->row();
                if($data->status == 'inactive' AND $data->deleted_at == null){
                    $this->session->set_flashdata('warning', 'Status '.$data->nama.' Masih Inactive, Harap Hubungi Pihak Admin App Penjualan CV AMALI SHOES Di No 081xxxxxxxxxx');
                    redirect('auth');
                }elseif($data->status == 'pending'){
                    $this->session->set_flashdata('warning', 'Status '.$data->nama.' Masih Pending, Harap Hubungi Pihak Admin App Penjualan CV AMALI SHOES Di No 081xxxxxxxxxx');
                    redirect('auth');
                }else{
                    $session = [
                        'id_users'  => $data->id_users,
                        'level'     => $data->level,
                        'deleted_at'     => $data->deleted_at,
                    ];
                    $this->session->set_userdata($session);
                    $this->session->set_flashdata('success', 'Selamat Datang Kembali '.$data->nama.' Di App Penjualan CV Amali Shoes');
                    redirect('dashboard');
                }
            }else{
                $this->session->set_flashdata('warning', 'Username Atau Password Anda Salah, Silahkan Login Kembali! Atau Akun Anda Sudah Terhapus');
                redirect('auth');
            }
        }
        
    }

    public function daftar()
    {
        sudah_login();
        // untuk fungsi validation callback HMVC
		$this->form_validation->CI =& $this;

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_input_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]');
        $this->form_validation->set_rules('password2', 'Konfirmasi password', 'required|matches[password]');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('is_unique', '{field} sudah terpakai, Silahkan cari username baru');
        $this->form_validation->set_message('min_length', '{field} minimal 7 karakter');
        $this->form_validation->set_message('matches', '{field} wajib sama dengan password');
        $this->form_validation->set_message('numeric', '{field} wajib angka');
        $this->form_validation->set_message('max_length', '{field} maksimal 12 angka');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Sign Up | App Penjualan';
            $data['judul'] = 'Sign Up';
            $this->load->view('auth/daftar', $data);
        } else {
            $data = $this->input->post(null, true);
            if($_FILES)
            {
                date_default_timezone_set("Asia/Jakarta");
                $config['upload_path']      = './assets/upload/users/';
                $config['allowed_types']    = 'jpeg|jpg|png';
                $config['max_size']         = '220';
                $config['file_name']        = 'usersPhoto-'.date('Y-m-d,H-i-s');
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($_FILES['image']['name'])
                {
                    if($this->upload->do_upload('image'))
                    {
                        $data['image'] = $this->upload->data('file_name');
                        $this->auth_m->add($data);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Membuat Akun, Status Anda Masih Pending. Silahkan Hubungi Pihak Admin App Penjualan CV Amali Shoes Untuk Mengubah Status Anda Di No 081xxxxxxxxxx');
                            redirect('auth/daftar');
                        }else{
                            $this->session->set_flashdata('error', 'Anda Gagal Membuat Akun Baru');
                            redirect('auth/daftar');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Photo Gagal Di Upload, Pastikan Format Dan Size Yang Di Upload Benar');
                        redirect('auth/daftar');
                    }
                }else{
                    $this->session->set_flashdata('warning', 'Anda Belum Mengupload Photo');
                    redirect('auth/daftar');
                }
            }
        }
    }

    function input_username_check()
	{
		$pos = $this->input->post(null, true);
		$query = $this->db->query("SELECT * FROM users WHERE username = '$pos[username]' AND deleted_at IS NULL");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('input_username_check', '{field} sudah ada, silahkan cari username lain');
			return false;
		}else{
			return true;
		}
	}

    public function logout()
    {
        $session = [
            'id_users',
            'level',
        ];
        $this->session->unset_userdata($session);
        $this->session->set_flashdata('success', 'Selamat! Anda Berhasil Logout!');
        redirect('auth');
    }
}
