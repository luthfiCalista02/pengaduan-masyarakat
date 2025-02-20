<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assetss/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assetss/assets/img/favicon.png">
  <title>
    Pengaduan Masyarakat
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="assetss/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assetss/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assetss/assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />

  <!-- Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="g-sidenav-show" style="background-color: #FFF0DC;">

  <!-- Sidebar -->
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 my-2" id="sidenav-main" style="background-color: #435585;">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{ asset('img/logreg_image.png') }}" class="navbar-brand-img" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-white">Pengaduan Masyarakat</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('dashboard_admin') }}">
              <i class="material-symbols-rounded text-white">dashboard</i>
              <span class="nav-link-text ms-1 text-white">Dashboard Admin</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('tabel_pengaduan') }}">
              <i class="material-symbols-rounded text-white">table_view</i>
              <span class="nav-link-text ms-1 text-white">Tabel Pengaduan</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('akun_pegawai') }}">
              <i class="material-symbols-rounded text-white">shield_person</i>
              <span class="nav-link-text ms-1 text-white">Akun Pegawai</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-dark" href="{{ route('akun_masyarakat') }}" style="background-color: #FFF0DC;">
              <i class="material-symbols-rounded" style="color: #435585;">person</i>
              <span class="nav-link-text ms-1" style="color: #435585;">Akun Masyarakat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('generate_laporan') }}">
              <i class="material-symbols-rounded text-white">print</i>
              <span class="nav-link-text ms-1 text-white">Generate Laporan</span>
            </a>
        </li>
      </ul>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <div class="sidenav-footer position-absolute w-100 bottom-0">
        <div class="mx-3">
            <a href="#" onclick="event.preventDefault(); confirmLogout();"
                class="btn w-100 btn-getstarted"
                type="button"
                style="background-color: #FFF0DC; color: #435585;">
                <i class="material-symbols-rounded" style="color: #435585;">logout</i>
                Keluar
            </a>
        </div>
    </div>
  </aside>
  <!-- End Sidebar -->

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tambah Akun Masyarakat</li>
            </ol>
          </nav>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Content -->
    <section id="pengaduan-masyarakat" class="container mt-4">
        <a href="{{ route('akun_masyarakat') }}" class="btn btn-warning mb-3">Kembali</a>
        <div class="card w-50">
            <div class="card-header text-white" style="background-color: #435585;">Tambah Akun Masyarakat</div>
            <div class="card-body">
                @if (Session::get('warning'))
                <div class="alert alert-warning">
                    <p>{{ Session::get('warning') }}</p>
                </div>
                @endif
                <form action="{{ route('masyarakat.post') }}" method="POST" class="space-y-4">
                @csrf
                    <div style="margin-bottom: 15px;">
                        <label for="nik" style="display: block; font-weight: bold; margin-bottom: 5px;">NIK</label>
                        <input type="text" id="nik" name="nik" placeholder="Masukkan NIK"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: white;" value="{{ old('nik') }}">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="namaLengkap" style="display: block; font-weight: bold; margin-bottom: 5px;">Nama Lengkap</label>
                        <input type="text" id="namaLengkap" name="nama_masyarakat" placeholder="Masukkan Nama Lengkap"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: white;" value="{{ old('nama_masyarakat') }}">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="alamat" style="display: block; font-weight: bold; margin-bottom: 5px;">Alamat</label>
                        <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: white;">{{ old('alamat') }}</textarea>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan Email"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: white;" value="{{ old('email') }}">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="nomorTelepon" style="display: block; font-weight: bold; margin-bottom: 5px;">Nomor Telepon</label>
                        <input type="tel" id="nomorTelepon" name="tlp" placeholder="Masukkan Nomor Telepon"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: white;" value="{{ old('tlp') }}">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="tanggalLahir" style="display: block; font-weight: bold; margin-bottom: 5px;">Tanggal Lahir</label>
                        <input type="date" id="tanggalLahir" name="tgl_lahir"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: white;" value="{{ old('tgl_lahir') }}">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="jenisKelamin" style="display: block; font-weight: bold; margin-bottom: 5px;">Jenis Kelamin</label>
                        <select id="jenisKelamin" name="jenis_kelamin"
                                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: white;" value="{{ old('jenis_kelamin') }}">
                            <option value="" disabled selected>Pilih Jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">Kata Sandi</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; background: white;" value="{{ old('password') }}">
                    </div>

                    <div style="text-align: right;">
                        <button class="btn btn-info mb-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Content -->

    <!-- JavaScript untuk toggle password -->
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eye-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash"); // Ikon berubah ke 'mata tertutup'
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye"); // Ikon kembali ke 'mata terbuka'
            }
        }
    </script>

  </main>
  <!--   Core JS Files   -->
  <script src="assetss/assets/js/core/popper.min.js"></script>
  <script src="assetss/assets/js/core/bootstrap.min.js"></script>
  <script src="assetss/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assetss/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assetss/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Views",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#43A047",
          data: [50, 45, 22, 28, 50, 60, 76],
          barThickness: 'flex'
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: '#e5e5e5'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
              color: "#737373"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
        datasets: [{
          label: "Sales",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          pointBorderColor: "transparent",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          },
          tooltip: {
            callbacks: {
              title: function(context) {
                const fullMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                return fullMonths[context[0].dataIndex];
              }
            }
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 12,
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Tasks",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          pointBorderColor: "transparent",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#737373',
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [4, 4]
            },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: {
                size: 14,
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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
                document.getElementById('logout-form').submit(); // Kirim form logout dengan POST
            }
        });
    }
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first() }}',
        });
    </script>
@endif

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
        });
    </script>
@endif

</body>

</html>
