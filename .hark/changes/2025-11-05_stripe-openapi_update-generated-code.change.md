---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1953
is_stripe_api_change: true
released_in_version: 18.2.0
---

* Add support for `capture_method` on `PaymentIntent.confirm().$params.payment_method_option.card_present`, `PaymentIntent.create().$params.payment_method_option.card_present`, `PaymentIntent.payment_method_options.card_present`, and `PaymentIntent.update().$params.payment_method_option.card_present`
