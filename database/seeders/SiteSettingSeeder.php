<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use App\Models\Menu;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ==========================================
        // 1. SITE SETTINGS
        // ==========================================
        
        // Cek dulu apakah sudah ada data agar tidak dobel
        if (SiteSetting::count() == 0) {
            SiteSetting::create([
                'site_title'         => 'HMTI Kaliabang',
                'tagline'            => 'Inovatif, Kreatif, Interaktif',
                'description'        => 'Himpunan Mahasiswa Teknologi Informasi (HMTI) adalah wadah aspirasi dan pelayanan bagi mahasiswa Jurusan Teknologi Informasi.',
                'logo_dark'          => 'logo-himpunan.png', // Pastikan file ini ada di public/uploads/logo/
                'logo_light'         => 'logo-himpunan.png', // Pastikan file ini ada di public/uploads/logo/
                'copyright_text'     => '&copy; 2024 HMTI Kaliabang. All Rights Reserved.',
                'enable_registration'=> 1, // 1 = Active, 0 = Inactive
            ]);
            $this->command->info('Site Settings berhasil dibuat.');
        } else {
            $this->command->info('Site Settings sudah ada, skip.');
        }

    
    }
}