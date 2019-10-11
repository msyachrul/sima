<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            $this->session->set_flashdata('notifikasi', 'Anda harus login terlebih dahulu');
            redirect('login');
        }

        $role_tersedia = ['administrator', 'direksi'];

        if (is_bool(array_search($this->session->userdata('user')['user_role'], $role_tersedia))) {
            $this->session->set_flashdata('notifikasi', 'Anda tidak diperkenankan membuka menu ini');
            redirect('halaman_utama');
        }
    }

    public function tampil_aset()
    {
        $data['halaman'] = 'aset/tampil_aset';
        $data['aset'] = $this->db->select('aset.*, kelompok.kelompok_nama')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->order_by('aset.aset_nama', 'asc')->get('aset')->result_array();
        $this->load->view('layout', $data);
    }

    public function tambah_aset()
    {
        $data['halaman'] = 'aset/tambah_aset';
        $data['kelompok'] = $this->db->order_by('kelompok_nama', 'asc')->get('kelompok')->result_array();

        $validasi_tambah = [
            [
                'field' => 'aset_nama',
                'label' => 'Nama Aset',
                'rules' => 'required|trim|is_unique[aset.aset_nama]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'is_unique' => 'Nama aset sudah ada'
                ],
            ],
            [
                'field' => 'kelompok_id',
                'label' => 'Kelompok Aset',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ],
            ],
            [
                'field' => 'aset_masa_manfaat',
                'label' => 'Masa Manfaat',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ],
            ]
        ];

        $this->form_validation->set_rules($validasi_tambah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $tambah_aset = $this->db->insert('aset', $this->input->post(null, true));

            if ($tambah_aset) {
                $this->session->set_flashdata('notifikasi', 'Data aset berhasil ditambahkan');
                redirect('aset/tampil_aset');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data aset gagal ditambahkan');
                redirect('aset/tambah_aset');
            }
        }
    }

    public function ubah_aset($aset_id)
    {
        $data['halaman'] = 'aset/ubah_aset';
        $data['aset'] = $this->db->get_where('aset', ['aset_id' => $aset_id])->row_array();
        $data['kelompok'] = $this->db->order_by('kelompok_nama', 'asc')->get('kelompok')->result_array();

        $validasi_ubah = [];

        if ($this->input->post('aset_nama') != $data['aset']['aset_nama']) {
            $validasi_ubah[] = [
                'field' => 'aset_nama',
                'label' => 'Nama Aset',
                'rules' => 'required|trim|is_unique[aset.aset_nama]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'is_unique' => 'Nama aset sudah ada'
                ],
            ];
        } else {
            $validasi_ubah[] = [
                'field' => 'aset_nama',
                'label' => 'Nama Aset',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ],
            ];
        }

        $validasi_ubah[] = [
            'field' => 'kelompok_id',
            'label' => 'Kelompok Aset',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Tolong isi bagian %s',
            ],
        ];

        $validasi_ubah[] = [
            'field' => 'aset_masa_manfaat',
            'label' => 'Masa Manfaat',
            'rules' => 'required|trim',
            'errors' => [
                'required' => 'Tolong isi bagian %s',
            ],
        ];

        $this->form_validation->set_rules($validasi_ubah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $ubah_aset = $this->db->update('aset', $this->input->post(null, true), ['aset_id' => $aset_id]);

            if ($ubah_aset) {
                $this->session->set_flashdata('notifikasi', 'Data aset berhasil diubah');
                redirect('aset/tampil_aset');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data aset gagal diubah');
                redirect('aset/ubah_aset');
            }
        }
    }

    public function hapus_aset($aset_id)
    {
        $hapus_aset = $this->db->delete('aset', ['aset_id' => $aset_id]);

        if ($hapus_aset) {
            $this->session->set_flashdata('notifikasi', 'Data aset berhasil dihapus');
        } else {
            $this->session->set_flashdata('notifikasi', 'Data aset gagal dihapus');
        }
        redirect('aset/tampil_aset');
    }
}
