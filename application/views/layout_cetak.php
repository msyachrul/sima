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

    <script>
        window.print();
        window.onafterprint = function() {
            window.close();
        }
    </script>

</head>

<body>

    <div class="container border">
        <div class="d-flex align-items-center mt-2">
            <div style="width: 20%">
                <img src="<?= base_url(); ?>assets/images/logo_ids.png" alt="PT. Inovasi Dinamika Solusi">
            </div>
            <div class="text-center">
                <h1 class="h3 font-weight-bold">PT. INOVASI DINAMIKA SOLUSI</h1>
                <p class="mb-0">Jalan Bojong Koneng Makmur No. 15 Kelurahan Sukapada Kecamatan Cibeunying Kidul Bandung 40121</p>
                <p class="mb-0">Telepon: (022) 20547221/08112457333, Website: idsolutions.id, Email: info@idsolutions.id</p>
            </div>
        </div>
        <hr>
        <?php $this->load->view($halaman); ?>
    </div>

</body>

</html>