<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateMaxSKSMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data = [
            1 => 24,
            2 => 20,
            3 => 22,
            4 => 21,
            5 => 23,
        ];

        foreach ($data as $id => $max_sks) {
            DB::table('table_mahasiswa') 
                ->where('id', $id)
                ->update(['max_sks' => $max_sks]);
        }
    }
}
