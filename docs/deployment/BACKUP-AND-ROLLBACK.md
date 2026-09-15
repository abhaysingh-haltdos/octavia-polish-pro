# Production Backup & Rollback Protocol

**Project:** Octavia Tech Solutions  
**Database:** MySQL / MariaDB  

---

## 1. Backup Protocol

Before performing any update, migration, or deployment on production, execute these three backup steps:

### A. Database Backup
Run via SSH or cPanel Terminal:
```bash
mysqldump -u [username] -p [database_name] > backup_db_$(date +%Y%m%d_%H%M%S).sql
```
*Alternatively:* In **cPanel > phpMyAdmin**, select the database, click **Export**, choose Quick (SQL format), and download.

### B. Media & Uploads Backup
Preserve client uploads and generated assets in `public/uploads/`:
```bash
tar -czvf backup_uploads_$(date +%Y%m%d_%H%M%S).tar.gz /home/username/public_html/uploads/
```

### C. Environment Configuration Backup
Make a safe copy of `.env`:
```bash
cp .env .env.backup_$(date +%Y%m%d_%H%M%S)
```

---

## 2. Rollback Protocol

If an unexpected regression or database failure occurs during an update:

### A. Database Rollback
Restore from the most recent SQL dump:
```bash
mysql -u [username] -p [database_name] < backup_db_[TIMESTAMP].sql
```
Or use **phpMyAdmin > Import**.

### B. Migration Rollback (Single Step)
If only the most recent migration caused an issue:
```bash
php artisan migrate:rollback --step=1 --force
```

### C. File & Code Rollback
Restore the previous deployment folder or switch git branch:
```bash
git checkout [previous-stable-tag/commit]
npm run build
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### D. Clear Stale Caches
Whenever rolling back code, immediately flush cached state:
```bash
php artisan optimize:clear
```
