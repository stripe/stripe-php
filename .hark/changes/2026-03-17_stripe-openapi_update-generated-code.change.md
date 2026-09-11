---
title: Update generated code for private-preview
pr_link: https://github.com/stripe/stripe-php/pull/2035
is_stripe_api_change: true
released_in_version: 19.5.0-alpha.4
---

* Add support for `simulate_crypto_deposit` test helper method on resource `PaymentIntent`
* Add support for `deposit_options` and `mode` on `PaymentIntent.confirm().$params.payment_method_option.crypto`, `PaymentIntent.create().$params.payment_method_option.crypto`, `PaymentIntent.payment_method_options.crypto`, and `PaymentIntent.update().$params.payment_method_option.crypto`
* Add support for `crypto_display_details` on `PaymentIntent.next_action`
