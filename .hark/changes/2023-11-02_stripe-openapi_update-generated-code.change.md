---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1599
is_stripe_api_change: true
released_in_version: 13.2.0
---

* Add support for new resource `Tax.Registration`
* Add support for `all`, `create`, and `update` methods on resource `Registration`
* Add support for new value `token_card_network_invalid` on enum `StripeError.code`
* Add support for new value `payment_unreconciled` on enum `BalanceTransaction.type`
* Add support for `revolut_pay` on `PaymentMethod`
* Add support for new value `revolut_pay` on enum `PaymentMethod.type`
