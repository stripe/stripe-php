---
title: Ensure idempotency key is set for retries when `max_network_retries` is configured on `StripeClient`
semver_level: minor
---

Previously, `CurlClient` would only check `Stripe::getMaxNetworkRetries()` when determining whether to set the idempotency key.

This also fixes an issue where streaming requests would not receive the configured retry count due to a missing `$apiMode` argument.
