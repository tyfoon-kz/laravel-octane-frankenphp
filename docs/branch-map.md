# Branch Map

Этот файл фиксирует связь между домашками курса и ветками эталонного репозитория.

Правило именования: `homework-<module>-<lesson>-<short-topic>`.

## Module 01. Web, client-server, HTTP and PHP runtime

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-01-01-url-dns-tcp-tls-path` | `notes/http-path.md` |
| 02 | `homework-01-02-real-http-message` | `public/index.php`, `notes/http-message.md` |
| 03 | `homework-01-03-http-methods-status-contract` | `docs/product-http-contract.md` |
| 04 | `homework-01-04-php-runtime-cli-server` | `scripts/hello.php`, `public/index.php`, `notes/php-runtime.md` |
| 05 | `homework-01-05-nginx-php-fpm-map` | `docs/runtime-map.md` |

## Module 02. PHP language basics and runtime

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-02-01-php-file-syntax-run-and-output` | `scripts/about-me.php`, `notes/php-syntax.md` |
| 02 | `homework-02-02-variables-names-lifetime-and-constants` | variables/constants practice script |
| 03 | `homework-02-03-primitive-types-and-type-casting` | primitive type and casting examples |
| 04 | `homework-02-04-strings-quotes-interpolation-concatenation-and-safe-output` | string formatting and safe output examples |
| 05 | `homework-02-05-runtime-settings-beginner-errors-and-environment-diagnostics` | `scripts/environment-report.php`, `scripts/error-experiment.php`, `notes/environment-report.md` |
| 06 | `homework-02-06-datetime-unicode-and-basic-validation` | `scripts/product-metadata-basics.php`, `notes/text-validation.md` |

## Module 03. PHP control flow, arrays and functions

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-03-01-conditions-comparisons-and-logical-operators` | conditions and product rules script |
| 02 | `homework-03-02-loops-foreach-for-while-break-continue` | loop practice script |
| 03 | `homework-03-03-indexed-arrays-and-list-operations` | indexed array operations |
| 04 | `homework-03-04-associative-and-nested-arrays-for-products` | nested product arrays |
| 05 | `homework-03-05-functions-parameters-return-and-callbacks` | product functions and callbacks |
| 06 | `homework-03-06-beginner-operators-scope-and-type-overview` | product operator lab without `global` |

## Module 04. Files, JSON and procedural Product CRUD

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-04-01-project-filesystem-and-safe-paths` | project folders and path notes |
| 02 | `homework-04-02-reading-and-writing-files` | file read/write scripts |
| 03 | `homework-04-03-json-encode-decode-errors-and-data-structures` | JSON load/save helpers |
| 04 | `homework-04-04-procedural-product-crud-functions` | procedural Product CRUD functions |
| 05 | `homework-04-05-http-endpoint-for-product-api` | HTTP Product API endpoint |
| 06 | `homework-04-06-validation-errors-and-curl-scenarios` | validation and curl scenario checklist |
| 07 | `homework-04-07-manual-includes-and-request-input-map` | manual includes and request input map |

## Module 05. Debugging, HTTP tools and beginner workflow

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-05-01-reading-php-errors-and-http-responses` | error diary |
| 02 | `homework-05-02-xdebug-breakpoints-and-step-debugging` | Xdebug/breakpoint notes or fallback dump trace |
| 03 | `homework-05-03-curl-as-precise-http-tool` | curl scenario collection |
| 04 | `homework-05-04-postman-collections-variables-and-scenarios` | Postman collection/export |
| 05 | `homework-05-05-bug-report-to-fix-workflow` | bug report, fix and verification note |

## Module 06. OOP foundations, Alan Kay and objects

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-06-01-oop-product-messages` | `examples/oop/product_messages.php` |
| 02 | `homework-06-02-oop-classes-and-instances` | `examples/oop/product_category.php` |
| 03 | `homework-06-03-oop-product-invariants` | `src/Domain/Product.php`, notes about encapsulation |
| 04 | `homework-06-04-oop-money-value-object` | `src/Domain/Money.php` |
| 05 | `homework-06-05-oop-inheritance-vs-composition` | comparison of inheritance and composition |
| 06 | `homework-06-06-oop-product-exporters` | product exporters through common behavior |

## Module 07. OOP design, interfaces, abstract classes and CRUD architecture

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-07-01-design-product-repository-interface` | `ProductRepository` interface and implementations |
| 02 | `homework-07-02-design-abstract-product-import` | abstract `ProductImport` with CSV/JSON importers |
| 03 | `homework-07-03-design-interface-vs-abstract` | written choices for interface/abstract/final classes |
| 04 | `homework-07-04-domain-product-description` | Product entity and value objects |
| 05 | `homework-07-05-design-crud-services-dto` | repository, service, controller and DTO structure |
| 06 | `homework-07-06-design-manual-di-crud` | exception flow and manual DI assembly |
| 07 | `homework-07-07-design-overengineering-review` | design review removing unnecessary abstractions |
| 08 | `homework-07-08-php-oop-syntax-laravel` | OOP syntax playground with static, readonly, enum, traits and notes |

## Module 08. Composer, autoload, PSR and package ecosystem

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-08-01-composer-entry-point` | minimal Composer project |
| 02 | `homework-08-02-composer-json-lock` | dependency and lock file practice |
| 03 | `homework-08-03-psr4-autoload` | PSR-4 namespace/autoload structure |
| 04 | `homework-08-04-psr-standards` | PSR notes and style cleanup |
| 05 | `homework-08-05-packagist-semver-scripts` | package evaluation and Composer scripts |

