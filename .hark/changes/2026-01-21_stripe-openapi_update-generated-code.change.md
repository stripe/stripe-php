---
title: Update generated code for private-preview
pr_url: https://github.com/stripe/stripe-php/pull/1998
is_stripe_api_change: true
released_in_version: 19.3.0-alpha.1
---

* Remove support for `pause` method on resource `Subscription`
* Change type of `Quote.subscription_data.phase_effective_at` and `Quote.subscription_data_overrides[].phase_effective_at` from `enum('billing_period_start'|'phase_start')` to `nullable(enum('billing_period_start'|'phase_start'))`
