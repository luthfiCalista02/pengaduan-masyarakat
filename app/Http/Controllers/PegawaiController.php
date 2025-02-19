<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    // Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin // Admin

    public function dashboard_admin()
    {
        $jumlahMasyarakat = Masyarakat::count();
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

        // Simpan tanggapan
        $pengaduan->tanggapan = $request->tanggapan;

        // Ubah status jadi "Selesai"
        $pengaduan->status = 'Selesai';
        $pengaduan->save();

        return redirect()->route('tabel_pengaduan')->with('success', 'Pengaduan telah ditanggapi dan selesai.');
    }

    public function hapus_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        $pengaduan->delete();

        return redirect()->route('tabel_pengaduan')->back()->with('success', 'Pengaduan berhasil dihapus.');
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
            'nama_pegawai'    => 'required',
            'email'           => 'required',
            'level'           => 'required|in:admin,petugas',
            'password'        => 'required',
        ]);

        $dataPegawai = [
            'nama_pegawai'      => $request->nama_pegawai,
            'email'             => $request->email,
            'level'             => $request->level,
            'password'          => Hash::make($request->password),
        ];

        Pegawai::create($dataPegawai);
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
            'email'        => 'required',
            'level'        => 'required|in:admin,petugas',
            'password'     => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($request->id_pegawai);
        $pegawai->update([
            'nama_pegawai' => $request->nama_pegawai,
            'email'        => $request->email,
            'level'        => $request->level,
            'password'     => Hash::make($request->password),
        ]);

        return redirect('/akun_pegawai')->with('success', 'Akun Pegawai Berhasil Diperbarui!');
    }
    // Selesai Bagian Pegawai

    // Bagian Masyarakat
    public function akun_masyarakat()
    {
        $masyarakat = Masyarakat::all();
        return view('pegawai.admin.akun_masyarakat', compact('masyarakat'));
    }

    public function detail_akun_masyarakat($nik)
    {
        $masyarakat = Masyarakat::where('nik', $nik)->first();

        if (!$masyarakat) {
            return abort(404, 'Akun masyarakat tidak ditemukan');
        }

        return view('pegawai.admin.detail_akun_masyarakat', compact('masyarakat'));
    }


    public function tambah_akun_masyarakat()
    {
        $masyarakat = Masyarakat::all();
        return view('pegawai.admin.tambah_akun_masyarakat', compact('masyarakat'));
    }

    public function tambahmasyarakat(Request $request) {
        $request->validate([
            'nik'             => 'required|unique:masyarakat,nik',
            'nama_masyarakat' => 'required',
            'alamat'          => 'required',
            'tgl_lahir'       => 'required',
            'jenis_kelamin'   => 'required',
            'tlp'             => 'required',
            'email'           => 'required',
            'password'        => 'required',
        ]);

        $dataMasyarakat = [
            'nik'               => $request->nik,
            'nama_masyarakat'   => $request->nama_masyarakat,
            'alamat'            => $request->alamat,
            'tgl_lahir'         => $request->tgl_lahir,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'tlp'               => $request->tlp,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
        ];

        Masyarakat::create($dataMasyarakat);
        return redirect('/akun_masyarakat')->with('success', 'Tambah Akun Masyarakat Berhasil!');
    }
    // Selesai Bagian Masyarakat

    public function generate_laporan()
    {
        return view('pegawai.admin.generate_laporan');
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

        // Simpan tanggapan
        $pengaduan->tanggapan = $request->tanggapan;

        // Ubah status jadi "Selesai"
        $pengaduan->status = 'Selesai';
        $pengaduan->save();

        return redirect()->route('petugas_tabel_pengaduan')->with('success', 'Pengaduan telah ditanggapi dan selesai.');
    }

    public function petugas_hapus_pengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->firstOrFail();
        $pengaduan->delete();

        return redirect()->route('petugas_tabel_pengaduan')->back()->with('success', 'Pengaduan berhasil dihapus.');
    }
    // Selesai Bagian Pengaduan

}
