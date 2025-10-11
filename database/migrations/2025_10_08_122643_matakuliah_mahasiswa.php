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
        Schema::create('table_matakuliah_mahasiswa', function (Blueprint $table) {
             $table->bigIncrements('id_MM');
             $table->unsignedBigInteger('id_MK')->nullable();
             $table->foreign('id_MK')
                  ->references('id_MK')
                  ->on('table_matakuliah')
                  ->onDelete('set null');

             $table->unsignedBigInteger('id_mahasiswa')->nullable();
             $table->foreign('id_mahasiswa')
                  ->references('id')
                  ->on('table_mahasiswa')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('table_matakuliah_mahasiswa');
    }
};
