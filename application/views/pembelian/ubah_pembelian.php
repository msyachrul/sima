<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Ubah Data Pembelian</h1>

<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="pembelian_tanggal">Tanggal Pembelian <span class="text-danger">*</span></label>
                    <input type="date" name="pembelian_tanggal" id="pembelian_tanggal" class="form-control <?= form_error('pembelian_tanggal') ? 'is-invalid' : null; ?>" placeholder="Isi nama" value="<?= set_value('pembelian_tanggal') ? set_value('pembelian_tanggal') : $pembelian['pembelian_tanggal']; ?>">
                    <?= form_error('pembelian_tanggal') ? form_error('pembelian_tanggal') : null; ?>
                </div>
                <div class="form-group">
                    <label for="pengajuan_id">Pengajuan <span class="text-danger">*</span></label>
                    <select name="pengajuan_id" id="pengajuan_id" class="form-control <?= form_error('pengajuan_id') ? 'is-invalid' : null; ?>">
                        <option value="" hidden>Pilih pengajuan</option>
                        <?php foreach ($pengajuan as $p) : ?>
                        <?php $nomor_pengajuan = '01' . str_replace('-', '', $p['pengajuan_tanggal']) . sprintf("%04d", $p['pengajuan_id']); ?>
                        <option value="<?= $p['pengajuan_id']; ?>" <?= (set_value('pengajuan_id') == $p['pengajuan_id']) || ($pembelian['pengajuan_id'] == $p['pengajuan_id']) ? 'selected' : null; ?>><?= date('d F Y', strtotime($p['pengajuan_tanggal'])); ?> - <?= $nomor_pengajuan; ?> - <?= $p['user_nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('pengajuan_id') ? form_error('pengajuan_id') : null; ?>
                </div>
                <div class="form-group">
                    <label for="aset_id">Aset <span class="text-danger">*</span></label>
                    <select name="aset_id" id="aset_id" class="form-control <?= form_error('aset_id') ? 'is-invalid' : null; ?>">
                        <option value="" hidden>Pilih aset</option>
                        <?php foreach ($aset as $a) : ?>
                        <option value="<?= $a['aset_id']; ?>" <?= (set_value('aset_id') == $a['aset_id']) || ($pembelian['aset_id'] == $a['aset_id']) ? 'selected' : null; ?>><?= ucwords($a['kelompok_nama']); ?> - <?= $a['aset_nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('aset_id') ? form_error('aset_id') : null; ?>
                </div>
                <div class="form-group">
                    <label for="pembelian_harga">Harga Aset <span class="text-danger">*</span></label>
                    <input type="number" name="pembelian_harga" id="pembelian_harga" class="form-control <?= form_error('pembelian_harga') ? 'is-invalid' : null; ?>" min="0" oninput="validity.valid || (value=null)" placeholder="Harga barang" value="<?= set_value('pembelian_harga') ? set_value('pembelian_harga') : $pembelian['pembelian_harga']; ?>">
                    <?= form_error('pembelian_harga') ? form_error('pembelian_harga') : null; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>