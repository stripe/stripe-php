---
title: Omit API keys from native PHP serialization and add per-object authentication
semver_level: major
---

Native PHP serialization of request options and SDK resources no longer includes their API keys. Deserialization also discards API keys embedded by earlier SDK versions. Before making instance API requests with restored objects, use the new `StripeObject::setApiKey()` method to supply a key from secure runtime configuration. This recursively sets the key on the receiving object and nested resources, including those in arrays, while preserving each resource's noncredential request options. Without an explicit resource key, existing request-time global-key fallback remains available.

See the [v23 migration guide](https://github.com/stripe/stripe-php/blob/master/.hark/migration-guides/v23.md#api-keys-no-longer-survive-native-php-serialization) for affected integrations, examples, and collection and nested-resource authentication scope.
