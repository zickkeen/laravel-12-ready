# Fondasi Aplikasi Laravel 12

[![Build Status](https://img.shields.io/badge/Build-Passing-brightgreen.svg?style=flat-square)](https://travis-ci.org/zickkeen/laravel-12-ready)
[![License](https://img.shields.io/badge/License-MIT-yellow.svg?style=flat-square)](https://opensource.org/licenses/MIT)

Fondasi aplikasi ini dibangun menggunakan Laravel 12, dirancang untuk mempercepat pengembangan proyek-proyek PHP full-stack. Dilengkapi dengan fitur autentikasi multi-role dan manajemen pengguna siap pakai, fondasi ini memungkinkan pengembang untuk fokus pada logika bisnis inti aplikasi mereka sejak awal.

## Fitur Utama

* **Laravel 12:** Menggunakan framework Laravel versi terbaru.
* **Autentikasi (Auth) Middleware dengan Multi-Role:** Sistem autentikasi yang aman dengan pengelolaan hak akses berbasis peran.
* **Manajemen Pengguna:** Modul CRUD (Create, Read, Update, Delete) untuk pengelolaan akun pengguna.
* **Struktur Proyek Terorganisir:** Mengikuti praktik terbaik Laravel untuk struktur kode yang bersih dan mudah dipelihara.

## Persyaratan

* PHP >= 8.2
* Composer
* Database (MySQL, PostgreSQL, SQLite, dll.)
* Node.js dan npm (untuk asset compilation - opsional)

## Instalasi

1.  Clone repository ini:
    ```bash
    git clone https://github.com/zickkeen/laravel-12-ready.git
    cd laravel-12-ready
    ```

2.  Install Composer dependencies:
    ```bash
    composer install
    ```

3.  Salin file `.env.example` menjadi `.env` dan konfigurasi detail database Anda:
    ```bash
    cp .env.example .env
    ```

4.  Generate application key:
    ```bash
    php artisan key:generate
    ```

5.  Migrasi database dan jalankan seeders (jika ada data default):
    ```bash
    php artisan migrate --seed
    ```

6.  (Opsional) Install dan build assets jika diperlukan:
    ```bash
    npm install
    npm run dev
    ```

7.  Jalankan server pengembangan Laravel:
    ```bash
    php artisan serve
    ```

    Aplikasi Anda akan tersedia di `http://localhost:8000`.

## Konfigurasi

* **`.env`:** Konfigurasi database, email, dan pengaturan aplikasi lainnya.
* **`config/auth.php`:** Konfigurasi guard dan provider autentikasi.
* **`app/Http/Middleware/Authenticate.php`:** Middleware autentikasi dasar.
* **`app/Http/Middleware/RoleMiddleware.php`:** Middleware untuk otorisasi berdasarkan peran (perlu diimplementasikan sesuai kebutuhan).
* **`app/Models/User.php`:** Model User dengan relasi dan atribut yang diperlukan.
* **`database/migrations/users_table.php`:** Skema migrasi untuk tabel users.
* **`database/seeders/UserSeeder.php`:** Contoh seeder untuk membuat user administrator atau default.
* **`app/Http/Controllers/Auth/`:** Controller untuk proses autentikasi (login, register, logout).
* **`app/Http/Controllers/UserController.php`:** Controller untuk manajemen pengguna (CRUD).
* **`resources/views/auth/`:** View untuk halaman autentikasi.
* **`resources/views/users/`:** View untuk halaman manajemen pengguna.

## Penggunaan

Setelah instalasi selesai, Anda dapat mengakses fitur-fitur berikut:

* **Autentikasi:** Halaman login dan register (default Laravel UI atau Breeze mungkin perlu diinstal jika view belum sepenuhnya disesuaikan).
* **Manajemen Pengguna:** Akses halaman manajemen pengguna (biasanya memerlukan otentikasi sebagai administrator) untuk menambah, melihat, mengedit, dan menghapus pengguna.

## Ketersediaan:

Fondasi aplikasi Laravel 12 versi 0.1 ini sekarang tersedia dan dapat diakses melalui https://github.com/zickkeen/laravel-12-ready/releases

## Kontak:

Zick Keen <br>
zickkeen@aka.my.id

***