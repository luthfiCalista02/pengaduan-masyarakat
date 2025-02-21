<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    // Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin

    public function dashboard_admin()
    {
        $jumlahMasyarakat = User::count();
        $jumlahPegawai = Pegawai::count();
        $jumlahPengaduan = Pengaduan::count();

        return view('pegawai.admin.dashboard_admin', compact('jumlahMasyarakat', 'jumlahPegawai', 'jumlahPengaduan'));
    }

    // Bagian Pengaduan
    public function tabel_pengaduan()
    {
        $pengaduan = Pengaduan::all();
        return view('pegawai.admin.tabel_pengaduan', compact('pengaduan'));
    }

    public function detail_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        return view('pegawai.admin.detail_pengaduan', compact('pengaduan'));
    }

    public function otorisasi_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        return view('pegawai.admin.otorisasi_pengaduan', compact('pengaduan'));
    }

    public function konfirmasi_otorisasi(Request $request, $id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();

        if ($request->input('aksi') == 'Izinkan') {
            $pengaduan->status = 'Proses';
        } elseif ($request->input('aksi') == 'Tolak') {
            $pengaduan->status = 'Ditolak';
        }

        $pengaduan->save();
        return redirect()->route('tabel_pengaduan')->with('success', 'Status pengaduan telah diperbarui.');
    }

    public function tanggapi_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        return view('pegawai.admin.tanggapi_pengaduan', compact('pengaduan'));
    }

    public function simpan_tanggapan(Request $request, $id_pengaduan)
    {
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();

        // Simpan ke tabel tanggapan menggunakan guard 'pegawais'
        Tanggapan::create([
            'id_pegawai' => auth('pegawais')->user()->id_pegawai, // Ambil id_pegawai dari pegawai yang sedang login
            'id_pengaduan' => $id_pengaduan,
            'waktu' => now(), // Waktu tanggapan saat ini
            'tanggapan' => $request->tanggapan,
        ]);

        // Ubah status pengaduan menjadi 'Selesai'
        $pengaduan->status = 'Selesai';
        $pengaduan->save();

        return redirect()->route('tabel_pengaduan')->with('success', 'Tanggapan berhasil disimpan.');
    }

    public function destroy_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        $pengaduan->delete(); // Soft delete

        return response()->json(['success' => 'Data pengaduan berhasil dihapus!']);
    }
    // Selesai Bagian Pengaduan

    // Bagian Pegawai
    public function akun_pegawai()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.admin.akun_pegawai', compact('pegawai'));
    }

    public function tambah_akun_pegawai()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.admin.tambah_akun_pegawai', compact('pegawai'));
    }

    public function tambahpegawai(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'email'        => 'required|unique:pegawai,email',
            'level'        => 'required|in:admin,petugas',
            'password'     => 'required',
        ], [
            'email.unique' => 'Email sudah terdaftar!',
        ]);

        Pegawai::create([
            'nama_pegawai' => $request->nama_pegawai,
            'email'        => $request->email,
            'level'        => $request->level,
            'password'     => Hash::make($request->password),
        ]);

        return redirect('/akun_pegawai')->with('success', 'Tambah Akun Pegawai Berhasil!');
    }

    public function edit_akun_pegawai($id_pegawai)
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        return view('pegawai.admin.edit_akun_pegawai', compact('pegawai'));
    }

    public function updatepegawai(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'email'        => 'required|unique:pegawai,email,' . $request->id_pegawai . ',id_pegawai',
            'level'        => 'required|in:admin,petugas',
        ], [
            'email.unique' => 'Email sudah terdaftar!',
        ]);

        $pegawai = Pegawai::findOrFail($request->id_pegawai);
        $pegawai->update([
            'nama_pegawai' => $request->nama_pegawai,
            'email'        => $request->email,
            'level'        => $request->level,
            'password'     => $request->password ? Hash::make($request->password) : $pegawai->password,
        ]);

        return redirect('/akun_pegawai')->with('success', 'Akun Pegawai Berhasil Diperbarui!');
    }

    public function destroy($id_pegawai)
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->delete(); // Soft delete

        return response()->json(['success' => 'Akun pegawai berhasil dihapus!']);
    }
    // Selesai Bagian Pegawai

    // Bagian Masyarakat
    public function akun_masyarakat()
    {
        $user = User::all();
        return view('pegawai.admin.akun_masyarakat', compact('user'));
    }

    public function detail_akun_masyarakat($nik)
    {
        $user = User::where('nik', $nik)->first();

        if (!$user) {
            return abort(404, 'Akun masyarakat tidak ditemukan');
        }

        return view('pegawai.admin.detail_akun_masyarakat', compact('user'));
    }


    public function tambah_akun_masyarakat()
    {
        $user = User::all();
        return view('pegawai.admin.tambah_akun_masyarakat', compact('user'));
    }

    public function tambahmasyarakat(Request $request) {
        $request->validate([
            'nik'             => 'required|unique:masyarakat,nik',
            'nama_masyarakat' => 'required',
            'alamat'          => 'required',
            'tgl_lahir'       => 'required',
            'jenis_kelamin'   => 'required',
            'tlp'             => 'required|unique:masyarakat,tlp',
            'email'           => 'required|unique:masyarakat,email',
            'password'        => 'required',
        ], [
            'nik.unique'   => 'NIK sudah terdaftar!',
            'email.unique' => 'Email sudah terdaftar!',
            'tlp.unique'   => 'Nomor telepon sudah terdaftar!',
        ]);

        $dataUser = [
            'nik'               => $request->nik,
            'nama_masyarakat'   => $request->nama_masyarakat,
            'alamat'            => $request->alamat,
            'tgl_lahir'         => $request->tgl_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tlp'               => $request->tlp,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
        ];

        User::create($dataUser);

        return redirect('/akun_masyarakat')->with('success', 'Tambah Akun Masyarakat Berhasil!');
    }

    public function destroy_masyarakat($nik)
    {
        $user = User::findOrFail($nik);
        $user->delete(); // Soft delete

        return response()->json(['success' => 'Akun masyarakat berhasil dihapus!']);
    }

    // Selesai Bagian Masyarakat

    public function generate_laporan()
    {
        return view('pegawai.admin.generate_laporan');
    }

    public function cetak_laporan(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $status = $request->status;

        // Ambil data pengaduan berdasarkan filter
        $query = Pengaduan::whereYear('waktu', $tahun)->whereMonth('waktu', $bulan);

        if ($status != 'semua') {
            $query->where('status', $status);
        }

        $pengaduan = $query->get();

        // Load view dan generate PDF
        $pdf = Pdf::loadView('pegawai.admin.laporan_pdf', compact('pengaduan', 'bulan', 'tahun', 'status'));

        return $pdf->download('laporan_pengaduan.pdf');
    }



    // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas // Petugas

    public function dashboard_petugas()
    {
        $jumlahPengaduan = Pengaduan::count();
        return view('pegawai.petugas.dashboard_petugas', compact('jumlahPengaduan'));
    }

    // Bagian Pengaduan
    public function petugas_tabel_pengaduan()
    {
        $pengaduan = Pengaduan::all();
        return view('pegawai.petugas.petugas_tabel_pengaduan', compact('pengaduan'));
    }

    public function petugas_detail_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        return view('pegawai.petugas.petugas_detail_pengaduan', compact('pengaduan'));
    }

    public function petugas_otorisasi_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        return view('pegawai.petugas.petugas_otorisasi_pengaduan', compact('pengaduan'));
    }

    public function Petugas_konfirmasi_otorisasi(Request $request, $id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();

        if ($request->input('aksi') == 'Izinkan') {
            $pengaduan->status = 'Proses';
        } elseif ($request->input('aksi') == 'Tolak') {
            $pengaduan->status = 'Ditolak';
        }

        $pengaduan->save();
        return redirect()->route('petugas_tabel_pengaduan')->with('success', 'Status pengaduan telah diperbarui.');
    }

    public function petugas_tanggapi_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        return view('pegawai.petugas.petugas_tanggapi_pengaduan', compact('pengaduan'));
    }

    public function petugas_simpan_tanggapan(Request $request, $id_pengaduan)
    {
        $request->validate([
            'tanggapan' => 'required|string',
        ]);

        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();

        // Simpan ke tabel tanggapan menggunakan guard 'pegawais'
        Tanggapan::create([
            'id_pegawai' => auth('pegawais')->user()->id_pegawai, // Ambil id_pegawai dari pegawai yang sedang login
            'id_pengaduan' => $id_pengaduan,
            'waktu' => now(), // Waktu tanggapan saat ini
            'tanggapan' => $request->tanggapan,
        ]);

        // Ubah status pengaduan menjadi 'Selesai'
        $pengaduan->status = 'Selesai';
        $pengaduan->save();

        return redirect()->route('tabel_pengaduan')->with('success', 'Tanggapan berhasil disimpan.');
    }


    public function petugas_hapus_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        $pengaduan->delete();

        return redirect()->route('petugas_tabel_pengaduan')->back()->with('success', 'Pengaduan berhasil dihapus.');
    }
    // Selesai Bagian Pengaduan

}
