<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            $this->session->set_flashdata('notifikasi', 'Anda harus login terlebih dahulu');
            redirect('login');
        }

        $role_tersedia = ['administrator'];

        if (is_bool(array_search($this->session->userdata('user')['user_role'], $role_tersedia))) {
            $this->session->set_flashdata('notifikasi', 'Anda tidak diperkenankan membuka menu ini');
            redirect('halaman_utama');
        }
    }

    public function tampil_user()
    {
        $data['halaman'] = 'user/tampil_user';
        $data['user'] = $this->db->order_by('user_nama', 'asc')->get('user')->result_array();
        $this->load->view('layout', $data);
    }

    public function tambah_user()
    {
        $data['halaman'] = 'user/tambah_user';

        $validasi_config = [
            [
                'field' => 'user_username',
                'label' => 'Username',
                'rules' => 'required|trim|is_unique[user.user_username]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'is_unique' => 'Username sudah terpakai'
                ]
            ],
            [
                'field' => 'user_nama',
                'label' => 'Nama',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'user_password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[3]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'min_length' => 'Panjang terlalu pendek'
                ]
            ],
            [
                'field' => 'user_password_konfirmasi',
                'label' => 'Password Konfirmasi',
                'rules' => 'required|trim|matches[user_password]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'matches' => 'Password konfirmasi tidak sama'
                ]
            ]
        ];

        $this->form_validation->set_rules($validasi_config);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $data_tambah = [
                'user_username' => strtolower($this->input->post('user_username', true)),
                'user_nama' => $this->input->post('user_nama', true),
                'user_telepon' => $this->input->post('user_telepon', true),
                'user_password' => password_hash($this->input->post('user_password', true), PASSWORD_DEFAULT),
                'user_role' => $this->input->post('user_role', true)
            ];

            $tambah_user = $this->db->insert('user', $data_tambah);

            if ($tambah_user) {
                $this->session->set_flashdata('notifikasi', 'Data user berhasil ditambahkan');
                redirect('user/tampil_user');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data user gagal ditambahkan');
                redirect('user/tambah_user');
            }
        }
    }

    public function ubah_user($user_username)
    {
        $data['halaman'] = 'user/ubah_user';
        $data['user'] = $this->db->get_where('user', ['user_username' => $user_username])->row_array();

        $validasi_config = [];

        if ($this->input->post('user_username') != $user_username) {
            $validasi_config[] = [
                'field' => 'user_username',
                'label' => 'Username',
                'rules' => 'required|trim|is_unique[user.user_username]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'is_unique' => 'Username sudah terpakai'
                ]
            ];
        } else {
            $validasi_config[] = [
                'field' => 'user_username',
                'label' => 'Username',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ]
            ];
        }

        $validasi_config[] = [
            'field' => 'user_nama',
            'label' => 'Nama',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Tolong isi bagian %s'
            ]
        ];

        if ($this->input->post('user_password')) {
            $validasi_config[] = [
                'field' => 'user_password',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[3]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'min_length' => 'Panjang terlalu pendek (minimal 3 karakter)'
                ]
            ];
            $validasi_config[] = [
                'field' => 'user_password_konfirmasi',
                'label' => 'Password Konfirmasi',
                'rules' => 'required|trim|matches[user_password]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'matches' => 'Password konfirmasi tidak sama'
                ]
            ];
        }

        $this->form_validation->set_rules($validasi_config);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $data_ubah = [
                'user_username' => strtolower($this->input->post('user_username', true)),
                'user_nama' => $this->input->post('user_nama', true),
                'user_telepon' => $this->input->post('user_telepon', true),
                'user_role' => $this->input->post('user_role', true)
            ];

            if ($this->input->post('user_password')) {
                $data_ubah['user_password'] = password_hash($this->input->post('user_password', true), PASSWORD_DEFAULT);
            }

            $ubah_user = $this->db->update('user', $data_ubah, ['user_username' => $user_username]);
            if ($ubah_user) {
                $this->session->set_flashdata('notifikasi', 'Data user berhasil diubah');
                redirect('user/tampil_user');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data user gagal diubah');
                redirect('user/ubah_user' . $user_username);
            }
        }
    }

    public function hapus_user($user_username)
    {
        $hapus_user = $this->db->delete('user', ['user_username' => $user_username]);

        if ($hapus_user) {
            $this->session->set_flashdata('notifikasi', 'Data user berhasil dihapus');
        } else {
            $this->session->set_flashdata('notifikasi', 'Data user gagal dihapus');
        }
        redirect('user/tampil_user');
    }
}
