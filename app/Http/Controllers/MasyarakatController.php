<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

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
