# 🎨 Landing Page Darmin Majun - Dokumentasi

## ✅ File yang Sudah Dibuat

### 📁 Struktur Clean Code

```
resources/views/
├── layouts/
│   └── app.blade.php              ✅ Master Layout (HTML structure)
│
├── components/
│   ├── navbar.blade.php           ✅ Navigation Bar (responsive)
│   ├── hero.blade.php             ✅ Hero Section dengan stats
│   ├── about.blade.php            ✅ About Section
│   ├── features.blade.php         ✅ 6 Feature cards + CTA
│   └── footer.blade.php           ✅ Footer lengkap + scroll to top
│
└── landing.blade.php              ✅ Main landing page
```

### ⚙️ Routes
File: `routes/web.php` sudah diupdate
- Route `/` sekarang mengarah ke `landing.blade.php`

---

## 🎨 Fitur Landing Page

### 1. **Navbar** (Fixed Top)
- Logo "Darmin Majun"
- Menu: Beranda, Tentang, Fitur, Kontak
- Button CTA "Hubungi Kami"
- Responsive mobile menu

### 2. **Hero Section**
- Judul besar dengan gradient text
- Subtitle profesional
- 2 CTA buttons (Pelajari & Hubungi)
- 4 Stats cards (Produk, Klien, Tahun, Support)
- Background gradient modern

### 3. **About Section**
- Deskripsi perusahaan
- Ilustrasi visual
- 3 Key points dengan icon
- Design 2 kolom (responsive)

### 4. **Features Section**
- 6 Feature cards dengan icon
- Hover effects (transform & shadow)
- CTA section di bawah
- Gradient background

### 5. **Footer**
- 4 Kolom informasi
- Social media links (FB, Twitter, IG, WA)
- Quick links & product links
- Contact information
- Copyright & policies
- Scroll to top button

---

## 🚀 Cara Melihat Landing Page

### 1. Jalankan Laravel Server
```bash
php artisan serve
```

### 2. Buka Browser
```
http://localhost:8000
```

Atau jika sudah menggunakan XAMPP:
```
http://localhost/majun/public
```

---

## 🎨 Customisasi

### Ganti Warna Tema
Edit file components, cari class:
- `from-blue-600 to-purple-600` → Ganti dengan warna lain
- Contoh: `from-red-600 to-orange-600`

### Edit Konten

#### **Navbar** (`components/navbar.blade.php`)
- Ganti logo/brand name
- Tambah/kurangi menu

#### **Hero** (`components/hero.blade.php`)
- Edit judul & subtitle
- Ganti angka statistics
- Ubah CTA button text/link

#### **About** (`components/about.blade.php`)
- Edit deskripsi perusahaan
- Ganti key points
- Ubah ilustrasi

#### **Features** (`components/features.blade.php`)
- Edit fitur cards (judul, deskripsi, icon)
- Tambah/kurangi jumlah cards

#### **Footer** (`components/footer.blade.php`)
- Ganti contact info
- Update social media links
- Edit product list

---

## 📱 Responsive Design
Landing page sudah fully responsive:
- ✅ Desktop (1920px+)
- ✅ Laptop (1024px - 1920px)
- ✅ Tablet (768px - 1024px)
- ✅ Mobile (320px - 768px)

---

## 🎯 Fitur Interaktif

### Smooth Scroll
- Semua anchor links (`#home`, `#about`, dll) punya smooth scroll

### Mobile Menu
- Hamburger menu di mobile
- Toggle show/hide

### Scroll to Top Button
- Muncul setelah scroll 300px
- Smooth scroll ke atas

### Hover Effects
- Cards naik sedikit saat hover
- Shadow bertambah
- Color transition

---

## 🔧 Maintenance

### Menambah Section Baru
1. Buat file baru di `resources/views/components/namasection.blade.php`
2. Edit `landing.blade.php`, tambahkan:
   ```blade
   @include('components.namasection')
   ```

### Mengubah Urutan Section
Edit file `landing.blade.php`, pindahkan urutan `@include()`

---

## 💡 Tips

1. **Keep it Clean**: Setiap component fokus pada 1 section saja
2. **Reusable**: Component bisa dipake di page lain
3. **Consistent**: Gunakan warna & spacing yang konsisten
4. **Mobile First**: Selalu test di mobile view

---

## 🎨 Design Style

- **Font**: Figtree (Google Fonts)
- **Colors**:
  - Primary: Blue (#3B82F6)
  - Secondary: Purple (#9333EA)
  - Gray: Various shades
- **Effects**: Gradients, shadows, transitions
- **Style**: Modern, clean, professional

---

## 📞 Next Steps

- [ ] Tambah gambar/foto produk asli
- [ ] Integrate dengan backend/API
- [ ] Tambah section testimoni
- [ ] Tambah section gallery/portfolio
- [ ] Tambah contact form dengan validation
- [ ] SEO optimization

---

**Landing Page Siap Digunakan! 🎉**

Buka `http://localhost:8000` untuk melihat hasilnya!
