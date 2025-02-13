<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $fillable = [
        'id_tanggapan',
        'id_pegawai',
        'id_pengaduan',
        'waktu',
        'tanggapan',
    ];
}
