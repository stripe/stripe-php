---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1671
is_stripe_api_change: true
released_in_version: 13.18.0-beta.1
---

* Add support for `update` method on resource `Entitlements.Feature`
* Add support for `risk_controls` on `Account`
* Change type of `Subscription.discounts` and `SubscriptionItem.discounts` from `nullable(array(expandable($Discount)))` to `array(expandable($Discount))`
