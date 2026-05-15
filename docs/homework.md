# Homework Verification Notes

## Scope

This branch contains a root-level Laravel 13 Product NSI application used as the reference implementation for the assigned Module 14-15 homework branch.

Implemented artifacts:

- database sessions, CSRF web form, and authenticated Filament session flow;
- `User::canAccessPanel()` with server-side admin check;
- Product, Category, Unit, Supplier, and ProductAudit Eloquent models;
- migrations, factories, seed data, Form Requests, policies, API resource, and feature tests;
- database cache summary endpoint and named API rate limiter;
- queued `RecalculateProductSearchIndex` job and queued product notification/mail examples;
- public disk upload endpoint with validation and logging;
- Filament 5 admin panel and resources for NSI CRUD;
- deployment checklist and package/PSR notes.

## Commands

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
php artisan route:list
php artisan route:list | grep admin
php artisan test
```

Optional queue smoke:

```bash
php artisan queue:work --once
```

## Demo Users

- Admin: `admin@example.com` / `password`
- Operator: `operator@example.com` / `password`

The `is_admin` column is intentionally documented as a beginner simplification. It is acceptable for this course step because authorization is enforced server-side by Filament access checks and Laravel policies.

## Module 14 Evidence

- Runtime: Laravel is served from `public/index.php`; nginx should point to `public`, PHP code runs through php-fpm, and CLI tasks use `php artisan`.
- Sessions/CSRF/auth: `/session/name` uses `@csrf`; sessions use the database driver from `.env.example`.
- Authorization: Product and NSI resources are protected by policies; unsafe actions are not left as UI-only checks.
- Cache/rate limiting: `/catalog/cache-summary` uses `Cache::remember`; API routes use `throttle:products-api`.
- Queues/events/mail: product create/update dispatches `RecalculateProductSearchIndex`; notification/mail classes are queued examples.
- Storage/logging: `POST /api/products/{product}/asset` validates file type/size, stores on the `public` disk, and logs product id/path/user id without secrets.
- Packages/PSR: `filament/filament` is installed as a Composer package with `^5.0`; app code follows PSR-4 under `App\\`.
- Errors/debug: JSON 404 rendering is explicit; production checklist requires `APP_DEBUG=false`.
- Deployment: run caches, forced migrations, storage link, queue worker supervision, health checks, and rollback from a tagged release.

## Module 15 Evidence

- Filament panel provider: `app/Providers/Filament/AdminPanelProvider.php`.
- Admin access: `App\Models\User::canAccessPanel()` denies non-admin users.
- NSI resources: Category, Unit, and Supplier resources include searchable/sortable tables, active filters, forms, and guarded deletes.
- Product resource: form sections `Main`, `Classification`, and `Commercial`; relationship selects; SKU uniqueness with `ignoreRecord`.
- Product table: searchable SKU/name, category filter, active filter, selected columns, confirmation on delete, no dangerous bulk delete.
- Policies: Filament and API share the same server-side policies.
- Final workflow: seed data creates 50 products for admin search/filter checks and API pagination.

## Package Review

Filament is justified here because the final project requires an enterprise CRUD admin interface over Eloquent models and policies. It is installed as `filament/filament:"^5.0"` in Composer, locked in `composer.lock`, and discovered through Laravel package discovery. Composer audit was executed during install and reported no vulnerability advisories.

## Deployment Checklist

```bash
composer install --no-dev --optimize-autoloader
php artisan key:generate --force
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan queue:restart
php artisan up
```

Operational notes:

- never commit `.env` or secrets;
- set `APP_DEBUG=false` outside local development;
- point nginx to `public/`, not the repository root;
- run a supervised queue worker for database queue jobs;
- keep a rollback plan based on previous release artifact and database backup.
