<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ==========================================
        // 1. BUAT AKUN (USERS)
        // ==========================================
        
        // Admin
        $admin = User::create([
            'name' => 'Admin Utama',
            'username' => 'admin',
            'email' => 'admin@hmti.com',
            'password' => Hash::make('password'),
            'role' => 3, // Role Admin
            'status' => 1,
            'about' => 'Administrator utama website HMTI Kaliabang.',
            'profile' => 'default.webp',
        ]);

        // Author
        $author = User::create([
            'name' => 'Penulis Artikel',
            'username' => 'author',
            'email' => 'author@hmti.com',
            'password' => Hash::make('password'),
            'role' => 2, // Role Author
            'status' => 1,
            'about' => 'Penulis aktif di bidang teknologi informasi.',
            'profile' => 'default.webp',
        ]);

        // Visitor
        $visitor = User::create([
            'name' => 'Pengguna Biasa',
            'username' => 'visitor',
            'email' => 'visitor@hmti.com',
            'password' => Hash::make('password'),
            'role' => 1, // Role Visitor
            'status' => 1,
            'profile' => 'default.webp',
        ]);

        $this->command->info('Akun berhasil dibuat (Admin, Author, Visitor).');

        // ==========================================
        // 2. BUAT KATEGORI (CATEGORIES)
        // ==========================================
        
        $categories = [
            ['title' => 'Berita Terkini', 'slug' => 'berita-terkini'],
            ['title' => 'Tutorial Coding', 'slug' => 'tutorial-coding'],
            ['title' => 'Event Kampus', 'slug' => 'event-kampus'],
            ['title' => 'Tips & Trik', 'slug' => 'tips-trik'],
        ];

        $categoryIds = [];
        foreach ($categories as $cat) {
            $categoryIds[] = Category::create($cat)->id;
        }

        $this->command->info('Kategori berhasil dibuat.');

        // ==========================================
        // 3. BUAT TAGS
        // ==========================================
        
        $tagsData = ['Laravel', 'PHP', 'JavaScript', 'Python', 'Cyber Security', 'UI/UX', 'Cloud'];
        $tagIds = [];
        foreach ($tagsData as $tagName) {
            $tagIds[] = Tag::create(['name' => strtolower($tagName)])->id;
        }

        $this->command->info('Tags berhasil dibuat.');

        // ==========================================
        // 4. BUAT POST / NEWS
        // ==========================================

        // Contoh konten dengan Heading (untuk testing tampilan)
        $sampleContent = 
            '<h1>Ini adalah Heading 1 (Judul Utama)</h1>
            <p>Ini adalah contoh paragraf pertama di bawah heading 1. Quill editor sudah disetup agar heading ini tampil besar dan putih. Pastikan Anda memilih format "Heading 1" di editor.</p>
            
            <h2>Ini Heading 2 (Sub Judul)</h2>
            <p>Paragraf kedua ini berada di bawah sub judul. Kita bisa menambahkan <strong>teks tebal</strong>, <em>miring</em>, atau <a href="#">link</a>.</p>
            
            <blockquote>Ini adalah kutipan (blockquote). Biasanya digunakan untuk menonjolkan kalimat penting.</blockquote>
            
            <h3>Heading 3 (Sub-sub Judul)</h3>
            <p>Konten penjelasan lebih detail bisa diletakkan di sini. Gunakan list untuk poin-poin:</p>
            <ul>
                <li>Poin pertama</li>
                <li>Poin kedua</li>
                <li>Poin ketiga</li>
            </ul>
            <p>Akhir dari konten demo.</p>';

        // Buat beberapa post
        $postsData = [
            [
                'title' => 'Selamat Datang di Website HMTI Kaliabang',
                'slug' => 'selamat-datang-hmti-kaliabang',
                'content' => $sampleContent,
                'status' => 1,
                'is_featured' => 1,
                'thumbnail' => 'default.webp',
            ],
            [
                'title' => 'Tips Sukses Mengikuti Hackathon',
                'slug' => 'tips-sukses-hackathon',
                'content' => str_replace('Heading 1', 'Heading 1: Tips Hackathon', $sampleContent),
                'status' => 1,
                'is_featured' => 0,
                'thumbnail' => 'default.webp',
            ],
            [
                'title' => 'Mengenal Framework Laravel 11',
                'slug' => 'mengenal-laravel-11',
                'content' => str_replace('Heading 1', 'Heading 1: Tutorial Laravel', $sampleContent),
                'status' => 1,
                'is_featured' => 1,
                'thumbnail' => 'default.webp',
            ],
            [
                'title' => 'Rapat Koordinasi Bulanan',
                'slug' => 'rapat-koordinasi-bulanan',
                'content' => $sampleContent,
                'status' => 1,
                'is_featured' => 0,
                'thumbnail' => 'default.webp',
            ],
            [
                'title' => 'Draft Post Belum Terbit',
                'slug' => 'draft-post',
                'content' => $sampleContent,
                'status' => 0, // Draft
                'is_featured' => 0,
                'thumbnail' => 'default.webp',
            ],
        ];

        foreach ($postsData as $postData) {
            // Acak kategori dan penulis
            $catId = $categoryIds[array_rand($categoryIds)];
            $userId = ($postData['slug'] === 'rapat-koordinasi-bulanan') ? $admin->id : $author->id;

            $post = Post::create([
                'user_id' => $userId,
                'category_id' => $catId,
                'title' => $postData['title'],
                'slug' => $postData['slug'],
                'content' => $postData['content'],
                'thumbnail' => $postData['thumbnail'],
                'status' => $postData['status'],
                'is_featured' => $postData['is_featured'],
            ]);

            // Attach random tags
            $randomTagIds = (array) array_rand($tagIds, rand(2, 4));
            foreach ($randomTagIds as $tagIndex) {
                $post->tags()->attach($tagIds[$tagIndex]);
            }
        }

        $this->command->info('Post/News berhasil dibuat.');
    }
}