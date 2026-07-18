# Sistem Inventaris Toko

Proyek ini adalah Sistem Inventaris Toko berbasis web yang dibangun menggunakan framework Laravel (versi 6.x). Sistem ini bertujuan untuk membantu mengelola data barang, stok, dan pencatatan inventaris pada sebuah toko dengan antarmuka yang mudah digunakan.

## Fitur Utama

Aplikasi ini dilengkapi dengan berbagai fitur untuk memudahkan manajemen toko:

1. **Dashboard Utama**
   Halaman beranda yang memberikan ringkasan singkat setelah pengguna berhasil login.

2. **Manajemen Barang (CRUD)**
   - **Tambah Barang**: Memasukkan data barang baru termasuk nama, stok, harga, nama supplier, deskripsi, serta mengunggah gambar/poster produk.
   - **Daftar Barang**: Menampilkan seluruh data barang yang tersedia di inventaris.
   - **Ubah Barang**: Memperbarui informasi barang maupun mengganti gambar produk.
   - **Hapus Barang**: Menghapus data barang beserta gambar yang tersimpan di server.

3. **Pencarian Barang**
   Fitur pencarian real-time untuk menemukan data barang dengan cepat berdasarkan nama barang.

4. **Laporan dan Ekspor Data**
   - **Filter Laporan**: Memfilter data barang berdasarkan rentang tanggal input, nama supplier, maupun status stok (stok habis atau stok tersedia).
   - **Ekspor ke PDF**: Mencetak data inventaris dalam bentuk dokumen PDF.
   - **Ekspor ke Excel**: Mengunduh data inventaris dalam format file `.xlsx` untuk keperluan analisis lebih lanjut.

5. **Manajemen Pengguna (User Management)**
   - **Daftar Pengguna**: Menampilkan daftar akun yang memiliki akses ke sistem.
   - **Tambah Pengguna**: Menambahkan akun baru beserta detail email, password terenkripsi, dan unggah foto profil.
   - **Hapus Pengguna**: Menghapus akses akun beserta foto profil dari sistem.

6. **Keamanan dan Akun**
   - **Autentikasi**: Sistem login dan logout menggunakan session standar Laravel.
   - **Ubah Password**: Pengguna dapat memperbarui kata sandi mereka secara mandiri demi keamanan.

7. **REST API Endpoint**
   Sistem menyediakan endpoint API berformat JSON untuk mengambil daftar barang. Fitur ini sangat berguna apabila ingin diintegrasikan dengan aplikasi mobile atau layanan pihak ketiga.

## Persyaratan Sistem

- PHP >= 7.2.5
- Composer
- MySQL Database

## Cara Instalasi

1. Buka terminal atau command prompt, lalu arahkan ke direktori proyek ini.
2. Jalankan perintah berikut untuk menginstal seluruh dependensi aplikasi melalui Composer:
   ```bash
   composer install
   ```
3. Salin file konfigurasi lingkungan dari `.env.example` menjadi `.env`:
   - Pada Linux/macOS:
     ```bash
     cp .env.example .env
     ```
   - Pada Windows:
     ```cmd
     copy .env.example .env
     ```
4. Buat sebuah database baru di server MySQL Anda (misalnya dengan nama `inventaris_toko`).
5. Buka file `.env` menggunakan teks editor dan sesuaikan konfigurasi koneksi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_anda
   DB_USERNAME=username_database_anda
   DB_PASSWORD=password_database_anda
   ```
6. Jalankan perintah berikut untuk membuat application key:
   ```bash
   php artisan key:generate
   ```
7. Impor file database yang sudah disediakan. Terdapat file `inventaristoko.sql` di dalam folder proyek ini. Anda dapat mengimpornya langsung ke database yang telah Anda buat menggunakan phpMyAdmin atau command line MySQL.
8. Jalankan development server lokal dengan perintah:
   ```bash
   php artisan serve
   ```
9. Buka browser dan akses aplikasi pada tautan `http://localhost:8000`.

## Informasi Tambahan

Proyek ini menggunakan dependensi standar Laravel serta beberapa paket pihak ketiga (seperti PDF dan Excel generator) untuk memudahkan pelaporan. Pastikan direktori `storage` dan `bootstrap/cache` memiliki hak akses tulis (write permissions) agar aplikasi dapat berjalan dengan optimal.
