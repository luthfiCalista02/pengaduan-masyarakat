<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function page_landing()
    {
        return view(view: 'masyarakat.planding_masyarakat');
    }

    public function beranda_masyarakat()
    {
        return view('masyarakat.beranda_masyarakat');
    }

    public function prosespengaduan(Request $request) {
        $request->validate([
            'nama_masyarakat' => 'required',
            'nik'             => 'required|exists:masyarakat,nik',
            'judul_pengaduan' => 'required',
            'isi_pengaduan'   => 'required',
            'waktu'           => 'required',
            'lokasi'          => 'required',
            'foto'            => 'required|image|mimes:jpeg,png,jpg',
        ]);

        // Menentukan nama file baru untuk foto berdasarkan NIK
        $foto = $request->nik . "_" . time() . "." . $request->file('foto')->getClientOriginalExtension();

        // Menyimpan file ke direktori 'public/storage/uploads/pengaduan'
        $request->file('foto')->move(public_path('storage/uploads/pengaduan'), $foto);

        $dataSimpan = [
            'nama_masyarakat' => $request->nama_masyarakat,
            'nik'             => $request->nik,
            'judul_pengaduan' => $request->judul_pengaduan,
            'isi_pengaduan'   => $request->isi_pengaduan,
            'waktu'           => $request->waktu,
            'lokasi'          => $request->lokasi,
            'foto'            => $foto,
            'status'          => 'menunggu',
        ];

        Pengaduan::create($dataSimpan);
        return redirect('/riwayat_masyarakat')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function riwayat_masyarakat()
    {
        return view('masyarakat.riwayat_masyarakat');
    }

    public function detail_riwayat()
    {
        return view('masyarakat.detail_riwayat');
    }

    public function profil_masyarakat()
    {
        return view('masyarakat.profil_masyarakat');
    }

    public function edit_profil()
    {
        return view('masyarakat.edit_profil');
    }
}
