<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Laporan Nilai Ekonomi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Nilai Ekonomi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>No Pembelian</th>
                        <th>Nama Aset</th>
                        <th>Kelompok</th>
                        <th width="15%">Harga Beli</th>
                        <th width="15%">Nilai Ekonomi <?= date('Y'); ?></th>
                        <th width="5%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($nilai_ekonomi as $p) : ?>
                        <?php $nomor_pembelian = '02' . str_replace('-', '', $p['pembelian_tanggal']) . sprintf("%04d", $p['pembelian_id']); ?>
                        <?php $perbedaan_tahun = date_diff(date_create(date('Y-m-d')), date_create($p['pembelian_tanggal']))->format('%y'); ?>
                        <?php $ne = ($p['pembelian_harga'] - ($p['nilai_penyusutan'] * $perbedaan_tahun)) > 0 ? $p['pembelian_harga'] - ($p['nilai_penyusutan'] * $perbedaan_tahun) : 0; ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $nomor_pembelian; ?></td>
                            <td><?= $p['aset_nama']; ?></td>
                            <td><?= ucwords($p['kelompok_nama']); ?></td>
                            <td class="text-right">Rp <?= number_format($p['pembelian_harga']); ?></td>
                            <td class="text-right">Rp <?= number_format($ne); ?></td>
                            <td>
                                <a href="<?= base_url(); ?>laporan/tampil_nilai_ekonomi/<?= $p['pembelian_id']; ?>" class="btn btn-primary btn-sm mr-1">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
            </script>
        </div>
    </div>
</div>