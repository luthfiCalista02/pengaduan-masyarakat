<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Authenticatable
{

    use HasFactory;
    use SoftDeletes;
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';
    public $timestamps = false;
    protected $dates = ['deleted_at'];

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
