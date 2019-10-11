<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Laporan Penanggung Jawab</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Penanggung Jawab</h6>
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
                        <th width="20%">Penanggung Jawab Terakhir</th>
                        <th width="5%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($penanggung_jawab as $p) : ?>
                        <?php $nomor_pembelian = '02' . str_replace('-', '', $p['pembelian_tanggal']) . sprintf("%04d", $p['pembelian_id']); ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $nomor_pembelian; ?></td>
                            <td><?= $p['aset_nama']; ?></td>
                            <td><?= ucwords($p['kelompok_nama']); ?></td>
                            <td><?= $p['user_nama']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>laporan/tampil_penanggung_jawab/<?= $p['pembelian_id']; ?>" class="btn btn-primary btn-sm mr-1">Detail</a>
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