<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barang Pasar - MADARA</title>
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <style>
    .portfolio-wrap {
      position: relative;
      overflow: hidden;
      border-radius: 15px;
    }

    .portfolio-wrap img {
      transition: transform 0.3s ease-in-out;
      border-radius: 15px;
    }

    .portfolio-wrap .portfolio-info {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(255, 255, 255, 1);
      color: #000000;
      padding: 10px;
      transition: 0.3s ease;
      transform: translateY(100%);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .portfolio-wrap:hover .portfolio-info {
      transform: translateY(0);
    }

    .portfolio-wrap .portfolio-info h4 {
      margin-bottom: 5px;
      font-size: 18px;
    }

    .portfolio-wrap .portfolio-info p {
      font-size: 14px;
      margin-bottom: 0;
    }

    .portfolio-wrap .current-price {
      background-color: #3498db;
      color: #fff;
      padding: 5px 10px;
      border-radius: 10px;
      display: inline-block;
    }

    .portfolio-wrap .price-change {
      font-size: 14px;
      color: #e74c3c;
    }

    .price-up {
      color: #1abc9c;
    }

    .price-down {
      color: #e74c3c;
    }

    .portfolio-wrap .previous-price {
      font-size: 14px;
      color: #555;
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
</head>

<body>
  <!-- Header -->
  <div class="header">
    <div class="left-container">
      <div class="logo">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
      </div>
      <div class="title">
        <h1>Pemerintah Kota Malang</h1>
        <h2>Dashboard E-Gov | Malang Dashboard Radar V.1</h2>
      </div>
    </div>
    <div class="login-link">
      <a class="beranda-button" href="{{ url('/') }}">Beranda</a>
    </div>
  </div>
  
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title" data-aos="fade-in" data-aos-delay="100">
        <h2>Barang Pasar</h2>
        <p>Informasi tentang barang pasar beserta harga terkini di Kota Malang.</p>
      </div>

      <div class="row" data-aos="fade-in">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">Sayur</li>
            <li data-filter=".filter-card">Bahan Pokok</li>
            <li data-filter=".filter-web">Hewani</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up">
        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <a href="{{ url('/berasdetail') }}"><img src="{{ asset('assets/img/portfolio/beraz.jpg') }}" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <div>
                <h4>Beras</h4>
                <p class="current-price">Rp. 13.000/kg <i class="bi bi-caret-up-fill"></i></p>
                <p class="previous-price">Sebelumnya Rp 11.000/kg</p>
              </div>
              <p class="price-change price-up">Rp. 2.000 | 18%</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <a href="{{ url('/telurayam') }}"><img src="{{ asset('assets/img/portfolio/telor ayam.jpg') }}" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <div>
                <h4>Telur Ayam</h4>
                <p class="current-price">Rp. 12.000/kg <i class="bi bi-caret-up-fill"></i></p>
                <p class="previous-price">Sebelumnya Rp 10.000/kg</p>
              </div>
              <p class="price-change price-up">Rp. 2.000 | 20%</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <a href="{{ url('/dagingayam') }}"><img src="{{ asset('assets/img/portfolio/dagingaayam.jpg') }}" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <div>
                <h4>Daging Ayam</h4>
                <p class="current-price">Rp. 10.000/kg <i class="bi bi-caret-up-fill"></i></p>
                <p class="previous-price">Sebelumnya Rp 8.000/kg</p>
              </div>
              <p class="price-change price-up">Rp. 2.000 | 25%</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <a href="{{ url('/dagingsapi') }}"><img src="{{ asset('assets/img/portfolio/daging sapi.jpg') }}" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <div>
                <h4>Daging Sapi</h4>
                <p class="current-price">Rp. 140.000/kg <i class="bi bi-caret-down-fill"></i></p>
                <p class="previous-price">Sebelumnya Rp 150.000/kg</p>
              </div>
              <p class="price-change price-down">Rp. 10.000 | 6.7%</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <a href="{{ url('/bawangmerah') }}"><img src="{{ asset('assets/img/portfolio/bawangmerah.jpg') }}" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <div>
                <h4>Bawang Merah</h4>
                <p class="current-price">Rp. 9.000/kg <i class="bi bi-caret-down-fill"></i></p>
                <p class="previous-price">Sebelumnya Rp 10.000/kg</p>
              </div>
              <p class="price-change price-down">Rp. 1.000 | 10%</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <a href="{{ url('/bawangputih') }}"><img src="{{ asset('assets/img/portfolio/bawangputih.jpg') }}" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <div>
                <h4>Bawang Putih</h4>
                <p class="current-price">Rp. 14.000/kg <i class="bi bi-caret-up-fill"></i></p>
                <p class="previous-price">Sebelumnya Rp 12.000/kg</p>
              </div>
              <p class="price-change price-up">Rp. 2.000 | 16.7%</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <a href="{{ url('/cabe') }}"><img src="{{ asset('assets/img/portfolio/cabe.jpg') }}" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <div>
                <h4>Cabe</h4>
                <p class="current-price">Rp. 18.000/kg <i class="bi bi-caret-up-fill"></i></p>
                <p class="previous-price">Sebelumnya Rp 15.000/kg</p>
              </div>
              <p class="price-change price-up">Rp. 3.000 | 20%</p>
            </div>
          </div>
        </div>
      
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <a href="{{ url('/tomat') }}"><img src="{{ asset('assets/img/portfolio/tomat.jpg') }}" class="img-fluid" alt=""></a>
            <div class="portfolio-info">
              <div>
                <h4>Tomat</h4>
                <p class="current-price">Rp. 6.500/kg <i class="bi bi-caret-down-fill"></i></p>
                <p class="previous-price">Sebelumnya Rp 8.000/kg</p>
              </div>
              <p class="price-change price-down">Rp. 1.500 | 18.75%</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- End Portfolio Section -->

{{-- @section('content')
<div class="container">
    <br>
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h1><strong>Notifikasi Ekonomi</strong></h1>
        </div>
        <div class="card-body">
            @if($acceptedNotifications->isEmpty())
                <p class="text-center">Tidak ada notifikasi ekonomi yang diterima.</p>
            @else
                <div class="row">
                    @foreach($acceptedNotifications as $notification)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Notifikasi {{ $loop->iteration }}</h5>
                                <p class="card-text">{{ $notification->message }}</p>
                                <p class="card-text"><small class="text-muted">{{ $notification->created_at->format('d M Y') }}</small></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection --}}

<!-- Footer -->
<div class="footer">
  <div class="footer-pattern"></div>
  <p>&copy; 2024 Pemerintah Kota Malang. All rights reserved.</p>
</div>

<!-- Scripts -->
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
