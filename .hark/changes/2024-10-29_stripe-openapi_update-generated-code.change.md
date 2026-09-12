---
title: Update generated code for beta
pr_url: https://github.com/stripe/stripe-php/pull/1780
is_stripe_api_change: true
released_in_version: 16.7.0-beta.1
---

* Add support for `trigger_action` method on resource `PaymentIntent`
* Remove support for value `payout_statement_descriptor_profanity` from enum `StripeError.code`
* Add support for `id_bank_transfer` on `PaymentMethodConfiguration` and `PaymentMethod`
* Add support for `gopay`, `qris`, and `shopeepay` on `PaymentMethodConfiguration`
