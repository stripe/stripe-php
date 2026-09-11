---
title: API Updates
pr_link: https://github.com/stripe/stripe-php/pull/1276
is_stripe_api_change: true
released_in_version: 7.126.0
---

* Add support for new resource `CashBalance`
* Change type of `BillingPortal.Configuration.application` from `$Application` to `deletable($Application)`
* Add support for `cash_balance` on `Customer`
* Add support for `application` on `Invoice`, `Quote`, `SubscriptionSchedule`, and `Subscription`
* Add support for new value `eu_oss_vat` on enum `TaxId.type`
