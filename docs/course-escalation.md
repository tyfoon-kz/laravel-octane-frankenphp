# Course Escalation

This repository is not a greenfield Laravel project.

It is the starting reference repository for the Laravel Business DDD course. The baseline was imported from the final project of the previous course:

```text
source repository: php-to-enterprise-crud
source branch: homework-15-07-final-project
source commit: 05083d1a3cc9f93e3884834b6ce760df0e1f08d4
target repository: git@github.com:tyfoon-kz/laravel-business-ddd.git
```

The import was created from Git object history through `git archive`, so local uncommitted changes in the previous repository are not part of this baseline.

## Why the course starts here

The previous course already built a working Laravel/Filament NSI application:

- products;
- categories;
- suppliers;
- units;
- product audits;
- API endpoints;
- Filament resources;
- policies;
- events, jobs, mail and notifications;
- tests.

The DDD course uses that working CRUD system as material for refactoring and business modeling. The goal is not to create a clean project from nothing. The goal is to take an existing Laravel CRUD application, understand the business language behind it and evolve the product catalog toward a DDD-lite model.

## Course direction

The new course focuses on the catalog side of the existing system.

Suppliers and units remain part of the inherited baseline, but the main implementation path adds flexible product characteristics:

```text
attribute_groups
attributes
attribute_values
category_attributes
```

This lets the course show a real business problem: different product categories need different characteristics, and the system should not add a new `products` column or a new Product class for every product type.
