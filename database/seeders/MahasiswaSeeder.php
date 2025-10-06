<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Mahasiswa::insert([
            [
                'NIM' => '2023001',
                'name' => 'Ahmad Setiawan',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2002-05-14',
                'jurusan' => 'Sistem Teknologi Informasi',
                'angkatan' => 2023,
            ],
            [
                'NIM' => '2023002',
                'name' => 'Budi Santoso',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2001-11-02',
                'jurusan' => 'Bisnis Digital',
                'angkatan' => 2023,
            ],
            [
                'NIM' => '2023003',
                'name' => 'Citra Dewi',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2002-08-21',
                'jurusan' => 'Kewirausahaan',
                'angkatan' => 2023,
            ],
            [
                'NIM' => '2023004',
                'name' => 'Dian Pratama',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2003-01-09',
                'jurusan' => 'Sistem Teknologi Informasi',
                'angkatan' => 2023,
            ],
            [
                'NIM' => '2023005',
                'name' => 'Eka Lestari',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '2002-03-18',
                'jurusan' => 'Bisnis Digital',
                'angkatan' => 2023,
            ],
        ]);
    
    }
}
