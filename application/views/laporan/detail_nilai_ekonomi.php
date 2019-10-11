<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Detail Nilai Ekonomi</h1>

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <p class="card-title mb-1">Nama Aset</p>
            <p class="card-title font-weight-bold"><?= $nilai_ekonomi['aset_nama']; ?></p>
            <p class="card-title mb-1">Kelompok</p>
            <p class="card-title font-weight-bold"><?= ucwords($nilai_ekonomi['kelompok_nama']); ?></p>
            <p class="card-title mb-1">Masa Manfaat</p>
            <p class="card-title font-weight-bold"><?= $nilai_ekonomi['aset_masa_manfaat']; ?> Tahun</p>
            <p class="card-title mb-1">Tanggal Pembelian</p>
            <p class="card-title font-weight-bold"><?= date('d F Y', strtotime($nilai_ekonomi['pembelian_tanggal'])); ?></p>
            <p class="card-title mb-1">Nomor Pembelian</p>
            <?php $nomor_pembelian = '02' . str_replace('-', '', $nilai_ekonomi['pembelian_tanggal']) . sprintf("%04d", $nilai_ekonomi['pembelian_id']); ?>
            <p class="card-title font-weight-bold"><?= $nomor_pembelian; ?></p>
            <p class="card-title mb-1">Harga Beli</p>
            <p class="card-title font-weight-bold">Rp <?= number_format($nilai_ekonomi['pembelian_harga']); ?></p>
            <p class="card-title mb-1">Nilai Penyusutan Per Tahun</p>
            <p class="card-title font-weight-bold">Rp <?= number_format($nilai_ekonomi['nilai_penyusutan']); ?></p>
            <hr class="mt-0">
            <p class="card-title font-weight-bold">Tabel Penyusutan</p>
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Harga Beli</th>
                            <th>Nilai Penyusutan</th>
                            <th>Nilai Ekonomi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php for ($i = 1; $i <= $nilai_ekonomi['aset_masa_manfaat']; $i++) : ?>
                            <?php $arrayTanggal = explode('-', $nilai_ekonomi['pembelian_tanggal']); ?>
                            <?php $str_time = strtotime(($arrayTanggal[0] + $i) . '-' . $arrayTanggal[1] . '-' . $arrayTanggal[2]) ?>
                            <?php $np = $nilai_ekonomi['nilai_penyusutan'] * $i; ?>
                            <?php $ne = $nilai_ekonomi['pembelian_harga'] - $np; ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= date('d F Y', $str_time); ?></td>
                                <td>Rp <?= number_format($nilai_ekonomi['pembelian_harga']); ?></td>
                                <td>Rp <?= number_format($np); ?></td>
                                <td>Rp <?= number_format($ne); ?></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url(); ?>laporan/cetak_nilai_ekonomi/<?= $nilai_ekonomi['pembelian_id']; ?>" target="_blank" class="btn btn-primary">Cetak</a>
        </div>
    </div>
</div>