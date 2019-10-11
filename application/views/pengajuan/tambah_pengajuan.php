<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Tambah Data Pengajuan</h1>

<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <form action="" method="post" autocomplete="off">
                <input type="hidden" name="pengajuan_status" value="terkirim">
                <input type="hidden" name="user_username" value="<?= $this->session->userdata('user')['user_username']; ?>">
                <div class="form-group">
                    <label for="pengajuan_tanggal">Tanggal Pengajuan <span class="text-danger">*</span></label>
                    <input type="date" name="pengajuan_tanggal" id="pengajuan_tanggal" class="form-control <?= form_error('pengajuan_tanggal') ? 'is-invalid' : null; ?>" placeholder="Isi nama" value="<?= set_value('pengajuan_tanggal'); ?>">
                    <?= form_error('pengajuan_tanggal') ? form_error('pengajuan_tanggal') : null; ?>
                </div>
                <div class="form-group">
                    <label for="pengajuan_keterangan">Keterangan <span class="text-danger">*</span></label>
                    <textarea name="pengajuan_keterangan" id="pengajuan_keterangan" class="form-control <?= form_error('pengajuan_keterangan') ? 'is-invalid' : null; ?>" rows="10" placeholder="Keterangan pengajuan"><?= set_value('pengajuan_keterangan'); ?></textarea>
                    <?= form_error('pengajuan_keterangan') ? form_error('pengajuan_keterangan') : null; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>