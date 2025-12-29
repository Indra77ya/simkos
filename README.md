# Simkos - Sistem Informasi Manajemen Kost

Simkos adalah aplikasi berbasis web untuk manajemen operasional rumah kost. Aplikasi ini mencakup fitur manajemen penghuni, kamar, pembayaran, dan laporan keuangan. Terdiri dari dua portal utama: **Admin** (untuk pengelola) dan **Tenant** (untuk penghuni).

## 📋 Teknologi & Persyaratan Sistem

**PENTING:** Aplikasi ini dibangun menggunakan **CodeIgniter 2.2.6** yang merupakan framework legacy. Karena penggunaan driver database `mysql` (bukan `mysqli` atau `PDO`), aplikasi ini memiliki persyaratan lingkungan yang spesifik.

*   **PHP Version:** Wajib **PHP 5.6**.
    *   *Catatan:* Aplikasi **TIDAK AKAN BERJALAN** di PHP 7.x atau 8.x karena ekstensi `mysql` telah dihapus di versi tersebut.
*   **Database:** MySQL atau MariaDB.
*   **Web Server:** Apache atau Nginx.

## 📂 Struktur Folder

*   `admin/` - Source code untuk panel Admin.
*   `tenant/` - Source code untuk portal Penghuni.
*   `index.php` - Halaman landing utama untuk memilih portal.
*   `simkos 2.sql` - File dump database (gunakan versi ini).

## 🚀 Instalasi di Local (XAMPP/Localhost)

Karena kebutuhan PHP 5.6, disarankan menggunakan **XAMPP versi lama** (misalnya XAMPP 5.6.40) atau menggunakan Docker container dengan image PHP 5.6.

### 1. Persiapan File
Clone atau download repository ini ke dalam folder `htdocs` Anda. Rename folder menjadi `simkos`.
```bash
git clone <repository_url> simkos
```

### 2. Setup Database
1.  Buka phpMyAdmin.
2.  Buat database baru dengan nama `simkos`.
3.  Import file `simkos 2.sql` yang ada di root folder ke dalam database tersebut.

### 3. Konfigurasi Koneksi Database
Edit file `admin/application/config/database.php`. Sesuaikan dengan setting database local Anda.

```php
$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root'; // User default XAMPP
$db['default']['password'] = '';     // Password default XAMPP biasanya kosong
$db['default']['database'] = 'simkos';
$db['default']['port']     = 3306;   // Port default MySQL (ubah jika Anda menggunakan port lain, misal 3307)
```
*Catatan: Konfigurasi database untuk Admin dan Tenant biasanya terpusat atau identik. Cek juga `tenant/application/config/database.php` jika ada kendala koneksi di sisi tenant.*

### 4. Konfigurasi Base URL
Aplikasi ini menggunakan deteksi otomatis untuk Base URL, namun ada beberapa link hardcoded yang **WAJIB** disesuaikan.

**A. Edit `admin/application/config/config.php`**
Cari bagian paling bawah file:
```php
// Ubah sesuai url local Anda
$config['tenant_url'] = 'http://localhost/simkos/tenant/';
```

**B. Edit `tenant/application/config/config.php`**
Cari bagian paling bawah file:
```php
// Ubah sesuai url local Anda
$config['link_admin'] = 'http://localhost/simkos/admin/';
```

**C. Edit `index.php` (di root folder)**
Edit link pada tombol navigasi:
```html
<a href="http://localhost/simkos/admin/" ... >Masuk sebagai Admin</a>
<a href="http://localhost/simkos/tenant/" ... >Masuk sebagai Tenant</a>
```

### 5. Akses Aplikasi
Buka browser dan akses: `http://localhost/simkos/`

## 🌐 Instalasi di Hosting / Server VPS

### 1. Persyaratan Server
Pastikan hosting Anda mendukung **Multi-PHP Selector** dan set versi PHP ke **5.6**. Jika menggunakan VPS, install PHP 5.6 secara manual.

### 2. Upload File
Upload seluruh isi folder ke `public_html` atau subfolder yang diinginkan melalui File Manager (cPanel) atau FTP.

### 3. Database
1.  Buat Database MySQL baru & User Database di cPanel.
2.  Import file `simkos 2.sql` via phpMyAdmin.
3.  Sesuaikan `admin/application/config/database.php` dengan credentials server:
    ```php
    $db['default']['username'] = 'user_hosting_anda';
    $db['default']['password'] = 'password_db_anda';
    $db['default']['database'] = 'nama_db_hosting_anda';
    ```

### 4. Penyesuaian Link
Sama seperti instalasi local, edit 3 file berikut dan ganti `http://localhost/simkos/` dengan domain Anda (misal `https://kostsaya.com/`):
1.  `admin/application/config/config.php` -> `$config['tenant_url']`
2.  `tenant/application/config/config.php` -> `$config['link_admin']`
3.  `index.php` -> Link pada tag `<a>`

## 🔐 Akun Default

Setelah instalasi berhasil, Anda dapat login ke halaman Admin dengan kredensial berikut:

*   **Username:** `admin`
*   **Password:** `admin`

*(Disarankan untuk segera mengubah password setelah login pertama kali).*

## ⚠️ Masalah Umum (Troubleshooting)

1.  **Blank Page / White Screen:**
    *   Pastikan PHP version adalah 5.6. PHP 7+ akan menyebabkan error karena fungsi `mysql_connect()` sudah dihapus.
    *   Cek file log di `admin/application/logs/` (pastikan folder logs writable).

2.  **Database Error:**
    *   Pastikan driver di `database.php` adalah `mysql`.
    *   Pastikan username/password database benar.

3.  **Halaman Not Found (404) selain halaman awal:**
    *   Cek konfigurasi `.htaccess` jika Anda menggunakan `mod_rewrite`. Namun secara default aplikasi ini menggunakan `index.php` di URL. Pastikan `config.php` -> `$config['index_page']` diset sesuai (biasanya kosong atau `index.php`).
