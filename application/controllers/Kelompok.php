<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelompok extends CI_Controller
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

    public function tampil_kelompok()
    {
        $data['halaman'] = 'kelompok/tampil_kelompok';
        $data['kelompok'] = $this->db->select('kelompok.*, COUNT(aset.aset_id) as jumlah_data')->join('aset', 'kelompok.kelompok_id = aset.kelompok_id', 'left')->group_by('kelompok.kelompok_id')->order_by('kelompok.kelompok_nama', 'asc')->get('kelompok')->result_array();
        $this->load->view('layout', $data);
    }

    public function tambah_kelompok()
    {
        $data['halaman'] = 'kelompok/tambah_kelompok';

        $validasi_tambah = [
            [
                'field' => 'kelompok_nama',
                'label' => 'Nama Kelompok',
                'rules' => 'required|trim|is_unique[kelompok.kelompok_nama]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'is_unique' => 'Nama kelompok sudah ada'
                ]
            ]
        ];

        $this->form_validation->set_rules($validasi_tambah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $kelompok_nama = strtolower($this->input->post('kelompok_nama', true));
            $kelompok = $this->db->insert('kelompok', ['kelompok_nama' => $kelompok_nama]);

            if ($kelompok) {
                $this->session->set_flashdata('notifikasi', 'Data kelompok aset berhasil ditambahkan');
                redirect('kelompok/tampil_kelompok');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data kelompok aset gagal ditambahkan');
                redirect('kelompok/tambah_kelompok');
            }
        }
    }

    public function ubah_kelompok($kelompok_id)
    {
        $data['halaman'] = 'kelompok/ubah_kelompok';
        $data['kelompok'] = $this->db->get_where('kelompok', ['kelompok_id' => $kelompok_id])->row_array();

        if ($this->input->post('kelompok_nama') != $data['kelompok']['kelompok_nama']) {
            $validasi_ubah = [
                [
                    'field' => 'kelompok_nama',
                    'label' => 'Nama Kelompok',
                    'rules' => 'required|trim|is_unique[kelompok.kelompok_nama]',
                    'errors' => [
                        'required' => 'Tolong isi bagian %s',
                        'is_unique' => 'Nama kelompok sudah ada'
                    ]
                ]
            ];
        } else {
            $validasi_ubah = [
                [
                    'field' => 'kelompok_nama',
                    'label' => 'Nama Kelompok',
                    'rules' => 'required|trim',
                    'errors' => [
                        'required' => 'Tolong isi bagian %s',
                    ]
                ]
            ];
        }

        $this->form_validation->set_rules($validasi_ubah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $kelompok_nama = strtolower($this->input->post('kelompok_nama', true));
            $kelompok = $this->db->update('kelompok', ['kelompok_nama' => $kelompok_nama], ['kelompok_id' => $kelompok_id]);

            if ($kelompok) {
                $this->session->set_flashdata('notifikasi', 'Data kelompok aset berhasil diubah');
                redirect('kelompok/tampil_kelompok');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data kelompok aset gagal diubah');
                redirect('kelompok/ubah_kelompok');
            }
        }
    }

    public function hapus_kelompok($kelompok_id)
    {
        $hapus_kelompok = $this->db->delete('kelompok', ['kelompok_id' => $kelompok_id]);

        if ($hapus_kelompok) {
            $this->session->set_flashdata('notifikasi', 'Data kelompok aset berhasil dihapus');
        } else {
            $this->session->set_flashdata('notifikasi', 'Data kelompok aset gagal dihapus');
        }
        redirect('kelompok/tampil_kelompok');
    }
}
