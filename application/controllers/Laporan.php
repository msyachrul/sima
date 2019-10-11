<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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

    public function tampil_nilai_persediaan($aset_id = null)
    {
        if ($aset_id) {
            $data['halaman'] = 'laporan/detail_nilai_persediaan';
            $data['nilai_persediaan'] = $this->db->join('pengajuan', 'pembelian.pengajuan_id = pengajuan.pengajuan_id')->join('user', 'pengajuan.user_username = user.user_username')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->where('aset.aset_id', $aset_id)->order_by('pembelian.pembelian_tanggal', 'desc')->get('pembelian')->result_array();
        } else {
            $data['halaman'] = 'laporan/nilai_persediaan';
            $data['nilai_persediaan'] = $this->db->select('aset.*, kelompok.*, MAX(pembelian.pembelian_tanggal) as pembelian_tanggal, COUNT(pembelian.pembelian_id) as jumlah_data')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->group_by('aset.aset_id')->order_by('aset.aset_nama', 'asc')->get('pembelian')->result_array();
        }
        $this->load->view('layout', $data);
    }

    public function cetak_nilai_persediaan($aset_id)
    {
        $data['halaman'] = 'laporan/cetak_nilai_persediaan';
        $data['nilai_persediaan'] = $this->db->join('pengajuan', 'pembelian.pengajuan_id = pengajuan.pengajuan_id')->join('user', 'pengajuan.user_username = user.user_username')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->where('aset.aset_id', $aset_id)->order_by('pembelian.pembelian_tanggal', 'desc')->get('pembelian')->result_array();
        $this->load->view('layout_cetak', $data);
    }

    public function tampil_nilai_ekonomi($pembelian_id = null)
    {
        if ($pembelian_id) {
            $data['halaman'] = 'laporan/detail_nilai_ekonomi';
            $data['nilai_ekonomi'] = $this->db->select('pembelian.*, aset.*, kelompok.*, FLOOR(pembelian.pembelian_harga / aset.aset_masa_manfaat) as nilai_penyusutan')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->where('pembelian.pembelian_id', $pembelian_id)->get('pembelian')->row_array();
        } else {
            $data['halaman'] = 'laporan/nilai_ekonomi';
            $data['nilai_ekonomi'] = $this->db->select('pembelian.*, aset.*, kelompok.*, FLOOR(pembelian.pembelian_harga / aset.aset_masa_manfaat) as nilai_penyusutan')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->order_by('pembelian.pembelian_tanggal', 'desc')->get('pembelian')->result_array();
        }
        $this->load->view('layout', $data);
    }

    public function cetak_nilai_ekonomi($pembelian_id)
    {
        $data['halaman'] = 'laporan/cetak_nilai_ekonomi';
        $data['nilai_ekonomi'] = $this->db->select('pembelian.*, aset.*, kelompok.*, FLOOR(pembelian.pembelian_harga / aset.aset_masa_manfaat) as nilai_penyusutan')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->where('pembelian.pembelian_id', $pembelian_id)->get('pembelian')->row_array();
        $this->load->view('layout_cetak', $data);
    }

    public function tampil_penanggung_jawab($pembelian_id = null)
    {
        if ($pembelian_id) {
            $data['halaman'] = 'laporan/detail_penanggung_jawab';
            $data['penanggung_jawab'] = $this->db->select('pembelian.*, aset.*, kelompok.*, penyerahan.*, user.user_nama')->join('pembelian', 'penyerahan.pembelian_id = pembelian.pembelian_id')->join('user', 'penyerahan.user_username = user.user_username')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->where('pembelian.pembelian_id', $pembelian_id)->order_by('penyerahan.penyerahan_tanggal', 'desc')->get('penyerahan')->result_array();
        } else {
            $data['halaman'] = 'laporan/penanggung_jawab';
            $data['penanggung_jawab'] = $this->db->select('pembelian.*, aset.*, kelompok.*, MAX(penyerahan.penyerahan_tanggal) as penyerahan_tanggal, user.user_nama')->join('pembelian', 'penyerahan.pembelian_id = pembelian.pembelian_id')->join('user', 'penyerahan.user_username = user.user_username')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->group_by('pembelian.pembelian_id')->order_by('penyerahan.penyerahan_tanggal', 'desc')->order_by('aset.aset_nama', 'asc')->get('penyerahan')->result_array();
        }
        $this->load->view('layout', $data);
    }

    public function cetak_penanggung_jawab($pembelian_id)
    {
        $data['halaman'] = 'laporan/cetak_penanggung_jawab';
        $data['penanggung_jawab'] = $this->db->select('pembelian.*, aset.*, kelompok.*, penyerahan.*, user.user_nama')->join('pembelian', 'penyerahan.pembelian_id = pembelian.pembelian_id')->join('user', 'penyerahan.user_username = user.user_username')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->where('pembelian.pembelian_id', $pembelian_id)->order_by('penyerahan.penyerahan_tanggal', 'desc')->get('penyerahan')->result_array();
        $this->load->view('layout_cetak', $data);
    }
}
