# HMTI Kaliabang

Repositori ini merupakan project web untuk HMTI (Himpunan Mahasiswa Teknologi Informasi) Kaliabang.

## 🛠️ Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal Anda.

### 1. Clone Repositori

```bash
git clone https://github.com/zidan-herlangga/hmtikaliabang.git
cd hmtikaliabang
```

### 2. Install Dependencies
Pastikan sudah meginstall composer

```bash
composer install
```

### 3. Salin File Environment
Salin file .env.example ke .env:

```bash
cp .env.example .env
```

### 4. Generate Application Key (Jika Menggunakan Laravel)

```bash
php artisan key:generate
```

### 5. Konfigurasi Database
Edit file .env dan sesuaikan konfigurasi database Anda:

```bash
DB_DATABASE=nama_database
DB_USERNAME=username_database
DB_PASSWORD=password_database
DB_HOST=host_database
```

### 6. Migrasi dan Seeding Database 

```bash
php artisan migrate
atau
php artisan migrate --seed
```
### 7. Jalankan Server Lokal

```bash
php artisan serve
```

Buka browser dan akses: http://localhost:8000
