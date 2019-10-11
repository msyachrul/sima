<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            $this->session->set_flashdata('notifikasi', 'Anda harus login terlebih dahulu');
            redirect('login');
        }

        $role_tersedia = ['administrator', 'direksi', 'karyawan'];

        if (is_bool(array_search($this->session->userdata('user')['user_role'], $role_tersedia))) {
            $this->session->set_flashdata('notifikasi', 'Anda tidak diperkenankan membuka menu ini');
            redirect('halaman_utama');
        }
    }

    public function tampil_pengajuan($pengajuan_id = null)
    {
        if ($pengajuan_id) {
            $data['halaman'] = 'pengajuan/detail_pengajuan';
            $data['pengajuan'] = $this->db->select('pengajuan.*, user.user_nama')->join('user', 'pengajuan.user_username = user.user_username')->where('pengajuan_id', $pengajuan_id)->get('pengajuan')->row_array();
        } else {
            $data['halaman'] = 'pengajuan/tampil_pengajuan';
            $data['pengajuan'] = $this->db->select('pengajuan.*, COUNT(pembelian.pembelian_id) as jumlah_data')->join('pembelian', 'pengajuan.pengajuan_id = pembelian.pengajuan_id', 'left')->group_by('pengajuan.pengajuan_id')->order_by('pengajuan_tanggal', 'desc')->get('pengajuan')->result_array();
        }
        $this->load->view('layout', $data);
    }

    public function tambah_pengajuan()
    {
        $data['halaman'] = 'pengajuan/tambah_pengajuan';

        $validasi_tambah = [
            [
                'field' => 'pengajuan_tanggal',
                'label' => 'Tanggal Pengajuan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ],
            ],
            [
                'field' => 'pengajuan_keterangan',
                'label' => 'Keterangan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ],
            ],
        ];

        $this->form_validation->set_rules($validasi_tambah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $tambah_pengajuan = $this->db->insert('pengajuan', $this->input->post(null, true));

            if ($tambah_pengajuan) {
                $this->session->set_flashdata('notifikasi', 'Data pengajuan berhasil ditambahkan');
                redirect('pengajuan/tampil_pengajuan');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data pengajuan gagal ditambahkan');
                redirect('pengajuan/tambah_pengajuan');
            }
        }
    }

    public function ubah_pengajuan($pengajuan_id)
    {
        $data['halaman'] = 'pengajuan/ubah_pengajuan';
        $data['pengajuan'] = $this->db->get_where('pengajuan', ['pengajuan_id' => $pengajuan_id])->row_array();

        $validasi_ubah = [
            [
                'field' => 'pengajuan_tanggal',
                'label' => 'Tanggal Pengajuan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ],
            ],
            [
                'field' => 'pengajuan_keterangan',
                'label' => 'Keterangan',
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Tolong isi bagian %s',
                ],
            ],
        ];

        $this->form_validation->set_rules($validasi_ubah);

        if (!$this->form_validation->run()) {
            $this->load->view('layout', $data);
        } else {
            $ubah_pengajuan = $this->db->update('pengajuan', $this->input->post(null, true), ['pengajuan_id' => $pengajuan_id]);

            if ($ubah_pengajuan) {
                $this->session->set_flashdata('notifikasi', 'Data pengajuan berhasil diubah');
                redirect('pengajuan/tampil_pengajuan');
            } else {
                $this->session->set_flashdata('notifikasi', 'Data pengajuan gagal diubah');
                redirect('pengajuan/ubah_pengajuan');
            }
        }
    }

    public function hapus_pengajuan($pengajuan_id)
    {
        $hapus_pengajuan = $this->db->delete('pengajuan', ['pengajuan_id' => $pengajuan_id]);

        if ($hapus_pengajuan) {
            $this->session->set_flashdata('notifikasi', 'Data pengajuan berhasil dihapus');
        } else {
            $this->session->set_flashdata('notifikasi', 'Data pengajuan gagal dihapus');
        }
        redirect('pengajuan/tampil_pengajuan');
    }
}
