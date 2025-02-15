<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Model
{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'masyarakat'; // Nama tabel di database

    protected $fillable = [
        'nik',
        'nama_masyarakat',
        'alamat',
        'tgl_lahir',
        'jenis_kelamin',
        'tlp',
        'email',
        'password',
        'status',
    ];

    protected $hidden = [
        'password',
    ];
}
