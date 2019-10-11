<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Laporan Nilai Persediaan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Nilai Persediaan</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Nama Aset</th>
                        <th>Kelompok</th>
                        <th width="10%">Kuantitas</th>
                        <th width="15%">Pembelian Terakhir</th>
                        <th width="5%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($nilai_persediaan as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $p['aset_nama']; ?></td>
                            <td><?= ucwords($p['kelompok_nama']); ?></td>
                            <td class="text-right"><?= $p['jumlah_data']; ?></td>
                            <td><?= $p['pembelian_tanggal']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>laporan/tampil_nilai_persediaan/<?= $p['aset_id']; ?>" class="btn btn-primary btn-sm mr-1">Detail</a>
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