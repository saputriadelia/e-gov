<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MADARA - Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <style>
    /* Custom Styles */
    .logo {
      display: flex;
      gap: 10px;
      align-items: center;
    }

    .logo img {
      width: 100%;
      /* height: 200px; */
      margin-right: 5px;
      /* Increase the margin to separate logo from text */
    }

    .logo h1 {
      margin-left: 5px;
      /* Adjust the margin to shift the text to the right */
    }

    .icon-box:hover .title {
      color: white;
      /* Mengubah warna judul menjadi putih saat di-hover */
    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between position-relative">

      <div class="logo">
        <a href="{{ url('/') }}">
          <img src="{{ asset('assets/img/logo.png') }}" alt="MADARA Logo">
        </a>
        <h1 class="text-light"><a href="{{ url('/') }}"><span>MADARA</span></a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="{{ url('login') }}">Login</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/feedback-madara') }}">Feedback</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-up" style="text-align: left;">
      <h1 style="color: white; font-size: 29px; font-weight: bold;">Malang Dashboard Radar</h1>
      <h2 style="color: white; font-size: 12px; font-weight: bold;"> E-Government Kota Malang</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
          <h2>Tentang Madara </h2>
          <p>Website MADARA menampilkan dashboard interaktif yang menyediakan informasi dan statistik terkini mengenai
            berbagai aspek pemerintahan Kota Malang. Pengguna dapat melihat informasi mengenai perkembangan Ekonomi,
            Pendidikan, dan Budaya di Kota Malang secara real-time.</p>
        </div>
        <div class="row">
          <!-- Kolom 1 (Kiri) -->
          <a href="{{ url('pendidikan-madara') }}" class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon">
                <img src="{{ asset('assets/img/edu.png') }}" alt="Pendidikan Icon" style="width: 35%;">
              </div>
              <h4 class="title">Pendidikan</h4>
              <p class="description">Temukan informasi lengkap tentang sistem pendidikan di Kota Malang, termasuk
                statistik terbaru mengenai sekolah, murid, guru, dan hasil pendidikan.</p>
            </div>
          </a>

          <!-- Kolom 2 (Kiri) -->
          <a href="{{ url('ekonomi-madara') }}" class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><img src="{{ asset('assets/img/economy.png') }}" alt="ekonomi Icon" style="width: 35%;"></div>
              <h4 class="title">Ekonomi</h4>
              <p class="description">Dapatkan informasi terkini tentang kondisi ekonomi Kota Malang, termasuk data
                terbaru mengenai kenaikan harga pasar dan perkembangan sektor ekonomi lainnya.</p>
            </div>
          </a>
          <!-- Kolom 3 (Kanan) -->
          <a href="{{ url('budaya-madara') }}" class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><img src="{{ asset('assets/img/culture.png') }}" alt="budaya Icon" style="width: 35%;"></div>
              <h4 class="title">Budaya</h4>
              <p class="description">Jelajahi kekayaan budaya Kota Malang dengan informasi lengkap tentang tradisi,
                seni, acara budaya, dan warisan lokal yang unik.</p>
            </div>
          </a>
          <!-- Kolom 4 (Kanan) -->
          <a href="{{ url('login-madara') }}" class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up">
              <div class="icon"><img src="{{ asset('assets/img/feedback.png') }}" alt="feedback Icon" style="width: 35%;"></div>
              <h4 class="title">Feedback</h4>
              <p class="description">Bagikan pendapat dan masukan Anda tentang layanan kami untuk membantu kami
                meningkatkan pengalaman Anda.</p>
            </div>
          </a>
        </div>
      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <br><br>
          <p>&copy; Copyright <strong><span>MADARA</span></strong>. All Rights Reserved</p>
          <p>Designed by <a href="https://informatika.itsk-soepraoen.ac.id/">Mahasiswa ITSK RS. dr. Soepraoen</a></p>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>
