<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard E-Gov Malang</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #f8f8f8;
            border-bottom: 1px solid #ddd;
        }

        .header .left-container {
            display: flex;
            align-items: center;
        }

        .header .logo img {
            height: 50px;
        }

        .header .title {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            margin-left: 20px;
        }

        .header .title h1,
        .header .title h2 {
            margin: 0;
            font-family: 'Roboto', Arial, sans-serif;
        }

        .header .title h1 {
            font-size: 20px;
            font-weight: normal;
            text-align: left;
        }

        .header .title h2 {
            font-size: 14px;
            font-weight: normal;
            color: #777;
            text-align: left;
        }

        .header .login-link {
            display: flex;
            align-items: center;
        }

        .header .beranda-button,
        .header .pendidikan-button {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            margin-left: 10px;
        }


        .container {
            padding: 20px;
            margin-top: 80px;
            background-color: #f5f5f5;
            border-radius: 10px;
            border: 1px solid #ccc;
            min-height: calc(100vh - 150px);
        }

        .chart-container {
            height: 300px;
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #e9e9e9;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .kecamatan-chart-container {
            height: 250px;
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #e9e9e9;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .section-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .angka-partisipasi {
            color: red;
            font-size: 1em;
        }

        .footer {
            width: 100%;
            background-color: #004d7f;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            left: 0;
            margin-top: auto;
        }

        .footer-pattern {
            height: 50px;
        }

        @media (max-width: 768px) {
            .header .btn-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .header .btn-container a {
                margin-left: 0;
                margin-top: 10px;
            }

            .container {
                margin-top: 60px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <div class="left-container">
            <div class="logo">
                <img src="assets/img/logo.png" alt="Logo">
            </div>
            <div class="title">
                <h1>Pemerintah Kota Malang</h1>
                <h2>Dashboard E-Gov | Malang Dashboard Radar V.1</h2>
            </div>
        </div>
        <div class="login-link">
            <a class="beranda-button" href={{('/')}}>Beranda</a>
            <a class="pendidikan-button" href={{('/pendidikan-madara')}}>Kembali</a>
        </div>
    </div>

    <div class="container">
        <h3 class="section-title">Pendidikan</h3>

        <div class="row">
            <div class="col-md-4">
                <div class="chart-container">
                    <canvas id="sdChart"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-container">
                    <canvas id="smpChart"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-container">
                    <canvas id="smaChart"></canvas>
                </div>
            </div>
        </div>

        <div class="kecamatan-chart-container">
            <canvas id="kecamatanChart"></canvas>
        </div>
    </div>

    <div class="footer">
        <div class="footer-pattern"></div>
        <p>&copy; 2024 Pemerintah Kota Malang. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const sdCtx = document.getElementById('sdChart').getContext('2d');
        const sdChart = new Chart(sdCtx, {
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023'],
                datasets: [{
                    label: 'Jumlah Sekolah SD',
                    data: [290, 292, 295],
                    borderColor: 'red',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const smpCtx = document.getElementById('smpChart').getContext('2d');
        const smpChart = new Chart(smpCtx, {
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023'],
                datasets: [{
                    label: 'Jumlah Sekolah SMP',
                    data: [109, 112, 113],
                    borderColor: 'blue',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const smaCtx = document.getElementById('smaChart').getContext('2d');
        const smaChart = new Chart(smaCtx, {
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023'],
                datasets: [{
                    label: 'Jumlah Sekolah SMA',
                    data: [46, 50, 47],
                    borderColor: 'green',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const kecamatanCtx = document.getElementById('kecamatanChart').getContext('2d');
        const kecamatanChart = new Chart(kecamatanCtx, {
            type: 'bar',
            data: {
                labels: ['Sukun', 'Blimbing', 'Klojen', 'Lowok Waru', 'Kedung Kandang'],
                datasets: [{
                    label: 'Jumlah Siswa SD Per Kecamatan',
                    data: [14000, 13000, 12000, 12000, 13000],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
