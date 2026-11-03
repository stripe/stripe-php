---
title: Omit API keys from native PHP serialization
semver_level: major
---

Native PHP serialization of request options and SDK resources no longer includes their API keys. Deserialization also discards API keys embedded by earlier SDK versions. To make instance API requests with restored objects, pass a key from secure runtime configuration in the method's options, e.g. `$customer->refresh(['api_key' => $key])`. `ApiResource::refresh()` and `autoPagingIterator()` on collections and search results now accept an optional `$opts` argument for this. Without a per-call key, the existing global-key fallback remains available.

See the [v23 migration guide](https://github.com/stripe/stripe-php/blob/master/.hark/migration-guides/v23.md#api-keys-no-longer-survive-native-php-serialization) for affected integrations and examples.
