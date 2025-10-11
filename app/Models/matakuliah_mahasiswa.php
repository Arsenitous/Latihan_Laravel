<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matakuliah_mahasiswa extends Model
{
     protected $fillable = [
        'id_MK',
        'id_mahasiswa',
    ];

     protected $primaryKey ='id_MM';

    protected $table = 'table_matakuliah_mahasiswa';
}
