<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Mengelola Data Kelompok Aset</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Kelompok Aset</h6>
        <a href="<?= base_url(); ?>kelompok/tambah_kelompok" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Nama</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kelompok as $k) : ?>
                        <?php $nama = ucwords($k['kelompok_nama']); ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $nama; ?></td>
                            <td class="d-flex justify-content-start">
                                <a href="<?= base_url(); ?>kelompok/ubah_kelompok/<?= $k['kelompok_id']; ?>" class="btn btn-info btn-sm mr-1">Ubah</a>
                                <?php if ($k['jumlah_data'] < 1) : ?>
                                    <a href="<?= base_url(); ?>kelompok/hapus_kelompok/<?= $k['kelompok_id']; ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Hapus data kelompok aset <?= $nama; ?>')">Hapus</a>
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