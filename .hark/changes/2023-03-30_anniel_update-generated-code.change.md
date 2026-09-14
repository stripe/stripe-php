---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1470
is_stripe_api_change: true
released_in_version: 10.12.0
---

* Remove support for `create` method on resource `Tax.Transaction`
  * This is not a breaking change, as this method was deprecated before the Tax Transactions API was released in favor of the `createFromCalculation` method.
* Remove support for value `deleted` from enum `Invoice.status`
  * This is not a breaking change, as the value was never returned or accepted as input.
