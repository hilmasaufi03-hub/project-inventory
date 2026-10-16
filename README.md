# 📦 Sistem Manajemen Inventaris (Inventory System)

Aplikasi web Manajemen Inventaris sederhana yang dibangun menggunakan framework **Laravel** dan **MySQL/MariaDB**. Aplikasi ini dirancang untuk mengelola data produk, kategori barang, serta pembaruan stok secara terstruktur dan efisien.

---

## 🚀 Fitur Utama

- **Manajemen Produk**: Menambahkan, melihat, dan mengelola daftar barang/produk.
- **Kategori Produk**: Pengelompokan produk berdasarkan kategori (seperti Elektronik, Pakaian, dll.).
- **Pencatatan Stok**: Menampilkan detail harga, jumlah stok, dan informasi terkait produk.
- **Validasi Form**: Memastikan data input produk dan kategori lengkap sebelum disimpan ke database.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: [Laravel Framework](https://laravel.com/)
- **Database**: MySQL / MariaDB (melalui XAMPP & phpMyAdmin)
- **Frontend**: Blade Templating Engine & CSS/Bootstrap
- **Bahasa Pemrograman**: PHP

---

## ⚙️ Panduan Instalasi & Jalankan Proyek

Jika ingin menjalankan proyek ini di lingkungan lokal baru:

1. **Clone / Ekstrak Project**:
   Pastikan folder proyek berada di direktori lokal kamu.

2. **Pengaturan Database**:
   - Buka phpMyAdmin (`http://localhost/phpmyadmin`).
   - Buat database baru dengan nama `inventory`.

3. **Jalankan Migrasi Database**:
   Jalankan perintah migrasi melalui terminal untuk membuat tabel:
   ```bash
   C:\xampp\php\php.exe artisan migrate