<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use App\Models\User;
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
            'email'           => 'required',
            'password'        => 'required',
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

        // Cek apakah user adalah masyarakat
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/beranda_masyarakat');
        }

        // Cek apakah user adalah pegawai (admin atau petugas)
        if (Auth::guard('pegawais')->attempt($credentials)) {
            $pegawai = Auth::guard('pegawais')->user();

            // Set sesi level pegawai
            session(['level' => $pegawai->level]);
            $request->session()->regenerate();

            // Redirect sesuai level
            if ($pegawai->level === 'petugas') {
                return redirect('/dashboard_petugas');
            } elseif ($pegawai->level === 'admin') {
                return redirect('/dashboard_admin');
            }

            return redirect('/'); // Redirect default jika level tidak dikenali
        }

        // Jika login gagal
        return back()->withErrors(['login' => 'Email atau password salah'])->withInput();
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
