<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jabatan extends Model
{

    protected $fillable = [
        'id_jabatan',
        'nama_jabatan',
        'id_level'
    ];
    protected $hidden = [];
    public function list(){
        $data = DB::table('jabatans as a')
        ->leftJoin('levels as b','b.id_level','=','a.id_level')
         ->get([
            "a.*",'b.nama_level'
         ]
            
         );
         return $data;
    }
}
