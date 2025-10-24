# 🧵 Kain Lap Majun - E-Commerce Platform

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <strong>Platform E-Commerce Modern untuk Penjualan Kain Lap Majun</strong><br>
  Dibangun dengan Laravel 11, TailwindCSS, dan teknologi web modern
</p>

---

## 📋 Deskripsi Project

**Kain Lap Majun** adalah platform e-commerce full-stack yang dirancang khusus untuk penjualan kain lap majun berkualitas. Project ini menggabungkan backend Laravel yang powerful dengan frontend yang responsive dan modern.

### ✨ Fitur Utama

#### 🛒 **E-Commerce Features**
- **Product Management** - CRUD lengkap untuk produk dengan upload gambar
- **Category Management** - Organisasi produk berdasarkan kategori
- **Shopping Cart** - Keranjang belanja dengan session management
- **Product Search & Filter** - Pencarian dan filter produk berdasarkan kategori
- **Product Detail Page** - Halaman detail produk dengan informasi lengkap

#### 👤 **User Management**
- **Authentication System** - Register, Login, Logout dengan Laravel Sanctum
- **User Roles** - Admin dan Customer dengan hak akses berbeda
- **Profile Management** - Kelola profil pengguna

#### 🎨 **Admin Panel**
- **Dashboard** - Overview statistik penjualan dan produk
- **Product Management** - Tambah, edit, hapus produk
- **Category Management** - Kelola kategori produk
- **User Management** - Kelola data pengguna

#### 🎯 **Frontend Features**
- **Landing Page** - Homepage modern dan menarik
- **Responsive Design** - Tampilan optimal di semua device
- **Modern UI/UX** - Interface yang user-friendly dengan TailwindCSS
- **Dynamic Content** - Konten dinamis dari database

---

## 🛠️ Tech Stack

### Backend
- **Framework:** Laravel 11
- **Database:** MySQL
- **Authentication:** Laravel Sanctum
- **Storage:** Laravel File Storage

### Frontend
- **CSS Framework:** TailwindCSS 3.x
- **Build Tool:** Vite
- **Template Engine:** Blade
- **Icons:** Heroicons

### Development Tools
- **PHP:** 8.2+
- **Composer:** 2.x
- **Node.js:** 18.x+
- **NPM:** 9.x+

---

## 🚀 Instalasi & Setup

### Prerequisites
Pastikan Anda sudah menginstall:
- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone https://github.com/Tole2404/darmin-majun.git
cd darmin-majun
```

2. **Install Dependencies**
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

3. **Environment Setup**
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

4. **Database Configuration**

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kain_lap_majun
DB_USERNAME=root
DB_PASSWORD=
```

5. **Database Migration**
```bash
# Run migrations
php artisan migrate

# (Optional) Seed data
php artisan db:seed
```

6. **Storage Link**
```bash
# Create symbolic link for storage
php artisan storage:link
```

7. **Build Assets**
```bash
# Development
npm run dev

# Production
npm run build
```

8. **Start Development Server**
```bash
php artisan serve
```

Server akan berjalan di: **http://localhost:8000**

---

## 📁 Struktur Project

```
darmin-majun/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Controllers untuk business logic
│   │   └── Middleware/       # Custom middleware
│   └── Models/               # Eloquent models
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/              # Database seeders
├── public/
│   ├── css/                  # Custom CSS
│   └── storage/              # Public storage (symlink)
├── resources/
│   └── views/
│       ├── components/       # Reusable Blade components
│       ├── admin/            # Admin panel views
│       └── *.blade.php       # Page views
├── routes/
│   ├── web.php               # Web routes
│   └── api.php               # API routes
└── storage/
    └── app/public/           # File uploads
```

---

## 🎯 Cara Penggunaan

### Akses Admin Panel
1. Buat akun admin atau gunakan seeder
2. Login ke sistem
3. Akses admin panel di `/admin/dashboard`

### Kelola Produk
1. Login sebagai admin
2. Navigasi ke **Products** > **Add Product**
3. Isi form dengan detail produk
4. Upload gambar produk
5. Klik **Save**

### Kelola Kategori
1. Login sebagai admin
2. Navigasi ke **Categories**
3. Tambah/Edit/Hapus kategori sesuai kebutuhan

---

## 📚 Dokumentasi Tambahan

- **[README_API.md](README_API.md)** - Dokumentasi API endpoints
- **[AUTHENTICATION_SETUP.md](AUTHENTICATION_SETUP.md)** - Setup authentication system
- **[LANDING_PAGE_GUIDE.md](LANDING_PAGE_GUIDE.md)** - Panduan landing page
- **[CRUD_PRODUCTS_DOCUMENTATION.md](CRUD_PRODUCTS_DOCUMENTATION.md)** - CRUD produk
- **[CRUD_CATEGORIES_DOCUMENTATION.md](CRUD_CATEGORIES_DOCUMENTATION.md)** - CRUD kategori
- **[ADMIN_PANEL_COMPLETE.md](ADMIN_PANEL_COMPLETE.md)** - Panduan admin panel

---

## 🧪 Testing

### API Testing
Import file **Kain_Lap_Majun_API.postman_collection.json** ke Postman untuk testing API endpoints.

### Manual Testing
```bash
# Run PHP unit tests
php artisan test
```

---

## 🔐 Security

- **Authentication:** Laravel Sanctum untuk API authentication
- **CSRF Protection:** Built-in Laravel CSRF protection
- **Password Hashing:** Bcrypt hashing untuk password
- **Input Validation:** Server-side validation untuk semua input
- **File Upload Security:** Validasi tipe dan ukuran file

---

## 🤝 Contributing

Kontribusi sangat diterima! Silakan:
1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

---

## 📝 License

Project ini menggunakan [MIT License](https://opensource.org/licenses/MIT).

---

## 👨‍💻 Developer

Dikembangkan dengan ❤️ menggunakan Laravel Framework

**Contact:**
- GitHub: [@Tole2404](https://github.com/Tole2404)

---

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP Framework
- [TailwindCSS](https://tailwindcss.com) - CSS Framework
- [Heroicons](https://heroicons.com) - Beautiful Icons
