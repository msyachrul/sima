<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Mengelola Data Aset</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Aset</h6>
        <a href="<?= base_url(); ?>aset/tambah_aset" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Kelompok</th>
                        <th width="10%" class="text-center">Masa Manfaat</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($aset as $a) : ?>
                        <?php $aset_nama = $a['aset_nama']; ?>
                        <?php $kelompok_nama = ucwords($a['kelompok_nama']); ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $aset_nama; ?></td>
                            <td><?= $kelompok_nama; ?></td>
                            <td class="text-right"><?= $a['aset_masa_manfaat']; ?> Tahun</td>
                            <td class="d-flex justify-content-start">
                                <a href="<?= base_url(); ?>aset/ubah_aset/<?= $a['aset_id']; ?>" class="btn btn-info btn-sm mr-1">Ubah</a>
                                <a href="<?= base_url(); ?>aset/hapus_aset/<?= $a['aset_id']; ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Hapus data aset <?= $aset_nama; ?>')">Hapus</a>
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