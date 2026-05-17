# Architecture Notes

## Starting Point

This course starts from the final Laravel/Filament CRUD project of the previous PHP course. The project already has products, categories, suppliers, units, product audits, API endpoints, policies, queue examples, uploads, Filament resources, factories, seeders, and feature tests. We do not create a new Laravel skeleton because the purpose of this course is to evolve an existing business system.

The imported CRUD is treated as a working technical base. New decisions must continue that base instead of replacing it with an unrelated architecture exercise.

## Training Copy

All commands and file paths are considered relative to the project root. The student works in a training copy or platform workspace, not in an abstract example directory. This matters because architectural changes are only useful when they preserve the behavior that already exists.

## Sequential History

The course changes should form a readable history. Each step builds on the previous state: first workflow checks, then business language, then documents about rules, then schema, then Laravel code, then DDD-lite boundaries and tests.

This history is part of the learning material. A future developer should be able to read the repository and see why the project moved from ordinary CRUD toward a richer catalog model.

## Safety Point

`make check` is the first safety point. It verifies that the current Laravel/Filament application can still be inspected and tested before deeper changes begin. When a later change breaks the project, the team should be able to distinguish an environment problem from a business-modeling problem.

## Future Focus

The first business focus is the product catalog. The company sells different kinds of equipment, and different categories need different attributes. The course will keep suppliers, warehouse, purchasing, and reporting as theoretical context for now, while the code practice stays around products, categories, attributes, attribute values, and product publication.
