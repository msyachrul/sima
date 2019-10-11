<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Ubah Data Pengajuan</h1>

<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <form action="" method="post" autocomplete="off">
                <div class="form-row align-items-center">
                    <div class="form-group col-lg">
                        <label for="pengajuan_tanggal">Tanggal Pengajuan<span class="text-danger">*</span></label>
                        <input type="date" name="pengajuan_tanggal" id="pengajuan_tanggal" class="form-control <?= form_error('pengajuan_tanggal') ? 'is-invalid' : null; ?>" placeholder="Isi nama" value="<?= set_value('pengajuan_tanggal') ? set_value('pengajuan_tanggal') : $pengajuan['pengajuan_tanggal']; ?>">
                        <?= form_error('pengajuan_tanggal') ? form_error('pengajuan_tanggal') : null; ?>
                    </div>
                    <?php $role_tersedia = ['administrator', 'direksi']; ?>
                    <?php if (!is_bool(array_search($this->session->userdata('user')['user_role'], $role_tersedia))) : ?>
                        <div class="form-group col-lg-4">
                            <label for="pengajuan_status">Status</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pengajuan_status" id="terkirim" value="terkirim" <?= $pengajuan['pengajuan_status'] == 'terkirim' ? 'checked' : null; ?>>
                                <label class="form-check-label" for="terkirim">Terkirim</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pengajuan_status" id="ditolak" value="ditolak" <?= $pengajuan['pengajuan_status'] == 'ditolak' ? 'checked' : null; ?>>
                                <label class="form-check-label" for="ditolak">Ditolak</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pengajuan_status" id="disetujui" value="disetujui" <?= $pengajuan['pengajuan_status'] == 'disetujui' ? 'checked' : null; ?>>
                                <label class="form-check-label" for="disetujui">Disetujui</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pengajuan_status" id="selesai" value="selesai" <?= $pengajuan['pengajuan_status'] == 'selesai' ? 'checked' : null; ?>>
                                <label class="form-check-label" for="selesai">Selesai</label>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="pengajuan_keterangan">Keterangan <span class="text-danger">*</span></label>
                    <textarea name="pengajuan_keterangan" id="pengajuan_keterangan" class="form-control <?= form_error('pengajuan_keterangan') ? 'is-invalid' : null; ?>" rows="10" placeholder="Keterangan pengajuan"><?= set_value('pengajuan_keterangan') ? set_value('pengajuan_keterangan') : $pengajuan['pengajuan_keterangan']; ?></textarea>
                    <?= form_error('pengajuan_keterangan') ? form_error('pengajuan_keterangan') : null; ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>