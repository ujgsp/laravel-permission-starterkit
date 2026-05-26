# APPEND_SYSTEM — Laravel Permission Starterkit

## Project stack
- **Project**: Laravel Permission Starterkit
- **Framework**: Laravel 13 / PHP 8.3
- **Frontend build**: Vite 5 + npm
- **Auth/ACL**: `laravel/ui`, `spatie/laravel-permission`, `konekt/html`, `proengsoft/laravel-jsvalidation`
- **UI**: AdminKit template

## Security rules
- Jangan commit file `.env` atau kredensial apa pun.
- Jika menambah variabel environment baru, **update `.env.example`**.
- Jangan hardcode secret/token/password; pakai env/config.
- Saat review, treat `auth`, `mail`, `db`, `pusher`, `aws` vars as sensitive.

## Command penting
- Install deps: `composer install` / `npm install`
- Setup env: `cp .env.example .env` ; `php artisan key:generate`
- DB: `php artisan migrate --seed`
- Dev server: `php artisan serve`
- Tests: `php artisan test`
- Route check: `php artisan route:list`
- Cache reset: `php artisan optimize:clear`
- Code style: `vendor/bin/pint`
- Upgrade check: `composer update -W`, lalu `php artisan test`
- Frontend dev/build: `npm run dev` / `npm run build`
- Tinker: `php artisan tinker`
- Jika pakai Sail: `vendor/bin/sail up -d` dan `vendor/bin/sail artisan ...`

## Efisiensi kerja di codebase ini
- Fokus scan di `app/`, `routes/`, `database/`, `resources/`, `config/`.
- Hindari baca `vendor/`, `node_modules/`, dan build artifacts.
- Untuk perubahan kecil, edit sekecil mungkin dan verifikasi dengan command termurah.
- Biasanya alur kerja: `routes -> controller -> request/model -> view -> seeder/migration`.
- Untuk fitur/bug ACL, cek `spatie/laravel-permission` usage, seeder roles/permissions, dan alias middleware di `bootstrap/app.php` terlebih dulu.
- Jika menambah field/konfigurasi baru, cek dampaknya ke migration, seeder, validation, dan view form.
- Setiap perubahan di `catatan_rilis.md` wajib diikuti update tag versi pada `config/app.php` bagian `version`.
