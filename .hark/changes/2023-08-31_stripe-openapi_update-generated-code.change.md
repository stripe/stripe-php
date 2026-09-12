---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1560
is_stripe_api_change: true
released_in_version: 12.1.0
---

* Add support for new resource `AccountSession`
* Add support for `create` method on resource `AccountSession`
* Add support for new values `obligation_inbound`, `obligation_outbound`, `obligation_payout_failure`, `obligation_payout`, `obligation_reversal_inbound`, and `obligation_reversal_outbound` on enum `BalanceTransaction.type`
* Change type of `Event.type` from `string` to `enum`
* Add support for `application` on `PaymentLink`
