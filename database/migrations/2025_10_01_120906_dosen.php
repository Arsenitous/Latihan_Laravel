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
    Schema::create('table_dosen', function(Blueprint $table){
        $table->bigIncrements('id_Dosen'); // tambahkan primary key
        $table->string('NIP');
        $table->string('name');
        $table->string('pendidikan_terakhir');
        $table->enum('jurusan',['Bisnis Digital', 'Sistem Teknologi Informasi', 'Kewirausahaan']);;
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
             schema::drop('table_dosen');
    }
};
