<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Ubah Data Penyerahan</h1>

<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="penyerahan_tanggal">Tanggal Penyerahan <span class="text-danger">*</span></label>
                    <input type="date" name="penyerahan_tanggal" id="penyerahan_tanggal" class="form-control <?= form_error('penyerahan_tanggal') ? 'is-invalid' : null ?>" value="<?= set_value('penyerahan_tanggal') ? set_value('penyerahan_tanggal') : $penyerahan['penyerahan_tanggal']; ?>">
                    <?= form_error('penyerahan_tanggal') ? form_error('penyerahan_tanggal') : null; ?>
                </div>
                <div class="form-group">
                    <label for="pembelian_id">Aset <span class="text-danger">*</span></label>
                    <select name="pembelian_id" id="pembelian_id" class="form-control <?= form_error('pembelian_id') ? 'is-invalid' : null; ?>">
                        <option value="" hidden>Pilih aset</option>
                        <?php foreach ($pembelian as $p) : ?>
                        <?php $nomor_pembelian = '02' . str_replace('-', '', $p['pembelian_tanggal']) . sprintf("%04d", $p['pembelian_id']); ?>
                        <option value="<?= $p['pembelian_id']; ?>" <?= (set_value('pembelian_id') == $p['pembelian_id']) || ($penyerahan['pembelian_id'] == $p['pembelian_id']) ? 'selected' : null; ?>><?= $p['aset_nama']; ?> - <?= $nomor_pembelian; ?> - Rp<?= number_format($p['pembelian_harga']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('pembelian_id') ? form_error('pembelian_id') : null; ?>
                </div>
                <div class="form-group">
                    <label for="user_username">Nama Penerima <span class="text-danger">*</span></label>
                    <select name="user_username" id="user_username" class="form-control <?= form_error('user_username') ? 'is-invalid' : null; ?>">
                        <option value="" hidden>Pilih nama penerima</option>
                        <?php foreach ($user as $u) : ?>
                        <option value="<?= $u['user_username']; ?>" <?= (set_value('user_username') == $u['user_username']) || ($penyerahan['user_username'] == $u['user_username']) ? 'selected' : null; ?>><?= $u['user_nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('user_username') ? form_error('user_username') : null; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>