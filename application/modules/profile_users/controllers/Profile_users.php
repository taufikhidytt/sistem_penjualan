<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_users extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileUsers_model', 'profile');
        belum_login();
    }
    public function index()
    {
        $data['title'] = 'Profile Users | App Penjualan';
        $data['judul'] = 'Profile Users';
        $data['data'] = $this->profile->getData();
        $this->template->load('template', 'profile_users/index', $data);
    }

    public function update()
    {
        $id = $this->checkusers->users_login()->id_users;
        // untuk fungsi validation callback HMVC
		$this->form_validation->CI =& $this;

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_username_check');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if($this->input->post('password'))
        {
            $this->form_validation->set_rules('password', 'Password', 'min_length[7]');
            $this->form_validation->set_rules('password2', 'Konfirmasi password', 'required|matches[password]');
        }

        if($this->input->post('password2'))
        {
            $this->form_validation->set_rules('password2', 'Konfirmasi password', 'matches[password]');
        }

        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
        $this->form_validation->set_message('min_length', '{field} minimal 7 karakter');
        $this->form_validation->set_message('matches', '{field} wajib sama dengan password');
        $this->form_validation->set_message('numeric', '{field} wajib angka');
        $this->form_validation->set_message('max_length', '{field} maksimal 12 angka');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->profile->getData($id);
            if($query->num_rows() > 0){
                $data['title'] = 'Update Data Users | App Penjualan';
                $data['judul'] = 'Update Data Users';
                $data['data'] = $query->row();
                $this->template->load('template', 'profile_users/update', $data);
            }else{
                $this->session->set_flashdata('warning', 'Data Yang Anda Cari Tidak Tersedia, Silahkan Cari Data Yang Tersedia');
                redirect('profile_users');
            }
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
                        $this->profile->update($data);
                        if($this->db->affected_rows() > 0){
                            $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                            redirect('profile_users');
                        }else{
                            $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                            redirect('profile_users');
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Photo Gagal Di Upload, Pastikan Format Dan Size Yang Di Upload Benar');
                        redirect('profile_users');
                    }
                }else{
                    $data['image'] = null;
                    $this->profile->update($data);
                    if($this->db->affected_rows() > 0){
                        $this->session->set_flashdata('success', 'Selamat Anda Berhasil Mengupdate Data');
                        redirect('profile_users');
                    }else{
                        $this->session->set_flashdata('error', 'Anda Gagal Mengupdate Data');
                        redirect('profile_users');
                    }
                }
            }
        }
    }

    function username_check()
	{
		$pos = $this->input->post(null, true);
		$query = $this->db->query("SELECT * FROM users WHERE username = '$pos[username]' AND id_users != '$pos[id]' AND deleted_at IS NULL");
		if($query->num_rows() > 0){
			$this->form_validation->set_message('username_check', '{field} sudah ada, silahkan cari username lain');
			return false;
		}else{
			return true;
		}
	}
}
?>