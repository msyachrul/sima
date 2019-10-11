<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        if ($this->session->userdata('user')) {
            $this->session->set_flashdata('notifikasi', 'Anda sudah login');
            redirect('halaman_utama');
        }

        $validasi_login = [
            [
                'field' => 'user_username',
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ]
            ],
            [
                'field' => 'user_password',
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ]
            ]
        ];

        $this->form_validation->set_rules($validasi_login);

        if (!$this->form_validation->run()) {
            $this->load->view('login');
        } else {
            $user_username = $this->input->post('user_username', true);
            $user_password = $this->input->post('user_password', true);
            $tampil_user = $this->db->get_where('user', ['user_username' => $user_username])->row_array();

            if (!$tampil_user) {
                $this->session->set_flashdata('notifikasi_username', '<div class="invalid-feedback">User <strong>' . $user_username . '</strong> tidak ditemukan</div>');
                redirect('login');
            }

            if (!password_verify($user_password, $tampil_user['user_password'])) {
                $this->session->set_flashdata('notifikasi_password', '<div class="invalid-feedback">Password salah</div>');
                redirect('login');
            } else {
                $this->session->set_userdata('user', $tampil_user);
                $this->session->set_flashdata('notifikasi', 'Selamat datang ' . $tampil_user['user_nama']);
                redirect('halaman_utama');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->set_flashdata('notifikasi', 'Anda telah logout');
        redirect('login');
    }
}