## Module 09. SQL relational model and first queries

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 00 | `homework-09-00-training-db-first-sql` | `database/schema.sql`, `database/seed.sql`, `database/queries.sql`, `notes/db-check.md` |
| 01 | `homework-09-01-relational-model` | catalog schema draft |
| 02 | `homework-09-02-select-queries` | SELECT/WHERE/ORDER/LIMIT queries |
| 03 | `homework-09-03-insert-update-delete` | INSERT/UPDATE/DELETE queries |
| 04 | `homework-09-04-joins` | JOIN queries across catalog tables |
| 05 | `homework-09-05-aggregates` | aggregate and grouping queries |
| 06 | `homework-09-06-indexes-transactions` | indexes, constraints and transaction notes |

## Module 10. PDO, bindings, SQL injection and repositories

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-10-01-pdo-connection` | `.env.example`, `database/schema.sql`, `database/seed.sql`, PDO connection factory |
| 02 | `homework-10-02-prepare-execute` | prepared SELECT query helpers |
| 03 | `homework-10-03-bindings-crud` | bindValue/bindParam CRUD queries |
| 04 | `homework-10-04-sql-injection-whitelist` | SQL injection fixes and ORDER BY whitelist |
| 05 | `homework-10-05-pdo-repository` | `PdoProductRepository` |
| 06 | `homework-10-06-repository-transactions` | transactional `receive` and `writeOff` stock movement scenarios |

## Module 11. Testing, debugging, quality and maintainability

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-11-01-phpunit-setup` | PHPUnit/Pest setup and Composer scripts |
| 02 | `homework-11-02-unit-tests` | unit tests for business logic |
| 03 | `homework-11-03-integration-tests` | PDO repository integration tests |
| 04 | `homework-11-04-fixtures-factories` | fixtures/factories before Laravel |
| 05 | `homework-11-05-debugging-report` | debugging report with logs/trace |
| 06 | `homework-11-06-quality-tooling` | coding standard and quality scripts |

## Module 12. Laravel foundation, request lifecycle, routing and MVC

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-12-01-install-laravel-13` | Laravel 13 app and `/health` endpoint |
| 02 | `homework-12-02-project-structure-env-config-artisan` | project structure and config report |
| 03 | `homework-12-03-request-lifecycle` | request lifecycle trace |
| 04 | `homework-12-04-routing-http-contract` | route contract for Product API |
| 05 | `homework-12-05-controllers-and-mvc` | controller and MVC responsibility split |
| 06 | `homework-12-06-container-providers-diagnostics` | service container/provider diagnostics |
| 07 | `homework-12-07-request-response-contract` | Request input/output and Response contract |
| 08 | `homework-12-08-facades-helpers-config-env` | facades, helpers and config/env report |
| 09 | `homework-12-09-blade-forms-csrf-old-errors` | minimal Blade form with CSRF, old input and errors |

## Module 13. Laravel database, Eloquent, validation and API

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-13-01-catalog-migrations` | catalog migrations |
| 02 | `homework-13-02-eloquent-models` | Eloquent models with casts/fillable |
| 03 | `homework-13-03-relationships-factories-seeders` | relationships, factories and seeders |
| 04 | `homework-13-04-form-request-validation` | Form Request validation |
| 05 | `homework-13-05-product-api-resources` | API resources, pagination and filters |
| 06 | `homework-13-06-performance-integrity` | N+1 fix, scopes and transactions |
| 07 | `homework-13-07-query-builder-sql-bridge` | Query Builder report as SQL/PDO bridge |
| 08 | `homework-13-08-laravel-collections` | Laravel Collections and Eloquent collections report |
| 09 | `homework-13-09-feature-tests-api-json` | HTTP feature tests with RefreshDatabase and JSON assertions |

## Module 14. Laravel infrastructure, auth, session, cache, queues and packages

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-14-01-runtime-nginx-php-fpm` | runtime model README section |
| 02 | `homework-14-02-sessions-csrf-auth` | session/CSRF/auth demo |
| 03 | `homework-14-03-authorization-policies-sanctum` | policies/gates and optional Sanctum |
| 04 | `homework-14-04-cache-rate-limiting` | safe cache and rate limit implementation |
| 05 | `homework-14-05-queues-events-notifications` | jobs/events/mail/notification scenario |
| 06 | `homework-14-06-storage-logging` | storage and logging diagnostics |
| 07 | `homework-14-07-packages-ecosystem-psr` | package evaluation and PSR note |
| 08 | `homework-14-08-error-handling-debug-production` | error handling, debug settings and exception rendering |
| 09 | `homework-14-09-deployment-checklist` | Laravel deployment checklist |

## Module 15. Filament admin, enterprise CRUD and final project

| Lesson | Branch | Expected student artifact |
| --- | --- | --- |
| 01 | `homework-15-01-filament-install` | Filament panel and admin access |
| 02 | `homework-15-02-nsi-resources` | Category/Unit/Supplier resources |
| 03 | `homework-15-03-product-resource-form` | Product resource form |
| 04 | `homework-15-04-product-table-actions` | Product table, filters and actions |
| 05 | `homework-15-05-relations-policies` | relation managers and policies |
| 06 | `homework-15-06-enterprise-crud-polish` | UX, confirmations, notifications, audit notes |
| 07 | `homework-15-07-final-project` | final NSI admin/API workflow |

## Maintenance Rules

- A branch name in `homework.md` must exist here.
- A branch name here must eventually exist in Git.
- Old branch names from previous drafts must not be reused unless the lesson still has the same expected artifact.
- The review system should compare the student's branch against the matching branch from this map.
