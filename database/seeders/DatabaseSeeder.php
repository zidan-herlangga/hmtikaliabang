<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            "name" => "Admin",
            "username" => "zidanherlangga",
            "email" => "zidanherlangga24@gmail.com",
            "role" => 3,
            "password" => bcrypt("adminadmin"),
        ]);

        // \App\Models\Category::create([
        //     "title" => "Uncategorized",
        //     "slug" => "uncategorized",
        // ]);

        \App\Models\SiteSetting::create([
            "site_title" => "HMTI Kaliabang",
            "tagline" => "",
            "description" => "Himpunan Mahasiswa Teknologi Informasi (HMTI) adalah wadah
                aspirasi dan pelayanan bagi mahasiswa Jurusan Teknologi
                Informasi.",
            "logo_dark" => "logo_dark.png",
            "logo_light" => "logo_light.png",
            "copyright_text" => "© 2025 HMTI Kaliabang, All Rights Reserved.",
            "enable_registration" => "1",
        ]);

        \App\Models\Menu::create([
            "header_menu" => json_encode([
                [
                    "href" => "/",
                    "icon" => "",
                    "text" => "Beranda",
                    "tooltip" => "",
                    "children" => []
                ],

                [
                    "href" => "/news",
                    "icon" => "",
                    "text" => "News",
                    "tooltip" => "",
                    "children" => []
                ],

                // [
                //     "href" => "#",
                //     "icon" => "",
                //     "text" => "AboutUs",
                //     "tooltip" => "",
                //     "children" => []
                // ],
                // [
                //     "href" => "#",
                //     "icon" => "",
                //     "text" => "ContactUs",
                //     "tooltip" => "",
                //     "children" => []
                // ],
                // ["href" => "#", "icon" => "", "text" => "PrivacyPolicy", "tooltip" => "", "children" => []]

            ]),

            "footer_menu" => json_encode([
                ["href" => "/", "icon" => "", "text" => "Beranda", "tooltip" => "", "children" => []],
                // ["href" => "#", "icon" => "", "text" => "AboutUs", "tooltip" => "", "children" => []],
                // ["href" => "#", "icon" => "", "text" => "ContactUs", "tooltip" => "", "children" => []],
                // ["href" => "#", "icon" => "", "text" => "PrivacyPolicy", "tooltip" => "", "children" => []]
            ]),
        ]);
    }
}
