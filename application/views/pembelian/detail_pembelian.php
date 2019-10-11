<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Detail Data Pembelian</h1>

<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <?php $nomor_pembelian = '02' . str_replace('-', '', $pembelian['pembelian_tanggal']) . sprintf("%04d", $pembelian['pembelian_id']); ?>
            <?php $nomor_pengajuan = '01' . str_replace('-', '', $pembelian['pengajuan_tanggal']) . sprintf("%04d", $pembelian['pengajuan_id']); ?>
            <div class="row mx-0 justify-content-between align-items-center">
                <p class="card-title">Nomor Pembelian : <strong><?= $nomor_pembelian; ?></strong></p>
                <p class="card-title">Nomor Pengajuan : <strong><?= $nomor_pengajuan; ?></strong></p>
                <p class="card-title">Tanggal Pembelian : <strong><?= date('d F Y', strtotime($pembelian['pembelian_tanggal'])); ?></strong></p>
            </div>
            <hr class="mt-0">
            <p class="card-title">Aset</p>
            <p class="mb-0 font-weight-bold"><?= $pembelian['aset_nama']; ?></p>
            <hr class="mt-0">
            <p class="card-title">Kelompok</p>
            <p class="mb-0 font-weight-bold"><?= ucwords($pembelian['kelompok_nama']); ?></p>
            <hr class="mt-0">
            <p class="card-title">Harga</p>
            <p class="mb-0 font-weight-bold">Rp <?= number_format($pembelian['pembelian_harga']); ?></p>
            <hr class="mt-0">
            <div class="row mx-0 justify-content-between align-items-center">
                <p class="card-title">Yang Mengajukan : <strong><?= $pembelian['user_nama']; ?></strong></p>
                <p class="card-title">Status Pengajuan : <strong><?= ucwords($pembelian['pengajuan_status']); ?></strong></p>
            </div>
        </div>
    </div>
</div>