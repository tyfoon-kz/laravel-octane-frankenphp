# Homework Verification Notes

This repository keeps reference states for the Laravel Octane and FrankenPHP course.
Each homework branch represents the expected project shape after the matching lesson homework.

The important student artifacts are not hidden branch names.
They are ordinary project changes:

- updated `Makefile` targets;
- runtime notes under `docs`;
- diagnostic scripts under `scripts`;
- safe local/testing routes for observing worker behavior;
- Octane/FrankenPHP configuration;
- tests where the lesson produces stable application behavior.

## Common Checks

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
npm install
npm run build
make help
make check
```

Octane-specific checks require the runtime to be available:

```bash
make octane-up
make octane-logs
make octane-reload
make deploy-smoke
make octane-down
```

## Safety Notes

- `.env` and real secrets must not be committed.
- Debug routes live under `/dev/runtime/*` and are limited to `local` and `testing` environments.
- Artificial leaks and static-state examples are teaching probes, not production features.
- Healthchecks do not replace logs, memory readings, deploy smoke checks and incident investigation.
