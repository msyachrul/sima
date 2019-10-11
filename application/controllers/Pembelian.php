<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
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

    public function tampil_pembelian($pembelian_id = null)
    {
        if ($pembelian_id) {
            $data['halaman'] = 'pembelian/detail_pembelian';
            $data['pembelian'] = $this->db->select('pembelian.*, pengajuan.pengajuan_tanggal, pengajuan_status, aset.aset_nama, kelompok.kelompok_nama, user.user_nama')->join('pengajuan', 'pembelian.pengajuan_id = pengajuan.pengajuan_id')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('user', 'pengajuan.user_username = user.user_username')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->where('pembelian.pembelian_id', $pembelian_id)->get('pembelian')->row_array();
            $this->load->view('layout', $data);
        } else {
            $data['halaman'] = 'pembelian/tampil_pembelian';
            $data['pembelian'] = $this->db->join('pengajuan', 'pembelian.pengajuan_id = pengajuan.pengajuan_id')->order_by('pembelian.pembelian_tanggal', 'desc')->get('pembelian')->result_array();
            $this->load->view('layout', $data);
        }
    }

    public function tambah_pembelian()
    {
        $data['halaman'] = 'pembelian/tambah_pembelian';
        $data['pengajuan'] = $this->db->select('pengajuan.*, user.user_nama')->join('user', 'pengajuan.user_username = user.user_username')->where('pengajuan.pengajuan_status', 'disetujui')->order_by('pengajuan.pengajuan_tanggal', 'asc')->get('pengajuan')->result_array();
        $data['aset'] = $this->db->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->order_by('kelompok.kelompok_nama', 'asc')->get('aset')->result_array();

        $validasi_tambah = [
            [
                'field' => 'pembelian_tanggal',
                'label' => 'Tanggal Pembelian',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'pengajuan_id',
                'label' => 'Pengajuan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'

                ]
            ],
            [
                'field' => 'aset_id',
                'label' => 'Aset',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'pembelian_harga',
                'label' => 'Harga Barang',
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'greater_than' => 'Harga tidak boleh nol'
                ]
            ]
        ];

        $this->form_validation->set_rules($validasi_tambah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $tambah_pembelian = $this->db->insert('pembelian', $this->input->post(null, true));

            if ($tambah_pembelian) {
                $this->session->set_flashdata('notifikasi', 'Data pembelian berhasil ditambahkan');
                redirect('pembelian/tampil_pembelian');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data pembelian gagal ditambahkan');
                redirect('pembelian/tambah_pembelian');
            }
        }
    }

    public function ubah_pembelian($pembelian_id)
    {
        $data['halaman'] = 'pembelian/ubah_pembelian';
        $data['pembelian'] = $this->db->get_where('pembelian', ['pembelian_id' => $pembelian_id])->row_array();
        $data['pengajuan'] = $this->db->select('pengajuan.*, user.user_nama')->join('user', 'pengajuan.user_username = user.user_username')->where('pengajuan.pengajuan_status', 'disetujui')->order_by('pengajuan.pengajuan_tanggal', 'asc')->get('pengajuan')->result_array();
        $data['aset'] = $this->db->order_by('aset_nama', 'asc')->get('aset')->result_array();

        $validasi_tambah = [
            [
                'field' => 'pembelian_tanggal',
                'label' => 'Tanggal Pembelian',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'pengajuan_id',
                'label' => 'Pengajuan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'

                ]
            ],
            [
                'field' => 'aset_id',
                'label' => 'Aset',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'pembelian_harga',
                'label' => 'Harga Barang',
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                    'greater_than' => 'Harga tidak boleh nol'
                ]
            ]
        ];

        $this->form_validation->set_rules($validasi_tambah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $ubah_pembelian = $this->db->update('pembelian', $this->input->post(null, true), ['pembelian_id' => $pembelian_id]);

            if ($ubah_pembelian) {
                $this->session->set_flashdata('notifikasi', 'Data pembelian berhasil diubah');
                redirect('pembelian/tampil_pembelian');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data pembelian gagal diubah');
                redirect('pembelian/ubah_pembelian');
            }
        }
    }

    public function hapus_pembelian($pembelian_id)
    {
        $hapus_pembelian = $this->db->delete('pembelian', ['pembelian_id' => $pembelian_id]);

        if ($hapus_pembelian) {
            $this->session->set_flashdata('notifikasi', 'Data pembelian berhasil dihapus');
        } else {
            $this->session->set_flashdata('notifikasi', 'Data pembelian gagal dihapus');
        }
        redirect('pembelian/tampil_pembelian');
    }
}
