# Laravel Octane And FrankenPHP Reference

This repository contains the reference implementation for the Laravel Octane and FrankenPHP course.

The project starts from the finished Laravel catalog application from the previous architecture course and adds a runtime-focused learning path:

- baseline runtime checks before Octane;
- repeatable Make targets for diagnostics;
- Laravel Octane with FrankenPHP;
- Docker Compose runtime workflow;
- watch mode and frontend rebuild/reload flow;
- long-running worker state demos;
- static field, singleton, resource cleanup and memory diagnostics;
- race condition and locking demonstrations;
- benchmark notes, deploy smoke checks and production checklist.

## Quick Start

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run build
php artisan test
```

Useful runtime commands:

```bash
make help
make check
make benchmark-baseline
make octane-up
make octane-logs
make octane-reload
make octane-down
```

The Octane commands use `docker-compose.octane.yml` and FrankenPHP as the Octane server driver.
The regular Laravel application still lives in the repository root.
