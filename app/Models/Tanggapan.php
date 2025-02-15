<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanggapan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tanggapan';
    protected $fillable = [
        'id_tanggapan',
        'id_pegawai',
        'id_pengaduan',
        'waktu',
        'tanggapan',
    ];
}
