---
title: Update generated code for beta
pr_link: https://github.com/stripe/stripe-php/pull/1788
is_stripe_api_change: true
released_in_version: 16.7.0-beta.1
---

* Add support for `network_advice_code` and `network_decline_code` on `StripeError`
* Add support for new value `invoice.overpaid` on enum `Event.type`
* Add support for `adjustable_quantity`, `display`, and `metadata` on `LineItem`
* Change type of `LineItem.description` from `string` to `nullable(string)`
