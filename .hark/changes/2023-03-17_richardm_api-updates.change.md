---
title: API Updates
pr_link: https://github.com/stripe/stripe-php/pull/1456
is_stripe_api_change: true
released_in_version: 10.11.0-beta.1
---

* Add support for `create_from_calculation` method on resource `Tax.Transaction`
* Change type of `Invoice.applies_to` from `nullable(QuotesResourceQuoteLinesAppliesTo)` to `QuotesResourceQuoteLinesAppliesTo`
* Add support for `shipping_cost` on `Tax.Calculation` and `Tax.Transaction`
* Add support for `tax_breakdown` on `Tax.Calculation`
* Remove support for `tax_summary` on `Tax.Calculation`
