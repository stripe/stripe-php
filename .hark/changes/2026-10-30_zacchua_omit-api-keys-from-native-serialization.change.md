---
title: Omit API keys from native PHP serialization
semver_level: major
---

Native PHP serialization of request options and SDK resources no longer preserves API keys. Deserialization also discards keys embedded by earlier SDK versions. Before making requests through a restored resource, call `$resource->reattachApiKey($apiKey)` with a key from secure configuration. This also reattaches API keys to nested objects while preserving their other request options. Until you reattach a key, requests through the resource raise `Stripe\Exception\AuthenticationException`, even if you set a global or per-call API key. Calling `reattachApiKey()` more than once, or on an object whose API key wasn't replaced with the serialization placeholder, raises `Stripe\Exception\InvalidArgumentException`.

See the [v23 migration guide](https://github.com/stripe/stripe-php/blob/master/.hark/migration-guides/v23.md#api-keys-no-longer-survive-native-php-serialization) for affected integrations and examples.
