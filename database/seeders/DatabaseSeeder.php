<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createUsers();
        $this->createSiteSettings();
        $this->createMenus();
        $this->createCategories();
        $this->createTags();
        $this->createPosts();

        $this->command->info('✅ Semua data demo berhasil dibuat!');
    }

    /**
     * 1. Buat Data User
     */
    private function createUsers(): void
    {
        $users = [
            ['name' => 'Admin Utama', 'username' => 'admin', 'email' => 'admin@hmti.com', 'role' => 3],
            ['name' => 'Penulis Aktif', 'username' => 'author', 'email' => 'author@hmti.com', 'role' => 2],
            ['name' => 'Pengunjung', 'username' => 'visitor', 'email' => 'visitor@hmti.com', 'role' => 1],
        ];

        foreach ($users as $data) {
            User::create([
                'name' => $data['name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make('password'), // Password default: password
                'role' => $data['role'],
                'status' => 1,
                'about' => 'Akun demo untuk testing website HMTI.',
                'profile' => 'default.webp',
            ]);
        }

        $this->command->info('👥 Users created.');
    }

    /**
     * 2. Buat Pengaturan Website
     */
    private function createSiteSettings(): void
    {
        SiteSetting::create([
            'site_title' => 'HMTI Kaliabang',
            'tagline' => 'Inovatif, Kreatif, Interaktif',
            'description' => 'Website resmi Himpunan Mahasiswa Teknologi Informasi Universitas Bina Sarana Informatika.',
            'logo_dark' => 'logo-himpunan.png',
            'logo_light' => 'logo-himpunan.png',
            'copyright_text' => '&copy; 2025 HMTI Kaliabang. All Rights Reserved.',
            'enable_registration' => 1,
        ]);

        $this->command->info('⚙️ Site Settings created.');
    }

    /**
     * 3. Buat Menu Header & Footer
     */
    private function createMenus(): void
    {
        $headerMenu = [
            ['text' => '', 'href' => '', 'icon' => '', 'tooltip' => ''],
            ['text' => '', 'href' => '', 'icon' => '', 'tooltip' => ''],
            ['text' => '', 'href' => '', 'icon' => '', 'tooltip' => ''],
            ['text' => '', 'href' => '', 'icon' => '', 'tooltip' => ''],
        ];

        Menu::create([
            'header_menu' => json_encode($headerMenu),
            'footer_menu' => json_encode([]), 
        ]);

        $this->command->info('🔗 Menus created.');
    }

    /**
     * 4. Buat Kategori
     */
    private function createCategories(): void
    {
        $categories = ['Berita Terkini', 'Tutorial Coding', 'Event Kampus', 'Tips & Trik', 'Teknologi'];

        foreach ($categories as $name) {
            Category::create([
                'title' => $name,
                'slug' => Str::slug($name),
                'status' => 1
            ]);
        }

        $this->command->info('📂 Categories created.');
    }

    /**
     * 5. Buat Tags
     */
    private function createTags(): void
    {
        $tags = ['Laravel', 'PHP', 'JavaScript', 'Python', 'Cyber Security', 'UI/UX', 'Cloud', 'AI'];

        foreach ($tags as $name) {
            Tag::create([
                'name' => strtolower($name)
            ]);
        }

        $this->command->info('🏷️ Tags created.');
    }

    /**
     * 6. Buat Post Demo
     */
    private function createPosts(): void
    {
        $userIds = User::pluck('id')->toArray();
        $categoryIds = Category::pluck('id')->toArray();
        $tagIds = Tag::pluck('id')->toArray();

        $postsData = [
            [
                'title' => 'Selamat Datang di Website Resmi HMTI',
                'thumbnail' => 'https://picsum.photos/seed/hmti-welcome/800/400.jpg',
                'content' => $this->getContentWelcome(),
                'featured' => true,
            ],
            [
                'title' => 'Workshop Laravel 11: Membangun Aplikasi Modern',
                'thumbnail' => 'https://picsum.photos/seed/laravel-workshop/800/400.jpg',
                'content' => $this->getContentLaravel(),
                'featured' => false,
            ],
            [
                'title' => 'Tips Sukses Mengikuti Hackathon Nasional',
                'thumbnail' => 'https://picsum.photos/seed/hackathon-tips/800/400.jpg',
                'content' => $this->getContentHackathon(),
                'featured' => true,
            ],
            [
                'title' => 'Rapat Koordinasi Program Kerja 2025',
                'thumbnail' => 'https://picsum.photos/seed/meeting-rapat/800/400.jpg',
                'content' => $this->getContentMeeting(),
                'featured' => false,
            ],
            [
                'title' => 'Peluang Karir di Bidang Cyber Security',
                'thumbnail' => 'https://picsum.photos/seed/cyber-security/800/400.jpg',
                'content' => $this->getContentCyber(),
                'featured' => false,
            ],
        ];

        foreach ($postsData as $data) {
            $post = Post::create([
                'user_id' => $userIds[array_rand($userIds)],
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'title' => $data['title'],
                'slug' => Str::slug($data['title']),
                'content' => $data['content'],
                'thumbnail' => $data['thumbnail'], // Menggunakan URL gambar
                'status' => 1, 
                'is_featured' => $data['featured'],
            ]);

            // Attach random tags
            $randomTags = (array) array_rand($tagIds, rand(2, min(4, count($tagIds))));
            foreach ($randomTags as $tagIndex) {
                $post->tags()->attach($tagIds[$tagIndex]);
            }
        }

        $this->command->info('📝 Posts created with images.');
    }

    // ==========================================
    // CONTENT GENERATORS (KONTEN ARTIKEL)
    // ==========================================

    private function getContentWelcome(): string
    {
        return "
            <h2>Selamat Datang di Himpunan Mahasiswa Teknologi Informasi</h2>
            <p>HMTI Kaliabang adalah organisasi kemahasiswaan yang berfungsi sebagai wadah aspirasi, kreativitas, dan pengembangan软技能 (soft skills) bagi mahasiswa. Kami berkomitmen untuk mencetak lulusan yang tidak hanya unggul dalam akademik, tetapi juga siap menghadapi tantangan industri teknologi.</p>
            
            <h3>Visi Kami</h3>
            <p>Menjadi organisasi yang inovatif, proaktif, dan berintegritas dalam mendukung tri dharma perguruan tinggi. Kami percaya bahwa kolaborasi adalah kunci utama dalam membangun ekosistem teknologi yang sehat di kampus.</p>
            
            <h3>Apa yang Kami Tawarkan?</h3>
            <ul>
                <li>Workshop dan Pelatihan Teknologi Terkini (Laravel, Python, UI/UX).</li>
                <li>Seminar Karir dan Sharing Session dengan Praktisi Industri.</li>
                <li>Turnamen Gaming dan Kompetisi Programming (Hackathon).</li>
            </ul>
            <p>Jelajahi website ini untuk mengetahui lebih lanjut tentang program kerja dan aktivitas kami.</p>
        ";
    }

    private function getContentLaravel(): string
    {
        return "
            <h2>Mengapa Laravel 11 Penting untuk Developer Muda?</h2>
            <p>Laravel terus berinovasi. Dengan rilisnya Laravel 11, proses development menjadi lebih cepat dan efisien. Fitur-fitur baru seperti struktur aplikasi yang lebih ramping dan dukungan PHP 8.2 membuat framework ini tetap menjadi pilihan utama.</p>
            
            <h3>Fitur Unggulan</h3>
            <p>Beberapa fitur yang patut dicoba adalah perbaikan pada sistem <em>bootstrap</em>, penggunaan <strong>PHP Attributes</strong> yang lebih luas, dan performa query builder yang lebih cepat.</p>
            
            <blockquote>Laravel 11 membawa pengalaman pengembangan yang lebih elegan dan modern.</blockquote>
            
            <p>Dalam workshop kami, Anda akan belajar langsung cara membangun aplikasi CRUD modern dengan fitur-fitur terbaru ini. Pastikan Anda tidak ketinggalan!</p>
        ";
    }

    private function getContentHackathon(): string
    {
        return "
            <h2>Persiapan Mental dan Teknis Hackathon</h2>
            <p>Hackathon bukan hanya tentang coding cepat, tapi juga tentang teamwork dan ide yang solutif. Banyak tim gagal bukan karena kodenya error, tapi karena tidak memahami problem yang ingin diselesaikan.</p>
            
            <h3>Tips Jitu dari Mentor Kami</h3>
            <ul>
                <li><strong>Pahami Tema:</strong> Baca brief lomba sampai tuntas sebelum coding.</li>
                <li><strong>Divisi Tim:</strong> Pastikan ada yang jago Frontend, Backend, dan Pitching.</li>
                <li><strong>Istirahat:</strong> Jangan lupa tidur sebentar, kesehatan adalah modal utama.</li>
            </ul>
            
            <p>HMTI rutin mengadakan internal hackathon untuk melatih skill anggota. Siapa tahu tim Anda bisa menjadi wakil kampus di ajang nasional!</p>
        ";
    }

    private function getContentMeeting(): string
    {
        return "
            <h2>Transparansi Program Kerja HMTI</h2>
            <p>Pada rapat koordinasi awal tahun, pengurus HMTI telah menyusun roadmap kegiatan yang padat. Fokus utama tahun ini adalah peningkatan kualitas <em>hard skills</em> anggota melalui kelas rutin dan sertifikasi.</p>
            
            <h3>Agenda Utama</h3>
            <p>Beberapa poin penting yang dibahas meliputi rencana pelaksanaan <strong>IT Festival</strong>, kerjasama dengan industri, dan perekrutan panitia acara besar semester depan.</p>
            
            <p>Kami mengundang seluruh anggota untuk aktif memberikan masukan dalam setiap rapat koordinasi. Suara Anda penting bagi kemajuan himpunan!</p>
        ";
    }

    private function getContentCyber(): string
    {
        return "
            <h2>Mengapa Cyber Security Butuh Banyak Talenta?</h2>
            <p>Dengan meningkatnya serangan siber di Indonesia, kebutuhan akan pakar keamanan data melonjak drastis. Bidang ini menawarkan gaji tinggi dan tantangan yang tidak pernah membosankan.</p>
            
            <h3>Bagaimana Mulai Belajar?</h3>
            <p>Anda bisa memulai dari dasar-dasar jaringan komputer, sistem operasi Linux, dan ethical hacking. Banyak sumber belajar gratis seperti TryHackMe atau HackTheBox.</p>
            
            <p>Divisi Litbang HMTI menyediakan materi dasar dan grup diskusi bagi Anda yang tertarik mendalami dunia <em>Cyber Security</em>. Mari bergabung!</p>
        ";
    }
}