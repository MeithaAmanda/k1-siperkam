
# SIPERKAM  
### Sistem Peminjaman Ruangan Kampus ITG

## Nama Website
**SIPERKAM (Sistem Peminjaman Ruangan Kampus ITG)**

---

## Teknologi yang Digunakan
Website ini dibangun menggunakan teknologi berikut:

- **Backend Framework:** Laravel 12
- **Bahasa Pemrograman:** PHP 8.2
- **Database:** MySQL
- **Frontend:** Blade Templating Engine
- **UI Framework:** Bootstrap 5
- **Authentication:** Laravel Authentication (Login & Register)
- **Version Control:** Git & GitHub
- **Web Server (Local):** Laravel Artisan Serve

---

## Deskripsi & Tujuan Website
SIPERKAM adalah aplikasi berbasis web yang dirancang untuk membantu proses **peminjaman ruangan kampus Institut Teknologi Garut (ITG)** secara terstruktur, efisien, dan terdokumentasi dengan baik.

Tujuan pembuatan website ini adalah:
- Mempermudah mahasiswa atau civitas akademika dalam mengajukan peminjaman ruangan
- Mengurangi proses manual (pencatatan di kertas)
- Menyediakan sistem CRUD (Create, Read, Update, Delete) peminjaman ruangan
- Mengimplementasikan konsep **MVC (Model–View–Controller)** pada framework Laravel
- Memenuhi tugas mata kuliah Pemrograman Web berbasis Framework

---

## Nama Kelompok
**Kelompok SIPERKAM**

---

## Anggota Kelompok
1. **Meitha Amanda**  
   NIM: 2307005
  
2. **Ai Sena Marlina**  
   2307017  
  
3. **Ai Hilma Khoiriyah**  
   NIM: 2307022 
   
---

## Fitur Utama Sistem
- Login & Logout User
- Manajemen Peminjaman Ruangan (CRUD)
- Validasi Form Input
- Integrasi Database MySQL
- Tampilan UI Responsif dan User Friendly

---

## Cara Menjalankan Project
1. Clone repository:
   ```bash
   git clone https://github.com/MeithaAmanda/k1-siperkam.git
````

2. Masuk ke folder project:

   ```bash
   cd siperkam
   ```

3. Install dependency:

   ```bash
   composer install
   ```

4. Copy file environment:

   ```bash
   cp .env.example .env
   ```

5. Generate key:

   ```bash
   php artisan key:generate
   ```

6. Atur database di file `.env`

7. Jalankan migrasi:

   ```bash
   php artisan migrate
   ```

8. Jalankan server:

   ```bash
   php artisan serve
   ```

9. Akses aplikasi:

   ```
   http://127.0.0.1:8000
   ```


---
---

## Dokumentasi Tampilan Sistem

Berikut adalah beberapa tampilan utama dari aplikasi **SIPERKAM (Sistem Peminjaman Ruangan Kampus ITG)**:

### 1. Dashboard / Halaman Utama

[![Dashboard SIPERKAM](public/images/dashboard.jpeg)](https://raw.githubusercontent.com/MeithaAmanda/k1-siperkam/c5c3736d6192405a0ffe92bbb0d4716c03355d54/public/images/dashboard.jpeg)

---

### 2. Form Peminjaman Ruangan

[![Form Peminjaman Ruangan](public/images/form-peminjaman.jpeg)
](https://raw.githubusercontent.com/MeithaAmanda/k1-siperkam/c5c3736d6192405a0ffe92bbb0d4716c03355d54/public/images/form%20peminjaman.jpeg)
---

### 3. Halaman Edit Peminjaman

[![Edit Peminjaman Ruangan](public/images/edit-peminjaman.jpeg)](https://raw.githubusercontent.com/MeithaAmanda/k1-siperkam/c5c3736d6192405a0ffe92bbb0d4716c03355d54/public/images/edit%20peminjaman.jpeg)
