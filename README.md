# 🍵 FermentaCo — Minuman Fermentasi Sehat

Website produk minuman fermentasi alami berbahan lokal, dibangun dengan **Laravel 11** dan **Tailwind CSS**.

---

## 📋 Deskripsi

FermentaCo adalah aplikasi web catalog produk untuk brand minuman fermentasi. Menampilkan produk-produk seperti Kombucha, Probiotik, Kefir, dan Fermentasi Buah lengkap dengan halaman beranda, daftar produk, detail produk, dan halaman tentang. Dilengkapi juga dengan REST API JSON publik untuk keperluan developer.

---

## ✨ Fitur

- **Beranda** — Hero section, produk unggulan, keunggulan brand, testimoni pelanggan, dan CTA banner
- **Daftar Produk** — Grid semua produk dengan filter kategori dan info stok
- **Detail Produk** — Gambar/placeholder, deskripsi, manfaat, produk terkait
- **Tentang Kami** — Profil brand dan statistik
- **REST API** — Endpoint JSON publik untuk data produk
- **Desain Responsif** — Mobile-friendly dengan navbar burger menu
- **Seeder** — Data dummy 8 produk dan 4 kategori siap pakai

---

## 🛠️ Tech Stack

| Layer | Teknologi |
|---|---|
| Backend | Laravel 11 (PHP) |
| Frontend | Blade Templates + Tailwind CSS (CDN) |
| Database | SQLite (default) / MySQL / PostgreSQL |
| Font | Playfair Display, DM Sans (Google Fonts) |
| Cache & Session | Database driver |
| Queue | Database driver |

---

## 🚀 Instalasi

### Prasyarat

- PHP >= 8.2
- Composer
- Node.js (opsional, untuk build assets)

### Langkah-langkah

```bash
# 1. Clone repository
git clone <url-repo>
cd fermentaco

# 2. Install dependensi PHP
composer install

# 3. Salin file environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Konfigurasi database di .env
# Default menggunakan SQLite, tidak perlu konfigurasi tambahan
# Untuk MySQL, ubah DB_CONNECTION=mysql dan isi DB_HOST, DB_DATABASE, dll.

# 6. Jalankan migrasi
php artisan migrate

# 7. Jalankan seeder (isi data produk)
php artisan db:seed

# 8. Buat symlink storage (jika ada gambar produk)
php artisan storage:link

# 9. Jalankan server lokal
php artisan serve
```

Buka browser dan akses: **http://localhost:8000**

---

## 📁 Struktur Proyek

```
fermentaco/
├── app/
│   ├── Http/Controllers/
│   │   └── Api/ProductController.php   # Controller API produk
│   └── Models/
│       ├── Category.php                # Model kategori
│       └── Product.php                 # Model produk
├── database/
│   ├── migrations/
│   │   ├── create_categories_table.php
│   │   └── create_products_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── ProductSeeder.php           # 8 produk & 4 kategori dummy
├── resources/views/
│   ├── layouts/app.blade.php           # Layout utama (navbar + footer)
│   ├── home/index.blade.php            # Halaman beranda
│   ├── products/
│   │   ├── index.blade.php             # Daftar semua produk
│   │   └── show.blade.php              # Detail produk
│   └── about/index.blade.php           # Halaman tentang
└── routes/
    ├── web.php                         # Rute halaman web
    └── api.php                         # Rute API JSON
```

---

## 🗄️ Skema Database

### Tabel `categories`

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint | Primary key |
| nama_kategori | string | Nama kategori |
| created_at / updated_at | timestamp | Timestamps |

### Tabel `products`

| Kolom | Tipe | Keterangan |
|---|---|---|
| id | bigint | Primary key |
| category_id | bigint (FK) | Relasi ke kategori |
| nama_produk | string | Nama produk |
| harga | integer | Harga dalam Rupiah |
| deskripsi | text | Deskripsi produk (nullable) |
| gambar | string | Path gambar (nullable) |
| stok | integer | Jumlah stok (default 0) |
| tersedia | boolean | Status ketersediaan (default true) |
| created_at / updated_at | timestamp | Timestamps |

---

## 🌐 Rute

### Web

| Method | URL | Keterangan |
|---|---|---|
| GET | `/` | Halaman beranda |
| GET | `/products` | Daftar semua produk |
| GET | `/products/{id}` | Detail produk |
| GET | `/about` | Halaman tentang |

### API

| Method | Endpoint | Keterangan |
|---|---|---|
| GET | `/api/products` | Ambil semua produk (JSON) |
| GET | `/api/products/{id}` | Ambil detail satu produk (JSON) |

**Contoh response `GET /api/products`:**

```json
[
  {
    "id": 1,
    "category_id": 1,
    "nama_produk": "Kombucha Nanas",
    "harga": 35000,
    "deskripsi": "Kombucha segar berbahan nanas lokal pilihan...",
    "gambar": null,
    "stok": 50,
    "tersedia": true,
    "category": {
      "id": 1,
      "nama_kategori": "Kombucha"
    }
  }
]
```

---

## 🌱 Data Seeder

Seeder menyediakan **4 kategori** dan **8 produk** siap pakai:

| Kategori | Produk |
|---|---|
| Kombucha | Kombucha Nanas, Kombucha Mangga, Kombucha Jahe Lemon |
| Probiotik | Probiotik Strawberry, Probiotik Blueberry |
| Kefir | Kefir Susu Segar |
| Fermentasi Buah | Fermentasi Buah Alami, Fermentasi Noni Morinda |

---

## ⚙️ Konfigurasi Environment

Variabel penting di file `.env`:

```env
APP_NAME=FermentaCo
APP_URL=http://localhost

# Database (default SQLite)
DB_CONNECTION=sqlite

# Untuk MySQL
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=fermentaco
# DB_USERNAME=root
# DB_PASSWORD=

# Storage gambar produk
FILESYSTEM_DISK=local
```

---

## 🖼️ Upload Gambar Produk

Gambar produk disimpan di `storage/app/public/`. Untuk menambahkan gambar:

1. Upload file gambar ke `storage/app/public/products/`
2. Isi kolom `gambar` di tabel produk dengan path relatif, contoh: `products/nama-gambar.jpg`
3. Pastikan sudah menjalankan `php artisan storage:link`

---

## 📄 Lisensi

Proyek ini dibuat untuk keperluan pembelajaran dan pengembangan. Bebas digunakan dan dimodifikasi.

---

> Dibangun dengan ❤️ menggunakan **Laravel** & **Tailwind CSS**

## Dokumentasi

#### Beranda 

<img width="1536" height="777" alt="image" src="https://github.com/user-attachments/assets/42602c43-fbd1-475c-92c2-b46012565aeb" />

#### Produk 

<img width="1536" height="772" alt="image" src="https://github.com/user-attachments/assets/27dbe00c-3b56-44fa-b191-925c5f2c3856" />

#### Tentang

<img width="1536" height="771" alt="image" src="https://github.com/user-attachments/assets/abb5e6cf-c8d3-44a7-bc85-34dfcdc0111c" />

#### API JSON

<img width="1473" height="108" alt="image" src="https://github.com/user-attachments/assets/7d23dc62-4094-46dc-a81b-0b6f45a8d997" />
