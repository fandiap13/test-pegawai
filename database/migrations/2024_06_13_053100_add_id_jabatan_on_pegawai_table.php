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
        Schema::table('pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jabatan')->required()->after('tgl_diangkat');
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pegawai', function (Blueprint $table) {
            $table->dropForeign(['id_jabatan']);  // menghapus foreign key
            $table->dropColumn('id_jabatan');
        });
    }
};
