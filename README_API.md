# Kain Lap Majun - Laravel API

## 📋 Setup Lengkap

Project Laravel 11 untuk **Kain Lap Majun** dengan fitur:
- ✅ Laravel 11 (versi terbaru)
- ✅ MySQL Database
- ✅ API Authentication (Laravel Sanctum)
- ✅ File Storage (Public Disk)
- ✅ Email Configuration (SMTP)
- ✅ Manual Authentication System

---

## 🔧 Konfigurasi Environment

File `.env` sudah dikonfigurasi dengan:

```env
APP_NAME="Kain Lap Majun"
APP_TIMEZONE=Asia/Jakarta
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=majun
DB_USERNAME=root
DB_PASSWORD=

FILESYSTEM_DISK=public

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@kainlapmajun.com"
```

**⚠️ PENTING:** 
- Database `majun` sudah dibuat otomatis
- Ganti `MAIL_USERNAME` dan `MAIL_PASSWORD` dengan kredensial email Anda
- Untuk Gmail, gunakan App Password, bukan password biasa

---

## 📁 Struktur API yang Sudah Dibuat

### Authentication Endpoints (Manual)

| Method | Endpoint | Auth Required | Deskripsi |
|--------|----------|---------------|-----------|
| POST | `/api/register` | ❌ | Register user baru |
| POST | `/api/login` | ❌ | Login user |
| POST | `/api/logout` | ✅ | Logout user |
| GET | `/api/me` | ✅ | Get user profile |
| GET | `/api/user` | ✅ | Get authenticated user |

### File Upload Endpoints

| Method | Endpoint | Auth Required | Deskripsi |
|--------|----------|---------------|-----------|
| POST | `/api/upload` | ✅ | Upload single file |
| POST | `/api/upload-multiple` | ✅ | Upload multiple files |
| DELETE | `/api/file` | ✅ | Delete file |

---

## 🚀 Cara Menggunakan API

### 1. Register User

```bash
POST http://localhost:8000/api/register
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

**Response:**
```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "user": {
            "id": 1,
            "name": "John Doe",
            "email": "john@example.com"
        },
        "access_token": "1|xxxxxxxxxxxxx",
        "token_type": "Bearer"
    }
}
```

### 2. Login

```bash
POST http://localhost:8000/api/login
Content-Type: application/json

{
    "email": "john@example.com",
    "password": "password123"
}
```

### 3. Upload File (dengan Authentication)

```bash
POST http://localhost:8000/api/upload
Authorization: Bearer {your_token}
Content-Type: multipart/form-data

file: [select file]
```

**Response:**
```json
{
    "success": true,
    "message": "File uploaded successfully",
    "data": {
        "filename": "1234567890_image.jpg",
        "path": "uploads/1234567890_image.jpg",
        "url": "/storage/uploads/1234567890_image.jpg"
    }
}
```

### 4. Upload Multiple Files

```bash
POST http://localhost:8000/api/upload-multiple
Authorization: Bearer {your_token}
Content-Type: multipart/form-data

files[]: [select file 1]
files[]: [select file 2]
files[]: [select file 3]
```

---

## 📂 Files yang Sudah Dibuat/Dimodifikasi

### Controllers
- `app/Http/Controllers/Api/AuthController.php` - Authentication logic
- `app/Http/Controllers/Api/FileController.php` - File upload logic

### Models
- `app/Models/User.php` - Sudah ditambahkan `HasApiTokens` trait

### Routes
- `routes/api.php` - API routes sudah dikonfigurasi

### Migrations
- ✅ users table
- ✅ cache table
- ✅ jobs table
- ✅ personal_access_tokens table (untuk Sanctum)

---

## 🎯 Langkah Selanjutnya

### 1. Jalankan Laravel Server

```bash
php artisan serve
```

Server akan berjalan di: `http://localhost:8000`

### 2. Test API dengan Postman/Insomnia

Import collection atau test endpoints secara manual

### 3. Konfigurasi Email (Opsional)

Jika ingin menggunakan fitur email:

1. Buka file `.env`
2. Update konfigurasi email:
   ```env
   MAIL_USERNAME=your-email@gmail.com
   MAIL_PASSWORD=your-app-password
   ```

**Cara membuat App Password Gmail:**
1. Buka Google Account → Security
2. Enable 2-Step Verification
3. Search "App Passwords"
4. Create new app password untuk Mail
5. Copy password dan paste ke `.env`

### 4. Membuat Email Mailable (Sudah Tersedia)

File `app/Mail/WelcomeMail.php` sudah dibuat, Anda bisa customize sesuai kebutuhan.

Contoh penggunaan:
```php
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

Mail::to($user->email)->send(new WelcomeMail($user));
```

---

## 📝 File Storage

Files akan disimpan di:
- **Path Disk**: `storage/app/public/uploads/`
- **Public URL**: `http://localhost:8000/storage/uploads/filename`

Symbolic link sudah dibuat dengan command: `php artisan storage:link`

---

## 🔐 Security

- Password otomatis di-hash dengan bcrypt
- API menggunakan Laravel Sanctum untuk token authentication
- File validation: max 10MB per file
- CSRF protection otomatis untuk API routes

---

## 💡 Tips Pengembangan

1. **Membuat Controller baru:**
   ```bash
   php artisan make:controller Api/NamaController
   ```

2. **Membuat Model + Migration:**
   ```bash
   php artisan make:model NamaModel -m
   ```

3. **Menjalankan migration:**
   ```bash
   php artisan migrate
   ```

4. **Rollback migration:**
   ```bash
   php artisan migrate:rollback
   ```

5. **Clear cache:**
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan route:clear
   ```

---

## 📧 Support

Untuk pertanyaan atau bantuan, silakan hubungi developer.

---

**Setup by: Cascade AI**
**Date: 2025-10-10**
**Project: Kain Lap Majun API**
