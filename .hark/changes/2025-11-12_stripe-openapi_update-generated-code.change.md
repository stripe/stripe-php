---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/1954
is_stripe_api_change: true
released_in_version: 18.3.0-alpha.2
---

* Remove support for resource `V2.Tax.AutomaticRule`
* Remove support for `create`, `deactivate`, `find`, `retrieve`, and `update` methods on resource `V2.Tax.AutomaticRule`
* Add support for `self_reported_income` and `self_reported_monthly_housing_payment` on `Account.create().$params.individual`, `Account.update().$params.individual`, `Person.create().$params`, `Person.update().$params`, `Person`, `Token.create().$params.account.individual`, and `Token.create().$params.person`
* Add support for `billing_schedules` and `phase_effective_at` on `Quote.create().$params.subscription_data_override`, `Quote.create().$params.subscription_datum`, `Quote.subscription_data_overrides[]`, `Quote.subscription_data`, `Quote.update().$params.subscription_data_override`, and `Quote.update().$params.subscription_datum`
* Add support for `bill_from` on `Subscription.billing_schedules[]`
* Add support for `amendment_end` and `line_ends_at` on `Subscription.billing_schedules[].bill_until`
* Add support for new values `amendment_end`, `line_ends_at`, `schedule_end`, and `upcoming_invoice` on enum `Subscription.billing_schedules[].bill_until.type`
