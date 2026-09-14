---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1629
is_stripe_api_change: true
released_in_version: 13.9.0
---

* Add support for new resource `CustomerSession`
* Add support for `create` method on resource `CustomerSession`
* Remove support for values `obligation_inbound`, `obligation_payout_failure`, `obligation_payout`, and `obligation_reversal_outbound` from enum `BalanceTransaction.type`
* Add support for `billing_cycle_anchor_config` on `Subscription`
