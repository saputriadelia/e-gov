<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budaya Malang KIPA</title>
    <style>
        :root {
            --font-size-title: 18px;
            --font-size-info: 14px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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

        .header .title h1, .header .title h2 {
            margin: 0;
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
            margin-left: auto;
        }

        .header .beranda-button {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
        }

        .content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #fff;
        }

        .content h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: var(--font-size-title);
        }

        .kalender-container {
            width: 100%;
            max-width: 1200px;
            display: flex;
            justify-content: space-between;
        }

        .kalender-kegiatan, .acara-terdekat {
            width: 48%;
            background-color: #f8f8f8;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .event {
            display: flex;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .event img {
            width: 120px;
            height: auto;
            object-fit: cover;
        }

        .event-details {
            flex: 1;
            padding: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .event-title {
            font-size: 15px;
            font-weight:bold;
            margin-bottom: 10px;
        }

        .event-info {
            font-size: var(--font-size-info);
            color: #555;
        }

        .event-info-icons {
            display: flex;
            align-items: center;
            margin-bottom: 5px; /* Optional: Adjust spacing between items */
        }

        .event-info-icons img {
            width: 24px; /* Set the width */
            height: 24px; /* Set the height */
            margin-right: 8px;
        }

        .footer {
            background-color: #004d7f;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto;
        }

        .footer-pattern {
            height: 50px;
            background-image: url('path_to_footer_pattern_image');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .free-badge {
            color: green;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .free-badge img {
            width: 24px; /* Set the width */
            height: 24px; /* Set the height */
            margin-right: 8px;
        }

        .kegiatan-title {
            color: #007bff;
            font-size: 16px;
            margin-bottom: 10px;
            font-weight: bold;
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
            <a class="beranda-button" href="index.html">Beranda</a>
        </div>
    </div>
    <div class="content">
        <h1>Kalender Kegiatan</h1>
        <div class="kalender-container">
            <div class="kalender-kegiatan">
                <h4 class="kegiatan-title">Kegiatan Berikutnya</h4>
                <div class="event">
                    <img src="assets/img/jaranan.jpg" alt="Event Image">
                    <div class="event-details">
                        <div class="event-title">Jaranan Persahabatan Pemuda Seni Malang Raya 2024</div>
                        <div class="event-info">
                            <div class="event-info-icons">
                                <img src="assets/icons/calendar.png" alt="Calendar Icon">
                                <span>11 - 12 Mei 2024 | 08:00 - 22:00 WIB</span>
                            </div>
                            <div class="event-info-icons">
                                <img src="assets/icons/location.png" alt="Location Icon">
                                <span>Bidang Kepemudaan Diaspora Malang</span>
                            </div>
                            <div class="event-info-icons">
                                <img src="assets/icons/age.png" alt="Age Icon">
                                <span>Semua Umur</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="event">
                    <img src="assets/img/jaranan.jpg" alt="Event Image">
                    <div class="event-details">
                        <div class="event-title">Jaranan Persahabatan Pemuda Seni Malang Raya 2024</div>
                        <div class="event-info">
                            <div class="event-info-icons">
                                <img src="assets/icons/calendar.png" alt="Calendar Icon">
                                <span>11 - 12 Mei 2024 | 08:00 - 22:00 WIB</span>
                            </div>
                            <div class="event-info-icons">
                                <img src="assets/icons/location.png" alt="Location Icon">
                                <span>Bidang Kepemudaan Diaspora Malang</span>
                            </div>
                            <div class="event-info-icons">
                                <img src="assets/icons/age.png" alt="Age Icon">
                                <span>Semua Umur</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="acara-terdekat">
                <h3>Acara Terdekat</h3>
                <div class="event-info">
                    <div class="event-info-icons">
                        <img src="assets/icons/location.png" alt="Location Icon">
                        <span>Mall Olympic Garden</span>
                    </div>
                    <div class="event-info-icons">
                        <img src="assets/icons/event.png" alt="Event Icon">
                        <span>Malang Food Festival Part #07</span>
                    </div>
                    <div class="event-info-icons">
                        <img src="assets/icons/calendar.png" alt="Calendar Icon">
                        <span>11 - 12 Mei 2024 | 08:00 - 23:00 WIB</span>
                    </div>
                    <span class="free-badge">
                        <img src="assets/icons/free-icon.png" alt="Free Icon" class="free-icon">
                        Free
                    </span>
                    <div class="event-info-icons">
                        <img src="assets/icons/age.png" alt="Age Icon">
                        <span>Semua Umur</span>
                    </div>
                </div>
                <br>
                <hr>
                <div class="event-info">
                    <br>
                    <div class="event-info-icons">
                        <img src="assets/icons/location.png" alt="Location Icon">
                        <span>Mall Olympic Garden</span>
                    </div>
                    <div class="event-info-icons
                    <div class="event-info-icons">
                        <img src="assets/icons/event.png" alt="Event Icon">
                        <span>Malang Food Festival Part #07</span>
                    </div>
                    <div class="event-info-icons">
                        <img src="assets/icons/calendar.png" alt="Calendar Icon">
                        <span>11 - 12 Mei 2024 | 08:00 - 23:00 WIB</span>
                    </div>
                    <span class="free-badge">
                        <img src="assets/icons/free-icon.png" alt="Free Icon" class="free-icon">
                        Free
                    </span>
                    <div class="event-info-icons">
                        <img src="assets/icons/age.png" alt="Age Icon">
                        <span>Semua Umur</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-pattern"></div>
    </div>
</body>
</html>
