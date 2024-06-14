<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $fillable = [
        'nik',
        'nama_karyawan',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'status_nikah',
        'alamat',
        'no_telp',
        'pendidikan',
        'profil',
        'tgl_diangkat',
        'id_jabatan',
    ];
}
