# Laravel Business DDD Reference

This repository is the reference repository for the Laravel Business DDD course.

It starts from the final reference solution of the previous PHP to Enterprise CRUD course and escalates that working Laravel/Filament CRUD project into a business-first DDD-lite learning path.

Imported source:

```text
course: php-to-enterprise-crud
branch: homework-15-07-final-project
commit: 05083d1a3cc9f93e3884834b6ce760df0e1f08d4
```

The import is taken from Git history, not from the previous repository working tree.

The Laravel 13 application lives in the repository root. It includes database sessions, database cache, database queues, Product NSI migrations, API endpoints, Filament 5 admin panel, policies, seed data, upload diagnostics, and feature tests.

## Quick Start

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan route:list
php artisan test
```

Admin panel:

- URL: `/admin`
- Admin user: `admin@example.com` / `password`
- Regular user: `operator@example.com` / `password`

The `is_admin` flag is a beginner-friendly simplification for this course stage. Access is still checked on the server through `User::canAccessPanel()` and policies, not through hidden UI controls.

## Useful Checks

```bash
php artisan route:list | grep admin
php artisan queue:work --once
curl -i http://localhost:8000/session/current
curl -i http://localhost:8000/catalog/cache-summary
```

For production-like deployment, keep `APP_DEBUG=false`, run `php artisan config:cache`, `php artisan route:cache`, `php artisan view:cache`, `php artisan migrate --force`, `php artisan storage:link`, and supervise `php artisan queue:work`.
