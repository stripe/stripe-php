---
title: Added StripeContext, StripeAccount and StripeVersion to BaseStripeClientInterface
pr_url: https://github.com/stripe/stripe-php/pull/1905
is_breaking: true
released_in_version: 18.0.0
---

- ⚠️ Add getter methods `getStripeContext`, `getStripeVersion` and `getStripeAccount` to `BaseStripeClientInterface`. Users with custom StripeClient that implement `StripeClientInterface`, `StripeStreamingClientInterface` or `BaseStripeClientInterface` will have to add implementations for these methods.
