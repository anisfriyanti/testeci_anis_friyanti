<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'id_level',
        'nama_level'
    ];
    protected $hidden = [];
}
