<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Detail Data Pengajuan</h1>

<div class="row justify-content-center cetak-area">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <?php $nomor = '01' . str_replace('-', '', $pengajuan['pengajuan_tanggal']) . sprintf("%04d", $pengajuan['pengajuan_id']); ?>
            <div class="row mx-0 justify-content-between align-items-center">
                <p class="card-title">Nomor Pengajuan : <strong><?= $nomor; ?></strong></p>
                <p class="card-title">Tanggal : <strong><?= date('d F Y', strtotime($pengajuan['pengajuan_tanggal'])); ?></strong></p>
            </div>
            <hr class="mt-0">
            <p class="card-title"><strong>Keterangan</strong></p>
            <p class="card-text"><?= $pengajuan['pengajuan_keterangan']; ?></p>
            <hr>
            <div class="row mx-0 justify-content-between align-items-center">
                <p class="card-title">Yang Mengajukan : <strong><?= $pengajuan['user_nama']; ?></strong></p>
                <p class="card-title">Status : <strong><?= ucwords($pengajuan['pengajuan_status']); ?></strong></p>
            </div>
        </div>
    </div>
</div>