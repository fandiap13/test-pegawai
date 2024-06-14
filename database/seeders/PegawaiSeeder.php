<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        // $pegawai = [
        //     [
        //         'nik' => '331300xxxxxxxxxx',
        //         'nama_karyawan' => 'Robert.',
        //         'gaji_pokok' => 10000000,
        //     ],
        // ];

        $faker = FakerFactory::create('id_ID'); // faker untuk bahasa indo
        for ($i = 1; $i <= 30; $i++) {
            // nik random
            $nik = mt_rand(1000000000000000, 9999999999999999);
            Pegawai::create([
                'nik' => $nik,
                'nama_karyawan' => $faker->name,
                'tgl_lahir' => $faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'),
                'tempat_lahir' => $faker->city,
                'agama' => $faker->randomElement(['islam', 'kristen', 'katolik', 'hindu', 'budha', 'konghuchu']),
                'status_nikah' => $faker->randomElement(['belum kawin', 'kawin']),
                'alamat' => $faker->address,
                'no_telp' => '628' . $faker->numerify('###########'),
                'pendidikan' => $faker->randomElement(['SMA/SMK/Sederajat', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']),
                'tgl_diangkat' => $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
                'id_jabatan' => $faker->randomElement([1, 2, 3, 4]),
            ]);
        }
    }
}
