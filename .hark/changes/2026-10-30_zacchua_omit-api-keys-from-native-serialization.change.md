---
title: Omit API keys from native PHP serialization
semver_level: major
---

Native PHP serialization of request options and SDK resources no longer preserves API keys. Deserialization also discards keys embedded by earlier SDK versions. Before making requests through a restored resource, call `$resource->reattachApiKey($apiKey)` with a key from secure configuration. This also reattaches nested objects while preserving their request options. Global and per-call keys cannot bypass this requirement; reattachment is rejected for normal objects and objects already reattached.

See the [v23 migration guide](https://github.com/stripe/stripe-php/blob/master/.hark/migration-guides/v23.md#api-keys-no-longer-survive-native-php-serialization) for affected integrations and examples.
