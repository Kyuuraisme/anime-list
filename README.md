# Anime Database Website

Website ini adalah sistem manajemen data Anime yang dibangun menggunakan **PHP**, **PostgreSQL**, dan **Tailwind CSS**.  
Fitur utama meliputi autentikasi pengguna (Login & Register), serta CRUD (Create, Read, Update, Delete) untuk data anime, author, dan daftar anime.

---

##  Struktur Folder
- `helpers/` : konfigurasi database (`config.php`)
- `models/` : class model untuk operasi CRUD (`m_judul.php`, `m_author.php`, `m_list.php`, `m_akun.php`)
- `controllers/` : file proses (tambah, edit, hapus)
- `pages/` : tampilan halaman (list, tabel, login/register)
- `inc/` : komponen reusable (sidebar)
- `css/` : styling tambahan

---

##  Fitur Utama
- **Login & Register**
  - Register menggunakan `password_hash()` untuk menyimpan password secara aman.
  - Login menggunakan `password_verify()` untuk validasi password.
- **CRUD Anime**
  - `m_judul` : mengelola judul anime.
  - `m_author` : mengelola data penulis anime.
  - `m_list` : mengelola daftar anime (relasi judul + author + cover).
  - Soft delete dengan kolom `deleted_at`.
- **Navigasi**
  - Sidebar dinamis untuk berpindah antar halaman.
- **Tampilan Antarmuka**
  - Landing Page : menampilkan Top 3 Anime.
  - List Page : daftar anime ringkas.
  - Tabel Page : data detail dengan tombol CRUD.
  - Responsif dengan Tailwind CSS + Flowbite.

---

##  Instalasi & Konfigurasi
1. Clone repository:
   ```bash
   git clone https://github.com/username/anime-database.git
2. Import database PostgreSQL sesuai struktur tabel (m_judul, m_author, m_list, m_akun).
3. Atur koneksi database di helpers/config.php:
   $conn = pg_connect("host=localhost dbname=anime_db user=postgres password=yourpassword");
4. Jalankan project di local server (XAMPP/Laragon) atau hosting PHP.

---

##  Pengujian dilakukan dengan metode Black Box Testing:
- Login & Register : validasi input benar/salah.
- CRUD : tambah, tampilkan, edit, hapus data anime.
- Sidebar & Routing : navigasi antar halaman.
- Tampilan Antarmuka : menampilkan data sesuai query, responsif di desktop & mobile.

---

##  Saran Pengembangan
1.  Tambahkan fitur rating & komentar anime.
2.  Integrasi API anime untuk data otomatis.
3.  Session management & CSRF token untuk keamanan.
4.  Deployment ke platform online (Vercel, Netlify, atau server PHP).

Dikembangkan oleh Ega Risqi
Sebagai bagian dari implementasi sistem Anime Database.
