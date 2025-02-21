<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // Register // Register // Register // Register
    public function register()
    {
        return view('register');
    }

    public function prosesdaftar(Request $request) {
        $request->validate([
            'nik'             => 'required|unique:users,nik',
            'nama_masyarakat' => 'required',
            'alamat'          => 'required',
            'tgl_lahir'       => 'required',
            'jenis_kelamin'   => 'required',
            'tlp'             => 'required',
            'email'           => 'required|email|unique:users,email',
            'password'        => 'required',
        ], [
            'nik.unique'   => 'NIK sudah terdaftar!',
            'email.unique' => 'Email sudah terdaftar!',
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
        return redirect('/login')->with('success', 'Pendaftaran Berhasil!');
    }

    // Login // Login //Login //Login
    public function login()
    {
        return view('login');
    }

    public function proseslogin(Request $request)
    {
        $credentials = ['email' => $request->email, 'password' => $request->password];

        // Cek apakah email ada di database
        $user = User::where('email', $request->email)->first();
        $pegawai = Pegawai::where('email', $request->email)->first();

        if (!$user && !$pegawai) {
            return back()->with('error', 'Email salah')->withInput();
        }

        // Cek login untuk masyarakat
        if ($user && !Auth::attempt($credentials)) {
            return back()->with('error', 'Password salah')->withInput();
        }
        if ($user) {
            $request->session()->regenerate();
            return redirect('/beranda_masyarakat');
        }

        // Cek login untuk pegawai
        if ($pegawai && !Auth::guard('pegawais')->attempt($credentials)) {
            return back()->with('error', 'Password salah')->withInput();
        }
        if ($pegawai) {
            $pegawai = Auth::guard('pegawais')->user();
            session(['level' => $pegawai->level]);
            $request->session()->regenerate();

            if ($pegawai->level === 'petugas') {
                return redirect('/dashboard_petugas');
            } elseif ($pegawai->level === 'admin') {
                return redirect('/dashboard_admin');
            }

            return redirect('/');
        }

        return back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
    }

    public function proseslogout(Request $request)
    {
        $redirectTo = '/'; // Default redirect ke halaman utama untuk masyarakat

        // Logout masyarakat (Auth web)
        if (Auth::check()) {
            Auth::logout();
            $redirectTo = '/'; // Redirect ke halaman utama setelah logout
        }
        // Logout pegawai (Auth pegawais)
        elseif (Auth::guard('pegawais')->check()) {
            Auth::guard('pegawais')->logout();
            $redirectTo = '/login'; // Redirect ke halaman login pegawai setelah logout
        }

        // Hapus sesi dan regenerasi token untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman yang sesuai
        return redirect($redirectTo);
    }
}
