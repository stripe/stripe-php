---
title: Add `StripeContext` object
pr_url: https://github.com/stripe/stripe-php/pull/1916
is_breaking: true
released_in_version: 18.0.0
---

- Add the `StripeContext` class. Previously you could only send a string for `stripe-context` header.
- ⚠️ Change `EventNotification` (formerly known as `ThinEvent`)'s `context` property from `string` to `StripeContext`
