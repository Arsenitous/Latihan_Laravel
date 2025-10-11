<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'NIM',
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'jurusan',
        'angkatan',
        'max_sks'
    ];

    protected $primaryKey ='id';

    protected $table = 'table_mahasiswa';

    public function matakuliah()
{
    return $this->belongsToMany(Matakuliah::class, 'table_matakuliah_mahasiswa', 'id_mahasiswa', 'id_MK');
}
}
