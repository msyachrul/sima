<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Detail Nilai Persediaan</h1>

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <div class="row mx-0 align-items-center justify-content-between">
                <p class="card-title">Nama Aset : <strong><?= $nilai_persediaan[0]['aset_nama']; ?></strong></p>
                <p class="card-title">Kelompok : <strong><?= ucwords($nilai_persediaan[0]['kelompok_nama']); ?></strong></p>
                <p class="card-title">Masa Manfaat : <strong><?= $nilai_persediaan[0]['aset_masa_manfaat']; ?> Tahun</strong></p>
            </div>
            <hr class="mt-0">
            <p class="card-title font-weight-bold">Data Pembelian</p>
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nomor Pembelian</th>
                            <th>Tanggal Pembelian</th>
                            <th>Harga</th>
                            <th>Nomor Pengajuan</th>
                            <th>Yang Mengajukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($nilai_persediaan as $p) : ?>
                            <?php $nomor_pembelian = '02' . str_replace('-', '', $p['pembelian_tanggal']) . sprintf("%04d", $p['pembelian_id']); ?>
                            <?php $nomor_pengajuan = '01' . str_replace('-', '', $p['pengajuan_tanggal']) . sprintf("%04d", $p['pengajuan_id']); ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $nomor_pembelian; ?></td>
                                <td><?= date('d F Y', strtotime($p['pembelian_tanggal'])); ?></td>
                                <td>Rp <?= number_format($p['pembelian_harga']); ?></td>
                                <td><?= $nomor_pengajuan; ?></td>
                                <td><?= $p['user_nama']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url(); ?>laporan/cetak_nilai_persediaan/<?= $nilai_persediaan[0]['aset_id']; ?>" target="_blank" class="btn btn-primary">Cetak</a>
        </div>
    </div>
</div>