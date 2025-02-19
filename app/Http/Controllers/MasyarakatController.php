<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function page_landing()
    {
        $jumlahMasyarakat = Masyarakat::count();
        $jumlahPengaduan = Pengaduan::count();
        $jumlahPegawai = Pegawai::count();

        return view('masyarakat.planding_masyarakat', compact('jumlahMasyarakat', 'jumlahPengaduan', 'jumlahPegawai'));
    }


    public function beranda_masyarakat()
    {
        $pengaduan = Pengaduan::all();
        return view('masyarakat.beranda_masyarakat', compact('pengaduan'));
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
        $pengaduan = Pengaduan::withTrashed()->get(); // Pastikan data yang dihapus tetap muncul
        return view('masyarakat.riwayat_masyarakat', compact('pengaduan'));
    }

    public function hapus_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        $pengaduan->status = 'Ditolak'; // Ubah status ke Ditolak
        $pengaduan->save();
        $pengaduan->delete(); // Soft delete

        return redirect()->back()->with('success', 'Pengaduan telah ditolak.');
    }


    public function detail_riwayat($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        return view('masyarakat.detail_riwayat', compact('pengaduan'));
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
