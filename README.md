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
   
2. Install Dependencies <br>
   Pastikan sudah terinstall PHP 8.2 dan Composer : <br>
   -> composer install <br>
   -> composer update <br>

3. Setup Environment
   ubah atau salin file .env.example menjadi .env : <br>
   -> cp .env.example .env <br>
   <br>
   Kemudian buka file .env dan atur konfigurasi database sesuai lokalmu : <br>
   DB_CONNECTION=mysql <br>
   DB_HOST=127.0.0.1 <br>
   DB_PORT=3306 <br>
   DB_DATABASE=memberbalance <br>
   DB_USERNAME=root <br>
   DB_PASSWORD= <br>

4. Generate Application Key <br>
   Jalankan perintah berikut agar Laravel membuat APP_KEY : <br>
   ->php artisan key:generate

5. Jalankan Migration & Seed (Opsional) <br>
   -> php artisan migrate:fresh --seed

6. Jalankan Project Laravel <br>
    Untuk menjalankan project di server lokal Laravel : <br>
    ->php artisan serve

7. Masukkan email dan Password : <br>
   -> email : admin@gmail.com
   -> password : 123
