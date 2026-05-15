# Project Root Contract

Этот документ фиксирует главный контракт курса: после клонирования студент всегда работает в корне репозитория `php-to-enterprise-crud`.

```bash
git clone git@github.com:tyfoon-kz/php-to-enterprise-crud.git
cd php-to-enterprise-crud
pwd
```

Все пути в уроках, домашних заданиях, проверках и эталонных ветках считаются относительно этого корня.

## Что нельзя делать

Студент не должен создавать финальный учебный проект внутри дополнительной папки вроде `product-crud/` или `product-nsi/`.

Плохо:

```text
php-to-enterprise-crud/
  product-crud/
    public/
    src/
    storage/
```

Плохо:

```text
php-to-enterprise-crud/
  product-nsi/
    composer.json
    app/
    routes/
```

Такая вложенность ломает автопроверку, потому что проверка ожидает файлы в корне репозитория.

## Plain PHP этап

В модулях 01-11 студент постепенно наполняет корень репозитория обычным PHP-проектом:

```text
php-to-enterprise-crud/
  public/
  src/
  storage/
  scripts/
  examples/
  tests/
  docs/
  notes/
  composer.json
  composer.lock
```

Если домашка просит создать `public`, `src`, `storage` или `scripts`, эти директории создаются прямо в корне репозитория.

## Laravel этап

В модуле 12 тот же репозиторий становится Laravel 13 приложением. Итоговая структура Laravel тоже лежит прямо в корне:

```text
php-to-enterprise-crud/
  app/
  bootstrap/
  config/
  database/
  public/
  resources/
  routes/
  storage/
  tests/
  composer.json
  composer.lock
  artisan
```

Так как `composer create-project` не ставит Laravel в непустую директорию, в уроке используется временная папка:

```bash
composer create-project laravel/laravel:^13.0 tmp-laravel
cp -a tmp-laravel/. ./
rm -rf tmp-laravel
```

После копирования студент продолжает работать в корне репозитория и коммитит корневые `composer.json`, `composer.lock`, `routes/*`, `app/*` и другие файлы Laravel.

## Контракт для автопроверки

Автопроверка не должна искать учебные артефакты во вложенных проектных папках. Примеры ожидаемых путей:

- `public/index.php`;
- `src/...`;
- `storage/products.json`;
- `scripts/...`;
- `composer.json`;
- `routes/web.php`;
- `app/Models/Product.php`.

Если материалу нужен пример имени приложения, используется смысловое имя `Product NSI`, но не дополнительная директория `product-nsi/`.
