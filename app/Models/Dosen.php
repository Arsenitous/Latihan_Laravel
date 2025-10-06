<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = [
        'NIP',
        'name',
        'pendidikan_terakhir',
        'jurusan',
    ];

     protected $primaryKey ='id_Dosen';

        protected $table = 'table_dosen';

         public function matakuliah()
    {
        return $this->hasMany(Matakuliah::class, 'id_Dosen', 'id_Dosen');
    }
}
