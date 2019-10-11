<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Mengelola Data Penyerahan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Penyerahan</h6>
        <a href="<?= base_url(); ?>penyerahan/tambah_penyerahan" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Tanggal</th>
                        <th>No Pembelian</th>
                        <th>Aset</th>
                        <th>Penanggung Jawab</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($penyerahan as $p) : ?>
                        <?php $nomor_pembelian = '02' . str_replace('-', '', $p['pembelian_tanggal']) . sprintf("%04d", $p['pembelian_id']); ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $p['penyerahan_tanggal']; ?></td>
                            <td><?= $nomor_pembelian; ?></td>
                            <td><?= $p['aset_nama']; ?></td>
                            <td><?= $p['user_nama']; ?></td>
                            <td class="d-flex justify-content-start">
                                <?php if ((time() - strtotime($p['penyerahan_tanggal'])) < (24 * 3600)) : ?>
                                    <a href="<?= base_url(); ?>penyerahan/ubah_penyerahan/<?= $p['penyerahan_id']; ?>" class="btn btn-info btn-sm mr-1">Ubah</a>
                                    <a href="<?= base_url(); ?>penyerahan/hapus_penyerahan/<?= $p['penyerahan_id']; ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Hapus data penyerahan <?= $nomor_pembelian; ?>')">Hapus</a>
                                <?php endif; ?>
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