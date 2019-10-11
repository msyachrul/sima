<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Halaman Utama</h1>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengajuan Terkirim</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengajuan['jumlah_data']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file-import fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pembelian <?= date('Y'); ?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pembelian['jumlah_data']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Nominal Pembelian <?= date('Y'); ?></div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp <?= number_format($pembelian['nominal_pembelian']); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Nilai Akumulasi 2019</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp <?= number_format($aset['nilai_ekonomi']); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-cart-plus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->

<div class="row">
    <!-- Pie Chart -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Nilai Persediaan Per Kelompok</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Pie Chart -->
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Penanggung Jawab</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie">
                    <canvas id="myPieChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart Pie -->
<script>
    function capitalize(string) {
        return string[0].toUpperCase() + string.slice(1);
    }
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    const chartData = <?= $kelompok; ?>;

    // Pie Chart Example
    const ctx = document.getElementById("myPieChart");
    const myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: chartData.map(function(value) {
                return capitalize(value.kelompok_nama);
            }),
            datasets: [{
                data: chartData.map(function(value) {
                    return value.jumlah_data
                }),
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true,
                position: 'right',
            },
            cutoutPercentage: 80,
        },
    });

    const chartData2 = <?= $penanggung_jawab; ?>;

    // Pie Chart Example
    const ctx2 = document.getElementById("myPieChart2");
    const myPieChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: chartData2.map(function(value) {
                return capitalize(value.user_nama);
            }),
            datasets: [{
                data: chartData2.map(function(value) {
                    return value.jumlah_data
                }),
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: true,
                position: 'right',
            },
            cutoutPercentage: 80,
        },
    });
</script>