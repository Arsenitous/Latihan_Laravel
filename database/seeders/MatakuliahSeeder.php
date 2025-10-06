<?php

namespace Database\Seeders;

use App\Models\Matakuliah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Matakuliah::insert([
            [
                'kode_MK' => 'MK001',
                'nama_Matakuliah' => 'Pemrograman Web',
                'jurusan' => 'Sistem Teknologi Informasi',
            ],
            [
                'kode_MK' => 'MK002',
                'nama_Matakuliah' => 'Basis Data',
                'jurusan' => 'Sistem Teknologi Informasi',
            ],
            [
                'kode_MK' => 'MK003',
                'nama_Matakuliah' => 'Kewirausahaan Digital',
                'jurusan' => 'Bisnis Digital',
            ],
            [
                'kode_MK' => 'MK004',
                'nama_Matakuliah' => 'Analisis Sistem',
                'jurusan' => 'Sistem Teknologi Informasi',
            ],
            [
                'kode_MK' => 'MK005',
                'nama_Matakuliah' => 'Manajemen Inovasi',
                'jurusan' => 'Bisnis Digital',
            ],
        ]);
    
    }
}
