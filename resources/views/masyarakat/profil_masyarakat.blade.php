<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pengaduan Masyarakat</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <script src="https://cdn.tailwindcss.com"></script>

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

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="home-page" style="background-color: #FFF0DC;">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/assets/img/logo.png" alt=""> -->
        <h1 class="sitename">Pengaduan Masyarakat</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('beranda_masyarakat') }}">Beranda</a></li>
          <li><a href="{{ route('riwayat_masyarakat') }}">Riwayat</a></li>
          <li><a href="{{ route('profil_masyarakat') }}" class="active">Profil</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a href="#" onclick="confirmLogout()" class="btn-getstarted">Keluar</a>

    </div>
  </header>

  <main class="mt-40">
    <div class="shadow-lg rounded-xl p-8 w-full max-w-4xl mx-auto bg-white">
      <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center" style="color: #435585;">Profil Masyarakat</h2>

        <div class="grid grid-cols-2 gap-6 text-gray-700">
            <div>
            <p class="font-semibold">NIK</p>
            <p class="bg-gray-100 p-3 rounded-lg">{{ Auth::user()->nik }}</p>
            </div>

            <div>
            <p class="font-semibold">Nama Lengkap</p>
            <p class="bg-gray-100 p-3 rounded-lg">{{ Auth::user()->nama_masyarakat }}</p>
            </div>

            <div>
            <p class="font-semibold">Alamat</p>
            <p class="bg-gray-100 p-3 rounded-lg">{{ Auth::user()->alamat }}</p>
            </div>

            <div>
            <p class="font-semibold">Tanggal Lahir</p>
            <p class="bg-gray-100 p-3 rounded-lg">{{ Auth::user()->tgl_lahir }}</p>
            </div>

            <div>
            <p class="font-semibold">Jenis Kelamin</p>
            <p class="bg-gray-100 p-3 rounded-lg">{{ Auth::user()->jenis_kelamin }}</p>
            </div>

            <div>
            <p class="font-semibold">No Telp Aktif</p>
            <p class="bg-gray-100 p-3 rounded-lg">{{ Auth::user()->tlp }}</p>
            </div>

            <div>
            <p class="font-semibold">Email</p>
            <p class="bg-gray-100 p-3 rounded-lg">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <div class="flex justify-end mt-6">
            <a href="{{ route('edit_profil') }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg font-semibold">Edit</a>
        </div>
    </div>
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

    <!--   Core JS Files   -->
    <script src="assetss/assets/js/core/popper.min.js"></script>
    <script src="assetss/assets/js/core/bootstrap.min.js"></script>
    <script src="assetss/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assetss/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assetss/assets/js/material-dashboard.min.js?v=3.2.0"></script>

    <script>
        function confirmLogout() {
          Swal.fire({
            title: "Yakin ingin keluar?",
            text: "Anda akan logout dari sistem.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Logout",
            cancelButtonText: "Batal"
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "{{ route('logout') }}"; // Ganti dengan route logout yang benar
            }
          });
        }
      </script>

</body>

</html>
