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

  @if(session('success'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonText: "OK"
    });
</script>
@endif

@if(session('error'))
<script>
    Swal.fire({
        title: "Gagal!",
        text: "{{ session('error') }}",
        icon: "error",
        confirmButtonText: "OK"
    });
</script>
@endif


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
          <li><a href="{{ route('profil_masyarakat') }}"  class="active">Profil</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a href="#" onclick="confirmLogout()" class="btn-getstarted">Keluar</a>

    </div>
  </header>

  <main class="mt-24 p-6">
    <div class="max-w-3xl mx-auto">
      <!-- Tombol Kembali -->
      <div class="mb-4">
        <a href="{{ route('profil_masyarakat') }}" class="btn bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 focus:ring-0 focus:outline-none">Kembali</a>
      </div>

      <!-- Profil Masyarakat -->
      <div class="bg-white shadow rounded-xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Profil Masyarakat</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('profil.update') }}" method="POST" class="space-y-4">
            @csrf
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-gray-700">NIK</label>
              <input type="text" name="nik" class="w-full border border-gray-400 rounded px-3 py-2" value="{{ Auth::user()->nik }}" readonly>
            </div>
            <div>
              <label class="block text-gray-700">Nama Lengkap</label>
              <input type="text" name="nama_masyarakat" class="w-full border border-gray-400 rounded px-3 py-2" value="{{ old('nama_masyarakat', Auth::user()->nama_masyarakat) }}">
            </div>
          </div>

          <div>
            <label class="block text-gray-700">Alamat</label>
            <input type="text" name="alamat" class="w-full border border-gray-400 rounded px-3 py-2" value="{{ old('alamat', Auth::user()->alamat) }}">
          </div>

          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-gray-700">Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" class="w-full border border-gray-400 rounded px-3 py-2" value="{{ old('tgl_lahir', Auth::user()->tgl_lahir) }}">
            </div>
            <div>
              <label class="block text-gray-700">Jenis Kelamin</label>
              <select class="w-full border border-gray-400 rounded px-3 py-2" name="jenis_kelamin">
                <option selected disabled>Pilih Jenis Kelamin</option>
                <option value="laki-laki" {{ Auth::user()->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ Auth::user()->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                <option value="lainnya" {{ Auth::user()->jenis_kelamin == 'lainnya' ? 'selected' : '' }}>lainnya</option>
              </select>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-gray-700">No. Telp Aktif</label>
              <input type="text" name="tlp" class="w-full border border-gray-400 rounded px-3 py-2" value="{{ old('tlp', Auth::user()->tlp) }}">
            </div>
            <div>
              <label class="block text-gray-700">Email</label>
              <input type="email" name="email" class="w-full border border-gray-400 rounded px-3 py-2" value="{{ old('email', Auth::user()->email) }}">
            </div>
          </div>

          <div>
              <label class="block text-gray-700">Password (Opsional)</label>
              <input type="password" name="password" class="w-full border border-gray-400 rounded px-3 py-2" placeholder="Isi jika Anda ingin mengubah kata sandi">
          </div>

          <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded">Simpan</button>
          </div>
        </form>
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
