---
title: Update generated code
pr_url: https://github.com/stripe/stripe-php/pull/1718
is_stripe_api_change: true
released_in_version: 15.1.0
---

* Add support for `add_lines`, `remove_lines`, and `update_lines` methods on resource `Invoice`
* Add support for new value `payment_intent_fx_quote_invalid` on enum `StripeError.code`
* Add support for new values `multibanco`, `twint`, and `zip` on enum `PaymentLink.payment_method_types[]`
* Add support for `posted_at` on `Tax.Transaction`
* Add support for `reboot_window` on `Terminal.Configuration`
