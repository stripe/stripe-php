---
title: Omit API keys from native PHP serialization
semver_level: major
released_in_version: 23.0.0
---

Native PHP serialization of SDK resources no longer preserves API keys. Deserialization also discards keys embedded by earlier SDK versions. Before making requests through a restored resource, call `reattachApiKey($apiKey)`. This also reattaches API keys to nested objects.

See the [v23 migration guide](https://github.com/stripe/stripe-php/blob/sdk-release/next-major/.hark/migration-guides/v23.md#api-keys-no-longer-survive-native-php-serialization) for details.
