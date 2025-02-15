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

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::delete('/hapus-akun/{id}', [AuthController::class, 'destroy_acc'])->name('akun.hapus');
});

// Masyarakat
Route::get('/', [MasyarakatController::class, 'page_landing'])->name('page_landing');
Route::get('/beranda_masyarakat', [MasyarakatController::class, 'beranda_masyarakat'])->name('beranda_masyarakat');
Route::post('/prosespengaduan', [MasyarakatController::class, 'prosespengaduan'])->name('pengaduan.post');


Route::get('/riwayat_masyarakat', [MasyarakatController::class, 'riwayat_masyarakat'])->name('riwayat_masyarakat');
Route::get('/detail_riwayat', [MasyarakatController::class, 'detail_riwayat'])->name('detail_riwayat');
Route::get('/profil_masyarakat', [MasyarakatController::class, 'profil_masyarakat'])->name('profil_masyarakat');
Route::get('/edit_profil', [MasyarakatController::class, 'edit_profil'])->name('edit_profil');

// Pegawai

// Admin
Route::get('/dashboard_admin', [PegawaiController::class, 'dashboard_admin'])->name('dashboard_admin');
Route::get('/tabel_pengaduan', [PegawaiController::class, 'tabel_pengaduan'])->name('tabel_pengaduan');
Route::get('/tabel_tanggapan', [PegawaiController::class, 'tabel_tanggapan'])->name('tabel_tanggapan');
Route::get('/akun_admin', [PegawaiController::class, 'akun_admin'])->name('akun_admin');
Route::get('/akun_petugas', [PegawaiController::class, 'akun_petugas'])->name('akun_petugas');
Route::get('/akun_masyarakat', [PegawaiController::class, 'akun_masyarakat'])->name('akun_masyarakat');
Route::get('/generate_laporan', [PegawaiController::class, 'generate_laporan'])->name('generate_laporan');
Route::get('/detail_pengaduan', [PegawaiController::class, 'detail_pengaduan'])->name('detail_pengaduan');
Route::get('/otorisasi_pengaduan', [PegawaiController::class, 'otorisasi_pengaduan'])->name('otorisasi_pengaduan');
Route::get('/tanggapi_pengaduan', [PegawaiController::class, 'tanggapi_pengaduan'])->name('tanggapi_pengaduan');
Route::get('/tambah_akun_admin', [PegawaiController::class, 'tambah_akun_admin'])->name('tambah_akun_admin');
Route::get('/tambah_akun_petugas', [PegawaiController::class, 'tambah_akun_petugas'])->name('tambah_akun_petugas');
Route::get('/tambah_akun_masyarakat', [PegawaiController::class, 'tambah_akun_masyarakat'])->name('tambah_akun_masyarakat');
Route::get('/detail_akun_masyarakat', [PegawaiController::class, 'detail_akun_masyarakat'])->name('detail_akun_masyarakat');
Route::get('/edit_akun_admin', [PegawaiController::class, 'edit_akun_admin'])->name('edit_akun_admin');
Route::get('/edit_akun_petugas', [PegawaiController::class, 'edit_akun_petugas'])->name('edit_akun_petugas');
Route::get('/edit_akun_masyarakat', [PegawaiController::class, 'edit_akun_masyarakat'])->name('edit_akun_masyarakat');

// Petugas
Route::get('/dashboard_petugas', [PegawaiController::class, 'dashboard_petugas'])->name('dashboard_petugas');
Route::get('/petugas_tabel_pengaduan', [PegawaiController::class, 'petugas_tabel_pengaduan'])->name('petugas_tabel_pengaduan');
Route::get('/petugas_tabel_tanggapan', [PegawaiController::class, 'petugas_tabel_tanggapan'])->name('petugas_tabel_tanggapan');
Route::get('/petugas_detail_pengaduan', [PegawaiController::class, 'petugas_detail_pengaduan'])->name('petugas_detail_pengaduan');
Route::get('/petugas_otorisasi_pengaduan', [PegawaiController::class, 'petugas_otorisasi_pengaduan'])->name('petugas_otorisasi_pengaduan');
Route::get('/petugas_tanggapi_pengaduan', [PegawaiController::class, 'petugas_tanggapi_pengaduan'])->name('petugas_tanggapi_pengaduan');
