<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Mengelola Data User</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        <a href="<?= base_url(); ?>user/tambah_user" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%" class="text-center">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($user as $u) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $u['user_nama']; ?></td>
                            <td><?= $u['user_username']; ?></td>
                            <td><?= $u['user_role']; ?></td>
                            <td class="d-flex justify-content-start">
                                <a href="<?= base_url(); ?>user/ubah_user/<?= $u['user_username']; ?>" class="btn btn-info btn-sm mr-1">Ubah</a>
                                <?php $nama = $u['user_nama']; ?>
                                <a href="<?= base_url(); ?>user/hapus_user/<?= $u['user_username']; ?>" class="btn btn-danger btn-sm mr-1" onclick="return confirm('Hapus data user <?= $nama; ?>')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    $('#dataTable').DataTable();
                });
            </script>
        </div>
    </div>
</div>