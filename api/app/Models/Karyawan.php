<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'id_karyawan',
        'nik',
        'nama',
        'ttl',
        'alamat',
        'id_jabatan'
    ];
    protected $hidden = [];
}
