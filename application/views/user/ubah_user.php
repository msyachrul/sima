<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Ubah Data User</h1>

<div class="row justify-content-center">
    <div class="card shadow col-lg-10 px-0">
        <div class="card-body">
            <form action="" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="user_username">Username <span class="text-danger">*</span></label>
                    <input type="text" name="user_username" id="user_username" class="form-control <?= form_error('user_username') ? 'is-invalid' : null; ?>" placeholder="Isi username" value="<?= set_value('user_username') ? set_value('user_username') : $user['user_username']; ?>">
                    <?= form_error('user_username') ? form_error('user_username') : null; ?>
                </div>
                <div class="form-group">
                    <label for="user_nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="user_nama" id="user_nama" class="form-control <?= form_error('user_nama') ? 'is-invalid' : null; ?>" placeholder="Isi nama" value="<?= set_value('user_nama') ? set_value('user_nama') : $user['user_nama']; ?>">
                    <?= form_error('user_nama') ? form_error('user_nama') : null; ?>
                </div>
                <div class="form-group">
                    <label for="user_telepon">Telepon</label>
                    <input type="number" name="user_telepon" id="user_telepon" class="form-control" placeholder="Isi telepon" value="<?= set_value('user_telepon') ? set_value('user_telepon') : $user['user_telepon']; ?>">
                </div>
                <div class="form-group">
                    <label for="user_password">Password (Kosongkan apabila password tidak akan diubah)</label>
                    <input type="password" name="user_password" id="user_password" class="form-control <?= form_error('user_password') ? 'is-invalid' : null; ?>" placeholder="Isi password">
                    <?= form_error('user_password') ? form_error('user_password') : null; ?>
                </div>
                <div class="form-group">
                    <label for="user_password_konfirmasi">Password Konfirmasi</label>
                    <input type="password" name="user_password_konfirmasi" id="user_password_konfirmasi" class="form-control <?= form_error('user_password_konfirmasi') ? 'is-invalid' : null; ?>" placeholder="Isi password konfirmasi">
                    <?= form_error('user_password_konfirmasi') ? form_error('user_password_konfirmasi') : null; ?>
                </div>
                <div class="form-group">
                    <label for="role">Role <span class="text-danger">*</span></label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_role" id="administrator" value="administrator" required <?= (set_value('user_role') == 'administrator' || $user['user_role'] === 'administrator') ? 'checked' : null ?>>
                        <label class="form-check-label" for="administrator">Administrator</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_role" id="direksi" value="direksi" <?= (set_value('user_role') == 'direksi' || $user['user_role'] == 'direksi') ? 'checked' : null ?>>
                        <label class="form-check-label" for="direksi">Direksi</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="user_role" id="karyawan" value="karyawan" <?= (set_value('user_role') == 'karyawan' || $user['user_role'] == 'karyawan') ? 'checked' : null ?>>
                        <label class="form-check-label" for="karyawan">Karyawan</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    $('#user_username').keypress(function(event) {
        if (event.keyCode === 32) {
            event.preventDefault();
        }
    });
</script>