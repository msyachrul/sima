<div class="d-flex align-items-center justify-content-between">
    <p class="card-title">Nama Aset : <strong><?= $nilai_persediaan[0]['aset_nama']; ?></strong></p>
    <p class="card-title">Kelompok : <strong><?= ucwords($nilai_persediaan[0]['kelompok_nama']); ?></strong></p>
    <p class="card-title">Masa Manfaat : <strong><?= $nilai_persediaan[0]['aset_masa_manfaat']; ?> Tahun</strong></p>
</div>
<hr class="mt-0">
<p class="card-title font-weight-bold">Data Pembelian</p>
<div class="table-responsive">
    <table class="table" width="100%" cellspacing="0">
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