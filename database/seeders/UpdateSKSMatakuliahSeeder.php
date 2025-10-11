<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateSKSMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    
        {
        $data = [
            1 => 3, // Pemrograman Web
            2 => 4, // Basis Data
            3 => 2, // Kewirausahaan Digital
            4 => 3, // Analisis Sistem
            5 => 2, // Manajemen Inovasi
        ];

        foreach ($data as $id => $sks) {
            DB::table('table_matakuliah')
                ->where('id_MK', $id)
                ->update(['sks' => $sks]);
        }
    }
}
