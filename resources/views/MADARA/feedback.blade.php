<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
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
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .feedback-container {
            text-align: center;
            width: 100%;
        }

        .feedback-container h2 {
            margin-bottom: 10px;
        }

        .feedback-container p {
            margin-bottom: 20px;
            color: #777;
        }

        .feedback-form-container {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .feedback-form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            text-align: center;
        }

        .feedback-form h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .feedback-form p {
            font-size: 14px;
            margin-bottom: 10px;
            color: #777;
        }

        .feedback-form textarea {
            width: 80%;
            height: 100px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .feedback-form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .feedback-form button:hover {
            background-color: #0056b3;
        }

        .feedback-form .note {
            margin-top: 10px;
            font-size: 11px;
            color: #777;
        }

        .footer {
            background-color: #004d7f;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        .footer-pattern {
            height: 50px;
            background-image: url('path_to_footer_pattern_image');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <script>
        function handleSubmit(event) {
            event.preventDefault();
            window.location.href = 'feedback2.html';
        }
    </script>
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
        </div>
    </div>
    <div class="content">
        <div class="feedback-container">
            <h2>Feedback</h2>
            <p>Tinggalkan Jejak Anda: Bagikan Pendapat Anda tentang Layanan e-Government!</p>
            <div class="feedback-form-container">
                <form class="feedback-form" onsubmit="handleSubmit(event)">
                    <h3>Sesi Feedback</h3>
                    <p>Pendapat Anda Berharga: Berikan Masukan Anda untuk Meningkatkan Layanan Kami!</p>
                    <textarea name="feedback" placeholder="Berikan feedback Anda di sini." required></textarea>
                    <button type="submit">Submit</button>
                    <p class="note">Mohon untuk menggunakan bahasa yang sopan dan tidak mengandung unsur SARA.</p>
                </form>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-pattern"></div>
    </div>
</body>
</html>
