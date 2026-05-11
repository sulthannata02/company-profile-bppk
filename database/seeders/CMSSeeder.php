<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CMSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            [
                'key' => 'hero_title',
                'label' => 'Judul Hero (Banner)',
                'value_id' => 'MITRA TRANSPORTASI TERPERCAYA',
                'value_en' => 'YOUR TRUSTED TRANSPORTATION PARTNER',
                'type' => 'text',
                'group' => 'hero'
            ],
            [
                'key' => 'hero_desc',
                'label' => 'Deskripsi Hero (Banner)',
                'value_id' => 'Berkah Putra Putri Karawang adalah perusahaan penyedia layanan transportasi yang berfokus pada jasa antar jemput karyawan perusahaan. Kami hadir sebagai mitra terpercaya bagi berbagai perusahaan yang membutuhkan solusi transportasi harian yang aman, tepat waktu, dan efisien untuk para karyawannya.',
                'value_en' => 'Berkah Putra Putri Karawang is a transportation service provider specializing in employee pick-up and drop-off services. We are a trusted partner for various companies seeking safe, timely, and efficient daily transportation solutions for their employees.',
                'type' => 'textarea',
                'group' => 'hero'
            ],
            // Vision
            [
                'key' => 'vision_text',
                'label' => 'Isi Visi Perusahaan',
                'value_id' => '"Menjadi perusahaan penyedia layanan transportasi terkemuka di Indonesia yang dikenal akan keandalan, keamanan, dan inovasi dalam memenuhi kebutuhan mobilitas karyawan perusahaan."',
                'value_en' => '"To become a leading transportation service provider in Indonesia, known for reliability, safety, and innovation in meeting the mobility needs of company employees."',
                'type' => 'textarea',
                'group' => 'vision'
            ],
            [
                'key' => 'mission_text',
                'label' => 'Isi Misi Perusahaan',
                'value_id' => '"Menyediakan armada kendaraan yang terawat dan nyaman untuk memastikan perjalanan yang aman dan menyenangkan bagi karyawan, Merekrut dan melatih pengemudi profesional yang berkomitmen terhadap keselamatan dan pelayanan prima, Mengimplementasikan teknologi terkini untuk meningkatkan efisiensi operasional dan pengalaman pelanggan, Menjalin kemitraan jangka panjang dengan perusahaan melalui pelayanan yang konsisten dan dapat diandalkan."',
                'value_en' => '"Providing a well-maintained and comfortable fleet to ensure safe and pleasant journeys for employees, Recruiting and training professional drivers committed to safety and excellent service, Implementing the latest technology to enhance operational efficiency and customer experience, Building long-term partnerships with companies through consistent and reliable service."',
                'type' => 'textarea',
                'group' => 'mission'
            ],
            // Why Us
            [
                'key' => 'why_us_desc',
                'label' => 'Deskripsi "Mengapa Kami"',
                'value_id' => 'Kami hadir sebagai solusi transportasi antar jemput karyawan yang profesional, aman, dan terpercaya.',
                'value_en' => 'We provide professional, safe, and reliable employee shuttle transportation services.',
                'type' => 'textarea',
                'group' => 'why_us'
            ],
            // Contact
            [
                'key' => 'contact_email',
                'label' => 'Email Kontak',
                'value_id' => 'ptbppkkarawang@gmail.com',
                'value_en' => 'ptbppkkarawang@gmail.com',
                'type' => 'text',
                'group' => 'contact'
            ],
            [
                'key' => 'contact_phone',
                'label' => 'Nomor WhatsApp/Telepon',
                'value_id' => '+62 819 9806 2726',
                'value_en' => '+62 819 9806 2726',
                'type' => 'text',
                'group' => 'contact'
            ],
            [
                'key' => 'contact_address',
                'label' => 'Alamat Perusahaan',
                'value_id' => 'Dusun Ciherang RT 001 / RW 005, Desa Wadas, Telukjambe Timur, Karawang – Jawa Barat',
                'value_en' => 'Dusun Ciherang RT 001 / RW 005, Wadas Village, East Telukjambe, Karawang – West Java',
                'type' => 'textarea',
                'group' => 'contact'
            ],
            [
                'key' => 'google_maps_iframe',
                'label' => 'Link Iframe Google Maps',
                'value_id' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.3652631196103!2d107.27806536303126!3d-6.334269631478037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d3e43d1f6eb%3A0xc49a90c0eb120575!2sKantor%20Sekretariat%20RW.05!5e0!3m2!1sid!2sid!4v1765394489452!5m2!1sid!2sid',
                'value_en' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.3652631196103!2d107.27806536303126!3d-6.334269631478037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699d3e43d1f6eb%3A0xc49a90c0eb120575!2sKantor%20Sekretariat%20RW.05!5e0!3m2!1sid!2sid!4v1765394489452!5m2!1sid!2sid',
                'type' => 'text',
                'group' => 'contact'
            ],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        $partners = [
            [
                'name' => 'PT Astra Nippon Gasket Indonesia',
                'logo' => 'logo-astra.png',
                'link' => 'http://www.angi.co.id/',
                'address' => 'Karawang International Industrial City (KIIC), Jl. Maligi III, Lot. N-1 Karawang Barat, Karawang 41361, Jawa Barat, Indonesia.',
                'order' => 1,
            ],
            [
                'name' => 'PT Meiji Food Indonesia',
                'logo' => 'logo-meiji.png',
                'link' => 'https://www.meiji.co.id/id',
                'address' => 'Karawang International Industrial City (KIIC) Jl. Maligi III No.Desa Lot J-2B, Karawang Barat, Jawa Barat 41361, Indonesia.',
                'order' => 2,
            ],
            [
                'name' => 'PT Sango Indonesia',
                'logo' => 'logo-sango.png',
                'link' => 'https://sango-sti.com/sango-indonesia.php',
                'address' => 'Kawasan Industri Mitra Karawang (KIM) Mitra Selatan IV BLOK M1-2, Desa Parungmulya, Kacamatan Ciampel, Karawang 41361 Jawa Barat - Indonesia',
                'order' => 3,
            ],
        ];

        foreach ($partners as $partner) {
            \App\Models\Partner::updateOrCreate(['name' => $partner['name']], $partner);
        }
    }
}
