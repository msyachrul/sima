<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penyerahan extends CI_Controller
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

    public function tampil_penyerahan()
    {
        $data['halaman'] = 'penyerahan/tampil_penyerahan';
        $data['penyerahan'] = $this->db->select('penyerahan.*, pembelian.*, aset.*, user.user_nama')->join('user', 'penyerahan.user_username = user.user_username')->join('pembelian', 'penyerahan.pembelian_id = pembelian.pembelian_id')->join('aset', 'pembelian.aset_id = aset.aset_id')->order_by('penyerahan.penyerahan_tanggal', 'desc')->order_by('aset.aset_nama', 'asc')->get('penyerahan')->result_array();
        $this->load->view('layout', $data);
    }

    public function tambah_penyerahan()
    {
        $data['halaman'] = 'penyerahan/tambah_penyerahan';
        $data['pembelian'] = $this->db->join('aset', 'pembelian.aset_id = aset.aset_id')->order_by('aset.aset_nama', 'asc')->order_by('pembelian.pembelian_id', 'asc')->get('pembelian')->result_array();
        $data['user'] = $this->db->order_by('user_nama', 'asc')->get('user')->result_array();

        $validasi_tambah = [
            [
                'field' => 'penyerahan_tanggal',
                'label' => 'Tanggal Penyerahan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'pembelian_id',
                'label' => 'Nama Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'user_username',
                'label' => 'Nama Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ]
        ];

        $this->form_validation->set_rules($validasi_tambah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $tambah_penyerahan = $this->db->insert('penyerahan', $this->input->post(null, true));

            if ($tambah_penyerahan) {
                $this->session->set_flashdata('notifikasi', 'Data penyerahan berhasil ditambahkan');
                redirect('penyerahan/tampil_penyerahan');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data penyerahan gagal ditambahkan');
                redirect('penyerahan/tambah_penyerahan');
            }
        }
    }

    public function ubah_penyerahan($penyeraha_id)
    {
        $data['halaman'] = 'penyerahan/ubah_penyerahan';
        $data['penyerahan'] = $this->db->get_where('penyerahan', ['penyerahan_id' => $penyeraha_id])->row_array();
        $data['pembelian'] = $this->db->join('aset', 'pembelian.aset_id = aset.aset_id')->order_by('aset.aset_nama', 'asc')->order_by('pembelian.pembelian_id', 'asc')->get('pembelian')->result_array();
        $data['user'] = $this->db->order_by('user_nama', 'asc')->get('user')->result_array();

        $validasi_ubah = [
            [
                'field' => 'penyerahan_tanggal',
                'label' => 'Tanggal Penyerahan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'pembelian_id',
                'label' => 'Nama Aset',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ],
            [
                'field' => 'user_username',
                'label' => 'Nama Penerima',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tolong isi bagian %s'
                ]
            ]
        ];

        $this->form_validation->set_rules($validasi_ubah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $ubah_penyerahan = $this->db->update('penyerahan', $this->input->post(null, true), ['penyerahan_id' => $penyeraha_id]);

            if ($ubah_penyerahan) {
                $this->session->set_flashdata('notifikasi', 'Data penyerahan berhasil diubah');
                redirect('penyerahan/tampil_penyerahan');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data penyerahan gagal diubah');
                redirect('penyerahan/ubah_penyerahan');
            }
        }
    }

    public function hapus_penyerahan($penyerahan_id)
    {
        $hapus_penyerahan = $this->db->delete('penyerahan', ['penyerahan_id' => $penyerahan_id]);

        if ($hapus_penyerahan) {
            $this->session->set_flashdata('notifikasi', 'Data penyerahan berhasil dihapus');
        } else {
            $this->session->set_flashdata('notifikasi', 'Data penyerahan gagal dihapus');
        }
        redirect('penyerahan/tampil_penyerahan');
    }
}
