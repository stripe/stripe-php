---
title: API Updates for beta branch
pr_url: https://github.com/stripe/stripe-php/pull/1451
is_stripe_api_change: true
released_in_version: 10.10.0-beta.1
---

* Updated stable APIs to the latest version
* Remove support for `list_transactions` method on resource `Tax.Transaction`
* Change type of `SubscriptionSchedule.applies_to` from `nullable(QuotesResourceQuoteLinesAppliesTo)` to `QuotesResourceQuoteLinesAppliesTo`
* Add support for `tax_summary` on `Tax.Calculation`
* Remove support for `tax_breakdown` on `Tax.Calculation`
