---
title: Keep API keys out of serialized and dumped clients and event notifications
semver_level: patch
---

`serialize()`, `print_r()`, and `var_dump()` of an `EventNotification` or `StripeClient` no longer include the API key. `print_r()` and `var_dump()` show the client's key redacted. An unserialized notification keeps its fields but has no client, so `fetchEvent()` and `fetchRelatedObject()` throw `\Stripe\Exception\AuthenticationException`. Parse the original payload with `StripeClient::parseEventNotification()` to make requests. An unserialized client has no API key, including clients serialized by earlier SDK versions.
