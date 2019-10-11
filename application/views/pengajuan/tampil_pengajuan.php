<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Mengelola Data Pengajuan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Pengajuan</h6>
        <a href="<?= base_url(); ?>pengajuan/tambah_pengajuan" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Nomor Pengajuan</th>
                        <th>Tanggal</th>
                        <th width="10%">Status</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pengajuan as $p) : ?>
                        <?php $nomor = '01' . str_replace('-', '', $p['pengajuan_tanggal']) . sprintf("%04d", $p['pengajuan_id']); ?>
                        <?php $status = ucwords($p['pengajuan_status']); ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $nomor; ?></td>
                            <td><?= $p['pengajuan_tanggal']; ?></td>
                            <td><?= $status; ?></td>
                            <td class="d-flex justify-content-start">
                                <a href="<?= base_url(); ?>pengajuan/tampil_pengajuan/<?= $p['pengajuan_id']; ?>" class="btn btn-primary btn-sm mr-1">Detail</a>
                                <?php if ($p['pengajuan_status'] != 'selesai') : ?>
                                    <a href="<?= base_url(); ?>pengajuan/ubah_pengajuan/<?= $p['pengajuan_id']; ?>" class="btn btn-info btn-sm mr-1">Ubah</a>
                                <?php endif; ?>
                                <?php if ($p['jumlah_data'] < 1) : ?>
                                    <a href="<?= base_url(); ?>pengajuan/hapus_pengajuan/<?= $p['pengajuan_id']; ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Hapus data pengajuan <?= $nomor; ?>')">Hapus</a>
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