# Run this project on localhost

Laravel 8 Infix LMS. The web root is the **project folder**, not `public/`. Do not use `php artisan serve`.

## Requirements

| Software | Version | Notes |
|---|---|---|
| PHP | **8.2.x** | 8.4 will fail Composer and is a poor match for Laravel 8 |
| MySQL / MariaDB | 10.4+ | XAMPP includes this |
| Composer | 2.x | Must run under PHP 8.2 |
| Node.js | optional | Frontend assets are already in `public/` |

### PHP extensions

`pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`, `gd`, `zip`, `curl`

### Windows (XAMPP)

Use XAMPP PHP, not Laravel Herd PHP 8.4.

- PHP: `C:\xampp\php\php.exe`
- MySQL: `C:\xampp\mysql\bin\`

In `C:\xampp\php\php.ini` enable:

```ini
extension=gd
extension=zip
extension=pdo_mysql
```

Confirm the version **before** Composer:

```powershell
$env:Path = "C:\xampp\php;C:\xampp\mysql\bin;" + $env:Path
php -v
```

You must see `PHP 8.2.x`. If you see `8.4.0`, Composer is still using Herd.

---

## 1. Copy the project

Copy the full folder, including:

- `.env`
- `packages/` (required local zips for private Composer packages)
- `router.php`
- `vendor/` if it already exists (skips a long Composer install)

---

## 2. Configure `.env` for local

Set these for localhost even if `.env` currently points at beta:

```env
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
APP_SYNC=true
IS_LOCALHOST=true
FORCE_HTTPS=false

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms_mvp
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
```

Leave `APP_KEY` as-is if it already has a value. If it is empty:

```powershell
php artisan key:generate
```

If `APP_URL` stays on `https://beta.merkaiixcelprep.com/`, local links and assets will hit the live beta site.

---

## 3. Start MySQL and create the database

```powershell
# Start MySQL (leave this running)
Start-Process -FilePath "C:\xampp\mysql\bin\mysqld.exe" -ArgumentList "--defaults-file=C:\xampp\mysql\bin\my.ini","--standalone" -WindowStyle Hidden

# Create database
C:\xampp\mysql\bin\mysql.exe -u root -e "CREATE DATABASE IF NOT EXISTS lms_mvp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

If MySQL has a password, add `-p` and put the same password in `DB_PASSWORD`.

---

## 4. Install PHP packages

**Do not run `composer update`.** It will break this Laravel 8 lock file and try to download private GitLab packages.

```powershell
cd <project-root>
$env:Path = "C:\xampp\php;C:\xampp\mysql\bin;" + $env:Path
$env:COMPOSER_PROCESS_TIMEOUT = "0"
php -v
composer install --no-interaction --prefer-dist
```

First install can take 15–20 minutes.

If `php -v` is still 8.4:

```powershell
C:\xampp\php\php.exe C:\Users\muham\.config\herd-lite\bin\composer.phar install --no-interaction --prefer-dist
```

`packages/` must exist. `composer.lock` installs these from local zips:

- `packages/spondonit-service.zip`
- `packages/spondonit-lms-service.zip`
- `packages/zoom.zip`

### If Composer says PHP 8.4 is incompatible

That is expected when Herd PHP 8.4 is on PATH. Locked packages only allow PHP 8.0–8.3. Switch to XAMPP PHP 8.2 and run `composer install` again. Do not run `composer update` to bypass this.

---

## 5. Laravel setup

```powershell
$env:Path = "C:\xampp\php;C:\xampp\mysql\bin;" + $env:Path

php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan passport:keys --force
php artisan storage:link
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

If `storage:link` fails on Windows:

```powershell
cmd /c "mklink /J public\storage storage\app\public"
```

### Extra tables this project expects

If the homepage errors about missing `programs` or `payment_plans`, apply:

```powershell
C:\xampp\mysql\bin\mysql.exe -u root lms_mvp --force -e "source packages/missing_tables.sql"
```

Other columns that may be missing on a fresh migrate:

```sql
ALTER TABLE courses ADD COLUMN featured TINYINT NOT NULL DEFAULT 0;
ALTER TABLE courses ADD COLUMN parent_id INT NULL;
ALTER TABLE blogs ADD COLUMN featured TINYINT NOT NULL DEFAULT 0;
ALTER TABLE header_menus ADD COLUMN permissions TEXT NULL;
ALTER TABLE footer_widgets ADD COLUMN pos INT NOT NULL DEFAULT 0;
ALTER TABLE social_links ADD COLUMN `order` INT NOT NULL DEFAULT 0;
ALTER TABLE course_enrolleds ADD COLUMN program_id INT NULL;
ALTER TABLE course_enrolleds ADD COLUMN plan_id INT NULL;
ALTER TABLE course_enrolleds ADD COLUMN course_type VARCHAR(50) NULL;
```

Skip any `Duplicate column` errors.

---

## 6. Start the site

From the **project root**:

```powershell
$env:Path = "C:\xampp\php;C:\xampp\mysql\bin;" + $env:Path
php -S 127.0.0.1:8000 router.php
```

Open **http://127.0.0.1:8000**

Leave that terminal and MySQL running.

Do **not** use:

```powershell
php artisan serve
```

There is no `public/index.php`. `index.php` and `router.php` live in the project root.

---

## Demo logins (after `db:seed`)

Password for all: `12345678`

| Role | Email |
|---|---|
| Admin | `spn19@spondonit.com` |
| Teacher | `teacher@infixedu.com` |
| Student | `student@infixedu.com` |

---

## Faster copy from a working machine

1. Copy the whole project (`vendor`, `.env`, `packages/`).
2. Install XAMPP PHP 8.2 + MySQL.
3. Export / import the database:

```powershell
# source machine
C:\xampp\mysql\bin\mysqldump.exe -u root lms_mvp > lms_mvp.sql

# new machine
C:\xampp\mysql\bin\mysql.exe -u root -e "CREATE DATABASE lms_mvp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
C:\xampp\mysql\bin\mysql.exe -u root lms_mvp < lms_mvp.sql
```

4. Set `.env` `APP_URL` and `DB_*` for localhost.
5. Run `php -S 127.0.0.1:8000 router.php`

---

## Everyday restart

```powershell
# MySQL (if not already running)
Start-Process -FilePath "C:\xampp\mysql\bin\mysqld.exe" -ArgumentList "--defaults-file=C:\xampp\mysql\bin\my.ini","--standalone" -WindowStyle Hidden

cd <project-root>
$env:Path = "C:\xampp\php;C:\xampp\mysql\bin;" + $env:Path
php -S 127.0.0.1:8000 router.php
```

---

## Checklist

- [ ] `php -v` shows 8.2, not 8.4
- [ ] GD and zip enabled
- [ ] MySQL running
- [ ] Database created and named in `.env`
- [ ] `APP_URL=http://127.0.0.1:8000`
- [ ] `composer install` (never `composer update`)
- [ ] `packages/*.zip` present
- [ ] migrate / seed / passport keys / storage link
- [ ] `php -S 127.0.0.1:8000 router.php` from project root
