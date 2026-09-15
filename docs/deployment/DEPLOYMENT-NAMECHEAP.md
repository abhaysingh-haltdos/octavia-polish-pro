# Namecheap Stellar Shared Hosting — Deployment Guide

**Application:** Octavia Tech Solutions (Laravel 12 + MySQL)  
**Target Platform:** Namecheap Stellar / Stellar Plus (cPanel / Apache / PHP 8.2+)  
**Domain:** `https://octaviatechnologies.com`  

---

## 1. Prerequisites & Server Requirements

Verify the following in **cPanel > Select PHP Version**:
- **PHP Version:** PHP 8.2 or PHP 8.3
- **PHP Extensions:** `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `ctype`, `json`, `bcmath`, `fileinfo`, `xml`, `gd`, `zip`, `curl`
- **Options:** `memory_limit` >= 256M, `upload_max_filesize` >= 20M, `post_max_size` >= 20M

---

## 2. Directory Structure on cPanel

On Namecheap shared hosting, keep Laravel core above `public_html` for maximum security:

```text
/home/username/
├── octavia_laravel/          <-- Full Laravel application root (app, config, routes, etc.)
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── storage/
│   ├── .env                  <-- Production environment file
│   └── artisan
└── public_html/              <-- ONLY the contents of Laravel's public/ folder
    ├── index.php             <-- Update paths to point to /home/username/octavia_laravel/
    ├── .htaccess             <-- Security & routing headers
    ├── build/                <-- Compiled Vite assets
    ├── uploads/              <-- Uploaded media directory
    └── robots.txt
```

---

## 3. Step-by-Step Deployment Procedure

### Step 1: Compile Assets Locally
On your local development machine:
```bash
npm install
npm run build
```
Ensure the `public/build/` folder is generated.

### Step 2: Create MySQL Database & User in cPanel
1. Navigate to **cPanel > MySQL Database Wizard**.
2. Create database (e.g. `octavia_prod`).
3. Create user (e.g. `octavia_user`) with a strong password.
4. Grant **ALL PRIVILEGES** to the user on the database.

### Step 3: Upload Application Files
1. Archive all project files (excluding `node_modules/`, `.git/`, and `database/database.sqlite`).
2. In **cPanel File Manager**, upload and extract into `/home/username/octavia_laravel/`.
3. Move the contents of `octavia_laravel/public/` into `public_html/`.

### Step 4: Adjust `public_html/index.php`
Edit `public_html/index.php` to point to the `octavia_laravel` directory:
```php
require __DIR__.'/../octavia_laravel/vendor/autoload.php';
$app = require_once __DIR__.'/../octavia_laravel/bootstrap/app.php';
```

### Step 5: Configure `.env` on Server
1. Copy `.env.production.example` to `/home/username/octavia_laravel/.env`.
2. Populate the required values:
   ```dotenv
   APP_NAME="Octavia Tech Solutions"
   APP_ENV=production
   APP_KEY=base64:YOUR_APP_KEY_HERE
   APP_DEBUG=false
   APP_URL=https://octaviatechnologies.com

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=yourcpanel_octavia_prod
   DB_USERNAME=yourcpanel_octavia_user
   DB_PASSWORD=your_secure_db_password

   SESSION_DRIVER=database
   SESSION_SECURE_COOKIE=true

   MAIL_MAILER=smtp
   MAIL_HOST=mail.octaviatechnologies.com
   MAIL_PORT=587
   MAIL_USERNAME=sales@octaviatechnologies.com
   MAIL_PASSWORD=your_email_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=sales@octaviatechnologies.com
   MAIL_FROM_NAME="Octavia Tech Solutions"
   ```

### Step 6: Run Migrations & Seeders via SSH or cPanel Terminal
In cPanel Terminal:
```bash
cd /home/username/octavia_laravel
php artisan migrate --force
php artisan db:seed --class=JsonContentSeeder --force
```

### Step 7: Create Storage Symlink & File Permissions
```bash
php artisan storage:link
chmod -R 775 storage bootstrap/cache
chmod -R 755 public_html/uploads
```

### Step 8: Production Optimizations
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 9: SSL & HTTPS Verification
1. In **cPanel > SSL/TLS Status**, ensure **AutoSSL** has issued a Let's Encrypt / Sectigo certificate for `octaviatechnologies.com`.
2. In **cPanel > Domains**, toggle **Force HTTPS Redirect** to ON.

---

## 4. Post-Deployment Verification Checklist

- [ ] Visit `https://octaviatechnologies.com/` (200 OK)
- [ ] Visit `https://octaviatechnologies.com/sitemap.xml` (Valid XML)
- [ ] Visit `https://octaviatechnologies.com/robots.txt` (Proper directives)
- [ ] Submit contact inquiry on `/contact` (Verifies DB insert & mail delivery)
- [ ] Login to `https://octaviatechnologies.com/admin/login`
- [ ] Verify non-existent URL returns custom `404` error page without debug stack trace
