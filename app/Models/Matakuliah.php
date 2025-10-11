<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
     protected $fillable = [
        'kode_MK',
        'nama_Matakuliah',
        'jurusan',
        'id_Dosen',
        'sks',
    ];

    protected $primaryKey ='id_MK';

    protected $table = 'table_matakuliah';

     public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_Dosen', 'id_Dosen');
    }

    public function mahasiswa()
{
    return $this->belongsToMany(Mahasiswa::class, 'table_matakuliah_mahasiswa', 'id_MK', 'id_mahasiswa');
}


}


