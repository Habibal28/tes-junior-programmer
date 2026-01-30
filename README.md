# Tes Junior Programmer

Aplikasi ini dibuat sebagai bagian dari **Tes Junior Programmer**.  
Aplikasi menggunakan **Laravel** untuk mengambil data produk dari API, menyimpannya ke database, dan menampilkan serta mengelola data produk melalui dashboard.

---

## 📌 Fitur Utama

-   Fetch data produk dari API (credential dinamis & time-based)
-   Simpan data ke database:
    -   Produk
    -   Kategori
    -   Status
-   Menampilkan produk dengan status **“bisa dijual”**
-   CRUD Produk (Tambah, Edit, Hapus)
-   Konfirmasi hapus menggunakan **SweetAlert**
-   Tabel interaktif menggunakan **DataTables**

---

## 🛠️ Teknologi yang Digunakan

-   PHP >= 8.1
-   Laravel >= 10
-   MySQL / PostgreSQL
-   Tailwind CSS
-   jQuery DataTables
-   SweetAlert2

---

## 🚀 Cara Instalasi

### 1️⃣ Clone Repository

```bash
git clone https://github.com/Habibal28/tes-junior-programmer.git
cd tes-junior-programmer
```

# Tes Junior Programmer –

Aplikasi ini dibuat sebagai bagian dari **Tes Junior Programmer**.  
Aplikasi menggunakan **Laravel** untuk mengambil data produk dari API, menyimpannya ke database, dan menampilkan serta mengelola data produk melalui dashboard.

---

## 📌 Fitur Utama

-   Fetch data produk dari API (credential dinamis & time-based)
-   Simpan data ke database:
    -   Produk
    -   Kategori
    -   Status
-   Menampilkan produk dengan status **“bisa dijual”**
-   CRUD Produk (Tambah, Edit, Hapus)
-   Konfirmasi hapus menggunakan **SweetAlert**
-   Tabel interaktif menggunakan **DataTables**

---

## 🛠️ Teknologi yang Digunakan

-   PHP >= 8.1
-   Laravel >= 10
-   MySQL / PostgreSQL
-   Tailwind CSS
-   jQuery DataTables
-   SweetAlert2

---

## 🚀 Cara Instalasi

### 1️⃣ Clone Repository

```bash
git clone https://github.com/username/tes-junior-programmer.git
cd tes-junior-programmer
```

### 2️⃣ Clone Repository

```bash
composer install
```

### 3️⃣ Copy & Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Atur koneksi database di file .env:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tes
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Migrasi Database

```bash
php artisan migrate
```

### 🔄 Fetch Data dari API

Aplikasi menyediakan Laravel Artisan Command untuk mengambil data dari API.

📌 Jalankan Command

```bash
php artisan fetch:data
```
