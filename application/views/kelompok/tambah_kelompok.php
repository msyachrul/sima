<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Tambah Data Kelompok Aset</h1>

<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="kelompok_nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="kelompok_nama" id="kelompok_nama" class="form-control <?= form_error('kelompok_nama') ? 'is-invalid' : null; ?>" placeholder="Isi nama" value="<?= set_value('kelompok_nama'); ?>">
                    <?= form_error('kelompok_nama') ? form_error('kelompok_nama') : null; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>