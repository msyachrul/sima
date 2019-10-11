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
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>

    <?php if ($this->session->flashdata('notifikasi')) : ?>
    <script>
        alert("<?= $this->session->flashdata('notifikasi'); ?>");
    </script>
    <?php endif; ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>halaman_utama">
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url(); ?>assets/images/logo_ids.png" width="40" alt="PT. Inovasi Dinamika Solusi">
                </div>
                <div class="sidebar-brand-text mx-3">SIMASET PT.IDS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(1) == 'halaman_utama' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>halaman_utama">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Halaman Utama</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php if (!is_bool(array_search($this->session->userdata('user')['user_role'], ['administrator']))) : ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(1) == 'user' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>user/tampil_user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Mengelola Data User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(1) == 'kelompok' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>kelompok/tampil_kelompok">
                    <i class="fas fa-sitemap"></i>
                    <span>Mengelola Data Kelompok Aset</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php endif; ?>

            <?php if (!is_bool(array_search($this->session->userdata('user')['user_role'], ['administrator', 'direksi']))) : ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(1) == 'aset' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>aset/tampil_aset">
                    <i class="fas fa-dolly-flatbed"></i>
                    <span>Mengelola Data Aset</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(1) == 'pembelian' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>pembelian/tampil_pembelian">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Mengelola Data Pembelian</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(1) == 'penyerahan' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>penyerahan/tampil_penyerahan">
                    <i class="fas fa-fw fa-people-carry"></i>
                    <span>Mengelola Data Penyerahan</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php endif; ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(1) == 'pengajuan' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>pengajuan/tampil_pengajuan">
                    <i class="fas fa-fw fa-file-import"></i>
                    <span>Mengelola Data Pengajuan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(2) == 'tampil_nilai_persediaan' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>laporan/tampil_nilai_persediaan">
                    <i class="fas fa-fw fa-luggage-cart"></i>
                    <span>Laporan Nilai Persediaan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(2) == 'tampil_nilai_ekonomi' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>laporan/tampil_nilai_ekonomi">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Laporan Nilai Ekonomi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(2) == 'tampil_penanggung_jawab' ? 'active' : null; ?>">
                <a class="nav-link" href="<?= base_url(); ?>laporan/tampil_penanggung_jawab">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Laporan Penanggung Jawab</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('user')['user_nama']; ?></span>
                                <i class="fas fa-user-cog"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url(); ?>logout" onclick="return confirm('Anda yakin untuk logout?')">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid animated--grow-in">

                    <?php $this->load->view($halaman); ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Informasi Manajemen Aset PT. Inovasi Dinamika Solusi 2019 | Template by &copy; Bootstrap</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>