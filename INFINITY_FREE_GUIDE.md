# Panduan Hosting InfinityFree: Nawa Lens

Ikuti langkah-langkah berikut untuk meng-hosting situs Anda secara gratis di InfinityFree.

### 1. Persiapan Akun
1.  Daftar di [InfinityFree](https://infinityfree.net/) dan verifikasi email Anda.
2.  Buat **Hosting Account** baru.
3.  Pilih domain gratis (contoh: `nawalens.rf.gd`) atau gunakan domain Anda sendiri.

### 2. Membuat Database MySQL
1.  Masuk ke **Control Panel** (vPanel) akun hosting Anda.
2.  Cari menu **MySQL Databases**.
3.  Buat database baru (misal: `epiz_xxx_adrian`).
4.  Catat informasi berikut untuk digunakan nanti:
    *   **MySQL Hostname** (biasanya `sqlxxx.epizy.com`)
    *   **MySQL Username** (misal `epiz_34567890`)
    *   **MySQL Password** (lihat di menu 'Account Details')
    *   **Database Name** (misal `epiz_34567890_adrian`)

### 3. Mengimpor Data SQL
1.  Di Control Panel, buka **phpMyAdmin**.
2.  Pilih database yang baru Anda buat.
3.  Klik tab **Import**, pilih file `db/db_fs.sql` dari folder proyek di komputer Anda.
4.  Klik **Go** untuk mengeksekusi SQL.

### 4. Mengunggah File
1.  Anda bisa menggunakan **Online File Manager** di Control Panel atau aplikasi FTP seperti **FileZilla**.
2.  Masuk ke direktori **`htdocs/`** (Ini adalah folder publik).
3.  Unggah semua file dan folder dari proyek `pi_FARID` ke dalam folder `htdocs/`.
    *   *Catatan: Jangan unggah folder `pi_FARID`-nya, tapi isi di dalamnya.*

### 5. Mengonfigurasi Koneksi Database (PENTING)
1.  Setelah file terunggah, cari file **`config/koneksi.php`** di File Manager.
2.  Edit file tersebut dan masukkan data database InfinityFree Anda:
```php
$user   = "epiz_xxx_xxx"; // Username MySQL Anda
$pass   = "password_anda"; // Password MySQL Anda
$db     = "epiz_xxx_adrian"; // Nama Database Anda
$server = "sqlxxx.epizy.com"; // Hostname MySQL Anda
```
3.  Simpan perubahan.

### 6. Selesai!
Buka alamat domain Anda (misal: `http://nawalens.rf.gd`) untuk melihat situs Anda online.

---
> [!NOTE]
> Karena InfinityFree adalah hosting gratis, mungkin ada sedikit delay saat pertama kali mengakses situs atau database.
