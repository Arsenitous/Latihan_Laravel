<?php

namespace Database\Seeders;

use App\Models\matakuliah_mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatakuliahMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        matakuliah_mahasiswa::insert([
          // Ahmad Setiawan - Sistem Teknologi Informasi
            ['id_MK' => 2,  'id_mahasiswa' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 4,  'id_mahasiswa' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 11, 'id_mahasiswa' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 13, 'id_mahasiswa' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 14, 'id_mahasiswa' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 15, 'id_mahasiswa' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Budi Santoso - Bisnis Digital
            ['id_MK' => 5,  'id_mahasiswa' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 8,  'id_mahasiswa' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 9,  'id_mahasiswa' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 10, 'id_mahasiswa' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 11, 'id_mahasiswa' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 12, 'id_mahasiswa' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Citra Dewi - Kewirausahaan
            ['id_MK' => 16, 'id_mahasiswa' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 17, 'id_mahasiswa' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 18, 'id_mahasiswa' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 19, 'id_mahasiswa' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 20, 'id_mahasiswa' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 21, 'id_mahasiswa' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Dian Pratama - Sistem Teknologi Informasi
            ['id_MK' => 2,  'id_mahasiswa' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 4,  'id_mahasiswa' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 11, 'id_mahasiswa' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 13, 'id_mahasiswa' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 15, 'id_mahasiswa' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Eka Lestari - Bisnis Digital
            ['id_MK' => 5,  'id_mahasiswa' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 8,  'id_mahasiswa' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 9,  'id_mahasiswa' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 10, 'id_mahasiswa' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 11, 'id_mahasiswa' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['id_MK' => 12, 'id_mahasiswa' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
