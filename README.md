# MemberBalance

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/status-active-brightgreen" alt="Status"></a>
  <a href="#"><img src="https://img.shields.io/badge/laravel-11-red" alt="Laravel 11"></a>
  <a href="#"><img src="https://img.shields.io/badge/php-8.2-blue" alt="PHP Version"></a>
  <a href="#"><img src="https://img.shields.io/badge/mysql-8.0-blue" alt="MySQL"></a>
  <a href="#"><img src="https://img.shields.io/badge/license-MIT-blue" alt="License"></a>
</p>

---

## Tentang MemberBalance

**MemberBalance** adalah aplikasi sederhana untuk **mencatat saldo member**. Aplikasi ini memungkinkan pengguna untuk menambahkan member baru, melakukan transaksi **top-up** maupun pengurangan saldo, menampilkan **riwayat transaksi**, dan melihat **detail saldo** tiap member secara lengkap.  

Aplikasi ini dibuat menggunakan **Laravel 11**, **MySQL** sebagai database, dan menggunakan **Bootstrap** untuk tampilan agar responsif dan mudah digunakan.  

---

## Screenshot (Opsional)

<p align="center">
  <img src="https://github.com/ZakiAnshari/memberbalance/blob/main/public/1.png?raw=true" alt="Screenshot MemberBalance" width="500"/>
</p>

<p align="center">
  <img src="https://github.com/ZakiAnshari/memberbalance/blob/main/public/2.png?raw=true" alt="Screenshot MemberBalance" width="500"/>
</p>

<p align="center">
  <img src="https://github.com/ZakiAnshari/memberbalance/blob/main/public/3.png?raw=true" alt="Screenshot MemberBalance" width="500"/>
</p>
---

## Teknologi

- **Backend:** Laravel 11  
- **Database:** MySQL  
- **Frontend:** Bootstrap  
- **Template Engine:** Blade (Laravel)  

---

## Cara Instalasi & Menjalankan Aplikasi
1. Clone Repository
   Clone project dari GitHub ke komputer lokal : <br>
   -> git clone https://github.com/ZakiAnshari/memberbalance.git <br>
   -> cd memberbalance <br>
   
2. Install Dependencies
   Pastikan sudah terinstall PHP 8.2 dan Composer : <br>
   -> composer install <br>
   -> composer update <br>

3. Setup Environment
   ubah atau salin file .env.example menjadi .env : <br>
   -> cp .env.example .env <br>
   Kemudian buka file .env dan atur konfigurasi database sesuai lokalmu : <br>
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=memberbalance
   DB_USERNAME=root
   DB_PASSWORD=

4. Generate Application Key
   Jalankan perintah berikut agar Laravel membuat APP_KEY : <br>
   ->php artisan key:generate

5. Jalankan Migration & Seed (Opsional)
   -> php artisan migrate:fresh --seed

6. Jalankan Project Laravel
Untuk menjalankan project di server lokal Laravel:
->php artisan serve

