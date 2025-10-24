# 🗄️ Setup Database - Darmin Majun

## 📋 Langkah-langkah Setup:

### 1️⃣ **Buat Database**
Buka phpMyAdmin atau MySQL CLI, lalu buat database:
```sql
CREATE DATABASE majun CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2️⃣ **Konfigurasi .env**
Edit file `.env` di root project:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=majun
DB_USERNAME=root
DB_PASSWORD=
```

### 3️⃣ **Jalankan Migration**
Buka terminal di folder project, jalankan:
```bash
php artisan migrate
```

### 4️⃣ **Jalankan Seeder (Data Awal)**
```bash
php artisan db:seed
```

Atau jalankan semuanya sekaligus (fresh migration + seed):
```bash
php artisan migrate:fresh --seed
```

---

## 📊 **Tabel yang Dibuat:**

### 1. **users** (User & Admin)
- id, name, email, phone, address, role, is_active, password

### 2. **categories** (Kategori Produk)
- id, name, slug, description, icon, is_active, order

### 3. **products** (Produk)
- id, category_id, name, slug, description, price_min, price_max, unit, min_order, stock, image, images, features, is_featured, is_active, order

### 4. **testimonials** (Testimoni Customer)
- id, customer_name, customer_company, customer_position, customer_photo, testimonial, rating, is_active, order

### 5. **orders** (Pesanan)
- id, order_number, customer_name, customer_phone, customer_email, customer_address, city, province, postal_code, subtotal, shipping_cost, total, status, notes

### 6. **order_items** (Item Pesanan)
- id, order_id, product_id, product_name, price, quantity, subtotal

### 7. **site_settings** (Pengaturan Website)
- id, key, value, type, group, label

---

## 👤 **Akun Admin Default:**

### Admin:
- **Email:** admin@darminmajun.com
- **Password:** admin123

### Staff:
- **Email:** staff@darminmajun.com
- **Password:** staff123

---

## ✅ **Verifikasi Database:**

Setelah migration, cek di phpMyAdmin:
- Database `majun` harus ada
- 7 tabel harus terbuat
- Tabel `users` harus ada 2 data (admin & staff)
- Tabel `categories` harus ada 4 data
- Tabel `site_settings` harus ada ~17 data

---

## 🚨 **Troubleshooting:**

### Error: "Database doesn't exist"
- Pastikan database `majun` sudah dibuat
- Cek konfigurasi `.env`

### Error: "Access denied"
- Cek DB_USERNAME dan DB_PASSWORD di `.env`
- Pastikan MySQL/XAMPP sudah running

### Error: "Class not found"
- Jalankan: `composer dump-autoload`

---

## 🎯 **Next Step:**

Setelah database setup selesai, lanjut ke:
- **Step 2:** Models & Relationships
- **Step 3:** Authentication & Login Admin
- **Step 4:** Admin Panel UI

---

**Database siap digunakan! 🚀**
