---
title: Mark `resource.save` as deprecated. Prefer the static update method that doesn't require retrieval of the resource to update it.
pr_url: https://github.com/stripe/stripe-php/pull/1382
section: Deprecated
released_in_version: 10.0.0
---

```PHP
// before
$resource = Price::retrieve(self::TEST_RESOURCE_ID);
$resource->metadata['key'] = 'value';
$resource->save();

// after
$resource = Price::update('price_123', [
    'metadata' => ['key' => 'value'],
]);
```
