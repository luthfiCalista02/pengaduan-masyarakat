<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengaduan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_pengaduan',
        'nama_masyarakat',
        'nik',
        'judul_pengaduan',
        'isi_pengaduan',
        'waktu',
        'lokasi',
        'foto',
        'status'
    ];
}
