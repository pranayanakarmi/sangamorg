# Sangam

A Laravel application built with Inertia.js, Vue 3, Vite, and Tailwind CSS, with Laravel Breeze authentication scaffolding.

## Prerequisites

- **PHP** >= 8.2
- **Composer** >= 2.x
- **Node.js** >= 18.x and **npm** >= 9.x
- **MySQL** >= 8.0

## Setup Instructions

### 1. Install PHP dependencies

```bash
composer install
```

### 2. Install Node.js dependencies

```bash
npm install
```

### 3. Copy environment file

```bash
cp .env.example .env
```

### 4. Generate application key

```bash
php artisan key:generate
```

### 5. Configure MySQL

Open `.env` and update the database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sangam
DB_USERNAME=your_mysql_username
DB_PASSWORD=your_mysql_password
```

Create the database in MySQL:

```sql
CREATE DATABASE sangam CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 6. Run database migrations

```bash
php artisan migrate
```

### 7. Run the development server

Start both the Laravel server and Vite dev server in separate terminals:

```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server
npm run dev
```

Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Build for Production

```bash
npm run build
```

## Tech Stack

- [Laravel](https://laravel.com/) — PHP web framework
- [Inertia.js](https://inertiajs.com/) — SPA adapter (no separate API needed)
- [Vue 3](https://vuejs.org/) — JavaScript UI framework
- [Vite](https://vitejs.dev/) — Frontend build tool
- [Tailwind CSS](https://tailwindcss.com/) — Utility-first CSS framework
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) — Authentication scaffolding
