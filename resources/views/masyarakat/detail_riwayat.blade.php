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
  <link href="{{ asset('assets/assets/img/favicon.png') }}" rel="icon">
  <link href="assets/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/assets/css/main.css') }}" rel="stylesheet">

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
          <li><a href="{{ route('riwayat_masyarakat') }}" class="active">Riwayat</a></li>
          <li><a href="{{ route('profil_masyarakat') }}">Profil</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a href="#" onclick="confirmLogout()" class="btn-getstarted">Keluar</a>

    </div>
  </header>

  <main class="main mt-40">
    <div class="max-w-3xl mx-auto">
        <!-- Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ route('riwayat_masyarakat') }}" class="btn bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 focus:ring-0 focus:outline-none">Kembali</a>
        </div>

        <!-- Detail -->
        <div class="shadow rounded-xl p-8 w-full max-w-4xl mx-auto bg-white mb-5">
        <h2 class="text-2xl font-bold text-gray-800 mb-6  text-center" style="color: #435585;">Pengaduan Anda</h2>

        <div class="grid grid-cols-1 gap-4">
            <div>
            <p class="text-gray-700 font-semibold">Nama</p>
            <p class="border border-gray-300 px-4 py-2 rounded bg-gray-100">{{ $pengaduan->nama_masyarakat }}</p>
            </div>

            <div>
            <p class="text-gray-700 font-semibold">NIK</p>
            <p class="border border-gray-300 px-4 py-2 rounded bg-gray-100">{{ $pengaduan->nik }}</p>
            </div>

            <div>
            <p class="text-gray-700 font-semibold">Judul Pengaduan</p>
            <p class="border border-gray-300 px-4 py-2 rounded bg-gray-100">{{ $pengaduan->judul_pengaduan }}</p>
            </div>

            <div>
            <p class="text-gray-700 font-semibold">Isi Pengaduan</p>
            <p class="border border-gray-300 px-4 py-2 rounded bg-gray-100">{{ $pengaduan->isi_pengaduan }}</p>
            </div>

            <div>
            <p class="text-gray-700 font-semibold">Waktu Kejadian</p>
            <p class="border border-gray-300 px-4 py-2 rounded bg-gray-100">{{ $pengaduan->waktu }}</p>
            </div>

            <div>
            <p class="text-gray-700 font-semibold">Lokasi Kejadian</p>
            <p class="border border-gray-300 px-4 py-2 rounded bg-gray-100">{{ $pengaduan->lokasi }}</p>
            </div>

            <div>
            <p class="text-gray-700 font-semibold">Lampiran Pengaduan</p>
            <div class="border border-gray-300 px-4 py-2 rounded bg-gray-100 flex justify-center">
                <img src="{{ asset('storage/uploads/pengaduan/'.$pengaduan->foto) }}" alt="Lampiran Pengaduan" class="max-w-full h-auto rounded">
            </div>
            </div>
        </div>
        </div>

        <!-- Tanggapan -->
        <div class="shadow rounded-xl p-8 w-full max-w-4xl mx-auto bg-white">
            <h2 class="text-2xl font-bold text-gray-800 mb-6  text-center" style="color: #435585;">Tanggapan</h2>

            <div class="grid grid-cols-1 gap-4">
                <div>
                <p class="border border-gray-300 px-4 py-2 rounded bg-gray-100">{{ $tanggapan->tanggapan }}</p>
                </div>
            </div>
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
  <script src="{{ asset('assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('') }}assets/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('assets/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/assets/js/main.js') }}"></script>

    <!--   Core JS Files   -->
    <script src="{{ asset('assetss/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assetss/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetss/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assetss/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
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
    <scrip src="{{ asset('assetss/assets/js/material-dashboard.min.js?v=3.2.0') }}"></script>

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
