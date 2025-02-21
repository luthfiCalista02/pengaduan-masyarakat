<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;

// Home
Route::get('/register', [HomeController::class, 'register'])->name('register');
Route::post('/prosesdaftar', [HomeController::class, 'prosesdaftar'])->name('register.post');

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/proseslogin', [HomeController::class, 'proseslogin'])->name('login.post');

Route::post('/logout', [HomeController::class, 'proseslogout'])->name('logout');

// Masyarakat // Masyarakat // Masyarakat // Masyarakat // Masyarakat // Masyarakat // Masyarakat // Masyarakat // Masyarakat // Masyarakat
Route::get('/', [MasyarakatController::class, 'page_landing'])->name('page_landing');


Route::get('/beranda_masyarakat', [MasyarakatController::class, 'beranda_masyarakat'])->name('beranda_masyarakat');
Route::post('/prosespengaduan', [MasyarakatController::class, 'prosespengaduan'])->name('pengaduan.post');
Route::get('/riwayat_masyarakat', [MasyarakatController::class, 'riwayat_masyarakat'])->name('riwayat_masyarakat');
Route::delete('/pengaduan/{id_pengaduan}', [MasyarakatController::class, 'destroy'])->name('pengaduan.destroy');
Route::get('/detail_riwayat/{id_pengaduan}', [MasyarakatController::class, 'detail_riwayat'])->name('detail_riwayat');
Route::get('/profil_masyarakat', [MasyarakatController::class, 'profil_masyarakat'])->name('profil_masyarakat');
Route::get('/edit_profil', [MasyarakatController::class, 'edit_profil'])->name('edit_profil');
Route::post('/updateprofil', [MasyarakatController::class, 'updateprofil'])->name('profil.update');

// Pegawai

// Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin
Route::get('/dashboard_admin', [PegawaiController::class, 'dashboard_admin'])->name('dashboard_admin');

// Bagian Pegawai
Route::get('/akun_pegawai', [PegawaiController::class, 'akun_pegawai'])->name('akun_pegawai');
Route::get('/tambah_akun_pegawai', [PegawaiController::class, 'tambah_akun_pegawai'])->name('tambah_akun_pegawai');
Route::post('/tambahpegawai', [PegawaiController::class, 'tambahpegawai'])->name('pegawai.post');
Route::get('/edit_akun_pegawai/{id_pegawai}', [PegawaiController::class, 'edit_akun_pegawai'])->name('edit_akun_pegawai');
Route::post('/updatepegawai/{id_pegawai}', [PegawaiController::class, 'updatepegawai'])->name('pegawai.update');
Route::delete('/pegawai/{id_pegawai}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

// Bagian Masyarakat
Route::get('/akun_masyarakat', [PegawaiController::class, 'akun_masyarakat'])->name('akun_masyarakat');
Route::get('/tambah_akun_masyarakat', [PegawaiController::class, 'tambah_akun_masyarakat'])->name('tambah_akun_masyarakat');
Route::post('/tambahmasyarakat', [PegawaiController::class, 'tambahmasyarakat'])->name('masyarakat.post');
Route::get('/detail_akun_masyarakat/{nik}', [PegawaiController::class, 'detail_akun_masyarakat'])->name('detail_akun_masyarakat');
Route::delete('/masyarakat/{nik}', [PegawaiController::class, 'destroy_masyarakat'])->name('masyarakat.destroy');

// Bagian Pengaduan
Route::get('/tabel_pengaduan', [PegawaiController::class, 'tabel_pengaduan'])->name('tabel_pengaduan');
Route::get('/detail_pengaduan/{id_pengaduan}', [PegawaiController::class, 'detail_pengaduan'])->name('detail_pengaduan');
Route::get('/otorisasi_pengaduan/{id_pengaduan}', [PegawaiController::class, 'otorisasi_pengaduan'])->name('otorisasi_pengaduan');
Route::post('/konfirmasi_otorisasi/{id_pengaduan}', [PegawaiController::class, 'konfirmasi_otorisasi'])->name('konfirmasi_otorisasi');
Route::delete('/pengaduan/{id_pengaduan}', [PegawaiController::class, 'destroy_pengaduan'])->name('pengaduan.destroy');

// Bagian Tanggapan
Route::get('/tanggapi_pengaduan/{id_pengaduan}', [PegawaiController::class, 'tanggapi_pengaduan'])->name('tanggapi_pengaduan');
Route::post('/simpan_tanggapan/{id_pengaduan}', [PegawaiController::class, 'simpan_tanggapan'])->name('simpan_tanggapan');

// Generate Laporan
Route::get('/generate_laporan', [PegawaiController::class, 'generate_laporan'])->name('generate_laporan');
Route::post('/cetak_laporan', [PegawaiController::class, 'cetak_laporan'])->name('cetak_laporan');


// Petugas // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas
Route::get('/dashboard_petugas', [PegawaiController::class, 'dashboard_petugas'])->name('dashboard_petugas');
Route::get('/petugas_tabel_pengaduan', [PegawaiController::class, 'petugas_tabel_pengaduan'])->name('petugas_tabel_pengaduan');
Route::get('/petugas_detail_pengaduan/{id_pengaduan}', [PegawaiController::class, 'petugas_detail_pengaduan'])->name('petugas_detail_pengaduan');
Route::get('/petugas_otorisasi_pengaduan/{id_pengaduan}', [PegawaiController::class, 'petugas_otorisasi_pengaduan'])->name('petugas_otorisasi_pengaduan');
Route::post('/petugas_konfirmasi_otorisasi/{id_pengaduan}', [PegawaiController::class, 'petugas_konfirmasi_otorisasi'])->name('petugas_konfirmasi_otorisasi');
Route::get('/petugas_tanggapi_pengaduan/{id_pengaduan}', [PegawaiController::class, 'petugas_tanggapi_pengaduan'])->name('petugas_tanggapi_pengaduan');
Route::post('/petugas_simpan_tanggapan/{id_pengaduan}', [PegawaiController::class, 'petugas_simpan_tanggapan'])->name('petugas_simpan_tanggapan');
Route::get('/petugas_hapus_pengaduan/{id_pengaduan}', [PegawaiController::class, 'petugas_hapus_pengaduan'])->name('petugas_hapus_pengaduan');
