<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan'; // Nama tabel di database

    protected $fillable = ['id_pengaduan', 'nama_masyarakat', 'nik', 'judul_pengaduan', 'isi_pengaduan', 'waktu', 'lokasi', 'lampiran', 'status']; // Kolom yang diperbolehkan mass assignment
}
