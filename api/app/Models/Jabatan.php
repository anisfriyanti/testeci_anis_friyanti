<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{

    protected $fillable = [
        'id_jabatan',
        'nama_jabatan',
        'id_level'
    ];
    protected $hidden = [];
}
