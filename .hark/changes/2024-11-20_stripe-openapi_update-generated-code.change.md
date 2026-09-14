---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1786
is_stripe_api_change: true
released_in_version: 16.3.0
---

* Add support for `respond` test helper method on resource `Issuing.Authorization`
* Add support for `adaptive_pricing` on `Checkout.Session`
* Add support for new value `subscribe` on enums `Checkout.Session.submit_type` and `PaymentLink.submit_type`
* Add support for new value `financial_account_statement` on enum `File.purpose`
* Add support for `fraud_challenges` and `verified_by_fraud_challenge` on `Issuing.Authorization`
* Add support for `trace_id` on `Payout`
* Add support for new value `li_vat` on enum `TaxId.type`
* Add support for new value `service_tax` on enum `TaxRate.tax_type`
* Change type of `Treasury.InboundTransfer.origin_payment_method` from `string` to `nullable(string)`
