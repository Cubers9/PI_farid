# Railway Deployment Guide: Nawa Lens

Ikuti langkah-langkah ini untuk meng-hosting situs Anda di Railway secara gratis.

### 1. Persiapan Akun
1.  Buka [Railway.app](https://railway.app) dan login dengan akun **GitHub**.

### 2. Hubungkan Repository
1.  Klik **+ New Project** -> **Deploy from GitHub repo**.
2.  Pilih repository: `Cubers9/PI_farid`.
3.  Railway akan otomatis mendeteksi `Dockerfile` dan memulai build.

### 3. Setup Database
1.  Klik **+ Add Service** -> **Database** -> **Add MySQL**.
2.  Buka layanan **MySQL** yang baru dibuat, lalu buka tab **Variables**.

### 4. Hubungkan App ke Database (PENTING)
1.  Klik layanan **App** Anda (hasil dari GitHub).
2.  Buka tab **Variables**.
3.  Klik **+ Add Variable** dan tambahkan 4 variabel ini:
    - `DB_HOST`: Pakai `${{MySQL.MYSQLHOST}}`
    - `DB_USER`: Pakai `${{MySQL.MYSQLUSER}}`
    - `DB_PASS`: Pakai `${{MySQL.MYSQLPASSWORD}}`
    - `DB_NAME`: Pakai `${{MySQL.MYSQLDATABASE}}`

### 5. Impor Data SQL
1.  Di layanan **MySQL**, buka tab **Data**.
2.  Unggah file `db/db_fs.sql` atau copy-paste isinya ke query editor untuk membuat tabel.

### 6. Generate Link Publik
1.  Di settings **App**, cari **Public Networking**.
2.  Klik **Generate Domain**.
3.  Gunakan domain yang diberikan (misal: `https://pi-farid-production.up.railway.app`).

---
> [!TIP]
> Sekarang setiap kali Anda melakukan `git push`, Railway akan otomatis memperbarui situs Anda!
