<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Pengaduan Masyarakat</title>
  <script src="https://cdn.tailwindcss.com"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
@endif

</head>

<body class="login-page mt-5 mb-5" style="background-color: #435585;">
  <div class="min-h-screen flex flex-col items-center justify-center">

    <!-- Header -->
    <header class="text-center mb-10 flex items-center space-x-4">
      <img src="img/logreg_image.png" alt="Logo" class="w-16 h-16 object-cover">
      <div class="text" style="color: #FFF0DC;">
        <h1 class="text-4xl font-bold">Pengaduan</h1>
        <h1 class="text-4xl font-bold">Masyarakat</h1>
      </div>
    </header>

    <!-- Form Container -->
    <div class="bg-white shadow-lg rounded-xl p-6 w-full max-w-md" style="background-color: #FFF0DC;">
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Masuk</h2>
        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded-md mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif
      <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Email / No. Telp / Username -->
        <div>
            <label for="login" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="text" id="login" name="email" placeholder="Masukkan Email" required value="{{ old('email') }}"
              class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Kata Sandi -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
          <input type="password" id="password" name="password" placeholder="Masukkan Kata Sandi" required
            class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full text-white p-2 rounded-md font-medium mt-5 block text-center" style="background-color: #435585;">Masuk</button>
      </form>

      <!-- Link to Register -->
      <p class="text-center text-sm text-gray-600 mt-4">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar Di sini</a></p>
    </div>

    <a href="{{ route('page_landing') }}" class="w-60 bg-yellow-600 text-white p-2 rounded-md font-medium hover:bg-yellow-700 text-center inline-block mt-4">Kembali</a>

  </div>
</body>

</html>
