<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman_utama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('user')) {
            $this->session->set_flashdata('notifikasi', 'Anda harus login terlebih dahulu');
            redirect('login');
        }
    }

    public function index()
    {
        $data['halaman'] = 'halaman_utama';
        $data['pengajuan'] = $this->db->select('COUNT(pengajuan.pengajuan_id) as jumlah_data')->where('pengajuan.pengajuan_status', 'terkirim')->get('pengajuan')->row_array();
        $data['pembelian'] = $this->db->select('COUNT(pembelian.pembelian_id) as jumlah_data, SUM(pembelian.pembelian_harga) as nominal_pembelian')->join('aset', 'pembelian.aset_id = aset.aset_id')->like('CAST(pembelian.pembelian_tanggal as CHAR)', date('Y'), 'right')->get('pembelian')->row_array();
        $data['aset'] = $this->db->query('SELECT SUM(IF(FLOOR(DATEDIFF(CURDATE(), pembelian.pembelian_tanggal) / DAYOFYEAR(CONCAT(SUBSTR(CURDATE(), 1, 4), "-12-31"))) <= aset.aset_masa_manfaat, (pembelian.pembelian_harga - (FLOOR(pembelian.pembelian_harga / aset.aset_masa_manfaat) * FLOOR(DATEDIFF(CURDATE(), pembelian.pembelian_tanggal) / DAYOFYEAR(CONCAT(SUBSTR(CURDATE(), 1, 4), "-12-31"))))), 0)) as nilai_ekonomi FROM pembelian JOIN aset ON pembelian.aset_id = aset.aset_id')->row_array();
        $data['kelompok'] = json_encode($this->db->select('kelompok.kelompok_nama, COUNT(pembelian.pembelian_id) as jumlah_data')->join('aset', 'pembelian.aset_id = aset.aset_id')->join('kelompok', 'aset.kelompok_id = kelompok.kelompok_id')->group_by('kelompok.kelompok_id')->get('pembelian')->result_array());
        $data['penanggung_jawab'] = json_encode($this->db->query("SELECT fdata.user_nama, COUNT(fdata.aset_nama) as jumlah_data FROM (SELECT user.user_username, user.user_nama, aset.aset_nama, MAX(penyerahan_tanggal) as penyerahan_tanggal FROM penyerahan JOIN pembelian ON penyerahan.pembelian_id = pembelian.pembelian_id JOIN user ON penyerahan.user_username = user.user_username JOIN aset ON pembelian.aset_id = aset.aset_id GROUP BY pembelian.pembelian_id ORDER BY penyerahan_tanggal DESC
        ) as fdata GROUP BY fdata.user_nama")->result_array());
        $this->load->view('layout', $data);
    }
}
