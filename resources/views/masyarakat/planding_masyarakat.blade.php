<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pengaduan Masyarakat</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/assets/img/favicon.png" rel="icon">
  <link href="assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page" style="background-color: #FFF0DC;">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Pengaduan Masyarakat</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Beranda</a></li>
          <li><a href="#features">Tentang</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('register') }}" style="background-color: #435585;">Masuk | Daftar</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section" style="background-color: #FFF0DC;">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <h1 class="mb-4">
                Pengaduan Masyarakat
              </h1>

              <p class="mb-4 mb-md-5">
                Kirimkan pengaduan Anda, dan biarkan kami membantu menyelesaikan masalah Anda dengan cepat.
              </p>

              <div class="hero-buttons">
                <a href="{{ route('register') }}" class="btn btn-primary me-0 me-sm-2 mx-1" style="background-color: #435585;">Masuk | Daftar</a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="hero-image" data-aos="zoom-out" data-aos-delay="300">
              <img src="img/hero_image.png" alt="Hero Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="features" class="features-cards section" style="background-color: #FFF0DC;">

        <div class="container section-title" data-aos="fade-up">
            <h2>Tentang Kami</h2>
          </div><!-- End Section Title -->

    <!-- About Cards Section -->
      <div class="container">

        <div class="row gy-4 justify-content-center">

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box" style="background-color: #FFFFFF;">
              <i class="bi bi-laptop"></i>
              <h4>Pelayanan 24 Jam</h4>
              <p>Sampaikan pengaduan Anda dimana saja dan kapan saja.</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-box" style="background-color: #FFFFFF;">
              <i class="bi bi-list-check"></i>
              <h4>Identitas Terlindungi</h4>
              <p>Setiap data identitas masyarakat kami lindungi secara aman.</p>
            </div>
          </div><!-- End Feature Borx-->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-box" style="background-color: #FFFFFF;">
              <i class="bi bi-bar-chart-line"></i>
              <h4>Penanganan Cepat</h4>
              <p>Pengaduan yang Anda sampaikan akan kami tangani dengan cepat dan tepat.</p>
            </div>
          </div><!-- End Feature Borx-->
        </div>

      </div>

    </section><!-- /About Cards Section -->

    <!-- Presentase Section -->
    <section id="stats" class="stats section" style="background-color: #FFF0DC;">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 justify-content-center">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahMasyarakat ?? 0 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Masyarakat</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahPengaduan ?? 0 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pengaduan</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahPegawai ?? 0 }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Pegawai</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section>
    <!-- /Presentase Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section" style="background-color: #FFF0DC; padding: 50px 0;">

        <!-- Section Title -->
        <div class="container section-title text-center" data-aos="fade-up">
          <h2>Kontak Kami</h2>
        </div><!-- End Section Title -->

        <div class="container d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <div class="info-box text-center p-4" data-aos="fade-up" data-aos-delay="200" style="background-color: #435585; border-radius: 15px; color: white;">
              <h3>Info Kontak</h3>
              <p>Untuk informasi lebih lanjut, hubungi kami melalui kontak di bawah ini. Kami siap membantu Anda!</p>

              <div class="info-item d-flex align-items-center justify-content-start mb-5" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-geo-alt fs-3 me-3"></i>
                <div>
                  <h4 class="mb-1" style="color: white;">Lokasi Kami</h4>
                  <p class="mb-0">A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>

              <div class="info-item d-flex align-items-center justify-content-start mb-5" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-telephone fs-3 me-3"></i>
                <div>
                  <h4 class="mb-1" style="color: white;">Nomor Telepon</h4>
                  <p class="mb-0">+1 5589 55488 55 | +1 6678 254445 41</p>
                </div>
              </div>

              <div class="info-item d-flex align-items-center justify-content-start mb-5" data-aos="fade-up" data-aos-delay="500">
                <i class="bi bi-envelope fs-3 me-3"></i>
                <div>
                  <h4 class="mb-1" style="color: white;">Alamat Email</h4>
                  <p class="mb-0">info@example.com | contact@example.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>

    </section>
    <!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer" style="background-color: #435585; color: #FFF0DC;">

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">iLanding</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/assets/vendor/aos/aos.js"></script>
  <script src="assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/assets/js/main.js"></script>

</body>

</html>
