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
        Schema::table('table_matakuliah', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Dosen')->nullable()->after('jurusan');
            $table->foreign('id_Dosen')
                  ->references('id_Dosen')
                  ->on('table_dosen')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('matakuliah', function (Blueprint $table) {
             Schema::table('table_matakuliah', function (Blueprint $table) {
            $table->dropForeign(['id_Dosen']);
            $table->dropColumn('id_Dosen');
        });
        });
    }
};
