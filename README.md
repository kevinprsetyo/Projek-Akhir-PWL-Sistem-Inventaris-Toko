# Sistem Inventaris Toko

Sistem Inventaris Toko adalah aplikasi berbasis web yang dibangun menggunakan framework Laravel untuk mengelola inventaris barang.

## Persyaratan Sistem

Sebelum menjalankan aplikasi ini, pastikan sistem Anda telah memenuhi persyaratan berikut:
- PHP versi 7.2.5 atau 8.0 (atau yang kompatibel)
- Composer
- Node.js dan NPM
- Database MySQL

## Cara Menjalankan Aplikasi

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi di lingkungan lokal Anda:

1. **Persiapan Direktori dan Environment**
   Masuk ke direktori proyek melalui terminal atau command prompt. Salin file konfigurasi environment:
   ```bash
   cp .env.example .env
   ```
   (Atau Anda dapat mengubah nama file `.env.example` menjadi `.env` secara manual melalui file explorer).

2. **Konfigurasi Database**
   Buat database baru di MySQL server Anda (misalnya `inventaristoko`).
   Buka file `.env` menggunakan teks editor dan ubah bagian konfigurasi database agar sesuai dengan pengaturan lokal Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_anda
   DB_USERNAME=username_database_anda
   DB_PASSWORD=password_database_anda
   ```

3. **Install Dependensi PHP (Composer)**
   Jalankan perintah berikut pada terminal untuk menginstal library PHP yang diperlukan:
   ```bash
   composer install
   ```

4. **Install Dependensi Frontend (NPM)**
   Jalankan perintah berikut pada terminal untuk menginstal pustaka JavaScript dan melakukan kompilasi aset (CSS/JS):
   ```bash
   npm install
   npm run dev
   ```

5. **Generate Application Key**
   Buat kunci aplikasi (Application Key) unik yang digunakan Laravel untuk enkripsi keamanan:
   ```bash
   php artisan key:generate
   ```

6. **Impor Database**
   Terdapat file bernama `inventaristoko.sql` di dalam direktori proyek ini. Impor file tersebut ke dalam database MySQL yang telah Anda buat pada langkah ke-2. Anda bisa mengimpornya menggunakan phpMyAdmin, DBeaver, atau MySQL Command Line.

7. **Jalankan Aplikasi (Development Server)**
   Jalankan server lokal bawaan Laravel menggunakan perintah:
   ```bash
   php artisan serve
   ```
   Buka browser Anda dan akses alamat URL yang tertera di terminal (biasanya `http://127.0.0.1:8000`). Aplikasi Sistem Inventaris Toko sudah siap digunakan.
