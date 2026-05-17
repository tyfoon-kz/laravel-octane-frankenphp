# Catalog Attributes Schema

## Attribute Groups

`attribute_groups` organize attributes for humans. A group can be "Technical specifications", "Dimensions", or "Energy". The group helps the admin panel display related attributes together, but it does not classify products.

Main fields:

- `id`
- `name`
- `code`
- `sort_order`
- timestamps

## Attributes

`attributes` define reusable product characteristics. An attribute answers what can be filled: power, capacity, body material, energy class, noise level.

Main fields:

- `id`
- `attribute_group_id`
- `name`
- `code`
- `sort_order`
- timestamps

`Attribute` is not the same as `AttributeValue`. The attribute "Power" is the definition. The value "1800 W" belongs to a concrete product.

## Attribute Values

`attribute_values` store attribute values for concrete products. The table connects an existing `products` record with an `attributes` record and stores the filled value.

Main fields:

- `id`
- `product_id`
- `attribute_id`
- `value`
- timestamps

## Examples

Refrigerator:

- category: refrigerators
- attributes: volume, energy class, chamber count
- product values: 320 liters, A++, 2 chambers

Kettle:

- category: kettles
- attributes: power, capacity, body material
- product values: 1800 W, 1.7 liters, steel

Vacuum cleaner:

- category: vacuum cleaners
- attributes: cleaning type, suction power, container type
- product values: dry cleaning, 450 W, container

All three examples use the same model: products stay in `products`, characteristic definitions stay in `attributes`, and concrete values stay in `attribute_values`. The schema does not require new columns in `products` and does not require separate product classes for every equipment type.
