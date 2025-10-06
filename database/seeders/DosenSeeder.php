<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dosen::insert([
            [
                'NIP' => '19800101',
                'name' => 'Prof. Andi Wijaya',
                'pendidikan_terakhir' => 'S3',
                'jurusan' => 'Sistem Teknologi Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIP' => '19810412',
                'name' => 'Dr. Rina Kartika',
                'pendidikan_terakhir' => 'S3',
                'jurusan' => 'Bisnis Digital',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIP' => '19820520',
                'name' => 'Drs. Bambang Prasetyo',
                'pendidikan_terakhir' => 'S2',
                'jurusan' => 'Kewirausahaan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIP' => '19830915',
                'name' => 'Dr. Siti Hapsari',
                'pendidikan_terakhir' => 'S3',
                'jurusan' => 'Bisnis Digital',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'NIP' => '19841230',
                'name' => 'Ir. Joko Santoso',
                'pendidikan_terakhir' => 'S2',
                'jurusan' => 'Sistem Teknologi Informasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
