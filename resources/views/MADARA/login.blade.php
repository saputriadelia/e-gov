<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
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

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
        }

        .login-form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-form h2 {
            margin-bottom: 10px;
        }

        .login-form p {
            margin-bottom: 20px;
            color: #777;
        }

        .login-form input {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #0056b3;
        }

        .login-form .terms {
            margin-top: 10px;
            font-size: 12px;
            color: #777;
        }

        .login-form .terms a {
            color: #007bff;
            text-decoration: none;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
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

        /* Style for error message */
        .error-message {
            color: red !important; /* Jangan lupa tambahkan !important untuk memastikan override style */
            margin-top: 10px;
            font-size: 12px; /* Memperkecil ukuran font */
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
        </div>
    </div>
    <div class="login-container">
        <form class="login-form" onsubmit="handleLogin(event)">
            <h2>Login</h2>
            <p>Masukkan username dan password untuk melanjutkan</p>
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit">Login</button>
            <p class="terms">
                Dengan mengklik tombol ini, Anda menyetujui <a href="#">Ketentuan Layanan</a> dan <a href="#">Kebijakan Privasi</a>.
            </p>
            <p class="error-message" id="error-message"></p><!-- Error message container -->
        </form>
    </div>
    <div class="footer">
        <div class="footer-pattern"></div>
    </div>
    <script>
        function handleLogin(event) {
            event.preventDefault();
            const username = event.target.username.value;
            const password = event.target.password.value;

            if (username === 'seicantik' && password === 'masyarakat') {
                window.location.href = 'feedback.html';
            } else {
                // Menampilkan pesan error jika login gagal
                const errorMessage = document.getElementById('error-message');
                errorMessage.innerText = 'Username atau password salah.';
            }
        }
    </script>
</body>
</html>
