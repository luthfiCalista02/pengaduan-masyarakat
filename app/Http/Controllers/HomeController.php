<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // Register // Register // Register // Register
    public function register()
    {
        return view('register');
    }

    public function proses_register(Request $request)
    {
        $request->validate([
            'nik'               => 'required|unique:masyarakat,nik',
            'nama_masyarakat'   => 'required',
            'alamat'            => 'required',
            'tgl_lahir'         => 'required',
            'jenis_kelamin'     => 'required',
            'tlp'               => 'required',
            'email'             => 'required',
            'password'          => 'required',
        ]);

        // Simpan ke database
        $dataMasyarakat = [
            'nik' => $request->nik,
            'nama_masyarakat' => $request->nama_masyarakat,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tlp' => $request->tlp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        Masyarakat::create($dataMasyarakat);
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil!');
    }


    // Login // Login //Login //Login
    public function login()
    {
        return view('login');
    }

}
