<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## 📝 About Comment-System (Laravel + Livewire)

A complete comment and reply system built using Laravel and Livewire. This includes admin/user registration, post creation, and multi-level commenting with nested replies.

---

## ✨ Features (Livewire Based)

- 🧑‍💼 Admin & User Registration/Login  
- 🗂️ Separate Dashboards (Currently only Admin dashboard active)  
- 🛠️ Livewire-Powered UI  
  - Real-time comment updates using `wire:poll`  
  - Instant reply without page reload  
- 📬 Admin Can:  
  - Create posts (title, content, image)  
- 📰 Public Post Visibility  
  - All users can view posts on homepage  
- 💬 Authenticated Users Can:  
  - Comment on any post  
  - Reply to comments  
  - Reply to replies (up to 3 levels deep)  
- 📌 Reply Forms  
  - Show/hide on click  
  - Works with Livewire state  

---

## 🖼️ Screenshots

![Screenshot 1](https://github.com/user-attachments/assets/0f55e734-7005-4128-a162-ebc6029baed0)
![Screenshot 2](https://github.com/user-attachments/assets/c0e8ba76-1fda-48d6-b685-2c921e592ee8)
![Screenshot 3](https://github.com/user-attachments/assets/9b9bc3d8-dbc1-4abc-8b3c-5e2fefff96c2)
![Screenshot 4](https://github.com/user-attachments/assets/ac0e17c7-c179-4461-95de-a2136fc66ed7)
![Screenshot 5](https://github.com/user-attachments/assets/8ee6e0e5-9320-4169-98c9-3beec72f262c)
![Screenshot 6](https://github.com/user-attachments/assets/599f83ba-74a7-4e02-8d96-0a5426fb0a04)

---

## 🔐 Admin Login

```bash
Email:    admin@gmail.com  
Password: 123456
```

---

## 📥 Download Database SQL

👉 [Click here to download `comment.sql`](https://raw.githubusercontent.com/Shubham-8787269/new-project/main/comment.sql)  
You can import this into your MySQL database (via phpMyAdmin or terminal).

---

## ⚙️ Project Installation Steps

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/Shubham-8787269/comment-system.git
cd comment-system
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install
npm run dev
```

### 3️⃣ Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` file:

```env
DB_DATABASE=comment
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Import the Database

Use the comment.sql file:

**phpMyAdmin:** Import using GUI  
**Terminal:**

```bash
mysql -u root -p comment < comment.sql
```

### 5️⃣ (Optional) Run Migrations

```bash
php artisan migrate
```

### 6️⃣ Serve the Application

```bash
php artisan serve
```

Visit [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---
