<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Harga Komoditi - Kota Malang</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #f8f9fa;
            border-bottom: 2px solid #007bff;
        }

        .navbar-brand img {
            height: 50px;
        }

        .nav-link {
            color: #000 !important;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }
        
        .btn-manage-statistics {
            padding: 0.5rem 1.5rem;
            font-size: 0.9rem;
            background-color: #28a745;
            color: #fff;
        }

        .container {
            margin-top: 20px;
        }

        .graph-container {
            background: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .btn-primary,
        .btn-secondary {
            margin-top: 20px;
            width: 100%;
        }

        .btn-back {
            background-color: #007bff;
            color: #fff;
            padding: 0.25rem 0.75rem;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/img/download (1).png" alt="Logo">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="goBack()">Kembali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-info" href="#">Informasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <h2 class="text-center" id="title"></h2>
        <p class="text-center text-muted">Statistik Kebutuhan Komoditi di Kota Malang</p>
        <div class="graph-container mb-4">
            <canvas id="priceChart"></canvas>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
            <button class="btn btn-success btn-manage-statistics me-auto" onclick="goToManage()">Kelola Statistik</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }

        function goToManage() {
            window.location.href = 'kelola/statistikberas1.html';
        }

        // Fungsi untuk memperbarui grafik dengan data baru
        function updateChart(newData) {
            // Hapus semua data dari grafik
            priceChart.data.labels = [];
            priceChart.data.datasets = [];

            // Masukkan data baru ke dalam grafik
            newData.forEach(yearData => {
                priceChart.data.labels = yearData.months;
                priceChart.data.datasets.push({
                    label: `Harga ${yearData.type} (${yearData.year})`,
                    data: yearData.prices,
                    backgroundColor: yearData.color,
                    borderColor: yearData.color,
                    borderWidth: 2,
                    fill: false,
                    tension: 0.4
                });
            });

            // Perbarui grafik
            priceChart.update();
        }

        // Contoh data
        const exampleDataTelur = [
            {
                year: 2022,
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
                prices: [12500, 12500, 12500, 12567, 12500, 12500, 13000],
                color: 'rgba(54, 162, 235, 1)',
                type: 'Telur Ayam IR.64'
            },
            {
                year: 2023,
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
                prices: [13000, 13100, 13200, 13300, 13400, 13500, 13600],
                color: 'rgba(255, 99, 132, 1)',
                type: 'Telur Ayam IR.64'
            },
            {
                year: 2024,
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
                prices: [13600, 13700, 13800, 13900, 14000, 14100, 14200],
                color: 'rgba(75, 192, 192, 1)',
                type: 'Telur Ayam IR.64'
            }
        ];

        const exampleDataTomat = [
            {
                year: 2022,
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
                prices: [8000, 8200, 8500, 8700, 8800, 9000, 9200],
                color: 'rgba(54, 162, 235, 1)',
                type: 'Tomat IR.64'
            },
            {
                year: 2023,
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
                prices: [9300, 9500, 9600, 9700, 9800, 9900, 10000],
                color: 'rgba(255, 99, 132, 1)',
                type: 'Tomat IR.64'
            },
            {
                year: 2024,
                months: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli'],
                prices: [10100, 10200, 10300, 10400, 10500, 10600, 10700],
                color: 'rgba(75, 192, 192, 1)',
                type: 'Tomat IR.64'
            }
        ];

        // Tambahkan event listener untuk menerima pesan dari statistikberas.html
        window.addEventListener('message', function (event) {
            if (event.data && event.data.type === 'newData') {
                const newData = event.data.data;
                updateChart(newData);
            }
        });

        // Chart.js setup
        const ctx = document.getElementById('priceChart').getContext('2d');
        const priceChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: []
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        ticks: {
                            callback: function (value) {
                                return 'Rp ' + value.toLocaleString('id-ID') + ',00';
                            }
                        }
                    }
                }
            }
        });

        // Function to switch data based on the product type
        function loadData(type) {
            let data;
            let title;
            switch (type) {
                case 'telur':
                    data = exampleDataTelur;
                    title = 'Harga Telur Ayam IR.64';
                    break;
                case 'tomat':
                    data = exampleDataTomat;
                    title = 'Harga Tomat IR.64';
                    break;
                default:
                    data = [];
                    title = 'Data Tidak Tersedia';
            }
            document.getElementById('title').innerText = title;
            updateChart(data);
        }

        // Load the initial data (default to Telur)
        loadData('telur');
    </script>
</body>

</html>
