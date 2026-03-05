<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RuteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rute')->insert([
            [
                'nama_lokasi' => 'Dawuan',
                'tipe' => 'jemput',
                'latitude' => -6.3778000,
                'longitude' => 107.2656000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lokasi' => 'Rengasdengklok',
                'tipe' => 'jemput',
                'latitude' => -6.1596000,
                'longitude' => 107.2994000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lokasi' => 'Wadas',
                'tipe' => 'jemput',
                'latitude' => -6.3559000,
                'longitude' => 107.2875000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lokasi' => 'Cikampek',
                'tipe' => 'jemput',
                'latitude' => -6.4197000,
                'longitude' => 107.4559000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lokasi' => 'Cikarang',
                'tipe' => 'jemput',
                'latitude' => -6.2620000,
                'longitude' => 107.1520000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // =====================
            // LOKASI TUJUAN
            // =====================
            [
                'nama_lokasi' => 'KIIC (Karawang International Industrial City)',
                'tipe' => 'tujuan',
                'latitude' => -6.3632000,
                'longitude' => 107.3398000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lokasi' => 'KIM (Kawasan Industri Mitra Karawang)',
                'tipe' => 'tujuan',
                'latitude' => -6.3995000,
                'longitude' => 107.3237000,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
