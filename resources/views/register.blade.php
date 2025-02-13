<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pengaduan Masyarakat</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="regist-page" style="background-color: #435585;">
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
    <div class="shadow-lg rounded-xl p-6 w-full max-w-md" style="background-color: #FFF0DC;">
      <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Daftar</h2>
      <form action="#" method="POST" class="space-y-4">

        <!-- NIK -->
        <div>
          <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
          <input type="text" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Nama Lengkap -->
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
          <input type="text" id="name" name="name" placeholder="Nama Lengkap" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Alamat -->
        <div>
          <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
          <input type="text" id="address" name="address" placeholder="Masukkan Alamat Saat Ini" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Tanggal Lahir -->
        <div>
          <label for="dob" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
          <input type="date" id="dob" name="dob" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Jenis Kelamin -->
        <div>
          <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
          <select id="gender" name="gender" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="laki-laki">Laki-Laki</option>
            <option value="perempuan">Perempuan</option>
          </select>
        </div>

        <!-- Nomor HP -->
        <div>
          <label for="phone" class="block text-sm font-medium text-gray-700">Nomor HP</label>
          <input type="text" id="phone" name="phone" placeholder="Min. 8-14 Angka" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" placeholder="pengaduan@contoh.com" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Kata Sandi -->
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
          <input type="password" id="password" name="password" placeholder="Kata Sandi" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full text-white p-2 rounded-md font-medium" style="background-color: #435585;">Daftar</button>
      </form>

      <!-- Link to Login -->
      <p class="text-center text-sm text-gray-600 mt-4">Anda sudah memiliki akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk Di sini</a></p>
    </div>

    <a href="{{ route('page_landing') }}" class="w-60 bg-yellow-600 text-white p-2 rounded-md font-medium hover:bg-yellow-700 text-center inline-block mt-4">Kembali</a>

</div>
</body>

</html>
