<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // Admin

    public function dashboard_admin()
    {
        return view('pegawai.admin.dashboard_admin');
    }

    public function tabel_pengaduan()
    {
        return view('pegawai.admin.tabel_pengaduan');
    }

    public function tabel_tanggapan()
    {
        return view('pegawai.admin.tabel_tanggapan');
    }

    public function akun_admin()
    {
        return view('pegawai.admin.akun_admin');
    }

    public function akun_petugas()
    {
        return view('pegawai.admin.akun_petugas');
    }

    public function akun_masyarakat()
    {
        return view('pegawai.admin.akun_masyarakat');
    }

    public function detail_akun_masyarakat()
    {
        return view('pegawai.admin.detail_akun_masyarakat');
    }

    public function generate_laporan()
    {
        return view('pegawai.admin.generate_laporan');
    }

    public function detail_pengaduan()
    {
        return view('pegawai.admin.detail_pengaduan');
    }

    public function otorisasi_pengaduan()
    {
        return view('pegawai.admin.otorisasi_pengaduan');
    }

    public function tanggapi_pengaduan()
    {
        return view('pegawai.admin.tanggapi_pengaduan');
    }

    public function tambah_akun_admin()
    {
        return view('pegawai.admin.tambah_akun_admin');
    }

    public function tambah_akun_petugas()
    {
        return view('pegawai.admin.tambah_akun_petugas');
    }

    public function tambah_akun_masyarakat()
    {
        return view('pegawai.admin.tambah_akun_masyarakat');
    }

    public function edit_akun_admin()
    {
        return view('pegawai.admin.edit_akun_admin');
    }

    public function edit_akun_petugas()
    {
        return view('pegawai.admin.edit_akun_petugas');
    }

    public function edit_akun_masyarakat()
    {
        return view('pegawai.admin.edit_akun_masyarakat');
    }


    // Petugas

    public function dashboard_petugas()
    {
        return view('pegawai.petugas.dashboard_petugas');
    }

    public function petugas_tabel_pengaduan()
    {
        return view('pegawai.petugas.petugas_tabel_pengaduan');
    }

    public function petugas_tabel_tanggapan()
    {
        return view('pegawai.petugas.petugas_tabel_tanggapan');
    }

    public function petugas_detail_pengaduan()
    {
        return view('pegawai.petugas.petugas_detail_pengaduan');
    }

    public function petugas_otorisasi_pengaduan()
    {
        return view('pegawai.petugas.petugas_otorisasi_pengaduan');
    }

    public function petugas_tanggapi_pengaduan()
    {
        return view('pegawai.petugas.petugas_tanggapi_pengaduan');
    }

}
