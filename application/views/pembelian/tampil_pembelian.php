<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Mengelola Data Pembelian</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Pembelian</h6>
        <a href="<?= base_url(); ?>pembelian/tambah_pembelian" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Nomor Pembelian</th>
                        <th>Nomor Pengajuan</th>
                        <th>Tanggal</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pembelian as $p) : ?>
                        <?php $nomor_pembelian = '02' . str_replace('-', '', $p['pembelian_tanggal']) . sprintf("%04d", $p['pembelian_id']); ?>
                        <?php $nomor_pengajuan = '01' . str_replace('-', '', $p['pengajuan_tanggal']) . sprintf("%04d", $p['pengajuan_id']); ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $nomor_pembelian; ?></td>
                            <td><?= $nomor_pengajuan; ?></td>
                            <td><?= $p['pembelian_tanggal']; ?></td>
                            <td class="d-flex justify-content-start">
                                <a href="<?= base_url(); ?>pembelian/tampil_pembelian/<?= $p['pembelian_id']; ?>" class="btn btn-primary btn-sm mr-1">Detail</a>
                                <?php if ($p['pengajuan_status'] != 'selesai') : ?>
                                    <a href="<?= base_url(); ?>pembelian/ubah_pembelian/<?= $p['pembelian_id']; ?>" class="btn btn-info btn-sm mr-1">Ubah</a>
                                    <a href="<?= base_url(); ?>pembelian/hapus_pembelian/<?= $p['pembelian_id']; ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Hapus data pembelian <?= $nomor_pembelian; ?>')">Hapus</a>
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