---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1622
is_stripe_api_change: true
released_in_version: 13.8.0-beta.1
---

* Add support for new value `shipping_address_invalid` on enum `StripeError.code`
* Change type of `Invoice.issuer` from `nullable(ConnectAccountReference)` to `ConnectAccountReference`
* Add support for `ship_from_details` on `Tax.Calculation` and `Tax.Transaction`
