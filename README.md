# 🎓 Webinar Management System

Sistem manajemen webinar dengan panel admin untuk mengelola webinar, peserta, dan kehadiran.

---

## 🌟 Fitur

### 🛠️ Admin Panel

-   **Web Promosi**: Overview list webinar yang tersedia secara publik
-   **Dashboard**: Overview data webinar dan peserta
-   **Manajemen Webinar**: Create, read, update, delete webinar
-   **Detail Webinar**: Informasi lengkap (nama, deskripsi, tanggal, jam, lokasi, harga, kuota)
-   **Manajemen Kehadiran**: Kelola kehadiran peserta webinar
-   **Link Rekaman**: Upload dan kelola link rekaman webinar

---

## 🚀 Teknologi

-   **Backend**: Laravel 11.x
-   **Frontend**: Blade Templates + Tailwind CSS + Javascript
-   **Database**: MySQL
-   **Authentication**: Laravel
-   **Icons**: Font Awesome

---

## Screenshots

### Web Promosi Webinar

![Promosi](public/assets/images/[WEBINAR 1]web-promosi-webinar.png)

### Dashboard

![Dashboard](public/assets/images/[WEBINAR 2]dashboard-user-webinar.png)

### Event History

![EventHistory](public/assets/images/[WEBINAR 3]event-history-user-webinar.png)

---

## 📋 Persyaratan

-   PHP >= 8.2
-   Composer
-   Node.js & NPM
-   MySQL

---

## 🔧 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/yourusername/webinar-management-system.git
cd webinar-management-system
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Configuration

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app_webinar
DB_USERNAME=
DB_PASSWORD=
```

### 5. Database Configuration

```bash
php artisan migrate
php artisan db:seed
```

### 6. Build Assets

```bash
npm run build
```

### 7. Start Server

```bash
php artisan serve
npm run dev
```

## 🔐 Authentication

Default Admin
Email: admin@webinar.com
Password: admin123

## 📊 Fitur Utama

### ✅ Manajemen Promosi

-   **List Webinar yang bisa diikuti**

### ✅ Manajemen Webinar

-   **Tambah webinar baru**
-   **View detail webinar**
-   **Pagination untuk list webinar**

### ✅ Manajemen Kehadiran

-   **Check-in peserta**
-   **View daftar kehadiran**
-   **Export data kehadiran**

### ✅ Link Rekaman

-   **Upload & edit link rekaman webinar**
-   **Modal interface untuk manajemen link**

### ✅ User Panel

-   **Memilih webinar untuk diikuti**
-   **Melakukan pembayaran webinar**
-   **Mendapatkan Link Rekaman Webinar Sebelumnya**
-   **Mendownload sertifikat webinar**
