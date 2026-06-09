<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        Partner::create([
            'name' => 'PT Astra Nippon Gasket Indonesia',
            'logo' => 'logo-astra.png',
            'website' => 'http://www.angi.co.id/',
            'address' => 'Karawang International Industrial City (KIIC), Jl. Maligi III, Lot. N-1 Karawang Barat, Karawang 41361, Jawa Barat, Indonesia.',
            'sort_order' => 1,
        ]);

        Partner::create([
            'name' => 'PT Meiji Food Indonesia',
            'logo' => 'logo-meiji.png',
            'website' => 'https://www.meiji.co.id/id',
            'address' => 'Karawang International Industrial City (KIIC) Jl. Maligi III No.Desa Lot J-2B, Karawang Barat, Jawa Barat 41361, Indonesia.',
            'sort_order' => 2,
        ]);

        Partner::create([
            'name' => 'PT Sango Indonesia',
            'logo' => 'logo-sango.png',
            'website' => 'https://sango-sti.com/sango-indonesia.php',
            'address' => 'Kawasan Industri Mitra Karawang (KIM) Mitra Selatan IV BLOK M1-2, Desa Parungmulya, Kecamatan Ciampel, Karawang 41361 Jawa Barat - Indonesia.',
            'sort_order' => 3,
        ]);
    }
}
