<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Manajemen Aset PT. Inovasi Dinamika Solusi</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>

    <?php if ($this->session->flashdata('notifikasi')) : ?>
        <script>
            alert('<?= $this->session->flashdata('notifikasi'); ?>');
        </script>
    <?php endif; ?>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center align-items-center" style="height: 100vh">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 m-auto">
                                <div class="d-flex justify-content-center">
                                    <img src="<?= base_url(); ?>assets/images/logo_ids.png" alt="PT. Inovasi Dinamika Solusi">
                                </div>
                                <h1 class="h2 p-2 font-weight-bold text-center">Sistem Informasi Manajemen Aset PT. Inovasi Dinamika Solusi</h1>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form class="user" action="" method="post" autocomplete="off">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user <?= form_error('user_username') || $this->session->flashdata('notifikasi_username') ? 'is-invalid' : null; ?>" id="user_username" name="user_username" placeholder="Isi username" autofocus>
                                            <?= form_error('user_username') ? form_error('user_username') : null; ?>
                                            <?= $this->session->flashdata('notifikasi_username') ? $this->session->flashdata('notifikasi_username') : null; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user <?= form_error('user_password') || $this->session->flashdata('notifikasi_password') ? 'is-invalid' : null; ?>" name="user_password" placeholder="Isi password">
                                            <?= form_error('user_password') ? form_error('user_password') : null; ?>
                                            <?= $this->session->flashdata('notifikasi_password') ? $this->session->flashdata('notifikasi_password') : null; ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>