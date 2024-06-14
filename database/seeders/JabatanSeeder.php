<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan')->insert([
            [
                'id' => 1,
                'jabatan' => 'Manager',
                'deskripsi' => 'Bertanggung jawab atas manajemen umum.',
                'gaji_pokok' => 10000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'jabatan' => 'Supervisor',
                'deskripsi' => 'Mengawasi kinerja karyawan.',
                'gaji_pokok' => 8000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'jabatan' => 'Staff Marketing',
                'deskripsi' => 'Merancang dan melaksanakan berbagai kampanye promosi perusahaan.',
                'gaji_pokok' => 5000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'jabatan' => 'Programmer',
                'deskripsi' => 'Merancang dan mengembangkan sebuat program.',
                'gaji_pokok' => 6000000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
