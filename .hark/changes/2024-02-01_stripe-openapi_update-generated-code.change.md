---
title: Update generated code
pr_link: https://github.com/stripe/stripe-php/pull/1636
is_stripe_api_change: true
released_in_version: 13.10.0
---

* Add support for new value `swish` on enum `PaymentLink.payment_method_types[]`
* Add support for `swish` on `PaymentMethod`
* Add support for new value `swish` on enum `PaymentMethod.type`
* Add support for `jurisdiction_level` on `TaxRate`
* Change type of `Terminal.Reader.status` from `string` to `enum('offline'|'online')`
