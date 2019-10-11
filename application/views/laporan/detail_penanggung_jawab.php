<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Detail Penanggung Jawab</h1>

<!-- DataTales Example -->
<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <p class="card-title mb-1">Nama Aset</p>
            <p class="card-title font-weight-bold"><?= $penanggung_jawab[0]['aset_nama']; ?></p>
            <p class="card-title mb-1">Kelompok</p>
            <p class="card-title font-weight-bold"><?= ucwords($penanggung_jawab[0]['kelompok_nama']); ?></p>
            <p class="card-title mb-1">Masa Manfaat</p>
            <p class="card-title font-weight-bold"><?= $penanggung_jawab[0]['aset_masa_manfaat']; ?> Tahun</p>
            <p class="card-title mb-1">Tanggal Pembelian</p>
            <p class="card-title font-weight-bold"><?= date('d F Y', strtotime($penanggung_jawab[0]['pembelian_tanggal'])); ?></p>
            <p class="card-title mb-1">Nomor Pembelian</p>
            <?php $nomor_pembelian = '02' . str_replace('-', '', $penanggung_jawab[0]['pembelian_tanggal']) . sprintf("%04d", $penanggung_jawab[0]['pembelian_id']); ?>
            <p class="card-title font-weight-bold"><?= $nomor_pembelian; ?></p>
            <hr class="mt-0">
            <p class="card-title font-weight-bold">Data Penyerahan</p>
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th width="20%">Penanggung Jawab</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($penanggung_jawab as $p) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= date('d F Y', strtotime($p['penyerahan_tanggal'])); ?></td>
                                <td><?= $p['user_nama']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url(); ?>laporan/cetak_penanggung_jawab/<?= $penanggung_jawab[0]['pembelian_id']; ?>" target="_blank" class="btn btn-primary">Cetak</a>
        </div>
    </div>
</div>