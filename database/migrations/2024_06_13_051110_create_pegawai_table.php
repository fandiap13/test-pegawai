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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 16);
            $table->string('nama_karyawan', 150);
            $table->string('tempat_lahir', 150);
            $table->date('tgl_lahir');
            $table->string('agama')->nullable();
            $table->string('status_nikah');
            $table->text('alamat')->nullable();
            $table->char('no_telp', 15);
            $table->string('pendidikan', 150);
            $table->string('profil');
            $table->date('tgl_diangkat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
