<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pengaduan Masyarakat</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
          <li><a href="{{ route('riwayat_masyarakat') }}" class="active">Riwayat</a></li>
          <li><a href="{{ route('profil_masyarakat') }}">Profil</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a href="#" onclick="confirmLogout()" class="btn-getstarted">Keluar</a>

    </div>
  </header>

  <main class="main mt-40">
    <div class="shadow rounded-xl p-8 w-full max-w-4xl mx-auto mt-40 bg-white">
        <h2 class="text-2xl font-bold text-gray-800 mb-6" style="color: #435585;">Riwayat Pengaduan</h2>
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">Judul Pengaduan</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pengaduan->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-4">
                                Belum ada data pengaduan
                            </td>
                        </tr>
                    @else
                        @foreach ($pengaduan as $index => $item)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item->judul_pengaduan }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="px-2 py-1 text-sm rounded
                                        {{ $item->status == 'Menunggu' ? 'bg-yellow-500 text-white' :
                                           ($item->status == 'Proses' ? 'bg-blue-500 text-white' :
                                           ($item->status == 'Ditolak' ? 'bg-red-500 text-white' : 'bg-green-500 text-white')) }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    @if ($item->status != 'Ditolak')
                                        <a href="{{ route('detail_riwayat', ['id_pengaduan' => $item->id_pengaduan]) }}"
                                           class="bg-pink-500 text-white px-3 py-1 rounded">
                                            Detail
                                        </a>
                                    @endif

                                    @if ($item->status == 'Menunggu' || $item->status == 'Ditolak')
                                    <form id="delete-form-{{ $item->id_pengaduan }}" action="{{ route('pengaduan.destroy', $item->id_pengaduan) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id_pengaduan }})">Hapus</button>

                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id_pengaduan) {
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Pengaduan ini akan dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                fetch("{{ url('/pengaduan') }}/" + id_pengaduan, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire("Berhasil!", data.success, "success").then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire("Gagal!", data.error, "error");
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire("Gagal!", "Terjadi kesalahan saat menghapus.", "error");
                });
            }
        });
    }
</script>

</body>

</html>
