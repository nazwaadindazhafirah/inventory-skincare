<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="320">
</p>

<h1 align="center">💄 Inventory Skincare Management System</h1>

<p align="center">
<b>Sistem Manajemen Stok Skincare Berbasis Web</b><br>
Dibangun menggunakan Laravel Framework
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-10-red">
  <img src="https://img.shields.io/badge/PHP-8.2-blue">
  <img src="https://img.shields.io/badge/Status-Completed-success">
  <img src="https://img.shields.io/badge/Project-Kelompok-purple">
</p>

---

## 📖 Tentang Proyek

**Inventory Skincare Management System** adalah aplikasi berbasis web yang digunakan untuk mengelola stok produk skincare secara terstruktur dan efisien.

Aplikasi ini dirancang untuk membantu proses:
- Manajemen produk
- Pengelompokan kategori
- Pembatasan hak akses berdasarkan role
- Pembuatan laporan stok

Proyek ini dikembangkan sebagai **tugas kelompok** dengan pembagian peran yang jelas dan implementasi langsung pada kode program.

---

## 🎯 Tujuan Aplikasi

- Mempermudah pengelolaan stok skincare
- Mencegah kesalahan pencatatan manual
- Menyediakan laporan stok secara cepat
- Menerapkan sistem role user (Admin & Staf)

---

## 🧭 Alur Penggunaan Aplikasi

1. Pengguna melakukan **login**
2. Sistem memverifikasi role pengguna
3. Jika login sebagai **Admin**:
   - Mengelola produk
   - Mengelola kategori
   - Melihat laporan stok
4. Jika login sebagai **Staf**:
   - Akses terbatas sesuai peran
5. Sistem membatasi akses halaman secara otomatis menggunakan middleware

---

## 🎥 Demo Aplikasi

Klik gambar di bawah untuk melihat **demo lengkap aplikasi Inventory Skincare**:

<p align="center">
  <a href="https://youtu.be/7zE4OAy-Ye0">
    <img src="https://img.youtube.com/vi/7zE4OAy-Ye0/0.jpg" width="70%">
  </a>
</p>

🔗 **Link Video Demo:**  
https://youtu.be/7zE4OAy-Ye0

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|---------|-----------|
| Laravel | Backend Framework |
| PHP | Bahasa Pemrograman |
| MySQL | Database |
| Blade | Template Engine |
| Tailwind CSS | Styling UI |
| Git & GitHub | Version Control |

---

## 👥 Tim Pengembang & Jobdesk

| Nama | Peran |
|----|-----|
| **Nazwa Adinda Zhafirah** | Ketua Tim & Backend Developer |
| Putri Nabila | UI/UX Designer & Frontend |
| Nalla Prayadita | Database & Migration |
| Lutfi Mulia | Backend Support & Demo Aplikasi |

---

## 🧠 Implementasi Teknis

- Sistem autentikasi menggunakan Laravel Auth
- Middleware untuk pembatasan akses role
- CRUD Produk & Kategori
- Seeder untuk data awal pengguna
- Laporan stok dengan export PDF
- Komentar kode berisi penanggung jawab file

---

## 📂 Struktur Folder Utama

