<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::table('table_matakuliah', function(Blueprint $table){
            $table->bigIncrements('id_MK');
            $table->string('kode_MK');
            $table->string('nama_Matakuliah');
            $table->enum('jurusan',['Bisnis Digital', 'Sistem Teknologi Informasi', 'Kewirausahaan']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::drop('table_matakuliah');
           
      

    }
};
