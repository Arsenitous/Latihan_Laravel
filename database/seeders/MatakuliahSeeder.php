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
        //     [
        //         'kode_MK' => 'MK001',
        //         'nama_Matakuliah' => 'Pemrograman Web',
        //         'jurusan' => 'Sistem Teknologi Informasi',
        //     ],
        //     [
        //         'kode_MK' => 'MK002',
        //         'nama_Matakuliah' => 'Basis Data',
        //         'jurusan' => 'Sistem Teknologi Informasi',
        //     ],
        //     [
        //         'kode_MK' => 'MK003',
        //         'nama_Matakuliah' => 'Kewirausahaan Digital',
        //         'jurusan' => 'Bisnis Digital',
        //     ],
        //     [
        //         'kode_MK' => 'MK004',
        //         'nama_Matakuliah' => 'Analisis Sistem',
        //         'jurusan' => 'Sistem Teknologi Informasi',
        //     ],
        //     [
        //         'kode_MK' => 'MK005',
        //         'nama_Matakuliah' => 'Manajemen Inovasi',
        //         'jurusan' => 'Bisnis Digital',
        //     ],

             // === Bisnis Digital ===
            [
                'kode_MK' => 'MK006',
                'nama_Matakuliah' => 'Digital Marketing',
                'jurusan' => 'Bisnis Digital',
                'sks' => 3,
                'id_Dosen' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK007',
                'nama_Matakuliah' => 'E-Commerce Strategy',
                'jurusan' => 'Bisnis Digital',
                'sks' => 3,
                'id_Dosen' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK008',
                'nama_Matakuliah' => 'Data Analytics for Business',
                'jurusan' => 'Bisnis Digital',
                'sks' => 4,
                'id_Dosen' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK009',
                'nama_Matakuliah' => 'Content Creation & Branding',
                'jurusan' => 'Bisnis Digital',
                'sks' => 2,
                'id_Dosen' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK010',
                'nama_Matakuliah' => 'Social Media Management',
                'jurusan' => 'Bisnis Digital',
                'sks' => 3,
                'id_Dosen' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // === Sistem Teknologi Informasi ===
            [
                'kode_MK' => 'MK011',
                'nama_Matakuliah' => 'Pemrograman Mobile',
                'jurusan' => 'Sistem Teknologi Informasi',
                'sks' => 3,
                'id_Dosen' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK012',
                'nama_Matakuliah' => 'Jaringan Komputer',
                'jurusan' => 'Sistem Teknologi Informasi',
                'sks' => 4,
                'id_Dosen' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK013',
                'nama_Matakuliah' => 'Keamanan Sistem Informasi',
                'jurusan' => 'Sistem Teknologi Informasi',
                'sks' => 3,
                'id_Dosen' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK014',
                'nama_Matakuliah' => 'Kecerdasan Buatan',
                'jurusan' => 'Sistem Teknologi Informasi',
                'sks' => 3,
                'id_Dosen' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK015',
                'nama_Matakuliah' => 'Manajemen Proyek TI',
                'jurusan' => 'Sistem Teknologi Informasi',
                'sks' => 2,
                'id_Dosen' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // === Kewirausahaan ===
            [
                'kode_MK' => 'MK016',
                'nama_Matakuliah' => 'Perencanaan Bisnis',
                'jurusan' => 'Kewirausahaan',
                'sks' => 3,
                'id_Dosen' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK017',
                'nama_Matakuliah' => 'Inovasi dan Kreativitas',
                'jurusan' => 'Kewirausahaan',
                'sks' => 2,
                'id_Dosen' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK018',
                'nama_Matakuliah' => 'Manajemen Keuangan Usaha',
                'jurusan' => 'Kewirausahaan',
                'sks' => 4,
                'id_Dosen' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK019',
                'nama_Matakuliah' => 'Kepemimpinan dan Etika Bisnis',
                'jurusan' => 'Kewirausahaan',
                'sks' => 3,
                'id_Dosen' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_MK' => 'MK020',
                'nama_Matakuliah' => 'Startup Business Simulation',
                'jurusan' => 'Kewirausahaan',
                'sks' => 3,
                'id_Dosen' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    
    }
}
