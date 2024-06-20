<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendidikan di Kota Malang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
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
        .header .login-button, 
        .header .feedback-button {
            text-decoration: none;
            padding: 8px 16px; /* Mengurangi padding agar tombol lebih kecil */
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            margin-left: 10px;
            font-size: 14px; /* Menyesuaikan ukuran font */
        }

        /* .navbar {
            background-color: #d9d9d9;
            color: black;
            padding: 1em;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .title {
            display: flex;
            align-items: center;
        }

        .navbar .title img {
            margin-right: 1em;
        }

        .navbar .title h1 {
            font-size: 1.5em;
            margin: 0;
        }

        .navbar .title p {
            font-size: 0.8em;
            margin: 0;
        }

        .navbar a {
            color: black;
            margin-left: 2em;
            text-decoration: none;
        } */

        .content {
            padding: 2em;
            text-align: center;
        }

        .content h2 {
            margin-bottom: 1em;
        }

        .main-container {
            background-color: #f5f5f5;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 2em;
            margin: 0 auto;
            max-width: 1200px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .info-box {
            background-color: #ccc7c7;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 2em;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
            text-align: center;
            height: 320px;
        }

        .info-box img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
        }

        .info-box-button {
            cursor: pointer;
        }

        .info-box-button:hover {
            background-color: #f0f0f0;
        }

        .info-box p {
            margin: 0.5em 0;
            font-size: 12px;
        }

        .horizontal-list {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 1em 0;
        }

        .info-pair {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 2em;
        }

        .bar-container {
            margin-top: 1em;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
        }

        .bar {
            background-color: #ddd;
            width: 100%;
            height: 20px;
            border-radius: 5px;
            margin-top: 0.5em;
            position: relative;
            display: flex;
            justify-content: left;
        }

        .bar-inner {
            background-color: #4caf50;
            border-radius: 5px;
            height: 100%;
            width: var(--percentage);
        }

        .bar-value {
            margin-top: 0.2em;
            font-size: 10px;
        }

        .bar-label {
            text-align: left;
        }

        .red-text {
            color: red;
        }
    </style>
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
            <a class="beranda-button"  href={{('/')}}>Beranda</a>
            <a class="login-button"  href={{('/login-madara')}}>Login</a>
            <a class="feedback-button"  href={{('/feedback-madara')}}>Feedback</a>
        </div>
    </div>


    <div class="content">
        <h2>Pendidikan</h2>
        <div class="main-container">
            <div class="grid-container">
                <div class="info-box">
                    <a href={{('/partisipasisekolah')}} class="info-box-button">
                        <h4 class="red-text">Angka Partisipasi Sekolah di Kota Malang</h4>
                        <p>Tahun 2023</p>
                    </a>

                    <div class="horizontal-list">
                        <div class="info-pair">
                            <img src="assets/img/sdperson.png" alt="SD">
                            <p>SD: 68,666 Siswa</p>
                        </div>
                        <div class="info-pair">
                            <img src="assets/img/smpperson.png" alt="SMP">
                            <p>SMP: 25,981 Siswa</p>
                        </div>
                        <div class="info-pair">
                            <img src="assets/img/smaperson.png" alt="SMA">
                            <p>SMA: 18,733 Siswa</p>
                        </div>
                    </div>
                </div>

                <div class="info-box">
                    <a href={{('/jumsel')}} class="info-box-button">
                        <h4 class="red-text">Jumlah Sekolah SD, SMP, SMA di Kota Malang</h4>
                        <p>Tahun 2023</p>
                    </a>
                    <div class="horizontal-list">
                        <div class="info-pair">
                            <img src="assets/img/sd.png" alt="SD School">
                            <p>SD: 295 unit</p>
                        </div>
                        <div class="info-pair">
                            <img src="assets/img/smp.png" alt="SMP School">
                            <p>SMP: 113 unit</p>
                        </div>
                        <div class="info-pair">
                            <img src="assets/img/sma.png" alt="SMA School">
                            <p>SMA: 47 unit</p>
                        </div>
                    </div>
                </div>

                <div class="info-box">
                    <a href={{('/slb')}} class="info-box-button">
                        <h4 class="red-text">Jumlah Murid dan Guru SLB di Kota Malang</h4>
                        <p>Tahun 2023</p>
                    </a>
                    <div class="horizontal-list">
                        <div class="info-pair">
                            <img src="assets/img/smaperson.png" alt="SLB Student">
                            <p>Murid: 820 Siswa</p>
                        </div>
                        <div class="info-pair">
                            <img src="assets/img/guru.png" alt="SLB Teacher">
                            <p>Guru: 148 Guru</p>
                        </div>
                    </div>
                </div>

                <div class="info-box">
                    <a href="{{ url('/jumlahguru') }}" class="info-box-button">
                        <h4 class="red-text">Jumlah Guru Sekolah di Kota Malang</h4>
                        <p>Tahun 2023</p>
                    </a>
                    <div class="bar-container">
                        <div class="bar-label">SD</div>
                        <div class="bar">
                            <div class="bar-inner" style="width: 80%;"></div>
                        </div>
                        <div class="bar-value">4,003 Guru</div>
                    </div>
                    <div class="separator"></div>
                    <div class="bar-container">
                        <div class="bar-label">SMP</div>
                        <div class="bar">
                            <div class="bar-inner" style="width: 60%;"></div>
                        </div>
                        <div class="bar-value">2,272 Guru</div>
                    </div>
                    <div class="separator"></div>
                    <div class="bar-container">
                        <div class="bar-label">SMA</div>
                        <div class="bar">
                            <div class="bar-inner" style="width: 30%;"></div>
                        </div>
                        <div class="bar-value">1,267 Guru</div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>