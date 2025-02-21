<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class MasyarakatController extends Controller
{
    public function page_landing()
    {
        $jumlahMasyarakat = User::count();
        $jumlahPengaduan = Pengaduan::count();
        $jumlahPegawai = Pegawai::count();

        return view('masyarakat.planding_masyarakat', compact('jumlahMasyarakat', 'jumlahPengaduan', 'jumlahPegawai'));
    }


    public function beranda_masyarakat()
    {
        $pengaduan = Pengaduan::all();
        $nik = Auth::user()->nik;
        $nama = Auth::user()->nama_masyarakat;
        return view('masyarakat.beranda_masyarakat', compact('pengaduan', 'nik', 'nama'));
    }

    public function prosespengaduan(Request $request) {
        $request->validate([
            'nama_masyarakat' => 'required',
            'nik'             => 'required|exists:users,nik',
            'judul_pengaduan' => 'required',
            'isi_pengaduan'   => 'required',
            'waktu'           => 'required',
            'lokasi'          => 'required',
            'foto'            => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Ambil data user yang sedang login
        $nik = Auth::user()->nik;
        $nama_masyarakat = Auth::user()->nama_masyarakat;

        // Menentukan nama file baru untuk foto berdasarkan NIK
        $foto = $nik . "_" . time() . "." . $request->file('foto')->getClientOriginalExtension();

        // Menyimpan file ke direktori 'public/storage/uploads/pengaduan'
        $request->file('foto')->move(public_path('storage/uploads/pengaduan'), $foto);

        $dataSimpan = [
            'nama_masyarakat' => $nama_masyarakat,
            'nik'             => $nik,
            'judul_pengaduan' => $request->judul_pengaduan,
            'isi_pengaduan'   => $request->isi_pengaduan,
            'waktu'           => now(), // Waktu otomatis
            'lokasi'          => $request->lokasi,
            'foto'            => $foto,
            'status'          => 'menunggu',
        ];

        Pengaduan::create($dataSimpan);
        return redirect('/riwayat_masyarakat')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function riwayat_masyarakat()
    {
        // Ambil NIK dari user yang sedang login
        $nik = Auth::user()->nik;

        // Ambil data pengaduan hanya yang dibuat oleh user yang login
        $pengaduan = Pengaduan::where('nik', $nik)->get();

        return view('masyarakat.riwayat_masyarakat', compact('pengaduan'));
    }

    public function destroy(Pengaduan $id_pengaduan)
    {
        $pengaduan = Pengaduan::find($id_pengaduan);

        if (!$pengaduan) {
            return response()->json(['error' => 'Pengaduan tidak ditemukan!'], 404);
        }

        // Tambahkan log untuk debugging
        Log::info('Menghapus pengaduan: ' . $id_pengaduan);

        $pengaduan->forceDelete(); // Hapus permanen dari database

        return response()->json(['success' => 'Pengaduan berhasil dihapus secara permanen!']);
    }



    public function detail_riwayat($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();

        // Cari tanggapan berdasarkan id_pengaduan
        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();

        return view('masyarakat.detail_riwayat', compact('pengaduan', 'tanggapan'));
    }

    public function profil_masyarakat()
    {
        $user = Auth::user();
        return view('masyarakat.profil_masyarakat', compact('user'));
    }

    public function edit_profil()
    {
        $user = Auth::user();
        return view('masyarakat.edit_profil', compact('user'));
    }

    public function updateprofil(Request $request)
    {
        $request->validate([
            'nama_masyarakat' => 'required',
            'alamat'          => 'required',
            'tgl_lahir'       => 'required',
            'jenis_kelamin'   => 'required|in:laki-laki,perempuan,lainnya',
            'tlp'             => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->nik . ',nik',
            'password'        => 'nullable',
        ], [
            'email.unique' => 'Email sudah terdaftar!',
        ]);

        // Ambil data user berdasarkan NIK
        $user = User::where('nik', Auth::user()->nik)->firstOrFail();

        $data = [
            'nama_masyarakat' => $request->nama_masyarakat,
            'alamat'          => $request->alamat,
            'tgl_lahir'       => $request->tgl_lahir,
            'jenis_kelamin'   => $request->jenis_kelamin,
            'tlp'             => $request->tlp,
            'email'           => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('profil_masyarakat')->with('success', 'Profil berhasil diperbarui!');
    }
}
