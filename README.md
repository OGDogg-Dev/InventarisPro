# InventarisPro - Aplikasi Manajemen Inventaris Modern

[![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com/)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss)](https://tailwindcss.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)

<p align="center">
  <img src="https://github.com/user-attachments/assets/edabf255-8113-4be2-b800-fa741d3d396a" alt="Screenshot Dashboard Aplikasi InventarisPro" width="800"/>
</p>

**InventarisPro** adalah aplikasi web yang dibangun dari nol menggunakan Laravel 12 untuk membantu bisnis mengelola stok inventaris secara efisien. Aplikasi ini menyediakan fitur-fitur penting untuk melacak produk, kategori, supplier, serta transaksi barang masuk dan keluar. Dengan antarmuka yang responsif berkat Tailwind CSS, InventarisPro mudah digunakan di berbagai perangkat.

## ✨ Fitur Utama

- **Dashboard Analitis**: Ringkasan visual kondisi inventaris, termasuk total produk, nilai inventaris, dan notifikasi stok menipis.
- **Sistem Peran & Hak Akses**: Implementasi pemisahan tugas yang jelas antara peran **Admin** (akses penuh) dan **Staf Gudang** (hanya transaksi stok) menggunakan `Spatie/laravel-permission`.
- **Manajemen Data Master**: Fungsionalitas CRUD (Create, Read, Update, Delete) penuh untuk data Produk, Supplier, dan Kategori.
- **Manajemen Stok Real-time**: Transaksi barang masuk dan keluar yang langsung memperbarui jumlah stok dengan **Database Transactions** untuk menjamin konsistensi data.
- **Generate Barcode**: Kemampuan untuk menghasilkan barcode unik (Code 128) untuk setiap produk berdasarkan SKU.
- **Laporan Lengkap**:
    - **Laporan Stok Opname**: Menampilkan daftar seluruh produk, stok sistem, dan total nilai inventaris.
    - **Laporan Riwayat Produk**: Melacak setiap pergerakan (audit trail) untuk satu produk spesifik.
- **Proteksi Data (Soft Deletes)**: Mencegah penghapusan data produk yang sudah memiliki riwayat transaksi untuk menjaga integritas data historis.
- **Desain Modern & Responsif**: Tampilan antarmuka yang bersih dan modern dibangun dengan Tailwind CSS, lengkap dengan *landing page* yang profesional.

## 🛠️ Teknologi & Package Utama

- **Backend**: [PHP](https://www.php.net/) ^8.2
- **Framework**: [Laravel](https://laravel.com/) ^12.0
- **Frontend**: [Blade](https://laravel.com/docs/12.x/blade), [Tailwind CSS](https://tailwindcss.com/) ^3.0, Alpine.js
- **Database**: [MySQL](https://www.mysql.com/) atau [PostgreSQL](https://www.postgresql.org/)
- **Package Utama**:
    - `laravel/breeze`: Scaffolding Autentikasi & UI.
    - `spatie/laravel-permission`: Manajemen Peran & Hak Akses.
    - `picqer/php-barcode-generator`: Generator Barcode.

## ⚙️ Cara Instalasi

Berikut adalah langkah-langkah untuk menginstal dan menjalankan aplikasi ini di lingkungan lokal Anda.

1.  **Clone Repository:**
    ```bash
    git clone [https://github.com/IamImam7/project_management.git](https://github.com/IamImam7/project_management.git)
    cd project_management
    ```

2.  **Install Dependensi Composer:**
    ```bash
    composer install
    ```

3.  **Salin File Environment:**
    ```bash
    cp .env.example .env
    ```

4.  **Generate Kunci Aplikasi:**
    ```bash
    php artisan key:generate
    ```

5.  **Konfigurasi Database:**
    Buka file `.env` dan sesuaikan detail koneksi database Anda.
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=inventaris_pro
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6.  **Jalankan Migrasi & Seeder:**
    Perintah ini akan membuat semua tabel dan mengisi peran (Admin & Staf Gudang).
    ```bash
    php artisan migrate:fresh --seed
    ```

7.  **Install Dependensi NPM:**
    ```bash
    npm install
    ```

8.  **Jalankan Vite:**
    Biarkan proses ini berjalan di satu terminal.
    ```bash
    npm run dev
    ```

9.  **Jalankan Server:**
    Buka terminal baru dan jalankan:
    ```bash
    php artisan serve
    ```
    Aplikasi akan berjalan di `http://127.0.0.1:8000`.

## 🚀 Cara Penggunaan

1.  Buka browser dan kunjungi `http://127.0.0.1:8000`.
2.  Klik **Register** untuk membuat akun pertama Anda.
3.  **Jadikan akun Anda Admin**: Buka terminal, masuk ke folder proyek, dan jalankan `php artisan tinker`. Kemudian jalankan perintah berikut:
    ```php
    $user = \App\Models\User::find(1);
    $user->assignRole('Admin');
    exit;
    ```
4.  **Login** dengan akun yang baru saja Anda daftarkan. Anda sekarang memiliki akses penuh sebagai Admin.
5.  Untuk menguji peran Staf, daftarkan akun kedua dan berikan peran 'Staf Gudang' menggunakan Tinker.

## 🖼️ Screenshots

<p align="center">
  <strong>Halaman Login & Landing Page</strong><br>
  <img src="https://github.com/user-attachments/assets/6af41341-046d-4942-ae7b-0598b6cedcb5" alt="Login" width="700">
</p>
<p align="center">
  <strong>Form Transaksi Barang Masuk</strong><br>
  <img src="https://github.com/user-attachments/assets/f1951663-41f2-4764-b56a-f163404c8e2b" alt="Form" width="700">
</p>
<p align="center">
  <strong>Halaman Laporan</strong><br>
  <img src="https://github.com/user-attachments/assets/d6fe08d0-a48b-4d00-8e7a-3766f1465fc9" alt="Laporan" width="700">
</p>
<p align="center">
  <strong>Contoh Barcode yang Dihasilkan</strong><br>
  <img src="https://github.com/user-attachments/assets/af2be35d-1f1a-4938-9977-b4d8260661ab" alt="Barcode" width="300">
</p>

## 🚦 Rencana Pengembangan

Beberapa fitur yang bisa ditambahkan di masa mendatang:
* Integrasi dengan barcode scanner di form untuk mempercepat input.
* Notifikasi email otomatis untuk admin saat stok menipis.
* Fitur ekspor laporan ke format CSV atau PDF.
* Membuat REST API untuk memungkinkan integrasi dengan aplikasi lain.

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

Dibuat dengan Niat oleh Imam
