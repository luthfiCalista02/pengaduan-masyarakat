<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function destroy(Pengaduan $id_pengaduan)
    {
        $pengaduan = Pengaduan::find($id_pengaduan);

        if (!$pengaduan) {
            return response()->json(['error' => 'Pengaduan tidak ditemukan!'], 404);
        }

        $pengaduan->forceDelete(); // Hapus permanen dari database

        return response()->json(['success' => 'Pengaduan berhasil dihapus secara permanen!']);
    }
}
