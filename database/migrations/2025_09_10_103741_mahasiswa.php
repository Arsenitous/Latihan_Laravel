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
    Schema::create('table_mahasiswa', function(Blueprint $table){
        $table->id(); // tambahkan primary key
        $table->string('NIM');
        $table->string('name');
        $table->string('tempat_lahir');
        $table->date('tanggal_lahir');
        $table->enum('jurusan',['Bisnis Digital', 'Sistem Teknologi Informasi', 'Kewirausahaan']);
        $table->integer('angkatan');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::drop('table_mahasiswa');
    }
};
