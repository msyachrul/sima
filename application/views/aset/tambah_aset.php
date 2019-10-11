<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Tambah Data Aset</h1>

<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="aset_nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="aset_nama" id="aset_nama" class="form-control <?= form_error('aset_nama') ? 'is-invalid' : null; ?>" placeholder="Isi nama" value="<?= set_value('aset_nama'); ?>">
                    <?= form_error('aset_nama') ? form_error('aset_nama') : null; ?>
                </div>
                <div class="form-group">
                    <label for="kelompok_id">Kelompok <span class="text-danger">*</span></label>
                    <select name="kelompok_id" id="kelompok_id" class="form-control <?= form_error('kelompok_id') ? 'is-invalid' : null; ?>">
                        <option value="" hidden>Pilih kelompok</option>
                        <?php foreach ($kelompok as $k) : ?>
                            <option value="<?= $k['kelompok_id']; ?>" <?= set_value('kelompok_id') == $k['kelompok_id'] ? 'selected' : null; ?>><?= ucwords($k['kelompok_nama']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kelompok_id') ? form_error('kelompok_id') : null; ?>
                </div>
                <div class="form-group">
                    <label for="masa_manfaat">Masa Manfaat <span class="text-danger">*</span></label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aset_masa_manfaat" id="3" value="3" required <?= set_value('aset_masa_manfaat') == '3' ? 'checked' : null; ?>>
                        <label class="form-check-label" for="3">3 Tahun</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aset_masa_manfaat" id="5" value="5" required <?= set_value('aset_masa_manfaat') == '5' ? 'checked' : null; ?>>
                        <label class="form-check-label" for="5">5 Tahun</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aset_masa_manfaat" id="8" value="8" required <?= set_value('aset_masa_manfaat') == '8' ? 'checked' : null; ?>>
                        <label class="form-check-label" for="8">8 Tahun</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="aset_masa_manfaat" id="10" value="10" required <?= set_value('aset_masa_manfaat') == '10' ? 'checked' : null; ?>>
                        <label class="form-check-label" for="10">10 Tahun</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>