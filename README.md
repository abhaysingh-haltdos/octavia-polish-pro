# Octavia Tech Solutions — Laravel 12 Enterprise Platform

An enterprise Laravel application powering the public website and WordPress-like Administrative CMS for Octavia Tech Solutions.

---

## 🏛️ Application Architecture

- **Backend Framework:** Laravel 12 + Eloquent ORM + PHP 8.2+
- **Frontend Layer:** Blade Views + Alpine.js + Tailwind CSS (via Vite)
- **Database:** MySQL / MariaDB (SQLite for local unit testing)
- **CMS Control Panel:** `/admin` portal with role-based access control (RBAC)
- **SEO Engine:** Polymorphic dynamic metadata, Schema.org JSON-LD, and `/sitemap.xml`

---

## 📁 Project Structure Overview

```text
octavia-laravel/
├── app/                  # Application core (Controllers, Models, Middleware, Services)
├── bootstrap/            # Application initialization & routing
├── config/               # Framework & service configurations
├── database/             # Schema migrations, seeders, factories
├── docs/                 # Project documentation, deployment guides & audit reports
│   ├── deployment/       # Namecheap deployment & backup/rollback protocols
│   ├── phase-reports/    # Phase 1–4 completion reports
│   └── audits/           # Security, SEO, Performance & Architecture audits
├── public/               # Web server document root (index.php, .htaccess, build assets)
├── resources/            # Blade templates, Tailwind CSS, Alpine.js scripts
│   ├── css/              # App & brand stylesheets
│   ├── js/               # Frontend scripts
│   └── views/            # Blade view templates (pages, admin, components, layouts, errors)
├── routes/               # Web, API, and CLI route definitions
├── storage/              # File storage, JSON catalogs, application logs
└── tests/                # Automated PHPUnit / Pest test suites
```

---

## 📚 Documentation Index

All phase reports, technical audits, and server deployment instructions are located in the [`docs/`](docs/) directory:

### Deployment & Operations
- [Namecheap Shared Hosting Deployment Guide](docs/deployment/DEPLOYMENT-NAMECHEAP.md)
- [Backup & Rollback Protocol](docs/deployment/BACKUP-AND-ROLLBACK.md)

### Phase Completion Reports
- [Phase 1 Completion Report (Database Foundation)](docs/phase-reports/PHASE-1-COMPLETION-REPORT.md)
- [Phase 2 Completion Report (Laravel Admin/CMS)](docs/phase-reports/PHASE-2-COMPLETION-REPORT.md)
- [Phase 3 Verification Report (Public Frontend + CMS Integration)](docs/phase-reports/PHASE-3-VERIFICATION-REPORT.md)
- [Phase 4 Completion Report (Production Hardening & Verification)](docs/phase-reports/PHASE-4-COMPLETION-REPORT.md)

### Technical Audits
- [Security Hardening Audit](docs/audits/PHASE-4-SECURITY-AUDIT.md)
- [SEO & Structured Data Audit](docs/audits/PHASE-4-SEO-AUDIT.md)
- [Performance & Database Query Audit](docs/audits/PHASE-4-PERFORMANCE-AUDIT.md)
- [Deployment Readiness Audit](docs/audits/PHASE-4-DEPLOYMENT-AUDIT.md)
- [Architecture Migration Audit](docs/audits/LARAVEL-MIGRATION-AUDIT.md)

---

## 🚀 Quick Start (Local Development)

### 1. Requirements
- PHP 8.2 or 8.3 with extensions (`pdo_mysql`, `mbstring`, `fileinfo`, `xml`, `gd`)
- Composer
- Node.js & npm

### 2. Installation
```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

### 3. Running Automated Tests
```bash
php artisan test --no-coverage
```
