<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = [
        'id_pegawai',
        'nama_pegawai',
        'email',
        'password',
        'level',
    ];

    protected $hidden = [
        'password',
    ];
}
