<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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
    public function list(){
        $data = DB::table('karyawans as a')
        ->leftJoin('jabatans as b','b.id_jabatan','=','a.id_jabatan')
         ->get([
            "a.*",'b.nama_jabatan'
         ]
            
         );
         return $data;
    }
}
